<?php

require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    error_log(print_r($_POST, true));

    $integrante = $_POST['integrante'] ?? ''; 

    $chiste = '';

    switch ($integrante) {
        case 'lys':
            $chiste = "¿Cuál es el colmo de Batman? Que le Robin. 🤡🤡🤡";
            break;
        case 'luis':
            $chiste = "¿Qué tiene Darth Vader en la nevera? Helado Oscuro. 🤡🤡🤡";
            break;
        case 'bran':
            $chiste = "¿Cómo se llama el campeón de buceo japonés? Tokofondo. 🤡🤡🤡";
            break;
        case 'yani':
            $chiste = "Si los zombies se deshacen con el paso del tiempo, ¿zombiodegradables? 🤡🤡🤡";
            break;
        case 'edgar':
            $chiste = "¿Cómo se dice disparo en árabe? Ahí-va-la-bala. 🤡🤡🤡";
            break;
        default:
            $chiste = "No tengo chistes para ese integrante.";
            break;
    }

    echo json_encode(['body' => $chiste]);
} else {
    echo json_encode(['body' => 'Método no permitido.']);
}
?>
