<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function peyments() {
        $post_data = array();
        $post_data['store_id'] = "jidpusbuetlive";
        $post_data['store_passwd'] = "5C091A1A70A4391665";
        # REQUEST SEND TO SSLCOMMERZ Sandbox
//$direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";
        # REQUEST SEND TO SSLCOMMERZ live
        $direct_api_url = "https://securepay.sslcommerz.com/gwprocess/v3/api.php";
        $post_data['total_amount'] = "10";
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = "singlepage123456";
        $post_data['success_url'] = "https://jidpus.buet.ac.bd/ICDRM2019/test/success";
        $post_data['fail_url'] = "https://jidpus.buet.ac.bd/ICDRM2019/test/fail";
        $post_data['cancel_url'] = "https://jidpus.buet.ac.bd/ICDRM2019/test/cancel";
        $post_data['cus_name'] = "Moshahed";
        $post_data['cus_email'] = "moshahed777@gmail.com";
        $post_data['cus_phone'] = "01749757077";
//        $post_data['cus_name'] = "Sayed";
//        $post_data['cus_email'] = "sayed@sslwireless.com";
//        $post_data['cus_phone'] = "01913900620";
        
        echo '=========POST DATA================';
        echo '<pre>';
        print_r($post_data);
        echo '</pre>';



        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url);
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


        $content = curl_exec($handle);
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        if ($code == 200 && !( curl_errno($handle))) {
            curl_close($handle);
            $sslcommerzResponse = $content;
        } else {
            curl_close($handle);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }
# PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true);
        
       /*
        echo '=========Json Return DATA================';
        echo '<pre>';
        print_r($sslcz);
        echo '</pre>';
        exit();
        //var_dump($sslcz); exit;
        */ 
        if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {
            # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
            # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
            echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
            # header("Location: ". $sslcz['GatewayPageURL']);
            exit;
        } else {
            echo "JSON Data parsing error!";
        }
    }
    
    public function success(){
        echo 'SUCCESS!';
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        
        echo json_encode($_POST);
        
        
        $data['payment_status'] = $this->input->post('status');
        $data['status_code'] = '';
        $data['pg_txnid'] = $this->input->post('bank_tran_id');
        $data['amount'] = $this->input->post('amount');
        $data['mer_txnid'] = $this->input->post('tran_id');
        $data['merchant_id'] = $this->input->post('store_id');
        $data['store_id'] = $this->input->post('store_id');
        $data['currency_id'] = '';
        $data['currency'] = $this->input->post('currency');
        $data['currency_type'] = $this->input->post('currency_type');
        $data['currency_amount'] = $this->input->post('currency_amount');
        $data['currency_rate'] = $this->input->post('currency_rate');
        $data['base_fair'] = $this->input->post('base_fair');
        $data['currency_merchant'] = '';
        $data['convertion_rate'] = '';
        $data['store_amount'] = $this->input->post('store_amount');
        $data['pay_time'] = $this->input->post('tran_date');
        $data['bank_txn'] = $this->input->post('bank_tran_id');
        $data['card_number'] = $this->input->post('card_no');
        $data['card_issuer'] = $this->input->post('card_issuer');
        $data['card_brand'] = $this->input->post('card_brand');
        $data['card_holder'] = '';
        $data['card_type'] = $this->input->post('card_type');
        $data['opt_a'] = $this->input->post('value_a');
        $data['opt_b'] = $this->input->post('value_b');
        $data['opt_c'] = $this->input->post('value_c');
        $data['opt_d'] = $this->input->post('value_d');
        $data['ip_address'] = '';
        $data['reason'] = '';
        $data['other_currency'] = '';
        $data['success_url'] = '';
        $data['fail_url'] = '';
        $data['pg_service_charge_bdt'] = '';
        $data['pg_service_charge_usd'] = '';
        $data['pg_card_bank_name'] = '';
        $data['pg_card_bank_country'] = $this->input->post('card_issuer_country');
        $data['card_issuer_country_code'] = $this->input->post('card_issuer_country_code');
        $data['risk_level'] = $this->input->post('risk_level');
        $data['risk_title'] = $this->input->post('risk_title');
        $data['pg_error_code_details'] = '';
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $data['user_id'] = '100';
        $paymentInsertResponse = $this->db->insert('user_payments', $data);
        
        /*
         Json Array=
         {"tran_id":"singlepage123456","val_id":"1812112359299bHmyG74vbwkXS3","amount":"10.00","card_type":"VISA-Brac bank","store_amount":"9.75","card_no":"432149XXXXXX5697","bank_tran_id":"BV40362018121127594","status":"VALID","tran_date":"2018-12-11 23:55:07","currency":"BDT","card_issuer":"BRAC BANK LIMITED","card_brand":"VISA","card_issuer_country":"BANGLADESH","card_issuer_country_code":"BD","store_id":"jidpusbuetlive","currency_type":"BDT","currency_amount":"10.00","currency_rate":"1.0000","base_fair":"0.00","value_a":"","value_b":"","value_c":"","value_d":"","risk_level":"0","risk_title":"Safe","verify_sign":"fe33f9c1fb6b925cbc5c505a96685e0c","verify_sign_sha2":"be1bfdf9d5e1c17ffca1c167cb6362adb51030923086cab04a57adf505ced15c","verify_key":"amount,bank_tran_id,base_fair,card_brand,card_issuer,card_issuer_country,card_issuer_country_code,card_no,card_type,currency,currency_amount,currency_rate,currency_type,risk_level,risk_title,status,store_amount,store_id,tran_date,tran_id,val_id,value_a,value_b,value_c,value_d"}
         
         * 
         
         Array
            (
                [tran_id] => singlepage123456
                [val_id] => 1812112359299bHmyG74vbwkXS3
                [amount] => 10.00
                [card_type] => VISA-Brac bank
                [store_amount] => 9.75
                [card_no] => 432149XXXXXX5697
                [bank_tran_id] => BV40362018121127594
                [status] => VALID
                [tran_date] => 2018-12-11 23:55:07
                [currency] => BDT
                [card_issuer] => BRAC BANK LIMITED
                [card_brand] => VISA
                [card_issuer_country] => BANGLADESH
                [card_issuer_country_code] => BD
                [store_id] => jidpusbuetlive
                [currency_type] => BDT
                [currency_amount] => 10.00
                [currency_rate] => 1.0000
                [base_fair] => 0.00
                [value_a] => 
                [value_b] => 
                [value_c] => 
                [value_d] => 
                [risk_level] => 0
                [risk_title] => Safe
                [verify_sign] => fe33f9c1fb6b925cbc5c505a96685e0c
                [verify_sign_sha2] => be1bfdf9d5e1c17ffca1c167cb6362adb51030923086cab04a57adf505ced15c
                [verify_key] => amount,bank_tran_id,base_fair,card_brand,card_issuer,card_issuer_country,card_issuer_country_code,card_no,card_type,currency,currency_amount,currency_rate,currency_type,risk_level,risk_title,status,store_amount,store_id,tran_date,tran_id,val_id,value_a,value_b,value_c,value_d
            )
         */
    }
    public function fail(){
        echo 'FAIL!';
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
    }
    public function cancel(){
        echo 'CANCEL!';
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
    }

}
