<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?= base_url('assets') ?>/img/logoms.png" rel="icon">
    <link href="<?= base_url('assets') ?>/img/logoms.png.png" rel="apple-touch-icon">
    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets'); ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container mt-5">

        <?= $this->renderSection('form'); ?>

    </div>

    <!-- Custom scripts for all pages-->
    <!-- jQuery -->
    <script src=" <?= base_url('assets') ?>/vendor/adminlte/plugins/jquery/jquery.min.js"> </script>
    <script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js">
    </script>
    <script src="<?= base_url('assets'); ?>/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets'); ?>/js/myscript.js"></script>

</body>

</html>