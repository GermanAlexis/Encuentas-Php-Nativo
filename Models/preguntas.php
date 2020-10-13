<?php
require_once('conexion.php');
class Preguntas
{
    private $id_encuesta;
    private $preguntas;
    private $tipo;
    private $opciones;


    public function __construct()
    {
        $this->id_encuesta = "";
        $this->preguntas = "";
        $this->tipo = "";
        $this->opciones = "";
    }


    public function setid_Encuesta($idEncuesta)
    {
        $this->id_encuesta = $idEncuesta;
    }

    public function setPregunta($pregunta)
    {
        $this->preguntas = $pregunta;
    }
    public function setTipoPregunta($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setOpciones($opciones)
    {
        $this->opciones = $opciones;
    }

    //===============================   GET's ===========================================
    public function getid_Encuesta()
    {
        return $this->id_encuesta;
    }

    public function getPregunta()
    {
        return $this->preguntas;
    }

    public function getTipoPregunta()
    {
        return $this->tipo;
    }

    public function getOpciones()
    {
        return $this->opciones;
    }
    //===============================   METHOD's ===========================================

    public function insert()
    {
        $connection = new Conexion();
        $connect = $connection->get_conexion();

        try {

            $sql = "INSERT INTO pregunta (preguntas,tipo,opciones,fk_encuesta) VALUES (?,?,?,?)";

            $query = $connect->prepare($sql);

            $data = [
                $this->getPregunta(),
                $this->getTipoPregunta(),
                $this->getOpciones(),
                $this->getId_encuesta(),
            ];

            $query->execute($data);

            $response = ["status" => 1, "msg" => "datos guardados exitosamente"];
        } catch (Exception $e) {
            $response = ["status" => 0, "error" => $e];
        }

        return $response;
    }

    public function allPreguntas($id)
    {
        $connection = new Conexion();
        $connect = $connection->get_conexion();

        try {
            $sql = 'SELECT * FROM pregunta WHERE fk_encuesta=?';
            $query = $connect->prepare($sql);
            $data = [$id];
            $query->execute($data);
            $infopregunta = $query->fetchAll();
            $response = ['status' => 1, 'infopregunta' => $infopregunta];
        } catch (Exception $e) {
            $response = ['status' => 0, 'Error' => $e];
        }

        return $response;
    }
}
