<div class="transaksi" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
<div class="error_transaksi" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>

<!-- Main content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaksi Pembayaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Transaksi</a></div>
                <div class="breadcrumb-item">Transaksi Pembayaran</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body mt-4">
                            <form action="<?= base_url('pembayaran/transaksispp') ?>" method="get">
                                <div class="row">
                                    <div class="col mb-2" style="margin-top: -15px;">
                                        <input type="text" class="form-control" id="search" name="search" placeholder="Cari NISN siswa contoh : 002079910" value="<?= $this->input->get('search') ?>">
                                    </div>
                                    <div class="col-md-auto" style="margin-top: -14px;">
                                        <button type="submit" class="btn button-cari btn-success">Cari</button>
                                    </div>
                                </div>
                                <?= form_error('NISN', '<small class="text-danger ml-2">', '</small>'); ?>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <?php if ($this->input->get('search') != '') : ?>

                        <div class="card card-primary mb-4">
                            <?php if (!empty($siswa)) : ?>
                                <div class="card-header">
                                    <h5 class="card-title text-bold">Biodata Siswa</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-condensed table-striped">
                                        <tbody>
                                            <tr>
                                                <td width="40%">
                                                    NISN
                                                </td>
                                                <td width="10">
                                                    :
                                                </td>
                                                <td>
                                                    <?= $siswa->NISN ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%">
                                                    NIS
                                                </td>
                                                <td width="10">
                                                    :
                                                </td>
                                                <td>
                                                    <?= $siswa->NIS ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%">
                                                    Nama Lengkap
                                                </td>
                                                <td width="10">
                                                    :
                                                </td>
                                                <td>
                                                    <?= $siswa->NAMA ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%">
                                                    Kelas
                                                </td>
                                                <td width="10">
                                                    :
                                                </td>
                                                <td>
                                                    <?= $siswa->nama_kelas ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%">
                                                    Kompetensi Keahlian
                                                </td>
                                                <td width="10">
                                                    :
                                                </td>
                                                <td>
                                                    <?= $siswa->jurusan ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="40%">
                                                    Tahun Ajaran
                                                </td>
                                                <td width="10">
                                                    :
                                                </td>
                                                <td>
                                                    <?= $siswa->TAHUN ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- /.card-body -->
                            <?php else : ?>
                                <div class="card-body text-center">
                                    <p class="mt-3"><b>
                                            <h5 class="text-danger">NISN tidak ditemukan.</h5>
                                        </b></p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card card-success">
                            <?php if (!empty($tagihan)) : ?>
                                <div class="card-header">
                                    <h5 class="card-title text-bold">Tagihan Bayar</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Pembayaran Bulan</td>
                                                <td>Tanggal Bayar</td>
                                                <td>Harga Spp</td>
                                                <td class="text-center">Keterangan</td>
                                                <td class="text-center">Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($tagihan as $pem) : ?>
                                                <input type="hidden" value="<?= $pem->ID_PEMBAYARAN ?>">

                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $pem->BULAN_DIBAYAR ?></td>
                                                    <td><?= $pem->TGL_BAYAR ?></td>
                                                    <td>Rp.<?= number_format($pem->NOMINAL, 0, ",", ".") ?></td>
                                                    <?php if ($pem->KET == null) : ?>
                                                        <td class="text-center text-danger">---</td>
                                                    <?php else : ?>
                                                        <td class="text-center text-success"><i class="fas fa-check"></i> <?= $pem->KET ?></td>
                                                    <?php endif; ?>
                                                    <td class="text-center">
                                                        <?php if ($pem->KET == 'LUNAS') : ?>
                                                            <a href="<?= site_url('pembayaran/hapus/') . $pem->ID_PEMBAYARAN; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                                            <a href="<?= site_url('user/cetakStruk/') . $pem->ID_PEMBAYARAN; ?>" target="_blank" class="btn btn-default"><i class="fas fa-download"></i> Cetak</a>
                                                        <?php else : ?>
                                                            <a href="<?= site_url('pembayaran/transaksi/') . $pem->ID_PEMBAYARAN; ?>" class="btn btn-primary">Bayar</a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php else : ?>
                        <div class="card">
                            <div class="card-body">
                                <p>NISN tidak ditemukan</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<!-- /.content -->

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>js/jquery.js"></script>
<script src="<?= base_url('assets/js/Mysweetalert.js') ?>"></script>

<script src="<?= base_url('assets/') ?>js/config.js"></script>

<script>
    // SweetAlert untuk transaksi

    const success_transaksi = $('.transaksi').data('flashdata');

    if (success_transaksi) {
        Swal.fire({
            title: success_transaksi,
            // text: 'Sudah ditambahkan',
            type: 'success'
        });
    }

    const error_transaksi = $('.error_transaksi').data('flashdata');

    if (error_transaksi) {
        Swal.fire({
            title: error_transaksi,
            // text: 'Sudah ditambahkan',
            type: 'success'
        });
    }
</script>