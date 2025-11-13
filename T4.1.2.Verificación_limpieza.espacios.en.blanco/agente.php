<?php
//! COMPROBAR QUE POST NO ESTÉ VACIO
if (!empty($_POST)) {
    //! FULLNAME
    $fullName = isset($_POST["fullName"]) ? trim(strip_tags($_POST["fullName"])) : " ";
    if ($fullName!==" ") {
        echo "<p>El nombre completo es: </p>" . $fullName . "</p>";
    } else echo "<p>no se ha imtroducido nombre </p>";
    //! USERNAME
    $userName = isset($_POST["userName"]) ? trim(strip_tags($_POST["userName"])) : " ";
    if ($userName!==" ") {
        echo "<p>El nombre de usuario es: " . $userName . "</p>";
    } echo "<p> No se ha introducido nombre de usuario";
    
    //! PASSWORD
    $password = isset($_POST["password"]) ? trim(strip_tags($_POST["password"])) : " ";
    if ($password!==" ") {
        echo "<p>La contraseña es: " . $_POST["password"] . "</p>";
    } else echo "<p> No se ha introducido contraseña";
    
    //! AGE
    $age = isset($_POST["age"]) ? trim(strip_tags($_POST["age"])) : " ";
    if ($age!==" ") {
        echo "<p>La edad es: " . $age . "</p>";
    } echo "<p> No se ha introducido edad";
    
    //! BIRTHDAY
    $birthday = isset($_POST["birthday"]) ? trim(strip_tags($_POST["birthday"])) : " ";
    if ($birthday!==" ") {
        echo "<p>El cumpleaños es: " . $birthday . "</p>";
    } else echo "<p>No se ha introducido la fecha de nacimiento</p>";
    
    //! CORREO
    $email = isset($_POST["email"]) ? trim(strip_tags($_POST["email"])) : " ";
    echo "<p>El correo es: " . $email . "</p>";
    //! URL
    $personalUrl = isset($_POST["personalUrl"]) ? trim(strip_tags($_POST["personalUrl"])) : " ";
    if ($personalUrl!==" ") {
        echo "<p>La URL personal es: " . $personalUrl . "</p>";
    } else echo "<p>No se ha introducido URL personal</p>";
    //! IP EQUIPO
    $pcIP = isset($_POST["pcIP"]) ? trim(strip_tags($_POST["pcIP"])) : " ";
    
    if ($pcIP!==" ") {
        echo "<p>La IP del equipo es: " . $pcIP . "</p>";
    } else echo "<p> No se ha introducido IP del equipo";
    //! HOBBIES
    $hobbies=isset($_POST["hobbies"]) ? trim(strip_tags($_POST["hobbies"])) : " ";
    
    if ($hobbies!==" ") {
        echo "<p>Los hobbies son: " . $hobbies . "</p>";
    } else echo "<p>No se han introducido hobbies</p>";
    //! ACEPTAR INFO
    $acceptInfo = isset($_POST["acceptInfo"]) ? $_POST["acceptInfo"] : " ";
    if (isset($acceptInfo)) {
        echo "<p>Se ha aceptado la información</p>";
    } else echo "<p>Se ha rechazado la información";
    //! SEXO
    $sex = isset($_POST["sex"]) ? $_POST["sex"] : " ";
    echo "<p>Sexo: " . $sex . "</p>";
    //!IDIOMAS
    $languages = isset($_POST["languages"]) ? $_POST["languages"] : " ";
    echo "Idiomas:";
    foreach ($languages as $value) {
        print_r($value . " ");
    }
    //!FILE
    $file = isset($_FILES["file"]["name"]) ? $_FILES["file"]["name"] : " ";
    echo "<p>Archivo: " . $file . "</p>";
}
