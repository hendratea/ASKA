<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class InputData extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/Pegawai/InputDataModel' , 'pegawaiModel', TRUE);
  }

  function index()  
  {
    logActivity(date("Y-m-d").' '.date("H:i:s"), getBrowser(), $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' ');
    
    $data = array(
      'titleWeb'            => 'Pegawai - Input Data',
      'headerView'          => HEADER_VIEW,
      'navMenu'             => NAVIGATION_MENU,
      'headerTitle'         => 'Input Data Pegawai',
      'iconPathHeader'      => 'zmdi zmdi-home',
      'pathHeader'          => 'Pegawai - Input Data',
      'contentView'         => 'dashboard/pegawai/input_data',
    );

    
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  function saveDataPegawai()
  {
    // $vPassword    = password_hash($this->input->post('ajaxPassword'), PASSWORD_DEFAULT);
    // $expPassword = date('Y-m-d', strtotime("+90 days"));

    $dateString = $this->input->post('ajaxTanggalLahir'); // example short date in mm/dd/yyyy format
    $date = DateTime::createFromFormat('d-M-Y', $dateString);

    // Convert to a standard date format (Y-m-d)
    $formattedDate = $date->format('Y-m-d');

    $dataPegawai = array(
      'Nama'             => $this->input->post('ajaxNamaPegawai'),
      'Gender'           => ($this->input->post('ajaxJenisKelamin')=='Laki-laki' ? 'L' : 'P'),
      'Tmp_lahir'        => $this->input->post('ajaxTempatLahir'),
      'Tgl_lahir'        => $formattedDate,
      'Telepon'          => $this->input->post('ajaxTelpon'),
      'Paspor'           => $this->input->post('ajaxPassport'),
      'RKA'              => 1,
      'Alamat'           => $this->input->post('ajaxAlamat'),
      'PNS'              => ($this->input->post('ajaxStatusKaryawan')=='PNS' ? 'Y' : 'N'),
      // 'date_insert'      => date("Y-m-d H:i:s"),
      // 'user_submit'      => $this->session->userdata('logged_user_id'),
      // 'user_role'        => $this->input->post('ajaxUserRole'),
    );

    $statusInsert = $this->pegawaiModel->saveDataPegawai($dataPegawai);

    $result = array(
      "statusInsertToDb" => $statusInsert,
    );

    echo json_encode($result);

  }

  function getDataPegawai()
  {
      logActivity(date("Y-m-d").' '.date("H:i:s"), getBrowser(), $this->session->userdata('logged_user_id').' : '.dirname(__FILE__).'\\' .get_class().'\\'.__FUNCTION__.' ');
      header('Content-Type: application/json');
      $query = $this->pegawaiModel->getDataPegawai();
      $no = 1;
      $data = [];

      foreach ($query as $dtUserAccounts) {
          $data[] = array(
              "user_id"             => $dtUserAccounts->user_id,
              "id_pegawai"          => $dtUserAccounts->id_pegawai,
              "full_name"           => $dtUserAccounts->full_name,
              "gender"              => $dtUserAccounts->gender,
              "email"               => $dtUserAccounts->email,
              "status_active"       => ($dtUserAccounts->status_active==1 ? 'True' : 'False'),
              "last_login"          => $dtUserAccounts->last_login,
              "attempt_login"       => $dtUserAccounts->attempt_login,
              "status_lock"         => ($dtUserAccounts->status_lock==1 ? 'Unlock' : 'Lock'),
              "email_verification"  => ($dtUserAccounts->email_verification==1 ? 'True' : 'False'),
              "date_insert"         => $dtUserAccounts->date_insert,
              "expired_password"    => $dtUserAccounts->expired_password,
              "user_role"           => $dtUserAccounts->role_name,
              // 'cell_actions'        => '<button class="btn btn-primary btn-sm edit-accounts"><i class="zmdi zmdi-edit"></i></button>
              //                           <button class="btn btn-danger btn-sm" onclick="delete_manage_accounts(this.value,' . "'" . $dtUserAccounts->user_id . "'" . ',' . "'" . $dtUserAccounts->full_name . "'" . ')"><i class="zmdi zmdi-delete"></i></button>'
          );
      }
      $result = array(
          "data" => $data
      );
      echo json_encode($result);
      exit();

  }

  function updatePhotoProfile()
  {

    $config = array(
      'upload_path'   => './assets/picture_profiles/',
      'allowed_types' => 'jpg|png|jpeg|bmp',
    );

    $this->load->library('upload', $config);

    if (!empty($_FILES['ajaxPhotoProfile']['name'][0])) {
        $files = $_FILES['ajaxPhotoProfile'];
        $title = "";
        $config['file_name'] = 'upload_avatar';
        $this->upload->initialize($config);

        if ($this->upload->do_upload('ajaxPhotoProfile')) {
            $upload_data = $this->upload->data();
            $file_name_tmp = $upload_data['file_name'];

            $dataUpdated = array(
                'profile_picture'     => './assets/picture_profiles/'.$file_name_tmp,
                'date_update'         => date("Y-m-d H:i:s")
            );

            $whereUpdate = array(
                'id_pegawai'           => $this->session->userdata('logged_user_id')
            );
        } 
    } 

  }
  
}
