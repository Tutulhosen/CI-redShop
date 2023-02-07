<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Developer: Moshahed Alam
 * Email: moshahed777@gmail.com
 * Date: Feb 2019
 * Time: 11:00 PM
 * 
 * 
 *
 * This controller used to be for home page information
 */
class Slider extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('user_id')) {
            redirect(base_url('admin/admin_login'));
        }
//        $this->load->model('user_model');
//        $this->load->model('admin/admin_user_model');
//        $this->load->helper('cookie');
        $this->load->helper('text');
    }

    public function index() {
        $data = array();
        $data['menu'] = 'slider';
        $data['result'] = $this->db
                ->select('*')
                ->order_by('id', 'desc')
                ->get('home_slider')
                ->result();

        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/slider/all-slider', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function create_new() {

        $data = array();
        $data['menu'] = 'slider';


        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/slider/create-slider', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function slider_save() {

        $data = array();

        if ($_FILES['slider_name']['name'] != '') {
            $config['upload_path'] = './resources/home-slider/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = false;
            $this->upload->initialize($config);
            $this->upload->do_upload('slider_name');
            $image_des = $this->upload->data();
            $file_name = $image_des['file_name'];
            $data['slider_name'] = $file_name;
        }

        $data['button_name'] = '';
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');



//        echo '<pre>';
//        print_r($data);
//        print_r($_FILES);
//        echo '</pre>';
//        exit();

        $response = $this->db->insert('home_slider', $data);

        if ($response == 1) {
            $sess['success'] = 'Successfully Save';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/slider'));
        } else {
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/slider'));
        }
    }

    public function delete($id) {
        $response = $this->db
                ->where('id', $id)
                ->delete('home_slider');

        if ($response == 1) {
            $sess['success'] = 'Successfully Deleted';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/slider'));
        } else {
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/slider'));
        }
    }

    //Generate random order number with combination character and number
    public function mt_rand_str($l, $c = 'abcdefghijklmnopqrstuvwxyz') {
        for ($s = '', $cl = strlen($c) - 1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i)
            ;
        return $s;
    }

}
