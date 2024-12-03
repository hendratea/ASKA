<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class refCuti extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/Referensi/refCutiModel', 'refcutiModel', TRUE);
  }

  function index()
  {
    $data = [
      'titleWeb' => 'Referensi - Cuti',
      'headerView' => HEADER_VIEW,
      'navMenu' => NAVIGATION_MENU,
      'headerTitle' => 'Referensi - Cuti',
      'iconPathHeader' => 'zmdi zmdi-home',
      'pathHeader' => 'Referensi - Cuti',
      'contentView' => 'dashboard/referensi/refcuti'
    ];
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  // --------------------------------------- CRUD ---------------------------------------
  function get_refCuti()
  {
    header('Content-Type: application/json');
    $dataRefCuti = $this->refcutiModel->m_get_refCuti();

    $no = 1;
    $data = [];
    foreach ($dataRefCuti as $r) {
      $data[] = [
        $r->ID,
        $r->status,
        $r->jatah,
        '<button class="btn btn-primary btn-sm" onclick="confirmUpdateData(' . "'$r->ID'" . ')"><i class="zmdi zmdi-edit"></i></button>
        <button class="btn btn-danger btn-sm"  onclick="confirmDeleteData(' . "'$r->ID'" . ')"><i class="zmdi zmdi-delete"></i></button>'
      ];
    }
    $result = ["data" => $data];
    echo json_encode($result);
  }

  function save_refCuti()
  {
    $ID = $this->input->post('ajaxID');
    if (!$this->refcutiModel->m_cekExist_refCuti($ID)) {
      $result = ["statusInsertToDb" => 2];
      echo json_encode($result);
      exit();
    }
    $dataRefCuti = [
      'ID' => $ID,
      'status' => $this->input->post('ajaxStatus'),
      'jatah' => $this->input->post('ajaxJatah')
    ];
    $statusInsert = $this->refcutiModel->m_save_refCuti($dataRefCuti);
    $result = ["statusInsertToDb" => $statusInsert];
    echo json_encode($result);
  }

  function delete_refCuti()
  {
    $statusDelete = $this->refcutiModel->m_delete_refCuti($this->input->post('ajaxID'));
    $result = ["statusDeleteToDb" => $statusDelete];
    echo json_encode($result);
  }

  function update_refCuti()
  {
    $updateData = [
      'status' => $this->input->post('ajaxStatus'),
      'jatah' => $this->input->post('ajaxJatah')
    ];

    $statusUpdate = $this->refcutiModel->m_update_refCuti($updateData, $this->input->post('ajaxID'));
    $result = ["statusUpdateToDb" => $statusUpdate];
    echo json_encode($result);
  }

  function get_refCutiForUpdate()
  {
    header('Content-Type: application/json');
    $postID = $this->input->get('ajaxID');
    $dataRefCuti = $this->refcutiModel->m_get_refCutiForUpdate($postID);
    //$this->session->set_userdata('passForUpdateUser', $dataRefCuti->pass);
    echo json_encode($dataRefCuti);
  }

}