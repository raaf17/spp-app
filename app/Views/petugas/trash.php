<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Trash &mdash; SPPCERIA</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <div class="section-header-back">
      <a href="<?= site_url('petugas'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Petugas Trash</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
      <div class="breadcrumb-item">Petugas</div>
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
        <h4>Data Petugas - Trash</h4>
        <div class="card-header-action">
          <a href="<?= site_url('petugas/restore'); ?>" class="btn btn-info">Restore All</a>
          <form action="<?= site_url('petugas/delete2/'); ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin mau hapus data?')">
            <?= csrf_field(); ?>
            <button href="submit" class="btn btn-danger btn-sm">Delete</button>
          </form>
        </div>
      </div>
      <div class="card body table-responsive">
        <table class="table table-striped table-md">
          <tbody>
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Email</th>
              <th>Nama Petugas</th>
              <th>Level</th>
              <th>Action</th>
            </tr>
            <?php foreach ($petugas_data as $key => $value) : ?>
              <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $value->username; ?></td>
                <td><?= $value->email; ?></td>
                <td><?= $value->nama_petugas; ?></td>
                <td><?= $value->level; ?></td>
                <td class="text-center" style="width: 15%;">
                  <a href="<?= site_url('petugas/restore/' . $value->id_user); ?>" class="btn btn-info btn-sm">Restore</a>
                  <form action="<?= site_url('petugas/delete2/' . $value->id_user); ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin mau hapus data?')">
                    <?= csrf_field(); ?>
                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                    <button href="submit" class="btn btn-danger btn-sm">Delete</button>
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
<?= $this->endSection() ?>