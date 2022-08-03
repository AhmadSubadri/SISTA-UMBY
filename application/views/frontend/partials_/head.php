<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url()?>assets/logo/iconnavweb.ico" rel="icon">
  <link href="<?php echo base_url()?>assets/logo/iconnavweb.ico" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php base_url()?>frontend/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php base_url()?>frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php base_url()?>frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php base_url()?>frontend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php base_url()?>frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php base_url()?>frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/icon/themify-icons/themify-icons.css">
  <!-- Template Main CSS File -->
  <link href="<?php base_url()?>frontend/css/style.css" rel="stylesheet">
</head>

<body>
	<?php $this->load->view('frontend/partials_/top_bar.php');?>
	<?php $this->load->view('frontend/partials_/nav.php');?>