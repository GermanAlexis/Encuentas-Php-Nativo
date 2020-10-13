<?php
require_once('conexion.php');
class Respuesta
{

    private $valor;
    private $idPregunta;


    public function __construct()
    {
        $this->valor = "";
        $this->idPregunta = "";
    }



    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function setId_pregunta($id_pregunta)
    {
        $this->idPregunta = $id_pregunta;
    }
    //===============================   GET's ===========================================


    public function getValor()
    {
        return $this->valor;
    }
    public function getId_pregunta()
    {
        return $this->idPregunta;
    }

    //===============================   METHOD's ===========================================
    public function insert()
    {
        $connection = new Conexion();
        $connect = $connection->get_conexion();

        try {

            $sql = "INSERT INTO respuesta (valor, fk_pregunta) VALUES (?,?)";
            $query = $connect->prepare($sql);

            $data = [
                $this->getValor(),
                $this->getId_pregunta(),
            ];

            $query->execute($data);

            $response = ["status" => 1, "msg" => "datos guardados exitosamente"];
        } catch (Exception $e) {
            $response = ["status" => 0, "error" => $e];
        }

        return $response;
    }
    public function info($id)
    {
        $connection = new Conexion();
        $connect = $connection->get_conexion();

        try {
            $sql = 'SELECT * FROM respuesta WHERE id=?';
            $query = $connect->prepare($sql);
            $data = [$id];
            $query->execute($data);
            $inforespuesta = $query->fetch();
            $response = ['status' => 1, 'infoencuesta' => $inforespuesta];
        } catch (Exception $e) {
            $response = ['status' => 0, 'Error' => $e];
        }

        return $response;
    }
}
