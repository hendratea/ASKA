<?php

class UserModel extends CI_Model
{

    function checExistUserId($userId)
    {
        $this->db->escape($userId);
        $query = $this->db->get_where('z_user', array('user' => $userId));
        return ($query->num_rows() > 0) ? FALSE : TRUE;
    }

    function getDataSettingUserForUpdate($userId)
    {

        logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'get data setting user for update'
        );
       
        $query = $this->db->get_where('z_user', array('user' => $userId));
        if (!$query) {
            return FALSE;
        }
        return $query->row();

    }

    function getDataUser()
    {

        logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'get rekap all data pegawai'
        );
       
        $query = $this->db->get('r_golongan');
        return $query->result();

    }

    function getRoleUser()
    {
        return $this->db->get('r_user')->result();
    }

    function getIdPegawai()
    {
        return $this->db->get('a_pegawai')->result();
    }

    function getDataSettingUser()
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

        return $this->db->get()->result();
    }

    function saveDataUser($dataUser)
    {
        logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'save data user'
                  );
        
        if($this->db->insert('z_user', $dataUser))
        {
            $rowAffected = $this->db->affected_rows();
            return $rowAffected;
            // return 'success save data user with '.$rowAffected.' record';  
        }else{
            $error_query = $this->db->error();
            logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'save data golongan failed : '. $error_query['message'] 
                    );
            return $error_query['message'];  
            // return FALSE;
        }
    }

    function deleteDataUser($userId)
    {
        logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'delete data user'
                  );

        if($this->db->delete('z_user', array('user' => $userId)))
        {
            $rowAffected = $this->db->affected_rows();
            return $rowAffected;
        }else{
            $error_query = $this->db->error();
            logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'delete data user failed : '. $error_query['message'] 
                    );
            return $error_query['message'];  
        }
    }

    function updateDataUser($updateData, $userId)
    {
        $whereUpdate = array(
            'user'           => $userId
        );
        if($this->db->update('z_user', $updateData, $whereUpdate))
        {
            $rowAffected = $this->db->affected_rows();
            return $rowAffected;
        }else{
            $error_query = $this->db->error();
            logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'update data failed : '. $error_query['message'] 
                    );
            return $error_query['message'] ;
        }
    }

}