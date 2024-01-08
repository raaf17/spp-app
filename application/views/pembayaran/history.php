<!-- Main content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Histori Pembayaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Transaksi</a></div>
                <div class="breadcrumb-item">Histori Pembayaran</div>
            </div>
        </div>

        <div class="section-body">
            <?php if ($this->session->userdata('level') == "Admin" || $this->session->userdata('level') == "Petugas") : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body mt-4">
                                <div class="row">
                                    <div class="col mb-2" style="margin-top: -15px;">
                                        <!-- <label for="NISN" class="mt-2 mr-3">NISN :</label> -->
                                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Cari NISN siswa contoh : 0020179059">
                                    </div>
                                    <div class="col-md-auto" style="margin-top: -14px;">
                                        <button type="button" id="btn-search" class="btn btn-success">Cari</button>
                                    </div>
                                    <?= form_error('NISN', '<small class="text-danger ml-2">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div id="view">
                            <?php $this->load->view('pembayaran/history_view', ['pembayaran' => $history]); ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title text-bold">History Pembayaran</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive">
                                    <table class="table table-striped table-md" id="table1">
                                        <thead class="bg-secondary">
                                            <tr>
                                                <td>#</td>
                                                <td>Pembayaran Bulan</td>
                                                <td>Tanggal Bayar</td>
                                                <td>Harga Spp</td>
                                                <td class="text-center">Keterangan</td>
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
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>js/jquery.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>plugins/datatables/jquery.dataTables.min.js"></script>

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
    function search() {

        $.ajax({
            url: '<?= base_url('pembayaran/search_history') ?>', // File Tujuan nya
            type: 'POST', //Tentukan Tipe nya POST
            data: {
                keyword: $("#keyword").val()
            }, //set data keyword yang akan dikirim
            dataType: "json",
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function(result) {
                $('#btn-search').html("Cari").removeAttr("disabled");
                $('#view').html(result.Hasil);
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                alert(xhr.responseText); // munculkan alert
            }
        });

    };

    $('#view').html('');


    $('#btn-search').click(function() {
        $search = $('#keyword').val();
        if ($search != '') {
            $('#btn-search').html("Mencari...").attr("disabled", "disabled");
            search();
        } else {
            $('#view').html(`<div class="card">
                                    <div class="card-body text-center">
                                        <h3 class="text-danger">Isi kolom pencarian.</h3>
                                    </div>
                                </div>`);
        }
    });

    $('#keyword').on('keyup', function(e) {
        if (e.keyCode === 13) {
            $search = $(this).val();
            if ($search != '') {
                $('#btn-search').html("Mencari...").attr("disabled", "disabled");
                search();
            } else {
                $('#view').html(`<div class="card">
                                    <div class="card-body text-center">
                                        <h3 class="text-danger">Isi kolom pencarian.</h3>
                                    </div>
                                </div>`);
            }
        }
    });
</script>