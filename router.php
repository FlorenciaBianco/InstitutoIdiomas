<?php
require_once 'app/controllers/profesor.controller.php';
require_once 'app/controllers/idioma.controller.php';
require_once 'app/controllers/error.controller.php';
// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = ''; /
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

switch ($params[0]) {
    case 'profesores':
        $controller = new profesorController();
        $controller->showProfesores();
        break;
    case 'profesor':
        $controller = new profesorController();
        $controller->showProfesorById();
        break;
    case 'idiomas':
        $controller = new idiomaController();
        $controller->showIdiomas($params[1]);
        break;
    case 'profesorByIdioma':
        $controller = new profesorByIdiomaController();
        $controller->showProfesorById($params[1]);
        break;
    default: 
        $controller = new handleErrorController();
        $controller = showError();
        break;
}