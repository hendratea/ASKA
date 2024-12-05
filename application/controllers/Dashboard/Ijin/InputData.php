<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class InputData extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/Ijin/InputDataModel', 'inputdataModel', TRUE);
  }

  function index()
  {
    $listRefIjin = $this->inputdataModel->m_getRefIjin();
    $data = [
      'titleWeb' => 'Ijin - Input Data',
      'headerView' => HEADER_VIEW,
      'navMenu' => NAVIGATION_MENU,
      'headerTitle' => 'Input Data Ijin',
      'iconPathHeader' => 'zmdi zmdi-home',
      'pathHeader' => 'Ijin - Input Data',
      'contentView' => 'dashboard/ijin/inputdata',
      'listRefIjin' => $listRefIjin
    ];
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  // --------------------------------------- CRUD ---------------------------------------
  function get_Ijin()
  {
    header('Content-Type: application/json');
    $dataIjin = $this->inputdataModel->m_get_Ijin();

    $no = 1;
    $data = [];
    foreach ($dataIjin as $r) {
      $data[] = [
        $r->IDPEG,
        $r->nama,
        $r->disetujui,
        $r->status,
        $r->tgl_dibuat,
        $r->tgl_awal,
        $r->tgl_akhir,
        $r->jml_hari,
        $r->alasan,
        '<button class="btn btn-primary btn-sm" onclick="confirmUpdateData(' . "'$r->IDPEG'" . ')"><i class="zmdi zmdi-edit"></i></button>
         <button class="btn btn-danger btn-sm"  onclick="confirmDeleteData(' . "'$r->IDPEG'" . ')"><i class="zmdi zmdi-delete"></i></button>'
      ];
    }
    $result = ["data" => $data];
    echo json_encode($result);
  }



}