<?= $this->extend('template/admin_temp'); ?>

<?= $this->section('content'); ?>

<div class="card card-warning card-outline">
    <div class="card-body">
        <div class="text-center">
            <p class="display-6">Data Instansi Belum Ada</p>
            <p class="h5">Tambah Data Instansi</p>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-10 border-top border-warning">
                    <form action="<?= base_url('/instansi/tambah'); ?>" method="post" enctype="multipart/form-data">
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama">Nama Instansi</label>
                                    <input type="text" placeholder="Nama instansi" name="nama" class="form-control <?= isset($validation) && $validation->showError('nama') ? 'is-invalid' : ''; ?>" id="nama" value="<?= set_value('nama') ?>">
                                    <div class="invalid-feedback">
                                        <?= isset($validation) ? $validation->showError('nama') : ''; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="Email">E-mail</label>
                                <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('email') ? 'is-invalid' : ''; ?>" id="Email" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                                <div class=" invalid-feedback">
                                    <?= isset($validation) ? $validation->showError('email') : ''; ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="no_tlp">No. Telp</label>
                                <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('no_tlp') ? 'is-invalid' : ''; ?>" id="no_tlp" name="no_tlp" placeholder="No. Telepon" value="<?= set_value('no_tlp') ?>">
                                <div class=" invalid-feedback">
                                    <?= isset($validation) ? $validation->showError('no_tlp') : ''; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('alamat') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="JL. lorem, No. 01" value="<?= set_value('alamat') ?>">
                            <div class=" invalid-feedback">
                                <?= isset($validation) ? $validation->showError('alamat') : ''; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="kelurahan">Kelurahan</label>
                                <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('kelurahan') ? 'is-invalid' : ''; ?>" id="kelurahan" name="kelurahan" placeholder="kelurahan" value="<?= set_value('kelurahan') ?>">
                                <div class=" invalid-feedback">
                                    <?= isset($validation) ? $validation->showError('kelurahan') : ''; ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" class="form-control form-control-user <?= isset($validation) && $validation->showError('kecamatan') ? 'is-invalid' : ''; ?>" id="kecamatan" name="kecamatan" placeholder="kecamatan" value="<?= set_value('kecamatan') ?>">
                                <div class=" invalid-feedback">
                                    <?= isset($validation) ? $validation->showError('kecamatan') : ''; ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for=""> Pilih </label>
                                <select class="custom-select" name="pilih">
                                    <option value="Kota" selected>Kota</option>
                                    <option value="Kabupaten">Kabupaten</option>
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3 ">
                                <label for="kota">Nama Kota / Kabupaten</label>
                                <input type="text" class="form-control form-control-user  <?= isset($validation) && $validation->showError('kota') ? 'is-invalid' : ''; ?>" id="kota" name="kota" placeholder="Nama Kota/Kab" value="<?= set_value('kota') ?>">
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>