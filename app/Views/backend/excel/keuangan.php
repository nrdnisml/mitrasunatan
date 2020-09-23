<?php
$mydate = getdate(date("U"));
header("content-type:application/vnd-ms-excel");
header("content-disposition:attachment; filename = data-income-" . "$mydate[mday]- $mydate[month]- $mydate[year]" . ".xls");
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
                <td colspan="5" style="text-align: center;">
                    <p><b> Data Pendapatan</b></p>
                </td>
            </tr>
            <tr class="label">
                <td colspan="5" style="text-align: center;">
                    <p>Klinik Mitra Sunatan</p>
                </td>
            </tr>
            <tr style="text-align: center;">
                <th>Income</th>
                <th>Total Income</th>
                <th>Sumber</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $income) : ?>
                <?php $tgl_daftar = substr($income['created_at'], 0, 10); ?>
                <tr style="text-align: center;">
                    <td><?= rupiah($income['income']); ?></td>
                    <td><?= rupiah($income['total']); ?></td>
                    <td><?= $income['sumber']; ?></td>
                    <td><?= $income['ket']; ?></td>
                    <td><?= longdate_indo($tgl_daftar); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>