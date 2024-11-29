<?php

class InputDataModel extends CI_Model
{

    function saveDataPegawai($dataPegawai)
    {
        logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'save data pegawai started'
                  );
        

        $this->db->select("CONCAT('peg',LPAD(max(cast(right(IDPEG,7) as int)) + 1, 7, '0')) as id_pegawai");
        $idPegawai =  $this->db->get('a_pegawai')->row()->id_pegawai;
        $dataPegawai['IDPEG'] = $idPegawai;
        if($this->db->insert('a_pegawai', $dataPegawai))
        {
            $rowAffected = $this->db->affected_rows();
            return 'success save data pegawai with '.$rowAffected.' record';  
        }else{
            $error_query = $this->db->error();
            logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'save data pegawai failed : '. $error_query['message'] 
                    );
            return $error_query['message'];  
            // return FALSE;
        }

    }

    function getDataPegawai()
    {
        logActivity(date("Y-m-d").' '.date("H:i:s"), getBrowser(), $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' ');
        $this->db->select('a.*');
		$this->db->select('b.role_name');
        $this->db->from('user_accounts a');
        $this->db->join('roles b', "a.user_role = b.role_id",'left');

        return $this->db->get()->result();
    }
    

    

}