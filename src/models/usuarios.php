<?php
class Usuarios
{
  private $con;

  function __construct()
  {
    $db = new DbConnect;
    $this->con = $db->connect();
  }

  function __destruct()
  {
    $this->con = null;
  }

  public function insertarUsuario($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO usuario(nombre, fecha_registro, correo, contrasena) VALUES(:nombre,:fecha_registro,:correo,:contrasena)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("nombre", $req->nombre);
        $statement->bindparam("fecha_registro", $req->fecha_registro);
        $statement->bindparam("correo", $req->correo);
        $statement->bindparam("contrasena", $req->contrasena);
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function getSensorData($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM ejemplo WHERE id=:id";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id", $req->id);      
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function eliminarSensor($request)
  {
    $req = json_decode($request->getbody());

    $sql = "DELETE FROM ejemplo WHERE id=:id";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id", $req->id);
        $statement->execute();
        $response=$result="se logro borrar el id: $req->id";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

  public function actualizarSensor($request)
  {
    $req = json_decode($request->getbody());

    $sql = "UPDATE ejemplo SET sensor=:sensor,valor=:valor WHERE id=:id";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id", $req->id);
        $statement->bindparam("sensor", $req->sensor);
        $statement->bindparam("valor", $req->valor);
        $statement->execute();
        $response=$result="se logro modificar el id: $req->id";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

}
