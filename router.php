<?php
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/middlewares/verify.auth.middleware.php';
require_once 'app/controllers/profesor.controller.php';
require_once 'app/controllers/idioma.controller.php';
require_once 'app/controllers/auth.controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response(); 

$action = ''; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'profesores':
        if(isset($params[1])){
            $controller = new ProfesorController($res);
            $controller->showByIdioma($params[1]);
        }else {
            $controller = new ProfesorController($res);
            $controller->showList();
        }
        break;
    case 'profesor':
        $controller = new ProfesorController($res);
        $controller->show($params[1]);
        break;
    case 'idiomas':
        $controller = new IdiomaController($res);
        $controller->showList();
        break;
    case 'agregar':
         sessionAuthMiddleware($res);
         verifyAuthMiddleware($res); 
        switch ($params[1]){
            case'idioma':
            $controller = new IdiomaController($res);
            $controller->add();
            break;
            case'profesor':
            $controller = new ProfesorController($res);
            $controller->add();
            break;
        }
        break;
    case 'eliminar':
         sessionAuthMiddleware($res);
         verifyAuthMiddleware($res);  
        switch ($params[1]){
            case'idioma':
            $controller = new IdiomaController($res);
            $controller->delete($params[2]);
            break;
            case'profesor':
            $controller = new ProfesorController($res);
            $controller->delete($params[2]);
            break;
        }
        break;  
    case 'Modificar':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); 
        switch ($params[1]){
             case'idioma':
             $controller = new IdiomaController($res);
             $controller->update($params[2]);
             break;
             case'profesor':
             $controller = new ProfesorController($res);
             $controller->update($params[2]);
            break;
            }
            break; 
    case 'showLogin':
            $controller = new AuthController();
            $controller->showLogin();
            break;
    case 'login':
            $controller = new AuthController();
            $controller->login();
            break;
    case 'logout':
            $controller = new AuthController();
            $controller->logout();
            break;
    case 'home':
             $controller = new IdiomaController($res);
             $controller->showHome();
             break;   
    default: 
        echo('404 Page not found'); 
        break;
        
}







