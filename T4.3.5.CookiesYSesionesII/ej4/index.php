<?php
session_start();
function incForm($nombre, $contraseña)
{ ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <pre>
        Login: <input type="text" name="usuario" />
        Password: <input type="password" name="contraseña" />
    </pre>
        <input type="submit" name="login" value="Iniciar sesión">
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
if (!empty($_REQUEST)) {
    $login = isset($_POST['usuario']) ? $_POST['usuario'] : "";

    if(!isset($_SESSION['usuario'])){
        $_SESSION['usuario'] = $login;
    } else {
        $_SESSION['usuario'] = "";
    }

    if(isset($_POST['login'])){
        header("Location: home.php");
        exit;
    }

} else {
    incForm("","");
}
?>



</body>

</html>