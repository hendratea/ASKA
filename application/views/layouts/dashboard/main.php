<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    
    <title><?= $titleWeb; ?></title>
    
    <link rel="icon" href="<?= base_url() ?>assets/template/images/logo-title.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/charts-c3/plugin.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/morrisjs/morris.min.css" />
    
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/template/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/font-awesome/css/solid.css">


    <?php
    switch ($contentView) {
        case "dashboard/pegawai/rekap_all":
        case "dashboard/referensi/golongan":
        // case "dashboard/event_crm/log_terminal":
        // case "dashboard/transactions/query_transactions":
        // case "dashboard/user_account/manage_accounts":
        // case "dashboard/event_crm/status_terminal":    
    ?>
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/datatables/responsive 2.2.9.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/datatables/border-table.css">

    <?php
            break;
    }
    ?>

    <?php if ($contentView == "dashboard/pegawai/input_data") { ?>
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/datatables/responsive 2.2.9.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/datatables/border-table.css">
        <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" /> -->
        
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/css/dateTimePicker.css">
        <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/select2/select2.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/multi-select/css/multi-select.css">
    <?php } ?>

    <link href="assets/template/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/css/style.min.css">
    <style>
        body,
        .sidebar,
        .active.open,  
        table {
            font-family: "Josefin Sans", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }

        #loading-overlay {
        position: absolute;
        width: 100%;
        height:100%;
        left: 0;
        top: 0;
        display: none;
        align-items: center;
        background-color: #000;
        z-index: 999;
        opacity: 0.5;
        }
        .loading-icon{ position:absolute;border-top:2px solid #fff;border-right:2px solid #fff;border-bottom:2px solid #fff;border-left:2px solid #767676;border-radius:25px;width:25px;height:25px;margin:0 auto;position:absolute;left:50%;margin-left:-20px;top:50%;margin-top:-20px;z-index:4;-webkit-animation:spin 1s linear infinite;-moz-animation:spin 1s linear infinite;animation:spin 1s linear infinite;}
        @-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
        @-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
        @keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }  

        /* .myBtn {
            background-color: DodgerBlue;
            border: none;
            color: white;
            padding: 10px;
            font-size: 15px;
            cursor: pointer;
        } */

        /* Darker background on mouse-over */
        /* .myBtn:hover {
            background-color: RoyalBlue;
        } */

    </style>
</head>

<!-- <body class="theme-blush right_icon_toggle ls-toggle-menu" style="background-color:#F5F5F5"> -->
<body class="theme-blush" style="background-color:#F5F5F5">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/template/images/loader.svg" width="48" height="48"
                    alt="Aero"></div>
            <p>Please wait...</p>
        </div>
    </div> -->
	<?php $this->load->view($navMenu); ?>
    <?php $this->load->view($contentView); ?>

    <script src="<?= base_url() ?>assets/template/bundles/libscripts.bundle.js"></script>
    <script src="<?= base_url() ?>assets/template/bundles/vendorscripts.bundle.js"></script> 
    <script src="<?= base_url() ?>assets/template/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js --> 
    <script src="<?= base_url() ?>assets/template/bundles/mainscripts.bundle.js"></script>

    <script type="text/javascript">
        var baseURL = '<?= base_url(); ?>';

        $(document).ready(function() {
            // $("body").toggleClass("ls-toggle-menu");
            $('[data-toggle="tooltip"]').tooltip();
        });
        
    </script>
    
    <?php if ($contentView == "dashboard/pegawai/input_data") { ?>
        
        <script src="<?= base_url() ?>assets/template/bundles/datatablescripts.bundle.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

        <!-- <script src="<?= base_url() ?>assets/template/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> -->
        <!-- <script src="<?= base_url() ?>assets/template/js/pages/forms/basic-form-elements.js"></script> -->
        <!-- <script src="<?= base_url() ?>assets/template/js/datetimepicker/bootstrap-clockpicker.js"></script> -->
        <script src="<?= base_url() ?>assets/template/plugins/select2/select2.min.js"></script>
        <!-- <script src="<?= base_url() ?>assets/template/js/pages/forms/advanced-form-elements.js"></script> -->
        <script src="<?= base_url() ?>assets/template/js/dateTimePicker.js"></script>

        <script src="<?= base_url() ?>assets/functions/dashboard/pegawai/input_data.js"></script>

        <script type="text/javascript">

            $('.tanggalLahirPicker').bootstrapMaterialDatePicker({
                time: false,
                clearButton: true,
                format: 'DD-MMM-YYYY',
                maxDate : new Date(),
            });

            $.material.init();
        </script>

    <?php } ?>


    <?php if ($contentView == "dashboard/pegawai/rekap_all") { ?>
        
        <script src="<?= base_url() ?>assets/template/bundles/datatablescripts.bundle.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

        <script src="<?= base_url() ?>assets/functions/dashboard/pegawai/rekap_data_all.js"></script>

    <?php } ?>

    <?php if ($contentView == "dashboard/referensi/golongan") { ?>
        
        <script src="<?= base_url() ?>assets/template/bundles/datatablescripts.bundle.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
        <script src="<?= base_url() ?>assets/template/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

        <script src="<?= base_url() ?>assets/functions/dashboard/referensi/golongan.js"></script>

    <?php } ?>

    


</body>
</html>

