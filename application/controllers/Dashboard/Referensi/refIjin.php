<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class refIjin extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/Referensi/refIjinModel', 'refijinModel', TRUE);
  }

  function index()
  {
    $data = [
      'titleWeb' => 'Referensi - Ijin',
      'headerView' => HEADER_VIEW,
      'navMenu' => NAVIGATION_MENU,
      'headerTitle' => 'Referensi - Ijin',
      'iconPathHeader' => 'zmdi zmdi-home',
      'pathHeader' => 'Referensi - Ijin',
      'contentView' => 'dashboard/referensi/refijin'
    ];
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  // --------------------------------------- CRUD ---------------------------------------
  function get_refIjin()
  {
    header('Content-Type: application/json');
    $dataRefIjin = $this->refijinModel->m_get_refIjin();

    $no = 1;
    $data = [];
    foreach ($dataRefIjin as $r) {
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

  function save_refIjin()
  {
    $ID = $this->input->post('ajaxID');
    if (!$this->refijinModel->m_cekExist_refIjin($ID)) {
      $result = ["statusInsertToDb" => 2];
      echo json_encode($result);
      exit();
    }
    $dataRefIjin = [
      'ID' => $ID,
      'status' => $this->input->post('ajaxStatus')
    ];
    $statusInsert = $this->refijinModel->m_save_refIjin($dataRefIjin);
    $result = ["statusInsertToDb" => $statusInsert];
    echo json_encode($result);
  }

  function delete_refIjin()
  {
    $statusDelete = $this->refijinModel->m_delete_refIjin($this->input->post('ajaxID'));
    $result = ["statusDeleteToDb" => $statusDelete];
    echo json_encode($result);
  }

  function update_refIjin()
  {
    $updateData = [
      'status' => $this->input->post('ajaxStatus')
    ];

    $statusUpdate = $this->refijinModel->m_update_refIjin($updateData, $this->input->post('ajaxID'));
    $result = ["statusUpdateToDb" => $statusUpdate];
    echo json_encode($result);
  }

  function get_refIjinForUpdate()
  {
    header('Content-Type: application/json');
    $postID = $this->input->get('ajaxID');
    $dataRefIjin = $this->refijinModel->m_get_refIjinForUpdate($postID);
    echo json_encode($dataRefIjin);
  }

}