<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modul extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {

        //     redirect(base_url("login"));
        // }
    }

    function index()
    {
        $data = [
            'title' => 'Modul',
            'conten' => 'modul/index',
            'footer_js' => array('assets/js/modul.js')
        ];
        $this->load->view('template/conten',$data);
    }

    function tableModul()
    {
        $data['modul'] = $this->M_data->get_data('tbl_modul')->result();

        echo json_encode($this->load->view('modul/table', $data, false));
    }

    function store()
    {
        $id = $this->input->post('id');
        if ($id != null) {
            $table = 'tbl_modul';
            $dataupdate = [
                'nama_modul' => $this->input->post('nama_modul'),
                'url_modul' => $this->input->post('url_modul'),
                'icon_modul' => $this->input->post('icon_modul'),
            ];
            $where = array('id_modul' => $id);
            $this->M_data->update_data($table, $dataupdate, $where);
            // echo json_encode($data);
        } else {
            $table = 'tbl_modul';
            $data = [
                'nama_modul' => $this->input->post('nama_modul'),
                'url_modul' => $this->input->post('url_modul'),
                'icon_modul' => $this->input->post('icon_modul'),
            ];
            $this->M_data->simpan_data($table, $data);
        }
    }

    function delete($id)
    {
        $table = 'tbl_modul';
        $where = array('id_modul' => $id);
        $this->M_data->hapus_data($table, $where);
    }

    function vedit($id)
    {
        $table = 'tbl_modul';
        $where = array('id_modul' => $id);
        $data = $this->M_data->get_data_by_id($table, $where)->row();
        echo json_encode($data);
    }
}
