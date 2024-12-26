<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class refFungsi extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/Referensi/refFungsiModel', 'reffungsiModel', TRUE);
  }

  function index()
  {
    $data = [
      'titleWeb' => 'Referensi - Fungsi',
      'headerView' => HEADER_VIEW,
      'footerView' => FOOTER_VIEW,
      'navMenu' => NAVIGATION_MENU,
      'headerTitle' => 'Referensi - Fungsi',
      'iconPathHeader' => 'zmdi zmdi-home',
      'pathHeader' => 'Referensi - Fungsi',
      'contentView' => 'dashboard/referensi/reffungsi'
    ];
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  // --------------------------------------- CRUD ---------------------------------------
  function get_refFungsi()
  {
    header('Content-Type: application/json');
    $dataRefFungsi = $this->reffungsiModel->m_get_refFungsi();

    $no = 1;
    $data = [];
    foreach ($dataRefFungsi as $r) {
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

  function save_refFungsi()
  {
    $ID = $this->input->post('ajaxID');
    if (!$this->reffungsiModel->m_cekExist_refFungsi($ID)) {
      $result = ["statusInsertToDb" => 2];
      echo json_encode($result);
      exit();
    }
    $dataRefFungsi = [
      'ID' => $ID,
      'status' => $this->input->post('ajaxStatus')
    ];
    $statusInsert = $this->reffungsiModel->m_save_refFungsi($dataRefFungsi);
    $result = ["statusInsertToDb" => $statusInsert];
    echo json_encode($result);
  }

  function delete_refFungsi()
  {
    $statusDelete = $this->reffungsiModel->m_delete_refFungsi($this->input->post('ajaxID'));
    $result = ["statusDeleteToDb" => $statusDelete];
    echo json_encode($result);
  }

  function update_refFungsi()
  {
    $updateData = [
      'status' => $this->input->post('ajaxStatus')
    ];

    $statusUpdate = $this->reffungsiModel->m_update_refFungsi($updateData, $this->input->post('ajaxID'));
    $result = ["statusUpdateToDb" => $statusUpdate];
    echo json_encode($result);
  }

  function get_refFungsiForUpdate()
  {
    header('Content-Type: application/json');
    $postID = $this->input->get('ajaxID');
    $dataRefFungsi = $this->reffungsiModel->m_get_refFungsiForUpdate($postID);
    echo json_encode($dataRefFungsi);
  }

}