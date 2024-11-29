<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RekapDataAll extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/Pegawai/RekapDataAllModel' , 'rekapDataAllModel', TRUE);
  }

  function index()  
  {
    logActivity(date("Y-m-d").' '.date("H:i:s"), getBrowser(), $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' ');
    
    $data = array(
      'titleWeb'            => 'Pegawai - Rekap All',
      'headerView'          => HEADER_VIEW,
      'navMenu'             => NAVIGATION_MENU,
      'headerTitle'         => 'Rekap All Pegawai',
      'iconPathHeader'      => 'zmdi zmdi-home',
      'pathHeader'          => 'Pegawai - Rekap All',
      'contentView'         => 'dashboard/pegawai/rekap_all',
    );

    
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  function getDataRekapAllPegawai()
  {
    header('Content-Type: application/json');
    $dataRekapAll = $this->rekapDataAllModel->getRekapAllDataPegwai();

    $no = 1;
    $data = [];
      foreach ($dataRekapAll as $r) {
          $data[] = array(
              $no++,
              $r->IDPEG,
              $r->Nama,
              $r->Tmp_lahir,
              $r->Tgl_lahir,
          );
      }
      $result = array(
          "data" => $data
      );
      echo json_encode($result);
      exit();

  }


}