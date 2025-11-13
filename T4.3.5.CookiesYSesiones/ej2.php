<?php
function incForm($asiento, $menu, $aeropuertos)
{
    $arr_aeropuertos = explode("/", $aeropuertos);

?>
    <pre>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        Nombre: <input type="text" name="nombre" />

        Asiento:
        <input type="radio" name="asientos[]" value="pasillo"
            <?php if ($asiento == "pasillo") {
                echo "checked";
            } ?> /> Pasillo
        <input type="radio" name="asientos[]" value="ventanilla"
            <?php if ($asiento == "ventanilla") {
                echo "checked";
            } ?> /> Ventanilla
        <input type="radio" name="asientos[]" value="centro"
            <?php if ($asiento == "centro") {
                echo "checked";
            } ?> /> Centro
        </select>

        Menú: <select name="menus[]">
            <option value="vegetariano"
                <?php if ($menu == "vegetariano") {
                    echo "selected";
                } ?>
                >Vegetariano</option>
            <option value="no-vegetariano"
                <?php if ($menu == "no-vegetariano") {
                    echo "selected";
                } ?>
                >No-vegetariano</option>
            <option value="diabetico"
                <?php if ($menu == "diabetico") {
                    echo "selected";
                } ?>
                >Diabético</option>
            <option value="infantil"
                <?php if ($menu == "infantil") {
                    echo "selected";
                } ?>
                >Infantil</option>
        </select>

        Aeropuertos:
        <input type="checkbox" id="lhr" name="aeropuertos[]" value="Londres" <?php if(in_array("Londres", $arr_aeropuertos)) echo "checked"; ?> /><label for="lhr">Londres</label>
        <input type="checkbox" id="cdg" name="aeropuertos[]" value="Paris" <?php if(in_array("Paris", $arr_aeropuertos)) echo "checked"; ?> /><label for="cdg"></label>Paris</label>
        <input type="checkbox" id="cia" name="aeropuertos[]" value="Roma" <?php if(in_array("Roma", $arr_aeropuertos)) echo "checked"; ?> /><label for="cia">Roma</label>
        <input type="checkbox" id="ibz" name="aeropuertos[]" value="Ibiza" <?php if(in_array("Ibiza", $arr_aeropuertos)) echo "checked"; ?> /><label for="ibz">Ibiza</label>
        <input type="checkbox" id="sin" name="aeropuertos[]" value="Singapur" <?php if(in_array("Singapur", $arr_aeropuertos)) echo "checked"; ?> /><label for="sin">Singapur</label>
        <input type="checkbox" id="hkg" name="aeropuertos[]" value="Hong Kong" <?php if(in_array("Hong Kong", $arr_aeropuertos)) echo "checked"; ?> /><label for="hkg">Hong Kong</label>
        <input type="checkbox" id="mla" name="aeropuertos[]" value="Malta" <?php if(in_array("Malta", $arr_aeropuertos)) echo "checked"; ?> /><label for="mla">Malta</label>
        <input type="checkbox" id="bom" name="aeropuertos[]" value="Bombay" <?php if(in_array("Bombay", $arr_aeropuertos)) echo "checked"; ?> /><label for="bom">Bombay</label>

        <input type="submit" value="Enviar" />
        
    </form>
    </pre>
<?php
}
function crearCookie($asiento, $menu, $aeropuertos)
{
    setcookie("cAsiento", $asiento, time() + 30 * 24 * 60 * 60);
    setcookie("cMenu", $menu, time() + 30 * 24 * 60 * 60);
    setcookie("cAeropuertos", $aeropuertos, time() + 30 * 24 * 60 * 60);
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
    <?php
    if (!empty($_REQUEST)) {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";

        $asiento = isset($_POST['asientos']) ? $_POST['asientos'][0] : "";

        $menu = isset($_POST['menus']) ? $_POST['menus'][0] : "";

        
        $aeropuertos = isset($_POST['aeropuertos']) 
        ? implode("/", $_POST['aeropuertos']) 
        : "";

        crearCookie($asiento, $menu, $aeropuertos);

        incForm($asiento, $menu, $aeropuertos);
    } else {
        incForm("", "", "");
    }

    /*Aunque rellenemos el formulario con los datos recogidos, 
    los seguimos actualizando en $_COOKIE y los podemos ver en
    tras recargar la página*/
    echo "<pre>";
    echo 'Valores de $_COOKIE actuales:<br>';
    print_r($_COOKIE);
    echo "</pre>"

    ?>
</body>

</html>