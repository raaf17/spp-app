<!-- Main content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item">Data Siswa</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tambah Data Siswa</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('masterdata/add_siswa') ?>">
                        <div class="form-group">
                            <label for="NISN">NISN</label>
                            <input type="text" class="form-control" id="NISN" name="NISN">
                            <span class="text-secondary ml-2">NISN harus 10 digit.</span> <br>
                            <?= form_error('NISN', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="NIS">NIS</label>
                            <input type="text" class="form-control" id="NIS" name="NIS">
                            <span class="text-secondary ml-2">NIS harus 8 digit.</span> <br>
                            <?= form_error('NIS', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <?= form_error('nama', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select class="form-control" id="kelas_id" name="kelas_id">
                                <option value="">-- Pilih Kelas --</option>
                                <?php foreach ($kelas as $row) : ?>
                                    <option value="<?= $row->ID_KELAS ?>"><?= $row->NAMA_KELAS ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('kelas_id', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="spp">Tahun Ajaran</label>
                            <select class="form-control" id="spp_id" name="spp_id">
                                <option value="">-- Pilih Tahun ajaran --</option>
                                <?php foreach ($spp as $row) : ?>
                                    <option value="<?= $row->ID_SPP ?>"><?= $row->TAHUN ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('spp_id', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                            <?= form_error('alamat', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No.Telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp">
                            <span class="text-secondary ml-2">Nomor Telepon maksimal 13 digit.</span> <br>
                            <?= form_error('no_telp', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <div class="form-group" id="tempo">
                            <label for="tempo">Jatuh Tempo</label>
                            <input type="date" class="form-control" id="tempo" name="tempo" value="<?= date('Y-m-d', strtotime("2017-07-20")) ?>">
                            <span class="text-secondary ml-2">Jatuh tempo digunakan untuk pembayaran spp siswa dari satu semester sesuai tahun pelajaran dengan format mm/dd/yy.</span> <br>
                            <?= form_error('tempo', '<small class="text-danger ml-2">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></button>
                        <a href="<?= base_url('masterdata/siswa') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>js/jquery.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/adminlte/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
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
    $(document).ready(function() {

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
    });
</script>