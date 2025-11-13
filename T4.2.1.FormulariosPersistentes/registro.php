<?php
function incForm($nombre)
{ ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
        <pre>
        Nombre completo: <input required type="text" name="nombre" value="<?php echo $nombre ?>"/>
        Currículo: <input required type="file" name="curriculo"/>
    </pre>
        <input type="submit">
    </form>
<?php
}

function mostrarValores()
{
    echo "Nombre: " . $_REQUEST["nombre"];
    echo "Currículo: " . $_FILES["curriculo"]["name"];
    echo "IP del servidor: " . $_SERVER["SERVER_ADDR"];
    echo "Administrador del servidor: " . $_SERVER["SERVER_ADMIN"];
    echo "Nombre del servidor: " . $_SERVER["SERVER_NAME"];
    echo "Puerto del servidor: " . $_SERVER["SERVER_PORT"];
    echo "Protocolo del servidor: " . $_SERVER["SERVER_PROTOCOL"];
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
    if ($_FILES["curriculo"]["error"] == 4) {
        $cadenaErrores .= "Es obligatorio subir el currículo.<br>";
    }
    if ($cadenaErrores != "") {
        incForm($nombre);
        echo $cadenaErrores;
    } else {
        mostrarValores();
    }
} else {
    echo "El formulario no puede tener campos vacíos.";
    incForm("");
}
?>

<body>

</body>

</html>