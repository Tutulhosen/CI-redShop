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
class Sub_category extends CI_Controller {

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
        $data['menu']='sub_category';
        $data['result']=$this->db
                ->select('*')
                ->where('status',1)
                ->order_by('id','desc')
                ->get('sub_category')
                ->result();
       
        
        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/sub-category/all-sub-category', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }
    
    public function create_new() {

        $data = array();
        $data['menu'] = 'sub_category';
        
         $data['category']=$this->db
                ->select('*')
                ->where('status',1)
                ->order_by('name','asc')
                ->get('category')
                ->result();


        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/sub-category/create-sub-category', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }
    
    public function sub_category_save(){
        
        $data = array();
        $data['category_id']=$category_id = $this->input->post('category_id');
        $data['name'] = trim($this->input->post('name'));
//        $data['description'] = trim(htmlspecialchars($this->input->post('description')));
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
       
        
//        echo '<pre>';
//        print_r($data);
//        print_r($_FILES);
//        echo '</pre>';
//        exit();
        
        $response = $this->db->insert('sub_category', $data);
        
        if($response==1){
            $sess['success'] = 'Successfully Save';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/sub_category'));
            
        }else{
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/sub_category'));
        }
    }
    public function sub_category_update(){
        
        $data = array();
        $id = $this->input->post('id');
        $data['category_id']=$category_id = $this->input->post('category_id');
        $data['name'] = trim($this->input->post('name'));
//        $data['description'] = trim(htmlspecialchars($this->input->post('description')));
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        
        $response = $this->db
                ->where('id',$id)
                ->update('sub_category', $data);
        
        if($response==1){
            $sess['success'] = 'Successfully Save';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/sub_category'));
            
        }else{
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/sub_category/details/'.$id));
        }
    }
    
     public function delete($id) {
        $response = $this->db
                ->where('id', $id)
                ->set('status', 0)
                ->update('sub_category');

        if ($response == 1) {
            $sess['success'] = 'Successfully Deleted';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/sub_category'));
        } else {
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/sub_category'));
        }
    }

    public function details($id) {
        $data = array();
        $data['menu'] = 'sub_category';
        $data['result'] = $this->db
                ->select('*')
                ->where('id', $id)
                ->get('sub_category')
                ->row();
        
        $data['category']=$this->db
                ->select('*')
                ->order_by('name','asc')
                ->get('category')
                ->result();

        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/sub-category/sub-category-details', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }
    
    //Generate random order number with combination character and number
    public function mt_rand_str($l, $c = 'abcdefghijklmnopqrstuvwxyz') {
        for ($s = '', $cl = strlen($c) - 1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i)
            ;
        return $s;
    }

}
