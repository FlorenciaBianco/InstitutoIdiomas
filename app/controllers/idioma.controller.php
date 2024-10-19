<?php
    require_once 'app/models/idioma.model.php';
    require_once 'app/models/deploy.model.php';
    require_once 'app/views/idioma.view.php';
    

    class IdiomaController {
        private $model;
        private $view;
        private $deployModel;

        public function __construct ($res){
            $this->model = new IdiomaModel();
            $this->view = new IdiomaView($res->user); 
            $this->deployModel = new DeployModel();
        }
    
        public function deploy(){
            $this->deployModel->_deploy();       
        
        }

        public function showList() {
            $idiomas = $this->model->getAll();
            return $this->view->showList($idiomas);
        }
        public function show($nombre){
            $profesores = $this->model->getById($nombre);
            return $this->view->show($profesores);
        }
        public function showCategoria($nombre){
            $profesores = $this->model->getById($nombre);
            return $this->view->show($profesor);
        }
        
        public function add(){
            if ($_SERVER['REQUEST_METHOD']=='GET'){
                return $this->view->showAddForm();
            }
            if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
                return $this->view->showError('Falta completar el nombre del idioma');
            }
            if (!isset($_POST['descripcion']) || empty($_POST['descripcion'])) {
                return $this->view->showError('Falta completar la descripcion');
            }
            if (!isset($_POST['modulos']) || empty($_POST['modulos'])) {
                return $this->view->showError('Falta completar el modulos');
            }

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $modulos= $_POST['modulos'];

            if($_FILES['imput_name']['type'] == "image/jpg" || $_FILES['imput_name']['type'] == "image/jpeg" || $_FILES['imput_name']['type'] == "image/png"){ 
                $id = $this->model->insert($nombre, $descripcion, $modulos, $_FILES['imput_name']);
            } else {
                $id = $this->model->insert($nombre, $descripcion, $modulos);
            }
            header('Location: ' . BASE_URL."idiomas");
        }

        public function delete($id) {
            $idioma = $this->model->getById($id);
   
           if (!$id) {
               return $this->view->showError("No existe el idioma con el id_idioma=$id");
           }

           $this->model->delete($id);
   
           header('Location: ' . BASE_URL."idiomas");
        }

        public function update($id) {
            if (!$id) {
                return $this->view->showError("No existe el idioma con el id_idioma=$id");
            }
            if ($_SERVER['REQUEST_METHOD']=='GET'){
                $idioma = $this->model->getById($id);

                return $this->view->showUpdateForm($idioma);
            }
            if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
                return $this->view->showError('Falta completar el nombre del idioma');
            }
            if (!isset($_POST['descripcion']) || empty($_POST['descripcion'])) {
                return $this->view->showError('Falta completar la descripcion');
            }
            if (!isset($_POST['modulos']) || empty($_POST['modulos'])) {
                return $this->view->showError('Falta completar el modulos');
            }
           
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $modulos= $_POST['modulos'];
           
            $id = $this->model->update($id, $nombre, $descripcion, $modulos);

            header('Location: ' . BASE_URL."idiomas");
            
        }
        public function showHome(){
            $idiomas = $this->model->getAll();
            return $this->view->showHome($idiomas);

        }
     


        
    }
