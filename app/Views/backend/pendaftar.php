<?= $this->extend('template/admin_temp'); ?>

<?= $this->section('content'); ?>
<?php helper('global'); ?>
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="card">
    <div class="card-header">

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?php if ($pendaftar) : ?>
            <table id="tabel" class="table table-responsive-md table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>Nama</th>
                        <th>Tgl. Booking</th>
                        <th>Paket</th>
                        <th>Tmp. Sunat</th>
                        <th>Konfirmasi</th>
                        <th>Action</th>
                        <th><b>Kontak</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pendaftar as $p) : ?>
                        <tr class="text-center">
                            <td><a href="" data-toggle="modal" data-id="<?= $p['id_pasien'] ?>" class="tombol-detail" data-target="#modalProfile"><?= $p['nama']; ?></a></td>
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
                                    <a href="<?= base_url('/pendaftar/confirm'); ?>/<?= $p['id_pasien']; ?>" class="btn btn-sm btn-primary mt-1"><i class="far fa-check-circle"></i></a>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <a href="<?= base_url('/pendaftar/editBooking'); ?>/<?= $p['id_pasien']; ?>" data-id="<?= $p['id_pasien'] ?>" data-toggle="modal" data-target="#bookingModal" class="btn btn-sm btn-warning mt-1 tombol-edit"> <i class="fas fa-edit"></i></a>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <a href="<?= base_url('/pendaftar/delete'); ?>/<?= $p['id_pasien']; ?>" class="tombol-hapus btn btn-sm btn-danger mt-1"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row text-center">
                                    <div class="col-sm-12 col-lg-6">
                                        <a href="https://wa.me/<?= $p['no_tlp']; ?>" target="blank" class="btn btn-sm btn-success mt-1"><i class="fab fa-whatsapp"></i></a>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <a href="mailto:<?= $p['email']; ?>" target="blank" class="btn btn-sm btn-warning mt-1"><i class="fas fa-envelope"></i></a>
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
                        <th>Action</th>
                        <th><b>Kontak</b></th>
                    </tr>
                </tfoot>
            </table>
        <?php else : ?>
            <div class="d-flex justify-content-center align-items-center">
                <p class="display-3">Tidak ada pendaftar</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- MODAL DETAIL -->
<div class="modal fade" id="modalProfile" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title judul" id="exampleModalLabel"><b>Detail Calon Pasien</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img src="<?= base_url('assets') ?>/img/thumbnail/thumb_profile.png" class="img-circle elevation-2" alt="User Image" width="100" height="100" style="object-fit:cover;">
                        </div>

                        <h3 class="profile-username text-center mt-3">
                            <span class="nama"></span>
                        </h3>
                        <p class="umur text-center">(18 tahun)</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Tgl booking</b> <a class="float-right tgl-booking">haha</a>
                            </li>
                            <li class="list-group-item">
                                <b>Tgl registrasi</b> <a class="float-right tgl-daftar">haha</a>
                            </li>
                            <li class="list-group-item">
                                <b>Agama</b> <a class="float-right agama">haha</a>
                            </li>
                            <li class="list-group-item">
                                <b>Alamat</b> <a class="float-right alamat">haha</a>
                            </li>
                            <li class="list-group-item">
                                <b>Layanan</b> <a class="float-right layanan">haha</a>
                            </li>
                            <li class="list-group-item">
                                <b>Paket</b> <a class="float-right paket">haha</a>
                            </li>
                        </ul>

                        <h3 class="text-center profile-username" id="pj">Penanggung Jawab</h3>
                        <ul class="list-group list-group-unbordered kontak mb-3">
                            <li class="list-group-item">
                                <b>Nama</b> <a class="float-right nama-pj">nama</a>
                            </li>
                            <li class="list-group-item">
                                <b>Status</b> <a class="float-right status">nama</a>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn btn-warning btn-block wa"><i class="fab fa-whatsapp"></i></a>
                            </div>
                            <div class="col">
                                <a href="#" class="btn btn-success btn-block email"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDIT TANGGAL BOOKING -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Tanggal Booking</h5>
                    <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="booking">Tanggal Booking</label>
                        <input type="date" name="tgl-booking" id="booking" class="form-control tgl-booking">
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

<?= $this->section('ajax'); ?>
<script>
    $('.close').on('click', function() {
        $('.mandiri').empty();
        $('.kontak').removeClass('d-none');
    });

    $('.tombol-detail').on('click', function() {
        const id = $(this).data('id');
        $('.judul').html("Detail Pendaftar");
        $.ajax({
            url: '<?= base_url('/pendaftar/jsonData'); ?>/' + id,
            data: {
                id: id
            },
            method: 'get',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data.nama_pj == null) {
                    $('#pj').after('<p class="h4 text-center mandiri">Mandiri</p>');
                    $('.kontak').addClass('d-none');
                }
                $('.nama').html(data.nama);
                $('.tgl-booking').html(data.tgl_booking);
                $('.tgl-daftar').html(data.tgl_daftar);
                $('.alamat').html(data.alamat);
                $('.agama').html(data.agama);
                $('.layanan').html(data.layanan);
                $('.paket').html(data.paket);
                $('.nama-pj').html(data.nama_pj);
                $('.status').html(data.hubungan);
                $('.umur').html("(" + data.umur + ")");
                $('.wa').attr("href", "https://wa.me/" + data.wa);
                $('.wa').attr("target", "blank");
                $('.email').attr("href", "mailto:" + data.email);
            }
        });
    });

    $('.tombol-edit').on('click', function() {
        const id = $(this).data('id');
        $('form').attr('action', '/pendaftar/editBooking/' + id);
        $.ajax({
            url: '<?= base_url('/pendaftar/jsonData'); ?>/' + id,
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('.tgl-booking').val(data.booking);
            }
        });
    });
</script>
<?= $this->endSection(); ?>