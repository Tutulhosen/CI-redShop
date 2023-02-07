<?php

/**
 * Developer: Moshahed Alam.
 * Email: moshahed777@gmail.com
 * Date: 01-Feb-2019
 */
class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();        
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
//        $this->created_by = $this->session->userdata('user_id');
    }

    public function login($login_info) {

        $mobile = $login_info['mobile'];
        $result = $this->getUserInfoByMobile($mobile);
        
        if(!empty($result)){
            if(isset($login_info['name'])){
            //update------------------------------------------------------------
                $user_id = $this->session->userdata('user_id');
                $this->db->where('id',$user_id)->set('first_name',$login_info['name'])->update('user_info');
            }
            
            $result = $this->getUserInfoByMobile($mobile);
            return $result;            
        }else{
            //insert user-------------------------------------------------------
            $data = array(
                'mobile' => $mobile, 
                'status' => 1, 
                'user_group' => 3, 
                'created_at' => $this->created_at, 
                'updated_at' => $this->updated_at, 
            );
            $response = $this->db->insert('user_info',$data);
            $last_id = $this->db->insert_id();
            $result2 = $this->getUserInfoById($last_id);
            return $result2;
        }
    }
    
    public function getUserInfoByMobile($mobile) {
        $result = $this->db
                ->select('*')
                ->where('mobile', $mobile)
                ->get('user_info')
                ->row();
        if(empty($result)){
            $mobile = '+88'.$mobile;
            $result = $this->db
                ->select('*')
                ->where('mobile', $mobile)
                ->get('user_info')
                ->row();
        }
        
        return $result;
    }

    public function getUserInfoById($id) {
        $result = $this->db
                ->select('*')
                ->where('id', $id)
                ->get('user_info')
                ->row();
        
        return $result;
    }

}
