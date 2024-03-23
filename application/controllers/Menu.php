<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_setting','set');
        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {

        //     redirect(base_url("login"));
        // }
    }

    function index()
    {
        $data = [
            'title' => 'Menu',
            'conten' => 'menu/index',
            'footer_js' => array('assets/js/menujs.js'),
            'modul' => $this->M_data->get_data('tbl_modul'),
        ];
        $this->load->view('template/conten',$data);
    }

    function tableMenu()
    {
        $data['menu'] = $this->set->dataMenu()->result();

        echo json_encode($this->load->view('menu/table', $data, false));
    }

    function store()
    {
        $sts = $this->input->post('status');
        $id = $this->input->post('id');
        if ($id != null) {
            $table = 'tbl_menu';
            $dataupdate = [
                'nama_menu' => $this->input->post('nama_menu'),
                'url_menu' => $this->input->post('url_menu'),
                'modul_id' => $this->input->post('modul'),
                // 'status' => ($sts === '1') ? '1' : '0'
            ];
            $where = array('id_menu' => $id);
            $this->M_data->update_data($table, $dataupdate, $where);
            // echo json_encode($data);
        } else {
            $table = 'tbl_menu';
            $data = [
                'nama_menu' => $this->input->post('nama_menu'),
                'url_menu' => $this->input->post('url_menu'),
                'modul_id' => $this->input->post('modul'),
                'status' => ($sts === '1') ? '1' : '0'
            ];

            // die(var_dump($this->input->post('status')));
            $this->M_data->simpan_data($table, $data);
        }
    }

    // function delete($id)
    // {
    //     $table = 'tbl_menu';
    //     $where = array('id_menu' => $id);
    //     $this->M_data->hapus_data($table, $where);
    // }

    function updateStatus($id) {
        $table = 'tbl_menu';
        $where = array('id_menu' => $id);
        $data = $this->M_data->get_data_by_id($table, $where)->row();
        echo json_encode($data);
    }

    function vedit($id)
    {
        $table = 'tbl_menu';
        $where = array('id_menu' => $id);
        $data = $this->M_data->get_data_by_id($table, $where)->row();
        echo json_encode($data);
    }
}
