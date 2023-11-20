<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('create-db', function () {
  $forge = \Config\Database::forge();
  if ($forge->createDatabase('spp_app')) {
    echo 'Database created!';
  }
});

// $routes->get('login', 'Auth::login');
// $routes->post('auth/loginProcess', 'Auth::loginProcess');
// $routes->get('auth/logout', 'Auth::logout');

$routes->addRedirect('/', 'home');
$routes->get('home', 'Home::index');
$routes->get('setting', 'Setting::index');
$routes->get('laporan', 'Laporan::index');

// Jurusan
$routes->get('jurusan/trash', 'Jurusan::trash');
$routes->get('jurusan/restore/(:any)', 'Jurusan::restore/$1');
$routes->get('jurusan/restore', 'Jurusan::restore');
$routes->post('jurusan/delete2/(:num)', 'Jurusan::delete2/$1');
$routes->post('jurusan/delete2', 'Jurusan::delete2');

$routes->get('jurusan/export', 'Jurusan::export');
$routes->post('jurusan/import', 'Jurusan::import');

$routes->presenter('jurusan');

// Kelas
$routes->get('kelas/export', 'Kelas::export');
$routes->post('kelas/import', 'Kelas::import');

$routes->presenter('kelas');

// Siswa
$routes->get('siswa/export', 'Siswa::export');
$routes->post('siswa/import', 'Siswa::import');

$routes->presenter('siswa');

// Petugas
$routes->get('petugas/trash', 'Petugas::trash');
$routes->get('petugas/restore/(:any)', 'Petugas::restore/$1');
$routes->get('petugas/restore', 'Petugas::restore');
$routes->post('petugas/delete2/(:num)', 'Petugas::delete2/$1');
$routes->post('petugas/delete2', 'Petugas::delete2');

$routes->get('petugas/export', 'Petugas::export');
$routes->post('petugas/import', 'Petugas::import');

$routes->presenter('petugas');

// Tahun Ajaran
$routes->get('tahunajaran/trash', 'TahunAjaran::trash');
$routes->get('tahunajaran/restore/(:any)', 'TahunAjaran::restore/$1');
$routes->get('tahunajaran/restore', 'TahunAjaran::restore');
$routes->post('tahunajaran/delete2/(:num)', 'TahunAjaran::delete2/$1');
$routes->post('tahunajaran/delete2', 'TahunAjaran::delete2');

$routes->get('tahunajaran/export', 'TahunAjaran::export');
$routes->post('tahunajaran/import', 'TahunAjaran::import');

$routes->presenter('tahunajaran');

// Tagihan
$routes->get('tagihan/trash', 'Tagihan::trash');
$routes->get('tagihan/restore/(:any)', 'Tagihan::restore/$1');
$routes->get('tagihan/restore', 'Tagihan::restore');
$routes->post('tagihan/delete2/(:num)', 'Tagihan::delete2/$1');
$routes->post('tagihan/delete2', 'Tagihan::delete2');

$routes->get('tagihan/export', 'Tagihan::export');
$routes->post('tagihan/import', 'Tagihan::import');

$routes->presenter('tagihan');

// Pembayaran
$routes->post('pembayaran/pembayaran', 'Pembayaran::pembayaran');
$routes->presenter('pembayaran');

// Pengeluaran
$routes->presenter('pengeluaran');
