<?php

/**
 * Class: Customer_order_model
 * Created by PhpStorm.
 * User: Moshahed
 * Date: 20/092019
 * Time: 4:14 PM
 */
class Customer_order_model extends CI_Model {
    /**
     * To check an user is exist or not by providing $email or $username or $mobile
     *
     * @param $email
     * @param null $username
     * @param null $mobile
     *
     * @return boolean
     */
    
    public function getRecentCustomerOrder(){
        $result = $this->db
                ->select('*')
                ->order_by('id','desc')
                ->get('delivery_address')
                ->result();
        return $result;
    }
    
    public function getCustomerDetails($id){
        $result = $this->db
                ->select('*')
                ->where('id',$id)
                ->get('delivery_address')
                ->row();
        
        return $result;
    }
    public function getCustomerOrderDetails($id){
        $result = $this->db
                ->select('*')
                ->where('delivery_address_id',$id)
                ->get('delivery_item')
                ->result();
        
        return $result;
    }
}
