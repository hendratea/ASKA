<?php

class UserModel extends CI_Model
{

  function m_checExistUserId($userId)
  {
    $this->db->escape($userId);
    $query = $this->db->get_where('z_user', ['user' => $userId]);
    return ($query->num_rows() > 0) ? FALSE : TRUE;
  }
  function m_getRoleUser()
  {
    return $this->db->get('r_user')->result();
  }
  function m_getIdPegawai()
  {
    return $this->db->get('a_pegawai')->result();
  }


  // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> CRUD <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
  // function m_getDataUser()
  // {
  //   logActivity(
  //     date("Y-m-d") . ' ' . date("H:i:s"),
  //     getBrowser(),
  //     $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
  //     . 'get data user'
  //   );

  //   $query = $this->db->get('r_golongan');
  //   return $query->result();
  // }
  function m_getDataUserForUpdate($userId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'get data setting user for update'
    );
    $query = $this->db->get_where('z_user', ['user' => $userId]);
    if (!$query) {
      return FALSE;
    }
    return $query->row();
  }

  function m_getDataUser()
  {
    $this->db->select('a.user');
    $this->db->select('a.email');
    $this->db->select('a.aktif');
    $this->db->select('b.status as r_user');
    $this->db->select('a.IDPEG');
    $this->db->select('c.nama');
    $this->db->select('a.tgl_dibuat');
    $this->db->select('a.tgl_terakhir_login');
    $this->db->from('z_user a');
    $this->db->join('r_user b', 'a.r_user = b.id', 'left');
    $this->db->join('a_pegawai c', 'a.IDPEG = c.IDPEG', 'left');
    $this->db->where('a.r_user > 1');
    //$this->db->order_by('a.r_user','ASC');

    return $this->db->get()->result();
  }

  function m_saveDataUser($dataUser)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'save data user'
    );

    if ($this->db->insert('z_user', $dataUser)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
      // return 'success save data user with '.$rowAffected.' record';  
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'save data user failed : ' . $error_query['message']
      );
      return $error_query['message'];
      // return FALSE;
    }
  }

  function m_deleteDataUser($userId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'delete data user'
    );

    if ($this->db->delete('z_user', ['user' => $userId])) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
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

  function m_updateDataUser($updateData, $userId)
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'update data user'
    );

    $whereUpdate = ['user' => $userId];
    if ($this->db->update('z_user', $updateData, $whereUpdate)) {
      $rowAffected = $this->db->affected_rows();
      return $rowAffected;
    } else {
      $error_query = $this->db->error();
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'update data user failed : ' . $error_query['message']
      );
      return $error_query['message'];
    }
  }

}