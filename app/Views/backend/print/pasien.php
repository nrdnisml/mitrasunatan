<!DOCTYPE html>
<html lang="en">

<head>
    <link href="<?= base_url('assets') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        table {
            page-break-inside: auto
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        thead {
            display: table-header-group
        }

        tfoot {
            display: table-footer-group
        }
    </style>
    <title>Document</title>
</head>

<body class="container">
    <?php $this->db = \Config\Database::connect();
    helper('global'); ?>
    <div class="text-center mt-5 ">
        <p class="h5">Data Pasien</p>
        <P class="h6">Klinik Mitra Sunatan</P>
    </div>
    <table class="table table-striped mt-4">
        <thead class="thead-light">
            <tr></tr>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No. RM</th>
                <th>Usia</th>
                <th>Gol. Darah</th>
                <th>Alamat</th>
                <th>Tanggal Sunat</th>
                <th>Jumlah Kontrol</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $p) : ?>
                <?php
                $tgl_daftar = substr($p['tgl_booking'], 0, 10);
                $tgl_lahir = substr($p['tgl_lahir'], 0, 10);
                $usia = hitung_umur($tgl_lahir, $tgl_daftar);
                ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td>
                        <?= $p['nama']; ?>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>