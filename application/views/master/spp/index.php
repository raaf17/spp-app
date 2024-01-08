<div class="spp" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
<div class="error_spp" data-flashdata="<?= $this->session->flashdata('gagal') ?>"></div>
<!-- Main content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data SPP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item">Data SPP</div>
            </div>
        </div>

        <div class="alert alert-warning alert-dismissible show fade" style="margin-top: -15px;">
            <button class="close" data-dismiss="alert">x</button>
            <b>Jika anda menghapus data spp maka data siswa yang memiliki tahun ajaran yang sama akan terhapus.</b>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data SPP</h4>
                    <div class="card-header-action">
                        <a href="<?= site_url('masterdata/add_spp') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-md" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tahun Ajaran</th>
                                <th>Nominal</th>
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
</div>

<!-- Modal -->
<?php foreach ($spp as $p) : ?>
    <div class="modal fade" id="modalEdit<?= $p->ID_SPP ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data spp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('masterdata/spp_edit') ?>">
                    <input type="hidden" name="id_spp" value="<?= $p->ID_SPP ?>">

                    <div class="modal-body">
                        <label for="tahun">Tahun Ajaran</label>
                        <div class="form-group d-flex">
                            <select class="form-control col-lg-3 " id="tahun_awal" name="tahun_awal">
                                <option value="<?= $p->TAHUN ?>"><?= $p->TAHUN ?></option>
                                <option>2017/2018</option>
                                <option>2018/2019</option>
                                <option>2019/2020</option>
                            </select>
                        </div>
                        <?= form_error('tahun_awal', '<small class="text-danger ml-2">', '</small>'); ?>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" value="<?= $p->NOMINAL ?>">
                            <?= form_error('nominal', '<small class="text-danger ml-2">', '</small>'); ?>
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

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>js/jquery.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Data table -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables-responsive/js/dataTables.responsive.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="<?= base_url('assets/js/Mysweetalert.js') ?>"></script>

<script type="text/javascript">
    show_data();

    function show_data() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('masterdata/list_spp') ?>',
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