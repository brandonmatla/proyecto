<?php

include("conexion.php");

$id = $_POST["id"];
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$editorial = $_POST["editorial"];
$anio = $_POST["anio"];
$cantidad = $_POST["cantidad"];

$sql = "UPDATE libros
SET titulo = ?,
    autor = ?,
    editorial = ?,
    anio = ?,
    cantidad = ?
WHERE id = ?";

$stmt = $conexion->prepare($sql);

$stmt->bind_param(
    "sssiii",
    $titulo,
    $autor,
    $editorial,
    $anio,
    $cantidad,
    $id
);

if($stmt->execute()){
    echo "OK";
}else{
    echo "ERROR";
}