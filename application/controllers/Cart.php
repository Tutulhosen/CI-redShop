<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
    }

    public function add_to_cart() {
        /*
        $this->cart->destroy(); //Cart Destroy
        echo 'HELLO';
        echo '<pre>';
        print_r($_POST);
        die();
         */
       
//        echo '<pre>';
//        print_r($_POST);
//        die();

        $button = trim($this->input->post('button'));
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        //remove special character (allow only alphanumeric characters white spaces and hyphen)
        $name = preg_replace('~[^0-9a-z\\s]~i', '', $name);
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');


        $insert_cart_data = array(
            'id' => $id,
            'qty' => $qty,
            'price' => $price,
            'name' => $name,
            'options' => array('color' => '', 'size' => '', 'currency' => '')
        );

        $this->cart->insert($insert_cart_data);
       
        if($button == 'buyNow'){
            redirect(base_url().'products/cart_details');
        }elseif($button == 'addtocart'){
            echo count($this->cart->contents());            
        }

    }
    
    public function delect_cart_item($rowid){
        
        $data = array(
            'rowid'  => $rowid,
            'qty'    => 0
        );

        $this->cart->update($data);
        
        echo count($this->cart->contents());
        
    }
    
    public function cart_item_plus($rowid){
        $itemQty = $this->input->get('itemQty')+1;
        $data = array(
            'rowid'  => $rowid,
            'qty'    => $itemQty
        );

        $this->cart->update($data);
        
        echo $this->cart->total();
    }
    
    public function cart_item_minus($rowid){
        $itemQty = $this->input->get('itemQty')-1;
        $data = array(
            'rowid'  => $rowid,
            'qty'    => $itemQty
        );

        $this->cart->update($data);
        
        if (!empty($this->cart->total())) {
            echo $this->cart->total();
        } else {
            echo 0;
        }
    }
    
    //remvoe special character from string
    function quote_smart($string) {
        $string = html_entity_decode($string);
        $string = strip_tags($string);
        $string = trim($string);
        $string = htmlentities($string);
        $string = preg_replace('/\s+/', ' ', $string); // Removing more than one space/Tab.
        // Quote if not integer
        /*
          if (!is_numeric($string))
          {
          $string = mysql_real_escape_string($string);
          }
         */

        return $string;
    }

}
