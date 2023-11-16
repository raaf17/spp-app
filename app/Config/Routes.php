<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('create-db', function() {
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

// Jurusan
$routes->get('jurusan/trash', 'Jurusan::trash');
$routes->get('jurusan/restore/(:any)', 'Jurusan::restore/$1');
$routes->get('jurusan/restore', 'Jurusan::restore');
$routes->post('jurusan/delete2/(:num)', 'Jurusan::delete2/$1');
$routes->post('jurusan/delete2', 'Jurusan::delete2');

$routes->presenter('jurusan');

// Kelas
$routes->presenter('kelas');

// Siswa
$routes->presenter('siswa');

// Petugas
$routes->get('petugas/trash', 'Petugas::trash');
$routes->get('petugas/restore/(:any)', 'Petugas::restore/$1');
$routes->get('petugas/restore', 'Petugas::restore');
$routes->post('petugas/delete2/(:num)', 'Petugas::delete2/$1');
$routes->post('petugas/delete2', 'Petugas::delete2');

$routes->presenter('petugas');

// Tahun Ajaran
$routes->get('tahunajaran/trash', 'TahunAjaran::trash');
$routes->get('tahunajaran/restore/(:any)', 'TahunAjaran::restore/$1');
$routes->get('tahunajaran/restore', 'TahunAjaran::restore');
$routes->post('tahunajaran/delete2/(:num)', 'TahunAjaran::delete2/$1');
$routes->post('tahunajaran/delete2', 'TahunAjaran::delete2');

$routes->presenter('tahunajaran');

// Tagihan
$routes->get('tagihan/trash', 'Tagihan::trash');
$routes->get('tagihan/restore/(:any)', 'Tagihan::restore/$1');
$routes->get('tagihan/restore', 'Tagihan::restore');
$routes->post('tagihan/delete2/(:num)', 'Tagihan::delete2/$1');
$routes->post('tagihan/delete2', 'Tagihan::delete2');

$routes->presenter('tagihan');

// SPP
$routes->get('spp/trash', 'Spp::trash');
$routes->get('spp/restore/(:any)', 'Spp::restore/$1');
$routes->get('spp/restore', 'Spp::restore');
$routes->post('spp/delete2/(:num)', 'Spp::delete2/$1');
$routes->post('spp/delete2', 'Spp::delete2');

$routes->presenter('spp');

// Pembayaran
$routes->presenter('pembayaran');

// Pengeluaran
$routes->presenter('pengeluaran');