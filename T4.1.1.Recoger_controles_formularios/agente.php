<?php
//! COMPROBAR QUE POST NO ESTÉ VACIO
if (!empty($_POST)) {
    //! FULLNAME
    $fullName = isset($_POST["fullName"]) ? $_POST["fullName"] : " ";
    echo "<p>El nombre completo es: </p>" . $fullName . "</p>";
    //! USERNAME
    $userName = isset($_POST["userName"]) ? $_POST["userName"] : " ";
    echo "<p>El nombre de usuario es: " . $userName . "</p>";
    //! PASSWORD
    $password = isset($_POST["password"]) ? $_POST["password"] : " ";
    echo "<p>La contraseña es: " . $_POST["password"] . "</p>";
    //! AGE
    $age = isset($_POST["age"]) ? $_POST["age"] : " ";
    echo "<p>La edad es: " . $age . "</p>";
    //! BIRTHDAY
    $birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : " ";
    echo "<p>El cumpleaños es: " . $birthday . "</p>";
    //! CORREO
    $email = isset($_POST["email"]) ? $_POST["email"] : " ";
    echo "<p>El correo es: " . $email . "</p>";
    //! URL
    $personalUrl = isset($_POST["personalUrl"]) ? $_POST["personalUrl"] : " ";
    echo "<p>La URL personal es: " . $personalUrl . "</p>";
    //! IP EQUIPO
    $pcIP = isset($_POST["pcIP"]) ? $_POST["pcIP"] : " ";
    echo "<p>La IP del equipo es: " . $pcIP . "</p>";
    //! HOBBIES
    echo "<p>Los hobbies son: " . $_POST["hobbies"] . "</p>";
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
