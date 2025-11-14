<?php
const PALABRAS = array(
    "AURORA",
    "CARACOL",
    "VENTANA",
    "ELEFANTE",
    "ZAPATILLA",
    "RAYO",
    "TORMENTA",
    "CEREZA",
    "HIELO",
    "MONTAÑA",
    "PUENTE",
    "CAMPANA",
    "TRUENO",
    "DRAGON",
    "CABALLO",
    "JIRAFA",
    "GIRASOL",
    "COHETE",
    "PLANETA",
    "LLAVE",
    "NIEVE",
    "CASTILLO",
    "PERFUME",
    "ALMOHADA",
    "LINTERNA",
    "ESPEJO",
    "COCODRILO",
    "ESPADA",
    "SIRENA",
    "MARIPOSA",
    "RELOJ",
    "TIGRE",
    "NARANJA",
    "TELARAÑA",
    "CORAZON",
    "MURCIELAGO",
    "CASCADA",
    "CUADERNO",
    "BUFANDA",
    "ANTENA",
    "BOMBILLA",
    "MALABAR",
    "AVION",
    "FANTASMA",
    "PINGUINO",
    "CHOCOLATE",
    "LAMPARA",
    "TREBOL",
    "DIAMANTE",
    "BIBLIOTECA",
    "CARAMELO"
);
?>

<?php
const LETRAS = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
?>

<?php
function incFormPrincipio()
{ ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <p>Selecciona dificultad:</p>
        <select size="3" name="dificultades[]">
            <option name="facil" value="facil">Fácil (7 vidas)</option>
            <option name="intermedio" value="intermedio">Intermedio (6 vidas)</option>
            <option name="dificil" value="dificil">Difícil (5 vidas)</option>
        </select><br><br>
        <input type="submit" value="Jugar" />
    </form>
<?php
}
?>

<?php
function convertirNumAEscrito($num)
{
    switch ($num) {
        case 0:
            return "cero";
        case 1:
            return "una";
        case 2:
            return "dos";
        case 3;
            return "tres";
        case 4:
            return "cuatro";
        case 5:
            return "cinco";
        case 6;
            return "seis";
        case 7:
            return "siete";
    }
}
?>

<?php
function incFormJuego($pista, $vidas, $vidasEscrito, $intentos)
{ ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <p>Pista: <?php echo $pista; ?></p>
        <p>Te quedan <?php echo $vidas; ?> vidas</p>
        <p>Has perdido <?php echo $vidasEscrito; ?> veces</p>
        <input type="hidden" name="intentos" value="<?php echo $intentos ?>"/>
        Introduce una letra: <select name="letras[]">
            <?php
            foreach (LETRAS as $letra) {
                echo "<option value='$letra'>" . $letra . "</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="Enviar" />
        <input type="reset" value="Borrar" />
    </form>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahorcado</title>
</head>

<body>
    <?php
    $intentos = isset($_POST["intentos"]) ? (int)$_POST["intentos"] : 0;

    if (isset($_POST["dificultades"]) && empty($_POST["letras"])) {
        $dificultad = isset($_POST["dificultades"]) ? current($_POST["dificultades"]) : "";

        $vidas = ($dificultad == "facil") ? 7 : (($dificultad == "intermedio") ? 6 : 5);
        $vidasEscrito = convertirNumAEscrito($vidas - $vidas);

        $random = rand(0, count(PALABRAS) - 1);
        $palabra = PALABRAS[$random];
        echo $palabra;

        $pista = "";
        for ($i = 0; $i < strlen($palabra); $i++) {
            $pista .= "_ ";
        }

        $maxIntentos = $vidas;

        incFormJuego($pista, $vidas, $vidasEscrito, $intentos);

        if (!empty($_POST["letras"])) {
            $letra = current($_POST["letras"]);
            while ($intentos < $maxIntentos) {
                if (str_contains($palabra, $letra)) {
                    $pista = str_replace($palabra[$i], $letra, $palabra);
                } else {
                    $intentos++;
                    $vidas -= $intentos;
                    $vidasEscrito = convertirNumAEscrito($vidas - $intentos);
                    if ($intentos == $maxIntentos) {
                        echo "<p>Ya no quedan más intentos. </p>";
                        break;
                    } else echo "<p>Esa letra no está en la palabra</p>";
                }
                incFormJuego($pista, $vidas, $vidasEscrito, $intentos);
            }
            
        } else echo "<p>Debes introducir una letra</p>";
    } else {
        incFormPrincipio();
        echo "<p>Debes seleccionar una dificultad</p>";
    }


    ?>
</body>

</html>