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
class Register extends CI_Controller {

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
        $data['menu']='register';
        $data['result']=$this->db
                ->select('*')
                ->where('id',1)
                ->get('call_for_papers')
                ->row();
        
        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/call-for-papers/call-for-papers', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }
    
    public function call_for_papers_update(){
        $id = $this->input->post('id');
        $data['description'] = $description = htmlentities($this->input->post('description'), TRUE);
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $response = $this->db
                ->where('id', $id)
                ->update('call_for_papers', $data);

        if ($response == 1) {
            $meg['success'] = "Updated Successfully!";
            $this->session->set_userdata($meg);
            redirect("admin/call_for_papers");
        }
    }
    
    public function registraion_fee(){        
        $data = array();
        $data['menu']='register';
        $data['result']=$this->db
                ->select('*')
                ->where('id',1)
                ->get('registration_fees')
                ->row();
        
        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/register/registration-fee', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);        
    }
    public function edit_register_fees(){        
        $data = array();
        $data['menu']='register';
        $data['result']=$this->db
                ->select('*')
                ->where('id',1)
                ->get('registration_fees')
                ->row();
        
        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/register/registration-fee-edit', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);        
    }
    
    public function register_fees_update(){
        $id = $this->input->post('id');
        $data['local_students'] = $this->input->post('local_students');
        $data['local_participants'] = $this->input->post('local_participants');
        $data['foreign_students'] = $this->input->post('foreign_students');
        $data['foreign_participants'] = $this->input->post('foreign_participants');
        $data['site_visit_local_participants'] = $this->input->post('site_visit_local_participants');
        $data['site_visit_foreign_participants'] = $this->input->post('site_visit_foreign_participants');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $response = $this->db
                ->where('id', $id)
                ->update('registration_fees', $data);

        if ($response == 1) {
            $meg['success'] = "Updated Successfully!";
            $this->session->set_userdata($meg);
            redirect("admin/register/registraion_fee");
        }
    }
    
    public function travel_agent() {
        $data = array();
        $data['menu']='register';
        $data['result']=$this->db
                ->select('*')
                ->where('id',1)
                ->get('travel_grants')
                ->row();
        
        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = $this->load->view('admin-home/common/admin-top-menu', $data, TRUE);
        $data['nav_left'] = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right'] = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body'] = $this->load->view('admin-home/register/travel-agent-view', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }
    
    public function travel_agent_update(){
        $id = $this->input->post('id');
        $data['description'] = $description = htmlentities($this->input->post('description'), TRUE);
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $response = $this->db
                ->where('id', $id)
                ->update('travel_grants', $data);

        if ($response == 1) {
            $meg['success'] = "Updated Successfully!";
            $this->session->set_userdata($meg);
            redirect("admin/register/travel_agent");
        }
    }

}
