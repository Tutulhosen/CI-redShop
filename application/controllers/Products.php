<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
    
    public function search(){
        $data = array();
        $title = 'Home';
        $data['title'] = $title;
        $data['menu'] = 'home';
        $data['category'] = $this->products_model->getAllCategory();        
        $search_text = $this->input->post('search_text');
        $data['result'] = $details = $this->products_model->search_porduct($search_text);
        $data['header'] = $this->load->view('common/header', $data, TRUE);
        $data['menu'] = $this->load->view('common/top-menu', $data, TRUE);
        $data['left_category'] = $this->load->view('common/left-category', $data,TRUE);
        $data['left_mob_category'] = $this->load->view('common/left-mob-category', $data,TRUE);
        $data['cart_aside'] = $this->load->view('common/cart-aside', $data, TRUE);
        $data['footer'] = $this->load->view('common/footer', $data, TRUE);
        if (!empty($details)) {
            $this->load->view('frontend/product/search-result', $data);
        } else {
            $this->load->view('frontend/product/not-found', $data);
        }
    }

    public function details($slug=null) {
//        $this->cart->destroy();
        $data = array();
        $title = 'Products';
        $data['title'] = $title;
        $data['menu'] = 'home';
        $data['category'] = $this->products_model->getAllCategory();
       
  
        $data['result'] = $details = $this->products_model->getProductDetails($slug);

        if (empty($details)) {
            redirect('/');
        }

        $product_type = $details->product_type;
        $product_id = $details->id;

        $data['productImage'] = $this->products_model->getProductImage($product_id);
        $data['all_category'] = $this->products_model->getAllCategory();
        $data['related'] = $this->products_model->getRelatedProducts($limit = 8, $order_by = 'id', $product_type, $product_id);
        $best_selling_products = $this->products_model->getAllBestSellingProducts();
        
        $best_selling_product_ids=[];
        
        foreach($this->products_model->best_selling_product_ids()  as $value)
        {
            array_push($best_selling_product_ids,$value['id']);
        }

        $data['best_selling_product_ids'] = $best_selling_product_ids;
        
        
        
        //    echo '<pre>';
        //    print_r($data['related']);
        //    echo '</pre>';
        //    exit();
        $data['header'] = $this->load->view('common/header', $data, TRUE);
        $data['menu'] = $this->load->view('common/top-menu', $data, TRUE);
        $data['left_category'] = $this->load->view('common/left-category', $data,TRUE);
        $data['left_mob_category'] = $this->load->view('common/left-mob-category', $data,TRUE);
        $data['cart_aside'] = $this->load->view('common/cart-aside', $data, TRUE);
        $data['footer'] = $this->load->view('common/footer', $data, TRUE);
       
        // select * FROM products WHERE category_id IN (SELECT category_id FROM products WHERE id =306);
         $data['product_category'] =  $this->products_model->getRelatedProductsCategory($product_id);
        
        $data['product_url']=base_url().'products/details/'.$slug;
        $data['product_rating']=$this->products_model->getRelatedProductRating($product_id);
        
        $this->load->view('frontend/product/product-details', $data);
    }

    public function cart_details() {
        //$this->cart->destroy();
        $data = array();
        $title = 'home';
        $data['title'] = $title;
        $data['menu'] = 'home';

        // $data['category'] = $this->products_model->getAllCategory();
        $data['minimum_amt_free_delevary'] = $this->db
            ->select('option_value')
            ->where('option_name','minimum_amt_free_delevary')
            ->get('redshop_options')
            ->row();

        //  var_dump($data['minimum_amt_free_delevary']);
        //  exit; 

        if ($this->session->userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');
            $data['result'] = $this->db->select('*')->where('id', $user_id)->get('user_info')->row();
            
            if($this->session->userdata('invoice_number')){
                $invoice_number = $this->session->userdata('invoice_number');
                $data['address'] = $this->db->select('*')->where('invoice_number', $invoice_number)->get('delivery_address')->row();
            }else{
                $data['address'] = array();                
            }
        } else {
            $data['result'] = array();
            $data['address'] = array();
        }
        

        $data['header'] = $this->load->view('common/header', $data, TRUE);
        $data['menu'] = $this->load->view('common/top-menu', $data, TRUE);
        $data['left_category'] = $this->load->view('common/left-category', $data, TRUE);
        $data['cart_aside'] = $this->load->view('common/cart-aside', $data, TRUE);
        $data['footer'] = $this->load->view('common/footer', $data, TRUE);
        $this->load->view('frontend/cart/checkout-one', $data);
    }

    public function subcategorywise($subCategoryId = null) {
        $data             = array();
        $title            = 'Category';
        $data['title']    = $title;
        $data['menu']     = 'home';
        $data['category'] = $this->products_model->getAllCategory();
        $data['catInfo']  = $this->db->select('*')->where('id', $subCategoryId)->get('sub_category')->row();
        $data['catBanner']  = $this->db->select('*')->where('category_id', $data['catInfo']->category_id)->order_by('id','desc')->get('category_banner')->row();
        
        $data['result'] = $details        = $this->products_model->getAllProductsBySubcategoryWise($subCategoryId);

        $data['header']        = $this->load->view('common/header', $data, TRUE);
        $data['menu']          = $this->load->view('common/top-menu', $data, TRUE);
        $data['left_category'] = $this->load->view('common/left-category', $data, TRUE);
        $data['cart_aside']    = $this->load->view('common/cart-aside', $data, TRUE);
        $data['footer']        = $this->load->view('common/footer', $data, TRUE);
        if (!empty($details)) {
            $this->load->view('frontend/product/product-categorywise', $data);
        } else {
            $this->load->view('frontend/product/not-found', $data);
        }
    }

    public function categorywise($categoryId=null) {
        $data = array();
        $title = 'Category';
        $data['title'] = $title;
        $data['menu'] = 'home';
        $data['category'] = $this->products_model->getAllCategory();
        $data['catInfo'] = $this->db->select('*')->where('id',$categoryId)->get('category')->row();
        $data['catBanner']  = $this->db->select('*')->where('category_id', $categoryId)->order_by('id','desc')->get('category_banner')->row();

        $data['result'] = $details = $this->products_model->getAllProductsByCategoryWise($categoryId);
        $best_selling_product_ids=[];
        
        foreach($this->products_model->best_selling_product_ids()  as $value)
        {
            array_push($best_selling_product_ids,$value['id']);
        }

        $data['best_selling_product_ids'] = $best_selling_product_ids;
         
        $data['header'] = $this->load->view('common/header', $data, TRUE);
        $data['menu'] = $this->load->view('common/top-menu', $data, TRUE);
        $data['left_category'] = $this->load->view('common/left-category', $data,TRUE);
        $data['left_mob_category'] = $this->load->view('common/left-mob-category', $data,TRUE);
        $data['cart_aside'] = $this->load->view('common/cart-aside', $data, TRUE);
        $data['footer'] = $this->load->view('common/footer', $data, TRUE);

        if (!empty($details)) {
            $this->load->view('frontend/product/product-categorywise', $data);
        } else {
            $this->load->view('frontend/product/not-found', $data);
        }
    }

    // best selling product 
    public function bestSelling() {
        
        $data = array();
        $title = 'Category';
        $data['title'] = $title;
        $data['menu'] = 'home';
        $data['category'] = $this->products_model->getAllCategory();
        $data['catInfo'] = $this->db->select('*')->where('id',13)->get('category')->row();
        $data['catBanner']  = $this->db->select('*')->where('category_id', 13)->order_by('id','desc')->get('category_banner')->row();

        $data['result'] = $details = $this->products_model->getAllBestSellingProducts();

        $data['header'] = $this->load->view('common/header', $data, TRUE);
        $data['menu'] = $this->load->view('common/top-menu', $data, TRUE);
        $data['left_category'] = $this->load->view('common/left-category', $data,TRUE);
        $data['left_mob_category'] = $this->load->view('common/left-mob-category', $data,TRUE);
        $data['cart_aside'] = $this->load->view('common/cart-aside', $data, TRUE);
        $data['footer'] = $this->load->view('common/footer', $data, TRUE);

        if (!empty($details)) {
            $this->load->view('frontend/product/product-bestselling', $data);
        } else {
            $this->load->view('frontend/product/not-found', $data);
        }
    }

    // new arrival products 
    public function newArrivelProduct() {
        
        $data = array();
        $title = 'Category';
        $data['title'] = $title;
        $data['menu'] = 'home';
        $data['category'] = $this->products_model->getAllCategory();
        $data['catInfo'] = $this->db->select('*')->where('id',13)->get('category')->row();
        $data['catBanner']  = $this->db->select('*')->where('category_id', 13)->order_by('id','desc')->get('category_banner')->row();

        $data['result'] = $details = $this->products_model->getAllNewArrivelProducts();

        
        $data['header'] = $this->load->view('common/header', $data, TRUE);
        $data['menu'] = $this->load->view('common/top-menu', $data, TRUE);
        $data['left_category'] = $this->load->view('common/left-category', $data,TRUE);
        $data['left_mob_category'] = $this->load->view('common/left-mob-category', $data,TRUE);
        $data['cart_aside'] = $this->load->view('common/cart-aside', $data, TRUE);
        $data['footer'] = $this->load->view('common/footer', $data, TRUE);

        if (!empty($details)) {
            $this->load->view('frontend/product/product-newArrivel', $data);
        } else {
            $this->load->view('frontend/product/not-found', $data);
        }
    }

}
