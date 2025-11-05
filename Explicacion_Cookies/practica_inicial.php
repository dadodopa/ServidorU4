<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_COOKIE["datos[nombre]"])) {
        header("Location: index2.php");
    }
    if (isset($_COOKIE["datos[]"])) {
        # code...
    }
    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>";
    setcookie("datos[nombre]", "Xosé", time()+5);
    setcookie("datos[apellidos]", "López Pérez", time()+5);
    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>";
    ?>

</body>

</html>