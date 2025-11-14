
<?php
//USANDO IMPLODE Y EXPLODE PARA EL ARRAY DE LOS AEROPUERTOS
//SIN MOSTRAR EL FORMULARIO UNA VEZ SE HA REALIZADO EL ENVÍO - VOLVER A SOLICITAR LA PÁGINA PARA VERIFICAR LAS COOKIES
//NO COINCIDE EXACTAMENTE CON EL PROPUESTO
//
// si se envió el formulario, escribir las cookies
if (isset($_POST['enviar'])) {
    if (isset($_POST['nombre'])) {       
        setcookie('nombre', $_POST['nombre'], time() + 36400);
    }
    if (isset($_POST['asiento'])) {
        setcookie('asiento', $_POST['asiento'], time() + 36400);
    }
    if (isset($_POST['comida'])) {
        setcookie('comida', $_POST['comida'], time() + 36400);
    }
    if (isset($_POST['ofertas'])) {
        setcookie('ofertas', implode(',', $_POST['ofertas']), time() + 36400);
    }
}

// lee las cookies y asignar sus valores a variables PHP
$nombre = isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : '';
$asiento = isset($_COOKIE['asiento']) ? $_COOKIE['asiento'] : '';
$comida = isset($_COOKIE['comida']) ? $_COOKIE['comida'] : '';
$ofertas = isset($_COOKIE['ofertas']) ? explode(',', $_COOKIE['ofertas']) : array();
?>



<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Guardado y restauración de preferencias</title>
    </head>
    <body>
        <h2>Guardado y restauración de preferencias</h2><br />

        <?php
        // si el formulario está enviado, mostrar mensaje de éxito
        if (isset($_POST['enviar'])) {
            ?>
            Muchas gracias<br />
    <?php
    // si el formulario no se ha enviado, mostrarlo
} else {
    ?>
            <h3>Establezca sus preferencias de vuelo</h3><br />
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <b>NOMBRE</b>
                <input type="text" size="20" name="nombre" value="<?php echo $nombre; ?>" />

                <br /><br /><b>ELECCIÓN DE ASIENTO</b>

                <input type="radio" name="asiento" value="ventanilla" <?php echo ($asiento == 'ventanilla') ? 'checked' : ''; ?>/>Ventanilla
                <input type="radio" name="asiento" value="centro" <?php echo ($asiento == 'centro') ? 'checked' : ''; ?>/>Centro

                <br /><br /><b>PREFERENCIAS DEL MENÚ</b>
                <input type="radio" name="comida" value="normal-veg" <?php echo ($comida == 'normal-veg') ? 'checked' : ''; ?>/>Vegetariano
                <input type="radio" name="comida" value="normal-nveg" <?php echo ($comida == 'normal-nveg') ? 'checked' : ''; ?>/>No-vegetariano 
                <input type="radio" name="comida" value="diabético" <?php echo ($comida == 'diabético') ? 'checked' : ''; ?>/>Diabético
                <input type="radio" name="comida" value="infantil" <?php echo ($comida == 'infantil') ? 'checked' : ''; ?>/>Infantil

                <br /><br /><b>ESTOY INTERESADO EN OFERTAS ESPECIALES EN VUELOS DESDE</b><br />
                <input type="checkbox" name="ofertas[]" value="LHR" <?php echo in_array('LHR', $ofertas) ? 'checked' : ''; ?>/>Londres (Heathrow)
                <input type="checkbox" name="ofertas[]" value="CDG" <?php echo in_array('CDG', $ofertas) ? 'checked' : ''; ?>/>París
                <input type="checkbox" name="ofertas[]" value="CIA" <?php echo in_array('CIA', $ofertas) ? 'checked' : ''; ?>/>Roma (Ciampino)
                <input type="checkbox" name="ofertas[]" value="IBZ" <?php echo in_array('IBZ', $ofertas) ? 'checked' : ''; ?>/>Ibiza
                <input type="checkbox" name="ofertas[]" value="SIN" <?php echo in_array('SIN', $ofertas) ? 'checked' : ''; ?>/>Singapur
                <input type="checkbox" name="ofertas[]" value="HKG" <?php echo in_array('HKG', $ofertas) ? 'checked' : ''; ?>/>Hong Kong
                <input type="checkbox" name="ofertas[]" value="MLA" <?php echo in_array('MLA', $ofertas) ? 'checked' : ''; ?>/>Malta
                <input type="checkbox" name="ofertas[]" value="BOM" <?php echo in_array('BOM', $ofertas) ? 'checked' : ''; ?>/>Bombay
                </br><br/>
                <input type="submit" name="enviar" value="Enviar" />
            </form>
    <?php
}
?>
    </body>
</html>
