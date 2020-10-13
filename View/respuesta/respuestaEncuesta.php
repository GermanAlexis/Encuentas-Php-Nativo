<?php

require_once('../../Models/respuesta.php');
require_once('../../Models/preguntas.php');


$id = $_GET['id'];
$respuesta = new Respuesta();
$respuesta->insert();

$pregunta = new Preguntas();
$datos = $pregunta->allPreguntas($id);


function opciones($option, $tipo, $key)
{
    $html = " ";
    switch ($tipo) {

        case 'select':
            $option = explode(',', $option);
            $html .= "<select name='valor[$key][valor]' class='form-control form-control-sm mt-5'>";
            foreach ($option as $op) {
                $html .=  "<option value='.$op.'>$op</option>";
            }
            $html .=  "</select>";
            break;
        case 'checkbox':
            $option = explode(',', $option);
            $html .= "<div class=' row'>
                <div class='col-4'>";
                $i =  0;
            foreach ($option as $op) {

                $html .= "
                <div class='form-check form-check-inline'>
                        <label class='form-check-label' for='inlineCheckbox1'>$op</label>
                        <input class='form-check-input' type='checkbox' id='inlineCheckbox1' name='valor[$key][$i]' value='$op'>
                      </div>";
                      $i++;
            }
            $html .= "</div>
            </div>";
            break;
        case 'textarea':
            $html .= "<label >Escriba Aqui su respuesta:</label>
            <textarea name='valor[$key][$key]' rows='4' cols='50'></textarea>";
            break;
    }

    return $html;
}


?>
<!DOCTYPE html>
<html>
<title>Encuesta 2</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../assets/css/css.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
<style>
    .paginate {
        text-align: right;
    }
</style>

<body>

    <form action="../../Controllers/respuestas/controllerrespuesta.php" method="POST" id="msform">
        <!-- fieldsets -->
        <fieldset>
        <input type="hidden" name="id" value="<?php echo $id ?>">
            <?php
            foreach ($datos['infopregunta'] as $key => $pregunta) { ?>
                <h2 class="fs-title"> <?php echo $pregunta['preguntas'] ?></h2>
                <input type="hidden" name="id_pregunta[]" value="<?php echo $pregunta['id_pregunta'] ?>">
            <?php echo opciones($pregunta['opciones'], $pregunta['tipo'], $key) ; } ?> <br>
            <input type="button" name="Next" class="next action-button mt-5" value="Siguiente" />
            <input type="button" name="previous" class="previous action-button" value="Atras" />
            <button type="submit" class="action-button">Terminar</button>
            <h6 class="paginate">Pagina 1</h6>
        </fieldset>

    </form>

    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

    <script src="../../assets/js/index.js"></script>
</body>

</html>