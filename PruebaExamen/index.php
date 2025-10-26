<?php
$intentos = isset($_POST['intentos']) ? (int)$_POST['intentos'] : 10;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $intentos--;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piedra, Papel o Tijera</title>
</head>

<body>
    <form method="post">
        <label for="seleccion">Selecciona una de las tres para jugar contrala máquina: </label>
        <select name="seleccion" id="seleccion">
            <option value="Piedra">Piedra</option>
            <option value="Papel">Papel</option>
            <option value="Tijera">Tijera</option>
        </select>
        <input type="hidden" name="intentos" value="<?php echo $intentos ?>">
        <br>
        <button type="submit" name="submit">Jugar</button>
        
    </form>
    <?php
    if ($intentos > 0) {
        if (isset($_POST["submit"])) {
            if (!empty($_POST["seleccion"])) {
            }
            $optUser = $_POST["seleccion"];
            $optPc = typeAnswer(rand(1, 3));
            switch ($optUser) {
                case 'Piedra':
                    if ($optPc == $optUser) {
                        echo "<h1>Empate</h1> <p>Máquina: " . $optPc . "</p><p>Tú: " . $optUser;
                    } elseif ($optPc == "Papel") {
                        echo "<h1>Perdiste</h1> <p>Máquina: " . $optPc . "</p><p>Tú: " . $optUser;
                    } elseif ($optPc == "Tijera") {
                        echo "<h1>Ganaste</h1> <p>Máquina: " . $optPc . "</p><p>Tú: " . $optUser;
                    }
                    break;
                case 'Papel':
                    if ($optPc == $optUser) {
                        echo "<h1>Empate</h1> <p>Máquina: " . $optPc . "</p><p>Tú: " . $optUser;
                    } elseif ($optPc == "Tijera") {
                        echo "<h1>Perdiste</h1> <p>Máquina: " . $optPc . "</p><p>Tú: " . $optUser;
                    } elseif ($optPc == "Piedra") {
                        echo "<h1>Ganaste</h1> <p>Máquina: " . $optPc . "</p><p>Tú: " . $optUser;
                    }
                    break;
                case 'Tijera':
                    if ($optPc == $optUser) {
                        echo "<h1>Empate</h1> <p>Máquina: " . $optPc . "</p><p>Tú: " . $optUser;
                    } elseif ($optPc == "Piedra") {
                        echo "<h1>Perdiste</h1> <p>Máquina: " . $optPc . "</p><p>Tú: " . $optUser;
                    } elseif ($optPc == "Papel") {
                        echo "<h1>Ganaste</h1> <p>Máquina: " . $optPc . "</p><p>Tú: " . $optUser;
                    }
                    break;
                default:
                    echo "Ha ocurrido un error: Recarga la página";
                    break;
            }
        }
        echo "<p>Tienes ". $intentos." intentos</p>";
    } else echo "<h1> Ya no puedes jugar más</h1>";

    function typeAnswer($option)
    {
        switch ($option) {
            case '1':
                return "Piedra";
                break;
            case '2':
                return "Papel";
                break;
            case '3':
                return "Tijera";
                break;
            default:
                return false;
                break;
        }
    }

    ?>
</body>

</html>