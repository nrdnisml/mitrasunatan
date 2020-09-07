<?= $this->extend('template/admin_temp'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-light">
                    <div class="inner">
                        <h3>20</h3>
                        <p class="font-weight-bold">
                            Pasien
                            <span class="right badge badge-danger">Belum terkonfirmasi 2</span>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-social-dropbox"></i>
                    </div>
                    <a href="<?= base_url('/donatur'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <!-- small box -->
                <div class="small-box bg-light">
                    <div class="inner">
                        <h3>20</h3>
                        <p class="font-weight-bold">
                            Kunjungan
                            <span class="right badge badge-danger">Belum terkonfirmasi 2</span>
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
                    <span class="right badge badge-danger">Belum terkonfirmasi 2</span>
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
                    <!-- <li class="item text-center">
                            <p class="h5">Semua testimoni ditampilkan</p>
                            <p>Tidak ada testimoni baru</p>
                        </li> -->
                    <li class="item">
                        <div class="product-img">
                            <a href="#">
                                <img src="<?= base_url('assets'); ?>/img/thumbnail/profile.png" alt="Image" class="img-size-50">
                            </a>
                        </div>
                        <div class="product-info">
                            <a class="product-title">Nama
                                <a href="#" class="badge badge-primary float-right">Konfirmasi</a>
                            </a>
                            <a href="#" class="badge badge-danger float-right mr-1">hapus</a></a>
                            <span class="product-description">
                                Lorem ipsum dolor sit.
                            </span>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-img">
                            <img src="<?= base_url('assets'); ?>/img/thumbnail/profile.png" alt="Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a class="product-title">Nama
                                <a href="#" class="badge badge-primary float-right">Konfirmasi</a>
                            </a>
                            <a href="#" class="badge badge-danger float-right mr-1">hapus</a></a>
                            <span class="product-description">
                                Lorem ipsum dolor sit.
                            </span>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-img">
                            <img src="<?= base_url('assets'); ?>/img/thumbnail/profile.png" alt="Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a class="product-title">Nama
                                <a href="#" class="badge badge-primary float-right">Konfirmasi</a>
                            </a>
                            <a href="#" class="badge badge-danger float-right mr-1">hapus</a></a>
                            <span class="product-description">
                                Lorem ipsum dolor sit.
                            </span>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-img">
                            <img src="<?= base_url('assets'); ?>/img/thumbnail/profile.png" alt="Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a class="product-title">Nama
                                <a href="#" class="badge badge-primary float-right">Konfirmasi</a>
                            </a>
                            <a href="#" class="badge badge-danger float-right mr-1">hapus</a></a>
                            <span class="product-description">
                                Lorem ipsum dolor sit.
                            </span>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-img">
                            <img src="<?= base_url('assets'); ?>/img/thumbnail/profile.png" alt="Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a class="product-title">Nama
                                <a href="#" class="badge badge-primary float-right">Konfirmasi</a>
                            </a>
                            <a href="#" class="badge badge-danger float-right mr-1">hapus</a></a>
                            <span class="product-description">
                                Lorem ipsum dolor sit.
                            </span>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-img">
                            <img src="<?= base_url('assets'); ?>/img/thumbnail/profile.png" alt="Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a class="product-title">Nama
                                <a href="#" class="badge badge-primary float-right">Konfirmasi</a>
                            </a>
                            <a href="#" class="badge badge-danger float-right mr-1">hapus</a></a>
                            <span class="product-description">
                                Lorem ipsum dolor sit.
                            </span>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-img">
                            <img src="<?= base_url('assets'); ?>/img/thumbnail/profile.png" alt="Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a class="product-title">Nama
                                <a href="#" class="badge badge-primary float-right">Konfirmasi</a>
                            </a>
                            <a href="#" class="badge badge-danger float-right mr-1">hapus</a></a>
                            <span class="product-description">
                                Lorem ipsum dolor sit.
                            </span>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-img">
                            <img src="<?= base_url('assets'); ?>/img/thumbnail/profile.png" alt="Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a class="product-title">Nama
                                <a href="#" class="badge badge-primary float-right">Konfirmasi</a>
                            </a>
                            <a href="#" class="badge badge-danger float-right mr-1">hapus</a></a>
                            <span class="product-description">
                                Lorem ipsum dolor sit.
                            </span>
                        </div>
                    </li>

                </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
                <a href="#" class="uppercase">Lihat detail pendaftar</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('ajax'); ?>

<?= $this->endSection(); ?>