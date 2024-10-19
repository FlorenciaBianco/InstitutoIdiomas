<?php
require_once 'config.php';
require_once 'app/models/deploy.model.php';
class ProfesorModel {
    private $db;

    public function __construct (){
        $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
        $this->deploy();
    }
    
    public function getAll() {
        $query = $this->db->prepare('SELECT * FROM profesor');
        $query->execute();
    
        $profesores = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $profesores;
        }

    public function getByName ($nombre) {
        $query = $this->db->prepare('SELECT * FROM profesor WHERE nombre = ?');
        $query->execute([$nombre]);

        $profesor = $query->fetch(PDO::FETCH_OBJ);

        return $profesor;
        }
        
    public function getById ($id) {
        $query = $this->db->prepare('SELECT * FROM profesor WHERE id = ?');
        $query->execute([$id]);
    
        $profesor = $query->fetch(PDO::FETCH_OBJ);
    
        return $profesor;
        }
    
    public function getByIdioma($id) {
        $query = $this->db->prepare('SELECT * FROM profesor WHERE id_idioma = ?');
        $query->execute([$id]);
    
        $profesores = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $profesores;
            }

    public function insert ($nombre, $telefono, $email, $id_idioma, $imagen = null){
        $pathImg = null;
        
        if ($imagen){
            $pathImg = $this->uploadImage($imagen);
        }
        $query = $this->db->prepare('INSERT INTO profesor (nombre, telefono, email, id_idioma, imagen) VALUES (?,?,?,?,?)');
        $query->execute([$nombre, $telefono, $email, $id_idioma, $pathImg]);

        $id = $this->db->lastInsertId();
    
        return $id;
        }

    public function delete ($id) {
        $query = $this->db->prepare ('DELETE FROM profesor WHERE id = ?');
        $query->execute([$id]); 
        }

    public function update($nombre, $telefono, $email, $id_idioma){
        $query = $this->db->prepare('UPDATE profesor SET nombre = ?, telefono = ?, email = ? id_idioma = ? WHERE id = ?');
        $query->execute([$nombre,$telefono,$email,$id]);

        }
        private function uploadImage($image){
            $target = "docs/img/" . uniqid("", true) . "." . strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
            move_uploaded_file($image['tmp_name'], $target);
            
            return $target;
        }
        


}