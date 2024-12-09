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

  function deleteDataPegawai($idPegawai)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'delete data pegawai'
    );

    
    if ($this->db->delete('a_pegawai', ['IDPEG' => $idPegawai])) {
      $rowAffected = $this->db->affected_rows();

      if($rowAffected==1){
        $this->db->delete('a_pns', ['IDPEG' => $idPegawai]);
        $this->db->delete('a_nonpns', ['IDPEG' => $idPegawai]);
      }

      return $rowAffected;
    } else {
      // $str = $this->db->last_query();
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'delete data user failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

}