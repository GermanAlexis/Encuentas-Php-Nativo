<?php
require_once("../../Models/encuesta.php");



$Encuestas = new  Encuesta();
$id = $_GET[('id')];
$data = $Encuestas->destroy($id);

if ($data['status'] == 1) {
    echo $data['msg'];
    Header('location: ../../index.php');
} else {
    echo $data['error'];
}
