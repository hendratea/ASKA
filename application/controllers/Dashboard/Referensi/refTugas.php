<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class refTugas extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/Referensi/refTugasModel', 'reftugasModel', TRUE);
  }

  function index()
  {
    $data = [
      'titleWeb' => 'Referensi - Tugas',
      'headerView' => HEADER_VIEW,
      'navMenu' => NAVIGATION_MENU,
      'headerTitle' => 'Referensi - Tugas',
      'iconPathHeader' => 'zmdi zmdi-home',
      'pathHeader' => 'Referensi - Tugas',
      'contentView' => 'dashboard/referensi/reftugas'
    ];
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  // --------------------------------------- CRUD ---------------------------------------
  function get_refTugas()
  {
    header('Content-Type: application/json');
    $dataRefTugas = $this->reftugasModel->m_get_refTugas();

    $no = 1;
    $data = [];
    foreach ($dataRefTugas as $r) {
      $data[] = [
        $r->ID,
        $r->status,
        '<button class="btn btn-primary btn-sm" onclick="confirmUpdateData(' . "'$r->ID'" . ')"><i class="zmdi zmdi-edit"></i></button>
        <button class="btn btn-danger btn-sm"  onclick="confirmDeleteData(' . "'$r->ID'" . ')"><i class="zmdi zmdi-delete"></i></button>'
      ];
    }
    $result = ["data" => $data];
    echo json_encode($result);
  }

  function save_refTugas()
  {
    $ID = $this->input->post('ajaxID');
    if (!$this->reftugasModel->m_cekExist_refTugas($ID)) {
      $result = ["statusInsertToDb" => 2];
      echo json_encode($result);
      exit();
    }
    $dataRefTugas = [
      'ID' => $ID,
      'status' => $this->input->post('ajaxStatus')
    ];
    $statusInsert = $this->reftugasModel->m_save_refTugas($dataRefTugas);
    $result = ["statusInsertToDb" => $statusInsert];
    echo json_encode($result);
  }

  function delete_refTugas()
  {
    $statusDelete = $this->reftugasModel->m_delete_refTugas($this->input->post('ajaxID'));
    $result = ["statusDeleteToDb" => $statusDelete];
    echo json_encode($result);
  }

  function update_refTugas()
  {
    $updateData = [
      'status' => $this->input->post('ajaxStatus')
    ];

    $statusUpdate = $this->reftugasModel->m_update_refTugas($updateData, $this->input->post('ajaxID'));
    $result = ["statusUpdateToDb" => $statusUpdate];
    echo json_encode($result);
  }

  function get_refTugasForUpdate()
  {
    header('Content-Type: application/json');
    $postID = $this->input->get('ajaxID');
    $dataRefTugas = $this->reftugasModel->m_get_refTugasForUpdate($postID);
    echo json_encode($dataRefTugas);
  }

}