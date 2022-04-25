<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->post('/login/auth', 'Login::auth');
$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');

// Home
$routes->get('/', 'Home::index');
$routes->get('/home',  'Home::index');

//Dashboard
$routes->get('/', 'Dashboard::index');
$routes->get('/dashboard',  'Dashboard::index');

//Tanaman
$routes->get('/', 'Tanaman::index');
$routes->get('/tanaman',  'Tanaman::index');

//Pengelola
$routes->get('/', 'Pengelola::index');
$routes->get('/pengelola',  'Pengelola::index');

//Perawatan
$routes->get('/', 'Perawatan::index');
$routes->get('/perawatan',  'Perawatan::index');

//Laporan
$routes->get('/', 'Laporan::index');
$routes->get('/laporan',  'Laporan::index');

// Lokasi
$routes->get('/', 'Lokasi::index');
$routes->get('/lokasi', 'Lokasi::index');
$routes->get('/lokasi/lokasi', 'Lokasi::lokasi');
$routes->get('/lokasi/sublokasi', 'Lokasi::sublokasi');

// Klasifikasi
$routes->get('/', 'Klasifikasi::index');
$routes->get('/klasifikasi', 'Klasifikasi::index');
$routes->get('/klasifikasi/genus', 'Klasifikasi::genus');
$routes->get('/klasifikasi/spesies', 'Klasifikasi::spesies');
$routes->get('/klasifikasi/famili', 'Klasifikasi::famili');

//Learning
$routes->get('/', 'Learn::index');
$routes->get('/Learn',  'Learn::index');
$routes->get('Learn/detail/(:any)', 'Learn::detail');


/*
 * -----------------------------------s---------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}