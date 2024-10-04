<?php
    require_once './models/profesor.model.php';
    require_once './views/profesor.view.php';

    class profesorController {
        private $model;
        private $view;

        public function __construct (){
            $this->model = new profesorModel();
            $this->view = new profesorView(); 
        }

        public function add (){
            if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
                return $this->view->showError('Falta completar el nombre');
            }
        
            if (!isset($_POST['email']) || empty($_POST['email'])) {
                return $this->view->showError('Falta completar el email');
            }
            if (!isset($_POST['telefono']) || empty($_POST['telefono'])) {
                return $this->view->showError('Falta completar el telefono');
            }
            if (!isset($_POST['idioma']) || empty($_POST['idioma'])) {
                return $this->view->showError('Falta completar la idioma');
            }
            
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $telefono= $_POST['telefono'];
            $idioma = $_POST['idioma']
        
            $id = $this->model->insert($nombre, $telefono, $email, $id_idioma);
        
            header('Location: ' . BASE_URL);
        }

        public function showList ($filtro) {
            $profesor = $this->model->getAll($filtro);

            return $this->view->show($profesor);
        }

        public function show ($id) {
            $profesor = $this->model->($id);
            return $this->view->show($profesor);
        }
        
        public function delete($id) {
             $profesor = $this->model->getById($id);
    
            if (!$profesor) {
                return $this->view->showError("No existe la tarea con el id=$id");
            }
    
    
            $this->model->erase($id);
    
            header('Location: ' . BASE_URL);
        }
    
        public function update($id) {
            $profesor = $this->model->getById($id);
    
            if (!$profesor) {
                return $this->view->showError("No existe la tarea con el id=$id");
            }
    
            // actualiza la tarea
            $this->model->update($id);
    
            header('Location: ' . BASE_URL);
        }
     












    }