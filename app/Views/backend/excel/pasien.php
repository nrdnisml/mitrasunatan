<?php
$mydate = getdate(date("U"));
header("content-type:application/vnd-ms-excel");
header("content-disposition:attachment; filename = data-pasien-" . "$mydate[mday]- $mydate[month]- $mydate[year]" . ".xls");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="<?= base_url('assets') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table1 {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
        }

        .table1,
        th,
        td {
            border: 1px solid #999;
            padding: 8px 20px;
            vertical-align: center;
        }

        .label {
            border: 1px solid white !important;
        }
    </style>
</head>

<body>
    <?php $this->db = \Config\Database::connect();
    helper('global'); ?>
    <table class="table1">
        <thead>
            <tr class="label">
                <td colspan="16" style="text-align: center;">
                    <p><b> Data Pasien</b></p>
                </td>
            </tr>
            <tr class="label">
                <td colspan="16" style="text-align: center;">
                    <p>Klinik Mitra Sunatan</p>
                </td>
            </tr>
            <tr style="text-align: center;">
                <th>Nama</th>
                <th>No. RM</th>
                <th>Usia</th>
                <th>Agama</th>
                <th>Gol. Darah</th>
                <th>Pendidikan</th>
                <th>Tmp/Tgl Lahir</th>
                <th>Alamat</th>
                <th>Tanggal Registrasi</th>
                <th>Tanggal Sunat</th>
                <th>Layanan</th>
                <th>Paket</th>
                <th>Jumlah Kontrol</th>
                <th>Pen. Jawab</th>
                <th>Status Pen. Jawab</th>
                <th>Alamat Pen. Jawab</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $p) : ?>
                <tr style="text-align: center;">
                    <td><?= $p['nama']; ?></td>
                    <td><?= $p['no_rm']; ?></td>
                    <td><?= $p['umur']; ?></td>
                    <td><?= $p['agama']; ?></td>
                    <td><?= $p['gol_dar']; ?></td>
                    <td><?= $p['pendidikan']; ?></td>
                    <td><?= $p['tmp_lahir']; ?> / <?= $p['tgl_lahir']; ?></td>
                    <td><?= $p['alamat']; ?></td>
                    <td><?= $p['tgl_daftar']; ?></td>
                    <td><?= $p['tgl_sunat']; ?></td>
                    <td><?= $p['layanan']; ?></td>
                    <td><?= $p['paket']; ?></td>
                    <td>
                        <?php $n_kontrol = $this->db->table('kunjungan')
                            ->join('pasien', 'pasien.id = kunjungan.id_pasien')
                            ->where(['kunjungan.jns_kunjungan' => 'Kontrol', 'pasien.id' => $p['id_pasien']])
                            ->countAllResults();
                        echo $n_kontrol;
                        ?>
                    </td>
                    <td><?= $p['nama_pj']; ?></td>
                    <td><?= $p['hubungan']; ?></td>
                    <td><?= $p['alamat_pj']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>