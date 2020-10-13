<?php
require_once('conexion.php');
class Encuesta
{

    private $id_usuario;
    private $preguntas;
    private $titulo;

    public function __construct()
    {
        $this->id_usuario = "";
        $this->preguntas  = "";
        $this->titulo     = "";
    }




    public function setId_Usuario($idUsuario)
    {
        $this->id_usuario = $idUsuario;
    }


    public function setPreguntas($preguntas)
    {
        $this->preguntas = $preguntas;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }


    //===============================   GET's ===========================================


    public function getId_Usuario()
    {
        return $this->id_usuario;
    }

    public function getPreguntas()
    {
        return $this->preguntas;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    //===============================   METHOD's ===========================================

    public function insert()
    {
        $connection = new Conexion();
        $connect = $connection->get_conexion();

        try {

            $sql = "INSERT INTO encuesta (id_usuario,cantidad_pregunta,titulo) VALUES (?,?,?)";
            $query = $connect->prepare($sql);
            $data = [
                $this->getId_Usuario(),
                $this->getPreguntas(),
                $this->getTitulo()
            ];
            $query->execute($data);
            $id_encuesta = $connect->lastInsertId();
            $response = ["status" => 1, "msg" => "datos guardados exitosamente", "id" => $id_encuesta];
        } catch (Exception $e) {
            $response = ["status" => 0, "error" => $e];
        }
        return $response;
    }


    public function getAll()
    {
        $connection = new Conexion();
        $connect = $connection->get_conexion();

        try {
            $sql = "SELECT * FROM encuesta";
            $query = $connect->prepare($sql);
            $query->execute();
            $data = $query->fetchAll();
            $response = ["status" => 1, "encuesta" => $data];
        } catch (Exception $e) {
            $response = ["status" => 0, "error" => $e];
        }
        return $response;
    }

    public function destroy($id)
    {
        $connection = new Conexion();
        $connect = $connection->get_conexion();

        try {
            $sql = "DELETE FROM encuesta WHERE id_encuesta=?  ";
            $query = $connect->prepare($sql);
            $data = [$id];
            $query->execute($data);
            $response = ['status' => 1, 'msg' => "Dato eliminado exitosamente"];
        } catch (Exception $e) {
            $response = ['status' => 0, 'error' => $e];
        }
        return $response;
    }

    public function update($id)
    {
        $connection = new Conexion();
        $connect = $connection->get_conexion();
        try {
            $sql = 'UPDATE encuesta  SET id_usuario=?, cantidad_pregunta=?, titulo=? WHERE id_encuesta=?';
            $query = $connect->prepare($sql);
            $data = [
                $this->getId_Usuario(),
                $this->getPreguntas(),
                $this->getTitulo(),
                $id
            ];
            $query->execute($data);
            $response = ['status' => 1, 'msg' => 'usuario actualizado exitosamente'];
        } catch (Exception $e) {
            $response = ['status' => 0, 'Error' => $e];
        }

        return $response;
    }

    public function info($id)
    {
        $connection = new Conexion();
        $connect = $connection->get_conexion();

        try {
            $sql = 'SELECT * FROM encuesta WHERE id_encuesta=?';
            $query = $connect->prepare($sql);
            $data = [$id];
            $query->execute($data);
            $infoencuesta = $query->fetch();
            $response = ['status' => 1, 'infoencuesta' => $infoencuesta];
        } catch (Exception $e) {
            $response = ['status' => 0, 'Error' => $e];
        }

        return $response;
    }
}
