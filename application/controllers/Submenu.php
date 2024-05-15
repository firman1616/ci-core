<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu extends CI_Controller
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
            'title' => 'Sub Menu',
            'conten' => 'sub_menu/index',
            'footer_js' => array('assets/js/submenujs.js'),
            'modul' => $this->M_data->get_data('tbl_modul'),
            // 'modul' => $this->M_data->get_data('tbl_modul')
        ];
        $this->load->view('template/conten',$data);
    }

    public function getMenu(){
        // Ambil data ID Provinsi yang dikirim via ajax post
        $modul_id = $this->input->post('modul');
        
        $menu = $this->set->selectMenu($modul_id);
        
        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>Pilih</option>";
        
        foreach($menu->result() as $data){
          $lists .= "<option value='".$data->id_menu."'>".$data->nama_menu."</option>"; // Tambahkan tag option ke variabel $lists
        }
        
        $callback = array('list_menu'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
      }
    

    // function getMenu() {
    //     $modul_id = $this->input->post('modul');
    //     $menu = $this->set->selectMenu($modul_id);
    //     // die(var_dump($modul_id));
    //     echo json_encode($menu);
    // }


    function tableSubMenu()
    {
        $data['submenu'] = $this->M_data->get_data('tbl_sub_menu')->result();

        echo json_encode($this->load->view('sub_menu/table', $data, false));
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
