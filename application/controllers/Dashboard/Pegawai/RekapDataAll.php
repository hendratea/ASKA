<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class RekapDataAll extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/Pegawai/RekapDataAllModel', 'rekapDataAllModel', TRUE);
  }

  function index()
  {
    //logActivity(date("Y-m-d") . ' ' . date("H:i:s"), getBrowser(), $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' ');
    
    
    $data = array(
      'titleWeb' => 'Pegawai - Rekap All',
      'headerView' => HEADER_VIEW,
      'navMenu' => NAVIGATION_MENU,
      'headerTitle' => 'Rekap All Pegawai',
      'iconPathHeader' => 'zmdi zmdi-home',
      'pathHeader' => 'Pegawai - Rekap All',
      'contentView' => 'dashboard/pegawai/rekap_all',
      // 'gambar'    => $test
    );
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  function getDataRekapAllPegawai()
  {
    header('Content-Type: application/json');
    $dataRekapAll = $this->rekapDataAllModel->getRekapAllDataPegawai();

    $no = 1;
    $data = [];

    // foreach ($dataRekapAll as $r) {
    //   $data[] = array(
    //       "image"             => '<div class="aniimated-thumbnials"> <a class="atest" href="#"> <img class="img-fluid img-thumbnail avatar w30" src="http://localhost/aska/assets/template/images/image-gallery/2.jpg" alt=""></a></div>',
    //   );
    // }
    // $result = array(
    //     "data" => $data
    // );
    // echo json_encode($result);
    // exit();

    // $test = "<div class=\"aniimated-thumbnials\" class=\"list-unstyled row clearfix\">
    //        <a href=\"http://localhost/aska/assets/template/images/image-gallery/2.jpg\"> <img class=\"avatar w50\" src=\"assets/template/images/image-gallery/1.png\" alt=\"\"></a>
    //     </div>";
   
    foreach ($dataRekapAll as $r) {
      $data[] = [
        '<button class="btn btn-primary btn-sm" onclick="confirmUpdateData(' . "'$r->ID_Pegawai'" . ')"><i class="zmdi zmdi-edit"></i></button>
        <button class="btn btn-danger btn-sm"  onclick="confirmDeleteData(' . "'$r->ID_Pegawai'" . ')"><i class="zmdi zmdi-delete"></i></button>',
        // $no++,
        // 'assets/template/images/image-gallery/2.jpg',   
        '<img onclick="showImage(' . "'$r->foto'" . ')" src="'.base_url($r->foto).'" class="avatar w30" alt="" style="cursor:pointer">',
        $r->ID_Pegawai,
        $r->Nama,
        $r->Tmp_Lahir,
        $r->Tgl_Lahir,
        $r->Status,
        $r->Pendidikan,
        $r->PNS,
        $r->WNI,
        $r->Jenis_Kelamin,
        $r->Alamat,
        $r->Telepon,
        $r->Jenis_Paspor,
        $r->No_Paspor,
        $r->Berlaku_Paspor,
        $r->Ijin_Paspor,
        $r->Jabatan,
        $r->NIP,
        $r->TMT,
        $r->Gelar_Diplomatik,
        $r->Status_Kerja,
        $r->Tugas_Kerja,
        $r->Fungsi_Kerja,
        $r->Tgl_Masuk_Kontrak,
        $r->Tgl_Awal_Kontrak,
        $r->Tgl_Akhir_Kontrak,
        $r->No_Kontrak,
        $r->No_Rekening,
        $r->No_EPF
      ];
    }
    $result = ["data" => $data];
    echo json_encode($result);
  }

  function deleteDataPegawai()
  {
    $statusDelete = $this->rekapDataAllModel->deleteDataPegawai($this->input->post('ajaxIdPegawai'));
    $result = ["statusDeleteToDb" => $statusDelete];
    echo json_encode($result,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
  }

}