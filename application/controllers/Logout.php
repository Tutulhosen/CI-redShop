<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function user_logout() {
       
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('first_name');
        $this->session->unset_userdata('mobile');
        session_destroy();


        $sess['success'] = 'You are successfully logged out.';
        $this->session->set_userdata($sess);
        redirect('home');
    }

}
