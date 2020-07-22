<?php
class Animales
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

  public function insertarAnimal($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO animal(nombre, estado, edad) VALUES(:nombre,:estado,:edad)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("nombre", $req->nombre);
        $statement->bindparam("estado", $req->estado);
        $statement->bindparam("edad", $req->edad);
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function getAnimalData($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM animal WHERE id_animal=:id_animal";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_animal", $req->id_animal);      
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function eliminaranimal($request)
  {
    $req = json_decode($request->getbody());

    $sql = "DELETE FROM animal WHERE id_animal=:id_animal";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_animal", $req->id_animal);
        $statement->execute();
        $response=$result="se logro borrar el id_animal: $req->id_animal";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

  public function actualizaranimal($request)
  {
    $req = json_decode($request->getbody());

    $sql = "UPDATE animal SET nombre=:nombre,estado=:estado,edad=:edad WHERE id_animal=:id_animal";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_animal", $req->id_animal);
        $statement->bindparam("nombre", $req->nombre);
        $statement->bindparam("estado", $req->estado);
        $statement->bindparam("edad", $req->edad);
        $statement->execute();
        $response=$result="se logro modificar el id: $req->id_animal";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

}
