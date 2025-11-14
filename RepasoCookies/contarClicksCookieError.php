<?php
// CONTADOR DE CLICKS USANDO COOKIES
// SI MOSTRAMOS EL FORMULARIO ANTES DE INCREMENTAR EL CONTADOR IREMOS UN CLICK POR ATRÁS.ENTONCES OS DA LA SENSACIÓN DE QUE LA PRIMERA VEZ LA COOKIE NO FUNCIONA.



// Si existe la cookie 'contador', la usamos; si no, empezamos en 0
$contador = isset($_COOKIE['contador']) ? $_COOKIE['contador'] : 0;
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
        <input type="submit" name="reiniciar" value="Reiniciar contador" />
    </form>
</body>
</html>


<?php
// Si se ha hecho clic en el botón, incrementamos el contador
if (isset($_POST['clic'])) {
    $contador++;
    // Guardamos el nuevo valor en la cookie
    setcookie('contador', $contador);
}

// Botón para reiniciar el contador
if (isset($_POST['reiniciar'])) {
    $contador = 0;
    setcookie('contador', $contador);
}
?>



