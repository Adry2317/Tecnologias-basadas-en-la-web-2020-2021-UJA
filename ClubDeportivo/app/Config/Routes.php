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
$routes->setDefaultController('pages');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
$routes->get('/pages/logPrincipal/', 'Pages::logPrincipal', ['filter' => 'tbwlogin']);
$routes->get('/pages/logContacto/', 'Pages::logContacto', ['filter' => 'tbwlogin']);
$routes->get('/pages/logInstalaciones/', 'Pages::logInstalaciones', ['filter' => 'tbwlogin']);
$routes->get('/ProfileController/viewProfile/', 'ProfileController::viewProfile', ['filter' => 'tbwlogin']);
$routes->get('/ProfileController/viewProfileConfig/', 'ProfileController::viewProfileConfig', ['filter' => 'tbwlogin']);
$routes->get('/ProfileController/updateProfile/', 'ProfileController::updateProfile', ['filter' => 'tbwlogin']);
$routes->get("/pages/logAdminPrincipal", "Pages::logAdminPrincipal", ["filter" => "tbwloginadmin"]);
$routes->get("/pages/logAdminContacto", "Pages::logAdminContacto", ["filter" => "tbwloginadmin"]);
$routes->get('/pages/logAdminActividades/', 'Pages::logAdminActividades', ['filter' => 'tbwloginadmin']);
$routes->get("/Gestiones/insertarMaterial", "Gestiones::insertarMaterial", ["filter" => "tbwloginadmin"]);
$routes->get("/Gestiones/borrarMaterial", "Gestiones::borrarMaterial", ["filter" => "tbwloginadmin"]);
$routes->get("/Gestiones/borrarPista", "Gestiones::borrarPista", ["filter" => "tbwloginadmin"]);
$routes->get("/Gestiones/modificarMaterial", "Gestiones::modificarMaterial", ["filter" => "tbwloginadmin"]);
$routes->get("/Gestiones/modificarPista", "Gestiones::modificarPista", ["filter" => "tbwloginadmin"]);
$routes->get("/Gestiones/modificar", "Gestiones::modificar", ["filter" => "tbwloginadmin"]);
$routes->get("/Gestiones/insertarPista", "Gestiones::insertarPista", ["filter" => "tbwloginadmin"]);
$routes->get('/Gestiones/vistaGestionUsuarios/', 'Gestiones::vistaGestionUsuarios', ['filter' => 'tbwlogin']);
$routes->get('/Gestiones/eliminarActReservada/', 'Gestiones::eliminarActReservada', ['filter' => 'tbwlogin']);
$routes->get('/Gestiones/eliminarMatReservado/', 'Gestiones::eliminarMatReservado', ['filter' => 'tbwlogin']);
$routes->get('/Gestiones/vistaMaterialActividad/', 'Gestiones::vistaMaterialActividad', ['filter' => 'tbwlogin']);
$routes->get('/Gestiones/ApuntarseActividad/', 'Gestiones::ApuntarseActividad', ['filter' => 'tbwlogin']);
$routes->get('/Gestiones/reservaMaterialPista/', 'Gestiones::reservaMaterialPista', ['filter' => 'tbwlogin']);
$routes->get('/Logout/cerrarSesion/', 'Logout::cerrarSesion', ['filter' => 'tbwlogin']);
$routes->get('/Logout/cerrarSesion/', 'Logout::cerrarSesion', ['filter' => 'tbwloginadmin']);
$routes->get('/UsuariosAdmin/logAdminUsuarios/', 'UsuariosAdmin::logAdminUsuarios', ['filter' => 'tbwloginadmin']);
$routes->get('/UsuariosAdmin/eliminar/', 'UsuariosAdmin::eliminar', ['filter' => 'tbwloginadmin']);
$routes->get('/Actividades/logAdminActividades/', 'Actividades::logAdminActividades', ['filter' => 'tbwloginadmin']);
$routes->get('/Actividades/datos/', 'Actividades::datos', ['filter' => 'tbwloginadmin']);
$routes->get('/Actividades/insertar/', 'Actividades::datos', ['filter' => 'tbwloginadmin']);
$routes->get('/Actividades/borrar/', 'Actividades::datos', ['filter' => 'tbwloginadmin']);
$routes->get('/Actividades/modificar/', 'Actividades::modificar', ['filter' => 'tbwloginadmin']);
$routes->get('/pages/logInstalaciones/', 'pages::logInstalaciones', ['filter' => 'tbwloginadmin']);
$routes->get('/pages/logInstalaciones/', 'pages::logInstalaciones', ['filter' => 'tbwlogin']);
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'pages::index');

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
