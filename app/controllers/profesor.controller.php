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
        public function addProfesor (){

        }
        public function showProfesor () {

        }













    }