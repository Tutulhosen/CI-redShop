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
class Invoice extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('user_id')) {
            redirect(base_url('admin/admin_login'));
        }
//        $this->load->model('user_model');
        $this->load->model('admin/customer_order_model');
//        $this->load->helper('cookie');
        $this->load->helper('text');
    }

    public function index() {
        $data = array();
        $data['menu'] = 'Invoice';
        $data['result'] = $this->customer_order_model->getRecentCustomerOrder();        

        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/invoice/all-custoer-order', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }


    public function view_details($id) {
       $data = array();
        $data['menu'] = 'Invoice';

        
        $data['customer'] = $this->customer_order_model->getCustomerDetails($id);        
        $data['result'] = $this->customer_order_model->getCustomerOrderDetails($id);        

        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/invoice/customer-order-details', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    //Generate random order number with combination character and number
    public function mt_rand_str($l, $c = 'abcdefghijklmnopqrstuvwxyz') {
        for ($s = '', $cl = strlen($c) - 1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i)
            ;
        return $s;
    }

    public function seo_title($title, $table) {
        //url for SEO----------------------------------------------------------------------------------------------------------
//        $url_title = substr(str_replace(" ", "-", preg_replace("/[^a-z]+/", " ", strtolower($data['name']))), 0,-1);
        $url_title = substr(str_replace(" ", "-", preg_replace("/[^a-z]+/", " ", strtolower($title))), 0, -1);

        $url_title_length = strlen($url_title);

        if ($url_title_length > 60) {
            $url_title = substr($url_title, 0, 60);
        }

        //Check Duplicate
        $check_title = $this->db
                ->select('*')
                ->where('slug', $url_title)
                ->get($table)
                ->row();

        if (!empty($check_title)) {
            $url_title = $url_title . '-' . $this->mt_rand_str(2);
        }

        return $url_title;
    }

}
