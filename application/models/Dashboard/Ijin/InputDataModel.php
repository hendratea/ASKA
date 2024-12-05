<?php

class InputDataModel extends CI_Model
{

  function m_cekExist_Ijin($tglDibuat)
  {
    $this->db->escape($tglDibuat);
    $query = $this->db->get_where('b_ijin', ['tgl_dibuat' => $tglDibuat]);
    return ($query->num_rows() > 0) ? FALSE : TRUE;
  }
  function m_getRefIjin()
  {
    return $this->db->get('r_ijin')->result();
  }

  // --------------------------------------- CRUD ---------------------------------------
  function m_get_Ijin()
  {
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
    //$this->db->where('a.r_ijin > 1');
    //$this->db->order_by('a.r_user','ASC');

    return $this->db->get()->result();
  }



}