<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'SignIn';
$route['signout'] = 'SignIn/logout';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['signup'] = "Authentication/SignUp";
$route['verification_email'] = "Authentication/VerifyEmailRegister";

$route['forgot_password'] = "Authentication/ForgotPassword";
//$route['req_forgot_password'] = "Authentication/ForgotPassword/reqForgotPassword";

$route['request_forgot_password'] = "Authentication/ResetPassword";

$route['dashboard'] = "Dashboard/Home";

//MENU REFERENSI------------------------------------------------------------------------------------------------------
$route['referensi_golongan'] = "Dashboard/Referensi/refGolongan";
$route['get_referensi_golongan'] = "Dashboard/Referensi/refGolongan/get_refGolongan";
$route['save_referensi_golongan'] = "Dashboard/Referensi/refGolongan/save_refGolongan";
$route['delete_referensi_golongan'] = "Dashboard/Referensi/refGolongan/delete_refGolongan";
$route['update_referensi_golongan'] = "Dashboard/Referensi/refGolongan/update_refGolongan";
$route['get_forupdate_referensi_golongan'] = "Dashboard/Referensi/refGolongan/get_refGolonganForUpdate";

$route['referensi_tugas'] = "Dashboard/Referensi/refTugas";
$route['get_referensi_tugas'] = "Dashboard/Referensi/refTugas/get_refTugas";
$route['save_referensi_tugas'] = "Dashboard/Referensi/refTugas/save_refTugas";
$route['delete_referensi_tugas'] = "Dashboard/Referensi/refTugas/delete_refTugas";
$route['update_referensi_tugas'] = "Dashboard/Referensi/refTugas/update_refTugas";
$route['get_forupdate_referensi_tugas'] = "Dashboard/Referensi/refTugas/get_refTugasForUpdate";

$route['referensi_fungsi'] = "Dashboard/Referensi/refFungsi";
$route['get_referensi_fungsi'] = "Dashboard/Referensi/refFungsi/get_refFungsi";
$route['save_referensi_fungsi'] = "Dashboard/Referensi/refFungsi/save_refFungsi";
$route['delete_referensi_fungsi'] = "Dashboard/Referensi/refFungsi/delete_refFungsi";
$route['update_referensi_fungsi'] = "Dashboard/Referensi/refFungsi/update_refFungsi";
$route['get_forupdate_referensi_fungsi'] = "Dashboard/Referensi/refFungsi/get_refFungsiForUpdate";

$route['referensi_cuti'] = "Dashboard/Referensi/refCuti";
$route['get_referensi_cuti'] = "Dashboard/Referensi/refCuti/get_refCuti";
$route['save_referensi_cuti'] = "Dashboard/Referensi/refCuti/save_refCuti";
$route['delete_referensi_cuti'] = "Dashboard/Referensi/refCuti/delete_refCuti";
$route['update_referensi_cuti'] = "Dashboard/Referensi/refCuti/update_refCuti";
$route['get_forupdate_referensi_cuti'] = "Dashboard/Referensi/refCuti/get_refCutiForUpdate";

$route['referensi_ijin'] = "Dashboard/Referensi/refIjin";
$route['get_referensi_ijin'] = "Dashboard/Referensi/refIjin/get_refIjin";
$route['save_referensi_ijin'] = "Dashboard/Referensi/refIjin/save_refIjin";
$route['delete_referensi_ijin'] = "Dashboard/Referensi/refIjin/delete_refIjin";
$route['update_referensi_ijin'] = "Dashboard/Referensi/refIjin/update_refIjin";
$route['get_forupdate_referensi_ijin'] = "Dashboard/Referensi/refIjin/get_refIjinForUpdate";

$route['referensi_shift'] = "Dashboard/Referensi/refshift";
$route['get_referensi_shift'] = "Dashboard/Referensi/refShift/get_refShift";
$route['save_referensi_shift'] = "Dashboard/Referensi/refShift/save_refShift";
$route['delete_referensi_shift'] = "Dashboard/Referensi/refShift/delete_refShift";
$route['update_referensi_shift'] = "Dashboard/Referensi/refShift/update_refShift";
$route['get_forupdate_referensi_shift'] = "Dashboard/Referensi/refShift/get_refShiftForUpdate";


//MENU PEGAWAI--------------------------------------------------------------------------------------------------------
$route['pegawai_input_data'] = "Dashboard/Pegawai/InputData";
$route['pegawai_save_data'] = "Dashboard/Pegawai/InputData/saveDataPegawai";
$route['get_list_pegawai'] = "Dashboard/Pegawai/InputData/getDataPegawai";
$route['update_profile_picture'] = "Dashboard/Pegawai/InputData/updatePhotoProfile";

$route['pegawai_rekap_all'] = "Dashboard/Pegawai/RekapDataAll";
$route['get_data_rekap_all_pegawai'] = "Dashboard/Pegawai/RekapDataAll/getDataRekapAllPegawai";

$route['pegawai_rekap_contract'] = "Dashboard/Pegawai/RekapContract";

//MENU ABSEN----------------------------------------------------------------------------------------------------------

//MENU IZIN-----------------------------------------------------------------------------------------------------------
//MENU CUTI-----------------------------------------------------------------------------------------------------------
//MENU LEMBUR---------------------------------------------------------------------------------------------------------
//MENU PAYROLL--------------------------------------------------------------------------------------------------------

//MENU USER-----------------------------------------------------------------------------------------------------------
// $route['account_manage_accounts'] = "Dashboard/UserAccount/ManageAccounts";
// $route['get_list_user_accounts'] = "Dashboard/UserAccount/ManageAccounts/getListUserAccounts";
// $route['open_access_new_user'] = "Dashboard/UserAccount/ManageAccounts/openAccessUser";
// $route['submit_open_access_new_user'] = "Dashboard/UserAccount/ManageAccounts/submitReqOpenAccessNewUser";
// $route['account_manage_roles'] = "Dashboard/UserAccount/ManageRoles";

$route['setting_user'] = "Dashboard/Setting/User";
$route['get_setting_user'] = "Dashboard/Setting/User/getDataUser";
$route['save_setting_user'] = "Dashboard/Setting/User/saveDataUser";
$route['delete_setting_user'] = "Dashboard/Setting/User/deleteDataUser";
$route['update_setting_user'] = "Dashboard/Setting/User/updateDataUser";
$route['get_forupdate_setting_user'] = "Dashboard/Setting/User/getDataUserForUpdate";