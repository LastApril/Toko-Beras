<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('/penjualan','Penjualan::index', ['filter' => 'auth']);
$routes->get('/penjualan/cetak', 'Penjualan::cetak', ['filter' => 'auth']);
$routes->add('/penjualan/add', 'Penjualan::add', ['filter' => 'auth']);
$routes->add('/penjualan/(:segment)/edit', 'Penjualan::edit/$1', ['filter' => 'auth']);
$routes->get('/penjualan/(:segment)/delete', 'Penjualan::delete/$1', ['filter' => 'auth']);
$routes->get('/pemasokan','Pemasokan::index', ['filter' => 'auth']);
$routes->add('/pemasokan/cetak', 'Pemasokan::cetak', ['filter' => 'auth']);
$routes->add('/pemasokan/add', 'Pemasokan::add', ['filter' => 'auth']);
$routes->add('/pemasokan/(:segment)/edit', 'Pemasokan::edit/$1', ['filter' => 'auth']);
$routes->get('/pemasokan/(:segment)/delete', 'Pemasokan::delete/$1', ['filter' => 'auth']);
$routes->get('/barang','Barang::index', ['filter' => 'auth']);
$routes->add('/barang/add', 'Barang::add', ['filter' => 'auth']);
$routes->add('/barang/(:segment)/edit', 'Barang::edit/$1', ['filter' => 'auth']);
$routes->get('/barang/(:segment)/delete', 'Barang::delete/$1', ['filter' => 'auth']);
$routes->get('/users','Users::index', ['filter' => 'auth']);
$routes->add('/users/add', 'Users::add', ['filter' => 'auth']);
$routes->add('/users/(:segment)/edit','Users::edit/$1', ['filter' => 'auth']);
$routes->get('/users/(:segment)/delete','Users::delete/$1', ['filter' => 'auth']);
$routes->get('/login','Login::index');

/*
 * --------------------------------------------------------------------
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
