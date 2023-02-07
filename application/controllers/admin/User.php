<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Developer: Moshahed Alam
 * Email: moshahed777@gmail.com
 * Date: Feb 2019
 * Time: 11:00 PM
 * This controller used to be for home page information
 */
class User extends CI_Controller {

    public function __construct() {
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

    public function index() {
        $data           = array();
        $data['menu']   = 'user';
        $data['result'] = $this->db
                ->select('*')
                ->where('user_group', 2)
                ->where('status', 1)
                ->order_by('id', 'desc')
                ->get('user_info')
                ->result();

        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        //$data['admin_top_menu'] = "";
        $data['nav_left']     = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right']    = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body']   = $this->load->view('admin-home/user/all-user', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }
    public function all_customer() {
        $data           = array();
        $data['menu']   = 'user';
        $group_id = 3;
        
        $this->db->select('user_info.*,delivery_address.name as customer_name,delivery_address.address as customer_address,delivery_address.name as customer_mobile,delivery_address.name as customer_city,delivery_address.name as customer_district');
        $this->db->from('user_info');
        $this->db->join('delivery_address', 'delivery_address.user_id = user_info.id');
        $this->db->where('user_info.user_group', 3);
        $this->db->order_by('user_info.created_at', 'desc');
        $query = $this->db->get();
        $result = $query->result();
       
        
        $data['result'] = $result;

        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
//        $data['admin_top_menu'] = "";
        $data['nav_left']     = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right']    = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body']   = $this->load->view('admin-home/user/all-customer', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function create() {

        $data                 = array();
        $data['menu']         = 'user';
        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        //$data['admin_top_menu'] = "";
        $data['nav_left']     = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right']    = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body']   = $this->load->view('admin-home/user/new-user', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function delete_user($id) {
        $response = $this->db
                ->where('id', $id)
                ->set('status', 0)
                ->update('user_info');

        $sess['success'] = '<p style="color:green">Deleted Successfully!</p>';
        $this->session->set_userdata($sess);
        redirect('admin/user');
    }

    public function re_active($id) {
        $response = $this->db
                ->where('id', $id)
                ->set('status', 1)
                ->update('user_info');

        $sess['success'] = '<p style="color:green">Re-activated Successfully!</p>';
        $this->session->set_userdata($sess);
        redirect('admin/user');
    }

    public function de_active() {
        $data           = array();
        $data['menu']   = 'user';
        $data['result'] = $this->db
                ->select('*')
                ->where('user_group !=', 1)
                ->where('status', 0)
                ->get('user_info')
                ->result();

        $data['admin_header'] = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        //$data['admin_top_menu'] = "";
        $data['nav_left']     = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right']    = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body']   = $this->load->view('admin-home/user/all-de-active-user', $data, TRUE);
        $data['admin_footer'] = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function update_user() {
        $this->load->library('form_validation');
        $data         = array();
        $data['menu'] = 'user';

        $id = $this->input->post('id');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        //$this->form_validation->set_rules('name', 'Name', 'required|trim|callback_fullname_check');
        //$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|alpha_numeric|is_unique[user_info.username]', array('is_unique' => 'This username is already taken.'));
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]|max_length[30]|alpha_numeric_spaces');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]|max_length[30]|alpha_numeric_spaces');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        //$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user_info.email]', array('is_unique' => 'This email already exists.'));
        //$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        //$this->form_validation->set_rules('confirm_password', 'Confirmed Password', 'required|min_length[5]|matches[password]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim');
        $this->form_validation->set_rules('user_group', 'User Group', 'trim');

        if ($this->form_validation->run() == FALSE) {

            $form_validation['message'] = 'Registration failed due to bellow reason.';
            $form_validation['reason']  = 'form_validation';
            $form_validation['field']   = $this->form_validation->error_array();
            $data['form_validation']    = json_encode($form_validation);

            $data['users']          = $this->db
                    ->select('*')
                    ->where('id', $id)
                    ->get('user_info')
                    ->row();
            $data['admin_header']   = $this->load->view('admin-home/common/admin-header', $data, TRUE);
            $data['admin_top_menu'] = "";
            $data['nav_left']       = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
            $data['nav_right']      = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
            $data['admin_body']     = $this->load->view('admin-home/user/edit-user', $data, TRUE);
            $data['admin_footer']   = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
            $this->load->view('admin-home/admin-master-page', $data);
        } else {
            if ($_FILES['profile_image']['name'] != '') {
                //$config['upload_path'] = './resources/updates/';
                $config['upload_path']   = './resources/profile-images/';
                $config['allowed_types'] = '*';
                $config['overwrite']     = false;
                $this->upload->initialize($config);
                $this->upload->do_upload('profile_image');
                $image_des               = $this->upload->data();
                $file_name               = $image_des['file_name'];
                $profile_image           = $file_name;
            } else {
                $profile_image = '';
            }

            $updatedata['first_name'] = $this->form_validation->set_value('first_name');
            $updatedata['last_name']  = $this->form_validation->set_value('last_name');
            $updatedata['email']      = $this->form_validation->set_value('email');
            $updatedata['mobile']     = $this->form_validation->set_value('mobile');
            $updatedata['user_group'] = $this->form_validation->set_value('user_group');
            if ($profile_image != '') {
                $updatedata['profile_image'] = $profile_image;
            }
            $updatedata['updated_at'] = $this->updated_at;
            $status                   = $this->db->where('id', $id)->update('user_info', $updatedata);

            if ($status == 1) {
                $sess['success'] = '<p style="color:green">User info has been updated!</p>';
                $this->session->set_userdata($sess);

                redirect('admin/user/edit_user/' . $id);
            } else {
                /*
                  echo '<p style="color:red">Oh! Registration fail. Try again.</p>';
                 * 
                 */
                $sess['exception']      = '<p style="color:red">Update Fail!</p>';
                $this->session->set_userdata($sess);
                $data['users']          = $this->db
                        ->select('*')
                        ->where('id', $id)
                        ->get('user')
                        ->row();
                $data['admin_header']   = $this->load->view('admin-home/common/admin-header', $data, TRUE);
                $data['admin_top_menu'] = "";
                $data['nav_left']       = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
                $data['nav_right']      = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
                $data['admin_body']     = $this->load->view('admin-home/user/edit-user', $data, TRUE);
                $data['admin_footer']   = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
                $this->load->view('admin-home/admin-master-page', $data);
            }
        }
    }

    public function edit_user($id) {
        $data                   = array();
        $data['menu']           = 'user';
        $data['users']          = $this->db
                ->select('*')
                ->where('id', $id)
                ->get('user_info')
                ->row();
        $data['admin_header']   = $this->load->view('admin-home/common/admin-header', $data, TRUE);
        $data['admin_top_menu'] = "";
        $data['nav_left']       = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
        $data['nav_right']      = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
        $data['admin_body']     = $this->load->view('admin-home/user/edit-user', $data, TRUE);
        $data['admin_footer']   = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
        $this->load->view('admin-home/admin-master-page', $data);
    }

    public function user_registration() {

        $this->load->library('form_validation');
        $data         = array();
        $data['menu'] = 'user';

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

//        $this->form_validation->set_rules('name', 'Name', 'required|trim|callback_fullname_check');
//        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|alpha_numeric|is_unique[user_info.username]', array('is_unique' => 'This username is already taken.'));
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]|max_length[30]|alpha_numeric_spaces');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]|max_length[30]|alpha_numeric_spaces');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user_info.email]', array('is_unique' => 'This email already exists.'));
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Confirmed Password', 'required|min_length[5]|matches[password]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim');
        $this->form_validation->set_rules('user_group', 'User Group', 'trim');

        if ($this->form_validation->run() == FALSE) {

            $form_validation['message'] = 'Registration failed due to bellow reason.';
            $form_validation['reason']  = 'form_validation';
            $form_validation['field']   = $this->form_validation->error_array();
            $data['form_validation']    = json_encode($form_validation);

            $data['admin_header']   = $this->load->view('admin-home/common/admin-header', $data, TRUE);
            $data['admin_top_menu'] = "";
            $data['nav_left']       = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
            $data['nav_right']      = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
            $data['admin_body']     = $this->load->view('admin-home/user/new-user', $data, TRUE);
            $data['admin_footer']   = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
            $this->load->view('admin-home/admin-master-page', $data);
        } else {
            $password      = $this->form_validation->set_value('password');
            //http://php.net/manual/en/function.password-hash.php
            $options       = [
                'cost' => 12,
            ];
            $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);


            if ($_FILES['profile_image']['name'] != '') {
//            $config['upload_path'] = './resources/updates/';
                $config['upload_path']   = './resources/profile-images/';
                $config['allowed_types'] = '*';
                $config['overwrite']     = false;
                $this->upload->initialize($config);
                $this->upload->do_upload('profile_image');
                $image_des               = $this->upload->data();
                $file_name               = $image_des['file_name'];
                $profile_image           = $file_name;
            } else {
                $profile_image = '';
            }

            $user_info = array(
                'first_name'    => $this->form_validation->set_value('first_name'),
                'last_name'     => $this->form_validation->set_value('last_name'),
                'email'         => $this->form_validation->set_value('email'),
                'password'      => $password_hash,
                'mobile'        => $this->form_validation->set_value('mobile'),
                'user_group'    => $this->form_validation->set_value('user_group'),
                'profile_image' => $profile_image,
                'status'        => 1,
                'created_at'    => $this->created_at,
                'updated_at'    => $this->updated_at,
            );

            $status = $this->db->insert('user_info', $user_info);

            if ($status == 1) {

                $sess['success'] = '<p style="color:green">Registration has been completed Successfully!</p>';
                $this->session->set_userdata($sess);
                redirect('admin/user/create');
            } else {
                /*
                  echo '<p style="color:red">Oh! Registration fail. Try again.</p>';
                 * 
                 */
                $sess['exception']      = '<p style="color:red">Registration Fail!</p>';
                $this->session->set_userdata($sess);
                $data['admin_header']   = $this->load->view('admin-home/common/admin-header', $data, TRUE);
                $data['admin_top_menu'] = "";
                $data['nav_left']       = $this->load->view('admin-home/common/admin-nav-left', $data, TRUE);
                $data['nav_right']      = $this->load->view('admin-home/common/admin-nav-right', $data, TRUE);
                $data['admin_body']     = $this->load->view('admin-home/user/new-user', $data, TRUE);
                $data['admin_footer']   = $this->load->view('admin-home/common/admin-footer', $data, TRUE);
                $this->load->view('admin-home/admin-master-page', $data);
            }
        }
    }

    //Generate random order number with combination character and number
    public function mt_rand_str($l, $c = 'abcdefghijklmnopqrstuvwxyz') {
        for ($s = '', $cl = strlen($c) - 1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i);
        return $s;
    }

}
