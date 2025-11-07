<?php
//pasamos parametros que seran los que luego recogemos del formulario
function mostrarValores($nom, $usu, $contr, $ed, $cal, $corr, $ur, $ipp, $hobb, $inf, $sex, $leng) {
    echo "Nombre completo: " . $nom . "<br>";
    echo "Nombre usuario: " . $usu . "<br>";
    echo "Contraseña : " . $contr . "<br>";
    echo "Edad: " . $ed . "<br>";
    echo "Calendario : " . $cal . "<br>";
    echo "Correo : " . $corr . "<br>";
    echo "Url Personal: " . $ur . "<br>";
    echo "Dirección IP: " . $ipp . "<br>";
    echo "Hobbies: " . $hobb . "<br>";
    echo "Recibir info: " . $inf . "<br>";
    echo "Sexo : " . $sex . "<br>";
    //Array de idiomas-> NECESITAMOS UN BUCLE
    //tambiem podriamos controlarlo con un isset para cuando 
    //no hay ningun pais seleccionado
    $leng = $_REQUEST['lengua'];
    echo "Idiomas: " . "<br>";
    foreach ($leng as $idioma) {
        print ("$idioma<br>");
    }
    
    //Mostrar 5 elementos del array $_Server                
    echo "<pre>";
        echo $_SERVER['SERVER_NAME'] . "<br>";
        echo $_SERVER['PHP_SELF'] . "<br>";
        echo $_SERVER['SCRIPT_FILENAME'] . "<br>";
        echo $_SERVER['SERVER_ADDR'] . "<br>";
        echo $_SERVER['REQUEST_TIME'] . "<br>";
    echo "</pre>";

    //Contenido del array $_SERVER
    /*echo "<pre>";
    foreach ($_SERVER as &$valor) {
        echo $valor."<br>";
    }
    echo "</pre>";*/
    
    //Mover fichero
    move_uploaded_file($_FILES["curriculum"]["tmp_name"], "subidos/".$_FILES["curriculum"]["name"]);

    
}
