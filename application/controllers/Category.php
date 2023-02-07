<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Category extends CI_Controller {

	public function __construct() {
        parent::__construct();
//        if (!$this->session->userdata('uid')) {
//            redirect('login');
//        }
//        $this->load->model('user_model');
        $this->load->model('common_model');
    }
	public function all($id) {
            
            if(!isset($id)){
                redirect('/');
            }
            $data=array();
            $title='home';
            $data['title']=$title;
            $data['menu']=$id;
            
            $category_id=$id;
            
            $data['all_category']=$this->common_model->getAllCategory();
            $data['all_electronics']=$this->common_model->getAllProductsByCategory($limit=24,$order_by='id', $category_id);
            
             if(empty($data['all_electronics'])){
                redirect('/');
            }
            
//            echo '<pre>';
//            print_r($data['all_electronics']);
//            echo '</pre>';
//            exit();
            $data['header']=$this->load->view('common/header',$data,TRUE);
            $data['menu'] = $this->load->view('common/top-menu', $data,TRUE);
            $data['footer']=$this->load->view('common/footer',$data,TRUE);
            $this->load->view('frontend/product/product-categorywise',$data);
    }
   
        
       
    
   

}
