<?php
// pqrs.php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/plain; charset=utf-8');

require 'conexion.php';

$nombre   = trim($_POST['nombre']    ?? '');

$correo   = trim($_POST['correo']    ?? '');
$mensaje  = trim($_POST['mensaje']   ?? '');

if ($nombre === '' || $correo === '' || $mensaje === '') {
    http_response_code(400);
    echo "⚠️ Faltan datos (nombre, correo, mensaje).";
    exit;
}

// Si tu tabla pqrs tiene columna 'documento', inserta con 4 campos:
$stmt = $mysqli->prepare("INSERT INTO pqrs (Nombre,  Correo, Mensaje) VALUES (?,  ?, ?)");
if (!$stmt) {
    http_response_code(500);
    echo "Error prepare: " . $mysqli->error;
    exit;
}

$stmt->bind_param("ssss", $nombre,  $correo, $mensaje);

if ($stmt->execute()) {
    echo "✅ PQRS enviada correctamente.";
} else {
    http_response_code(500);
    echo "❌ Error al enviar PQRS: " . $stmt->error;
}

$stmt->close();
$mysqli->close();