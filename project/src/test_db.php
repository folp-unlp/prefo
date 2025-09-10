<?php
// test_db.php

// Leer las variables de entorno
$db_host = getenv('DB_HOST');
$db_port = getenv('DB_PORT');
$db_name = getenv('DB_DATABASE');
$db_user = getenv('DB_USERNAME');
$db_pass = getenv('DB_PASSWORD');

// Crear la cadena de conexión (DSN)
$dsn = "mysql:host={$db_host};port={$db_port};dbname={$db_name};charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

echo "<h1>Prueba de Conexión a la Base de Datos</h1>";
echo "<p>Intentando conectar a <strong>{$db_host}:{$db_port}</strong> con la base de datos <strong>{$db_name}</strong>...</p>";

try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
    echo "<p style='color:green; font-weight:bold;'>¡Conexión exitosa!</p>";

    // Probar una consulta simple
    $stmt = $pdo->query('SELECT VERSION()');
    $version = $stmt->fetchColumn();
    echo "<p>Versión de la base de datos: <strong>{$version}</strong></p>";

} catch (PDOException $e) {
    echo "<p style='color:red; font-weight:bold;'>Error en la conexión:</p>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}
