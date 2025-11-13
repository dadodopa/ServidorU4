<?php

$nombre = isset($_POST["nombre"]) ? trim(htmlspecialchars($_POST["nombre"])) : "";
if ($nombre == "") {
    echo "El campo nombre no puede estar vacío.";
} else {
    echo "<pre>";
    echo "Nombre: " . $nombre;
    echo "</pre>";
}

$usuario = isset($_POST["usuario"]) ? trim(htmlspecialchars($_POST["usuario"])) : "";
if ($usuario == "") {
    echo "El campo usuario no puede estar vacío.";
} else {
    echo "<pre>";
    echo "Usuario: " . $usuario;
    echo "</pre>";
}

$contraseña = isset($_POST["contraseña"]) ? trim(htmlspecialchars($_POST["contraseña"])) : "";
if ($contraseña == "") {
    echo "El campo contraseña no puede estar vacío.";
} else {
    echo "<pre>";
    echo "Contraseña: " . $contraseña;
    echo "</pre>";
}

$edad = $_POST["edad"];
echo "<pre>";
echo "Edad: " . $edad;
echo "</pre>";

$fechaNac = $_POST["fecha-nac"];
echo "<pre>";
echo "Fecha de nacimiento: " . $fechaNac;
echo "</pre>";

$email = isset($_POST["email"]) ? trim(htmlspecialchars($_POST["email"])) : "";
if ($email == "") {
    echo "El campo email no puede estar vacío.";
} else {
    echo "<pre>";
    echo "Correo :" . $email;
    echo "</pre>";
}

$url = $_POST["url"];
echo "<pre>";
echo "URL de la página personal: " . $url;
echo "</pre>";

$ip = $_POST["ip"];
echo "<pre>";
echo "IP del PC: " . $ip;
echo "</pre>";

$hobbies = $_POST["hobbies"];
echo "<pre>";
echo "Hobbies: " . $hobbies;
echo "</pre>";

$recInfo = isset($_POST["rec-info"]) ? "Sí" : "No";
echo "<pre>";
echo "Desea recibir información: " . $recInfo;
echo "</pre>";

$sexo = $_POST["sexo"];
echo "<pre>";
echo "Sexo: " . $sexo;
echo "</pre>";

$idiomas = $_REQUEST['idiomas'];
echo "<pre>";
echo "Idiomas: ";
foreach ($idiomas as $idioma) {
    print("$idioma ");
}
echo "</pre>";

echo "<pre>";
echo "El nombre del archivo es: " . $_FILES["curriculo"]["name"] . "<br>";
echo "El tamaño del archivo es: " . $_FILES["curriculo"]["size"];
echo "</pre>";
move_uploaded_file($_FILES["curriculo"]["name"], "./subidos" . $_FILES["curriculo"]["name"]);
