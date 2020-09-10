<?= $this->extend('template/admin_temp'); ?>

<?= $this->section('content'); ?>
<?php helper('global'); ?>
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Donatur </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabel" class="table table-responsive-md table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>Nama</th>
                    <th>Tgl. Booking</th>
                    <th>Paket</th>
                    <th>Tmp. Sunat</th>
                    <th>Konfirmasi</th>
                    <th><b>Kontak</b></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pendaftar as $p) : ?>
                    <tr class="text-center">
                        <td><?= $p['nama']; ?></td>
                        <td>
                            <?php $tgl = substr($p['tgl_booking'], 0, 10);
                            $booking = longdate_indo($tgl);
                            ?>
                            <?= $booking ?>
                        </td>
                        <td><?= $p['paket']; ?></td>
                        <td><?= $p['layanan']; ?></td>
                        <td>
                            <div class="text-center">
                                <a href="<?= base_url('/pendaftar/confirm'); ?>/<?= $p['id_status']; ?>" class="btn btn-sm btn-primary mt-1"><i class="far fa-check-circle"></i></a>
                            </div>
                        </td>
                        <td>
                            <div class="row text-center">
                                <div class="col-sm-12 col-lg-4">
                                    <a href="https://wa.me/<?= $p['no_tlp']; ?>" target="blank" class="btn btn-sm btn-success mt-1"><i class="fab fa-whatsapp"></i></a>
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <a href="mailto:<?= $p['email']; ?>" target="blank" class="btn btn-sm btn-warning mt-1"><i class="fas fa-envelope"></i></a>
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <a href="<?= base_url('/pendaftar/delete'); ?>/<?= $p['id']; ?>" class="tombol-hapus btn btn-sm btn-danger mt-1"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="text-center">
                    <th>Nama</th>
                    <th>Tgl. Booking</th>
                    <th>Paket</th>
                    <th>Tmp. Sunat</th>
                    <th>Konfirmasi</th>
                    <th><b>Kontak</b></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>