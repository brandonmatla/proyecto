<?php

include("conexion.php");

$id = $_POST["id"];

$sql = "DELETE FROM libros WHERE id=?";

$stmt = $conexion->prepare($sql);

$stmt->bind_param("i",$id);

if($stmt->execute()){

    echo "OK";

}else{

    echo "ERROR";

}