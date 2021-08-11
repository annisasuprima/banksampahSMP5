<?php
$root = $_SERVER['DOCUMENT_ROOT'] . '/banksampahSMP5';

include($root . '../common/host.php');
include($root . '../common/koneksi.php');



use host as Host;

$data = Host\host::base_url();

?>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Bank Sampah</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="<?php echo $data . '/assets/img/icons.png'; ?>" type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="<?php echo $data . '/assets/js/plugin/webfont/webfont.min.js'; ?>"></script>
  <script>
    WebFont.load({
      google: {
        "families": ["Lato:300,400,700,900"]
      },
      custom: {
        "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
        urls: [" <?php echo $data .'/assets/css/fonts.min.css'; ?>"]
      },
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" type="text/css" href="<?php echo $data . '/assets/css/bootstrap.min.css'; ?> ">
  <link rel="stylesheet" type="text/css" href="<?php echo $data . '/assets/css/atlantis.min.css'; ?> ">


  <!-- CSS Just for demo purpose, don't include it in your project -->

  <link rel="stylesheet" type="text/css" href="<?php echo $data . '/assets/css/demo.css'; ?> ">
</head>