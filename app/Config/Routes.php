<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Authentication routes
$routes->get('/login', 'Auth::loginView');
$routes->post('/login', 'Auth::login');
$routes->get('/signup', 'Auth::signupView');
$routes->post('/signup', 'Auth::signup');
$routes->get('/logout', 'Auth::logout');

// Routes untuk Mahasiswa
$routes->group('mahasiswa', function ($routes) {
    $routes->post('ip-generator', 'Pendaftaran\IPController::generate');
    $routes->get('grafik-ip/(:num)', 'Mahasiswa\ProfilController::getGrafikIP/$1');
    $routes->get('profil/(:num)', 'Mahasiswa\ProfilController::index/$1');
    $routes->get('mata-kuliah', 'Mahasiswa\PendaftaranController::index');
    $routes->post('mata-kuliah/pilih', 'Mahasiswa\PendaftaranController::pilih');
    $routes->post('mata-kuliah/batal', 'Mahasiswa\PendaftaranController::batal');
    $routes->get('jadwal-kuliah/(:num)', 'Mahasiswa\JadwalController::jadwalKuliah/$1');
});

// Routes untuk Teacher
$routes->group('teacher', function ($routes) {
    $routes->get('input-nilai', 'Teacher\TeacherController::inputNilai');
    $routes->post('simpan-nilai', 'Teacher\TeacherController::simpanNilai');
});

// Routes untuk Admin
$routes->group('admin', function ($routes) {
    $routes->get('courses', 'Admin\EditCourseController::index'); // View list of courses
    $routes->post('courses', 'Admin\EditCourseController::create'); // Add a course
    $routes->delete('courses/(:num)', 'Admin\EditCourseController::delete/$1'); // Delete a course
    $routes->get('input-mahasiswa', 'AdminController::inputMahasiswaView');
    $routes->get('input-dosen', 'AdminController::inputDosenView');
    $routes->post('simpan-mahasiswa', 'AdminController::simpanMahasiswa');
    $routes->post('simpan-dosen', 'AdminController::simpanDosen');
    $routes->get('hapus-mahasiswa/(:num)', 'AdminController::hapusMahasiswa/$1');
    $routes->get('hapus-dosen/(:num)', 'AdminController::hapusDosen/$1');    
});

$routes->get('/dashboard/mahasiswa', 'Dashboard::mahasiswa');
$routes->get('/dashboard/admin', 'Dashboard::admin');
$routes->get('/dashboard/teacher', 'Dashboard::teacher');