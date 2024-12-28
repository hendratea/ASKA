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
    

    $url = parse_url($_SERVER['REQUEST_URI']);

    if(sizeof($url)==1){
        // die("url not valid");
        
    }else{
      parse_str($url['query'], $params);

    // print_r($params);
      $keys = array_keys($params);
      // echo $keys[0]. PHP_EOL;

      if($keys[0] != "id"){
          die("parameter not valid");
      }

      if(empty($params['id'])){
          die("parameter is empty");
          die($params['id']);
      }

    }

    $listAktifKerja = $this->pegawaiModel->rAktifKerja();
    $listPendidikan = $this->pegawaiModel->rPendidikan();
    $listIdGolongan = $this->pegawaiModel->rGolongan();
    $listStatusKerja = $this->pegawaiModel->rStatusKerja();
    $listTugasKerja = $this->pegawaiModel->rTugasKerja();
    $listFungsiKerja = $this->pegawaiModel->rFungsiKerja();
    
    

    $data = array(
      'titleWeb'            => 'Pegawai - Input Data',
      'headerView'          => HEADER_VIEW,
      'navMenu'             => NAVIGATION_MENU,
      'headerTitle'         => 'Input Data Pegawai',
      'iconPathHeader'      => 'zmdi zmdi-home',
      'pathHeader'          => 'Pegawai - Input Data',
      'contentView'         => 'dashboard/pegawai/input_data',
      'listAktifKerja'      => $listAktifKerja,
      'listPendidikan'      => $listPendidikan,
      'listGolongan'        => $listIdGolongan,
      'listStatusKerja'     => $listStatusKerja,
      'listTugasKerja'      => $listTugasKerja,
      'listFungsiKerja'     => $listFungsiKerja
    );

    
    // if($params['id']!=''){
    //   $data['valIdPegawai'] = $params['id'];
    // }
    
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  function formatDate($datePost)
  {
    if($datePost==''){
      return '';
    }else{
      // $dateString = '2025-12-29';
      // $date = DateTime::createFromFormat('d-M-Y', $dateString);
      // // Convert to a standard date format (Y-m-d)
      // $formattedDate = $date->format('Y-m-d');
      // return $formattedDate;
      $date=date_create(str_replace("/","-",$datePost));
      return date_format($date,"Y-m-d");

    }
   
  }

  function saveDataPegawai()
  {
    // $vPassword    = password_hash($this->input->post('ajaxPassword'), PASSWORD_DEFAULT);
    // $expPassword = date('Y-m-d', strtotime("+90 days"));

    // $dateString = $this->input->post('ajaxTanggalLahir'); // example short date in mm/dd/yyyy format
    // $date = DateTime::createFromFormat('d-M-Y', $dateString);
    // // Convert to a standard date format (Y-m-d)
    // $formattedDate = $date->format('Y-m-d');


    $dataPegawai = array(
      'r_aktifkerja'      => $this->input->post('ajaxAktifKerja'),
      'r_pendidikan'      => $this->input->post('ajaxPendidikan'),
      'pns'               => $this->input->post('ajaxPns'),
      'wni'               => $this->input->post('ajaxStatusWni'),
      'gender'            => $this->input->post('ajaxJenisKelamin'),
      'nama'              => $this->input->post('ajaxNamaPegawai'),
      'tmp_lahir'         => $this->input->post('ajaxTempatLahir'),
      'tgl_lahir'         => $this->formatDate($this->input->post('ajaxTanggalLahir')),
      'alamat'            => $this->input->post('ajaxAlamat'),
      'telepon'           => $this->input->post('ajaxTelpon'),
      'jns_paspor'        => $this->input->post('ajaxJenisPaspor'),
      'no_paspor'         => $this->input->post('ajaxNoPaspor'),
      'tgl_laku_paspor'   => $this->formatDate($this->input->post('ajaxTglLakuPaspor')),
      'tgl_izin_paspor'   => $this->formatDate($this->input->post('ajaxTglIzinPaspor')),
      // 'date_insert'      => date("Y-m-d H:i:s"),
      // 'user_submit'      => $this->session->userdata('logged_user_id'),
      // 'user_role'        => $this->input->post('ajaxUserRole'),
    );


    if($dataPegawai['pns']=='Y'){
      $dataPnsOrNonPns = array(
        'r_golongan'            => $this->input->post('ajaxGolongan'),
        'nip'                   => $this->input->post('ajaxNip'),
        'tmt'                   => $this->formatDate($this->input->post('ajaxTglTerimaJabatan')),
        'tgl_gelar_diplomatik'  => $this->formatDate($this->input->post('ajaxGelarDiplomatik')),
      );
    }else{
      $dataPnsOrNonPns = array(
        'r_statuskerja'         => $this->input->post('ajaxStatusKerja'),
        'r_tugaskerja'          => $this->input->post('ajaxTugasKerja'),
        'r_fungsikerja'         => $this->input->post('ajaxFungsiKerja'),
        'tgl_masukkerja'        => $this->formatDate($this->input->post('ajaxTglMasukKerja')),
        'tgl_awalkontrak'       => $this->formatDate($this->input->post('ajaxTglAwalKontrak')),
        'tgl_akhirkontrak'      => $this->formatDate($this->input->post('ajaxTglAkhirKontrak')),
        'no_kontrak'            => $this->input->post('ajaxNoKontrak'),
        'no_rekening'           => $this->input->post('ajaxNoRekening'),
        'no_epf'                => $this->input->post('ajaxNoEpf'),
      );
    }

    $statusInsert = $this->pegawaiModel->saveDataPegawai($dataPegawai, $dataPnsOrNonPns);
    $getArr = explode("|",$statusInsert);

    $result = array(
      "statusInsertToDb" => $getArr[0],
      "idPegawai" => $getArr[1],
    );

    echo json_encode($result);

  }

  function updateDataPegawai()
  {
    // $vPassword    = password_hash($this->input->post('ajaxPassword'), PASSWORD_DEFAULT);
    // $expPassword = date('Y-m-d', strtotime("+90 days"));

    // $dateString = $this->input->post('ajaxTanggalLahir'); // example short date in mm/dd/yyyy format
    // $date = DateTime::createFromFormat('d-M-Y', $dateString);
    // // Convert to a standard date format (Y-m-d)
    // $formattedDate = $date->format('Y-m-d');


    $dataPegawai = array(
      'r_aktifkerja'      => $this->input->post('ajaxAktifKerja'),
      'r_pendidikan'      => $this->input->post('ajaxPendidikan'),
      'pns'               => $this->input->post('ajaxPns'),
      'wni'               => $this->input->post('ajaxStatusWni'),
      'gender'            => $this->input->post('ajaxJenisKelamin'),
      'nama'              => $this->input->post('ajaxNamaPegawai'),
      'tmp_lahir'         => $this->input->post('ajaxTempatLahir'),
      'tgl_lahir'         => $this->formatDate($this->input->post('ajaxTanggalLahir')),
      'alamat'            => $this->input->post('ajaxAlamat'),
      'telepon'           => $this->input->post('ajaxTelpon'),
      'jns_paspor'        => $this->input->post('ajaxJenisPaspor'),
      'no_paspor'         => $this->input->post('ajaxNoPaspor'),
      'tgl_laku_paspor'   => $this->formatDate($this->input->post('ajaxTglLakuPaspor')),
      'tgl_izin_paspor'   => $this->formatDate($this->input->post('ajaxTglIzinPaspor')),
      // 'date_insert'      => date("Y-m-d H:i:s"),
      // 'user_submit'      => $this->session->userdata('logged_user_id'),
      // 'user_role'        => $this->input->post('ajaxUserRole'),
    );


    if($dataPegawai['pns']=='Y')
    {
      $dataPnsOrNonPns = array(
        'r_golongan'            => $this->input->post('ajaxGolongan'),
        'nip'                   => $this->input->post('ajaxNip'),
        'tmt'                   => $this->formatDate($this->input->post('ajaxTglTerimaJabatan')),
        'tgl_gelar_diplomatik'  => $this->formatDate($this->input->post('ajaxGelarDiplomatik')),
      );
    }
    else
    {
      $dataPnsOrNonPns = array(
        'r_statuskerja'         => $this->input->post('ajaxStatusKerja'),
        'r_tugaskerja'          => $this->input->post('ajaxTugasKerja'),
        'r_fungsikerja'         => $this->input->post('ajaxFungsiKerja'),
        'tgl_masukkerja'        => $this->formatDate($this->input->post('ajaxTglMasukKerja')),
        'tgl_awalkontrak'       => $this->formatDate($this->input->post('ajaxTglAwalKontrak')),
        'tgl_akhirkontrak'      => $this->formatDate($this->input->post('ajaxTglAkhirKontrak')),
        'no_kontrak'            => $this->input->post('ajaxNoKontrak'),
        'no_rekening'           => $this->input->post('ajaxNoRekening'),
        'no_epf'                => $this->input->post('ajaxNoEpf'),
      );
    }

    $statusUpdate = $this->pegawaiModel->updateDataPegawai($dataPegawai, $this->input->post('ajaxIdPegawai'), $dataPnsOrNonPns);
    $getArr = explode("|",$statusUpdate);

    $result = array(
      "statusInsertToDb" => $getArr[0],
      "idPegawai" => $this->input->post('ajaxIdPegawai'),
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

    $file_name_tmp = 'default_avatar.png';
    if (!empty($_FILES['ajaxPhotoProfile']['name'][0])) {
        $files = $_FILES['ajaxPhotoProfile'];
        // $title = "";
        $config['file_name'] = 'upload_avatar';
        $this->upload->initialize($config);

        if ($this->upload->do_upload('ajaxPhotoProfile')) {
            $upload_data = $this->upload->data();
            $file_name_tmp = $upload_data['file_name'];

        } 
    } 

    $dataUpdated = array(
      'foto'     => $file_name_tmp,
      // 'foto'     => './assets/picture_profiles/'.$file_name_tmp,
      // 'date_update'         => date("Y-m-d H:i:s")
    );

    $whereUpdate = array(
        'IDPEG'           => $this->input->post('ajaxIdPegawai')
    );

    $statusUpdate = $this->pegawaiModel->updatePhotoPegawai($dataUpdated, $whereUpdate);
    $result = ["statusUpdateToDb" => $statusUpdate];
    echo json_encode($result);

  }
  
}
