<?php
//! COMPROBAR QUE POST NO ESTÉ VACIO
if (!empty($_POST)) {
    $errorString = [];
    //! FULLNAME
    $fullName = isset($_POST["fullName"]) ? trim(strip_tags($_POST["fullName"])) : " ";
    if ($fullName !== " ") {
        echo "<p>El nombre completo es: " . $fullName . "</p>";
    } else $errorString[] = "No se ha introducido nombre";
    //! USERNAME
    $userName = isset($_POST["userName"]) ? trim(strip_tags($_POST["userName"])) : " ";
    if ($userName !== " ") {
        echo "<p>El nombre de usuario es: " . $userName . "</p>";
    } else $errorString[] = "No se ha introducido nombre de usuario";

    //! PASSWORD
    $password = isset($_POST["password"]) ? trim(strip_tags($_POST["password"])) : " ";
    if ($password == " ") {
        $errorString[] = "No se ha introducido contraseña";
    } else if (mb_strlen($password) > 6) {
        $errorString[] = "La contraseña debe tener más de 6 caracteres";
    } else echo "<p>La contraseña es: " . $password . "</p>";

    //! AGE
    $age = isset($_POST["age"]) ? trim(strip_tags($_POST["age"])) : " ";
    if ($age == " ") {
        $errorString[] = "No se ha introducido edad";
    } else if (!filter_var($age, FILTER_VALIDATE_INT, ["options" => ["min_range" => 0, "max_range" => 130]])) {
        $errorString[] = "La edad debe ser un número entero entre 0 y 130";
    } else echo "<p>La edad es: " . $age . "</p>";

    //! BIRTHDAY
    $partBirthday = [];
    $birthday = isset($_POST["birthday"]) ? trim(strip_tags($_POST["birthday"])) : " ";
    if ($birthday == " ") {
        $errorString[] = "No se ha introducido la fecha de nacimiento";
    } else {
        $partBirthday = explode("/", $birthday);
        if (checkdate($partBirthday[1], $partBirthday[0], $partBirthday[2])) {
            $errorString[] = "La fecha debe tener el formato dd/mm/yyyy";
        } else echo "<p>El cumpleaños es: " . $birthday . "</p>";
    }
    
    //! CORREO
    $email = isset($_POST["email"]) ? trim(strip_tags($_POST["email"])) : " ";
    if ($email==" ") {
        $errorString[] = "No se ha introducido el email";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorString[] = "El correo electrónico no es válido";
    } else echo "<p>El correo es: " . $email . "</p>";
    
    //! URL
    $personalUrl = isset($_POST["personalUrl"]) ? trim(strip_tags($_POST["personalUrl"])) : " ";
    if ($personalUrl == " ") {
        $errorString[] = "No se ha introducido URL personal";
    } elseif (!filter_var($personalUrl,FILTER_VALIDATE_URL)) {
        $errorString[]= "La url no es válida";
    } else echo "<p>La URL personal es: " . $personalUrl . "</p>";
    
    //! IP EQUIPO
    $pcIP = isset($_POST["pcIP"]) ? trim(strip_tags($_POST["pcIP"])) : " ";

    if ($pcIP == " ") {
        $errorString[] = "No se ha introducido IP del equipo";
    } elseif (!filter_var($pcIP,FILTER_VALIDATE_IP)) {
        $errorString[]= "La ip no es válida";
    } else echo "<p>La IP del equipo es: " . $pcIP . "</p>";
    
    //! HOBBIES
    $hobbies = isset($_POST["hobbies"]) ? trim(strip_tags($_POST["hobbies"])) : " ";

    if ($hobbies !== " ") {
        echo "<p>Los hobbies son: " . $hobbies . "</p>";
    } else $errorString[] = "No se han introducido hobbies";
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
