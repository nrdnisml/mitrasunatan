<?php helper('global'); ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice Mitra Sunatan </title>

    <style>
        .invoice-box {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, .15); */
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }


        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        .invoice-box table tr.tandatangan td:nth-child(2) {
            border-top: 100px solid #fff;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?= base_url('assets/img/logoms.png'); ?>" style="width:50%; max-width:300px;">
                            </td>

                            <td>

                                <?= $pendaftar['nama']; ?> <br>
                                RM : <?= $pendaftar['no_rm']; ?> <br>
                                <?php echo longdate_indo(date("Y-m-d")); ?><br>

                            </td>
                        </tr>

                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <center>
                                <td>
                                    Klinik Mitra Sunatan<br>
                                    Dusun Timur II, RT 14/RW 04. Ds Timur, RT.1, Timur 1, <br>
                                    Muneng Kidul, Kec. Sumberasih, Probolinggo
                                </td>
                            </center>


                        </tr>
                    </table>
                </td>
            </tr>



            <tr class="heading">
                <td>
                    Paket
                </td>

                <td>
                    Harga
                </td>


            </tr>

            <tr class="item">
                <td>
                    <?= $pendaftar['paket']; ?>
                </td>

                <td>
                    <?= rupiah($invoice['income']); ?>
                </td>
            </tr>

            <tr class="total">
                <td></td>

                <td>
                    <?= rupiah($invoice['income']); ?>
                </td>
            </tr>

            <tr class="tandatangan">
                <td></td>

                <td>
                    Nikmatul Mubarok, S.Kep, Ns
                </td>
            </tr>

        </table>
    </div>
    <script>
        window.print()
    </script>
</body>

</html>