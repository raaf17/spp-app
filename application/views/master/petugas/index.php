<!-- Alert -->
<div class="petugas" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
<div class="error" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>

<!-- Main content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Petugas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item">Data Petugas</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Siswa</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url('masterdata/add_petugas') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-md" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Nama Petugas</th>
                                <th>Aksi</th>
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
                    <section class="col-lg-7 connectedSortable">

                    </section>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Edit Petugas -->
<?php foreach ($petugas as $p) : ?>
    <div class="modal fade" id="modalEdit<?= $p->ID_PETUGAS ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('masterdata/petugas_edit') ?>">
                    <input type="hidden" name="id_petugas" value="<?= $p->ID_PETUGAS ?>">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $p->USERNAME ?>">
                            <?= form_error('username', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Petugas</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $p->NAMA_PETUGAS ?>">
                            <?= form_error('nama', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <a href="#" class="btn btn-warning text-white" data-toggle="modal" data-dismiss="modal" data-target="#modalPassword<?= $p->ID_PETUGAS ?>"><i class="fas fa-key"></i> Ubah Kata Sandi?</a>
                        <button type="submit" class="btn btn-primary">Edit <i class="fas fa-pencil-alt"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?php foreach ($petugas as $p) : ?>
    <div class="modal fade" id="modalPassword<?= $p->ID_PETUGAS ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Kata Sandi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('masterdata/petugas_pass') ?>">
                    <input type="hidden" name="id_petugas" value="<?= $p->ID_PETUGAS ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" class="form-control" id="password1" name="password1">
                            <small class="text-secondary">Password harus 8 digit.</small>
                            <?= form_error('password1', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class=" form-group">
                            <label for="password2">Ulangi Password</label>
                            <input type="password" class="form-control" id="password2" name="password2">
                            <?= form_error('password2', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <a href="#" class="btn btn-warning text-white" data-toggle="modal" data-dismiss="modal" data-target="#modalEdit<?= $p->ID_PETUGAS ?>"><i class="fas fa-arrow-left"></i> Kembali?</a>
                        <button type="submit" class="btn btn-primary">Edit <i class="fas fa-pencil-alt"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<script src="<?= base_url('assets/') ?>js/jquery.js"></script>
<script type="text/javascript">
    show_data();

    function show_data() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('masterdata/list_petugas') ?>',
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