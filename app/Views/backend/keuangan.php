<?= $this->extend('template/admin_temp'); ?>
<?php helper('global'); ?>
<?= $this->section('content'); ?>
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="card">
    <div class="card-header">
        <h6 class="">
            Filter data :
        </h6>
        <div class="card-title">
            <form method="GET" action="<?= base_url('/keuangan/1'); ?>" class="form-inline">
                <input type="text" class="form-control mb-2 mr-3" id="tgl-start" placeholder="Tgl Awal" onfocus="(this.type='date')" onblur="(this.type='text')" name="tgl-start" required>
                <input type="text" class="form-control mb-2 mr-sm-2" id="tgl-end" placeholder="Tgl Akhir" onfocus="(this.type='date')" onblur="(this.type='text')" name="tgl-end" required>

                <button type="submit" class="btn btn-primary mb-2">Filter</button>

            </form>
        </div>
        <div class="text-right">
            <a href="<?= base_url('/keuangan'); ?>" class="btn btn-danger">
                <i class="fas fa-calendar"></i> Semua tanggal
            </a>
            <a href="/keuangan/export" target="blank" class="btn btn-outline-danger"><i class="fas fa-print"></i> Print Data</a>
            <a href="/keuangan/export/1" class="btn btn-outline-success"><i class="fas fa-file-excel"></i> Export Excel</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabel" class="table table-responsive-md table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>Income</th>
                    <th>Sumber</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($income as $income) : ?>
                    <?php $tgl_daftar = substr($income['created_at'], 0, 10); ?>
                    <tr class="text-center">
                        <td><?= rupiah($income['income']); ?></td>
                        <td><?= $income['sumber']; ?></td>
                        <td><?= $income['ket']; ?></td>
                        <td><?= longdate_indo($tgl_daftar); ?></td>
                        <td>
                            <a href="<?= base_url('/keuangan/delete'); ?>/<?= $income['id']; ?>" class="tombol-hapus btn btn-sm btn-danger mt-1"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="text-center">
                    <th>Income</th>
                    <th>Sumber</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Hapus</th>
                </tr>
            </tfoot>
        </table>
        <h5>Total Income : <?= rupiah($totalIncome); ?></h5>
    </div>
</div>
<!-- MODAL EDIT TANGGAL BOOKING -->
<div class="modal fade" id="tambahKeuangan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url('/keuangan/add'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Income</h5>
                    <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="income">Income</label>
                        <input type="number" name="income" id="income" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sumber">Sumber Income</label>
                        <input type="text" name="sumber" id="sumber" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <input type="text" name="ket" id="ket" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>