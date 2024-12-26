<?php

class refCutiModel extends CI_Model
{

  function m_cekExist_refCuti($cutiId)
  {
    $this->db->escape($cutiId);
    $query = $this->db->get_where('r_cuti', ['ID' => $cutiId]);
    return ($query->num_rows() > 0) ? FALSE : TRUE;
  }

  // --------------------------------------- CRUD ---------------------------------------
  function m_get_refCuti()
  {
    return $this->db->get('r_cuti')->result();
  }

  function m_save_refCuti($dataCuti)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'save referensi cuti'
    );

    if ($this->db->insert('r_cuti', $dataCuti)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'save referensi cuti failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_delete_refCuti($cutiId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'delete referensi cuti'
    );

    if ($this->db->delete('r_cuti', ['ID' => $cutiId])) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'delete referensi cuti failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_update_refCuti($updateData, $cutiId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'update referensi cuti'
    );

    $whereUpdate = ['ID' => $cutiId];
    if ($this->db->update('r_cuti', $updateData, $whereUpdate)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'update referensi cuti failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_get_refCutiForUpdate($cutiId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'get referensi cuti for update'
    );
    $query = $this->db->get_where('r_cuti', ['ID' => $cutiId]);
    if (!$query) {
      return FALSE;
    }
    return $query->row();
  }

}