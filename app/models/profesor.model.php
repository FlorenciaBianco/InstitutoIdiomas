<?php

class ProfesorModel {
    private $db;

    public function __construct (){
        $this->db = new PDO('mysql:host=localhost;dbname=InstitutoIdiomas;charset=utf8', 'root', '');

        }
    
    public function getAll($filtro = null) {
        $q = 'SELECT * FROM profesor';
        $args = array();
        if(isset($filtro)){
            $q = 'SELECT * FROM profesor WHERE id_idioma = ?';
           $args[] = $filtro;  
        }
        echo $q."</br>";
        $query = $this->db->prepare($q);
        $query->execute($args);
    
        $profesores = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $profesores;
        }

    public function getById ($id) {
        $query = $this->db->prepare('SELECT * FROM profesor WHERE id = ?');
        $query->execute([$id]);

        $profesor = $query->fetch(PDO::FETCH_OBJ);

        return $profesor;
        }

    public function insert ($nombre, $telefono, $email, $id_idioma){
        $query = $this->db->prepare('INSERT INTO profesor(nombre, telefono, email, id_idioma) VALUES (?, ?, ?, ?)');
        $query->execute([$nombre, $telefono, $email, $id_idioma]);

        $id = $this->db->lastInsertId();
    
        return $id;
        }

    public function delete ($id){
          $query = $this->db->prepare ('DELETE FROM profesor WHERE id = ?');
          $query->excute([$id]); 
        }

    public function update ($id){
            $query = $this->db->prepare ('UPDATE profesor WHERE id = ?');
            $query = excute($id);
        }


}