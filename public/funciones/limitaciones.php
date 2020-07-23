<?
require __DIR__ . '/../../src/models/limitaciones.php';

function funcioninsertarlimitaciones($request){
    $objUsuario= new Limitaciones();
    return $objUsuario->insertarlimitaciones($request);
}
function funciongetlimitaciones($request){
    $objUsuario= new Limitaciones();
    return $objUsuario->getlimitacionesData($request);
}
function funcionaeliminarlimitaciones($request){
    $objUsuario= new Limitaciones();
    return $objUsuario->eliminarlimitaciones($request);
}
function funcionactualizarlimitaciones($request){
    $objUsuario= new Limitaciones();
    return $objUsuario->actualizlimitaciones($request);
}
