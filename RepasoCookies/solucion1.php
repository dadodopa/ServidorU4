<?php
//Recoger la cookie si existe
$nombre = isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : '';

//Recoger el dato del post si existe y actualizar la cookie
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    setcookie('nombre', $_POST['nombre'], time() + 3600);
}



?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input type="text" name="nombre" value="<?php echo $nombre; ?>">
    <input type="submit" value="Guardar">
</form>

