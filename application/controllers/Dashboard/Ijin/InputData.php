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
      'footerView' => FOOTER_VIEW,
      'navMenu' => NAVIGATION_MENU,
      'headerTitle' => 'Input Data Ijin',
      'iconPathHeader' => 'zmdi zmdi-home',
      'pathHeader' => 'Ijin - Input Data',
      'contentView' => 'dashboard/ijin/inputdata',
      'listRefIjin' => $listRefIjin
    ];
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  function get_refLiburNasional($tglA, $tglB)
  {
    header('Content-Type: application/json');
    $dataLibur = $this->inputdataModel->m_getRefLiburNasional($tglA, $tglB);
    $data = [];
    foreach ($dataLibur as $r) {
      $data[] = [
        $r->ID,
        $r->status,
        $r->tgllibur
      ];
    }
    $result = ["data" => $data];
    //echo json_encode($result);
    return $result;
  }

  // --------------------------------------- CRUD ---------------------------------------
  function get_Ijin()
  {
    $idPeg = $this->session->userdata('logged_IDPEG');
    header('Content-Type: application/json');
    $dataIjin = $this->inputdataModel->m_get_Ijin($idPeg);

    //$no = 1;
    $data = [];
    foreach ($dataIjin as $r) {
      $data[] = [
        '<button class="btn btn-primary btn-sm" onclick="confirmUpdateData(' . "'$r->tgl_dibuat','$idPeg'" . ')"><i class="zmdi zmdi-edit"></i></button>
        <button class="btn btn-danger btn-sm"  onclick="confirmDeleteData(' . "'$r->tgl_dibuat','$idPeg'" . ')"><i class="zmdi zmdi-delete"></i></button>',
        $r->IDPEG,
        $r->nama,
        ($r->disetujui == 0) ? '<font color="red">Belum' : '<font color="green">Sudah',
        $r->status,
        date('Y-m-d', strtotime($r->tgl_dibuat)),
        date('Y-m-d', strtotime($r->tgl_awal)),
        date('Y-m-d', strtotime($r->tgl_akhir)),
        $r->jml_hari . " hari",
        $r->alasan
      ];
    }
    $result = ["data" => $data];
    echo json_encode($result);
  }

  function save_Ijin()
  {
    $idPeg = $this->session->userdata('logged_IDPEG');
    $tglDibuat = $this->input->post('ajax_tgl_dibuat');
    if (!$this->inputdataModel->m_cekExist_Ijin($tglDibuat, $idPeg)) {
      $result = ["statusInsertToDb" => 2];
      echo json_encode($result);
      exit();
    }
    $dataIjin = [
      'IDPEG' => $idPeg,
      'r_ijin' => $this->input->post('ajax_r_ijin'),
      'tgl_dibuat' => $tglDibuat,
      'tgl_awal' => $this->input->post('ajax_tgl_awal'),
      'tgl_akhir' => $this->input->post('ajax_tgl_akhir'),
      'jml_hari' => $this->input->post('ajax_jml_hari'),
      'alasan' => $this->input->post('ajax_alasan'),
    ];
    $statusInsert = $this->inputdataModel->m_save_Ijin($dataIjin);
    $result = ["statusInsertToDb" => $statusInsert];
    echo json_encode($result);
  }

  function delete_Ijin()
  {
    $idPeg = $this->session->userdata('logged_IDPEG');
    $tglDibuat = $this->input->post('ajax_tgl_dibuat');
    $statusDelete = $this->inputdataModel->m_delete_Ijin($tglDibuat, $idPeg);
    $result = ["statusDeleteToDb" => $statusDelete];
    echo json_encode($result);
  }

  function update_Ijin()
  {
    $idPeg = $this->session->userdata('logged_IDPEG');
    $tglDibuat = $this->input->post('ajax_tgl_dibuat');
    $updateData = [
      'IDPEG' => $idPeg,
      'r_ijin' => $this->input->post('ajax_r_ijin'),
      'tgl_dibuat' => $tglDibuat,
      'tgl_awal' => $this->input->post('ajax_tgl_awal'),
      'tgl_akhir' => $this->input->post('ajax_tgl_akhir'),
      'jml_hari' => $this->input->post('ajax_jml_hari'),
      'alasan' => $this->input->post('ajax_alasan'),
    ];
    $statusUpdate = $this->inputdataModel->m_update_Ijin($updateData, $tglDibuat, $idPeg);
    $result = ["statusUpdateToDb" => $statusUpdate];
    echo json_encode($result);
  }

  function get_IjinForUpdate()
  {
    header('Content-Type: application/json');
    $idPeg = $this->input->get('ajax_IDPEG');
    $tglDibuat = $this->input->get('ajax_tgl_dibuat');
    $dataIjin = $this->inputdataModel->m_get_IjinForUpdate($tglDibuat, $idPeg);
    echo json_encode($dataIjin);
  }



}