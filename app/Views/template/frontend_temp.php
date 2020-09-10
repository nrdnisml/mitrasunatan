<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Daftar Mitra Sunatan</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets') ?>/img/favicon.png" rel="icon">
    <link href="<?= base_url('assets') ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/bs-stepper.min.css">
    <link href="<?= base_url('assets') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets') ?>/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-envelope"></i> <a href="mailto:mitrasunatan@gmail.com">mitrasunatan@gmail.com</a>
                <i class="icofont-phone"></i> 0853 3492 999
                <i class="icofont-google-map"></i> Dusun Timur II, RT/RW 014/004, Muneng Kidul, Kec. Sumberasih, Kab.
                Probolinggo
            </div>
            <div class="social-links">
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="index.html">Klinik Mitra Sunatan</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="<?= base_url('') ?>">Home</a></li>
                    <li><a href="#counts">Pencapaian</a></li>
                    <li><a href="https://www.mitrasunatan.com" target="blank">Tentang Kami</a></li>
                    <li><a href="<?= base_url('/login'); ?>">Login</a></li>
                </ul>
            </nav><!-- .nav-menu -->

            <a href="#appointment" class="appointment-btn scrollto">Daftar Sekarang</a>

        </div>
    </header><!-- End Header -->

    <?= $this->renderSection('content'); ?>

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container d-md-flex py-4">

            <div class="mr-md-auto text-center text-md-left">
                <div class="copyright">
                    &copy; Copyright <strong><span>Klinik Mitra Sunatan</span></strong>. All Rights Reserved
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <!-- <div id="preloader"></div> -->
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/counterup/counterup.min.js"></script>
    <!-- SELECT 2 -->
    <script src="<?= base_url('assets') ?>/vendor/select2/js/select2.full.min.js"></script>
    <!-- Template Main JS File -->
    <script src="<?= base_url('assets') ?>/js/main.js"></script>
    <script src="<?= base_url('assets') ?>/js/bs-stepper.min.js"></script>
    <!-- SWEETALERT -->
    <!-- sweetalert -->
    <script src="<?= base_url('assets'); ?>/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets'); ?>/js/myscript.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            stepper = new Stepper(document.querySelector('#stepper'), {
                linear: true,
                animation: true
            })
        })
        //Initialize Select2 Elements
        $('.select2').select2();
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    </script>
    <?= $this->renderSection('ajax'); ?>

</body>

</html>