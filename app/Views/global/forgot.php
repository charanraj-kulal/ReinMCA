<!DOCTYPE html>
<html lang="en">
<head>

	<title>Envoy - Expense Tracker</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="author" content="">

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


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
        <?php notice_display(); ?>
        <?php echo validation_errors('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ', '</div>'); ?>
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<img src="<?php echo site_url('assets/images/logo.png');?>" alt="" class="img-fluid mb-4">
						<h4 class="mb-3 f-w-400">Forgot Password</h4>
                        <p class="mt-2 text-muted">Enter your email address below to begin the reset process.</p>
                        <form action="" method="post" class="validate">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i data-feather="mail"></i></span>
                                <input type="text" class="form-control" placeholder="Email" id="email" name="email" required="">
                            </div>
                            <!--<div class="input-group mb-4">
                                <span class="input-group-text"><i data-feather="lock"></i></span>
                                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required="">
                            </div>-->
                            <button type="submit" class="btn btn-block btn-primary mb-4">Request for New Password</button>
                        </form>
                        <p class="mb-2 text-muted"><a class="text-success" href="<?php echo site_url('');?>">Back to Login</a></p>
                        <p class="mb-0 text-muted">Designed and Developed By <br /><a href="https://idaksh.in" target="_blank">Idaksh Technologies</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="<?php echo site_url('assets/js/vendor-all.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/plugins/bootstrap.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/plugins/feather.min.js');?>"></script>
<script src="<?php echo site_url('assets/js/pcoded.min.js');?>"></script>

</body>

</html>
