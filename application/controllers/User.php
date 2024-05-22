<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
            'title' => 'User',
            'conten' => 'user/index',
            'footer_js' => array('assets/js/userjs.js'),
            'role' => $this->M_data->get_data('tbl_user_role')
        ];
        $this->load->view('template/conten', $data);
    }


    function tableUser()
    {
        $data['user'] = $this->M_data->user_list()->result();

        echo json_encode($this->load->view('user/table', $data, false));
    }

    function store()
    {
        $id = $this->input->post('id');
        if ($id != null) {
            $table = 'tbl_user';
            $dataupdate = [
                'name' => $this->input->post('nama_user'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('username')),
                'role_id' => $this->input->post('role'),
                'is_active' => 1
            ];
            $where = array('id_user' => $id);
            $this->M_data->update_data($table, $dataupdate, $where);
            // echo json_encode($data);
        } else {
            $table = 'tbl_user';
            $data = [
                'name' => $this->input->post('nama_user'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('username')),
                'role_id' => $this->input->post('role'),
                'is_active' => 1
            ];
            $this->M_data->simpan_data($table, $data);
        }
    }

    function delete($id)
    {
        $table = 'tbl_user';
        $where = array('id_user' => $id);
        $this->M_data->hapus_data($table, $where);
    }

    function vedit($id)
    {
        $table = 'tbl_user';
        $where = array('id_user' => $id);
        $data = $this->M_data->get_data_by_id($table, $where)->row();
        echo json_encode($data);
    }

    function role_permission() {
        $data = [
            'title' => 'Role Permission',
            'conten' => 'role_permission/index',
            'footer_js' => array('assets/js/rolepermissionjs.js')
        ];
        $this->load->view('template/conten', $data);
    }

    function tableRolepermission()
    {
        $data['master_role_permission'] = $this->M_data->get_data('tbl_master_role_permission')->result();

        echo json_encode($this->load->view('role_permission/table', $data, false));
    }

    function store_permission() {
        $id = $this->input->post('id');
        if ($id != null) {
            $table = 'tbl_master_role_permission';
            $dataupdate = [
                'name_permission' => $this->input->post('nama_role_permission')
            ];
            $where = array('id_permission' => $id);
            $this->M_data->update_data($table, $dataupdate, $where);
            // echo json_encode($data);
        } else {
            $table = 'tbl_master_role_permission';
            $data = [
                'name_permission' => $this->input->post('nama_role_permission')
            ];
            $this->M_data->simpan_data($table, $data);
        }
    }

    function veditpermission($id)
    {
        $table = 'tbl_master_role_permission';
        $where = array('id_permission' => $id);
        $data = $this->M_data->get_data_by_id($table, $where)->row();
        echo json_encode($data);
    }

    function deletepermission($id)
    {
        $table = 'tbl_master_role_permission';
        $where = array('id_permission' => $id);
        $this->M_data->hapus_data($table, $where);
    }

}
