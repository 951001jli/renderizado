<?php

require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

try {

 $lista = [
  [
   "nombre" => "Lys",
   "color" => "azul"
  ],
  [
   "nombre" => "Luis",
   "color" => "rojo"
  ],
  [
   "nombre" => "Brandon",
   "color" => "rosa"
  ],
  [
   "nombre" => "Yani",
   "color" => "azul"
  ],
  [
   "nombre" => "Edgar",
   "color" => "azul"
  ]
 ];

 // Genera el código HTML de la lista.
 $render = "";
 foreach ($lista as $modelo) {
  /* Codifica nombre y color para que cambie los caracteres
   * especiales y el texto no se pueda interpretar como HTML.
   * Esta técnica evita la inyección de código. */
  $nombre = htmlentities($modelo["nombre"]);
  $color = htmlentities($modelo["color"]);
  $render .=
   "<dt>{$nombre}</dt>
    <dd>{$color}</dd>";
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
} catch (Throwable $error) {

 devuelveErrorInterno($error);
}
