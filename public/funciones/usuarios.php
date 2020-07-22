<?
require __DIR__ . '/../../src/models/usuarios.php';

function funcioninsertarusuario($request){
    $objUsuario= new Usuarios();
    return $objUsuario->insertarUsuario($request);
}

function funciongetusuario($request){
    $objUsuario= new Usuarios();
    return $objUsuario->getUsuariosData($request);
}
function funcionaeliminarusuario($request){
    $objUsuario= new Usuarios();
    return $objUsuario->elimiusuarios($request);
}
function funcionactualizarusuario($request){
    $objUsuario= new Usuarios();
    return $objUsuario->actualizarusuarios($request);
}
