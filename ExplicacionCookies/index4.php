<?php
session_start(); //Obligatorio iniciar la sesion para cada archivo de php

$_SESSION["nombre"] = "Fátima"; //Colocar un dato en la sesión - definición de clave y valor
$_SESSION["edad"] = 56;

echo "<pre>";
print_r($_SESSION); //Inicialmente devuelve error UNDEFINED
echo "</pre>";

$nombre = isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : "";
echo $nombre;
?>

<?php
$nombre = "Pedro";
$_SESSION["nombre"] = $nombre;
echo "<pre>";
print_r($_SESSION);
echo "Identificador: ".session_id()."<br>";
echo "Estado (1-off, 2-on): ".session_status();
echo "</pre>";

unset($_SESSION["nombre"]); //Podemos eliminar un elemento concreto de la sesión con unset();
$_SESSION = array(); //Vaciar la sesión antes de destruirla, también se puede usar session_reset();
session_destroy();
echo "<pre>";
print_r($_SESSION); //Depués de destruir la sesión aún muestra los datos porque no está vacía, pero en otro fichero la sesión ya no existe
echo "Identificador: ".session_id()."<br>";
echo "Estado (1-off, 2-on): ".session_status();
echo "</pre>";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>