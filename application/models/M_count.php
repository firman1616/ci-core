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

}