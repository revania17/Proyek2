<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



// get : mengambil atau meminta data atau menampilkan halaman
// post : mengirim atau memodifikasi data
// $routes->[METHOD]('[URL YANG DIAKSES (bebas namanya)]', '[CONTROLLER]::[METHOD DI CONTROLLER]');

$routes->get('/', 'Produk::index');
$routes->get('/home', 'Produk::index');

$routes->get('login', 'Login::index');
$routes->post('login/auth', 'Login::auth');
$routes->get('/admin', 'admin::index');
$routes->get('logout', 'Login::logout');
$routes->get('register', 'Register::index');
$routes->post('register/save', 'Register::save');

$routes->get('produk/cari', 'Produk::cari');
$routes->get('xl', 'Produk::XL');
$routes->get('axis', 'Produk::Axis');
$routes->get('indosat', 'Produk::Indosat');
$routes->get('smartfren', 'Produk::Smartfren');
$routes->get('tri', 'Produk::Tri');
$routes->get('telkomsel', 'Produk::Telkomsel');
$routes->get('form', 'FormPesanan::form');
$routes->post('pesan', 'FormPesanan::datapesanan');
$routes->get('pesanan', 'FormPesanan::tampilantabel');

$routes->get('produk', 'Produk::index');            
$routes->get('produk/tambah', 'Produk::tambah');   
$routes->post('produk/add', 'Produk::add');     
$routes->get('produk/edit/(:num)', 'Produk::tampilanedit/$1'); 
$routes->post('produk/update/(:num)', 'Produk::update/$1'); 
$routes->get('produk/delete/(:num)', 'Produk::delete/$1');  

$routes->get('update/(:num)', 'FormPesanan::update/$1');
$routes->get('delete/(:num)', 'FormPesanan::delete/$1');

$routes->get('laporan', 'FormPesanan::laporan');
$routes->get('export/pdf', 'DownloadLaporan::exportPDF');
$routes->get('export/excel', 'DownloadLaporan::exportExcel');

$routes->get('dashboard', 'Dashboard::index');