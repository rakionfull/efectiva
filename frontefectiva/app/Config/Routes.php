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
// rutas login

$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::index');
$routes->get('/inicio', 'Main::inicio');
$routes->get('/cambio_clave', 'Main::cambio_clave');
$routes->post('/updateClave', 'Main::updateClave');
$routes->post('/logout', 'Auth::logout');
$routes->get('/change_pass', 'Auth::change_pass');
$routes->post('/updatePass', 'Auth::updatePass');
$routes->get('auth/getNewCaptcha', 'Auth::getNewCaptcha');
$routes->post('auth/validaCaptcha', 'Auth::validaCaptcha');

// rutas panel principal


$routes->get('/listUsers', 'Main::listUsers');
$routes->get('main/getUsers', 'Main::getUsers');
$routes->get('/createUser', 'Main::createUser');
$routes->get('/modifyUser/(:num)', 'Main::modifyUser/$1');
$routes->get('/deleteUser/(:num)', 'Main::deleteUser/$1');
$routes->get('/configPass', 'Main::configPass');
$routes->post('/main/addConfigPass', 'Main::addConfigPass');
$routes->post('/main/addUser', 'Main::addUser');
$routes->post('/updateUser/(:num)', 'Main::updateUser/$1');
$routes->get('perfiles', 'Main::perfiles');
$routes->get('main/getPerfiles/(:num)', 'Main::getPerfiles/$1');
$routes->get('main/getDetPerfil/(:num)', 'Main::getDetPerfil/$1');
$routes->post('/main/addPerfil', 'Main::addPerfil');
$routes->post('/main/updatePerfil', 'Main::updatePerfil');
$routes->post('/main/updateView', 'Main::updateView');
$routes->post('/main/updateCreate', 'Main::updateCreate');
$routes->post('/main/updateUpdate', 'Main::updateUpdate');
$routes->post('/main/updateDelete', 'Main::updateDelete');


// rutas para paremetrizacion
$routes->get('/activos', 'Main::activos');
$routes->get('/controles', 'Main::controles');
$routes->get('main/getEmpresas', 'Main::getEmpresas');
$routes->get('main/getEmpresasByActivo', 'Main::getEmpresasByActivo');
$routes->post('/main/addEmpresa', 'Main::addEmpresa');
$routes->post('/main/updateEmpresa', 'Main::updateEmpresa');

//rutas para areas
$routes->get('main/getAreas', 'Main::getAreas');
$routes->post('/main/addArea', 'Main::addArea');
$routes->post('/main/updateArea', 'Main::updateArea');
$routes->get('main/getAreasEmpresa', 'Main::getAreasEmpresa');
$routes->post('/main/addAreaEmpresa', 'Main::addAreaEmpresa');
$routes->post('/main/updateAreaEmpresa', 'Main::updateAreaEmpresa');


$routes->get('main/getValorActivo', 'Main::getValorActivo');
$routes->post('/main/addValorActivo', 'Main::addValorActivo');
$routes->post('/main/updateValorActivo', 'Main::updateValorActivo');

$routes->get('main/getTipoActivo', 'Main::getTipoActivo');
$routes->post('/main/addTipoActivo', 'Main::addTipoActivo');
$routes->post('/main/updateTipoActivo', 'Main::updateTipoActivo');

$routes->get('main/getClasInformacion', 'Main::getClasInformacion');
$routes->post('/main/addClasInformacion', 'Main::addClasInformacion');
$routes->post('/main/updateClasInformacion', 'Main::updateClasInformacion');

// Rutas para tipo de riesgos
$routes->get('/riesgos', 'Main::riesgos');
$routes->get('/main/showTipoRiesgo/(:num)','TipoRiesgoController::showTipoRiesgo/$1');
$routes->get('/main/getTipoRiesgos', 'TipoRiesgoController::getTipoRiesgos');
$routes->post('/main/addTipoRiesgo', 'TipoRiesgoController::addTipoRiesgo');
$routes->post('/main/updateTipoRiesgo', 'TipoRiesgoController::updateTipoRiesgo');
$routes->delete('/main/deleteTipoRiesgo/(:num)', 'TipoRiesgoController::deleteTipoRiesgo/$1');

// Rutas para probabilidad de riesgos
$routes->get('/main/getProbabilidadRiesgo/(:num)','ProbabilidadRiesgoController::getProbabilidadRiesgo/$1');
$routes->get('/main/showProbabilidadRiesgo/(:num)','ProbabilidadRiesgoController::showProbabilidadRiesgo/$1');
$routes->post('/main/addProbabilidadRiesgo1','ProbabilidadRiesgoController::addProbabilidadRiesgo1');
$routes->post('/main/updateProbabilidadRiesgo1','ProbabilidadRiesgoController::updateProbabilidadRiesgo1');
$routes->post('/main/addProbabilidadRiesgo2','ProbabilidadRiesgoController::addProbabilidadRiesgo2');
$routes->post('/main/updateProbabilidadRiesgo2','ProbabilidadRiesgoController::updateProbabilidadRiesgo2');
$routes->delete('/main/deleteProbabilidadRiesgo/(:num)', 'ProbabilidadRiesgoController::deleteProbabilidadRiesgo/$1');

// Rutas para impacto de riesgos
$routes->get('/main/getImpactoRiesgo/(:num)','ImpactoRiesgoController::getImpactoRiesgo/$1');
$routes->get('/main/showImpactoRiesgo/(:num)','ImpactoRiesgoController::showImpactoRiesgo/$1');
$routes->post('/main/addImpactoRiesgo1','ImpactoRiesgoController::addImpactoRiesgo1');
$routes->post('/main/updateImpactoRiesgo1','ImpactoRiesgoController::updateImpactoRiesgo1');
$routes->post('/main/addImpactoRiesgo2','ImpactoRiesgoController::addImpactoRiesgo2');
$routes->post('/main/updateImpactoRiesgo2','ImpactoRiesgoController::updateImpactoRiesgo2');
$routes->delete('/main/deleteImpactoRiesgo/(:num)', 'ImpactoRiesgoController::deleteImpactoRiesgo/$1');

// Rutas para nivel de riesgos
$routes->get('/main/getNivelRiesgo','NivelRiesgoController::getNivelRiesgo');
$routes->get('/main/showNivelRiesgo/(:num)','NivelRiesgoController::showNivelRiesgo/$1');
$routes->post('/main/addNivelRiesgo','NivelRiesgoController::addNivelRiesgo');
$routes->post('/main/updateNivelRiesgo/(:num)','NivelRiesgoController::updateNivelRiesgo/$1');
$routes->delete('/main/deleteNivelRiesgo/(:num)', 'NivelRiesgoController::deleteNivelRiesgo/$1');

// Rutas para tipo de amenaza
$routes->get('/main/getTiposAmenaza','TipoAmenazaController::getTiposAmenaza');
$routes->get('/main/showTipoAmenaza/(:num)','TipoAmenazaController::showTipoAmenaza/$1');
$routes->post('/main/addTipoAmenaza','TipoAmenazaController::addTipoAmenaza');
$routes->post('/main/updateTipoAmenaza/(:num)','TipoAmenazaController::updateTipoAmenaza/$1');
$routes->delete('/main/deleteTipoAmenaza/(:num)', 'TipoAmenazaController::deleteTipoAmenaza/$1');

// Rutas para desc de amenaza
$routes->get('/main/getDescAmenaza','DescripcionAmenazaController::getDescAmenaza');
$routes->get('/main/showDescAmenaza/(:num)','DescripcionAmenazaController::showDescAmenaza/$1');
$routes->post('/main/addDescAmenaza','DescripcionAmenazaController::addDescAmenaza');
$routes->post('/main/updateDescAmenaza/(:num)','DescripcionAmenazaController::updateDescAmenaza/$1');
$routes->delete('/main/deleteDescAmenaza/(:num)', 'DescripcionAmenazaController::deleteDescAmenaza/$1');

// Rutas para categoria vulnerabilidad
$routes->get('/main/getCategoriasVulnerabilidad','CategoriasVulnerabilidadController::getCategoriasVulnerabilidad');
$routes->get('/main/showCategoriasVulnerabilidad/(:num)','CategoriasVulnerabilidadController::showCategoriasVulnerabilidad/$1');
$routes->post('/main/addCategoriasVulnerabilidad','CategoriasVulnerabilidadController::addCategoriasVulnerabilidad');
$routes->post('/main/updateCategoriasVulnerabilidad/(:num)','CategoriasVulnerabilidadController::updateCategoriasVulnerabilidad/$1');
$routes->delete('/main/deleteCategoriasVulnerabilidad/(:num)', 'CategoriasVulnerabilidadController::deleteCategoriasVulnerabilidad/$1');

// Rutas para desc vulnerabilidad
$routes->get('/main/getDescVulnerabilidad','DescriptionVulnerabilidadController::getDescVulnerabilidad');
$routes->get('/main/showDescVulnerabilidad/(:num)','DescriptionVulnerabilidadController::showDescVulnerabilidad/$1');
$routes->post('/main/addDescVulnerabilidad','DescriptionVulnerabilidadController::addDescVulnerabilidad');
$routes->post('/main/updateDescVulnerabilidad/(:num)','DescriptionVulnerabilidadController::updateDescVulnerabilidad/$1');
$routes->delete('/main/deleteDescVulnerabilidad/(:num)', 'DescriptionVulnerabilidadController::deleteDescVulnerabilidad/$1');



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
