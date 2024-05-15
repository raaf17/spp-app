<!-- Main content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Laporan</a></div>
                <div class="breadcrumb-item">Laporan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-outline card-primary">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="table table-primary">
                                    <tr>
                                        <th>Data Laporan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Laporan Data Petugas</td>
                                        <td>
                                            <a href="<?= site_url('user/cetakPetugas') ?>" target="_blank" class="btn btn-default"><i class="fas fa-download"></i> Cetak Laporan</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Laporan Data Siswa</td>
                                        <td>
                                            <a href="<?= site_url('user/cetakSiswa') ?>" target="_blank" class="btn btn-default"><i class="fas fa-download"></i> Cetak Laporan</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Laporan Data Transaksi Pembayaran</td>
                                        <td>
                                            <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#filter">
                                                <i class="fas fa-filter"></i> Filter Tanggal Transaksi
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="filter">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter Tanggal Transaksi Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('user/cetakTransaksi') ?>" target="_blank" method="post">
                    <div class="modal-body p-4">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="tgl1">Dari Tanggal</label>
                                <input class="form-control" type="date" name="tgl1" id="tgl1" value="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tgl2">Sampai Tanggal</label>
                                <input class="form-control" type="date" name="tgl2" id="tgl2" value="<?= date('Y-m-d') ?>">
                            </div>

                            <span class="text-muted">Note : format tanggal pada kolom mm/dd/yy</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-download"></i> Cetak Laporan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>