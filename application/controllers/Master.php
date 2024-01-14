<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
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
            'title' => 'Master Setting',
            'conten' => 'conten/master_setting'
        ];
        $this->load->view('template/conten', $data);
    }

    function dept()
    {
        $data = [
            'title' => 'Master Departemen',
            'conten' => 'departemen/index',
            'footer_js' => array('assets/js/deptjs.js')
        ];
        $this->load->view('template/conten', $data);
    }

    function tableDept()
    {
        $data['master_depts'] = $this->M_data->get_data('tbl_master_dept')->result();

        echo json_encode($this->load->view('departemen/table', $data, false));
    }

    function tambahDept()
    {
        $table = 'tbl_master_dept';
        $data = [
            'kode_dept' => $this->input->post('kode_dept'),
            'nama_dept' => $this->input->post('nama_dept')
        ];
        $this->M_data->simpan_data($table, $data);
        // redirect('Master/dept');
    }

    function hapusDept($id)
    {
        $table = 'tbl_master_dept';
        $where = array('id_dept' => $id);
        $this->M_data->hapus_data($table, $where);
    }

    function vedit($id)
    {
        // $table = 'tbl_master_dept';
        // $where = array('id_dept' => $id);
        // $this->M_data->get_data_by_id($table, $where);
        return $this->db->get_where('tbl_master_dept', array('id_dept' => $id))->row_array();
    }
}
