<?php
class M_data extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  function get_data($table)
  {
    return $this->db->get($table);
  }
  function get_data_by_id($table, $where)
  {
    return $this->db->get_where($table, $where);
  }
  function simpan_data($table, $data)
  {
    $this->db->insert($table, $data);
  }
  function update_data($table, $data, $where)
  {
    $this->db->update($table, $data, $where);
  }
  function hapus_data($table, $where)
  {
    $this->db->delete($table, $where);
  }

  function user_list()
  {
    return $this->db->query("SELECT
    id_user,
    name,
    username,
    password,
    is_active,
    tur.role_name
  from
    tbl_user tu
  join tbl_user_role tur on
    tur.id_role = tu.role_id");
  }
}
