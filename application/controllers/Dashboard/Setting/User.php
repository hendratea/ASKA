<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class User extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/Setting/UserModel', 'userModel', TRUE);
  }

  function index()
  {
    //logActivity(date("Y-m-d") . ' ' . date("H:i:s"), getBrowser(), $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' ');
    // untuk input combo box
    $listRoleUser = $this->userModel->m_getRoleUser();
    $listIdPegawai = $this->userModel->m_getIdPegawai();

    $data = array(
      'titleWeb' => 'Setting - User',
      'headerView' => HEADER_VIEW,
      'navMenu' => NAVIGATION_MENU,
      'headerTitle' => 'Setting - User',
      'iconPathHeader' => 'zmdi zmdi-home',
      'pathHeader' => 'Setting - User',
      'contentView' => 'dashboard/setting/user',
      'listRoleUser' => $listRoleUser,
      'listIdPegawai' => $listIdPegawai,
    );
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  // >>>> CRUD <<<<
  function getDataUser()
  {
    header('Content-Type: application/json');
    $dataSettingUser = $this->userModel->m_getDataUser();

    $no = 1;
    $data = [];
    foreach ($dataSettingUser as $r) {
      $data[] = [
        $r->user,
        $r->email,
        $r->aktif,
        $r->r_user,
        $r->IDPEG . '<br>' . $r->nama,
        $r->tgl_dibuat,
        $r->tgl_terakhir_login,
        '<button class="btn btn-primary btn-sm" onclick="confirmUpdateDataUser(' . "'$r->user'" . ')"><i class="zmdi zmdi-edit"></i></button>
         <button class="btn btn-danger btn-sm"  onclick="confirmDeleteDataUser(' . "'$r->user'" . ')"><i class="zmdi zmdi-delete"></i></button>'
      ];
    }
    $result = ["data" => $data];
    echo json_encode($result);
    exit();
  }

  function saveDataUser()
  {
    $userId = $this->input->post('ajaxUserId');
    if (!$this->userModel->m_checExistUserId($userId)) {
      //$result = array("statusInsertToDb" => 2,);
      $result = ["statusInsertToDb" => 2];
      echo json_encode($result);
      exit();
    }
    $dataUser = [
      'user' => $userId,
      'pass' => password_hash($this->input->post('ajaxPassword'), PASSWORD_DEFAULT),
      'email' => $this->input->post('ajaxEmail'),
      'r_user' => $this->input->post('ajaxRoleUser'),
      'aktif' => $this->input->post('ajaxStatusAktif'),
      'IDPEG' => $this->input->post('ajaxIdPegawai'),
      'tgl_dibuat' => date('Y-m-d H:i:s'),
    ];
    $statusInsert = $this->userModel->m_saveDataUser($dataUser);
    $result = ["statusInsertToDb" => $statusInsert];
    echo json_encode($result);
  }

  function deleteDataUser()
  {
    $statusDelete = $this->userModel->m_deleteDataUser($this->input->post('ajaxUserId'));
    $result = ["statusDeleteToDb" => $statusDelete];
    echo json_encode($result);
  }

  function updateDataUser()
  {
    $updateData = [
      'pass' => password_hash($this->input->post('ajaxPassword'), PASSWORD_DEFAULT),
      'email' => $this->input->post('ajaxEmail'),
      'r_user' => $this->input->post('ajaxRoleUser'),
      'aktif' => $this->input->post('ajaxStatusAktif'),
      'IDPEG' => $this->input->post('ajaxIdPegawai'),
    ];

    $statusUpdate = $this->userModel->m_updateDataUser($updateData, $this->input->post('ajaxUserId'));
    $result = ["statusUpdateToDb" => $statusUpdate];
    echo json_encode($result);
  }

  function getDataUserForUpdate()
  {
    header('Content-Type: application/json');
    $postUser = $this->input->get('ajaxUserId');
    $dataSettingUser = $this->userModel->m_getDataUserForUpdate($postUser);
    $this->session->set_userdata('passForUpdateUser', $dataSettingUser->pass);
    echo json_encode($dataSettingUser);
  }

}