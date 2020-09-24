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
    <div class="text-center mt-5 ">
        <p class="h5">Data Kunjungan Pasien</p>
        <P class="h6">Klinik Mitra Sunatan</P>
    </div>
    <table class="table table-striped mt-4">
        <thead class="thead-light">
            <tr></tr>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No. RM</th>
                <th>Jenis Kunjungan</th>
                <th>Tanggal Kunjungan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $k) : ?>
                <tr>
                    <td><?= $i++; ?></td>
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
                        <?= longdate_indo($k['tgl_kunjungan']); ?>
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