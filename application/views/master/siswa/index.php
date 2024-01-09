<!-- Main content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item">Data Siswa</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Siswa</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url('masterdata/add_siswa') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-md" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th style="width: 100px;">Kelas</th>
                                <th>Tahun Ajaran</th>
                                <th>Alamat</th>
                                <th>No. Telp</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        </tbody>
                    </table>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at <?php $zone = 3600 * +7;
                                                                                $date = gmdate("l, d F Y H:i a", time() + $zone);
                                                                                echo "$date"; ?>
                </div>
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">

                    </section>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<?php foreach ($siswa as $s) : ?>
    <div class="modal fade" id="modalEdit<?= $s->NISN ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('masterdata/siswa_edit') ?>">
                    <input type="hidden" name="id" value="<?= $s->NISN ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="NISN">NISN</label>
                            <input type="text" class="form-control" id="NISN" name="NISN" value="<?= $s->NISN ?>">
                            <span class="text-secondary ml-2">NISN harus 10 digit.</span> <br>
                            <?= form_error('NISN', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="NIS">NIS</label>
                            <input type="text" class="form-control" id="NIS" name="NIS" value="<?= $s->NIS ?>">
                            <span class="text-secondary ml-2">NIS harus 8 digit.</span> <br>
                            <?= form_error('NIS', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $s->NAMA ?>">
                            <?= form_error('nama', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select class="form-control" id="kelas_id" name="kelas_id">
                                <option value="<?= $s->ID_KELAS ?>"><?= $s->nama_kelas ?></option>
                                <?php foreach ($kelas as $row) : ?>
                                    <option value="<?= $row->ID_KELAS ?>"><?= $row->NAMA_KELAS ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('kelas_id', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="spp">Tahun Ajaran</label>
                            <select class="form-control" id="spp_id" name="spp_id">
                                <option value="<?= $s->ID_SPP ?>"><?= $s->tahun ?></option>
                                <?php foreach ($spp as $row) : ?>
                                    <option value="<?= $row->ID_SPP ?>"><?= $row->TAHUN ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('spp_id', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $s->ALAMAT ?></textarea>
                            <?= form_error('alamat', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No.Telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $s->NO_TELP ?>">
                            <span class="text-secondary ml-2">Nomor Telepon maksimal 13 digit.</span> <br>
                            <?= form_error('no_telp', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-toggle="modal" data-dismiss="modal">Tutup</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>js/jquery.js"></script>

<script type="text/javascript">
    show_data();

    function show_data() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('masterdata/list_siswa') ?>',
            async: true,
            dataType: 'html',
            success: function(data) {
                $('#show_data').html(data);
                $('#dataTable').DataTable({
                    "ordering": false,
                    'language': {
                        "url": "<?= base_url('assets/indonesia.json') ?>",
                        'sEmptyTable': "Tidak Ada Data"
                    }
                });
            }
        });
    }
</script>

</body>

</html>