<?= $this->extend('template/admin_temp'); ?>
<?= $this->section('content'); ?>
<div class="row">

    <div class="col">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="row text-center d-flex justify-content-center">
                    <div class="col-lg-5 col-sm-12">
                        <a href="" class="text-decoration-none text-dark">
                            <div class="info-box bg-primary shadow">
                                <span class="info-box-icon bg-light"><i class="fas fa-user-plus"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Kunjungan</span>
                                    <span class="info-box-number">Pasien Baru</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <a href="" class="text-decoration-none text-dark">
                            <div class="info-box bg-info shadow">
                                <span class="info-box-icon bg-light "><i class="fas fa-diagnoses"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Kunjungan</span>
                                    <span class="info-box-number">Pasien Kontrol</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>