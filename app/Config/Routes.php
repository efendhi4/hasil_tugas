<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Produk::index');
$routes->get('/produk/(:num)', 'Produk::detail/$1');

