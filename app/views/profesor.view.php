<?php
class ProfesorView{
    
    private $user = null;

     public function __construct($user){ 
            $this->user = $user;
    }

    public function showList($profesores, $indiceIdiomas){
        require_once 'templates/lista_profesores.phtml';  

    }

    public function show($profesor){
        var_dump($profesor);

    }

    public function showByIdioma($profesores){
        var_dump($profesores);
      
    }

    public function showAddForm($profesor=null, $indiceIdiomas){
        require_once 'templates/form_alta_profesor.phtml';  
    }

    public function showError($error) {
        echo $error;
    }
    public function showUpdateForm($profesor, $indiceIdiomas) {
        require_once 'templates/form_alta_profesor.phtml';
    }

}
