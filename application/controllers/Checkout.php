<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('cart');

        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    }

    public function index() {
        $data = array();
        $title = 'Checkout';
        $data['title'] = $title;
        $data['menu'] = 'checkout';


        if (count($this->cart->contents()) == 0) {
            $sess['exception'] = "You didn't shopping yet. Your cart is empty.";
            $this->session->set_userdata($sess);
        }

        $data['header'] = $this->load->view('common/header', $data, TRUE);
        $data['menu'] = $this->load->view('common/top-menu', $data, TRUE);
        $data['left_category'] = $this->load->view('common/left-category', $data, TRUE);
        $data['cart_aside'] = $this->load->view('common/cart-aside', $data, TRUE);
        $data['footer'] = $this->load->view('common/footer', $data, TRUE);
        $this->load->view('frontend/cart/checkout-view', $data);
    }

    public function delivery_address() {
        if (count($this->cart->contents()) == 0) {
            $sess['exception'] = "You didn't shopping yet. Your cart is empty.";
            $this->session->set_userdata($sess);
            redirect('checkout');
        }

        $data['sms_otp'] = $six_digit_random_number = mt_rand(100000, 999999); // six digit random number generate for SMS OTP
        $data['user_id'] = $this->input->post('id');
        $invNum = $this->input->post('invoice_number');
        $data['name'] = trim($this->input->post('name'));
        $data['email'] = trim($this->input->post('email'));
        $data['mobile'] = trim($this->input->post('mobile'));
        $data['address'] = trim($this->input->post('address'));
        $data['city'] = trim($this->input->post('city'));
        $data['district'] = trim($this->input->post('district'));
        $data['country'] = trim($this->input->post('country'));
        $data['delivery_charge'] = trim($this->input->post('delivery_charge'));

        $data['status'] = '0';
        $data['created_at'] = $this->created_at;
        $data['updated_at'] = $this->updated_at;



        if ($invNum == '') {

            $info = $this->db->select('*')->order_by('id', 'desc')->get('delivery_address')->row();
            if (empty($info)) {
                $invoiceNumber = '1001';
            } else {
                $invoiceNumber = $info->invoice_number + 1;
            }
            $data['invoice_number'] = $invoiceNumber;

            $response = $this->db->insert('delivery_address', $data);
            $sess['invoice_number'] = $invoiceNumber;
            $this->session->set_userdata($sess);
        } else {
            $response = $this->db->where('invoice_number', $invNum)->update('delivery_address', $data);
            $sess['invoice_number'] = $invNum;
            $this->session->set_userdata($sess);
        }
        if ($response == 1) {
            redirect('products/cart_details');
            die();
        }
    }

    public function proceed_to_checkout() {
        $data = array();
        $title = 'OTP Verifications';
        $data['title'] = $title;
        $data['menu'] = 'checkout';

        if (count($this->cart->contents()) == 0) {
            $sess['exception'] = "You didn't shopping yet. Your cart is empty.";
            $this->session->set_userdata($sess);
            redirect('checkout');
        }

        if (empty($this->input->post('id'))) {
            //$this->cart->destroy(); //empty cart-----------------------------
            redirect('home');
        }

        $data['id'] = $id = $this->input->post('id');
        $data['sms_otp'] = $sms_otp = $this->input->post('sms_otp');
        $data['mobile'] = $mobile = $this->input->post('mobile');

        //add delivery charge------------------------------------------------
        $delivery_charge = $this->input->post('delivery_charge');


        // add to card delivery charge-----------------------
        $insert_cart_data = [
            'id' => 100001,
            'name' => 'Delivery Charge',
            'qty' => 1,
            'price' => $delivery_charge,
            'options' => array('color' => '', 'size' => '', 'currency' => '')
        ];

        $this->cart->insert($insert_cart_data);
        if (!empty($this->cart->contents())) {
            foreach ($this->cart->contents() as $items) {

                if ($items['id'] == 100001) {
                    $itemID = 0;
                } else {
                    $itemID = $items['id'];
                }

                $itemInfo = array(
                    'delivery_address_id' => $id,
                    'product_id' => $itemID,
                    'name' => $items['name'],
                    'qty' => $items['qty'],
                    'price' => $items['price'],
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at,
                );
                $response2 = $this->db->insert('delivery_item', $itemInfo);
            }

            // set SMS(OTP)
            $smsResponse1 = $this->sendSMS($mobile, $message = "Redshop One Time Password(OTP): $sms_otp");
            $smsResponse = json_decode($smsResponse1);

            if (isset($smsResponse->data[0]->status) && $smsResponse->data[0]->status == 'OK') {
                $sess['success'] = 'Your order has been placed successfully!';
                $this->session->set_userdata($sess);
                $this->session->unset_userdata('invoice_number');

                $data['header'] = $this->load->view('common/header', $data, TRUE);
                $data['menu'] = $this->load->view('common/top-menu', $data, TRUE);
                $data['left_category'] = $this->load->view('common/left-category', $data, TRUE);
                $data['cart_aside'] = $this->load->view('common/cart-aside', $data, TRUE);
                $data['footer'] = $this->load->view('common/footer', $data, TRUE);
                $this->load->view('frontend/cart/sms-otp-submit', $data);
            } else {
                $sess['exception'] = "Your order not submitted successfully.";
                $this->db->set('status', 1)->where('id', $id)->update('delivery_address');
                $this->cart->destroy(); //empty cart-----------------------------
                redirect('home');
            }

            //redirect('checkout/success');
        } else {
            $sess['exception'] = "You didn't shopping yet. Your cart is empty.";
            $this->session->set_userdata($sess);
            redirect('checkout');
        }
    }

    public function success() {
        $data = array();
        $title = 'home';
        $data['title'] = $title;
        $data['menu'] = 'home';

        $data['id'] = $id = $this->input->post('id');
        $data['sms_otp'] = $sms_otp = $this->input->post('sms_otp');

        $result = $this->db->where('id', $id)->get('delivery_address')->row();
        $data['invoice_number'] = $result->invoice_number;

        if ($sms_otp == $result->sms_otp) {

            $smsResponse1 = $this->sendSMS($result->mobile, $message = "Your order has been placed successfully");
            $this->cart->destroy(); //empty cart-----------------------------
            // update order status
            $updResponse = $this->db->set('status', '1')->where('id', $id)->update('delivery_address');

            $data['header'] = $this->load->view('common/header', $data, TRUE);
            $data['menu'] = $this->load->view('common/top-menu', $data, TRUE);
            $data['left_category'] = $this->load->view('common/left-category', $data, TRUE);
            $data['cart_aside'] = $this->load->view('common/cart-aside', $data, TRUE);
            $data['footer'] = $this->load->view('common/footer', $data, TRUE);
            $this->load->view('frontend/cart/payment-success', $data);
        } else {
            $sess['exception'] = "OTP (One Time Password) is not Correct! Try agian";
            $this->session->set_userdata($sess);
            $data['header'] = $this->load->view('common/header', $data, TRUE);
            $data['menu'] = $this->load->view('common/top-menu', $data, TRUE);
            $data['left_category'] = $this->load->view('common/left-category', $data, TRUE);
            $data['cart_aside'] = $this->load->view('common/cart-aside', $data, TRUE);
            $data['footer'] = $this->load->view('common/footer', $data, TRUE);
            $this->load->view('frontend/cart/sms-otp-submit', $data);
        }
    }

    public function testSms() {
        $six_digit_random_number = mt_rand(100000, 999999);
        $response = $this->sendSMS($numbers = '01749757077', $message = "This is testing from Redshop");

        echo "<pre>";
        print_r(json_decode($response));
        echo "</pr>";
        /*
          stdClass Object
          (
          [data] => Array
          (
          [0] => stdClass Object
          (
          [status] => OK
          [error] => 0
          [smslog_id] => 1801789
          [queue] => 3b0afe12942608773775befc8f266988
          [to] => 8801749757077
          )

          )

          [error_string] =>
          [timestamp] => 1602704003
          )
         */
    }

    public function sendSMS($numbers = null, $message = null) {
        //https://alphasms.biz/index.php?app=main&inc=core_auth&route=login
        $string = substr($numbers, 0, 3);
        $string2 = substr($numbers, 0, 2);
//        $string3 = substr($MSISDN, 0, 1);

        if ($string == '+88') {
            $stringNew = explode('+88', $numbers);
            $numbers = $stringNew[1];
        }
        if ($string2 == '88') {
            $stringNew = explode('88', $numbers);
            $numbers = $stringNew[1];
        }

        $username = "Bappi123";
        $hash = "f840f9c02ef0c10f7266302c75828ad6";
        $params = array('app' => 'ws', 'u' => $username, 'h' => $hash, 'op' => 'pv', 'unicode' => '1', 'to' => $numbers, 'msg' => $message);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://alphasms.biz/index.php?" . http_build_query($params, "", "&"));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json", "Accept:application/json"));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($ch);
        curl_close($ch);

        //insert in to sms_log table
        $offset = 6 * 60 * 60; //converting 5 hours to seconds.
        $dateFormat = "Y-m-d H:i";
        $timeNdate = gmdate($dateFormat, time() + $offset);
        $data = [
            'mobile' => $numbers,
            'message' => $message,
            'response' => $response,
            'created_at' => $timeNdate,
        ];
        $this->db->insert('sms_log', $data);

        return $response;
    }

}
