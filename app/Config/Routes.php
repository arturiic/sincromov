<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('login', function ($routes) {
    $routes->get('/', 'LoginController::index');
    $routes->post('ingresar', 'LoginController::logueo_ingreso');
    $routes->get('salir', 'LoginController::salir');
});

$routes->group('', ['filter' => 'AuthFilter'], function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('dashboard', 'Home::index');
});

$routes->group('config', ['filter' => 'AuthFilter'], function ($routes) {
    $routes->get('sincromovimi', 'SincroMovimientosController::index');
});