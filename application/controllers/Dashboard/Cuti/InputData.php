<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class InputData extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/Cuti/InputDataModel', 'inputdataModel', TRUE);
  }

  function index()
  {
    $listRefCuti = $this->inputdataModel->m_getRefCuti();
    $data = [
      'titleWeb' => 'Cuti - Input Data',
      'headerView' => HEADER_VIEW,
      'navMenu' => NAVIGATION_MENU,
      'headerTitle' => 'Input Data Cuti',
      'iconPathHeader' => 'zmdi zmdi-home',
      'pathHeader' => 'Cuti - Input Data',
      'contentView' => 'dashboard/cuti/inputdata',
      'listRefCuti' => $listRefCuti
    ];
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  // --------------------------------------- CRUD ---------------------------------------
  function get_Cuti()
  {
    header('Content-Type: application/json');
    $dataCuti = $this->inputdataModel->m_get_Cuti();

    $no = 1;
    $data = [];
    foreach ($dataCuti as $r) {
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