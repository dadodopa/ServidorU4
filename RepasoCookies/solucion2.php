<?php // TRABAJANDO SÓLO CON LA COOKI EL DATO DEL POST SÓLO SE UTILIZA PARA ACTUALIZAR LA COOKIE, NO PARA ACTUALIZAR DIRECTAMENTE EL NOMBRE
//NO SOLEMOS TENER MUCHO PROBLEMA CON ESTO, PORQUE CUANDO TENEMOS UN FORMULARIO USAMOS LAS COOKIES PARA CARGAR UN DATO DE OTRA EJECUCIÓN 
//Y LOS DATOS DE LA EJECUCIÓN PRESENTE, SI EL FORMULARIO NO PASA LA VALIDACIÓN LOS MANTEMOS DESDE EL POST COMO VENIMOS HACIENDO EN LOS EJERCICIOS.
if (isset($_POST['nombre'])) {
    setcookie('nombre', $_POST['nombre'], time() + 3600);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$nombre = isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : '';
?>

<form method="post">
    <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
    <input type="submit" value="Guardar">
</form>



