<?php

include('../conexion.php');

// Abrimos la conexión a la BD MySQL
$conexion = conectar();

// Definimos la consulta SQL
$sql = 'SELECT alumno_id, nombres, ape_paterno, ape_materno FROM alumno';

// Ejecjutamos el query en la conexión abierta
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexión
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Alumnos</title>
</head>
<body>
    <div class="container p-2">
    <h1>Alumnos</h1>
        <a href="agregar.html">
            <button type="button" class="btn btn-success mb-3">Nuevo alumno</button>
        </a>
        <table class="table table-hover">
            <thead>
                <tr class="table-primary">
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //Recorrer el array con el resultado de la consulta
                while($alumno = mysqli_fetch_array($resultado)) {
                    $alumno_id = $alumno['alumno_id'];
                    $nombres = $alumno['nombres'];
                    $ape_paterno = $alumno['ape_paterno'];
                    $ape_materno = $alumno['ape_materno'];

                    echo '<tr>';
                    echo '<td>' . $alumno_id . '</td>';
                    echo '<td>' . $nombres . '</td>';
                    echo '<td>' . $ape_paterno . '</td>';
                    echo '<td>' . $ape_materno . '</td>';
                    echo '<td><a href="editar_alumno.php?id='. $alumno_id .'"><button type="button" class="btn btn-warning">Editar</button></a>
                            <a href="eliminar_alumno.php?id='. $alumno_id .'"><button type="button" class="btn btn-danger">Eliminar</button></a></td>';
                }
            ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>