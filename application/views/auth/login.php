<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>RoyalUI Admin</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?=base_url()?>assets/vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendors/base/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
	<div class="container-fluid page-body-wrapper full-page-wrapper">
		<div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
			<div class="row flex-grow">
				<div class="col-lg-6 d-flex align-items-center justify-content-center">
					<div class="auth-form-transparent text-left p-3">
						<div class="brand-logo">
							<img src="<?=base_url()?>assets/images/logo.svg" alt="logo">
						</div>
						<h4>Welcome back!</h4>
						<h6 class="font-weight-light">Happy to see you again!</h6>

						<?php echo validation_errors();

						if ($this->session->flashdata('error')){ ?>
							<div class="badge badge-danger"><?= $this->session->flashdata('error');?></div>
						<?php }?>

                        <div class="form-sec">
                            <form action="<?=base_url()?>index.php/login" method="post">
                                <input class="email-input" type="email" name="email" id="email" placeholder="Email">
                                <br><br>
                                <input type="password" name="password" id="password" placeholder="Password">
                                <button type="submit">SIGN IN</button>
                                <p>Don't have an account? <a href="<?=base_url()?>index.php/register">Register</a> </p>
                            </form>
                        </div>
<!--							<div class="mb-2 d-flex">-->
<!--								<button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">-->
<!--									<i class="ti-facebook mr-2"></i>Facebook-->
<!--								</button>-->
<!--								<button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">-->
<!--									<i class="ti-google mr-2"></i>Google-->
<!--								</button>-->
<!--							</div>-->
<!--							<div class="text-center mt-4 font-weight-light">-->
<!--								Don't have an account? <a href="register-2.html" class="text-primary">Create</a>-->
<!--							</div>-->


				<div class="col-lg-6 login-half-bg d-flex flex-row">
					<p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020  All rights reserved.</p>
				</div>
                    </div>
                    </div>

		</div>
		<!-- content-wrapper ends -->
	</div>
	<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?=base_url()?>assets/vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?=base_url()?>assets/js/off-canvas.js"></script>
<script src="<?=base_url()?>assets/js/hoverable-collapse.js"></script>
<script src="<?=base_url()?>assets/js/template.js"></script>
<script src="<?=base_url()?>assets/js/todolist.js"></script>
<!-- endinject -->
</body>

</html>
