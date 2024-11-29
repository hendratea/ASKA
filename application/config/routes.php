<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']                                        = 'SignIn';
$route['signout']                                                   = 'SignIn/logout';

$route['404_override']                                              = '';
$route['translate_uri_dashes']                                      = FALSE;

$route['signup']                                                    = "Authentication/SignUp";
$route['verification_email']                                        = "Authentication/VerifyEmailRegister";

$route['forgot_password']                                           = "Authentication/ForgotPassword";
// $route['req_forgot_password']                                        = "Authentication/ForgotPassword/reqForgotPassword";

$route['request_forgot_password']                                   = "Authentication/ResetPassword";

$route['dashboard']                                                 = "Dashboard/Home";

$route['referensi_golongan']                                        = "Dashboard/Referensi/Golongan";
$route['get_data_golongan']                                         = "Dashboard/Referensi/Golongan/getDataGolongan";
$route['save_data_golongan']                                        = "Dashboard/Referensi/Golongan/saveDataGolongan";




$route['pegawai_input_data']                                        = "Dashboard/Pegawai/InputData";
$route['pegawai_save_data']                                         = "Dashboard/Pegawai/InputData/saveDataPegawai";
$route['get_list_pegawai']                                          = "Dashboard/Pegawai/InputData/getDataPegawai";
$route['update_profile_picture']                                    = "Dashboard/Pegawai/InputData/updatePhotoProfile";

$route['pegawai_rekap_all']                                         = "Dashboard/Pegawai/RekapDataAll";
$route['get_data_rekap_all_pegawai']                                = "Dashboard/Pegawai/RekapDataAll/getDataRekapAllPegawai";

$route['pegawai_rekap_contract']                                    = "Dashboard/Pegawai/RekapContract";



$route['account_manage_accounts']                                   = "Dashboard/UserAccount/ManageAccounts";
$route['get_list_user_accounts']                                    = "Dashboard/UserAccount/ManageAccounts/getListUserAccounts";
$route['open_access_new_user']                                      = "Dashboard/UserAccount/ManageAccounts/openAccessUser";
$route['submit_open_access_new_user']                               = "Dashboard/UserAccount/ManageAccounts/submitReqOpenAccessNewUser";

$route['account_manage_roles']                                      = "Dashboard/UserAccount/ManageRoles";