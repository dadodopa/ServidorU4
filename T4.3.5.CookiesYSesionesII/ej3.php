<?php

$contador = isset($_COOKIE['cContador']) ? $_COOKIE['cContador'] : 0;

if (isset($_POST['clic'])) {
    $contador++;
    setcookie("cContador", $contador);
} 

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Contador de clics con cookies</title>
</head>

<body>
    <h2>Contador de clics usando cookies</h2>

    <p>Has hecho <strong><?php echo $contador; ?></strong> clic(s).</p>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="submit" name="clic" value="Hacer clic" />
    </form>
</body>

</html>