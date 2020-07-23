
<?
require __DIR__ . '/../../src/models/animales.php';

function funcioninsertaranimal($request){
    $objUsuario= new Animales();
    return $objUsuario->insertarAnimal($request);
}

function funciongetanimal($request){
    $objUsuario= new Animales();
    return $objUsuario->getAnimalData($request);
}
function funcionaeliminaranimal($request){
    $objUsuario= new Animales();
    return $objUsuario->eliminaranimal($request);
}
function funcionactualizaranimal($request){
    $objUsuario= new Animales();
    return $objUsuario->actualizaranimal($request);
}
