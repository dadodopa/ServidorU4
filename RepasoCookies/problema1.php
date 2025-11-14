<?php

//PROBLEMA SI PRETENDEMOS UTILIZAR EL VALOR DE LA COOKIE PARA ACTUALIZAR EL FORMULARIO
//SIEMPRE PRESENTAMOS EL DATOS ANTERIOR
if (isset($_POST['nombre'])) {
    setcookie('nombre', $_POST['nombre'], time() + 3600);
}

$nombre = isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : '';
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input type="text" name="nombre" value="<?php echo $nombre; ?>">
    <input type="submit" value="Guardar">
</form>

