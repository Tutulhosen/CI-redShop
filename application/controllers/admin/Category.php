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
class Category extends CI_Controller {

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
        $data['menu']='category';
        $data['result']=$this->db
                ->select('*')
                ->where('status',1)
                ->order_by('display_order','ASC')
                ->get('category')
                ->result();
        
        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/category/all-category', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }
    
    public function create_new() {

        $data = array();
        $data['menu'] = 'category';


        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/category/create-category', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }
    
    public function category_save(){
        
        $data = array();
        $data['name'] = trim($this->input->post('name'));
        //$data['description'] = trim(htmlspecialchars($this->input->post('description')));
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        //get max order_display from db
        $result = $this->db
                ->select_max('display_order')
                ->get('category')
                ->row();
        
        if(!empty($result)){
            $data['display_order'] = $display_order = $result->display_order + 1;
        }else{
            $data['display_order'] =  $display_order = 1;
        }

        $response = $this->db->insert('category', $data);
        
        if($response==1){
            $sess['success'] = 'Successfully Save';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/category'));
            
        }else{
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/category'));
        }
    }
    public function category_update(){
        
        $data = array();
        $id = $this->input->post('id');
        $data['name'] = trim($this->input->post('name'));
        $data['display_order'] = trim($this->input->post('display_order'));
        //$data['description'] = trim(htmlspecialchars($this->input->post('description')));
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $response = $this->db
                ->where('id',$id)
                ->update('category', $data);
        
        if($response==1){
            $sess['success'] = 'Successfully Save';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/category'));
            
        }else{
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/category/details/'.$id));
        }
    }
    
    public function delete($id) {
        $response = $this->db
                ->where('id', $id)
                ->set('status', 0)
                ->update('category');

        if ($response == 1) {
            //update all sub category under of this category
            $this->db
                ->where('category_id', $id)
                ->set('status', 0)
                ->update('sub_category');            
            
            $sess['success'] = 'Successfully Deleted';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/category'));
        } else {
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/category'));
        }
    }

    public function details($id) {
        $data = array();
        $data['menu'] = 'category';
        $data['result'] = $this->db
                ->select('*')
                ->where('id', $id)
                ->get('category')
                ->row();

        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/category/category-details', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }
    
    public function banner_all() {
        $data = array();
        $data['menu'] = 'category_banner';
//        $data['result'] = $this->db
//                ->select('*')
//                ->order_by('id', 'desc')
//                ->get('category_banner')
//                ->result();
        
        $this->db->select('category_banner.*,category.name as category_name');
        $this->db->from('category_banner');
        $this->db->join('category', 'category.id = category_banner.category_id');
        $query = $this->db->get();
        $data['result'] = $query->result();

        $data['category']=$this->db
                ->select('*')
                ->where('status',1)
                ->order_by('id','desc')
                ->get('category')
                ->result();

        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/category-banner/all-banner', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function create_banner() {
        $data = array();
        $data['menu'] = 'category_banner';
         $data['category']=$this->db
                ->select('*')
                ->where('status',1)
                ->order_by('id','desc')
                ->get('category')
                ->result();
        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/category-banner/create-banner', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function banner_save() {
        $data = array();        
        $category_id = $this->input->post('category_id');

        if ($_FILES['banner_name']['name'] != '') {
            $config['upload_path'] = './resources/category-banner/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = false;
            $this->upload->initialize($config);
            $this->upload->do_upload('banner_name');
            $image_des = $this->upload->data();
            $file_name = $image_des['file_name'];
            $data['banner_name'] = $file_name;
        }

        $data['category_id'] = $category_id;
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $response = $this->db->insert('category_banner', $data);

        if ($response == 1) {
            $sess['success'] = 'Successfully Save';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/category/banner_all'));
        } else {
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/category/banner_all'));
        }
    }

    public function delete_banner($id,$name) {
        $response = $this->db
                ->where('id', $id)
                ->delete('category_banner');
        
        if($response == 1){
            @unlink('./resources/category-banner/'.$name);
        }

        if ($response == 1) {
            $sess['success'] = 'Successfully Deleted';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/category/banner_all'));
        } else {
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/category/banner_all'));
        }
    }
    
    //Generate random order number with combination character and number
    public function mt_rand_str($l, $c = 'abcdefghijklmnopqrstuvwxyz') {
        for ($s = '', $cl = strlen($c) - 1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i)
            ;
        return $s;
    }

}
