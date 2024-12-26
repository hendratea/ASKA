<?php

class refTugasModel extends CI_Model
{

  function m_cekExist_refTugas($tugasId)
  {
    $this->db->escape($tugasId);
    $query = $this->db->get_where('r_tugaskerja', ['ID' => $tugasId]);
    return ($query->num_rows() > 0) ? FALSE : TRUE;
  }

  // --------------------------------------- CRUD ---------------------------------------
  function m_get_refTugas()
  {
    return $this->db->get('r_tugaskerja')->result();
  }

  function m_save_refTugas($dataTugas)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'save referensi tugas kerja'
    );

    if ($this->db->insert('r_tugaskerja', $dataTugas)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'save referensi tugas kerja failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_delete_refTugas($tugasId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'delete referensi tugas kerja'
    );

    if ($this->db->delete('r_tugaskerja', ['ID' => $tugasId])) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'delete referensi tugas kerja failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_update_refTugas($updateData, $tugasId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'update referensi tugas kerja'
    );

    $whereUpdate = ['ID' => $tugasId];
    if ($this->db->update('r_tugaskerja', $updateData, $whereUpdate)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'update referensi tugas kerja failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_get_refTugasForUpdate($tugasId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'get referensi tugas kerja for update'
    );
    $query = $this->db->get_where('r_tugaskerja', ['ID' => $tugasId]);
    if (!$query) {
      return FALSE;
    }
    return $query->row();
  }

}