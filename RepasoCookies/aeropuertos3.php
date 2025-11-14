
<?php
//RECUPERANDO DIRECTAMENTE UN ARRAY DE $_COOKIE PARA REPRESENTAR EL ARRAY DE LOS AEROPUERTOS
//
//Cuando el usuario envíe el formulario, se guardarán los nuevos valores en la cookie y se volverá a mostrar el formulario con dichos valores.
//Siguiendo el enunciado, si se envió el formulario, recogemos los nuevos valores y los guardamos en cookies. Los valores del POST son los nuevos valores enviados por el usuario.
if (isset($_POST['enviar'])) {
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        setcookie('nombre', $nombre, time() + 36400);
    } else { $nombre = ""; }
    if (isset($_POST['asiento'])) {
        $asiento = $_POST['asiento'];
        setcookie('asiento', $asiento, time() + 36400);
    } else { $asiento=""; }
    if (isset($_POST['comida'])) {
        $comida = $_POST['comida'];
        setcookie('comida', $comida, time() + 36400);
    }else {$comida = "";}
   
    //TRABAMOS DIRECTAMENTE CON EL ARRAY    
    if (isset($_POST['ofertas'])) {
        $ofertas = $_POST['ofertas'];
        $numOfertas = count($_POST['ofertas']);
        for($i=0; $i<$numOfertas; $i++){
            setcookie("ofertas[$i]", $ofertas[$i], time() + 36400);
        }
        
    } else { $ofertas = array(); }
} else {// No existen datos en el POST


// Cuando se muestre el formulario, se comprueba si existe la cookie y se incluirán los valores anteriormente seleccionados por el usuario, si no existe se mostrará el formulario en blanco.
//Representa la primera vez que se carga la página y no hay datos en el post. Cargamos los datos de las cookies si existen.
    $nombre = isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : '';
    $asiento = isset($_COOKIE['asiento']) ? $_COOKIE['asiento'] : '';
    $comida = isset($_COOKIE['comida']) ? $_COOKIE['comida'] : '';
    $ofertas = isset($_COOKIE['ofertas']) ? $_COOKIE['ofertas'] : array();   //YA NO HACEMOS EL EXPLODE, PORQUE $_COOKIE ALMACENA UN ARRAY EN LA POSICIÓN OFERTAS
}
?>



<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Guardado y restauración de preferencias</title>
    </head>
    <body>
        <h2>Guardado y restauración de preferencias</h2><br />


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

    </body>
</html>
