<?php
require_once 'Modelo/conexion.php';

class ContactosController {
    private $pdo;

    public function __construct() {
        $conexion = new Conexion();
        $this->pdo = $conexion->obtenerConexion();
    }

    public function listarContactos() {
        $sql = "SELECT * FROM contactos";
        $stmt = $this->pdo->query($sql);
        $stmt->execute();
        $contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($contactos);
    }

    public function agregarContacto($nombre, $telefono, $email) {
        $sql = "INSERT INTO contactos (nombre, telefono, email) VALUES (:nombre, :telefono, :email)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nombre', $nombre);
        $stmt->bindValue(':telefono', $telefono);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        
    }

    public function eliminarContacto($id) {
        $sql = "DELETE FROM contactos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        
    }

    public function actualizarContacto($id, $nombre, $telefono, $email) {
        $sql = "UPDATE contactos SET nombre = :nombre, telefono = :telefono, email = :email WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nombre', $nombre);
        $stmt->bindValue(':telefono', $telefono);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        
    }
}
?>
