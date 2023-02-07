<?php

/**
 * Class: Admin login Modle
 * Created by PhpStorm.
 * User: Moshahed
 * Date: 28/10/2019
 * Time: 4:14 PM
 */
class Admin_user_model extends CI_Model {

    /**
     * To check an user is exist or not by providing $email or $username or $mobile
     *
     * @param $email
     * @param null $username
     * @param null $mobile
     *
     * @return boolean
     */
    
    
    public function loginCheck($login_info) {
        $query = $this->db
                ->select('*')
                ->where('email', $login_info['username'])
                ->get('user_info')
                ->row();
        
        return $query;
    }
    
    
   
    public function allUser(){
        return $this->db
                ->select('*')
                ->get('user_info')
                ->result();
    }
    public function allHotelUser(){
        return $this->db
                ->select('*')
                ->where('user_type','Hotel')
                ->get('user_info')
                ->result();
    }
    public function allResortUser(){
        return $this->db
                ->select('*')
                ->where('user_type','Resort')
                ->get('user_info')
                ->result();
    }
    public function allOthersUser(){
        return $this->db
                ->select('*')
                ->where('user_type','User')
                ->get('user_info')
                ->result();
    }
    public function allAdminUser(){
        return $this->db
                ->select('*')
                ->where('user_type !=','super_admin')
                ->get('admin_info')
                ->result();
    }
    
    public function admin_register($user_info){
        
       return $this->db->insert('admin_info',$user_info);
        
    }

    /**
     * Register an user
     *
     * @param $user_info
     */
    public function register($user_info) {
        //Build Query
        //INSERT INTO `khojj`.`user` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `mobile_number`, `city_name`, `registration_date`, `last_login_time`) VALUES (NULL, 'sdsd', 'sdsd', 'sdsd', 'asdasd', 'sds', 'sdsd', 'sdds', '2016-09-28 17:18:35', NULL);
        $user_info['registration_date'] = date('Y-m-d H:i:s', now());

        $this->db->trans_off();
        $this->db->trans_start();

        $this->db->insert('user_info', $user_info);
        if (1 == $this->db->affected_rows()) {
            $this->load->library('encryption');
            $user_id = $this->db->insert_id();
            $time = time();

            $user_validation = array(
                'user_id' => $user_id,
                'validation_code' => $this->encryption->encrypt($user_info['email']),
                'code_generate_time' => $time,
                'code_expire_time' => ($time + 172800),
            );

            $this->db->insert('user_validation', $user_validation);
            if (1 == $this->db->affected_rows()) {
                //send mail with validation code
            }
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return false;
        }
        return true;
    }

    public function login($login_info) {
        
//        $username=$login_info['username'];
//        return $query = $this->db->query("SELECT * FROM admin_info WHERE username='$username' OR email='$username'");

        $query = $this->db
                ->select('*')
                ->where('email', $login_info['username'])
                ->where('password', md5($login_info['password']))
                ->get('user_info')
                ->row();
        
        return $query;
    }

    //Reset Password for user
    public function update_user_info($data, $user_id) {
//       $data['password']=$user_password;
//       $data['password_text']=$user_password;
        return $query = $this->db
                ->where('id', $user_id)
                ->update('user_info', $data);
    }

    //search user id for SET Cookie
    public function login_for_cookie($user_id) {
        return $query = $this->db
                ->select('*')
                ->where('id', $user_id)
                ->get('user_info')
                ->row();
    }

    //Reset Password for user
    public function reset_password($user_password, $user_id) {
        $data['password'] = $user_password;
        $data['password_text'] = $user_password;
        return $query = $this->db
                ->set('password', $data['password'])
                ->set('password_text', $data['password'])
                ->where('id', $user_id)
                ->update('user_info', $data);
    }

    // Get user inforamtion by ID
    public function userinfo_data($user_id) {
        return $result = $this->db
                ->select('*')
                ->where('id', $user_id)
                ->get('user_info')
                ->row();
    }

    public function userinfo_check_password($old_password, $user_id) {
        return $result = $this->db
                ->select('*')
                ->where('id', $user_id)
                ->where('password', md5($old_password))
                ->get('user_info')
                ->row();
    }

}
