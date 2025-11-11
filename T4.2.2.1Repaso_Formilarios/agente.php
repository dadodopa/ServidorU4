<?php
//! COMPROBAR QUE POST NO ESTÉ VACIO
if (!empty($_POST)) {
    //! FULLNAME
    echo "<p>El nombre completo es: </p>" . $_POST["fullName"] . "</p>";
    //! USERNAME
    echo "<p>El nombre de usuario es: " . $_POST["userName"] . "</p>";
    //! PASSWORD
    echo "<p>La contraseña es: " . $_POST["password"] . "</p>";
    //! AGE
    echo "<p>La edad es: " . $_POST["age"] . "</p>";
    //! BIRTHDAY
    echo "<p>El cumpleaños es: " . $_POST["birthday"] . "</p>";
    //! CORREO
    echo "<p>El correo es: " . $_POST["email"] . "</p>";
    //! URL
    echo "<p>La URL personal es: " . $_POST["personalUrl"] . "</p>";
    //! IP EQUIPO
    echo "<p>La IP del equipo es: " . $_POST["pcIP"] . "</p>";
    //! HOBBIES
    echo "<p>Los hobbies son: " . $_POST["hobbies"] . "</p>";
    //! ACEPTAR INFO
    if (isset($_POST["acceptInfo"])) {
        echo "<p>Se ha aceptado la información</p>";
    } else echo "<p>Se ha rechazado la información";
    //! SEXO
    echo "<p>Sexo: " . $_POST["sex"] . "</p>";
    //!IDIOMAS
    echo "Idiomas:";
    $languages = $_POST["languages"];
    foreach ($languages as $value) {
        print_r($value." ");
    }
    //!FILE
    echo "<p>Archivo: ".$_FILES["file"]["name"]."</p>";
}
