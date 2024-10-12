<?php
class ProfesorView{
    
    public function __construct (){
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

    public function showAddForm($indiceIdiomas){
        require_once 'templates/form_alta_profesor.phtml';  
    }

    public function showError($error) {
        echo $error;
    }

}
