<?php
class M_setting extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
  function dataMenu() {
    $this->db->select("tm.id_menu, tm.status, tm.nama_menu, tm.url_menu, tm.modul_id, tm2.nama_modul");
    $this->db->from("tbl_menu tm");
    $this->db->join('tbl_modul tm2','tm2.id_modul = tm.modul_id');
    return $this->db->get();

  }

}