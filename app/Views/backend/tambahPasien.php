<?= $this->extend('template/admin_temp'); ?>
<?= $this->section('css'); ?>
<link href="<?= base_url('assets') ?>/css/style.css" rel="stylesheet">
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="flash-data" data-flashdata="<?= session()->getFlashdata('error'); ?>"></div>
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="bs-stepper" id="stepper">
            <div class="bs-stepper-header" role="tablist">
                <!-- your steps here -->
                <div class="step" data-target="#data-pasien">
                    <button type="button" class="step-trigger" role="tab" aria-controls="data-pasien" id="data-pasien-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Data Pasien</span>
                    </button>
                </div>

                <div class="line"></div>
                <div class="step" data-target="#data-pj">
                    <button type="button" class="step-trigger" role="tab" aria-controls="data-pj" id="data-pj-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Data PJ</span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#paket">
                    <button type="button" class="step-trigger" role="tab" aria-controls="paket" id="paket-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Paket</span>
                    </button>
                </div>
            </div>

            <form method="POST" action="<?= base_url('/pasien/addByAdmin'); ?>">
                <div class="bs-stepper-content">

                    <!-- STEP 1 DATA PASIEN -->
                    <div id="data-pasien" class="content" role="tabpanel" aria-labelledby="data-pasien-trigger">
                        <p class="h5">Data Pasien Sunat</p>
                        <div class="line my-3"></div>
                        <div class="container">
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-6 col-sm-12">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('nama') ? 'is-invalid' : ''; ?>" name="nama" id="nama" placeholder="Nama pasien" autocomplete="off" value="<?= set_value('nama'); ?>">
                                        <div class=" invalid-feedback">
                                            <?= isset($validation) ? $validation->showError('nama') : ''; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <label>Status Nikah</label>
                                        <select name="s_nikah" class="custom-select">
                                            <option>Pilih status nikah</option>
                                            <option value="Sudah Menikah" <?= set_select('s_nikah', 'Sudah Menikah'); ?>>Sudah Menikah</option>
                                            <option value="Belum Menikah" <?= set_select('s_nikah', 'Belum Menikah'); ?>>Belum Menikah</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label>Golongan Darah</label>
                                        <select class="select2bs4 form-control" data-placeholder="Pilih Golongan Darah" name="gol_dar" id="gol_dar" style="width: 100%;">
                                            <option value=""></option>
                                            <option value="A" <?= set_select('gol_dar', 'A'); ?>>A</option>
                                            <option value="B" <?= set_select('gol_dar', 'B'); ?>>B</option>
                                            <option value="AB" <?= set_select('gol_dar', 'AB'); ?>>AB</option>
                                            <option value="O" <?= set_select('gol_dar', 'O'); ?>>O</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label>Agama</label>
                                        <select class="select2bs4 form-control" data-placeholder="Pilih Agama" name="agama" id="agama" style="width: 100%;">
                                            <option value=""></option>
                                            <option value="Islam" <?= set_select('agama', 'Islam'); ?>>Islam</option>
                                            <option value="Protestan" <?= set_select('agama', 'Protestan'); ?>>Protestan</option>
                                            <option value="Katolik" <?= set_select('agama', 'Katolik'); ?>>Katolik</option>
                                            <option value="Hindu" <?= set_select('agama', 'Hindu'); ?>>Hindu</option>
                                            <option value="Budha" <?= set_select('agama', 'Budha'); ?>>Budha</option>
                                            <option value="Konghucu" <?= set_select('agama', 'Konghucu'); ?>>Konghucu</option>
                                        </select>
                                        <div class=" invalid-feedback">
                                            <?= isset($validation) ? $validation->showError('agama') : ''; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="tmp-lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('tmp-lahir') ? 'is-invalid' : ''; ?>" name="tmp-lahir" id="tmp-lahir" autocomplete="off" value="<?= set_value('tmp-lahir'); ?>">
                                        <div class=" invalid-feedback">
                                            <?= isset($validation) ? $validation->showError('tmp-lahir') : ''; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <label for="tgl-lahir">Tgl. Lahir</label>
                                        <input type="date" class="form-control form-control-user <?= isset($validation) && $validation->showError('tgl-lahir') ? 'is-invalid' : ''; ?>" name="tgl-lahir" id="tgl-lahir" value="<?= set_value('tgl-lahir'); ?>">
                                        <div class=" invalid-feedback">
                                            <?= isset($validation) ? $validation->showError('tgl-lahir') : ''; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 col-md-6">
                                    <label>Penanggung Jawab Pasien</label>
                                    <select class="select2bs4 form-control <?= isset($validation) && $validation->showError('hubungan') ? 'is-invalid' : ''; ?>" data-placeholder="Pilih Pen. Jawab" name="hubungan" id="hubungan" style="width: 100%;">
                                        <option value=""></option>
                                        <option value="Mandiri" <?= set_select('hubungan', 'Mandiri'); ?>>Saya Sendiri</option>
                                        <option value="Orang Tua" <?= set_select('hubungan', 'Orang Tua'); ?>>Orang Tua</option>
                                        <option value="Saudara Kandung" <?= set_select('hubungan', 'Saudara Kandung'); ?>>Saudara Kandung</option>
                                        <option value="Family lain" <?= set_select('hubungan', 'Family lain'); ?>>Family Lain</option>
                                    </select>
                                    <div class=" invalid-feedback">
                                        <?= isset($validation) ? $validation->showError('hubungan') : ''; ?>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label>Pendidikan Terakhir</label>
                                    <select class="select2bs4 form-control <?= isset($validation) && $validation->showError('pendidikan') ? 'is-invalid' : ''; ?>" data-placeholder="Pilih Pendidikan" name="pendidikan" id="pendidikan" style="width: 100%;">
                                        <option value=""></option>
                                        <option value="Tidak ada" <?= set_select('pendidikan', 'Tidak ada'); ?>>Tidak Ada</option>
                                        <option value="SD" <?= set_select('pendidikan', 'SD'); ?>>SD</option>
                                        <option value="SMP Sederajat" <?= set_select('pendidikan', 'SMP Sederajat'); ?>>SMP Sederajat</option>
                                        <option value="SMA Sederajat" <?= set_select('pendidikan', 'SMA Sederajat'); ?>>SMA Sederajat</option>
                                        <option value="Diploma I" <?= set_select('pendidikan', 'Diploma I'); ?>>Diploma I</option>
                                        <option value="Diploma II" <?= set_select('pendidikan', 'Diploma II'); ?>>Diploma II</option>
                                        <option value="Diploma III" <?= set_select('pendidikan', 'Diploma III'); ?>>Diploma III</option>
                                        <option value="Diploma IV / S1" <?= set_select('pendidikan', 'Diploma IV / S1'); ?>>Diploma IV / S1</option>
                                        <option value="S2" <?= set_select('pendidikan', 'S2'); ?>>S2</option>
                                    </select>
                                    <div class=" invalid-feedback">
                                        <?= isset($validation) ? $validation->showError('pendidikan') : ''; ?>
                                    </div>
                                </div>
                            </div>

                            <p class="h5">Alamat Pasien</p>
                            <div class="line my-3"></div>
                            <div class="form-group">
                                <label for="kodepos">Kodepos</label>
                                <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('kodepos') ? 'is-invalid' : ''; ?>" id="kodepos" name="kodepos" value="<?= set_value('kodepos') ?>">
                                <div class=" invalid-feedback">
                                    <?= isset($validation) ? $validation->showError('kodepos') : ''; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 col-md-4 mb-3 mb-sm-0" id="input-kelurahan">
                                    <label for="kelurahan">Kelurahan</label>
                                    <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('kelurahan') ? 'is-invalid' : ''; ?>" id="kelurahan" name="kelurahan" value="<?= set_value('kelurahan') ?>">
                                    <div class=" invalid-feedback">
                                        <?= isset($validation) ? $validation->showError('kelurahan') : ''; ?>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 mb-3 mb-sm-0" id="select-kelurahan">
                                    <label>Kelurahan</label>
                                    <select id="kelurahan-s" class="custom-select">
                                        <option value="Sudah Menikah" <?= set_select('kelurahan', 'Sudah Menikah'); ?>>Sudah Menikah</option>
                                        <option value="Belum Menikah" <?= set_select('kelurahan', 'Belum Menikah'); ?>>Belum Menikah</option>
                                    </select>
                                </div>

                                <div class="col-sm-12 col-md-4 mb-3 mb-sm-0">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('kecamatan') ? 'is-invalid' : ''; ?>" id="kecamatan" name="kecamatan" value="<?= set_value('kecamatan') ?>">
                                    <div class=" invalid-feedback">
                                        <?= isset($validation) ? $validation->showError('kecamatan') : ''; ?>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <label for="kota">Nama Kota / Kabupaten</label>
                                    <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('kota') ? 'is-invalid' : ''; ?>" id="kota" name="kota" value="<?= set_value('kota') ?>">
                                    <div class=" invalid-feedback">
                                        <?= isset($validation) ? $validation->showError('kota') : ''; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6 mb-3 mb-sm-0">
                                    <label for="rt">RT</label>
                                    <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('rt') ? 'is-invalid' : ''; ?>" id="rt" name="rt" value="<?= set_value('rt') ?>">
                                    <div class=" invalid-feedback">
                                        <?= isset($validation) ? $validation->showError('rt') : ''; ?>
                                    </div>
                                </div>
                                <div class="col-6 mb-3 mb-sm-0">
                                    <label for="rw">RW</label>
                                    <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('rw') ? 'is-invalid' : ''; ?>" id="rw" name="rw" value="<?= set_value('rw') ?>">
                                    <div class=" invalid-feedback">
                                        <?= isset($validation) ? $validation->showError('rw') : ''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-n3">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('alamat') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="JL. lorem, No. 01" value="<?= set_value('alamat') ?>">
                                <div class="small d-inline">Isi dengan nomor rumah, blok, nama jalan, dsb.</div>
                                <div class=" invalid-feedback">
                                    <?= isset($validation) ? $validation->showError('alamat') : ''; ?>
                                </div>
                            </div>

                            <p class="h5">Kontak yang bisa dihubungi</p>
                            <div class="line my-3"></div>
                            <div class="form-group">
                                <label for="no-hp">No. Telp / WA</label>
                                <input type="text" name="no-hp" id="no-hp" class="form-control form-control-user <?= isset($validation) && $validation->showError('no-hp') ? 'is-invalid' : ''; ?>" placeholder="" value="<?= set_value('no-hp'); ?>">
                                <div class=" invalid-feedback">
                                    <?= isset($validation) ? $validation->showError('no-hp') : ''; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('email') ? 'is-invalid' : ''; ?>" name="email" id="email" value="<?= set_value('email'); ?>">
                                <div class=" invalid-feedback">
                                    <?= isset($validation) ? $validation->showError('email') : ''; ?>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-next-form mt-3" onclick="stepper.next()">Selanjutnya</button>
                        </div>
                    </div>
                    <!-- END STEP 1 DATA PASIEN -->

                    <!-- STEP 2 DATA PJ -->
                    <div id="data-pj" class="content" role="tabpanel" aria-labelledby="data-pj-trigger">
                        <p class="h5 d-inline">Data Penanggung Jawab Pasien</p>
                        <div class="line my-3"></div>
                        <div class="container data-pj">
                            <div class="form-group">
                                <label for="nama-pj">Nama Penanggung Jawab</label>
                                <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('nama-pj') ? 'is-invalid' : ''; ?>" name="nama-pj" id="nama-pj" value="<?= set_value('nama-pj') ?>">
                                <div class=" invalid-feedback">
                                    <?= isset($validation) ? $validation->showError('nama-pj') : ''; ?>
                                </div>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="checkAlamat">
                                <label class="form-check-label" for="checkAlamat">
                                    <b> Alamat tempat tinggal Pen. Jawab sama dengan pasien </b>
                                </label>
                            </div>
                            <div class="alamat-group">
                                <div class="form-group">
                                    <label for="kodepos-pj">Kodepos</label>
                                    <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('kodepos-pj') ? 'is-invalid' : ''; ?>" id="kodepos-pj" name="kodepos-pj" value="<?= set_value('kodepos-pj') ?>">
                                    <div class=" invalid-feedback">
                                        <?= isset($validation) ? $validation->showError('kodepos-pj') : ''; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-4 mb-3 mb-sm-0" id="input-kelurahan-pj">
                                        <label for="kelurahan-pj">Kelurahan</label>
                                        <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('kelurahan-pj') ? 'is-invalid' : ''; ?>" id="kelurahan-pj" name="kelurahan-pj" value="<?= set_value('kelurahan-pj') ?>">
                                        <div class=" invalid-feedback">
                                            <?= isset($validation) ? $validation->showError('kelurahan-pj') : ''; ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4 mb-3 mb-sm-0" id="select-kelurahan-pj">
                                        <label>Kelurahan</label>
                                        <select id="kelurahan-s-pj" class="custom-select">
                                        </select>
                                    </div>

                                    <div class="col-sm-12 col-md-4 mb-3 mb-sm-0">
                                        <label for="kecamatan-pj">Kecamatan</label>
                                        <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('kecamatan-pj') ? 'is-invalid' : ''; ?>" id="kecamatan-pj" name="kecamatan-pj" value="<?= set_value('kecamatan-pj') ?>">
                                        <div class=" invalid-feedback">
                                            <?= isset($validation) ? $validation->showError('kecamatan-pj') : ''; ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4">
                                        <label for="kota-pj">Nama Kota / Kabupaten</label>
                                        <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('kota-pj') ? 'is-invalid' : ''; ?>" id="kota-pj" name="kota-pj" value="<?= set_value('kota-pj') ?>">
                                        <div class=" invalid-feedback">
                                            <?= isset($validation) ? $validation->showError('kota-pj') : ''; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6 mb-3 mb-sm-0">
                                        <label for="rt-pj">RT</label>
                                        <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('rt-pj') ? 'is-invalid' : ''; ?>" id="rt-pj" name="rt-pj" value="<?= set_value('rt-pj') ?>">
                                        <div class=" invalid-feedback">
                                            <?= isset($validation) ? $validation->showError('rt-pj') : ''; ?>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="rw-pj">RW</label>
                                        <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('rw-pj') ? 'is-invalid' : ''; ?>" id="rw-pj" name="rw-pj" value="<?= set_value('rw-pj') ?>">
                                        <div class=" invalid-feedback">
                                            <?= isset($validation) ? $validation->showError('rw-pj') : ''; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-n3">
                                    <label for="alamat-pj">Alamat</label>
                                    <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('alamat-pj') ? 'is-invalid' : ''; ?>" id="-pjalamat" name="-pjalamat" placeholder="JL. lorem, No. 01" value="<?= set_value('alamat-pj') ?>">
                                    <div class="small d-inline">Isi dengan nomor rumah, blok, nama jalan, dsb.</div>
                                    <div class=" invalid-feedback">
                                        <?= isset($validation) ? $validation->showError('alamat-pj') : ''; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="container">
                            <div class="my-3"></div>
                            <button type="button" class="btn btn-secondary btn-prev-form" onclick="stepper.previous()">Kembali</button>
                            <button type="button" class="btn btn-primary btn-next-form" onclick="stepper.next()">Selanjutnya</button>
                        </div>
                    </div>
                    <!--END STEP 2 DATA PJ -->

                    <!--STEP 3 PILIH PAKET SUNAT -->
                    <div id="paket" class="content" role="tabpanel" aria-labelledby="paket-trigger">
                        <p class="h5">Pilih Paket & Layanan Sunat</p>
                        <div class="line my-3"></div>
                        <div class="container">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card mt-2">
                                        <h5 class="card-header bg-danger text-white">Tanggal Sunat</h5>
                                        <div class="card-body">
                                            <div class="form-group row d-flex justify-content-center">
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <label for="tgl-booking" class="col-sm-4 col-form-label text-right mr-2">Tanggal sunat (booking)</label>
                                                        <div class="col-sm-6">
                                                            <input type="date" class="form-control form-control-user <?= isset($validation) && $validation->showError('tgl-booking') ? 'is-invalid' : ''; ?>" id="tgl-booking" name="tgl-booking" value="<?= set_value('tgl-booking'); ?>">
                                                            <div class=" invalid-feedback">
                                                                <?= isset($validation) ? $validation->showError('tgl-booking') : ''; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="card mt-2">
                                        <div class="card-header bg-primary text-white">
                                            <h5 class="d-inline mr-2">
                                                Pilih Paket Sunat
                                            </h5>
                                            <?php if (isset($validation) && $validation->showError('paket')) : ?>
                                                <small class="d-inline bg-danger rounded text-white p-2">
                                                    <b><?= 'Mohon pilih paket !' ?></b>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-body bg-dark overflow-auto" style="height:190px;">
                                            <?php if ($paket) : ?>
                                                <?php foreach ($paket as $p) : ?>
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <label class="shadow-sm rounded">
                                                            <input type="radio" value="<?= $p['id']; ?>" name="paket" class="card-input-element d-none" id="demo1" <?= set_radio('paket', $p['id']); ?>>
                                                            <div class="card card-body  bg-light d-flex flex-row justify-content-between align-items-center">
                                                                <span><b><?= $p['nama']; ?></b> </span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <label class="shadow-sm rounded">
                                                        <div class="card card-body  bg-light d-flex flex-row justify-content-between align-items-center">
                                                            <p class="display-5">Tidak ada list paket</p>
                                                        </div>
                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="card mt-2">
                                        <div class="card-header bg-warning text-white">
                                            <h5 class="d-inline">Layanan</h5>
                                            <?php if (isset($validation) && $validation->showError('layanan')) : ?>
                                                <small class="d-inline bg-danger rounded text-white p-2">
                                                    <b><?= 'Mohon pilih layanan !' ?></b>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-body bg-dark">

                                            <div class="d-flex justify-content-center align-items-center">
                                                <label class="shadow-sm rounded">
                                                    <input type="radio" name="layanan" value="rumah" class="card-input-element d-none" id="layanan" <?= set_radio('layanan', "rumah"); ?>>
                                                    <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                                        <span>Sunat Di Rumah Pasien</span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <label class="shadow-sm rounded">
                                                    <input type="radio" value="klinik" name="layanan" class="card-input-element d-none" id="layanan" <?= set_radio('layanan', "klinik"); ?>>
                                                    <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                                        <span>Sunat di Klinik Mitra Sunatan</span>
                                                    </div>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="ml-3 mt-3">
                            <button type="button" class="btn btn-secondary btn-prev-form" onclick="stepper.previous()">Kembali</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <!--END STEP 3 PILIH PAKET SUNAT -->

            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('ajax'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        stepper = new Stepper(document.querySelector('#stepper'), {
            linear: true,
            animation: true
        })
    });
    $("input[type=checkbox]").on("click", function() {
        $('.alamat-group').toggle();
        $(".alamat-group").each(function() {
            $(this).find('input').val("");
        })
    });
    $('#hubungan').on('change', function() {
        if (this.value == "Mandiri") {
            $('.data-pj').hide();
            $('.data-pj').after('<div class="d-flex justify-content-center align-items-center data-pj-mandiri" style="height :200px"><p class="display-4 text-danger">Anda Tidak Perlu Mengisi Data Penanggung Jawab</p></div>')
        } else {
            $('.data-pj').show();
            $('.data-pj-mandiri').empty();
            $('.data-pj-mandiri').remove();
        }
    });

    $(document).ready(function() {
        let dropdownCol = $('#select-kelurahan');
        let dropdown = $('#kelurahan-s');
        let iText = $('#input-kelurahan');
        dropdownCol.hide();

        $('#kodepos').on('change', function() {
            const kodepos = $('#kodepos').val();
            $.ajax({
                url: '<?= base_url('/Pendaftar/jsonAlamatByKodePos'); ?>/' + kodepos,
                data: {
                    kodepos: kodepos
                },
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 1) {
                        //1. cek jika data lebih dari 1 maka ubah input text menjadi select options untuk kelurahan, field lain index - 0
                        dropdownCol.show();
                        iText.hide();
                        //2. hps atrribute name pada input-kelurahan, tambahkan attr name kelurahan pada dropdown
                        $('#kelurahan').attr('name', '');
                        $('#kelurahan-s').attr('name', 'kelurahan');
                        // 3. Kosongkan option pada menu dropdown
                        dropdown.empty();
                        // 4, append data json ke option value
                        $.each(data, function(key, entry) {
                            dropdown.append($('<option <?= set_select("kelurahan", 'entry.kelurahan'); ?>></option>').attr('value', entry.kelurahan).text(entry.kelurahan));
                        });
                        $('#kecamatan').val(data[0].kecamatan);
                        $('#kota').val(data[0].kabupaten);
                    } else {
                        dropdownCol.hide();
                        iText.show();
                        $('#kelurahan').attr('name', 'kelurahan');
                        $('#kelurahan-s').attr('name', '');
                        $('#kelurahan').val(data[0].kelurahan);
                        $('#kecamatan').val(data[0].kecamatan);
                        $('#kota').val(data[0].kabupaten);
                    }
                    console.log(data.length);
                }
            });
        });
    });

    $(document).ready(function() {
        let dropdownCol = $('#select-kelurahan-pj');
        let dropdown = $('#kelurahan-s-pj');
        let iText = $('#input-kelurahan-pj');
        dropdownCol.hide();

        $('#kodepos-pj').on('change', function() {
            const kodepos = $('#kodepos-pj').val();
            $.ajax({
                url: '<?= base_url('/Pendaftar/jsonAlamatByKodePos'); ?>/' + kodepos,
                data: {
                    kodepos: kodepos
                },
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 1) {
                        //1. cek jika data lebih dari 1 maka ubah input text menjadi select options untuk kelurahan, field lain index - 0
                        dropdownCol.show();
                        iText.hide();
                        //2. hps atrribute name pada input-kelurahan, tambahkan attr name kelurahan pada dropdown
                        $('#kelurahan-pj').attr('name', '');
                        dropdown.attr('name', 'kelurahan');
                        // 3. Kosongkan option pada menu dropdown
                        dropdown.empty();
                        // 4, append data json ke option value
                        $.each(data, function(key, entry) {
                            dropdown.append($('<option <?= set_select("kelurahan-pj", 'entry.kelurahan-pj'); ?>></option>').attr('value', entry.kelurahan).text(entry.kelurahan));
                        });
                        $('#kecamatan-pj').val(data[0].kecamatan);
                        $('#kota-pj').val(data[0].kabupaten);
                    } else {
                        dropdownCol.hide();
                        iText.show();
                        $('#kelurahan-pj').attr('name', 'kelurahan-pj');
                        $('#kelurahan-s-pj').attr('name', '');
                        $('#kelurahan-pj').val(data[0].kelurahan);
                        $('#kecamatan-pj').val(data[0].kecamatan);
                        $('#kota-pj').val(data[0].kabupaten);
                    }
                    console.log(data.length);
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>