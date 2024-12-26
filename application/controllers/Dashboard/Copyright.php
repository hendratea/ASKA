<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Copyright extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    //$this->load->model('Dashboard/CopyrightModel', 'copyrightModel', TRUE);
  }

  function index()
  {
    logActivity(
      date("Y-m-d") . ' ' . date("H:i:s"),
      getBrowser(),
      $this->session->userdata('logged_user_id') . ' : ' . dirname(__FILE__) . '\\' . get_class() . '\\' . __FUNCTION__ . ' '
      . 'melihat copyright profile programmer'
    );

    $data = array(
      'titleWeb' => 'ASKA - Copyright',
      'headerView' => HEADER_VIEW,
      'footerView' => FOOTER_VIEW,
      'navMenu' => NAVIGATION_MENU,
      'headerTitle' => 'COPYRIGHT',
      'iconPathHeader' => 'zmdi zmdi-home',
      'pathHeader' => 'Copyright',
      'contentView' => 'dashboard/copyright',
    );


    $this->load->view(LAYOUT_DASHBOARD, $data);
  }

}