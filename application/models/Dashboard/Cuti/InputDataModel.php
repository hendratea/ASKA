<?php

class InputDataModel extends CI_Model
{

  function m_cekExist_Cuti($tglDibuat)
  {
    $this->db->escape($tglDibuat);
    $query = $this->db->get_where('c_cuti', ['tgl_dibuat' => $tglDibuat]);
    return ($query->num_rows() > 0) ? FALSE : TRUE;
  }
  function m_getRefCuti()
  {
    return $this->db->get('r_cuti')->result();
  }

  // --------------------------------------- CRUD ---------------------------------------
  function m_get_Cuti()
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
    $this->db->from('c_cuti a');
    $this->db->join('r_cuti b', 'a.r_cuti = b.ID', 'left');
    $this->db->join('a_pegawai c', 'a.IDPEG = c.IDPEG', 'left');
    //$this->db->where('a.r_cuti > 1');
    //$this->db->order_by('a.r_user','ASC');

    return $this->db->get()->result();
  }



}