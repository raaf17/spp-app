<!-- Main content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Petugas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item">Data Petugas</div>
                <div class="breadcrumb-item">Tambah Data Petugas</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tambah Data Petugas</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('masterdata/add_petugas') ?>">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                            <?= form_error('username', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password1" name="password1">
                            <?= form_error('password1', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Ulangi Password</label>
                            <input type="password" class="form-control" id="password2" name="password2">
                            <?= form_error('password2', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Petugas</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <?= form_error('nama', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></button>
                        <a href="<?= base_url('masterdata/petugas') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>

            <div class="row">
                <section class="col-lg-7 connectedSortable">

                </section>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url('assets/') ?>js/jquery.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
    show_data();

    function show_data() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('masterdata/list_petugas') ?>',
            async: true,
            dataType: 'html',
            success: function(data) {
                $('#show_data').html(data);
                $('#dataTable').DataTable();
            }
        });
    }
</script>