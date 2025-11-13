<?php

$nombre = $_POST["nombre"];
echo "<pre>";
echo "Nombre: ".$nombre;
echo "</pre>";

$usuario = $_POST["usuario"];
echo "<pre>";
echo "Usuario: ".$usuario;
echo "</pre>";

$contraseña = $_POST["contraseña"];
echo "<pre>";
echo "Contraseña: ".$contraseña;
echo "</pre>";

$edad = $_POST["edad"];
echo "<pre>";
echo "Edad: ".$edad;
echo "</pre>";

$fechaNac = $_POST["fecha-nac"];
echo "<pre>";
echo "Fecha de nacimiento: ".$fechaNac;
echo "</pre>";

$email = $_POST["email"];
echo "<pre>";
echo "Correo :".$email;
echo "</pre>";

$url = $_POST["url"];
echo "<pre>";
echo "URL de la página personal: ".$url;
echo "</pre>";

$ip = $_POST["ip"];
echo "<pre>";
echo "IP del PC: ".$ip;
echo "</pre>";

$hobbies = $_POST["hobbies"];
echo "<pre>";
echo "Hobbies: ".$hobbies;
echo "</pre>";

$recInfo = $_POST["rec-info"] ? "Sí" : "No";
echo "<pre>";
echo "Desea recibir información: ".$recInfo;
echo "</pre>";

$sexo = $_POST["sexo"];
echo "<pre>";
echo "Sexo: ".$sexo;
echo "</pre>";

$idiomas = $_REQUEST['idiomas'];
echo "<pre>";
echo "Idiomas: ";
foreach($idiomas as $idioma){
    print("$idioma ");
}
echo "</pre>";

echo "<pre>";
echo "El nombre del archivo es: ".$_FILES["curriculo"]["name"]."<br>";
echo "El tamaño del archivo es: ".$_FILES["curriculo"]["size"];
echo "</pre>";
move_uploaded_file($_FILES["curriculo"]["name"], "./subidos".$_FILES["curriculo"]["name"]);
