<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Golongan extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/Referensi/GolonganModel', 'golonganModel', TRUE);
  }

  function index()
  {
    $data = [
      'titleWeb' => 'Referensi - Golongan',
      'headerView' => HEADER_VIEW,
      'navMenu' => NAVIGATION_MENU,
      'headerTitle' => 'Referensi - Golongan',
      'iconPathHeader' => 'zmdi zmdi-home',
      'pathHeader' => 'Referensi - Golongan',
      'contentView' => 'dashboard/referensi/golongan',
    ];

    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  function getDataGolongan()
  {
    header('Content-Type: application/json');
    $dataGolongan = $this->golonganModel->getAllDataGolonganMDL();

    $no = 1;
    $data = [];
    foreach ($dataGolongan as $r) {
      $data[] = [
        $r->ID,
        $r->status,
        $r->aptln,
        '<button class="btn btn-primary btn-sm edit-accounts"><i class="zmdi zmdi-edit"></i></button>
          <button class="btn btn-danger btn-sm" onclick="delete_manage_accounts(this.value,' . "'" . $r->ID . "'" . ',' . "'" . $r->ID . "'" . ')"><i class="zmdi zmdi-delete"></i></button>'
      ];
    }
    $result = [
      "data" => $data
    ];
    echo json_encode($result);
    exit();
  }

  function saveDataGolongan()
  {
    $dataGolongan = [
      'status' => $this->input->post('ajaxStatus'),
      'aptln' => $this->input->post('ajaxAptln'),
    ];

    $statusInsert = $this->golonganModel->saveDataGolonganMDL($dataGolongan);
    $result = [
      "statusInsertToDb" => $statusInsert,
    ];

    echo json_encode($result);
  }

}