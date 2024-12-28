<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Routes untuk Autentikasi
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::register');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

// Routes untuk Pendaftaran Mata Kuliah
$routes->get('/courses', 'CourseController::index'); // Daftar mata kuliah
$routes->get('/courses/register/(:num)', 'CourseController::register/$1'); // Mendaftar mata kuliah
$routes->get('/courses/unregister/(:num)', 'CourseController::unregister/$1'); // Membatalkan mata kuliah

// Routes untuk Status Akademik
$routes->get('/status', 'StudentStatusController::index'); // Status akademik mahasiswa

// Routes untuk Helpdesk
$routes->get('/helpdesk', 'HelpdeskController::index'); // Daftar tiket
$routes->get('/helpdesk/create', 'HelpdeskController::create'); // Form tiket baru
$routes->post('/helpdesk/create', 'HelpdeskController::store'); // Simpan tiket
$routes->get('/helpdesk/view/(:num)', 'HelpdeskController::view/$1'); // Lihat detail tiket
