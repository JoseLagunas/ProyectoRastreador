<?
require __DIR__ . '/../../src/models/usuarios.php';

function funcioninsertaranimal($request){
    $objUsuario= new Usuarios();
    return $objUsuario->insertarAnimal($request);
}

function funciongetanimal($request){
    $objUsuario= new Usuarios();
    return $objUsuario->getAnimalData($request);
}
function funcionaeliminaranimal($request){
    $objUsuario= new Usuarios();
    return $objUsuario->eliminaranimal($request);
}
function funcionactualizaranimal($request){
    $objUsuario= new Usuarios();
    return $objUsuario->actualizaranimal($request);
}
