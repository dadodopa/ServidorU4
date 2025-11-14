<?php
if (!empty($_COOKIE)) {
    $nombre = isset($_COOKIE['cNombre']) ? $_COOKIE['cNombre'] : "";
    $telefono = isset($_COOKIE['cTelefono']) ? $_COOKIE['cTelefono'] : "";
    $correo = isset($_COOKIE['cCorreo']) ? $_COOKIE['cCorreo'] : "";

    echo "<br>Nombre: $nombre";
    echo "<br>Telefono: $telefono";
    echo "<br>Correo: $correo";
} else {
    echo "<p>Aún no hay datos almacenados.</p>";
}
