<?php

class refGolonganModel extends CI_Model
{

  function m_cekExist_refGolongan($golonganId)
  {
    $this->db->escape($golonganId);
    $query = $this->db->get_where('r_golongan', ['ID' => $golonganId]);
    return ($query->num_rows() > 0) ? FALSE : TRUE;
  }

  // --------------------------------------- CRUD ---------------------------------------
  function m_get_refGolongan()
  {
    return $this->db->get('r_golongan')->result();
  }

  function m_save_refGolongan($dataGolongan)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'save referensi golongan'
    );

    if ($this->db->insert('r_golongan', $dataGolongan)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'save referensi golongan failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_delete_refGolongan($golonganId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'delete referensi golongan'
    );

    if ($this->db->delete('r_golongan', ['ID' => $golonganId])) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'delete referensi golongan failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_update_refGolongan($updateData, $golonganId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'update referensi golongan'
    );

    $whereUpdate = ['ID' => $golonganId];
    if ($this->db->update('r_golongan', $updateData, $whereUpdate)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'update referensi golongan failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

  function m_get_refGolonganForUpdate($golonganId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'get referensi golongan for update'
    );
    $query = $this->db->get_where('r_golongan', ['ID' => $golonganId]);
    if (!$query) {
      return FALSE;
    }
    return $query->row();
  }

}