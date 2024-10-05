<?php
require_once 'app/controllers/profesor.controller.php';
require_once 'app/controllers/idioma.controller.php';
require_once 'app/controllers/error.controller.php';
// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = ''; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}
#/entidad/accion/
# router.php?action=/profesores
#   /listar
#   /agregar/id
#   /editar/id/
#   /eliminar/id/

# router.php?action=/idiomas/
#   /listar
#   /agregar/id
#   /editar/id/
#   /eliminar/id/
$params = explode('/', $action);

switch ($params[0]) {
    case 'profesores':
        $controller = new ProfesorController();
        routerAction($controller, $params);
        break;
    case 'idiomas':
        $controller = new IdiomaController();
        routerAction($controller, $params);
        break;
    default: 
        // $controller = new handleErrorController();
        // $controller = showError();
        break;
}


function routerAction($controller, $params){
    switch($params[1]) {
        case "listar":
            $controller->showlist();
            break;
        case "listarPorIdioma":
            $controller->showlist($params[2]);
            break;
        // case "detalle":
        //     $controller->show($params[2]);
        // case "agregar":
        //     $controller->add($params[2]);
        // case "editar":
        //     $controller->update($params[2]);
        // case "eliminar":
        //     $controller->delete($params[2]);
        default:
            break;
    }
}



