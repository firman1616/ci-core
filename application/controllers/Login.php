<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function index()
    {
        $data = [
            'title' => 'Login Page',
            // 'conten' => 'conten/dashboard'
        ];
        $this->load->view('login',$data);
    }
}
