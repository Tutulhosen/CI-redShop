<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Developer: Touhidul Islam
 * Email: touhidulislam256@gmail.com
 * Date: Feb 2023
 * Time: 11:00 PM
 * This controller used to be for home page information
 */
class Options extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('user_id')) {
            redirect(base_url('admin/admin_login'));
        }
        //$this->load->model('user_model');
        //$this->load->model('admin/admin_user_model');
        //$this->load->helper('cookie');
        $this->load->helper('text');
        $this->load->library('form_validation');

        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
        $this->created_by = $this->session->userdata('user_id');
    }

    public function index()
    {
       
         $data = array();
        // $data['menu'] = 'user';
        $data['result'] = $this->db
            ->select('*')
            ->get('redshop_options')
            ->result();
          
        
        $data['menu'] = 'category';
        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, true);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, true);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, true);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, true);
        $data['admin_body'] = $this->load->view('admin-home/common/admin-option-body', $data, true);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, true);
        $this->load->view('admin-home/options/admin-options-page', $data);
    }

    public function store()
    {

        $data = array();

        $data['option_name'] = trim($this->input->post('option_name'));
        $data['option_value'] = trim($this->input->post('option_value'));
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        // title for SEO friendly
        

        $response = $this->db->where('option_name',trim($this->input->post('option_name')))
        ->update('redshop_options',$data);

        if ($response == 1) {
            $sess['success'] = 'Successfully Updated';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/options'));
        } else {
            $sess['exception'] = 'Some problem occured. Try again!';
            $this->session->set_userdata($sess);
            redirect(base_url('admin/options'));
        }
    }

    

}
