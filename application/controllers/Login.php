<?php

/*
 * https://firebase-php.readthedocs.io/en/stable/
 * https://github.com/kreait/firebase-php/
 * 
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');

        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
//        $this->created_by = $this->session->userdata('user_id');
    }

    /**
     */
    public function index() {
        $data = array();
        $title = 'Login';
        $data['title'] = $title;
        $data['menu'] = 'login';
        $data['header'] = $this->load->view('common/header', $data, TRUE);
        $data['menu'] = $this->load->view('common/top-menu', $data, TRUE);
        $data['footer'] = $this->load->view('common/footer', $data, TRUE);
        $this->load->view('login/login-view', $data);
    }

    public function login_check() {

        if ($this->input->post('mobile')) {
            $mobile = $this->input->post('mobile');
        } else {
            $mobile = '';
        }
        if ($this->input->post('name')) {
            $name = $this->input->post('name');
        } else {
            $name = '';
        }

        $login_info = [
            'mobile' => $mobile,
            'name' => $name,
        ];
//        echo '<pre>';
//        print_r($_POST);
//        die();

        if (isset($mobile)) {
            $query = $this->user_model->login($login_info);

            $sess['user_id'] = $query->id;
            $sess['mobile'] = $query->mobile;


            if ($query->first_name == '' || $query->first_name == null) {
                $this->session->set_userdata($sess);
                echo 'new';
            } else {
                $sess['first_name'] = $query->first_name;
                $this->session->set_userdata($sess);
                echo 'old';
            }
//            return 'HELLO';
        }
    }

}
