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
class Home extends CI_Controller {

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
        $data['menu'] = 'home';
        
        redirect(base_url('admin/admin_home'));
        
        $data['result'] = $this->db
                ->select('*')
                ->where('id', 1)
                ->get('home')
                ->row();

        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/home/home-view', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function update() {

//        echo '<pre>';
//        print_r($_POST);
//        print_r($_FILES);
//        echo '</pre>';
//        exit();       


        $id = $this->input->post('id');
        $data['description'] = $description = htmlentities($this->input->post('description'), TRUE);
        $data['updated_at'] = date('Y-m-d H:i:s');


        if ($_FILES['buet_logo']['name'] != '') {

            $config['upload_path'] = './resources/Images/home/';
            $config['allowed_types'] = 'gif|jpg|jpeg|JPEG|JPG|png|PNG';

            $config['max_size'] = 40048;
//            $config['max_width'] = 8048;
//            $config['max_height'] = 8048;
            $config['overwrite'] = false;

            $this->upload->initialize($config);

            $this->upload->do_upload('buet_logo');
            $image_des = $this->upload->data();
            $file_name = $image_des['file_name'];
            $data['buet_logo'] = $buet_logo = $file_name;
        }
        if ($_FILES['buet_jidpus_logo']['name'] != '') {

            $config['upload_path'] = './resources/Images/home/';
            $config['allowed_types'] = 'gif|jpg|jpeg|JPEG|JPG|png|PNG';

            $config['max_size'] = 40048;
//            $config['max_width'] = 8048;
//            $config['max_height'] = 8048;
            $config['overwrite'] = false;

            $this->upload->initialize($config);

            $this->upload->do_upload('buet_jidpus_logo');
            $image_des = $this->upload->data();
            $file_name = $image_des['file_name'];
            $data['buet_jidpus_logo'] = $buet_jidpus_logo = $file_name;
        }
        if ($_FILES['rajuk_logo']['name'] != '') {

            $config['upload_path'] = './resources/Images/home/';
            $config['allowed_types'] = 'gif|jpg|jpeg|JPEG|JPG|png|PNG';

            $config['max_size'] = 40048;
//            $config['max_width'] = 8048;
//            $config['max_height'] = 8048;
            $config['overwrite'] = false;

            $this->upload->initialize($config);

            $this->upload->do_upload('rajuk_logo');
            $image_des = $this->upload->data();
            $file_name = $image_des['file_name'];
            $data['rajuk_logo'] = $rajuk_logo = $file_name;
        }

        $response = $this->db
                ->where('id', $id)
                ->update('home', $data);

        if ($response == 1) {
            $meg['success'] = "Updated Successfully!";
            $this->session->set_userdata($meg);
            redirect("admin/home");
        }
    }

    public function slider() {
        $data = array();
        $data['menu'] = 'home';
        $data['result'] = $this->db
                ->select('*')
                ->where('status', 1)
                ->get('home_slider')
                ->result();

        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/home/home-slider-view', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function new_slider() {
        $data = array();
        $data['menu'] = 'home';

        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/home/new-slider', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function slider_save() {

        if ($_FILES['image_name']['name'] != '') {
            $config['upload_path'] = './resources/img/slider/home/';
            $config['allowed_types'] = 'gif|jpg|jpeg|JPEG|JPG|png|PNG';
            $config['max_size'] = 40048;
//            $config['max_width'] = 8048;
//            $config['max_height'] = 8048;
            $config['overwrite'] = false;

            $this->upload->initialize($config);

            $this->upload->do_upload('image_name');
            $image_des = $this->upload->data();
            $file_name = $image_des['file_name'];
            $data['image_name'] = $image_name = $file_name;
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');

            $response = $this->db->insert('home_slider', $data);

            if ($response == 1) {
                $sess['success'] = 'Created Successfully';
                $this->session->set_userdata($sess);
                redirect("admin/home/new_slider");
            } else {
                $sess['exception'] = 'Some problem occured. Try again!';
                $this->session->set_userdata($sess);
                redirect("admin/home/new_slider");
            }
        }
    }

    public function slider_delete($id) {
        
        $response=$this->db
                ->where('id',$id)
                ->delete('home_slider');
        
        if($response==1){
            $sess['success'] = 'Deleted Successfully';
            $this->session->set_userdata($sess);
            redirect("admin/home/slider");
            
        }else{
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect("admin/home/slider");
        }
        
    }

}
