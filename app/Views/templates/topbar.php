<nav class="navbar custom-navbar navbar-expand-lg py-2">
    <div class="container-fluid px-0">
        <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
        <a href="index.html" class="navbar-brand"><img src="<?= base_url('assets/images/ap_group.png'); ?>" width="90" height="30" />
            <strong>AP</strong> Group</a>
        <div id="navbar_main">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item hidden-xs">
                    <form class="form-inline main_search">
                        <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Search..." aria-label="Search">
                    </form>
                </li>
                <span class="d-none d-xl-inline-block ms-1 text-white"><?= session()->get('username') ?></span>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <img class="rounded-circle header-profile-user" src="<?php echo base_url('assets_login/images/' . session()->get('image')) ?>" alt="Profil" height="200px" width="200px" />
                        <a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="fa fa-sign-out text-primary"></i>Sign
                            out</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>