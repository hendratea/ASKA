<?php

class refIjinModel extends CI_Model
{

  function m_cekExist_refIjin($ijinId)
  {
    $this->db->escape($ijinId);
    $query = $this->db->get_where('r_ijin', ['ID' => $ijinId]);
    return ($query->num_rows() > 0) ? FALSE : TRUE;
  }

  // --------------------------------------- CRUD ---------------------------------------
  function m_get_refIjin()
  {
    return $this->db->get('r_ijin')->result();
  }

  function m_save_refIjin($dataIjin)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'save referensi ijin kerja'
    );

    if ($this->db->insert('r_ijin', $dataIjin)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'save referensi ijin kerja failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_delete_refIjin($ijinId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'delete referensi ijin kerja'
    );

    if ($this->db->delete('r_ijin', ['ID' => $ijinId])) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'delete referensi ijin kerja failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_update_refIjin($updateData, $ijinId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'update referensi ijin kerja'
    );

    $whereUpdate = ['ID' => $ijinId];
    if ($this->db->update('r_ijin', $updateData, $whereUpdate)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'update referensi ijin kerja failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_get_refIjinForUpdate($ijinId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'get referensi ijin kerja for update'
    );
    $query = $this->db->get_where('r_ijin', ['ID' => $ijinId]);
    if (!$query) {
      return FALSE;
    }
    return $query->row();
  }

}