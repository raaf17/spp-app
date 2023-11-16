<!-- Main Menu -->
<li class="menu-header">Main Menu</li>
<li>
  <a class="nav-link" href="<?= site_url('/home'); ?>">
    <i class="fa-solid fa-gauge"></i> <span>Dashboard</span>
  </a>
</li>

<!-- Data Master -->
<li class="menu-header">Data Master</li>
<li class="nav-item dropdown">
  <a href="#" class="nav-link has-dropdown"><i class="far fa-address-book">
    </i><span>Data Pembayar</span>
  </a>
  <ul class="dropdown-menu">
    <li>
      <a class="nav-link" href="<?= site_url('jurusan'); ?>">Data Jurusan</a>
    </li>
    <li>
      <a class="nav-link" href="<?= site_url('kelas'); ?>">Data Kelas</a>
    </li>
    <li>
      <a class="nav-link" href="<?= site_url('siswa'); ?>">Data Siswa</a>
    </li>
  </ul>
</li>
<li>
  <a class="nav-link" href="<?= site_url('tahunajaran'); ?>">
    <i class="fa-solid fa-flag"></i> <span>Tahun Ajaran</span>
  </a>
</li>
<li>
  <a class="nav-link" href="<?= site_url('tagihan'); ?>">
    <i class="fa-solid fa-scale-balanced"></i> <span>Tagihan</span>
  </a>
</li>
<li>
  <a class="nav-link" href="<?= site_url('rekap'); ?>">
    <i class="far fa-calendar"></i> <span>Rekap Laporan</span>
  </a>
</li>

<!-- Keuangan -->
<li class="menu-header">Keuangan</li>
<li>
  <a class="nav-link" href="<?= site_url('pembayaran'); ?>">
    <i class="fa-solid fa-money-bill-1-wave"></i> <span>Pembayaran</span>
  </a>
</li>
<li>
  <a class="nav-link" href="<?= site_url('pengeluaran'); ?>">
    <i class="fa-solid fa-money-bill-1-wave"></i> <span>Pengeluaran</span>
  </a>
</li>

<!-- Ekstra -->
<li class="menu-header">Ekstra</li>
<li>
  <a class="nav-link" href="<?= site_url('petugas'); ?>">
    <i class="fa-solid fa-database"></i> <span>Data Petugas</span>
  </a>
</li>
<li>
  <a class="nav-link" href="<?= site_url('laporan'); ?>">
    <i class="fa-solid fa-book"></i> <span>Laporan</span>
  </a>
</li>
<li>
  <a class="nav-link" href="<?= site_url('setting'); ?>">
    <i class="fa-solid fa-gears"></i> <span>Pengaturan</span>
  </a>
</li>

<!-- Log -->
<li class="menu-header">Log</li>
<li>
  <a class="nav-link" href="<?= site_url('log_activity'); ?>">
    <i class="fa-solid fa-chart-simple"></i> <span>Log Activity</span>
  </a>
</li>