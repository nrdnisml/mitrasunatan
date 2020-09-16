<?= $this->extend('template/admin_temp'); ?>
<?= $this->section('content'); ?>
<?php helper('global'); ?>
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="flash-data" data-flashdata="<?= session()->getFlashdata('error'); ?>"></div>


<div class="card card-primary card-outline">
    <div class="card-header">
        <div class="row text-center d-flex justify-content-center">
            <div class="col-3">
                <a href="<?= base_url('/tambah-pasien'); ?>" class="text-decoration-none text-dark">
                    <div class="info-box bg-primary">
                        <span class="info-box-icon bg-light"><i class="fas fa-user-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Kunjungan</span>
                            <span class="info-box-number">Pasien Baru</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a href="" data-toggle="modal" data-target="#staticBackdrop" class="text-decoration-none text-dark">
                    <div class="info-box bg-info">
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
    <div class="card-body box-profile">
        <table id="tabel" class="table table-responsive-md table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>Nama</th>
                    <th>No. RM</th>
                    <th>Jenis Kunjungan</th>
                    <th>Tanggal Kunjungan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kunjungan as $k) : ?>
                    <tr class="text-center">
                        <td>
                            <?= $k['nama']; ?>
                        </td>
                        <td>
                            <?= $k['no_rm']; ?>
                        </td>
                        <td>
                            <?= $k['jns_kunjungan']; ?>
                        </td>
                        <td>
                            <?= mediumdate_indo($k['tgl_kunjungan']); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="text-center">
                    <th>Nama</th>
                    <th>No. RM</th>
                    <th>Jenis Kunjungan</th>
                    <th>Tanggal Kunjungan</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- MODAL ADD CONTROL -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('kunjungan/addKontrol'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien Kontrol</h5>
                    <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rm">Nomor Rekam Medis</label>
                        <input type="text" name="no_rm" id="rm" class="form-control tgl-rm">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL ADD PASIEN BARU -->

<?= $this->endSection(); ?>