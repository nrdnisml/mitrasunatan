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
        <p class="h5">Data Income</p>
        <P class="h6">Klinik Mitra Sunatan</P>
    </div>
    <table class="table table-striped mt-4">
        <thead class="thead-light">
            <tr></tr>

            <tr>
                <th>No</th>
                <th>Income</th>
                <th>Sumber</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $income) : ?>
                <?php
                $tgl_daftar = substr($income['created_at'], 0, 10);
                ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= rupiah($income['income']); ?></td>
                    <td><?= $income['sumber']; ?></td>
                    <td><?= $income['ket']; ?></td>
                    <td><?= longdate_indo($tgl_daftar); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>