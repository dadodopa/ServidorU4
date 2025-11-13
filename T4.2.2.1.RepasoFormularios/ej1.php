<?php
const ADIVINANZAS = array(
    array("Cueva" => "¿Qué cosa es que cuanto más le quitas más grande es?"),
    array("Pera" => "Blanco por dentro, verde por fuera. Si quieres que te lo diga, espera."),
    array("Loro" => "Tengo alas y pico. Hablo y hablo, pero no sé lo que digo."),
    array("Cepillo" => "No muerde ni ladra, pero tiene dientes y la casa guarda."),
    array("Mariposa" => "Antes huevecito, después capullito y más tarde volaré como un pajarito."),
    array("Sombra" => "Se mueve sin piernas y llora sin ojos.")
);

?>

<?php
function incForm($palabra, $num, $adivinanza)
{
    ?>
    <h2>ADIVINA ADIVINANZA</h2>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <p><?php echo $adivinanza ?></p>
        Introduce la respuesta: <input type="text" name="palabra" value="<?php echo $palabra; ?>" />
        <input type="hidden" name="num" value="<?php echo $num; ?>" />
        <br><br>
        <button type="submit">Enviar</button> <button type="reset">Borrar</button>
    </form>

    <?php
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
    $num = isset($_POST["num"]) ? (int)$_POST["num"] : rand(0, count(ADIVINANZAS));
    $adivinanza = current(ADIVINANZAS[$num]);
    if (empty($_POST)) {
        incForm("", $num, $adivinanza);
        echo "<p>La respuesta no puede estar vacía. Inténtalo de nuevo.</p>";
    } else {
        $palabra = htmlspecialchars(trim(strip_tags($_POST["palabra"])), ENT_QUOTES, "ISO-8859-1");
        if ($palabra !== key(ADIVINANZAS[$num])) {
            incForm($palabra, $num, $adivinanza);
            echo "<p>Respuesta incorrecta. Inténtalo de nuevo.</p>";
        } else {
            echo "<p>Respuesta correcta. Ejecuta de nuevo para jugar otra vez.</p>";
        }
    }
    ?>
</body>

</html>