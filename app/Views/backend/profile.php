<?= $this->extend('template/admin_temp'); ?>

<?= $this->section('content'); ?>
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="row">
    <!-- PROFILE     -->
    <div class="col-lg-4 col-sm-12">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img src="<?= base_url('assets') ?>/img/thumbnail/thumb_<?= $user['img']; ?>" class="img-circle elevation-2" alt="User Image" width="120" height="120" style="object-fit:cover;">
                </div>

                <h3 class="profile-username text-center mt-3">
                    Admin
                </h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Username</b> <a class="float-right"><?= $user['username']; ?></a>
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
                <h5 class="h4 d-inline">
                    Update Profile
                </h5>
                <small class="text-danger"><i>** Kosongkan field password jika tidak ingin mengganti password</i></small>
                <br>
                <form action="<?= base_url('/profile'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control <?= isset($validation) && $validation->showError('username') ? 'is-invalid' : ''; ?>" id="username" value="<?= $user['username'] ?>">
                                <div class="invalid-feedback">
                                    <?= isset($validation) ? $validation->showError('username') : ''; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="password">Ganti password</label>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user  <?= isset($validation) && $validation->showError('password') ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user <?= isset($validation) && $validation->showError('password1') ? 'is-invalid' : ''; ?>" id="password1" name="password1" placeholder="Repeat Password">
                            <div class="invalid-feedback">
                                <?= isset($validation) ? $validation->showError('password1') : ''; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="gambar">Foto</label>
                                <input type="file" class="dropify" name="gambar" id="gambar" data-height="95" data-allowed-file-extensions="jpg jpeg png" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group ml-1">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>