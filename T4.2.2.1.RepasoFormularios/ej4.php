<?php
function incForm($correo)
{ ?>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <p>Introduzca su dirección de correo electrónico:
            <input type="text" name="correo" />
        </p>
        <input type="submit" value="Generar usuario" />
    </form>
<?php
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
    <?php
    if (empty($_REQUEST)) {
        incForm("");
    } else {
        $correo = $_POST["correo"];
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            incForm("");
            echo "<p>El formato de correo es incorrecto</p>";
        } else {
            incForm($correo);
            $usuario = explode("@",$correo)[0];
            echo "<p>Usuario generado correctamente: ".$usuario."</p>";
        }
    }

    ?>
</body>

</html>