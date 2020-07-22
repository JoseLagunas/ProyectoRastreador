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
  public function getUsuariosData($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM usuario WHERE id_usuario=:id_usuario";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_usuario", $req->id);      
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function elimiusuarios($request)
  {
    $req = json_decode($request->getbody());

    $sql = "DELETE FROM usuario WHERE id_usuario=:id_usuario";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_usuario", $req->id_usuario);
        $statement->execute();
        $response=$result="se logro borrar el id_usuario: $req->id_usuario";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

  public function actualizarusuarios($request)
  {
    $req = json_decode($request->getbody());

    $sql = "UPDATE usuario SET nombre=:nombre,fecha_registro=:fecha_registro,correo=:correo, contrasena=:contrasena WHERE id_usuario=:id_usuario";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("id_usuario", $req->id_usuario);
        $statement->bindparam("nombre", $req->nombre);
        $statement->bindparam("fecha_registro", $req->fecha_registro);
        $statement->bindparam("correo", $req->correo);
        $statement->bindparam("contrasena", $req->contrasena);
        $statement->execute();
        $response=$result="se logro modificar el id: $req->id_usuario";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

}
