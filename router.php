<?php
require_once 'app/controllers/profesor.controller.php';
require_once 'app/controllers/idioma.controller.php';


// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = ''; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'profesores':
        if(isset($params[1])){
            $controller = new ProfesorController();
            $controller->showByIdioma($params[1]);
        }else {
            $controller = new ProfesorController();
            $controller->showList();
        }
        break;
    case 'profesor':
        $controller = new ProfesorController();
        $controller->show($params[1]);
        break;
    case 'idiomas':
        $controller = new IdiomaController();
        $controller->showList();
        break;
    case 'agregar':
         sessionAuthMiddleware($res);
         verifyAuthMiddleware($res);  /// Verifica que el usuario este logueado o redirige al login ///
        switch ($params[1]){
            case'idioma':
            $controller = new IdiomaController();
            $controller->add();
            break;
            case'profesor':
            $controller = new ProfesorController();
            $controller->add();
            break;
        }
        break;
    case 'eliminar':
         sessionAuthMiddleware($res);
         verifyAuthMiddleware($res);  
        switch ($params[1]){
            case'idioma':
            $controller = new IdiomaController();
            $controller->delete($params[2]);
            break;
            case'profesor':
            $controller = new ProfesorController();
            $controller->delete($params[2]);
            break;
        }
        break;  
    case 'modificar':
         sessionAuthMiddleware($res);
         verifyAuthMiddleware($res);  
        switch ($params[1]){
             case'idioma':
             $controller = new IdiomaController();
             $controller->update($params[2]);
             break;
             case'profesor':
             $controller = new ProfesorController();
             $controller->update($params[2]);
            break;
            }
            break;    
    default: 
        echo('404 Page not found'); 
        break;
        
}







