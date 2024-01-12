<!-- Main content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kelas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item">Data Kelas</div>
                <div class="breadcrumb-item">Tambah Data Kelas</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tambah Data Kelas</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('masterdata/add_kelas') ?>">
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas">
                            <?= form_error('nama_kelas', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Kompetensi Keahlian</label>
                            <select class="form-control" id="jurusan" name="jurusan">
                                <option value="">-- Pilih Kompetensi Keahlian --</option>
                                <?php foreach ($jurusan as $j) : ?>
                                    <option value="<?= $j->ID_JURUSAN ?>"><?= $j->JURUSAN ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('jurusan', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></button>
                        <a href="<?= base_url('masterdata/kelas') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
</div>
</section>
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>js/jquery.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="<?= base_url('assets/js/Mysweetalert.js') ?>"></script>

<script>
    show_data();

    function show_data() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('masterdata/list_siswa') ?>',
            async: true,
            dataType: 'html',
            success: function(data) {
                $('#show_data').html(data);
                $('#dataTable').DataTable();
            }
        });
    }
</script>