<?php
class M_count extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  function countDept() {
    return $this->db->query("SELECT * FROM tbl_master_dept")->num_rows();
  }

  function countRole() {
    return $this->db->query("SELECT * FROM tbl_user_role")->num_rows();
  }

  function countRolePermit() {
    return $this->db->query("SELECT * FROM tbl_master_role_permission")->num_rows();
  }

  function countModul() {
    return $this->db->query("SELECT * FROM tbl_modul")->num_rows();
  }

  function countMenu() {
    return $this->db->query("SELECT * FROM tbl_menu")->num_rows();
  }

}