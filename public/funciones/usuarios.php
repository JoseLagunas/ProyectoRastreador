<?
require __DIR__ . '/../../src/models/usuarios.php';

function funcioninsertarusuarios($request){
    $objUsuario= new Usuario();
    return $objUsuario->insertarUsuario($request);
}