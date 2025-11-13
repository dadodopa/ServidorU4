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
function incForm($palabra, $num, $adivinanza, $intentos)
{
    ?>
    <h2>ADIVINA ADIVINANZA</h2>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <p><?php echo $adivinanza ?></p>
        Introduce la respuesta: <input type="text" name="palabra" value="<?php echo $palabra; ?>" />
        <input type="hidden" name="num" value="<?php echo $num; ?>" />
        <input type="hidden" name="intentos" value="<?php echo $intentos; ?>" />
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
    $num = isset($_POST["num"]) ? (int) $_POST["num"] : rand(0, count(ADIVINANZAS));
    $adivinanza = current(ADIVINANZAS[$num]);
    $intentos = isset($_POST["intentos"]) ? (int) $_POST["intentos"] : 0;
    if (empty($_POST)) {
        incForm("", $num, $adivinanza, $intentos);
        echo "<p>La respuesta no puede estar vacía. Inténtalo de nuevo.</p>";
    } else {
        $palabra = htmlspecialchars(trim(strip_tags($_POST["palabra"])), ENT_QUOTES, "ISO-8859-1");
        if ($palabra !== key(ADIVINANZAS[$num])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $intentos++;
                if ($intentos > 5) {
                    echo "<p>Máximo número de intentos alcanzados. Prueba otra adivinanza</p>";
                    $num = rand(0, count(ADIVINANZAS));
                    $adivinanza = current(ADIVINANZAS[$num]);
                    $palabra = "";
                    incForm($palabra, $num, $adivinanza, 0);
                } elseif ($intentos < 6) {
                    incForm($palabra, $num, $adivinanza, $intentos);
                    echo "<p>Respuesta incorrecta. Inténtalo de nuevo.</p>";
                }
            }
        } else {
            echo "<p>Respuesta correcta.</p>";
            $num = rand(0, count(ADIVINANZAS));
            $adivinanza = current(ADIVINANZAS[$num]);
            $palabra = "";
            incForm($palabra, $num, $adivinanza, 0);
        }
    }
    ?>
</body>

</html>