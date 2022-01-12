<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register - Toko Serba Unik</title>
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


                                                        <img src="<?= base_url('assets_frontend/images/1.png') ?>" class="img-fluid" height="100" alt="">
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
                                                        <p class="text-muted mt-3">Sign up for a new Account

                                                        </p>
                                                    </div>
                                                    <div class="p-3 custom-form">
                                                        <?= view('Myth\Auth\Views\_message_block') ?>

                                                        <form action="<?= route_to('register') ?>" method="post">
                                                            <?= csrf_field('') ?>

                                                            <div class="form-group">
                                                                <label for="fullname">Fullname</label>
                                                                <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" placeholder="Fullname" value="<?= old('fullname') ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="username"><?= lang('Auth.username') ?></label>
                                                                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email"><?= lang('Auth.email') ?></label>
                                                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password"><?= lang('Auth.password') ?></label>
                                                                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                                                <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                                            </div>
                                                            <div class="form-group mb-0 text-center">
                                                                <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-12 text-center">
                                                                    <p><?= lang('Auth.alreadyRegistered') ?> <a class="text-success" href="<?= route_to('login') ?>"><b><?= lang('Auth.signIn') ?></b></a></p>
                                                                    <p class="text-muted ">Back to home? <a class="text-success" href="<?= base_url() ?>"><b> Home</b></a></p>
                                                                </div> <!-- end col -->
                                                            </div>
                                                        </form>
                                                        <!-- <form>
                                                            <div class="form-group">
                                                                <label for="firstname">First Name</label>
                                                                <input type="text" class="form-control" id="firstname" placeholder="First Name">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="password" class="form-control" id="email" placeholder="Enter Email">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="userpassword">Password</label>
                                                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                            </div>

                                                            <div class="mt-3">
                                                                <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                                                            </div>

                                                            <div class="mt-4 mb-0 text-center">
                                                                <p class="mb-0">Don't have an account ? <a href="login.html" class="text-success">Sign in</a></p>
                                                            </div>
                                                        </form> -->
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