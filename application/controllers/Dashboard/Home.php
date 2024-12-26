<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Home extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard/HomeModel', 'homeModel', TRUE);
  }

  function index()
  {
    logActivity(date("Y-m-d") . ' ' . date("H:i:s"), getBrowser(), $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' ');

    $data = array(
      'titleWeb' => 'ASKA - Dashboard',
      'headerView' => HEADER_VIEW,
      'footerView' => FOOTER_VIEW,
      'navMenu' => NAVIGATION_MENU,
      'headerTitle' => 'DASHBOARD',
      'iconPathHeader' => 'zmdi zmdi-home',
      'pathHeader' => 'Home',
      'contentView' => 'dashboard/home',
    );


    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

}