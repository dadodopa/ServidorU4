<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahorcado</title>
</head>
<style>
    body{
        text-align: center;
    }
</style>
<body>
<?php
$palabras = [
    "manzana", "pera", "naranja", "melon", "sandia", "fresa", "cereza", "limon", "piña", "uva",
    "coco", "platanos", "kiwi", "papaya", "granada", "mango", "mandarina", "higo", "durazno", "guayaba",
    "avion", "tren", "barco", "coche", "bicicleta", "camion", "helicoptero", "moto", "tractor", "patinete",
    "perro", "gato", "tigre", "leon", "elefante", "jirafa", "zorro", "oso", "raton", "conejo",
    "mesa", "silla", "puerta", "ventana", "ordenador", "teclado", "pantalla", "telefono", "lampara", "cama"
];
$vidas = 0;
$pista = "";
$palabra = "";
$acertadas = [];
function paintFirtsForm()
{
?>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <label class="centrar" for="dificultad">Selecciona dificultad:</label>
        <br>

        <select class="centrar" name="dificultad" id="dificultad">
            <option value="7">Fácil</option>
            <option value="6">Intermedio</option>
            <option value="5">Difícil</option>
        </select>
        <br>
        <button type="submit" name="empezar">Jugar</button>
        <button type="reset">Salir</button>
    </form>
<?php
}

function paintGameForm($palabra,$vidas,$acertadas,$mensaje)
{
    $pista = "";
    for ($i=0; $i < mb_strlen($palabra); $i++) { 
        $letra = $palabra[$i];
        $pista .= in_array($letra,$acertadas) ? $letra : "_"; 
    }
?>
    <form method="post">
        <h2>Ahorcado</h2>
        <p>Pista: <?= $pista?></p>
        <p>Te quedan <?= $vidas ?> vidas</p>
        <p><?= $mensaje?> </p>
        <p>Introduce una letra: <input type="text" name="letra"></p>
        <p><button type="submit" name="probar">Probar</button></p>

        //TODO Mantenemos el juego con las variables para que no se nos reseten 
        <input type="hidden" name="palabra" value="<?= $palabra?>">
        <input type="hidden" name="vidas" value="<?= $vidas?>">
        <input type="hidden" name="acertadas" value="<?= implode(",",$acertadas)?>">
    </form>
<?php
} ?>

    <?php if (empty($_REQUEST)) {
        paintFirtsForm();
    }elseif (isset($_REQUEST["empezar"])) {
        $vidas = (int)$_POST["dificultad"];
        $palabra = $palabras[array_rand($palabras)];
        paintGameForm($palabra,$vidas,$acertadas,"Empieza el juego");
        if (mb_strpos($letra,$palabra) !== false) {
            if(!in_array($letra, $acertadas)){
                $acertadas[] = $letra;
                $mensaje = "Bien la letra ".strtoupper($letra)." está en la palabra";
            }else {
                $mensaje="Y habias puesto la letra ".strtoupper($letra);
                $vidas--;
            }
        } else {
            $vidas--;
            $mensaje="La letra ".strtoupper($letra)." no está en la palabra";
        }
    }
    ?>

</body>

</html>