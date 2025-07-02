<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/search/(:any)/(:any)', 'Home::search/$1/$2');
$routes->get('/loadAll', 'Home::loadAll');
$routes->get('/modify', 'Home::modify');
$routes->get('/edit/(:any)/(:any)/(:any)', 'Home::edit/$1/$2/$3');
$routes->get('/admin', 'Home::admin');
$routes->post('/admin/update', 'Home::admin_update');
$routes->get('/login', 'Authentication::index', ['as' => 'login']);
$routes->post('/loginAuth', 'Authentication::loginAuth');
$routes->get('/logout', 'Authentication::logout');
