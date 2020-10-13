<?php
require_once("../../Models/preguntas.php");
require_once("../../Models/encuesta.php");

$encuesta = new Encuesta();

$preguntas = new  Preguntas();


$pregunta = $_POST['pregunta'];
$tipo = $_POST['tipopregunta'];
$opciones = $_POST['opciones'];


$id = ($_POST['id_encuesta']);
for ($i = 0; $i < sizeof($_POST['pregunta']); $i++) {
   $preguntas->setid_encuesta($id);
   $preguntas->setPregunta($pregunta[$i]);
   $preguntas->setTipoPregunta($tipo[$i]);
   $preguntas->setOpciones($opciones[$i]);
   // 
   $data = $preguntas->insert();
}
if ($data['status'] == 1) {
   echo $data['msg'];
   Header('location:  ../../index.php');
} elseif ($data['status'] == 0) {
   echo $data['error'];
}
