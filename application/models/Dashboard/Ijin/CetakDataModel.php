<?php

class CetakDataModel extends CI_Model
{

  // --------------------------------------- CRUD ---------------------------------------
  function m_get_Ijin($idPeg)
  {
    $log_id = $this->session->userdata('logged_user_id');
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $log_id . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'query cetak ijin'
    );
    $this->db->select('a.IDPEG');
    $this->db->select('c.nama');
    $this->db->select('a.disetujui');
    $this->db->select('b.status');
    $this->db->select('a.tgl_dibuat');
    $this->db->select('a.tgl_awal');
    $this->db->select('a.tgl_akhir');
    $this->db->select('a.jml_hari');
    $this->db->select('a.alasan');
    $this->db->from('b_ijin a');
    $this->db->join('r_ijin b', 'a.r_ijin = b.ID', 'left');
    $this->db->join('a_pegawai c', 'a.IDPEG = c.IDPEG', 'left');
    $this->db->where('a.IDPEG', $idPeg);
    //$this->db->where('a.disetujui', '0');
    //$this->db->order_by('a.r_user','ASC');

    return $this->db->get()->result();
  }


}