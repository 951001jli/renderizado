<?php

require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";

$saludo = recuperaTexto("saludo");
$nombre = recuperaTexto("nombre");
$resultado =
 "{$saludo} {$nombre}.";
devuelveJson($resultado);
