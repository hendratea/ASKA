<?php

class InputDataModel extends CI_Model
{

    function rAktifKerja()
    {
      return $this->db->get('r_aktifkerja')->result();
    }

    function rPendidikan()
    {
      return $this->db->get('r_pendidikan')->result();
    }

    function rGolongan()
    {
      return $this->db->get('r_golongan')->result();
    }

    function rStatusKerja()
    {
      return $this->db->get('r_statuskerja')->result();
    }

    function rTugasKerja()
    {
      return $this->db->get('r_tugaskerja')->result();
    }

    function rFungsiKerja()
    {
      return $this->db->get('r_fungsikerja')->result();
    }

    function saveDataPns($dataPns, $idPns)
    {
        logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'save data pns started'
                  );

        $dataPns['IDPEG'] = $idPns;
        if($this->db->insert('a_pns', $dataPns))
        {
            $rowAffected = $this->db->affected_rows();
            return $rowAffected;  
        }else{
            $error_query = $this->db->error();
            logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'save data pns failed : '. $error_query['message'] 
                    );
            return $error_query['message'];  
        }
        

    }

    function saveDataNonPns($dataNonPns, $idNonPns)
    {
        logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'save data non pns started'
                  );

        $dataNonPns['IDPEG'] = $idNonPns;
        if($this->db->insert('a_nonpns', $dataNonPns))
        {
            $rowAffected = $this->db->affected_rows();
            return $rowAffected;  
        }else{
            $error_query = $this->db->error();
            logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'save data non pns failed : '. $error_query['message'] 
                    );
            return $error_query['message'];  
        }
        
    }

    function saveDataPegawai($dataPegawai, $dataPnsOrNonPns)
    {
        logActivity(date("Y-m-d").' '.date("H:i:s"), 
                        getBrowser(), 
                        $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' '
                        . 'save data pegawai started'
                  );
        

        $this->db->select("CONCAT('peg',LPAD(max(cast(right(IDPEG,7) as int)) + 1, 7, '0')) as id_pegawai");
        $idPegawai =  $this->db->get('a_pegawai')->row()->id_pegawai;
        if($idPegawai==null){
          $dataPegawai['IDPEG'] = 'peg0000001';
        }else{
          $dataPegawai['IDPEG'] = $idPegawai;
        }
        
        if($this->db->insert('a_pegawai', $dataPegawai))
        {
            $rowAffected = $this->db->affected_rows();

            if($dataPegawai['pns']=='Y'){
              $this->saveDataPns($dataPnsOrNonPns, $dataPegawai['IDPEG']);
            }else{
              $this->saveDataNonPns($dataPnsOrNonPns, $dataPegawai['IDPEG']);
            }
            // return 'success save data pegawai with '.$rowAffected.' record';  
            return $rowAffected.'|'.$dataPegawai['IDPEG'];  
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

    function updatePhotoPegawai($dataUpdated, $whereUpdate)
    {
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'update photo pegawai'
      );
  

      if ($this->db->update('a_pegawai', $dataUpdated, $whereUpdate)) {
        $rowAffected = $this->db->affected_rows();
        return $rowAffected;
      } else {
        $error_query = $this->db->error();
        logActivity(
          date("Y-m-d") . ' ' . date("H:i:s"),
          getBrowser(),
          $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
          . 'update photo pegawai failed : ' . $error_query['message']
        );
        return $error_query['message'];
      }
    }
    
    function updateDataPns($updateDataPns, $idPegawai)
    {

      $whereUpdate = ['IDPEG' => $idPegawai];
      if ($this->db->update('a_pns', $updateDataPns, $whereUpdate)) {
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

    function updateDataNonPns($updateDataNonPns, $idPegawai)
    {

      $whereUpdate = ['IDPEG' => $idPegawai];
      if ($this->db->update('a_nonpns', $updateDataNonPns, $whereUpdate)) {
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

    function updateDataPegawai($updateData, $idPegawai, $dataPnsOrNonPns)
    {
      logActivity(
        date("Y-m-d") . ' ' . date("H:i:s"),
        getBrowser(),
        $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
        . 'update data user'
      );

      $whereUpdate = ['IDPEG' => $idPegawai];
      if ($this->db->update('a_pegawai', $updateData, $whereUpdate)) {
        $rowAffected = $this->db->affected_rows();

        if($updateData['pns']=='Y'){
          $this->updateDataPns($dataPnsOrNonPns, $idPegawai);
        }else{
          $this->updateDataNonPns($dataPnsOrNonPns, $idPegawai);
        }

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