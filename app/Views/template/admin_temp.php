<!-- LOAD DB -->
<?php $db = \Config\Database::connect(); ?>
<!-- sub menu dengan menu id - null -->
<?php $menu = $db->query("SELECT * FROM `user_sub_menu` WHERE `menu_id` IS NULL")->getResultArray(); ?>
<!-- mengambil menu dari tabel user menu -->
<?php $userMenu = $db->query("SELECT * FROM `user_menu`")->getResultArray(); ?>
<!-- mengambil user sub menu join tambel user_menu -->
<?php $userSubMenu = $db->query("SELECT `u`.`id`,`u`.`menu_id`,`u`.`title`,`u`.`url`,`u`.`icon` FROM `user_sub_menu` as `u` 
    JOIN `user_menu` 
    ON `u`.`menu_id` = `user_menu`.`id`")
    ->getResultArray();
$this->session = \Config\Services::session();
?>
<?php $instansi = $db->query("SELECT * FROM `instansi` ")->getRowArray(); ?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?= $title; ?></title>
    <!-- stepper -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/bs-stepper.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- datatable -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/datatables/css/dataTables.bootstrap4.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- dropify -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/dropify.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- FOR GALERI -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/adminlte/dist/css/adminlte.min.css">
    <link href="<?= base_url('assets') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <?= $this->renderSection('css'); ?>


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('/') ?>/" class="nav-link">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">

                    <a href="<?= base_url('/logout') ?>" class="nav-link"><i class="fas fa-sign-out-alt mr-1 pt-1"></i>Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-2">
            <!-- Brand Logo -->
            <a href="<?= base_url('dashboard') ?>" class="brand-link">
                <img src="<?= base_url('assets') ?>/img/thumbnail/thumb_<?= $instansi ? $instansi['img'] : 'profile.png'; ?>" alt="Logo" class="brand-image" style="opacity: .8">
                <span class="brand-text font-weight-light"><?= $instansi ? $instansi['nama'] : "Isi data instansi"; ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets') ?>/img/thumbnail/thumb_<?= $this->session->get('img'); ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= base_url('/profile') ?>" class="d-block"><?= $this->session->get('username'); ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- MENAMPILKAN MENU YANG TIDAK MEMILIKI SUB MENU -->
                        <?php foreach ($menu as $m) : ?>
                            <li class="nav-item">
                                <?php if ($m['title'] == $title) : ?>
                                    <a href="<?= base_url($m['url']) ?>" class="nav-link active">
                                    <?php else : ?>
                                        <a href="<?= base_url($m['url']) ?>" class="nav-link">
                                        <?php endif; ?>

                                        <i class="nav-icon <?= $m['icon']; ?>"></i>
                                        <p>
                                            <?= $m['title']; ?>
                                        </p>
                                        </a>
                            </li>
                        <?php endforeach; ?>
                        <!-- END  MENU YANG TIDAK MEMILIKI SUB MENU -->

                        <!-- MENAMPILKAN MENU YANG MEMILIKI SUB MENU -->
                        <?php foreach ($userMenu as $m) : ?>
                            <li class="nav-item has-treeview">
                                <a class="nav-link">
                                    <i class="nav-icon <?= $m['icon']; ?>"></i>
                                    <p>
                                        <?= $m['menu']; ?>
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php foreach ($userSubMenu as $u) : ?>
                                        <?php if ($m['id'] == $u['menu_id']) : ?>
                                            <li class="nav-item">
                                                <?php if ($u['title'] == $title) : ?>
                                                    <a href="<?= base_url($u['url']) ?>" class="nav-link active">
                                                    <?php else : ?>
                                                        <a href="<?= base_url($u['url']) ?>" class="nav-link">
                                                        <?php endif; ?>
                                                        <i class="far <?= $u['icon']; ?> nav-icon"></i>
                                                        <p><?= $u['title']; ?></p>
                                                        </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>

                        <li class="nav-item">
                            <a href=" <?= base_url('/logout') ?>" class="nav-link">
                                <i class="fas fa-sign-out-alt mr-1 pt-1"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= $title; ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                                <li class="breadcrumb-item active"><?= $path; ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?= $this->renderSection('content'); ?>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Admin Panel
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <a href="<?= base_url('/') ?>">Klinik Mitra Sunatan</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- Vendor JS Files -->


    <!-- Template Main JS File -->
    <!-- jQuery -->
    <script src="<?= base_url('assets') ?>/vendor/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets') ?>/vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SELECT 2 -->
    <script src="<?= base_url('assets') ?>/vendor/select2/js/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets') ?>/vendor/adminlte/dist/js/adminlte.min.js"></script>
    <!-- datatable -->
    <script src="<?= base_url('assets') ?>/vendor/datatables/js/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/datatables/js/dataTables.bootstrap4.js"></script>
    <!-- sweetalert -->
    <script src="<?= base_url('assets'); ?>/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets'); ?>/js/myscript.js"></script>
    <!-- chartjs -->
    <script src="<?= base_url('assets') ?>/vendor/adminlte/plugins/chart.js/Chart.min.js"></script>
    <!-- dropify -->
    <script src="<?= base_url('assets') ?>/js/dropify.js"></script>
    <!-- stepper -->
    <script src="<?= base_url('assets') ?>/js/bs-stepper.min.js"></script>

    <script>
        $("#tabel").DataTable();
        const menu = document.getElementsByClassName('has-treeview');
        for (let i = 0; i < menu.length; i++) {
            var expand = menu[i].querySelectorAll('.nav-treeview .nav-item a');
            var aktif = menu[i].querySelector('.has-treeview a')
            for (let j = 0; j < expand.length; j++) {
                if (expand[j].classList.contains('active')) {
                    menu[i].classList.toggle('menu-open');
                    aktif.classList.toggle('active');
                }
            }
        }
        $('.dropify').dropify({
            error: {
                'fileSize': 'Ukuran file terlalu besar. ({{ value }} max).',
                'fileExtension': 'Format hanya diperbolehkan ({{ value }}).'
            }
        });
    </script>
    <?= $this->renderSection('ajax'); ?>

</body>

</html>