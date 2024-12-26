<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class CetakData extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/Ijin/CetakDataModel', 'cetakdataModel', TRUE);
  }

  function index()
  {
    $data = [
      'titleWeb' => 'Ijin - Cetak Data',
      'headerView' => HEADER_VIEW,
      'footerView' => FOOTER_VIEW,
      'navMenu' => NAVIGATION_MENU,
      'headerTitle' => 'Kirim/Cetak Ijin',
      'iconPathHeader' => 'zmdi zmdi-home',
      'pathHeader' => 'Ijin - Cetak Data',
      'contentView' => 'dashboard/ijin/cetakdata',
    ];
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  // --------------------------------------- CRUD ---------------------------------------
  function get_Ijin()
  {
    $idPeg = $this->session->userdata('logged_IDPEG');
    header('Content-Type: application/json');
    $dataIjin = $this->cetakdataModel->m_get_Ijin($idPeg);

    //$no = 1;
    $data = [];
    foreach ($dataIjin as $r) {
      $data[] = [
        ($r->disetujui == 1) ? 
        '<button class="btn btn-primary btn-sm" onclick="confirmPrintData(' . "'$r->tgl_dibuat','$idPeg'" . ')"><i class="zmdi zmdi-edit"></i> Cetak</button>' 
        : 
        '<button class="btn btn-danger btn-sm" onclick="confirmSendingData(' . "'$r->tgl_dibuat','$idPeg'" . ')"><i class="zmdi zmdi-mail-send"></i> Kirim</button>',
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

}