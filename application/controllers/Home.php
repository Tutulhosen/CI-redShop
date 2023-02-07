<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        if (!$this->session->userdata('uid')) {
//            redirect('login');
//        }
//        $this->load->model('user_model');
        $this->load->model('common_model');
        $this->load->model('products_model');
        $this->load->library('cart');
    }

    public function index() {
//        $this->cart->destroy(); //Cart Destroy
        
        $data = array();
        $title = 'Home';
        $data['title'] = $title;
        $data['menu'] = 'home';

        $data['category']= $category = $this->products_model->getAllCategory();
        $data['slider']= $this->db->select('*')->get('home_slider')->result();
        $data['result'] = $this->products_model->getProductsByCategoryWise($category,$order_by='id',$limit=8);
        $data['best_selling_products'] = $this->products_model->getBestSellingProducts();
       // var_dump($this->products_model->getBestSellingProducts());

        $data['header'] = $this->load->view('common/header', $data, TRUE);
        $data['menu'] = $this->load->view('common/top-menu', $data, TRUE);
        $data['left_category'] = $this->load->view('common/left-category', $data, TRUE);
        $data['left_mob_category'] = $this->load->view('common/left-mob-category', $data, TRUE);
        $data['cart_aside'] = $this->load->view('common/cart-aside', $data, TRUE);
        $data['footer'] = $this->load->view('common/footer', $data, TRUE);
        $this->load->view('home/home-view', $data);
    }

}
