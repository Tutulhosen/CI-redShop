<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class: Admin Login
 * Created by Netbeans.
 * User: Moshahed Alam
 * Date: 10/25/2019
 * Time: 7:25 PM
 */
class Admin_Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        if ($this->session->userdata('user_id')) {
//            redirect(base_url());
//        }
        $this->load->model('admin/admin_user_model');
        $this->load->helper('cookie');
        $this->load->library('form_validation');
    }

    public function index() {

        $data['menu_title'] = '';        
        $this->load->view('admin-login/admin-signin', $data);
    }

    public function signin_ajax() {

        $login_info = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        ];
        $query = $this->admin_user_model->loginCheck($login_info);
        

        if (!empty($query)) {
            $hash = $query->password;
            if (password_verify($login_info['password'], $hash)) {
                $sess['user_id'] = $query->id;
//                $sess['username'] = $query->username;
                $sess['first_name'] = $query->first_name;
                $sess['last_name'] = $query->last_name;
                $sess['user_group'] = $query->user_group;
                $this->session->set_userdata($sess);
                redirect(base_url('admin/admin_home'));
            } else {
                $sess['exception'] = 'Admin User Name or Password is Invalid !';
                $this->session->set_userdata($sess);
                redirect(base_url('admin/admin_login'));
            }
        } else {
            $sess['exception'] = 'Admin User Name or Password is Invalid !';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/admin_login'));
        }
    }

}
