<!doctype html>
<html class="no-js " lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

  <title><?= $titleWeb; ?></title>

  <link rel="icon" href="<?= base_url() ?>assets/template/images/logo-title.png" type="image/x-icon">

  <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
    rel="stylesheet"> -->

  <!-- CSS BOOTSRAP ---------------------------------------------------------------------------------------- -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/font-awesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/font-awesome/css/solid.css">

  <!-- CSS AERO -------------------------------------------------------------------------------------------- -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/css/style.min.css">

  <!-- SWAL ------------------------------------------------------------------------------------------------ -->
  <?php if ($contentView != "dashboard/home") { ?>
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/my_css/sweetalert2.min.css">
  <?php } ?>
  <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert/sweetalert.css"> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet"> -->

  <!-- CSS DATEPICKER ------------------------------------------------------------------------------------------- -->
  <?php
  switch ($contentView) {
    case "dashboard/ijin/inputdata":
    case "dashboard/ijin/cetakdata":
    case "dashboard/ijin/rekap_all":
    case "dashboard/cuti/inputdata":
      case "dashboard/cuti/cetakdata":
        case "dashboard/cuti/rekap_all":
    case "dashboard/cuti/rekap_sisa_cuti":
      ?>
  <link rel="stylesheet"
    href="<?= base_url() ?>assets/template/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">
  <?php
      break;
  }
  ?>

  <!-- CSS TABEL ------------------------------------------------------------------------------------------- -->
  <?php
  switch ($contentView) {
    case "dashboard/referensi/refgolongan":
    case "dashboard/referensi/reftugas":
    case "dashboard/referensi/reffungsi":
    case "dashboard/referensi/refcuti":
    case "dashboard/referensi/refijin":
    case "dashboard/referensi/refshift":
    case "dashboard/setting/user":
    case "dashboard/pegawai/input_data":
    case "dashboard/pegawai/rekap_all":
    case "dashboard/ijin/inputdata":
      case "dashboard/ijin/cetakdata":
        case "dashboard/ijin/rekap_all":
    case "dashboard/cuti/inputdata":
      case "dashboard/cuti/cetakdata":
        case "dashboard/cuti/rekap_all":
    case "dashboard/cuti/rekap_sisa_cuti":
      ?>
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/bootstrap-select/css/bootstrap-select.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/select2/select2.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/multi-select/css/multi-select.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/datatables/responsive 2.2.9.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/datatables/border-table.css">
  <?php
      break;
  }
  ?>

  <!-- CSS MODULE -------------------------------------------------------------------------------------------------- -->
  <?php if ($contentView == "dashboard/pegawai/input_data") { ?>
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/css/dateTimePicker.css">
  <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <?php } ?>

  <!-- CSS SENDIRI --------------------------------------------------------------------------------------------------- -->
</head>

<!-- <body class="theme-blush right_icon_toggle ls-toggle-menu" style="background-color:#F5F5F5"> -->

<body class="theme-blush">
  <!-- Page Loader -->
  <div class="page-loader-wrapper">
    <div class="loader">
      <div class="m-t-30"><img class="zmdi-hc-spin" src="<?= base_url() ?>assets/template/images/loader.svg" width="48" height="48"
          alt="Aero"></div>
      <p>Please wait...</p>
    </div>
  </div>






  <!-- LOAD PAGE -------------------------------------------------------------------------------------------------- -->
  <?php $this->load->view($navMenu); ?>
  <?php $this->load->view($contentView); ?>






  <!-- JS BOOTSRAP -------------------------------------------------------------------------------------------------- -->
  <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
  <script src="<?= base_url() ?>assets/template/bundles/libscripts.bundle.js"></script>
  <!-- slimscroll, waves Scripts Plugin Js -->
  <script src="<?= base_url() ?>assets/template/bundles/vendorscripts.bundle.js"></script>
  <script src="<?= base_url() ?>assets/template/bundles/mainscripts.bundle.js"></script>

  <!-- JS SENDIRI -------------------------------------------------------------------------------------------------- -->
  <script type="text/javascript">
  //var.publik => digunakan di JS MODULE
  var baseURL = '<?= base_url(); ?>';

  $(document).ready(function() {
    // $("body").toggleClass("ls-toggle-menu");
    $('[data-toggle="tooltip"]').tooltip();
  });
  </script>

  <!-- JS MODULE --------------------------------------------------------------------------------------------------- -->
  <?php if ($contentView == "dashboard/referensi/refgolongan") { ?>
  <script src="<?= base_url() ?>assets/functions/dashboard/referensi/refgolongan.js"></script>
  <?php } ?>
  <?php if ($contentView == "dashboard/referensi/reftugas") { ?>
  <script src="<?= base_url() ?>assets/functions/dashboard/referensi/reftugas.js"></script>
  <?php } ?>
  <?php if ($contentView == "dashboard/referensi/reffungsi") { ?>
  <script src="<?= base_url() ?>assets/functions/dashboard/referensi/reffungsi.js"></script>
  <?php } ?>
  <?php if ($contentView == "dashboard/referensi/refcuti") { ?>
  <script src="<?= base_url() ?>assets/functions/dashboard/referensi/refcuti.js"></script>
  <?php } ?>
  <?php if ($contentView == "dashboard/referensi/refijin") { ?>
  <script src="<?= base_url() ?>assets/functions/dashboard/referensi/refijin.js"></script>
  <?php } ?>
  <?php if ($contentView == "dashboard/referensi/refshift") { ?>
  <script src="<?= base_url() ?>assets/functions/dashboard/referensi/refshift.js"></script>
  <?php } ?>

  <?php if ($contentView == "dashboard/pegawai/input_data") { ?>
  <script src="<?= base_url() ?>assets/functions/dashboard/pegawai/input_data.js"></script>
  <?php } ?>
  <?php if ($contentView == "dashboard/pegawai/rekap_all") { ?>
    <script src="<?= base_url() ?>assets/functions/dashboard/pegawai/rekap_data_all.js"></script>
    <script src="<?= base_url() ?>assets/template/plugins/light-gallery/js/lightgallery-all.min.js"></script>
    <script src="<?= base_url() ?>assets/template/js/pages/medias/image-gallery.js"></script>
  <?php } ?>

  <?php if ($contentView == "dashboard/ijin/inputdata") { ?>
  <script src="<?= base_url() ?>assets/functions/dashboard/ijin/inputdata.js"></script>
  <?php } ?>
  <?php if ($contentView == "dashboard/ijin/cetakdata") { ?>
  <script src="<?= base_url() ?>assets/functions/dashboard/ijin/cetakdata.js"></script>
  <?php } ?>

  <?php if ($contentView == "dashboard/cuti/inputdata") { ?>
  <script src="<?= base_url() ?>assets/functions/dashboard/cuti/inputdata.js"></script>
  <?php } ?>
  <?php if ($contentView == "dashboard/cuti/cetakdata") { ?>
  <script src="<?= base_url() ?>assets/functions/dashboard/cuti/cetakdata.js"></script>
  <?php } ?>

  <?php if ($contentView == "dashboard/setting/user") { ?>
  <script src="<?= base_url() ?>assets/functions/dashboard/setting/user.js"></script>
  <?php } ?>

  <!-- JS DATEPICKER (momentjs bagian dari bootstrap-material-datetimepicker.js) ----------------------------------- -->
  <?php
  switch ($contentView) {
    case "dashboard/ijin/inputdata":
      case "dashboard/ijin/cetakdata":
        case "dashboard/ijin/rekap_all":
    case "dashboard/cuti/inputdata":
      case "dashboard/cuti/cetakdata":
        case "dashboard/cuti/rekap_all":
    case "dashboard/cuti/rekap_sisa_cuti":
      ?>
  <!-- <script src="<?= base_url() ?>assets/template/plugins/momentjs/moment.js"></script> -->
  <script src="<?= base_url() ?>assets/template/plugins/momentjs/moment.js"></script>
  <script
    src="<?= base_url() ?>assets/template/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
  </script>
  <?php
      break;
  }
  ?>

  <!-- JS TABEL ---------------------------------------------------------------------------------------------------- -->
  <?php
  switch ($contentView) {
    case "dashboard/referensi/refgolongan":
    case "dashboard/referensi/reftugas":
    case "dashboard/referensi/reffungsi":
    case "dashboard/referensi/refcuti":
    case "dashboard/referensi/refijin":
    case "dashboard/referensi/refshift":
    case "dashboard/setting/user":
    case "dashboard/pegawai/input_data":
    case "dashboard/pegawai/rekap_all":
    case "dashboard/ijin/inputdata":
      case "dashboard/ijin/cetakdata":
        case "dashboard/ijin/rekap_all":
    case "dashboard/cuti/inputdata":
      case "dashboard/cuti/cetakdata":
        case "dashboard/cuti/rekap_all":
    case "dashboard/cuti/rekap_sisa_cuti":
      ?>
  <script src="<?= base_url() ?>assets/template/bundles/datatablescripts.bundle.js"></script>
  <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
  <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
  <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

  <script src="<?= base_url() ?>assets/template/plugins/select2/select2.min.js"></script>
  <script src="<?= base_url() ?>assets/template/js/pages/forms/advanced-form-elements.js"></script>
  <?php
      break;
  }
  ?>

  <!-- JS SWAL ------------------------------------------------------------------------------------------------------ -->
  <?php if ($contentView != "dashboard/home") { ?>
  <script src="<?= base_url() ?>assets/template/plugins/sweetalert/sweetalert.min.js"></script>
  <script src="<?= base_url() ?>assets/template/my_js/sweetalert2.all.min.js"></script>
  <!-- <script src="<?= base_url() ?>assets/template/js/pages/ui/sweetalert.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script> -->
  <?php } ?>

  <!-- JS CHART ----------------------------------------------------------------------------------------------------- -->
  <?php if ($contentView == "dashboard/home") { ?>
  <script src="<?= base_url() ?>assets/template/plugins/chartjs/Chart.bundle.js"></script>
  <script src="<?= base_url() ?>assets/template/plugins/chartjs/polar_area_chart.js"></script>
  <script src="<?= base_url() ?>assets/functions/dashboard/chartjs.js"></script>
  <script src="<?= base_url() ?>assets/functions/dashboard/polar_area_chart.js"></script>
  <?php } ?>



</body>

</html>