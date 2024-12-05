<?php

class RekapDataAllModel extends CI_Model
{

  function getRekapAllDataPegawai()
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'get rekap all data pegawai'
    );

    $query = $this->db->get('v_pegawai_all');
    return $query->result();
  }

}