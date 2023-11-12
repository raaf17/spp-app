<li class="menu-header">Main Menu</li>
<li><a class="nav-link" href="<?= site_url('/home'); ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
<li class="menu-header">Data</li>
<li><a class="nav-link" href="<?= site_url('spp'); ?>"><i class="far fa-calendar"></i> <span>Data SPP</span></a></li>
<li class="nav-item dropdown">
  <a href="#" class="nav-link has-dropdown"><i class="far fa-address-book"></i><span>Data Pengguna</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link" href="<?= site_url('jurusan'); ?>">Data Jurusan</a></li>
    <li><a class="nav-link" href="<?= site_url('kelas'); ?>">Data Kelas</a></li>
    <li><a class="nav-link" href="<?= site_url('siswa'); ?>">Data Siswa</a></li>
    <li><a class="nav-link" href="<?= site_url('petugas'); ?>">Data Petugas</a></li>
  </ul>
</li>
<li class="menu-header">Fitur</li>
<li class="nav-item dropdown">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-envelope"></i> <span>Administrasi</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link" href="">Transaksi Pembayaran</a></li>
    <li><a class="nav-link" href="">Laporan Pembayaran</a></li>
  </ul>
</li>
<li class="menu-header">Other</li>
<li><a class="nav-link" href="<?= site_url('/home'); ?>"><i class="fa-solid fa-gears"></i> <span>Pengaturan</span></a></li>