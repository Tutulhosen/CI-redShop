<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Search extends CI_Controller {

	public function __construct() {
        parent::__construct();
//        if (!$this->session->userdata('uid')) {
//            redirect('login');
//        }
//        $this->load->model('user_model');
        $this->load->model('common_model');
    }
	public function index() {
            
            $data=array();            
//            echo '<pre>';
//            print_r($_POST);
            $category_id = $this->input->post('category_id');
            $search_value = trim($this->input->post('search_value'));
            
            $data['search_result']=$search_result=$this->common_model->search_porduct($category_id,$search_value);
            
            $this->load->view('frontend/product/search-result',$data);
            
//            echo '<pre>';
//            print_r($search_result);
            
    }
   
        
       
    
   

}
