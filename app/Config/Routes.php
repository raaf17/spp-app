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

$routes->get('jurusan/trash', 'Jurusan::trash');
$routes->get('jurusan/restore/(:any)', 'Jurusan::restore/$1');
$routes->get('jurusan/restore', 'Jurusan::restore');
// $routes->delete('jurusan/delete2/(:any)', 'Jurusan::delete/$1');
// $routes->delete('jurusan/delete2/', 'Jurusan::delete2');
$routes->post('jurusan/delete2/(:num)', 'Jurusan::delete2/$1');
$routes->post('jurusan/delete2', 'Jurusan::delete2');

$routes->presenter('jurusan');
$routes->presenter('kelas');
$routes->presenter('siswa');
$routes->presenter('petugas');

$routes->get('tahunajaran/trash', 'TahunAjaran::trash');
$routes->get('tahunajaran/restore/(:any)', 'TahunAjaran::restore/$1');
$routes->get('tahunajaran/restore', 'TahunAjaran::restore');
// $routes->delete('tahunajaran/delete2/(:any)', 'TahunAjaran::delete/$1');
// $routes->delete('tahunajaran/delete2/', 'TahunAjaran::delete2');
$routes->post('tahunajaran/delete2/(:num)', 'TahunAjaran::delete2/$1');
$routes->post('tahunajaran/delete2', 'TahunAjaran::delete2');

$routes->presenter('tahunajaran');

$routes->get('tagihan/trash', 'Tagihan::trash');
$routes->get('tagihan/restore/(:any)', 'Tagihan::restore/$1');
$routes->get('tagihan/restore', 'Tagihan::restore');
// $routes->delete('tagihan/delete2/(:any)', 'Tagihan::delete/$1');
// $routes->delete('tagihan/delete2/', 'Tagihan::delete2');
$routes->post('tagihan/delete2/(:num)', 'Tagihan::delete2/$1');
$routes->post('tagihan/delete2', 'Tagihan::delete2');

$routes->presenter('tagihan');

$routes->get('spp/trash', 'Spp::trash');
$routes->get('spp/restore/(:any)', 'Spp::restore/$1');
$routes->get('spp/restore', 'Spp::restore');
// $routes->delete('spp/delete2/(:any)', 'Spp::delete/$1');
// $routes->delete('spp/delete2/', 'Spp::delete2');
$routes->post('spp/delete2/(:num)', 'Spp::delete2/$1');
$routes->post('spp/delete2', 'Spp::delete2');

$routes->presenter('spp');