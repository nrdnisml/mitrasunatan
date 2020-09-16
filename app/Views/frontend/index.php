<?= $this->extend('template/frontend_temp'); ?>
<?= $this->section('content'); ?>
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="flash-data" data-flashdata="<?= session()->getFlashdata('error'); ?>"></div>
<?php helper('global'); ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container">
    <h1>Pendaftaran Online </h1>
    <h2>Klinik Mitra Sunatan</h2>
    <p>#sunatinovasibaru</p>
    <a href="#appointment" class="btn-get-started scrollto">Daftar Sekarang</a>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container">

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="icofont-doctor-alt"></i>
            <span data-toggle="counter-up">85</span>
            <p>Doctors</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
            <i class="icofont-patient-bed"></i>
            <span data-toggle="counter-up">18</span>
            <p>Departments</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="icofont-laboratory"></i>
            <span data-toggle="counter-up">8</span>
            <p>Research Labs</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="icofont-award"></i>
            <span data-toggle="counter-up">150</span>
            <p>Awards</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Appointment Section ======= -->
  <section id="appointment" class="appointment">
    <div class="container">

      <div class="section-title">
        <h2>Form Pendaftaran Pasien Sunat</h2>
        <p>Mohon untuk mengisi form berikut dengan sebenar-benarnya</p>
      </div>

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

        <form method="POST" action="<?= base_url('/daftar'); ?>">
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
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('alamat') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="JL. lorem, No. 01" value="<?= set_value('alamat') ?>">
                  <div class="small d-inline">Isi dengan nomor rumah, blok, nama jalan, dsb.</div>
                  <div class=" invalid-feedback">
                    <?= isset($validation) ? $validation->showError('alamat') : ''; ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <label for="rt">RT</label>
                    <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('rt') ? 'is-invalid' : ''; ?>" id="rt" name="rt" value="<?= set_value('rt') ?>">
                    <div class=" invalid-feedback">
                      <?= isset($validation) ? $validation->showError('rt') : ''; ?>
                    </div>
                  </div>
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <label for="rw">RW</label>
                    <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('rw') ? 'is-invalid' : ''; ?>" id="rw" name="rw" value="<?= set_value('rw') ?>">
                    <div class=" invalid-feedback">
                      <?= isset($validation) ? $validation->showError('rw') : ''; ?>
                    </div>
                  </div>
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <label for="kodepos">Kodepos</label>
                    <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('kodepos') ? 'is-invalid' : ''; ?>" id="kodepos" name="kodepos" value="<?= set_value('kodepos') ?>">
                    <div class=" invalid-feedback">
                      <?= isset($validation) ? $validation->showError('kodepos') : ''; ?>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="kelurahan">Kelurahan</label>
                    <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('kelurahan') ? 'is-invalid' : ''; ?>" id="kelurahan" name="kelurahan" value="<?= set_value('kelurahan') ?>">
                    <div class=" invalid-feedback">
                      <?= isset($validation) ? $validation->showError('kelurahan') : ''; ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('kecamatan') ? 'is-invalid' : ''; ?>" id="kecamatan" name="kecamatan" value="<?= set_value('kecamatan') ?>">
                    <div class=" invalid-feedback">
                      <?= isset($validation) ? $validation->showError('kecamatan') : ''; ?>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3">
                    <label for=""> Pilih </label>
                    <select class="custom-select" name="pilih">
                      <option value="Kota" <?= set_select('pilih', 'Kota'); ?>>Kota</option>
                      <option value="Kabupaten" <?= set_select('pilih', 'Kabupaten'); ?>>Kabupaten</option>
                    </select>
                  </div>
                  <div class="col-sm-6 mb-3 ">
                    <label for="kota">Nama Kota / Kabupaten</label>
                    <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('kota') ? 'is-invalid' : ''; ?>" id="kota" name="kota" value="<?= set_value('kota') ?>">
                    <div class=" invalid-feedback">
                      <?= isset($validation) ? $validation->showError('kota') : ''; ?>
                    </div>
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
                    <label for="alamat-pj">Alamat</label>
                    <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('alamat-pj') ? 'is-invalid' : ''; ?>" id="alamat-pj" name="alamat-pj" placeholder="JL. lorem, No. 01" value="<?= set_value('alamat-pj') ?>">
                    <div class="small ml-1">Isi dengan nomor rumah, blok, nama jalan, dsb.</div>
                    <div class=" invalid-feedback">
                      <?= isset($validation) ? $validation->showError('alamat-pj') : ''; ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                      <label for="rt-pj">RT</label>
                      <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('rt-pj') ? 'is-invalid' : ''; ?>" id="rt-pj" name="rt-pj" value="<?= set_value('rt-pj') ?>">
                      <div class=" invalid-feedback">
                        <?= isset($validation) ? $validation->showError('rt-pj') : ''; ?>
                      </div>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                      <label for="rw-pj">RW</label>
                      <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('rw-pj') ? 'is-invalid' : ''; ?>" id="rw-pj" name="rw-pj" value="<?= set_value('rw-pj') ?>">
                      <div class=" invalid-feedback">
                        <?= isset($validation) ? $validation->showError('rw-pj') : ''; ?>
                      </div>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                      <label for="kodepos-pj">Kodepos</label>
                      <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('kodepos-pj') ? 'is-invalid' : ''; ?>" id="kodepos-pj" name="kodepos-pj" value="<?= set_value('kodepos-pj') ?>">
                      <div class=" invalid-feedback">
                        <?= isset($validation) ? $validation->showError('kodepos-pj') : ''; ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label for="kelurahan-pj">Kelurahan</label>
                      <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('kelurahan-pj') ? 'is-invalid' : ''; ?>" id="kelurahan-pj" name="kelurahan-pj" value="<?= set_value('kelurahan-pj') ?>">
                      <div class=" invalid-feedback">
                        <?= isset($validation) ? $validation->showError('kelurahan-pj') : ''; ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="kecamatan-pj">Kecamatan</label>
                      <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('kecamatan-pj') ? 'is-invalid' : ''; ?>" id="kecamatan-pj" name="kecamatan-pj" value="<?= set_value('kecamatan-pj') ?>">
                      <div class=" invalid-feedback">
                        <?= isset($validation) ? $validation->showError('kecamatan-pj') : ''; ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3">
                      <label for=""> Pilih </label>
                      <select class="custom-select" name="pilih-pj">
                        <option value="Kota" <?= set_select('pilih-pj', 'Kota'); ?>>Kota</option>
                        <option value="Kabupaten" <?= set_select('pilih-pj', 'Kabupaten'); ?>>Kabupaten</option>
                      </select>
                    </div>
                    <div class="col-sm-6 mb-3 ">
                      <label for="kota-pj">Nama Kota / Kabupaten</label>
                      <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('kota-pj') ? 'is-invalid' : ''; ?>" id="kota-pj" name="kota-pj" value="<?= set_value('kota-pj') ?>">
                      <div class=" invalid-feedback">
                        <?= isset($validation) ? $validation->showError('kota-pj') : ''; ?>
                      </div>
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
                      <div class="card-body bg-dark overflow-auto" style="height:157px;">
                        <?php if ($paket) : ?>
                          <?php foreach ($paket as $p) : ?>
                            <div class="d-flex justify-content-center align-items-center">
                              <label class="shadow-sm rounded">
                                <input type="radio" value="<?= $p['id']; ?>" name="paket" class="card-input-element d-none" id="demo1" <?= set_radio('paket', $p['id']); ?>>
                                <div class="card card-body  bg-light d-flex flex-row justify-content-between align-items-center">
                                  <span><b><?= $p['nama']; ?></b> </span>
                                </div>
                              </label>
                              <button type="button" class="btn btn-primary mx-2 mt-n2 detail" data-id="<?= $p['id']; ?>" data-toggle="modal" data-target="#staticBackdrop">Detail
                              </button>
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

      </div>
      </form>
    </div>
  </section><!-- End Appointment Section -->

</main><!-- End #main -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-dark card-outline ">
          <div class="card-header bg-primary text-white">
            <p class="h5 nama-paket">HH</p>
          </div>
          <div class="card-body bg-light box-profile">
            <b class="">Deskripsi</b>
            <p class="des-paket">
              HH
            </p>
            <b>Biaya</b>
            <div class="d-flex justify-content-between mt-n1">
              <p>Sunat Anak :</p>
              <p class="hrg-anak">HH</p>
            </div>
            <div class="d-flex justify-content-between mt-n3">
              <p>Sunat Dewasa :</p>
              <p class="hrg-dewasa">pe</p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- End Modal  -->
<?= $this->endSection(); ?>

<?= $this->section('ajax'); ?>
<script>
  $("input[type=checkbox]").on("click", function() {
    $('.alamat-group').toggle();
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

  $('.detail').on('click', function() {
    const id = $(this).data('id');
    $('.modal-title').html("Detail Paket");
    $.ajax({
      url: '<?= base_url('/Paket/jsonRupiah'); ?>/' + id,
      data: {
        id: id
      },
      method: 'get',
      dataType: 'json',
      success: function(data) {
        $('.nama-paket').html(data.nama);
        $('.des-paket').html(data.deskripsi);
        $('.hrg-anak').html(data.harga_anak);
        $('.hrg-dewasa').html(data.harga_dewasa);
      }
    });
  });
</script>
<?= $this->endSection(); ?>