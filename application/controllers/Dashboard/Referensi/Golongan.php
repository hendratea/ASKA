<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Golongan extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/Referensi/GolonganModel' , 'golonganModel', TRUE);
  }

  function index()  
  {
    logActivity(date("Y-m-d").' '.date("H:i:s"), getBrowser(), $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' ');
    
    $data = array(
      'titleWeb'            => 'Referensi - Golongan',
      'headerView'          => HEADER_VIEW,
      'navMenu'             => NAVIGATION_MENU,
      'headerTitle'         => 'Referensi - Golongan',
      'iconPathHeader'      => 'zmdi zmdi-home',
      'pathHeader'          => 'Referensi - Golongan',
      'contentView'         => 'dashboard/referensi/golongan',
    );

    
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  function getDataGolongan()
  {
    header('Content-Type: application/json');
    $dataGolongan = $this->golonganModel->getRekapAllDataPegwai();

    $no = 1;
    $data = [];
      foreach ($dataGolongan as $r) {
          $data[] = array(
              $r->ID,
              $r->Status,
              $r->APTLN,
              '<button class="btn btn-primary btn-sm edit-accounts"><i class="zmdi zmdi-edit"></i></button>
               <button class="btn btn-danger btn-sm" onclick="delete_manage_accounts(this.value,' . "'" . $r->ID . "'" . ',' . "'" . $r->ID . "'" . ')"><i class="zmdi zmdi-delete"></i></button>'
          );
      }
      $result = array(
          "data" => $data
      );
      echo json_encode($result);
      exit();
  }

  function saveDataGolongan()
  {
    $dataGolongan = array(
      // 'ID'           => $this->input->post('ajaxIdGolongan'),
      'Status'       => $this->input->post('ajaxStatus'),
      'APTLN'        => $this->input->post('ajaxAptln'),
      
    );
    $statusInsert = $this->golonganModel->saveDataGolongan($dataGolongan);
    $result = array(
      "statusInsertToDb" => $statusInsert,
    );

    echo json_encode($result);
  }

}