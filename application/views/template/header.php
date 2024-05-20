<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>img/favicon/esemkita-lg.png" type="image/x-ic
    on">
    <title>SPPKITA | <?= $title ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/node_modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/node_modules/selectric/public/selectric.css">
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/node_modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/assets/css/components.css">

    <!-- CDN Libraries Link -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url('assets/template/') ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">
                                <?php if ($this->session->userdata('level') == 'Admin' || $this->session->userdata('level')  == 'Petugas') : ?>
                                    <span><?= $user['NAMA_PETUGAS'] ?></span>
                                <?php else : ?>
                                    <span><?= $siswa['NISN'] ?></span>
                                <?php endif ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item has-icon text-danger logout" data-toggle="tooltip">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <img src="<?= base_url('public') ?>/img/esemkita-lg.png" width="30px" alt="">
                        <a href="<?= base_url('user') ?>">SPPKITA</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= base_url('user') ?>">SK</a>
                    </div>
                    <ul class="sidebar-menu">