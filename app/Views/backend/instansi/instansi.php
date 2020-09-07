<?= $this->extend('template/admin_temp'); ?>

<?= $this->section('content'); ?>
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="row">
    <!-- PROFILE     -->
    <div class="col-lg-4 col-sm-12">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img src="<?= base_url('assets') ?>/img/thumbnail/thumb_<?= $instansi['img']; ?>" class="img-circle elevation-2" alt="User Image" width="120" height="120" style="object-fit:cover;">
                </div>

                <h3 class="profile-username text-center mt-3">
                    <?= $instansi['nama']; ?>
                </h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>No Telp.</b> <a class="float-right"><?= $instansi['no_tlp']; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>E-mail </b> <a class="float-right"><?= $instansi['email']; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Alamat</b> <a class="float-right"><?= $instansi['alamat']; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Kelurahan</b> <a class="float-right"><?= $instansi['kelurahan']; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Kecamatan</b> <a class="float-right"><?= $instansi['kecamatan']; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Kota/Kab.</b> <a class="float-right"><?= $instansi['kota']; ?></a>
                    </li>
                </ul>
                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- END PROFILE -->
    <!-- EDIT PROFILE -->
    <div class="col-lg-8 col-sm-12">
        <div class="card card-danger card-outline">
            <div class="card-body">
                <h5 class="h4">
                    Update Data Instansi
                </h5>
                <br>
                <form action="<?= base_url('/instansi/update'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nama">Nama Instansi</label>
                                <input type="text" placeholder="Nama instansi" name="nama" class="form-control <?= isset($validation) && $validation->showError('nama') ? 'is-invalid' : ''; ?>" id="nama" value="<?= $instansi['nama'] ?>">
                                <div class="invalid-feedback">
                                    <?= isset($validation) ? $validation->showError('nama') : ''; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="Email">E-mail</label>
                            <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('email') ? 'is-invalid' : ''; ?>" id="Email" name="email" placeholder="Email" value="<?= $instansi['email'] ?>">
                            <div class=" invalid-feedback">
                                <?= isset($validation) ? $validation->showError('email') : ''; ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="no_tlp">No. Telp</label>
                            <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('no_tlp') ? 'is-invalid' : ''; ?>" id="no_tlp" name="no_tlp" placeholder="No. Telepon" value="<?= $instansi['no_tlp'] ?>">
                            <div class=" invalid-feedback">
                                <?= isset($validation) ? $validation->showError('no_tlp') : ''; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('alamat') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="JL. lorem, No. 01" value="<?= $instansi['alamat'] ?>">
                        <div class=" invalid-feedback">
                            <?= isset($validation) ? $validation->showError('alamat') : ''; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('kelurahan') ? 'is-invalid' : ''; ?>" id="kelurahan" name="kelurahan" placeholder="kelurahan" value="<?= $instansi['kelurahan'] ?>">
                            <div class=" invalid-feedback">
                                <?= isset($validation) ? $validation->showError('kelurahan') : ''; ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('kecamatan') ? 'is-invalid' : ''; ?>" id="kecamatan" name="kecamatan" placeholder="kecamatan" value="<?= $instansi['kecamatan'] ?>">
                            <div class=" invalid-feedback">
                                <?= isset($validation) ? $validation->showError('kecamatan') : ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 ">
                            <label for="kota">Nama Kota / Kabupaten</label>
                            <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('kota') ? 'is-invalid' : ''; ?>" id="kota" name="kota" placeholder="Probolinggo" value="<?= $instansi['kota'] ?>">
                            <div class=" invalid-feedback">
                                <?= isset($validation) ? $validation->showError('kota') : ''; ?>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="gambar">Logo Instansi</label>
                                <input type="file" class="dropify" name="gambar" id="gambar" data-height="95" data-allowed-file-extensions="jpg jpeg png" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group ml-1">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>