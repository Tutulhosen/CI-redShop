<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Home
 * Developer: Moshahed Alam
 * Email: moshahed777@gmail.com
 * Date: Nov 2018
 * Time: 11:00 PM
 * 
 * 
 *
 * This controller used to be for home page information
 */
class Admin_home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('user_id')) {
            redirect(base_url('admin/admin_login'));
        }
//        $this->load->model('user_model');
//        $this->load->model('admin/admin_user_model');
//        $this->load->helper('cookie');
    }

    public function index() {
        $data = array();
        $data['menu']='category';
        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/common/admin-body-page', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }
    

}
