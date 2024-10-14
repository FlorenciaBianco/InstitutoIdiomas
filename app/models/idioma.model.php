<?php

class IdiomaModel{

    private $db;

    public function __construct(){ 
        $this->db = new PDO('mysql:host=localhost;dbname=InstitutoIdiomas;charset=utf8', 'root', '');
    }

    public function getAll(){    
        $query = $this->db->prepare( 'SELECT * FROM  idioma');
        $query->execute();

        $idiomas = $query->fetchAll(PDO::FETCH_OBJ);

        return $idiomas;
     
    }

    public function getById($id) {
        $query = $this->db->prepare('SELECT * FROM idioma WHERE id_idioma = ?');
        $query->execute([$id]);

        $idioma = $query->fetch(PDO::FETCH_OBJ);

        return $idioma;
    }

    public function insert($nombre, $descripcion, $modulos){
        
        $query = $this->db->prepare('INSERT INTO idioma (nombre, descripcion, modulos) VALUES (?, ?, ?)');
        $query->execute([$nombre, $descripcion, $modulos]);

        $id = $this->db->lastInsertId();
    
        return $id;
    }
    
    public function delete($id){
        $query = $this->db->prepare ('DELETE FROM idioma WHERE id_idioma = ?');
        $query->execute([$id]); 
    }

    public function update ($id){
        $query = $this->db->prepare ('UPDATE idioma WHERE id_idioma = ?');
        $query = execute($id);
    }

}



