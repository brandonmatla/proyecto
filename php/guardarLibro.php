<?php

include("conexion.php");

$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$editorial = $_POST["editorial"];
$anio = $_POST["anio"];
$cantidad = $_POST["cantidad"];

$sql = "INSERT INTO libros(titulo,autor,editorial,anio,cantidad)
VALUES(?,?,?,?,?)";

$stmt = $conexion->prepare($sql);

$stmt->bind_param(
    "sssii",
    $titulo,
    $autor,
    $editorial,
    $anio,
    $cantidad
);

if($stmt->execute()){
    echo "OK";
}else{
    echo "ERROR";
}