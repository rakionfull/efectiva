<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// http://localhost:8080/login
$routes->post('/login', 'Login::index');
// http://localhost:8080/captcha
$routes->get('/newcaptcha', 'Login::newCaptcha');
// http://localhost:8080/captcha
$routes->post('/validaCaptcha', 'Login::validaCaptcha');
// http://localhost:8080/register
$routes->post('/register', 'Register::register', ['filter' => 'authFilter']);


// http://localhost:8080/api/
$routes->group('/api',['namespace' => 'App\Controllers'], function ($routes) {
    $routes->post('logout/(:num)', 'Login::logout/$1',['filter' => 'authFilter']);
    
    $routes->post('change_pass', 'Login::change_pass',['filter' => 'authFilter']);
    $routes->get('dashboard', 'Home::dashboard',['filter' => 'authFilter']);
    $routes->get('getConfigPass', 'Home::getConfigPass',['filter' => 'authFilter']);
    $routes->post('addConfigPass', 'Home::addConfigPass',['filter' => 'authFilter']);
    $routes->post('addUser', 'Home::addUser',['filter' => 'authFilter']);
    $routes->put('updateUser/(:num)', 'Home::updateUser/$1', ['filter' => 'authFilter']);
    $routes->delete('deleteUser/(:num)', 'Home::deleteUser/$1', ['filter' => 'authFilter']);
    $routes->get('getUsers', 'Home::getUsers',['filter' => 'authFilter']);
    $routes->get('getUser/(:num)', 'Home::getUser/$1',['filter' => 'authFilter']);
    $routes->get('getPerfiles/(:num)', 'Home::getPerfiles/$1',['filter' => 'authFilter']);
    $routes->post('addPerfil', 'Home::addPerfil',['filter' => 'authFilter']);
    $routes->post('updatePerfil', 'Home::updatePerfil',['filter' => 'authFilter']);
    $routes->get('getDetPerfil/(:num)', 'Home::getDetPerfil/$1',['filter' => 'authFilter']);
   
    $routes->post('updateView', 'Home::updateView',['filter' => 'authFilter']);
    $routes->post('updateCreate', 'Home::updateCreate',['filter' => 'authFilter']);
    $routes->post('updateUpdate', 'Home::updateUpdate',['filter' => 'authFilter']);
    $routes->post('updateDelete', 'Home::updateDelete',['filter' => 'authFilter']);
    //crud de empresa
    $routes->get('getEmpresas', 'Home::getEmpresas',['filter' => 'authFilter']);
    $routes->get('getEmpresasByActivo', 'Home::getEmpresasByActivo',['filter' => 'authFilter']);
    $routes->post('addEmpresa', 'Home::addEmpresa',['filter' => 'authFilter']);
    $routes->post('updateEmpresa', 'Home::updateEmpresa',['filter' => 'authFilter']);
  //crud de area
  $routes->get('getAreas', 'Home::getAreas',['filter' => 'authFilter']);
  $routes->post('addArea', 'Home::addArea',['filter' => 'authFilter']);
  $routes->post('updateArea', 'Home::updateArea',['filter' => 'authFilter']);

  $routes->get('getAreasEmpresa', 'Home::getAreasEmpresa',['filter' => 'authFilter']);
  $routes->post('addAreaEmpresa', 'Home::addAreaEmpresa',['filter' => 'authFilter']);
  $routes->post('updateAreaEmpresa', 'Home::updateAreaEmpresa',['filter' => 'authFilter']);


    //CRUD Valor Activo
    $routes->get('getValorActivo', 'Home::getValorActivo',['filter' => 'authFilter']);
    $routes->post('addValorActivo', 'Home::addValorActivo',['filter' => 'authFilter']);
    $routes->post('updateValorActivo', 'Home::updateValorActivo',['filter' => 'authFilter']);

    //CRUD Tipo Activo
    $routes->get('getTipoActivo', 'Home::getTipoActivo',['filter' => 'authFilter']);
    $routes->post('addTipoActivo', 'Home::addTipoActivo',['filter' => 'authFilter']);
    $routes->post('updateTipoActivo', 'Home::updateTipoActivo',['filter' => 'authFilter']);

    //CRUD Clasificacion de informacion
    $routes->get('getClasInformacion', 'Home::getClasInformacion',['filter' => 'authFilter']);
    $routes->post('addClasInformacion', 'Home::addClasInformacion',['filter' => 'authFilter']);
    $routes->post('updateClasInformacion', 'Home::updateClasInformacion',['filter' => 'authFilter']);

    // CRUD TIPO RIESGOS
    $routes->get('getTipoRiesgos', 'TipoRiesgosController::index',['filter' => 'authFilter']);
    $routes->get('showTipoRiesgo/(:num)','TipoRiesgosController::show/$1',['filter' => 'authFilter']);
    $routes->post('addTipoRiesgo', 'TipoRiesgosController::store',['filter' => 'authFilter']);
    $routes->post('updateTipoRiesgo', 'TipoRiesgosController::update',['filter' => 'authFilter']);
    $routes->delete('deleteTipoRiesgo/(:num)', 'TipoRiesgosController::destroy/$1', ['filter' => 'authFilter']);

    // CRUD PROBABILIDAD RIESGOS
    $routes->get('getProbabilidadRiesgo/(:num)','ProbabilidadRiesgoController::index/$1',['filter' => 'authFilter']);
    $routes->get('showProbabilidadRiesgo/(:num)','ProbabilidadRiesgoController::show/$1',['filter' => 'authFilter']);
    $routes->post('addProbabilidadRiesgo1','ProbabilidadRiesgoController::store_escenario_1',['filter' => 'authFilter']);
    $routes->post('addProbabilidadRiesgo2','ProbabilidadRiesgoController::store_escenario_2',['filter' => 'authFilter']);
    $routes->post('updateProbabilidadRiesgo1','ProbabilidadRiesgoController::edit_escenario_1',['filter' => 'authFilter']);
    $routes->post('updateProbabilidadRiesgo2','ProbabilidadRiesgoController::edit_escenario_2',['filter' => 'authFilter']);
    $routes->delete('deleteProbabilidadRiesgo/(:num)', 'ProbabilidadRiesgoController::destroy/$1', ['filter' => 'authFilter']);

    // CRUD IMPACTO RIESGOS
    $routes->get('getImpactoRiesgo/(:num)','ImpactoRiesgoController::index/$1',['filter' => 'authFilter']);
    $routes->get('showImpactoRiesgo/(:num)','ImpactoRiesgoController::show/$1',['filter' => 'authFilter']);
    $routes->post('addImpactoRiesgo1','ImpactoRiesgoController::store_escenario_1',['filter' => 'authFilter']);
    $routes->post('addImpactoRiesgo2','ImpactoRiesgoController::store_escenario_2',['filter' => 'authFilter']);
    $routes->post('updateImpactoRiesgo1','ImpactoRiesgoController::edit_escenario_1',['filter' => 'authFilter']);
    $routes->post('updateImpactoRiesgo2','ImpactoRiesgoController::edit_escenario_2',['filter' => 'authFilter']);
    $routes->delete('deleteImpactoRiesgo/(:num)', 'ImpactoRiesgoController::destroy/$1', ['filter' => 'authFilter']);

    // CRUD NIVEL RIESGO
    $routes->get('getNivelRiesgo','NivelRiesgoController::index',['filter' => 'authFilter']);
    $routes->get('showNivelRiesgo/(:num)','NivelRiesgoController::show/$1',['filter' => 'authFilter']);
    $routes->post('addNivelRiesgo','NivelRiesgoController::store',['filter' => 'authFilter']);
    $routes->post('updateNivelRiesgo/(:num)','NivelRiesgoController::update/$1',['filter' => 'authFilter']);
    $routes->delete('deleteNivelRiesgo/(:num)', 'NivelRiesgoController::destroy/$1', ['filter' => 'authFilter']);

    // CRUD TIPO DE AMENAZA
    $routes->get('getTiposAmenaza','TipoAmenazaController::index',['filter' => 'authFilter']);
    $routes->get('showTipoAmenaza/(:num)','TipoAmenazaController::show/$1',['filter' => 'authFilter']);
    $routes->post('addTipoAmenaza','TipoAmenazaController::store',['filter' => 'authFilter']);
    $routes->post('updateTipoAmenaza/(:num)','TipoAmenazaController::update/$1',['filter' => 'authFilter']);
    $routes->delete('deleteTipoAmenaza/(:num)', 'TipoAmenazaController::destroy/$1', ['filter' => 'authFilter']);
    
    // CRUD DESC DE AMENAZA
    $routes->get('getDescAmenaza','DescripcionAmenazaController::index',['filter' => 'authFilter']);
    $routes->get('showDescAmenaza/(:num)','DescripcionAmenazaController::show/$1',['filter' => 'authFilter']);
    $routes->post('addDescAmenaza','DescripcionAmenazaController::store',['filter' => 'authFilter']);
    $routes->post('updateDescAmenaza/(:num)','DescripcionAmenazaController::update/$1',['filter' => 'authFilter']);
    $routes->delete('deleteDescAmenaza/(:num)', 'DescripcionAmenazaController::destroy/$1', ['filter' => 'authFilter']);
    
    // CRUD CATEGORIAS VULNERABILIDAD
    $routes->get('getCategoriasVulnerabilidad','CategoriasVulnerabilidadController::index',['filter' => 'authFilter']);
    $routes->get('showCategoriasVulnerabilidad/(:num)','CategoriasVulnerabilidadController::show/$1',['filter' => 'authFilter']);
    $routes->post('addCategoriasVulnerabilidad','CategoriasVulnerabilidadController::store',['filter' => 'authFilter']);
    $routes->post('updateCategoriasVulnerabilidad/(:num)','CategoriasVulnerabilidadController::update/$1',['filter' => 'authFilter']);
    $routes->delete('deleteCategoriasVulnerabilidad/(:num)', 'CategoriasVulnerabilidadController::destroy/$1', ['filter' => 'authFilter']);
    
    // CRUD DESC VULNERABILIDAD
    $routes->get('getDescVulnerabilidad','DescripcionVulnerabilidadController::index',['filter' => 'authFilter']);
    $routes->get('showDescVulnerabilidad/(:num)','DescripcionVulnerabilidadController::show/$1',['filter' => 'authFilter']);
    $routes->post('addDescVulnerabilidad','DescripcionVulnerabilidadController::store',['filter' => 'authFilter']);
    $routes->post('updateDescVulnerabilidad/(:num)','DescripcionVulnerabilidadController::update/$1',['filter' => 'authFilter']);
    $routes->delete('deleteDescVulnerabilidad/(:num)', 'DescripcionVulnerabilidadController::destroy/$1', ['filter' => 'authFilter']);

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}