<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego del Ahorcado</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background-color: #f4f4f4; }
        form { background: #fff; padding: 20px; margin: 40px auto; width: 320px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        select, input[type=text], button { margin: 10px; padding: 8px; font-size: 1em; }
        .palabra { font-size: 2em; letter-spacing: 8px; margin: 20px 0; }
        .mensaje { font-weight: bold; color: #333; }
    </style>
</head>
<body>

<?php
// -----------------------------------------------------
// Lista de 50 palabras
// -----------------------------------------------------
$palabras = [
    "manzana", "pera", "naranja", "melon", "sandia", "fresa", "cereza", "limon", "piña", "uva",
    "coco", "platanos", "kiwi", "papaya", "granada", "mango", "mandarina", "higo", "durazno", "guayaba",
    "avion", "tren", "barco", "coche", "bicicleta", "camion", "helicoptero", "moto", "tractor", "patinete",
    "perro", "gato", "tigre", "leon", "elefante", "jirafa", "zorro", "oso", "raton", "conejo",
    "mesa", "silla", "puerta", "ventana", "ordenador", "teclado", "pantalla", "telefono", "lampara", "cama"
];

// -----------------------------------------------------
// Función para mostrar el formulario de dificultad
// -----------------------------------------------------
function paintFirstForm()
{
?>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <h2>Juego del Ahorcado</h2>
        <label for="dificultad">Selecciona dificultad:</label><br>
        <select name="dificultad" id="dificultad">
            <option value="7">Fácil (7 vidas)</option>
            <option value="6">Intermedio (6 vidas)</option>
            <option value="5">Difícil (5 vidas)</option>
        </select><br>
        <button type="submit" name="iniciar">Jugar</button>
    </form>
<?php
}

// -----------------------------------------------------
// Función para mostrar el formulario del juego
// -----------------------------------------------------
function paintGameForm($palabra, $vidas, $acertadas, $mensaje)
{
    $mostrar = "";
    for ($i = 0; $i < strlen($palabra); $i++) {
        $letra = $palabra[$i];
        $mostrar .= in_array($letra, $acertadas) ? $letra : "_";
    }
?>
    <form method="post">
        <h2>Ahorcado</h2>
        <p class="palabra"><?= $mostrar ?></p>
        <p>Vidas restantes:  <?= $vidas ?></p>
        <p class="mensaje"><?= $mensaje ?></p>
        <label>Introduce una letra:</label><br>
        <input type="text" name="letra" maxlength="1" autofocus required><br>
        <button type="submit" name="jugar">Probar</button>

        <!-- Mantenemos el estado del juego -->
        <input type="hidden" name="palabra" value="<?= $palabra ?>">
        <input type="hidden" name="vidas" value="<?= $vidas ?>">
        <input type="hidden" name="acertadas" value="<?= implode(",", $acertadas) ?>">
    </form>
<?php
}

// -----------------------------------------------------
// Lógica principal del juego
// -----------------------------------------------------
if (isset($_POST["iniciar"])) {
    // Inicio del juego: elegimos dificultad y palabra
    $vidas = (int)$_POST["dificultad"];
    $palabra = $palabras[array_rand($palabras)];
    $acertadas = [];
    paintGameForm($palabra, $vidas, $acertadas, "¡Empieza el juego!");
}

elseif (isset($_POST["jugar"])) {
    // Juego en curso
    $palabra = $_POST["palabra"];
    $vidas = (int)$_POST["vidas"];
    $acertadas = $_POST["acertadas"] ? explode(",", $_POST["acertadas"]) : [];
    $letra = strtolower($_POST["letra"][0]);

    if (strpos($palabra, $letra) !== false) {
        if (!in_array($letra, $acertadas)) {
            $acertadas[] = $letra;
            $mensaje = " ¡Bien! La letra '$letra' está en la palabra.";
        } else {
            $mensaje = " Ya habías acertado la letra '$letra'.";
        }
    } else {
        $vidas--;
        $mensaje = " Letra incorrecta. Te quedan $vidas vidas.";
    }

    // Comprobar si ha ganado o perdido
    $mostrar = "";
    for ($i = 0; $i < strlen($palabra); $i++) {
        $letraTmp = $palabra[$i];
        $mostrar .= in_array($letraTmp, $acertadas) ? $letraTmp : "_";
    }

    if ($mostrar === $palabra) {
        echo "<h2> ¡Ganaste! La palabra era: <span style='color:green;'>$palabra</span></h2>";
        echo '<form method="post"><button name="reiniciar">Volver a jugar</button></form>';
    } elseif ($vidas <= 0) {
        echo "<h2> Has perdido. La palabra era: <span style='color:red;'>$palabra</span></h2>";
        echo '<form method="post"><button name="rei niciar">Intentar otra vez</button></form>';
    } else {
        paintGameForm($palabra, $vidas, $acertadas, $mensaje);
    }
}

else {
    // Pantalla inicial (sin POST)
    paintFirstForm();
}
?>

</body>
</html>
