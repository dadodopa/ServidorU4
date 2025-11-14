<?php
const OPCIONES = array("Piedra", "Papel", "Tijera");
function incForm($intentos)
{ ?>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <select size="3" name="opciones[]">
            <option name="piedra" value="Piedra">Piedra</option>
            <option name="papel" value="Papel">Papel</option>
            <option name="tijera" value="Tijera">Tijera</option>
        </select>
        <br><br>
        <input type="submit" value="Jugar" />
        <input type="hidden" name="intentos" value="<?php echo $intentos ?>" />
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
    $intentos = isset($_POST["intentos"]) ? (int)$_POST["intentos"] : 0;

    if (empty($_POST)) {
        incForm($intentos);
        echo "<p>Debes seleccionar una opción<p/>";
    } else {
        foreach ($_POST["opciones"] as $opcion) {
            $respUsuario = $opcion;
        }
        $numRand = rand(0, 2);
        $respOrdenador = OPCIONES[$numRand];
        $resultado = "";
        switch ($respUsuario) {
            case "Piedra":
                $resultado = ($respOrdenador == "Piedra") ? "Empate" : (($respOrdenador == "Papel") ? "Gana ordenador" : "Gana usuario");
            case "Papel":
                $resultado = ($respOrdenador == "Piedra") ? "Gana usuario" : (($respOrdenador == "Papel") ? "Empate" : "Gana ordenador");
            case "Tijera":
                $resultado = ($respOrdenador == "Piedra") ? "Gana ordenador" : (($respOrdenador == "Papel") ? "Gana usuario" : "Empate");
        }
        $intentos++;
        if ($intentos > 9) {
            echo "<p style='color:red'>Máximo número de intentos alcanzado.</p>";
        } else {
            echo "<p>Resultado: " . $resultado . "</p>";
            incForm($intentos);
        }
    }

    ?>
</body>

</html>