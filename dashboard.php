<?php

include("php/conexion.php");

$sql="SELECT * FROM libros";

$resultado=$conexion->query($sql);

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Biblioteca</title>

<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<h1>Sistema Biblioteca</h1>

<div class="barra-botones">

<button>Alta</button>

<button>Modificar</button>

<button>Eliminar</button>

<button>Reportes</button>

</div>

<table>

<tr>

<th>ID</th>
<th>Título</th>
<th>Autor</th>
<th>Editorial</th>
<th>Año</th>
<th>Cantidad</th>

</tr>

<?php

while($fila=$resultado->fetch_assoc()){

?>

<tr>

<td><?= $fila["id"] ?></td>
<td><?= $fila["titulo"] ?></td>
<td><?= $fila["autor"] ?></td>
<td><?= $fila["editorial"] ?></td>
<td><?= $fila["anio"] ?></td>
<td><?= $fila["cantidad"] ?></td>

</tr>

<?php

}

?>

</table>

</body>

</html>