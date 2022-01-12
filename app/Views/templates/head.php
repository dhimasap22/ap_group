<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ThemeMakker">
    <link rel="icon" href="<?= base_url('assets/images/ap_group.png') ?>" type="image/x-icon">
    <title>:: AP :: GROUP</title>

    <link rel="stylesheet" href="<?= base_url('assets/libs/themify-icons/themify-icons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/libs/fontawesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/libs/jquery-datatable/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/libs/multiselect/multi-select.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('assets/libs/select2/select2.min.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/js/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css') ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap-datepicker/bootstrap-datepicker.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/libs/dropify/dropify.min.css') ?>" type="text/css" />

    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/toastr/toastr.min.css'); ?>">

</head>

<body class="theme-black">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="<?= base_url('assets/images/logo_toko_serba_unik.png'); ?>" width="50" height="50" alt="Toko Serba Unik"></div>
            <p>Please wait..</p>
        </div>
    </div> -->

    <?= $this->include('templates/topbar'); ?>

    <div class="main_content" id="main-content">

        <?= $this->include('templates/menu'); ?>

        <?= $this->renderSection('content-admin'); ?>

    </div>

    <?= $this->include('templates/script'); ?>


</body>

</html>