<?php

$contador = isset($_POST['contador']) ? (int)$_POST['contador'] : 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contador++;
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
    <form action="" method="post">
        <input type="hidden" name="contador" value="<?php echo $contador ?>">
        <button type="submit" name="enviar">Ejecutar</button>
            <p>Has pulsado el botón <strong> <?php echo $contador ?></strong> veces.</p>
    </form>

</body>

</html>