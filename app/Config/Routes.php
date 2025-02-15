<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Home::register');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/instansi', 'Instansi::index');
$routes->get('/keuangan', 'Keuangan::index');
$routes->get('/keuangan/(:num)', 'Keuangan::index/$1');
$routes->get('/pasien', 'Pasien::index');
$routes->get('/pasien/(:num)', 'Pasien::index/$1');
$routes->get('/instansi/update', 'Instansi::index');
$routes->get('/paket/delete/(:num)', 'Paket::delete/$1');
$routes->get('/kunjungan/(:num)', 'Kunjungan::index/$1');
$routes->get('/tambah-pasien', 'Kunjungan::viewAddPasienByAdmin');


$routes->post('/profile', 'Profile::update');
$routes->post('/daftar', 'Pasien::add');
$routes->post('/instansi/update', 'Instansi::update');
$routes->post('/paket/add', 'Paket::add');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
