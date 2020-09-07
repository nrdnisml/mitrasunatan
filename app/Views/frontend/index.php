<?= $this->extend('template/frontend_temp'); ?>
<?= $this->section('content'); ?>
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

        <div class="bs-stepper-content">
          <!-- STEP 1 DATA PASIEN -->
          <form action="POST">
            <div id="data-pasien" class="content" role="tabpanel" aria-labelledby="data-pasien-trigger">
              <p class="h5">Data Pasien Sunat</p>
              <div class="line my-3"></div>
              <div class="container">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama pasien" required autocomplete="off">
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <label>Status Nikah</label>
                      <select class="custom-select">
                        <option selected>Pilih status nikah</option>
                        <option value="Sudah Menikah">Sudah Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                      </select>

                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      <label>Golongan Darah</label>
                      <select class="select2bs4 form-control" data-placeholder="Pilih Golongan Darah" name="rt" id="rt-i" style="width: 100%;">
                        <option value=""></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                      </select>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <label>Agama</label>
                      <select class="select2bs4 form-control" data-placeholder="Pilih Agama" name="agama" id="agama" style="width: 100%;">
                        <option value=""></option>
                        <option value="Islam">Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      <label for="tmp-lahir">Tempat Lahir</label>
                      <input type="text" class="form-control" name="tmp-lahir" id="tmp-lahir" placeholder="Kota/Kab." required autocomplete="off">
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <label for="tgl-lahir">Tgl. Lahir</label>
                      <input type="date" class="form-control" name="tgl-lahir" id="tgl-lahir" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Pendidikan Terakhir</label>
                  <select class="select2bs4 form-control" data-placeholder="Pilih Pendidikan" name="pendidikan" id="pendidikan" style="width: 100%;">
                    <option value=""></option>
                    <option value="Tidak ada">Tidak Ada</option>
                    <option value="SD">SD</option>
                    <option value="SMP Sederajat">SMP Sederajat</option>
                    <option value="SMA Sederajat">SMA Sederajat</option>
                    <option value="Diploma I">Diploma I</option>
                    <option value="Diploma II">Diploma II</option>
                    <option value="Diploma III">Diploma III</option>
                    <option value="Diploma IV / S1">Diploma IV / S1</option>
                    <option value="S2">S2</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="alamat-pasien">Alamat Pasien</label>
                  <textarea class="form-control" name="alamat-pasien" id="alamat-pasien" rows="4" required></textarea>
                </div>
                <p class="h5">Kontak yang bisa dihubungi</p>
                <div class="line my-3"></div>
                <div class="form-group">
                  <label for="no-hp">No. Telp / WA</label>
                  <input type="number" name="no-hp" id="no-hp" class="form-control" placeholder="08XX">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email" id="email">
                  <input type="hidden" name="">
                </div>
                <button class="btn btn-primary btn-next-form mt-3" onclick="stepper.next()">Selanjutnya</button>
              </div>
            </div>
          </form>
          <!-- END STEP 1 DATA PASIEN -->

          <!-- STEP 2 DATA PJ -->
          <div id="data-pj" class="content" role="tabpanel" aria-labelledby="data-pj-trigger">
            <p class="h5 d-inline">Data Penanggung Jawab Pasien</p>
            <span class="text-danger">
              <small><i> (Abaikan jika pasien sendiri sebagai penanggung jawab)</i></small></span>
            <div class="line my-3"></div>
            <div class="container">
              <div class="form-group">
                <label for="nama-pj">Nama Penanggung Jawab</label>
                <input type="text" class="form-control" name="nama-pj" id="nama-pj">
              </div>
              <div class="form-group">
                <label>Status Hubungan dengan Pasien</label>
                <select class="select2bs4 form-control" data-placeholder="Pilih Hubungan" name="hubungan" id="hubungan" style="width: 100%;">
                  <option value=""></option>
                  <option value="Orang Tua">Orang Tua</option>
                  <option value="Saudara Kandung">Saudara Kandung</option>
                  <option value="Family lain">Family Lain</option>
                </select>
              </div>
              <div class="form-group">
                <label for="alamat-pj">Alamat Penanggung Jawab</label>
                <textarea class="form-control" name="alamat-pj" id="alamat-pj" rows="4" required></textarea>
              </div>
              <div class="my-3"></div>
              <button class="btn btn-secondary btn-prev-form" onclick="stepper.previous()">Kembali</button>
              <button class="btn btn-primary btn-next-form" onclick="stepper.next()">Selanjutnya</button>
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
                    <h5 class="card-header bg-primary text-white">Pilih Paket Sunat</h5>
                    <div class="card-body">

                      <div class="d-flex justify-content-center align-items-center">
                        <label class="shadow-sm rounded">
                          <input type="radio" name="paket" class="card-input-element d-none" id="demo1">
                          <div class="card card-body  bg-light d-flex flex-row justify-content-between align-items-center">
                            <span><b>Paket 1</b> </span>
                          </div>
                        </label>
                        <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#staticBackdrop">Detail
                        </button>
                      </div>

                      <div class="d-flex justify-content-center align-items-center">
                        <label class="shadow-sm rounded">
                          <input type="radio" name="paket" class="card-input-element d-none" id="paket">
                          <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                            <b>Paket 2</b>
                          </div>
                        </label>
                        <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#staticBackdrop">Detail
                        </button>
                      </div>

                      <div class="d-flex justify-content-center align-items-center">
                        <label class="shadow-sm rounded">
                          <input type="radio" name="paket" class="card-input-element d-none" id="paket">
                          <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                            <b>Paket 2</b>
                          </div>
                        </label>
                        <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#staticBackdrop">Detail
                        </button>
                      </div>

                      <div class="d-flex justify-content-center align-items-center">
                        <label class="shadow-sm rounded">
                          <input type="radio" name="paket" class="card-input-element d-none" id="paket">
                          <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                            <b>Paket 2</b>
                          </div>
                        </label>
                        <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#staticBackdrop">Detail
                        </button>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="card mt-2">
                    <h5 class="card-header bg-warning text-white">Pilih Layanan Sunat</h5>
                    <div class="card-body">

                      <div class="d-flex justify-content-center align-items-center">
                        <label class="shadow-sm rounded">
                          <input type="radio" name="layanan" class="card-input-element d-none" id="layanan">
                          <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                            <span>Sunat Di Rumah Pasien</span>
                          </div>
                        </label>
                      </div>

                      <div class="d-flex justify-content-center align-items-center">
                        <label class="shadow-sm rounded">
                          <input type="radio" name="layanan" class="card-input-element d-none" id="layanan">
                          <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                            <span>Sunat di Klinik Mitra Sunatan</span>
                          </div>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-3">
                <button class="btn btn-secondary btn-prev-form" onclick="stepper.previous()">Kembali</button>
                <button type="submit" class="btn btn-primary btn-next-form">Submit</button>
              </div>
            </div>
          </div>
          <!--END STEP 3 PILIH PAKET SUNAT -->

        </div>
      </div>
  </section><!-- End Appointment Section -->

</main><!-- End #main -->

<?= $this->endSection(); ?>