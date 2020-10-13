<?php

require_once('../../Models/encuesta.php');

$encuesta = new Encuesta();
$datos = $encuesta->getAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <?php
        if (sizeof($datos['encuesta']) > 0) {
        ?>
            <div class="container mt-5 text-center">

                <table class="table mt-5">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titulo encuesta</th>
                            <th scope="col">Numero de preguntas</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos['encuesta'] as $encuesta) {
                            $verRoute = "../../View/respuesta/respuestaEncuesta.php?id=" . $encuesta['id_encuesta'];
                            $editeRoute = "../../View/Encuestas/update.php?id=" . $encuesta['id_encuesta'];
                            $deleteRoute = "../../Controllers/Encuesta/delete_encuesta.php?id=" . $encuesta['id_encuesta'];
                            $resultadoRoute = "../../View/respuesta/resultadoEncuesta.php?id=" . $encuesta['id_encuesta'];
                        ?>
                            <tr>

                                <th scope="row"><?php echo $encuesta['id_encuesta']; ?></th>
                                <th scope="row"><?php echo $encuesta['titulo']; ?></th>
                                <td><?php echo $encuesta['cantidad_pregunta']; ?></td>
                                <td>
                                    <a type="button" class="btn btn-outline-info" href="<?php echo $verRoute; ?>">Ver</a>
                                    <a type="button" class="btn btn-outline-success" href="<?php echo $editeRoute; ?>">Editar</a>
                                    <a type="button" class="btn btn-outline-danger" href="<?php echo $deleteRoute; ?>">Eliminar</a>
                                    <a type="button" class="btn btn-outline-dark" href="<?php echo $resultadoRoute; ?>">Resultado</a>
                                </td>
                            </tr>
                    <?php }} ?>
                    </tbody>
                </table>
            </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>