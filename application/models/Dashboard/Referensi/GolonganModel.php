<?php

class GolonganModel extends CI_Model
{

  function getAllDataGolonganMDL()
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'get all data golongan'
    );

    $query = $this->db->get('r_golongan');
    return $query->result();
  }

  function saveDataGolonganMDL($dataGolongan)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'save data golongan started'
    );

    if ($this->db->insert('r_golongan', $dataGolongan)) {
      $rowAffected = $this->db->affected_rows();
      return 'success save data golongan with ' . $rowAffected . ' record';
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'save data golongan failed : ' . $error_query['message']
      );
      return $error_query['message'];
      // return FALSE;
    }
  }

  function deleteDataGolonganMDL($dataGolongan)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'delete data golongan started'
    );

    if ($this->db->delete('z_user', $dataGolongan)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'delete golongan user failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function updateDataGolonganMDL($dataGolongan)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'update data golongan started'
    );

    if ($this->db->update('z_user', $dataGolongan)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'update golongan user failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }


}