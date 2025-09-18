<?php
// conexion.php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'timekeeper';

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
    http_response_code(500);
    echo "Error de conexión: " . $mysqli->connect_error;
    exit;
}
$mysqli->set_charset('utf8mb4');