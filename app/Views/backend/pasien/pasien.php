<?= $this->extend('template/admin_temp'); ?>

<?= $this->section('content'); ?>
<?php $this->db = \Config\Database::connect();
helper('global'); ?>
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Pasien Klinik</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabel" class="table table-responsive-md table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>Nama</th>
                    <th>No. RM</th>
                    <th>Usia</th>
                    <th>Gol. Darah</th>
                    <th>Alamat</th>
                    <th>Tanggal Sunat</th>
                    <th>Jumlah Kontrol</th>
                    <th>Hapus</th>
                    <th><b>Kontak</b></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pasien as $p) : ?>
                    <?php
                    $tgl_daftar = substr($p['created_at'], 0, 10);
                    $tgl_lahir = substr($p['tgl_lahir'], 0, 10);
                    $usia = hitung_umur($tgl_lahir, $tgl_daftar);
                    ?>

                    <tr class="text-center">
                        <td>
                            <a href="" data-toggle="modal" data-id="<?= $p['id_pasien'] ?>" class="tombol-detail" data-target="#modalProfile">
                                <?= $p['nama']; ?>
                            </a>
                        </td>
                        <td><?= $p['no_rm']; ?></td>
                        <td><?= $usia; ?></td>
                        <td><?= $p['gol_dar']; ?></td>
                        <td><?= $p['alamat']; ?></td>
                        <td><?= mediumdate_indo($tgl_daftar); ?></td>
                        <td>
                            <?php $n_kontrol = $this->db->table('kunjungan')
                                ->join('pasien', 'pasien.id = kunjungan.id_pasien')
                                ->where(['kunjungan.jns_kunjungan' => 'Kontrol', 'pasien.id' => $p['id_pasien']])
                                ->countAllResults();
                            echo $n_kontrol;
                            ?>
                        </td>
                        <td>
                            <div class="col-12">
                                <a href="<?= base_url('/pasien/delete'); ?>/<?= $p['id_pasien']; ?>" class="tombol-hapus btn btn-sm btn-danger mt-1"><i class="fas fa-trash"></i></a>
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
                    <th>No. RM</th>
                    <th>Usia</th>
                    <th>Gol. Darah</th>
                    <th>Alamat</th>
                    <th>Tanggal Sunat</th>
                    <th>Jumlah Kontrol</th>
                    <th>Hapus</th>
                    <th><b>Kontak</b></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- MODAL DETAIL -->
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Detail Pasien</b></h5>
                <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="close" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img src="<?= base_url('assets') ?>/img/thumbnail/thumb_profile.png" class="img-circle elevation-2" alt="User Image" width="80" height="80" style="object-fit:cover;">
                        </div>

                        <h3 class="profile-username text-center mt-2">
                            <span class="nama">nama</span>
                        </h3>
                        <div class="text-center">
                            <p class="umur d-inline">umur</p>
                            <p class="status-nikah ">status nikah</p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <ul class="list-group mb-3">
                                    <li class="list-group-item active text-center">
                                        <h3 class="text-center profile-username" id="pasien">Data Pasien</h3>
                                    </li>
                                    <li class="list-group-item">
                                        <b>No. RM</b> <a class="float-right no-rm">no rm</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tempat Lahir</b> <a class="float-right tmp-lahir">tmp lahir</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tanggal Lahir</b> <a class="float-right tgl-lahir">tgl lahir</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Pendidikan</b> <a class="float-right pendidikan">pendidikan</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Gol. darah</b> <a class="float-right gol-dar">gol-dar</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Agama</b> <a class="float-right agama">agama</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Alamat</b> <a class="float-right alamat">haha</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="col">
                                <ul class="list-group mb-3">
                                    <li class="list-group-item active text-center">
                                        <h3 class="text-center profile-username" id="sunat">Detail Sunat</h3>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Layanan</b> <a class="float-right layanan">haha</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Paket</b> <a class="float-right paket">haha</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tgl Sunat</b> <a class="float-right tgl-sunat">haha</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tgl Daftar</b> <a class="float-right tgl-daftar">haha</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul class="list-group mb-3">
                                    <li class="list-group-item active text-center">
                                        <h3 class="text-center profile-username tampilkan" id="pj">Penanggung Jawab</h3>
                                    </li>
                                    <li class="list-group-item pj">
                                        <b>Nama</b> <a class="float-right nama-pj">nama</a>
                                    </li>
                                    <li class="list-group-item pj">
                                        <b>Status</b> <a class="float-right status">nama</a>
                                    </li>
                                    <li class="list-group-item pj">
                                        <b>Alamat</b> <a class="float-right alamat-pj">nama</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <a href="<?= base_url('/pendaftar/invoice'); ?>" class="btn btn-primary btn-block">
                                    <span>Invoice </span><i class="fas fa-receipt"></i>
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="btn btn-success btn-block wa"><span>Whatsapp </span><i class="fab fa-whatsapp"></i></a>
                            </div>
                            <div class="col">
                                <a href="#" class="btn btn-warning btn-block email"><span>Email </span><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('ajax'); ?>
<script>
    $('.close').on('click', function() {
        $('.mandiri').empty();
        $('.pj').removeClass('d-none');
    });

    $('.tombol-detail').on('click', function() {
        const id = $(this).data('id');
        $('.modal-title').html("Detail Pendaftar");
        $.ajax({
            url: '<?= base_url('/pasien/jsonData'); ?>/' + id,
            data: {
                id: id
            },
            method: 'get',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data.nama_pj == null) {
                    $('.tampilkan').after('<p class="h4 text-center text-danger mandiri">Mandiri</p>');
                    $('.pj').addClass('d-none');
                }
                $('.nama').html(data.nama);
                $('.umur').html("(" + data.umur + ")");
                $('.status-nikah').html(data.status_nikah);
                $('.no-rm').html(data.no_rm);
                $('.tmp-lahir').html(data.tmp_lahir);
                $('.tgl-lahir').html(data.tgl_lahir);
                $('.pendidikan').html(data.pendidikan);
                $('.tgl-booking').html(data.tgl_booking);
                $('.gol-dar').html(data.gol_dar);
                $('.agama').html(data.agama);
                $('.alamat').html(data.alamat);
                $('.layanan').html(data.layanan);
                $('.paket').html(data.paket);
                $('.tgl-sunat').html(data.tgl_sunat);
                $('.tgl-daftar').html(data.tgl_daftar);
                $('.nama-pj').html(data.nama_pj);
                $('.alamat-pj').html(data.alamat_pj);
                $('.status').html(data.hubungan);
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