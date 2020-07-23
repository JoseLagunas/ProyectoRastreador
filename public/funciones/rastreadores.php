<?
require __DIR__ . '/../../src/models/rastreadores.php';

function funcioninsertarrastreador($request){
    $objUsuario= new Rastreadores();
    return $objUsuario->insertarRastreador($request);
}
function funciongetrastreadordata($request){
    $objUsuario= new Rastreadores();
    return $objUsuario->getRastreador($request);
}
function funcioneliminarRastreador($request){
    $objUsuario= new Rastreadores();
    return $objUsuario->eliminarRastreador($request);
}
function funcionactualizarRastreador($request){
    $objUsuario= new Rastreadores();
    return $objUsuario->actualizarRastreador($request);
}