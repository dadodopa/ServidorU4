<?php
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

<body>
    <p>Bienvenido!</p>
    <?php
    if (!empty($_COOKIE)) {
        $nombre = isset($_COOKIE['cNombre']) ? $_COOKIE['cNombre'] : "";
        $telefono = isset($_COOKIE['cTelefono']) ? $_COOKIE['cTelefono'] : "";
        $correo = isset($_COOKIE['cCorreo']) ? $_COOKIE['cCorreo'] : "";
        echo "Datos almacenados: ";
        echo "<br>Nombre: $nombre";
        echo "<br>Telefono: $telefono";
        echo "<br>Correo: $correo";
    } else {
        echo "<p>Aún no hay datos almacenados.</p>";
    }
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <a href="index.php"><button type="submit" name="volver" value="volver">Volver atrás</button></a>
        <a href="pag1.php"><button type="submit" name="irANueva" value="irANueva">Ir a una nueva página</button></a>
    </form>
    <?php

    if (!empty($_REQUEST)) {
        if (isset($_POST['volver'])) {
            header("Location: index.php");
            exit;
        }
        if (isset($_POST['irANueva'])) {
            header("Location: pag3.php");
            exit;
        }
    }

    ?>

</body>

</html>