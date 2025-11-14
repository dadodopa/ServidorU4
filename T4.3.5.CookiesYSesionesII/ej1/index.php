<?php

function incForm($nombre, $contraseña)
{ ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        Nombre: <input type="text" name="nombre" />
        Teléfono: <input type="text" name="telefono" />
        Correo: <input type="text" name="correo" />
        <a href="pag1.php"><button type="submit" name="siguiente" value="siguiente">Siguiente</button></a>
    </form>
<?php
}

function crearCookies($nombre, $telefono, $correo)
{
    setcookie('cNombre', $nombre);
    setcookie('cTelefono', $telefono);
    setcookie('cCorreo', $correo);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
if (!empty($_REQUEST)) {
    $nombre = isset($_POST["nombre"]) ? htmlspecialchars(trim(strip_tags($_POST["nombre"]))) : "";
    $telefono = isset($_POST["telefono"]) ? htmlspecialchars(trim(strip_tags($_POST["telefono"]))) : "";
    $correo = isset($_POST["correo"]) ? htmlspecialchars(trim(strip_tags($_POST["correo"]))) : "";

    crearCookies($nombre, $telefono, $correo);
    header("Location: pag1.php");
    exit;
} else {
    incForm("", "");
}
?>

<body>

</body>

</html>