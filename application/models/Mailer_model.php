<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Mailer_model extends CI_Model {

    /**
     * sends mail
     * @author Md. Moshahed Alam
     * Email: moshahed777@gmail.com
     */
  

    function sendeEmailWelcome($data, $templateName) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => '',
            'smtp_port' => 25,
            'smtp_user' => '',
            'smtp_pass' => '',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email');
        
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);
//		echo $body; 
//                exit();
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }
    
    function sendeEmail($data, $templateName) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => '',
            'smtp_port' => 25,
            'smtp_user' => '',
            'smtp_pass' => '',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email');

        $this->email->set_mailtype('html');
//            $this->email->from($data['from_address'],$data['admin_full_name']);
        $this->email->from($data['from_address'], 'From: User <icdrm2019@gmail.com>');
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);
//		echo $body; 
//                exit();
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }
    
     public function checkUserExistingEmail($user_email) {
//        return $this->db
//                        ->where('email', $user_email)
//                        ->get('user_info')
//                        ->row();
        return $query = $this->db->query("SELECT * FROM user_info WHERE email='$user_email'");
    }

    function sendActivatedEmail($data, $templateName) {
       

        $this->load->library('email');

        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);
        echo $body; 
        exit();
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

    function sendeEmailActivationSuccess($data, $templateName) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => '',
            'smtp_port' => 25,
            'smtp_user' => '',
            'smtp_pass' => '',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config);
        
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);
//		echo $body; 
//                exit();
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

    function sendeEmailPasswordRecoverySuccess($data, $templateName) {
        $config = Array(
//            'protocol' => 'smtp',
//            'smtp_host' => '',
//            'smtp_port' => 25,
//            'smtp_user' => '',
//            'smtp_pass' => '',
//            'mailtype' => 'html',
//            'charset' => 'iso-8859-1'
        );

//        $this->load->library('email', $config);
        $this->load->library('email');

        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);
//		echo $body; 
//                exit();
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }



}
