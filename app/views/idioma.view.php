<?php

class IdiomaView {
    public function showList($idiomas) {
        
        require_once 'templates/lista_idiomas.phtml';  
    }

    public function showAddForm(){
        require_once 'templates/form_alta_idiomas.phtml';  
    }

    public function showUpdateForm($idioma){
        require_once 'templates/form_alta_idiomas.phtml';  
    }

    public function showError($error) {
        echo $error;
    }

}