<?= $this->extend('template/admin_temp'); ?>

<?= $this->section('content'); ?>
<?php helper('global'); ?>
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-light">
                    <div class="inner">
                        <h3><?= $n_pasien; ?></h3>
                        <p class="font-weight-bold">
                            Pasien
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-social-dropbox"></i>
                    </div>
                    <a href="<?= base_url('/pasien'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-light">
                    <div class="inner">
                        <h3><?= $n_kunjungan; ?></h3>
                        <p class="font-weight-bold">
                            Kunjungan
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion  ion-ios-people"></i>
                    </div>
                    <a href="<?= base_url('/user'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- solid sales graph -->
        <div class="card bg-gradient-dark">
            <div class="card-header border-0">
                <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    Grafik Keuangan
                </h3>
            </div>
            <div id="container">
                <div class="card-body">

                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pendaftar
                    <span class="right badge badge-danger">Belum terkonfirmasi</span>
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0 overflow-auto" style="height: 300px;">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    <?php if (!$pendaftar) : ?>
                        <li class="item text-center">
                            <p class="h5">Semua pendaftar telah dikonfirmasi</p>
                            <p>Tidak ada pendaftar baru</p>
                        </li>
                    <?php else : ?>
                        <?php foreach ($pendaftar as $p) : ?>
                            <li class="item">
                                <div class="product-img">
                                    <a href="#" data-toggle="modal" data-id="<?= $p['id_pasien'] ?>" class="tombol-detail" data-target="#modalProfile">
                                        <img src="<?= base_url('assets'); ?>/img/thumbnail/profile.png" alt="Image" class="img-size-50">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a class="product-title"><?= $p['nama']; ?>
                                        <a href="<?= base_url('/dashboard/confirm/'); ?>/<?= $p['id_pasien']; ?>" class="badge badge-primary float-right">Konfirmasi</a>
                                    </a>
                                    <a href="<?= base_url('/dashboard/delete'); ?>/<?= $p['id_pasien']; ?>" class="tombol-hapus badge badge-danger float-right mr-1">hapus</a></a>
                                    <span class="product-description">
                                        <?php $tgl_booking = substr($p['tgl_booking'], 0, 10);  ?>
                                        Booking :
                                        <?= mediumdate_indo($tgl_booking); ?>
                                    </span>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
                <a href="<?= base_url('/pendaftar'); ?>" class="uppercase">Lihat detail pendaftar</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
</div>

<!-- MODAL DETAIL -->
<div class="modal fade" id="modalProfile" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Detail Pendaftar</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img src="<?= base_url('assets') ?>/img/thumbnail/thumb_profile.png" class="img-circle elevation-2" alt="User Image" width="100" height="100" style="object-fit:cover;">
                        </div>

                        <h3 class="profile-username text-center mt-3">
                            <span class="nama"></span>
                        </h3>
                        <p class="umur text-center">(18 tahun)</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Tgl booking</b> <a class="float-right tgl-booking">haha</a>
                            </li>
                            <li class="list-group-item">
                                <b>Agama</b> <a class="float-right agama">haha</a>
                            </li>
                            <li class="list-group-item">
                                <b>Alamat</b> <a class="float-right alamat">haha</a>
                            </li>
                            <li class="list-group-item">
                                <b>Layanan</b> <a class="float-right layanan">haha</a>
                            </li>
                            <li class="list-group-item">
                                <b>Paket</b> <a class="float-right paket">haha</a>
                            </li>
                        </ul>

                        <h3 class="text-center profile-username" id="pj">Penanggung Jawab</h3>
                        <ul class="list-group list-group-unbordered kontak mb-3">
                            <li class="list-group-item">
                                <b>Nama</b> <a class="float-right nama-pj">nama</a>
                            </li>
                            <li class="list-group-item">
                                <b>Status</b> <a class="float-right status">nama</a>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn btn-warning btn-block wa"><i class="fab fa-whatsapp"></i></a>
                            </div>
                            <div class="col">
                                <a href="#" class="btn btn-success btn-block email"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('ajax'); ?>
<script>
    $('.close').on('click', function() {
        $('.mandiri').empty();
        $('.kontak').removeClass('d-none');
    });

    $('.tombol-detail').on('click', function() {
        const id = $(this).data('id');
        console.log(id);
        $('.modal-title').html("Detail Pendaftar");
        $.ajax({
            url: '<?= base_url('/pendaftar/jsonData'); ?>/' + id,
            data: {
                id: id
            },
            method: 'get',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data.nama_pj == null) {
                    $('#pj').after('<p class="h4 text-center text-danger mandiri my-4">Mandiri</p>');
                    $('.kontak').addClass('d-none');
                }
                $('.nama').html(data.nama);
                $('.tgl-booking').html(data.tgl_booking);
                $('.alamat').html(data.alamat);
                $('.agama').html(data.agama);
                $('.layanan').html(data.layanan);
                $('.paket').html(data.paket);
                $('.nama-pj').html(data.nama_pj);
                $('.status').html(data.hubungan);
                $('.umur').html("(" + data.umur + ")");
                $('.wa').attr("href", "https://wa.me/" + data.wa);
                $('.wa').attr("target", "blank");
                $('.email').attr("href", "mailto:" + data.email);
            }
        });
    });
</script>
<?= $this->endSection(); ?>