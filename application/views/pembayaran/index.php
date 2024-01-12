<!-- Main content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaksi Pembayaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Transaksi</a></div>
                <div class="breadcrumb-item">Transaksi Pembayaran</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body mt-4">
                            <form action="<?= base_url('pembayaran/transaksispp') ?>" method="get">
                                <div class="row">
                                    <div class="col mb-2" style="margin-top: -15px;">
                                        <input type="text" class="form-control" id="search" name="search" placeholder="Cari NISN siswa contoh : 002079910">
                                    </div>
                                    <div class="col-md-auto" style="margin-top: -14px;">
                                        <button type="submit" class="btn button-cari btn-success">Cari</button>
                                    </div>
                                </div>
                                <?= form_error('NISN', '<small class="text-danger ml-2">', '</small>'); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>js/jquery.js"></script>
    <script src="<?= base_url('assets/js/Mysweetalert.js') ?>"></script>

<script src="<?= base_url('assets/') ?>js/config.js"></script>


<script type="text/javascript">

</script>