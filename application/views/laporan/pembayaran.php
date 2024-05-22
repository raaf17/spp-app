<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi Pembayaran</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        header {
            margin-left: 120px;
        }

        header img {
            position: absolute;
            top: 10px;
        }

        header h2 {
            position: absolute;
            top: -15px;
            /* left: 50px; */
            font-size: 18px;
            line-height: 25px;
            text-align: center;
            text-transform: uppercase;
        }

        header h2 span {
            font-size: 12px;
            font-style: regular;
            line-height: 15px;
            text-transform: capitalize;
        }

        section#konten {
            position: absolute;
            top: 125px;
        }

        span.email {
            text-transform: lowercase;
        }

        .hr1 {
            margin-top: 15px;
            border-color: grey;
        }


        .hr2 {
            border: 1px solid black;
            margin-top: -15px;
        }

        .ttd p {
            position: relative;
            left: 70%;
        }
    </style>
    </style>
</head>

<body>
    <header class="p-0">
        <h2 class="ml-5 text-center">Pemerintah Provinsi Jawa Timur<br>Dinas Pendididkan<br>SMKN 1 BOYOLANGU<br><span>Jl. Ki Mangun Sarkoro, Beji - Boyolangu - Tulungagung Telp./Fax : (0336) 444112 <br><span class="email"><b>email</b> : smkn1boyolangu@yahoo.com</span></span></h2>
    </header><br><br>

    <section id="konten">
        <hr class="hr1">
        <hr class="hr2">
        <h3 class="text-center mb-2">Data Transaksi Pembayaran</h3>
        <p><i>Tanggal : <?= date('d-m-Y', strtotime($this->input->post('tgl1'))) . " s/d " . date('d-m-Y', strtotime($this->input->post('tgl2'))) ?></i></p>

        <table class="table table-bordered">
            <thead class="table table-primary">
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tahun Ajaran</th>
                    <th>Pembayaran Bulan</th>
                    <th>Jumlah Bayar</th>
                    <th>Kembalian</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $jumlah = 0;
                foreach ($transaksi as $p) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->NISN ?></td>
                        <td><?= $p->NAMA ?></td>
                        <td><?= $p->nama_kelas ?></td>
                        <td><?= $p->TAHUN ?></td>
                        <td><?= $p->BULAN_DIBAYAR ?></td>
                        <td align="right">Rp.<?= number_format($p->BAYAR, 0, ",", ".") ?></td>
                        <td align="right">Rp.<?= number_format($p->KEMBALIAN, 0, ",", ".") ?></td>
                    </tr>
                <?php
                    $jumlah += $p->BAYAR - $p->KEMBALIAN;
                endforeach; ?>
                <tr>
                    <td colspan="6" align="right"><b>Jumlah : </b></td>
                    <td align="right"><b>Rp.<?= number_format($jumlah, 0, ",", "."); ?></b></td>
                </tr>
            </tbody>
        </table>

        <div class="ttd">
            <p>Jember, <?= date('d F, Y') ?><br>Administrator</p>
            <br>
            <br>
            <p>______________________</p>
        </div>
    </section>
</body>

</html>