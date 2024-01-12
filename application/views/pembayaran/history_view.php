<div class="card card-primary">
    <?php if (!empty($pembayaran)) : ?>
        <div class="card-header">
            <h5 class="card-title text-bold">Tagihan Bayar</h5>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table class="table table-striped table-md" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pembayaran Bulan</th>
                        <th>Tanggal Bayar</th>
                        <th>Harga Spp</th>
                        <th class="text-center">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pembayaran as $pem) : ?>
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
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="card-body text-center">
            <p class="mt-3"><b><h5 class="text-danger">Siswa ini belum membayar SPP sama sekali.</h5></b></p>
        </div>
    <?php endif; ?>
</div>