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
$routes->setDefaultController('Login');
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
/**
 * route code for each roles
 * / => student
 * a => admin
 * f => faculty
 */

$routes->post('login', 'Login::auth');
$routes->get('logout', 'Logout::index');

// STUDENT ROUTE GROUP
$routes->group('/', function($routes){
    $routes->get('dashboard', 'UI_Student::index');

    $routes->group('enrollment', function($routes){
        $routes->get('/', 'UI_Student::enrollment');
        $routes->post('verify', 'Student_Enrollment::update');
    });

    $routes->group('attendance', function($routes){
        $routes->post('timein', 'Student_Attendance::timein');
        $routes->post('timeout', 'Student_Attendance::timeout');
    });

    $routes->get('schedule', 'UI_Student::schedule');
    $routes->get('overview', 'UI_Student::overview');
});

// ADMIN ROUTE GROUP
$routes->group('a', function($routes){
    $routes->get('dashboard', 'UI_Admin::index');

    $routes->group('programs', function($routes){
        $routes->get('/', 'UI_Admin::programs');
        $routes->post('create', 'Admin_Program::create');
        $routes->post('update', 'Admin_Program::update');
        $routes->post('delete', 'Admin_Program::delete');
    });

    $routes->group('courses', function($routes){
        $routes->get('/', 'UI_Admin::courses');
        $routes->post('create', 'Admin_Course::create');
        $routes->post('update', 'Admin_Course::update');
        $routes->post('delete', 'Admin_Course::delete');
    });

    $routes->group('class', function($routes){
        $routes->get('/', 'UI_Admin::class');
        $routes->post('create', 'Admin_Class::create');
        $routes->post('update', 'Admin_Class::update');
        $routes->post('delete', 'Admin_Class::delete');
    });

    $routes->group('faculty', function($routes){
        $routes->get('/', 'UI_Admin::faculty');
        $routes->post('create', 'Admin_Faculty::create');
        $routes->post('update', 'Admin_Faculty::update');
        $routes->post('delete', 'Admin_Faculty::delete');
    });

    $routes->group('students', function($routes){
        $routes->get('/', 'UI_Admin::students');
        $routes->post('create', 'Admin_Student::create');
        $routes->post('update', 'Admin_Student::update');
        $routes->post('delete', 'Admin_Student::delete');
        $routes->post('generate_enrolment_code', 'Admin_Student::generateCode');
    });

    $routes->group('schedules', function($routes){
        $routes->get('/', 'UI_Admin::schedules');
        $routes->post('create', 'Admin_Schedule::create');
        $routes->post('update', 'Admin_Schedule::update');
        $routes->post('delete', 'Admin_Schedule::delete');
    });

    $routes->get('report', 'UI_Admin::report');

    $routes->group('users', function($routes){
        $routes->get('/', 'UI_Admin::users');
        $routes->post('create', 'Admin_Users::create');
        $routes->post('update', 'Admin_Users::update');
        $routes->post('delete', 'Admin_Users::delete');
    });

});

// FACULTY ROUTE GROUP
$routes->group('f', function($routes){
    $routes->get('dashboard', 'UI_Faculty::index');
    $routes->get('class', 'UI_Faculty::class');
    $routes->get('check_attendance', 'UI_Faculty::check_attendance');
    $routes->get('report', 'UI_Faculty::report');
});

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
