<?php



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
    if (isset($_COOKIE["cCookie3"])){
        header("Location: index3.php");
    }
    if (isset($_COOKIE["cCookie1"])){
        echo "El valor de la cookie es: ".$_COOKIE["cCookie1"];
    }
    echo "<pre>";
    print_r($_COOKIE);

    $valorCookie = 0;
    setcookie("cCookie1", $valorCookie);
    setcookie("cCookie2", "Otro valor");
    setcookie("cCookie3", "Otro valor", time()+60);

    setcookie("datos[nombre]", "José");
    setcookie("datos[telefono]", "981672371");
    echo "</pre>";

    echo "<a href='index3.php'>Pincha aquí para ir a otra página</a>";
    ?>
</body>

</html>