<?php

$nombre = isset($_POST["nombre"]) ? htmlspecialchars(trim(strip_tags($_POST["nombre"]))) : "";
if ($nombre == "") {
    echo "El campo nombre no puede estar vacío.";
} else {
    echo "<pre>";
    echo "Nombre: " . $nombre;
    echo "</pre>";
}

$usuario = isset($_POST["usuario"]) ? htmlspecialchars(trim(strip_tags($_POST["usuario"]))) : "";
if ($usuario == "") {
    echo "El campo usuario no puede estar vacío.";
} else {
    echo "<pre>";
    echo "Usuario: " . $usuario;
    echo "</pre>";
}

$contraseña = isset($_POST["contraseña"]) ? htmlspecialchars(trim(strip_tags($_POST["contraseña"]))) : "";
if ($contraseña == "") {
    echo "El campo contraseña no puede estar vacío.";
} elseif (mb_strlen($contraseña) < 6) {
    echo "La contraseña debe tener por lo menos 6 caracteres.";
} else {
    echo "<pre>";
    echo "Contraseña: " . $contraseña;
    echo "</pre>";
}

$edad = isset($_POST["edad"]) ? (int)($_POST["edad"]) : -1;
if ($edad == -1) {
    echo "El campo edad no puede estar vacío.";
} elseif ($edad < 0 || $edad > 130) {
    echo "La edad tiene que estar comprendida entre 0 y 130";
} else {
    echo "<pre>";
    echo "Edad: " . $edad;
    echo "</pre>";
}

$fechaNac = isset($_POST["fecha-nac"]) ? $_POST["fecha-nac"] : "";
if ($fechaNac = "") {
    echo "El campo fecha de nacimiento no puede estar vacío.";
} else {
    $arrayFecha = explode("/", $fechaNac);
    if (count($arrayFecha) == 3) {
        if (checkdate($arrayFecha[1], $arrayFecha[0], $arrayFecha[2])) {
            echo "<pre>";
            echo "Fecha de nacimiento: " . $fechaNac;
            echo "</pre>";
        } else {
            echo "Alguno de los valores de día, mes o año es inválido.";
        }
    } else {
        echo "El formato de la fecha es inválido.";
    }
}


$email = isset($_POST["email"]) ? trim(htmlspecialchars($_POST["email"])) : "";
if ($email == "") {
    echo "El campo email no puede estar vacío.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "El formato del correo no es correcto.";
} else {
    echo "<pre>";
    echo "Correo :" . $email;
    echo "</pre>";
}

$url = isset($_POST["url"]) ? $_POST["url"] : "";
if ($url == "") {
    echo "El campo URL no puede estar vacío.";
} elseif (!filter_var($url, FILTER_VALIDATE_URL)) {
    echo "La URL no es válida.";
} else {
    echo "<pre>";
    echo "URL de la página personal: " . $url;
    echo "</pre>";
}


$ip = isset($_POST["ip"]) ? $_POST["ip"] : "";
if ($ip == "") {
    echo "El campo IP no puede estar vacío.";
} elseif (!filter_var($ip, FILTER_VALIDATE_IP)) {
    echo "El formato de IP es incorrecto.";
} else {
    echo "<pre>";
    echo "IP del PC: " . $ip;
    echo "</pre>";
}


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
