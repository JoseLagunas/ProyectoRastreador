<?
require __DIR__ . '/../../src/models/reportes.php';

function funcioninsertarreporte($request){
    $objUsuario= new Reportes();
    return $objUsuario->insertarReporte($request);
}

function funciongetreporte($request){
    $objUsuario= new Reportes();
    return $objUsuario->getReporteData($request);
}
function funcionaeliminarreporte($request){
    $objUsuario= new Reportes();
    return $objUsuario->eliminarReporte($request);
}
function funcionactualizarreporte($request){
    $objUsuario= new Reportes();
    return $objUsuario->actualizarReporte($request);
}