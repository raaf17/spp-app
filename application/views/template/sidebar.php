<!-- Main Menu -->
<li class="menu-header">Main Menu</li>
<li>
<li class=" has-treeview">
    <a href="<?= base_url('user') ?>" class="nav-link">
        <i class="nav-icon fas fa-home"></i> <span>Dashboard</span>
    </a>
</li>

<!-- Data Master -->
<?php if ($this->session->userdata('level') ==  'Admin') : ?>
    <li class="menu-header">Master</li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown">
            <i class="nav-icon fas fa-copy"></i> <span>Master Data</span>
        </a>
        <ul class="dropdown-menu">
            <li class="nav-item">
                <a href="<?= site_url('masterdata/jurusan') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>Data Jurusan</a>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('masterdata/kelas') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>Data Kelas</a>
            </li>
            <li>
                <a href="<?= site_url('masterdata/siswa') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>Data Siswa</a>
            </li>
            <li class="nav-item">
                <a href="<?= site_url('masterdata/spp') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>Data SPP</a>
            </li>
            <li>
                <a href="<?= site_url('masterdata/petugas') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>Data Petugas</a>
            </li>
        </ul>
    </li>

    <!-- Transaksi -->
    <li class="menu-header">Transaksi</li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown">
            <i class="nav-icon fas fa-copy"></i> <span>Pembayaran</span>
        </a>
        <ul class="dropdown-menu">
            <li class="nav-item">
                <a href="<?= site_url('pembayaran') ?>" class="nav-link">
                    <i class="nav-icon far fa-money-bill-alt"></i> Bulanan</a>
            </li>
    </li>
    </ul>
    </li>
    <li>
        <a href="<?= base_url('pembayaran/history') ?>" class="nav-link">
            <i class="nav-icon fas fa-history"></i> <span>Histori Pembayaran</span>
        </a>
    </li>

    <!-- Laporan -->
    <li class="menu-header">Laporan</li>
    <li>
        <a href="<?= base_url('user/laporan') ?>" class="nav-link">
            <i class="nav-icon fas fa-download"></i> <span>Generate Laporan</span>
        </a>
    </li>
<?php elseif ($this->session->userdata('level') == 'Petugas') : ?>
    <li class="menu-header">Transaksi</li>
    <li>
        <a href="<?= base_url('pembayaran') ?>" class="nav-link">
            <i class="nav-icon far fa-money-bill-alt"></i> Transaksi Pembayaran</a>
    </li>
    <li>
        <a href="<?= base_url('pembayaran/history') ?>" class="nav-link">
            <i class="nav-icon fas fa-history"></i>
            History Pembayaran
        </a>
    </li>
<?php else : ?>
    <li class="menu-header">Transaksi</li>
    <li>
        <a href="<?= base_url('pembayaran/history') ?>" class="nav-link">
            <i class="nav-icon fas fa-history"></i> History Pembayaran</a>
    </li>
<?php endif ?>
<li>
    <a href="<?= base_url('auth/logout') ?>" class="nav-link logout" data-toggle="tooltip">
        <i class="fas fa-sign-out-alt nav-icon"></i> Logout</a>
</li>

<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="<?= site_url('documentation'); ?>" class="btn btn-primary btn-sm btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Documentation
    </a>
</div>
</aside>
</div>