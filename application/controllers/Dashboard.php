<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function index()
    {
        $data = [
            'title' => 'Dashboard',
            'conten' => 'conten/dashboard'
        ];
        $this->load->view('template/conten',$data);
    }
}
