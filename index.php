<?php
require_once 'Controlador/controller.php';

$contactosController = new ContactosController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Llamar al método listarContactos para obtener la lista de contactos
    $contactos = json_decode($contactosController->listarContactos(), true);
}

// Verificar si se ha enviado una solicitud para eliminar, actualizar o agregar un contacto
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    if ($_POST['_method'] == 'DELETE' && isset($_POST['id'])) {
        // Llamar al método eliminarContacto del controlador
        $contactosController->eliminarContacto($_POST['id']);
    } elseif ($_POST['_method'] == 'POST' && isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['email'])) {
        // Llamar al método agregarContacto del controlador
        $contactosController->agregarContacto($_POST['nombre'], $_POST['telefono'], $_POST['email']);
    } elseif ($_POST['_method'] == 'PUT' && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['email'])) {
        // Llamar al método actualizarContacto del controlador
        $contactosController->actualizarContacto($_POST['id'], $_POST['nombre'], $_POST['telefono'], $_POST['email']);
    }
    // Después de agregar, eliminar o actualizar, obtener la lista actualizada de contactos
    $contactos = json_decode($contactosController->listarContactos(), true);
}

// Incluir la vista
include 'Vista/listarContactos.php';
?>
