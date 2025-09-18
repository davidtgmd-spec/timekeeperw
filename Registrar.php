<?php
// registro.php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/plain; charset=utf-8');

require 'conexion.php';

// Lee exactamente los names que envía tu form (en tu HTML: name="nombre", name="id", name="email")
$nombre = trim($_POST['nombre']  ?? '');
$id     = trim($_POST['id']      ?? '');
$email  = trim($_POST['email']   ?? '');
$contraseña  = trim($_POST['contraseña']   ?? '');

if ($nombre === '' || $id === '' || $email === '') {
    http_response_code(400);
    echo "⚠️ Faltan datos (nombre, id, email, contraseña).";
    exit;
}

$stmt = $mysqli->prepare("INSERT INTO usuarios (nombre, identificacion, email, contraseña) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    http_response_code(500);
    echo "Error prepare: " . $mysqli->error;
    exit;
}

$stmt->bind_param("sss", $nombre, $id, $email, $contraseña);

if ($stmt->execute()) {
    echo "✅ Registro exitoso.";
} else {
    http_response_code(500);
    echo "❌ Error al registrar: " . $stmt->error;
}

$stmt->close();
$mysqli->close();