<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="ThemeMakker">
	<link rel="icon" href="/assets/images/ap_group.png" type="image/x-icon">
	<title>:: AP GROUP :: 404</title>
	<link rel="stylesheet" href="../assets/vendor/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="../assets/vendor/fontawesome/css/font-awesome.min.css">

	<link rel="stylesheet" href="../assets/css/main.css" type="text/css">
</head>

<body class="theme-indigo">
	<!-- Page Loader -->
	<div class="page-loader-wrapper">
		<div class="loader">
			<div class="m-t-30"><img src="<?= base_url('/assets/images/ap_group.png'); ?>" width="48" height="48" alt="ArrOw"></div>
			<p>Please wait...</p>
		</div>
	</div>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
					<div class="text-center pb-3">

					</div>
					<div class="card">

						<div class="card-body p-4">

							<div class="text-center">
								<h1 class="text-error">404</h1>
								<a href="index.html" class="logo">
									<img src="<?= base_url('/assets/images/ap_group.png'); ?>" alt="" height="100" class="logo-dark mx-auto">
								</a>
								<h3 class="mt-3 mb-2">Page not Found</h3>
								<p class="text-muted mb-3">
									<?php if (!empty($message) && $message !== '(null)') : ?>
										<?= nl2br(esc($message)) ?>
									<?php else : ?>
										Sorry! Cannot seem to find the page you were looking for.
									<?php endif ?></p>

								<a href="/" class="btn btn-danger waves-effect waves-light"><i class="fa fa-home"></i> Back to Home</a>
							</div>


						</div> <!-- end card-body -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->

	<!-- Core -->
	<script src="../assets/bundles/libscripts.bundle.js"></script>
	<script src="../assets/bundles/vendorscripts.bundle.js"></script>

	<script src="../assets/js/theme.js"></script>
</body>

</html>