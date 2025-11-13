<?php
function incForm($login)
{ ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        Login: <input type="text" name="login" value="<?php echo $login ?>" />
        Password: <input type="password" name="contraseña" />
        <input type="submit" />
    </form>
<?php
}
function crearCookie($login)
{
    setcookie("cLogin", $login, time() + 30 * 24 * 60 * 60);
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
    const LOGIN = "userzone";
    const PASSWORD = "zona1234";

    if (!empty($_REQUEST)) {

        $cadenaErrores = "";

        $login = isset($_POST["login"]) ? trim(htmlspecialchars($_POST["login"])) : "";
        if ($login == "") {
            echo "<p>Debes introducir el login para continuar";
        } elseif ($login != LOGIN) {
            $cadenaErrores .= "El login es incorrecto.";
        }

        $contraseña = isset($_POST["contraseña"]) ? trim(htmlspecialchars($_POST["contraseña"])) : "";
        if ($contraseña == "") {
            echo "<p>Debes introducir la contraseña para continuar";
        } elseif ($contraseña != PASSWORD) {
            $cadenaErrores .= "La contraseña es incorrecta.";
        }

        if ($cadenaErrores == "") {
            crearCookie($login);
            echo "<p>Bienvenido a la Zona Privada!</p>";
        } else {
            incForm("");
            echo $cadenaErrores;
        }
    } else {
        if (isset($_COOKIE["cLogin"])) {
            incForm($_COOKIE["cLogin"]);
        } else {
            incForm("");
        }
    }
    ?>
</body>

</html>