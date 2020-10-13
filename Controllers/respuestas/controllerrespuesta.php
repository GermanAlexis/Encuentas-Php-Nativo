<?php
require_once("../../Models/respuesta.php");
require_once("../../Models/encuesta.php");

$id = $_POST['id'];
$respuesta = new  Respuesta();

$valor  = $_POST['valor'];
$id_pregunta = ($_POST['id_pregunta']);




 
for ($i = 0; $i < (sizeof($id_pregunta)); $i++) {
    
    $res = implode(',', $valor[$i]);
    $respuesta->setId_pregunta($id_pregunta[$i]);
    $respuesta->setValor($res);
    $data = $respuesta->insert();
}
if ($data['status'] == 1) {
    echo $data['msg'];
    // Header('location:  ../../index.php');
} elseif ($data['status'] == 0) {
    echo $data['error'];
}
