<?php
class Reportes
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

  public function insertarReporte($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO reporte (id_rastreador ,ultima_posicion, hora) VALUES(:id_rastreador ,:ultima_posicion, :hora)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_rastreador", $req->id_rastreador);
        $statement->bindparam("ultima_posicion", $req->ultima_posicion);
        $statement->bindparam("hora", $req->hora);
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function getReporteData($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM reporte WHERE id_reporte=:id_reporte";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_reporte", $req->id_reporte);      
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

  public function eliminarReporte($request)
  {
    $req = json_decode($request->getbody());

    $sql = "DELETE FROM reporte WHERE id_reporte=:id_reporte";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_reporte", $req->id_reporte);
        $statement->execute();
        $response=$result="se logro borrar el id_reporte: $req->id_reporte";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

  public function actualizarReporte($request)
  {
    $req = json_decode($request->getbody());

    $sql = "UPDATE reporte SET id_rastreador=:id_rastreador, ultima_posicion=:ultima_posicion, hora=:hora  
    WHERE id_reporte=:id_reporte";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_reporte", $req->id_reporte);
        $statement->bindparam("id_rastreador", $req->id_rastreador);
        $statement->bindparam("ultima_posicion", $req->ultima_posicion);
        $statement->bindparam("hora", $req->hora);
        $statement->execute();
        $response=$result="se logro modificar el id: $req->id_reporte";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

}
