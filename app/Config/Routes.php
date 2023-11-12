<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('create-db', function() {
  $forge = \Config\Database::forge();
  if ($forge->createDatabase('spp_app')) {
      echo 'Database created!';
  }
});
$routes->addRedirect('/', 'home');
$routes->get('home', 'Home::index');

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

$routes->get('spp/trash', 'Spp::trash');
$routes->get('spp/restore/(:any)', 'Spp::restore/$1');
$routes->get('spp/restore', 'Spp::restore');
// $routes->delete('spp/delete2/(:any)', 'Spp::delete/$1');
// $routes->delete('spp/delete2/', 'Spp::delete2');
$routes->post('spp/delete2/(:num)', 'Spp::delete2/$1');
$routes->post('spp/delete2', 'Spp::delete2');

$routes->presenter('spp');