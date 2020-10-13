<?php
require_once("../../Models/encuesta.php");



$Encuestas = new  Encuesta();

$id = $_POST['id'];
$Encuestas->setId_Usuario($_POST['id_user']);
$Encuestas->setPreguntas($_POST['cantidad_pregunta']);
$Encuestas->setTitulo($_POST['titulo']);

$data = $Encuestas->update($id);

if ($data['status'] == 1) {
    echo $data['msg'];

    Header('location: ../../View/preguntas/crearpreguntas.php?id=' . $data['id']);
} else {
    echo $data['error'];
}
