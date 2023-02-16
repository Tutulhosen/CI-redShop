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
class Products extends CI_Controller {

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
        $data['menu'] = 'Products';
        $data['result'] = $this->db
                ->select('*')
                ->where('status', 1)
                ->order_by('id', 'desc')
                ->get('products')
                ->result();

        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/product/all-product', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function create_new() {

        $data = array();
        $data['menu'] = 'Products';

        $data['category'] = $this->db
                ->select('*')
                ->where('status', 1)
                ->order_by('name', 'asc')
                ->get('category')
                ->result();
        $data['sub_category'] = $this->db
                ->select('*')
                ->where('status', 1)
                ->order_by('name', 'asc')
                ->get('sub_category')
                ->result();


        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/product/create-product', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function getSubCategory() {
        $categoryID = $this->input->post('category_id');
        $data['sub_category'] = $this->db
                ->select('*')
                ->where('status', 1)
                ->where('category_id', $categoryID)
                ->order_by('name', 'asc')
                ->get('sub_category')
                ->result();

        $this->load->view('admin-home/product/sub-category', $data);
    }

    public function product_save() {

        $data = array();

        $data['product_type'] = '';
        $data['category_id'] = $this->input->post('category_id');
        $data['sub_category_id'] = $this->input->post('sub_category_id');

        $data['name'] = $name = trim($this->input->post('name'));
        $data['product_code'] = $product_code = trim($this->input->post('product_code'));
        $data['description'] = trim(htmlspecialchars($this->input->post('description')));
        $data['size'] = trim($this->input->post('size'));
        $data['color'] = trim($this->input->post('color'));
        $data['qty'] = trim($this->input->post('qty'));
        $data['max_qty_single_order'] = trim($this->input->post('max_qty_single_order'));
        $data['price'] = trim($this->input->post('price'));
        $data['discount'] = trim($this->input->post('discount'));
        $data['currency'] = trim($this->input->post('currency'));
        $data['availability_status'] = trim($this->input->post('availability_status'));
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        // title for SEO friendly
        $data['slug'] = $this->seo_title($name, $table = 'products');


        $img_name = trim($this->input->post('img_name')); //array

        $response = $this->db->insert('products', $data);

        if ($response == 1) {
            $sess['success'] = 'Successfully Save';
            $this->session->set_userdata($sess);
            $product_id = $this->db->insert_id();
        } else {
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/products'));
        }


        if (isset($product_id)) {

            // If file upload form submitted
            if (!empty($_FILES['img_name']['name'])) {
                $filesCount = count($_FILES['img_name']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['file']['name'] = $_FILES['img_name']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['img_name']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['img_name']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['img_name']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['img_name']['size'][$i];

                    // File upload configuration
                    $uploadPath = './resources/product-image/';

                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'gif|jpg|jpeg|JPEG|JPG|png|PNG';

                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    // Upload file to server
                    if ($this->upload->do_upload('file')) {
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $uploadData['product_id'] = $product_id;
                        $uploadData['img_name'] = $fileData['file_name'];
                        $uploadData['category_name'] = 'apparel';
                        $uploadData['status'] = '1';
                        $uploadData['created_at'] = date("Y-m-d H:i:s");
                        $uploadData['updated_at'] = date("Y-m-d H:i:s");
                        $insert = $this->db->insert('product_img', $uploadData);
                    }
                }
            }

            if ($response == 1) {
                $sess['success'] = 'Created Successfully';
                $this->session->set_userdata($sess);
                redirect(base_url('admin/products'));
            }
        }
    }

    public function edit_product($id) {

        $data = array();
        $data['menu'] = 'Products';

        $data['result'] = $this->db
                ->select('*')
                ->where('status', 1)
                ->where('id', $id)
                ->get('products')
                ->row();
        $data['category'] = $this->db
                ->select('*')
                ->where('status', 1)
                ->order_by('name', 'asc')
                ->get('category')
                ->result();
        $data['sub_category'] = $this->db
                ->select('*')
                ->where('status', 1)
                ->order_by('name', 'asc')
                ->get('sub_category')
                ->result();


        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/product/edit-product', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function product_update() {

        $data = array();
        $id = $this->input->post('id');
        
        
        $data['category_id'] = $this->input->post('category_id');
        $data['sub_category_id'] = $this->input->post('sub_category_id');

        $data['name'] = $name = trim($this->input->post('name'));
        $data['product_code'] = $product_code = trim($this->input->post('product_code'));
        $data['description'] = trim(htmlspecialchars($this->input->post('description')));
        $data['size'] = trim($this->input->post('size'));
        $data['color'] = trim($this->input->post('color'));
        $data['qty'] = trim($this->input->post('qty'));
        $data['max_qty_single_order'] = trim($this->input->post('max_qty_single_order'));
        $data['price'] = trim($this->input->post('price'));
        $data['discount'] = trim($this->input->post('discount'));
        $data['currency'] = trim($this->input->post('currency'));
        $data['availability_status'] = trim($this->input->post('availability_status'));
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');


        $img_name = trim($this->input->post('img_name')); //array

//        $response = $this->db->insert('apparel', $data);
        $response = $this->db
                ->where('id',$id)
                ->update('products',$data);
        
        if ($response == 1) {
            $sess['success'] = 'Update Successfully';
            $this->session->set_userdata($sess);

        } else {
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/products'));
        }


        if ($response == 1) {

            // If file upload form submitted
            if (!empty($_FILES['img_name']['name'])) {
                $filesCount = count($_FILES['img_name']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['file']['name'] = $_FILES['img_name']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['img_name']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['img_name']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['img_name']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['img_name']['size'][$i];

                    // File upload configuration
                    $uploadPath = './resources/product-image/';

                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'gif|jpg|jpeg|JPEG|JPG|png|PNG';

                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    // Upload file to server
                    if ($this->upload->do_upload('file')) {
                        
                        $product_id=$id; // for image insert
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $uploadData['product_id'] = $product_id;
                        $uploadData['img_name'] = $fileData['file_name'];
                        $uploadData['category_name'] = 'apparel';
                        $uploadData['status'] = '1';
                        $uploadData['created_at'] = date("Y-m-d H:i:s");
                        $uploadData['updated_at'] = date("Y-m-d H:i:s");
                        $insert = $this->db->insert('product_img', $uploadData);
                    }
                }
            }

            if ($response == 1) {
                $sess['success'] = 'Updated Successfully';
                $this->session->set_userdata($sess);
                redirect(base_url('admin/products'));
            }
        }
    }
    
    public function delete($id) {
        $response = $this->db
                ->where('id', $id)
                ->set('status', 0)
                ->update('products');

        if ($response == 1) {
            $sess['success'] = 'Successfully Deleted';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/products'));
        } else {
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/products'));
        }
    }

    public function delete_product_image() {

        $img_id = $this->input->get('imgid');

        $response = $this->db
                ->where('id', $img_id)
                ->delete('product_img');
    }

    public function details($id) {
        $data = array();
        $data['menu'] = 'Products';
        $data['result'] = $this->db
                ->select('*')
                ->where('id', $id)
                ->get('products')
                ->row();

        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/product/product-details', $data, TRUE);
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
