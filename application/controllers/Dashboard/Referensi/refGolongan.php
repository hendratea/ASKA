<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class refGolongan extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/Referensi/refGolonganModel', 'refgolonganModel', TRUE);
  }

  function index()
  {
    $data = [
      'titleWeb' => 'Referensi - Golongan',
      'headerView' => HEADER_VIEW,
      'footerView' => FOOTER_VIEW,
      'navMenu' => NAVIGATION_MENU,
      'headerTitle' => 'Referensi - Golongan',
      'iconPathHeader' => 'zmdi zmdi-home',
      'pathHeader' => 'Referensi - Golongan',
      'contentView' => 'dashboard/referensi/refgolongan'
    ];
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  // --------------------------------------- CRUD ---------------------------------------
  function get_refGolongan()
  {
    header('Content-Type: application/json');
    $dataRefGolongan = $this->refgolonganModel->m_get_refGolongan();

    $no = 1;
    $data = [];
    foreach ($dataRefGolongan as $r) {
      $data[] = [
        $r->ID,
        $r->status,
        $r->aptln,
        '<button class="btn btn-primary btn-sm" onclick="confirmUpdateData(' . "'$r->ID'" . ')"><i class="zmdi zmdi-edit"></i></button>
        <button class="btn btn-danger btn-sm"  onclick="confirmDeleteData(' . "'$r->ID'" . ')"><i class="zmdi zmdi-delete"></i></button>'
      ];
    }
    $result = ["data" => $data];
    echo json_encode($result);
  }

  function save_refGolongan()
  {
    $ID = $this->input->post('ajaxID');
    if (!$this->refgolonganModel->m_cekExist_refGolongan($ID)) {
      $result = ["statusInsertToDb" => 2];
      echo json_encode($result);
      exit();
    }
    $dataRefGolongan = [
      'ID' => $ID,
      'status' => $this->input->post('ajaxStatus'),
      'aptln' => $this->input->post('ajaxAptln')
    ];
    $statusInsert = $this->refgolonganModel->m_save_refGolongan($dataRefGolongan);
    $result = ["statusInsertToDb" => $statusInsert];
    echo json_encode($result);
  }

  function delete_refGolongan()
  {
    $statusDelete = $this->refgolonganModel->m_delete_refGolongan($this->input->post('ajaxID'));
    $result = ["statusDeleteToDb" => $statusDelete];
    echo json_encode($result);
  }

  function update_refGolongan()
  {
    $updateData = [
      'status' => $this->input->post('ajaxStatus'),
      'aptln' => $this->input->post('ajaxAptln')
    ];

    $statusUpdate = $this->refgolonganModel->m_update_refGolongan($updateData, $this->input->post('ajaxID'));
    $result = ["statusUpdateToDb" => $statusUpdate];
    echo json_encode($result);
  }

  function get_refGolonganForUpdate()
  {
    header('Content-Type: application/json');
    $postID = $this->input->get('ajaxID');
    $dataRefGolongan = $this->refgolonganModel->m_get_refGolonganForUpdate($postID);
    echo json_encode($dataRefGolongan);
  }

}