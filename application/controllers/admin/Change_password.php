<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Developer: Moshahed Alam
 * Email: moshahed777@gmail.com
 * Date: Nov 2018
 * Time: 11:00 PM
 * 
 * 
 *
 * This controller used to be for home page information
 */
class Change_password extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('user_id')) {
            redirect(base_url('admin/admin_login'));
        }
        $this->load->model('user_model');
    }

    public function index() {
        $this->load->library('form_validation');
        $data           = array();
        $data['menu']   = 'settings';
        $data['result'] = $this->db
                ->select('*')
                ->where('id', 1)
                ->get('user_info')
                ->row();

        $data['admin_header']   = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left']       = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right']      = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body']     = $this->load->view('admin-home/settings/password-change-view', $data, TRUE);
        $data['admin_footer']   = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function reset_passwod_success() {
        $this->load->library('form_validation');

        $data          = array();
        $title         = 'settings';
        $data['title'] = $title;
        $data['menu']  = 'settings';

        $user_id         = $this->input->post('id');
        $data['user_id'] = $this->input->post('id');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirmed Password', 'required|min_length[6]|matches[password]');


        if (false == $this->form_validation->run()) {
            $form_validation['message'] = 'Registration failed due to bellow reason.';
            $form_validation['reason']  = 'form_validation';
            $form_validation['field']   = $this->form_validation->error_array();
            $form_validation            = json_encode($form_validation);

            $data['form_validation'] = $form_validation;

            $data['form_validation'] = $form_validation;
            $data['admin_header']    = $this->load->view('admin-home/common/admin-header', $data, TRUE);
            $data['admin_top_menu']  = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
            $data['nav_left']        = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
            $data['nav_right']       = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
            $data['admin_body']      = $this->load->view('admin-home/settings/password-change-view', $data, TRUE);
            $data['admin_footer']    = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
            $this->load->view('admin-home/admin-master-page', $data);
        } else {


            $password      = $this->form_validation->set_value('password');
            //http://php.net/manual/en/function.password-hash.php
            $options       = [
                'cost' => 12,
            ];
            $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);

            //update firebase user password----------------------------------------------
            $uid = $user_id;
            //$user_info = $this->user_model->userinfo_data($user_id);

            $userInfoUpdate = $this->db
                    ->where('id', $user_id)
                    ->set('password', $password_hash)
                    ->update('user_info');

            $sess['success'] = 'Password has been changed successfully!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/change_password'));
        }
    }

}
