<?php
    require_once 'app/models/profesor.model.php';
    require_once 'app/views/profesor.view.php';

    class ProfesorController {
        private $model;
        private $view;

        public function __construct (){
            $this->model = new ProfesorModel();
            $this->idiomaModel = new IdiomaModel();
            $this->view = new ProfesorView(); 
        }

        public function add(){
            if($_SERVER['REQUEST_METHOD']=='GET'){
                $indiceIdiomas = $this->getLanguageIndex();
                return $this->view->showAddForm($indiceIdiomas);
            }

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
            $id_idioma = $_POST['idioma'];
        
            $id = $this->model->insert($nombre, $telefono, $email, $id_idioma);

            header('Location: ' . BASE_URL."profesores");
        }

        public function showList() {
            $profesores = $this->model->getAll();

            return $this->view->showList($profesores, $this->getLanguageIndex());
        }

        private function getLanguageIndex(){
            $idiomas = $this->idiomaModel->getAll();
            $indiceIdiomas = array();
            foreach ($idiomas as $idioma) {
                $indiceIdiomas[$idioma->id_idioma] = $idioma->nombre;
            }
            return $indiceIdiomas;
        }

        public function show($nombre){
            $profesor = $this->model->getByName($nombre);
            return $this->view->show($profesor);
        }

        public function showByIdioma($id){
            $profesores = $this->model->getByIdioma($id);
            return $this->view->showByIdioma($profesores);
        }

        public function delete($id) {
             $profesor = $this->model->getById($id);
    
            if (!$profesor) {
                return $this->view->showError("No existe el profesor con el id = $id");
            }

            $this->model->delete($id);
    
            header('Location: ' . BASE_URL."profesores");
        }
    
        public function update($id) {
    
            if (!$id) {
                return $this->view->showError("No existe el profesor con el id = $id");
            }
            if($_SERVER['REQUEST_METHOD']=='GET'){
                $profesor = $this->model->getById($id);
                return $this->view->showUpdateForm($profesor);
            }

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
            $id_idioma = $_POST['idioma'];
        
            $id = $this->model->update($nombre, $telefono, $email, $id_idioma);
    
            header('Location: ' . BASE_URL);
        }
     












    }