<?= $this->extend('layout/dashboard') ?>

<?= $this->section('title') ?>
<title>Data Siswa &mdash; SPPKITA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Siswa</h1>
    <div class="section-header-button">
      <a href="<?= site_url('siswa/new'); ?>" class="btn btn-primary">Add New</a>
    </div>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
      <div class="breadcrumb-item">Siswa</div>
    </div>
  </div>

  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert body">
        <button class="close" data-dismiss="alert">x</button>
        <b>Success !</b>
        <?= session()->getFlashdata('success'); ?>
      </div>
    </div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert body">
        <button class="close" data-dismiss="alert">x</button>
        <b>Error !</b>
        <?= session()->getFlashdata('error'); ?>
      </div>
    </div>
  <?php endif; ?>

  <div class="section-body">

    <div class="card">

      <div class="card-header">
        <h4>Data Siswa</h4>
        <div class="card-header-action mr-1">
          <a href="<?= site_url('siswa/export'); ?>" class="btn btn-primary"><i class="fa-solid fa-file-export"></i> Export File</a>
          <div class="dropdown">
            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"></i><i class="fa-solid fa-download"></i> Import File</a>
            <div class="dropdown-menu">
              <a href="<?= base_url('siswa_example_file.xlsx'); ?>" class="dropdown-item has-icon"><i class="fa-solid fa-download"></i> Download Example</a>
              <a href="#" class="dropdown-item has-icon" data-toggle="modal" data-target="#modal-import-siswa"><i class="fa-solid fa-upload"></i> Upload File</a>
            </div>
          </div>
        </div>
        <div class="card-header-action">
          <a href="<?= site_url('siswa/trash'); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Trash</a>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped table-md" id="table1">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Siswa</th>
              <th>NIS</th>
              <th>NISN</th>
              <th>Kelas</th>
              <th>Jenis Kelamin</th>
              </th>
              <th>No. Telepon</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($siswa_data as $key => $value) : ?>
              <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $value->nama_siswa; ?></td>
                <td><?= $value->nis; ?></td>
                <td><?= $value->nisn; ?></td>
                <td><?= $value->nama_kelas; ?></td>
                <td><?= $value->jenis_kelamin; ?></td>
                <td><?= $value->no_telp; ?></td>
                <td class="text-center" style="width: 15%;">
                  <a href="<?= site_url('siswa/edit/' . $value->id_siswa); ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                  <form action="<?= site_url('siswa/delete/' . $value->id_siswa); ?>" method="post" class="d-inline" id="del-<?= $value->id_siswa; ?>">
                    <?= csrf_field(); ?>
                    <button href="submit" class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda Yakin?" data-confirm-yes="submitDel(<?= $value->id_siswa; ?>)"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-import-siswa">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Import Jurusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('contacts/import'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <label for="">File Excel</label>
          <div class="custom-file">
            <?= csrf_field(); ?>
            <input type="file" name="file_excel" class="form-file-input" id="file_excel" required>
            <label for="file_excel" name="file_excel" class="custom-file-label">Pilih File</label>
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
<?= $this->endSection() ?>