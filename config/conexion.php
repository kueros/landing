<?php
#session_start();
require("constantes.php");

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS) or die(mysqli_error());
mysqli_select_db($con, DB_NAME); // or die("La base de datos no puede ser seleccionada!".);

if (!mysqli_select_db($con, DB_NAME)) {
    die("Uh oh, couldn't select database $db");
}

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
mysqli_set_charset($con, 'utf8');

// conexion PDO a base

$host = DB_SERVER;
$dbname =DB_NAME;
$username = DB_USER;
$password = DB_PASS;
try {
    // Crear una instancia de PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Configurar PDO para que lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Conexión exitosa";
} catch (PDOException $e) {
    // Manejar errores de conexión
    echo "Error de conexión: " . $e->getMessage();
}
