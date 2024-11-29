<?php

class GolonganModel extends CI_Model
{

    function getRekapAllDataPegwai()
    {

        logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'get rekap all data pegawai'
        );
       
        $query = $this->db->get('r_golongan');
        return $query->result();

    }

    function saveDataGolongan($dataGolongan)
    {
        logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'save data pegawai started'
                  );
        
        if($this->db->insert('r_golongan', $dataGolongan))
        {
            $rowAffected = $this->db->affected_rows();
            return 'success save data golongan with '.$rowAffected.' record';  
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

}