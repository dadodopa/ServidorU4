<?php

function incForm($nombre, $contraseña)
{ ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
        <pre>
        Nombre completo: <input required type="text" name="nombre" value="<?php echo $nombre ?>"/>
        Contraseña: <input required type="password" name="contraseña" value="<?php echo $contraseña ?>"/>
    </pre>
        <input type="submit">
    </form>
<?php
}

function crearCookies($nombre,$contraseña)
{
    setcookie("cNombre", $nombre, );
    setcookie ("cContraseña", $contraseña, );
    
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
    $cadenaErrores = "";
    $nombre = isset($_POST["nombre"]) ? htmlspecialchars(trim(strip_tags($_POST["nombre"]))) : "";
    if ($nombre == "") {
        $cadenaErrores .= "El campo nombre no puede estar vacío.<br>";
    }
    $contraseña = isset($_POST["contraseña"]) ? htmlspecialchars(trim(strip_tags($_POST["contraseña"]))) : "";
    if ($contraseña == "") {
        $cadenaErrores .= "El campo contraseña no puede estar vacío.";
    } elseif (mb_strlen($contraseña) < 6) {
        $cadenaErrores .= "La contraseña debe tener por lo menos 6 caracteres.";
    } 
    if ($cadenaErrores != "") {
        incForm($nombre, $contraseña);
        echo $cadenaErrores;
    } else {
        crearCookies($nombre,$contraseña);
        header("Location: informacion.php");
        exit;
    }
} else {
    incForm("","");
}
?>

<body>

</body>

</html>