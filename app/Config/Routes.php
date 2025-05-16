<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->resource('mahasiswa', ['controller' => 'MahasiswaController']);

$routes->resource('staff', ['controller' => 'StaffController']);

$routes->resource('prodi', ['controller' => 'ProdiController']);

$routes->resource('jurusan', ['controller' => 'JurusanController']);  

$routes->resource('pengajuan', ['controller' => 'PengajuanController']);