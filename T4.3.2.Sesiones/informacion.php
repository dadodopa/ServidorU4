<?php 
session_name("miSesion");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if (count($_SESSION) != 0) {
        $nombre = $_SESSION["nombre"];
        $contraseña = $_SESSION["contraseña"];

        echo "<p>Los datos almacenados en la sesión son: </p>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Contraseña: $contraseña</p>";
    } else {
        echo "<p>No hay datos almacenados en la sesión.</p>";
    }

    ?>

</body>

</html>