<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Reset Password - Toko Serba Unik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
    <meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
    <meta content="Themesdesign" name="author" />
    <!-- favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets_frontend/images/logo/logo_toko_serba_unik.png') ?>">
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


                                                        <img src="<?= base_url('assets_frontend/images/1.png') ?>" class="img-fluid" alt="">
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
                                                        <a href="<?= base_url() ?>"><img src="<?= base_url('assets_frontend/images/logo/logo-text.png') ?>" alt="" height="70"></a>
                                                        <p class="text-muted mt-3">Reset Password</p>
                                                    </div>
                                                    <div class="p-3 custom-form">

                                                        <div class="alert alert-success bg-soft-primary text-primary border-0   text-center" role="alert">
                                                            Enter your email address and we'll send you an email with instructions to reset your password.
                                                        </div>

                                                        <form action="<?= route_to('forgot') ?>" method="post">
                                                            <div class="form-group">
                                                                <label for="email"><?= lang('Auth.emailAddress') ?></label>
                                                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                                                                <div class="invalid-feedback">
                                                                    <?= session('errors.email') ?>
                                                                </div>

                                                                <div class="mt-3">
                                                                    <button type="submit" class="btn btn-primary btn-block">Reset your Password</button>
                                                                </div>
                                                        </form>
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

</body>

</html>