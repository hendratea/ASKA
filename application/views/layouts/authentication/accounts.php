<!doctype html>
<html class="no-js " lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

  <title>.:: ASKA Online ::. <?= $title; ?></title>
  <!-- Favicon-->
  <!-- <link rel="icon" href="favicon.ico" type="image/x-icon"> -->
  <link rel="icon" href="<?= base_url() ?>assets/template/images/logo-title.png" type="image/x-icon">
  <!-- Custom Css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/css/style.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/font-awesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/font-awesome/css/solid.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/css/animate.min.css"><!-- anim html abot -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
    rel="stylesheet">

  <style>
  body {
    font-family: "Josefin Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: <weight>;
    font-style: normal;
    background-image: url(<?= base_url() ?>assets/template/images/logo3.jpg);
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-color: #464646;
    background-size: 100% 100%;
  }
  </style>


</head>

<body class="theme-blush">

  <div class="authentication">
    <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">
        <div class="<?= $classBox; ?>">
          <h6 class="text-center" style="text-shadow: 10px 5px rgba(0,0,0,0.2);">
            <span style="color: rgb(67, 74, 82);">
              KONSULAT JENDERAL REPUBLIK INDONESIA PENANG - MALAYSIA
            </span>
          </h6>

          <?php $this->load->view($content_view); ?>

          <div style="color: rgb(67, 74, 82);text-align: center; position: fixed; bottom: 0;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;copyright </spanlass=>&copy;
            <script>
            document.write(new Date().getFullYear())
            </script>
            by H<sup>2</sup> I<sub>T</sub> C<sup>olaboration</sup>
          </div>

        </div>

      </div>
    </div>
  </div>

  <!-- Jquery Core Js -->
  <script src="<?= base_url() ?>assets/template/bundles/libscripts.bundle.js"></script>
  <script src="<?= base_url() ?>assets/template/bundles/vendorscripts.bundle.js"></script>
  <!-- Lib Scripts Plugin Js -->
  <script src="<?= base_url() ?>assets/template/js/bs-init.js"></script><!-- anim html abot -->

  <?php if ($content_view == "authentication/signin") { ?>
  <script src="<?= base_url() ?>assets/functions/accounts/signin.js"></script>
  <?php } ?>

  <?php if ($content_view == "authentication/reset_password") { ?>
  <script src="<?= base_url() ?>assets/functions/accounts/reset_password.js"></script>
  <?php } ?>

</body>

</html>