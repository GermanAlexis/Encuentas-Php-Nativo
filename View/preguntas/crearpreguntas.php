<?php

require_once('../../Models/encuesta.php');

$encuesta = new Encuesta();
$datos = $encuesta->info($_GET['id']);
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5 text-center">
        <form action="../../Controllers/Preguntas/Insert_preguntas.php" method="POST">
            <input type="hidden" name="id_encuesta" value="<?php echo $id; ?>">

            <?php for ($i = 0; $i < $datos['infoencuesta']['cantidad_pregunta']; $i++) { ?>
                <div class="col-12">
                    <div class="row">
                        <div class="col-4">
                            <label for="">Digite Su Pregunta</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">+</span>
                                <input type="text" class="form-control" name="pregunta[]" placeholder="Digite Su Pregunta">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="">Modo De Respuesta</label>
                            <div class="input-group">
                                <select name="tipopregunta[]" class="form-control">
                                    <option value="textarea">textarea</option>
                                    <option value="checkbox">checkbox</option>
                                    <option value="input">input</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <label for="">Posibles Respuestas</label>
                            <input type="text" class="form-control" name="opciones[]" placeholder="Posibles Respuestas">
                        </div>
                    </div>
                </div>
                <br>
            <?php } ?>
            <button type="submit" class="btn btn-outline-info">Enviar</button>
        </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg4aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>