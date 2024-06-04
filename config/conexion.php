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
