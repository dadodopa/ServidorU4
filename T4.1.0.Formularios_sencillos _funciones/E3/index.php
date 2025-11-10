<?php
$minPass = $_POST['min'];
$maxPass = $_POST['max'];

switch ($_POST['tipo']) {
    case 'letters':
        echo "<h1>Tu contraseña es</h1><p>" . generarPassAlfa($minPass, $maxPass) . "</p>";
        break;
    case 'number':
        echo "<h1>Tu contraseña es</h1><p>" . generarPassNum($minPass, $maxPass) . "</p>";
        break;
    case 'full':
        echo "<h1>Tu contraseña es</h1><p>" . generarPassAlfaNum($minPass, $maxPass) . "</p>";
        break;
    default:
        echo "<h1>Se ha producido un error</h1>";
        break;
}

// Solo números
function generarPassNum($min, $max) {
    $finalString = "";
    $length = rand($min, $max);
    for ($i = 0; $i < $length; $i++) {
        $finalString .= rand(0, 9);
    }
    return $finalString;
}

// Solo letras
function generarPassAlfa($min, $max) {
    $finalString = "";
    $letters = range('a', 'z');
    $length = rand($min, $max);
    for ($i = 0; $i < $length; $i++) {
        $finalString .= $letters[rand(0, 25)];
    }
    return $finalString;
}

// Letras y números
function generarPassAlfaNum($min, $max) {
    $finalString = "";
    $letters = range('a', 'z');
    $length = rand($min, $max);
    for ($i = 0; $i < $length; $i++) {
        if (rand(1, 2) == 1) {
            $finalString .= $letters[rand(0, 25)];
        } else {
            $finalString .= rand(0, 9);
        }
    }
    return $finalString;
}
?>