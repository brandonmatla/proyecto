<?php

$conexion = new mysqli(
    "localhost",
    "root",
    "Matla112",
    "biblioteca"
);

if($conexion->connect_error){
    die("Error de conexión");
}

?>