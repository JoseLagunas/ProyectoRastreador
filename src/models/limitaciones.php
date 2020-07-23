<?php
class Limitaciones
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

  public function insertarlimitaciones($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO limitaciones (distancia_maxima_permitida,ubicacion_geografica) VALUES(:distancia_maxima_permitida,:ubicacion_geografica)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("distancia_maxima_permitida", $req->distancia_maxima_permitida);
        $statement->bindparam("ubicacion_geografica", $req->ubicacion_geografica);
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function getlimitacionesData($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM limitaciones WHERE id_limitaciones=:id_limitaciones";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_limitaciones", $req->id_limitaciones);      
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function eliminarlimitaciones($request)
  {
    $req = json_decode($request->getbody());

    $sql = "DELETE FROM limitaciones WHERE id_limitaciones=:id_limitaciones";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_limitaciones", $req->id_limitaciones);
        $statement->execute();
        $response=$result="se logro borrar el id_limitaciones: $req->id_limitaciones";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

  public function actualizlimitaciones($request)
  {
    $req = json_decode($request->getbody());

    $sql = "UPDATE limitaciones 
    SET distancia_maxima_permitida=:distancia_maxima_permitida,ubicacion_geografica=:ubicacion_geografica 
    WHERE id_limitaciones=:id_limitaciones";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_limitaciones", $req->id_limitaciones);
        $statement->bindparam("distancia_maxima_permitida", $req->distancia_maxima_permitida);
        $statement->bindparam("ubicacion_geografica", $req->ubicacion_geografica);
        $statement->execute();
        $response=$result="se logro modificar el id_limitaciones: $req->id_limitaciones";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

}
