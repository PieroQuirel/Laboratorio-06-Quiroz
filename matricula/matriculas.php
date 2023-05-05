<?php

include('../conexion.php');
$conexion = conectar();
$sql = 'SELECT matricula_id, curso_id, alumno_id FROM matricula';
$resultado = mysqli_query($conexion, $sql);
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Matriculas</title>
</head>
<body>
    <div class="container p-2">
    <h1>Matriculas</h1>
        <a href="agregar_matricula.html">
            <button type="button" class="btn btn-success mb-3">Nueva matricula</button>
        </a>
        <table class="table table-hover">
            <thead>
                <tr class="table-primary">
                    <th>Id</th>
                    <th>Curso</th>
                    <th>Alumno</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //Recorrer el array con el resultado de la consulta
                while($matricula = mysqli_fetch_array($resultado)) {
                    $matricula_id = $matricula['matricula_id'];
                    $curso_id = $matricula['curso_id'];
                    $alumno_id = $matricula['alumno_id'];

                    echo '<tr>';
                    echo '<td>' . $matricula_id . '</td>';
                    echo '<td>' . $curso_id . '</td>';
                    echo '<td>' . $alumno_id . '</td>';
                    echo '<td><a href="editar_matricula.php?id='. $matricula_id .'"><button type="button" class="btn btn-warning">Editar</button></a>
                            <a href="eliminar_matricula.php?id='. $matricula_id .'"><button type="button" class="btn btn-danger">Eliminar</button></a></td>';
                }
            ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>