<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Log In - AP Group</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
	<meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
	<meta content="Themesdesign" name="author" />
	<!-- favicon -->
	<link rel="shortcut icon" href="<?= base_url('assets_login/images/ap_group.png') ?>">
	<!-- css -->
	<link href="<?= base_url('assets_login/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets_login/css/materialdesignicons.min.css') ?>" rel="stylesheet" type="text/css" />
	<!-- flexslider slider -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets_login/css/flexslider.css') ?>" />
	<!--Slider-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets_login/css/owl.carousel.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets_login/css/owl.theme.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets_login/css/owl.transitions.css') ?>" />
	<!-- magnific pop-up -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets_login/css/magnific-popup.css') ?>" />
	<link href="<?= base_url('assets_login/css/style.css') ?>" rel="stylesheet" type="text/css" />

	<link href="<?= base_url('assets_login/css/all.css') ?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?= base_url('assets/toastr/toastr.min.css'); ?>">


</head>

<body>

	<div class="account-home-btn d-none d-sm-block">
		<a href="<?= base_url() ?>" class="text-primary"><i class="fas fa-home fa-lg"></i></a>
	</div>

	<section class="bg-account-pages vh-100">
		<div class="display-table">
			<div class="display-table-cell">
				<div class="container">
					<div class="row no-gutters align-items-center">
						<div class="col-lg-12">
							<div class="login-box">
								<div class="row align-items-center no-gutters">
									<div class="col-lg-6">
										<div class="bg-light">
											<div class="row justify-content-center">
												<div class="col-lg-10">
													<div class="home-img login-img text-center d-none d-lg-inline-block">
														<div class="animation-2"></div>
														<div class="animation-3"></div>
														<img src="<?= base_url('assets_login/images/ap_group.png') ?>" class="img-fluid" height="50" height="70" alt="">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="row justify-content-center">
											<div class="col-lg-11">
												<div class="p-4">
													<div class="text-center mt-3">
														<!-- <a href="<?= base_url() ?>"><img src="<?= base_url('assets_login/images/ap_group.png') ?>" alt="" height="250" height="400"></a> -->
														<p class="text-muted mt-3">Log in to continue to AP Group</p>
														<?= view('Myth\Auth\Views\_message_block') ?>
													</div>
													<div class="p-3 custom-form">
														<?= form_open('AuthController/cek_login'); ?>
														<div class="form-group">
															<input type="text" name="username" class="form-control form-control-user" placeholder="Masukan username">
														</div>
														<div class="form-group">
															<input type="password" name="password" class="form-control form-control-user" placeholder="Masukan password">
														</div>
														<div class="form-group">
															<div class="custom-control custom-checkbox small">
																<input type="checkbox" class="custom-control-input" id="customCheck">
																<label class="custom-control-label" for="customCheck">Remember Me</label>
															</div>
														</div>
														<button type="submit" class="btn btn-info btn-user btn-block">
															Login

														</button>

														<?= form_close(); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end col -->
				</div>
				<!-- end row -->
			</div>
		</div>
	</section>
	<!-- end account-pages  -->
	<!-- javascript -->

	<script src="<?= base_url('assets_login/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets_login/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('assets_login/js/jquery.easing.min.js') ?>"></script>
	<script src="<?= base_url('assets_login/js/jquery.mb.YTPlayer.js') ?>"></script>
	<!--flex slider plugin-->
	<script src="<?= base_url('assets_login/js/jquery.flexslider-min.js') ?>"></script>
	<!-- Portfolio -->
	<script src="<?= base_url('assets_login/js/jquery.magnific-popup.min.js') ?>"></script>
	<!-- contact init -->
	<script src="<?= base_url('assets_login/js/contact.init.js') ?>"></script>
	<!-- counter init -->
	<script src="<?= base_url('assets_login/js/counter.init.js') ?>"></script>
	<!-- Owl Carousel -->
	<script src="<?= base_url('assets_login/js/owl.carousel.min.js') ?>"></script>
	<script src="<?= base_url('assets_login/js/app.js') ?>"></script>

	<script src="<?= base_url('assets_login/js/all.js') ?>"></script>

	<script src="<?= base_url('assets/toastr/toastr.min.js'); ?>"></script>
	<script type="text/javascript">
		<?php if (session()->getFlashdata('success')) { ?>
			toastr.options.closeButton = true;
			toastr.options.progressBar = true;
			toastr.options.positionClass = 'toast-top-center';
			toastr.success("<?= session()->getFlashdata('success'); ?>");
		<?php } else if (session()->getFlashdata('error')) {  ?>
			toastr.options.closeButton = true;
			toastr.options.progressBar = true;
			toastr.options.positionClass = 'toast-top-center';
			toastr.error("<?= session()->getFlashdata('error'); ?>");
		<?php } else if (session()->getFlashdata('warning')) {  ?>
			toastr.options.closeButton = true;
			toastr.options.progressBar = true;
			toastr.options.positionClass = 'toast-top-center';
			toastr.warning("<?= session()->getFlashdata('warning'); ?>");
		<?php } else if (session()->getFlashdata('info')) {  ?>
			toastr.options.closeButton = true;
			toastr.options.progressBar = true;
			toastr.options.positionClass = 'toast-top-center';
			toastr.info("<?= session()->getFlashdata('info'); ?>");
		<?php } ?>
	</script>
</body>

</html>