<?php

class InputDataModel extends CI_Model
{

  function m_cekExist_Ijin($tglDibuat, $idPeg)
  {
    $this->db->escape($tglDibuat);
    $query = $this->db->get_where('b_ijin', ['tgl_dibuat' => $tglDibuat, 'IDPEG' => $idPeg]);
    return ($query->num_rows() > 0) ? FALSE : TRUE;
  }
  function m_getRefIjin()
  {
    return $this->db->get('r_ijin')->result();
  }
  function m_getRefLiburNasional($tglA, $tglB)
  {
    $sSql = "tgllibur between '$tglA' and '$tglA'";
    $this->db->select('*');
    $this->db->from('r_liburnasional');
    $this->db->where($sSql);
    return $this->db->get()->result();
  }

  // --------------------------------------- CRUD ---------------------------------------
  function m_get_Ijin($idPeg)
  {
    $log_id = $this->session->userdata('logged_user_id');
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $log_id . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'query input ijin'
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
    $this->db->where('a.disetujui', '0');
    //$this->db->order_by('a.r_user','ASC');

    return $this->db->get()->result();
  }

  function m_save_Ijin($dataIjin)
  {
    $log_id = $this->session->userdata('logged_user_id');
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $log_id . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'save input ijin'
    );
    if ($this->db->insert('b_ijin', $dataIjin)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $log_id . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'save input ijin failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_delete_Ijin($tglDibuat, $idPeg)
  {
    $log_id = $this->session->userdata('logged_user_id');
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $log_id . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'delete input ijin'
    );
    $where = ['tgl_dibuat' => $tglDibuat, 'IDPEG' => $idPeg, 'disetujui' => '0'];
    if ($this->db->delete('b_ijin', $where)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $log_id . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'delete input ijin failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_update_Ijin($updateData, $tglDibuat, $idPeg)
  {
    $log_id = $this->session->userdata('logged_user_id');
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $log_id . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'update input ijin'
    );
    $where = ['tgl_dibuat' => $tglDibuat, 'IDPEG' => $idPeg, 'disetujui' => '0'];
    if ($this->db->update('b_ijin', $updateData, $where)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $log_id . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'update input ijin failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_get_IjinForUpdate($tglDibuat, $idPeg)
  {
    $log_id = $this->session->userdata('logged_user_id');
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $log_id . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'get input ijin for update'
    );
    $where = ['tgl_dibuat' => $tglDibuat, 'IDPEG' => $idPeg, 'disetujui' => '0'];
    $query = $this->db->get_where('b_ijin', $where);
    if (!$query) {
      return FALSE;
    }
    return $query->row();

    // $this->db->select('a.r_ijin');
    // $this->db->select('a.tgl_dibuat');
    // $this->db->select('a.tgl_awal');
    // $this->db->select('a.tgl_akhir');
    // $this->db->select('a.jml_hari');
    // $this->db->select('a.alasan');
    // $this->db->from('b_ijin a');
    // $this->db->join('r_ijin b', 'a.r_ijin = b.ID', 'left');
    // $this->db->join('a_pegawai c', 'a.IDPEG = c.IDPEG', 'left');
    // $this->db->where('a.IDPEG', $idPeg);
    // $this->db->where('a.tgl_dibuat', $tglDibuat);
    // $query = $this->db->get();
    // return $query->row();

  }


}