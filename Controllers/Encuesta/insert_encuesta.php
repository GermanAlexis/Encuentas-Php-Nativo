<?php
require_once("../../Models/encuesta.php");



$Encuestas = new  Encuesta();

$Encuestas->setId_Usuario($_POST['id_user']);
$Encuestas->setPreguntas($_POST['preguntas']);
$Encuestas->setTitulo($_POST['titulo']);

$data = $Encuestas->insert();

if ($data['status'] == 1) {
  echo $data['msg'];

  Header('location: ../../View/preguntas/crearpreguntas.php?id=' . $data['id']);
} else {
  echo $data['error'];
}
