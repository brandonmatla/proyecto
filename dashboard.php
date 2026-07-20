<?php

include("php/conexion.php");

$sql = "SELECT * FROM libros";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Sistema Biblioteca</title>

    <link rel="stylesheet" href="css/dashboard.css">

</head>

<body>

    <div class="contenedor">

        <h1 class="titulo">
            Sistema de Biblioteca
        </h1>

        <div class="barra-botones">

            <button id="btnAlta">Alta</button>


            <button id="btnReporte">Reportes</button>

        </div>

        <table>

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editorial</th>
                    <th>Año</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                <?php while($fila = $resultado->fetch_assoc()){ ?>

                <tr>

                    <td><?= $fila["id"] ?></td>

                    <td><?= $fila["titulo"] ?></td>

                    <td><?= $fila["autor"] ?></td>

                    <td><?= $fila["editorial"] ?></td>

                    <td><?= $fila["anio"] ?></td>

                    <td><?= $fila["cantidad"] ?></td>

                    <td>

                        <button class="btnEditar" data-id="<?= $fila["id"] ?>"
                            data-titulo="<?= htmlspecialchars($fila["titulo"]) ?>"
                            data-autor="<?= htmlspecialchars($fila["autor"]) ?>"
                            data-editorial="<?= htmlspecialchars($fila["editorial"]) ?>"
                            data-anio="<?= $fila["anio"] ?>" data-cantidad="<?= $fila["cantidad"] ?>">

                            Modificar

                        </button>

                        <button class="btnEliminar" data-id="<?= $fila["id"] ?>">
                            Eliminar
                        </button>

                    </td>

                </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>


    <div id="modalLibro" class="modal">

        <div class="modal-contenido">

            <h2 id="tituloModal">Nuevo Libro</h2>

            <form id="formLibro">

                <input type="hidden" id="idLibro" name="id">

                <input type="text" name="titulo" id="titulo" placeholder="Título">

                <input type="text" name="autor" id="autor" placeholder="Autor">

                <input type="text" name="editorial" id="editorial" placeholder="Editorial">

                <input type="number" name="anio" id="anio" placeholder="Año">

                <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad">

                <br><br>

                <div class="botones">

                    <button type="button" id="guardar">
                        Guardar
                    </button>

                    <button type="button" id="cerrar">
                        Cancelar
                    </button>

                </div>

            </form>

        </div>

    </div>


    <div id="modalReporte" class="modal">

        <div class="modal-contenido">

            <h2>Generar Reporte</h2>

            <form id="formReporte">

                <label>Ordenar por</label>

                <select id="ordenar">

                    <option value="id">ID</option>
                    <option value="titulo">Título</option>
                    <option value="autor">Autor</option>
                    <option value="editorial">Editorial</option>
                    <option value="anio">Año</option>
                    <option value="cantidad">Cantidad</option>

                </select>

                <br><br>

                <label>Orden</label>

                <select id="tipoOrden">

                    <option value="ASC">Ascendente</option>
                    <option value="DESC">Descendente</option>

                </select>

                <br><br>

                <label>Autor</label>

                <input type="text" id="autorReporte">

                <br>

                <label>Editorial</label>

                <input type="text" id="editorialReporte">

                <br>

                <label>Año</label>

                <input type="number" id="anioReporte">

                <br><br>

                <div class="botones">

                    <button type="button" id="generarPDF">

                        Generar PDF

                    </button>

                    <button type="button" id="cerrarReporte">

                        Cancelar

                    </button>

                </div>

            </form>

        </div>

    </div>

    <script src="js/dashboard.js"></script>

</body>

</html>