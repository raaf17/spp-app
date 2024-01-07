<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <?php if ($this->session->userdata('level') == 'Admin') : ?>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Petugas</h4>
                                </div>
                                <div class="card-body">
                                    <?= $jumlahPetugas ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-newspaper"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Siswa</h4>
                                </div>
                                <div class="card-body">
                                    <?= $jumlahSiswa ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fas fa-money-bill-1-wave"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Transaksi</h4>
                                </div>
                                <div class="card-body">
                                    <?= $jumlahTransaksi ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fas fa-money-bill-1-wave"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Uang Tahun Ini</h4>
                                </div>
                                <div class="card-body">
                                    2.000.000
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h5 class="card-title">Aktivitas Log</h5>
                            </div>
                            <div class="card-body table-responsive">
                                <?php if (empty($log)) : ?>
                                    <span>Tidak ada aktivitas.</span>
                                <?php else : ?>
                                    <table class="table table-striped table-md" id="table1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Petugas</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($log as $row) : ?>
                                                <tr>
                                                    <td><i class="fas fa-fire"></i></td>
                                                    <td><?php $zone = 3600;
                                                        $date = gmdate("l, d M Y H:i", strtotime($row->log_time) + $zone);
                                                        echo "$date"; ?></td>
                                                    <td><?= $row->log_user ?></td>
                                                    <td><?= $row->log_aksi ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                </div>
            <?php elseif ($this->session->userdata('level') == 'Petugas') : ?>
                <div class="row">

                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 text-center">

                        <!-- /.card -->
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            <?php else : ?>
                <div class="card card-primary mb-5">
                    <div class="card-header">
                        <h3 class="card-title text-bold">Biodata Siswa</h3>
                    </div>
                    <!-- /.card-header -->
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
                                        <?= $siswa['NISN'] ?>
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
                                        <?= $siswa['NIS'] ?>
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
                                        <?= $siswa['NAMA'] ?>
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
                                        <?= $siswa['nama_kelas'] ?>
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
                                        <?= $siswa['jurusan'] ?>
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
                                        <?= $siswa['TAHUN'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
</div>
</section>
</div>