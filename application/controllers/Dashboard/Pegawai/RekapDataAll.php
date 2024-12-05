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
    );
    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

  function getDataRekapAllPegawai()
  {
    header('Content-Type: application/json');
    $dataRekapAll = $this->rekapDataAllModel->getRekapAllDataPegawai();

    $no = 1;
    $data = [];
    foreach ($dataRekapAll as $r) {
      $data[] = [
        '<button class="btn btn-primary btn-sm" onclick="confirmUpdateData(' . "'$r->ID_Pegawai'" . ')"><i class="zmdi zmdi-edit"></i></button>
        <button class="btn btn-danger btn-sm"  onclick="confirmDeleteData(' . "'$r->ID_Pegawai'" . ')"><i class="zmdi zmdi-delete"></i></button>',
        $no++,
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


}