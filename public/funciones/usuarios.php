<?
require __DIR__ . '/../../src/models/usuarios.php';

function funcioninsertarusuario($request){
    $objUsuario= new Usuarios();
    return $objUsuario->insertarUsuario($request);
}