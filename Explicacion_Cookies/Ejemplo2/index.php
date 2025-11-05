<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>Cookies</p>
        <?php
        print_r($_COOKIE);
        $value = 'Cualquier valor';
        setcookie("cValue", $value);
        print_r($_COOKIE);
        ?>
        <a href="paginaDestino.php">Pincha aquí<a/>

        <form action="paginaDestino.php" method="post">
            <p>Apellido: <input type="text" name="apellido" value=""/></p>
            <p>Dirección: <input type="text" name="direccion" value=""/></p>
            <p><input type="submit" name="enviar" value="Enviar"/></p>
        </form>

        <?php
        //Guardamos una cookie con el mismo nombre que un campo del formulario
        setcookie("apellido", "MiApellido");
        ?>
    </body>
</html>