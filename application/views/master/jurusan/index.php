<!-- Alert -->
<div class="jurusan" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
<div class="error_jurusan" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>

<!-- Main content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Jurusan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item">Data Jurusan</div>
            </div>
        </div>

        <div class="alert alert-warning alert-dismissible show fade" style="margin-top: -15px;">
            <button class="close" data-dismiss="alert">x</button>
            <b>Jika anda menghapus data jurusan maka data kelas yang memiliki kompetensi keahlian yang sama akan terhapus.</b>
        </div>

        <div class="section-body">
            <div class="card card-primary mt-3 mb-3">
                <div class="card-body col-lg-6">
                    <form method="post" action="<?= base_url('masterdata/jurusan') ?>">
                        <div class="form-group d">
                            <label for="jurusan">Kompetensi Keahlian</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan">
                            <?= form_error('jurusan', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-import-jurusan">Import <i class="fas fa-file-import"></i></button>
                    </form>
                </div>
            </div>

            <div class="card card-primary mt-3 mb-3">
                <div class="card-body table-responsive">
                    <table class="table table-striped table-md" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
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
                                                                        echo "$date"; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Edit Jurusan -->
    <?php foreach ($jurusan as $p) : ?>
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="modalEdit<?= $p->ID_JURUSAN ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Jurusan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?= base_url('masterdata/jurusan_edit') ?>">
                        <input type="hidden" name="id_jurusan" value="<?= $p->ID_JURUSAN ?>">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="jurusan">Kompetensi Keahlian</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $p->JURUSAN ?>">
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

    <!-- Modal Import Jurusan -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-import-jurusan">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('masterdata/import_jurusan'); ?>" method="post" enctype="multipart/form-data">
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
            url: '<?php echo site_url('masterdata/list_jurusan') ?>',
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