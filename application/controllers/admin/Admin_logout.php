<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Home
 * User: Moshahed Alam
 * Email: moshahed777@gmail.com
 * Date: Nov 2018
 * Time: 11:00 PM
 */
class Admin_logout extends CI_Controller {

    public function user_logout() {
        $this->session->unset_userdata('user_id');
//        $this->session->unset_userdata('first_name');
//        $this->session->unset_userdata('first_name');
        $this->session->unset_userdata('username');

//      if (isset($_COOKIE['remember_me'])) {
//                unset($_COOKIE['username']);
//                unset($_COOKIE['id']);
//                unset($_COOKIE['remember_me']);
//                setcookie('username', null, -1, '/');
//                setcookie('id', null, -1, '/');
//                setcookie('remember_me', null, -1, '/');
//            }

        $sess['notification_message'] = 'You Are Successfully Logout!';
        $this->session->set_userdata($sess);
        redirect('admin/admin_login');
    }

}
