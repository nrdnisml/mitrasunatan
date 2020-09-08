<?= $this->extend('template/admin_temp'); ?>

<?= $this->section('content'); ?>
<?php helper('global'); ?>
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary tambah" data-toggle="modal" data-target="#tambahModal">
                    <i class="fas fa-plus"> </i> Tambah Paket
                </button>
            </div>
            <?php if ($paket) : ?>
                <div class="card-body box-profile">
                    <div class="row">
                        <?php foreach ($paket as $i) : ?>
                            <div class="col-sm-12 col-md-6">
                                <div class="card card-dark card-outline bg-primary text-white">
                                    <div class="card-header bg-primary">
                                        <p class="h5"><?= $i['nama']; ?></p>
                                    </div>
                                    <div class="card-body bg-light box-profile">
                                        <b>Deskripsi</b>
                                        <p class="">
                                            <?= $i['deskripsi']; ?>
                                        </p>
                                        <b>Biaya</b>
                                        <div class="d-flex justify-content-between mt-n1">
                                            <p>Sunat Anak :</p>
                                            <p><?= rupiah($i['harga_anak']); ?></p>
                                        </div>
                                        <div class="d-flex justify-content-between mt-n3">
                                            <p>Sunat Dewasa :</p>
                                            <p><?= rupiah($i['harga_dewasa']); ?></p>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" data-toggle="modal" data-id="<?= $i['id'] ?>" data-target="#editModal" class="btn btn-info edit-data"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="<?= base_url('/paket/delete/'); ?>/<?= $i['id']; ?>" class="btn btn-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="card-body box-profile d-flex align-items-center justify-content-center" style="height: 350px;">
                    <p class="display-4 text-muted">Tidak ada daftar paket</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-10">

                            <div class="form-group">
                                <label for="username">Nama Paket</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                            </div>
                            <div class="form-group">
                                <label for="harga_d">Harga Paket Dewasa</label>
                                <input type="number" placeholder="Rp.0" name="harga_d" class="form-control" id="harga_d">
                            </div>
                            <div class="form-group">
                                <label for="harga_a">Harga Paket Anak-anak</label>
                                <input type="number" placeholder="Rp.0" name="harga_a" class="form-control" id="harga_a">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Paket</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-10">

                            <div class="form-group">
                                <label for="username">Nama Paket</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                            </div>
                            <div class="form-group">
                                <label for="harga_d">Harga Paket Dewasa</label>
                                <input type="number" placeholder="Rp.0" name="harga_d" class="form-control" id="harga_d">
                            </div>
                            <div class="form-group">
                                <label for="harga_a">Harga Paket Anak-anak</label>
                                <input type="number" placeholder="Rp.0" name="harga_a" class="form-control" id="harga_a">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Paket</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('ajax'); ?>
<script>
    $('.tambah').on('click', function() {
        $('.modal-content form').attr('action', '<?= base_url('/paket/add'); ?>');
        $('.modal-title').html("Tambah Paket");
        $.ajax({
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').html();
                $('#deskripsi').val('');
                $('#harga_a').val('');
                $('#harga_d').val('');
            }
        });
    });

    $('.edit-data').on('click', function() {
        const id = $(this).data('id');
        $('.modal-content form').attr('action', '<?= base_url('/paket/update'); ?>/' + id);
        $('.modal-title').html("Edit Data Paket");
        $.ajax({
            url: '<?= base_url('/Paket/getDataById'); ?>/' + id,
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#nama').val(data.nama);
                $('#deskripsi').val(data.deskripsi);
                $('#harga_a').val(data.harga_anak);
                $('#harga_d').val(data.harga_dewasa);
            }
        });
    });
</script>
<?= $this->endSection(); ?>