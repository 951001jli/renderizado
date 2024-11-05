<?php


if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];

    $chistes = [
        "lys" => "¿Cuál es el colmo de Batman? Que le Robin. 🤡🤡🤡",
        "luis" => "¿Qué tiene Darth Vader en la nevera? Helado Oscuro. 🤡🤡🤡",
        "bran" => "¿Cómo se llama el campeón de buceo japonés? Tokofondo. 🤡🤡🤡",
        "yani" => "Si los zombies se deshacen con el paso del tiempo, ¿zombiodegradables? 🤡🤡🤡",
        "edgar" => "¿Cómo se dice disparo en árabe? Ahí-va-la-bala. 🤡🤡🤡"
    ];

    if (array_key_exists($nombre, $chistes)) {
        $chiste = $chistes[$nombre];
    } else {
        $chiste = "No hay chistes.";
    }

    echo json_encode(["chiste" => $chiste]);
} else {
   
    echo json_encode(["error" => "No se envió ningún nombre."]);
}

?>
