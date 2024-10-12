<?php
    require_once 'app/models/idioma.model.php';
    require_once 'app/views/idioma.view.php';
    

    class IdiomaController {
        private $model;
        private $view;

        public function __construct (){
            $this->model = new IdiomaModel();
            $this->view = new IdiomaView(); 
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
            //// $idioma = $this->model->getById($nombre);
            $profesores = $this->model->getById($nombre);
            return $this->view->show($profesor);
        }

        public function showAddForm(){
            $this->view->showAddForm();
        }
        
        public function add(){
            if($_SERVER['REQUEST_METHOD']=='GET'){
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
           
            $id = $this->model->insert($nombre, $descripcion, $modulos);

            header('Location: ' . BASE_URL."idiomas");
        }

        public function delete($id) {
            $idioma = $this->model->getById($id);
   
           if (!$idioma) {
               return $this->view->showError("No existe el idioma con el id=$id");
           }

           $this->model->delete($id);
   
           header('Location: ' . BASE_URL);
        }

        public function update($id) {
            $idioma = $this->model->getById($id);
    
            if (!$idioma) {
                return $this->view->showError("No existe el idioma con el id=$id");
            }
    
            $this->model->update($id);
    
            header('Location: ' . BASE_URL);
        }
     


        
    }
