<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
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
            'title' => 'Role',
            'conten' => 'role/index',
            'footer_js' => array('assets/js/rolejs.js')
        ];
        $this->load->view('template/conten', $data);
    }


    function tableRole()
    {
        $data['master_roles'] = $this->M_data->get_data('tbl_user_role')->result();

        echo json_encode($this->load->view('role/table', $data, false));
    }

    function store()
    {
        $id = $this->input->post('id');
        if ($id != null) {
            $table = 'tbl_user_role';
            $dataupdate = [
                'role_name' => $this->input->post('nama_role')
            ];
            $where = array('id_role' => $id);
            $this->M_data->update_data($table, $dataupdate, $where);
            // echo json_encode($data);
        } else {
            $table = 'tbl_user_role';
            $data = [
                'role_name' => $this->input->post('nama_role')
            ];
            $this->M_data->simpan_data($table, $data);
        }
    }

    function delete($id)
    {
        $table = 'tbl_user_role';
        $where = array('id_role' => $id);
        $this->M_data->hapus_data($table, $where);
    }

    function vedit($id)
    {
        $table = 'tbl_user_role';
        $where = array('id_role' => $id);
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
