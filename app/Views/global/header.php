<!DOCTYPE html>
<html lang="en">

<head>

	<title>Envoy Expense Tracker - <?php echo $page_title ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="author" content="">
    
    <script type="text/javascript">var Settings={base_url:'<?php echo base_url();?>'}</script>
    
	<!-- Favicon icon -->
	<link rel="icon" href="<?php echo site_url('assets/images/favicon.png');?>" type="image/x-icon">

	<!-- font css -->
	<link rel="stylesheet" href="<?php echo site_url('assets/fonts/feather.css');?>">
	<link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome.css');?>">
	<link rel="stylesheet" href="<?php echo site_url('assets/fonts/material.css');?>">
    
    <!-- custom css -->
	<link rel="stylesheet" href="<?php echo site_url('assets/css/custom.css');?>">

	<!-- vendor css -->
	<link rel="stylesheet" href="<?php echo site_url('assets/css/style.css');?>" id="main-style-link">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/plugins/select2.min.css');?>" id="main-style-link">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/plugins/daterangepicker.css');?>" id="main-style-link">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/plugins/datepicker.css');?>" id="main-style-link">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/plugins/sweetalert.css');?>" id="main-style-link">
    
    <?php if(isset($css)):?>
        <?php foreach($css as $j):?>
                <?php echo link_tag($j);?>
        <?php endforeach;?>
    <?php endif;?>
    
    <script src="<?php echo site_url('assets/js/plugins/jquery.min.js');?>"></script>
</head>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ Mobile header ] start -->
	<div class="pc-mob-header pc-header">
		<div class="pcm-logo">
			<img src="<?php echo site_url('assets/images/w-logo.png');?>" alt="" class="logo logo-lg">
		</div>
		<div class="pcm-toolbar">
			<a href="#!" class="pc-head-link" id="mobile-collapse">
				<div class="hamburger hamburger--arrowturn">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
			</a>
			<a href="#" class="pc-head-link btn-close" id="headerdrp-collapse">
			</a>
		</div>
	</div>
	<!-- [ Mobile header ] End -->

	<!-- [ navigation menu ] start -->
	<?php $this->load->view('navigation');?>
	<!-- [ navigation menu ] end -->
    
        