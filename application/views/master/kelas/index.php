<!-- Alert -->
<div class="kelas" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
<div class="error_kelas" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>

<!-- Main content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kelas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item">Data Kelas</div>
            </div>
        </div>

        <div class="alert alert-warning alert-dismissible show fade" style="margin-top: -15px;">
            <button class="close" data-dismiss="alert">x</button>
            <b>Jika anda menghapus data kelas maka data siswa yang memiliki kelas yang sama akan terhapus.</b>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Kelas</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url('masterdata/add_kelas') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-import-kelas"><i class="fas fa-file-import"></i> Import Data</a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-md" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kelas</th>
                                <th>Kompetensi Keahlian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        </tbody>
                    </table>
                </div>
                <div class="card-footer small text-muted">Updated at <?php $zone = 3600 * +7;
                                                                        $date = gmdate("l, d F Y H:i a", time() + $zone);
                                                                        echo "$date"; ?> </div>
            </div>
        </div>
    </section>

    <!-- Modal Edit Kelas -->
    <?php foreach ($kelas as $p) : ?>
        <div class="modal fade" id="modalEdit<?= $p->ID_KELAS ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?= base_url('masterdata/kelas_edit') ?>">
                        <input type="hidden" name="id_kelas" value="<?= $p->ID_KELAS ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_kelas">Nama Kelas</label>
                                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $p->NAMA_KELAS ?>">
                                <?= form_error('nama_kelas', '<small class="text-danger ml-2">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Kompetensi Keahlian</label>
                                <select class="form-control" id="jurusan" name="jurusan">
                                    <option value="<?= $p->ID_JURUSAN ?>"><?= $p->jurusan ?></option>
                                    <?php foreach ($jurusan as $k) : ?>
                                        <option value="<?= $k->ID_JURUSAN ?>"><?= $k->JURUSAN ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('jurusan', '<small class="text-danger ml-2">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal-import-kelas">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('masterdata/import_kelas'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label for="">File Excel</label>
                        <div class="custom-file">
                            <input type="file" name="file" class="form-file-input" id="file" required>
                            <label for="file" name="file" class="custom-file-label">Pilih File</label>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/') ?>js/jquery.js"></script>
<script src="<?= base_url('assets/') ?>js/Mysweetalert.js"></script>
<script type="text/javascript">
    show_data();

    function show_data() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('masterdata/list_kelas') ?>',
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