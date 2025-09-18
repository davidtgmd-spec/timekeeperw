<?php
// test.php - rápida comprobación
header('Content-Type: text/plain; charset=utf-8');
echo "TEST_OK\n";
echo "Ruta: " . __FILE__ . "\n";
echo "REQUEST_URI: " . ($_SERVER['REQUEST_URI'] ?? '') . "\n";