<?php
session_start();

if(isset($_POST['logout'])){
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    exit;
}

$login = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Hola <?php echo $login ?> . Bienvenido a mi página.</p>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <button type="submit" name="logout">Cerrar sesión</button>
    </form>
</body>

</html>