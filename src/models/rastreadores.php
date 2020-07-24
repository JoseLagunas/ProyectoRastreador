<?php
class Rastreadores
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

  public function insertarRastreador($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO rastreador (id_animal ,latitud, longitud, hora) VALUES(:id_animal,:latitud,:longitud,:hora)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_animal", $req->id_animal);
        $statement->bindparam("latitud", $req->latitud);
        $statement->bindparam("longitud", $req->longitud);
        $statement->bindparam("hora", $req->hora);
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function getRastreador($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM rastreador WHERE id_rastreador=:id_rastreador";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_rastreador", $req->id_rastreador);      
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

  public function eliminarRastreador($request)
  {
    $req = json_decode($request->getbody());

    $sql = "DELETE FROM rastreador WHERE id_rastreador=:id_rastreador";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_rastreador", $req->id_rastreador);
        $statement->execute();
        $response=$result="se logro borrar el id_rastreador: $req->id_rastreador";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

  public function actualizarRastreador($request)
  {
    $req = json_decode($request->getbody());

    $sql = "UPDATE rastreador SET id_animal=:id_animal, latitud=:latitud, longitud=:longitud, hora=:hora  
    WHERE id_rastreador=:id_rastreador";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_rastreador", $req->id_rastreador);
        $statement->bindparam("id_animal", $req->id_animal);
        $statement->bindparam("latitud", $req->latitud);
        $statement->bindparam("longitud", $req->longitud);
        $statement->bindparam("hora", $req->hora);
        $statement->execute();
        $response=$result="se logro modificar el id: $req->id_rastreador";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

}
