<?php

class RekapDataAllModel extends CI_Model
{

    function getRekapAllDataPegwai()
    {

        logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'get rekap all data pegawai'
        );
       
        $query = $this->db->get('a_pegawai');
        return $query->result();

    }

}