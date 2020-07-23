<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
///
/// http://localhost/apirest/public/api/v1/employee
///

// API group
$app->group('/api', function () use ($app) {
   
    //REGISTROUSUARIOS
    $app->post('/rutacalculadora','funcionCalculadora');

   $app->post('/sensores','funcionsensores');
   $app->get('/sensores','funciongetSensoreData');
    $app->delete('/sensores','funcionEliminarSensores');
    $app->patch('/sensores','funcionActualizarSensores');
    
    //FUNCIONES DE LA TABLA USUARIO
    $app->post('/usuarios','funcioninsertarusuario');
    $app->get('/usuarios', 'funciongetusuario');
    $app->delete('/usuarios', 'funcionaeliminarusuario'); 
    $app->patch('/usuarios', 'funcionactualizarusuario'); 
    
    //FUNCIONES DE LA TABLA ANIMAL
    $app->post('/animales','funcioninsertaranimal');
    $app->get('/animales', 'funciongetanimal');
    $app->delete('/animales', 'funcionaeliminaranimal'); 
    $app->patch('/animales', 'funcionactualizaranimal'); 

    //FUNCIONES DE LA TABLA LIMITACIONES
    $app->post('/limitaciones','funcioninsertarlimitaciones');
    $app->get('/limitaciones','funciongetlimitaciones');
    $app->delete('/limitaciones','funcionaeliminarlimitaciones'); 
    $app->patch('/limitaciones','funcionactualizarlimitaciones');

    //FUNCIONES DE LA TABLA RASTREADOR
    $app->post('/rastreadores','funcioninsertarrastreador');
    $app->get('/rastreadores', 'funciongetrastreadordata');
    $app->delete('/rastreadores', 'funcioneliminarRastreador'); 
    $app->patch('/rastreadores', 'funcionactualizarRastreador');
});
