<?php

class refFungsiModel extends CI_Model
{

  function m_cekExist_refFungsi($fungsiId)
  {
    $this->db->escape($fungsiId);
    $query = $this->db->get_where('r_fungsikerja', ['ID' => $fungsiId]);
    return ($query->num_rows() > 0) ? FALSE : TRUE;
  }

  // --------------------------------------- CRUD ---------------------------------------
  function m_get_refFungsi()
  {
    return $this->db->get('r_fungsikerja')->result();
  }

  function m_save_refFungsi($dataFungsi)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'save referensi fungsi kerja'
    );

    if ($this->db->insert('r_fungsikerja', $dataFungsi)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'save referensi fungsi kerja failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_delete_refFungsi($fungsiId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'delete referensi fungsi kerja'
    );

    if ($this->db->delete('r_fungsikerja', ['ID' => $fungsiId])) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'delete referensi fungsi kerja failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_update_refFungsi($updateData, $fungsiId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'update referensi fungsi kerja'
    );

    $whereUpdate = ['ID' => $fungsiId];
    if ($this->db->update('r_fungsikerja', $updateData, $whereUpdate)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'update referensi fungsi kerja failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_get_refFungsiForUpdate($fungsiId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'get referensi fungsi kerja for update'
    );
    $query = $this->db->get_where('r_fungsikerja', ['ID' => $fungsiId]);
    if (!$query) {
      return FALSE;
    }
    return $query->row();
  }

}