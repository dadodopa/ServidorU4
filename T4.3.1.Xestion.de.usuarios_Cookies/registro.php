<?php

//Funcion que dibuja el formulario
function incForm($nombreCompleto, $nombreUsuario, $edad,
        $calendario, $correo, $url, $ip, $hobbies, $info, $sexo, $lengua) { //info es la variable que recoje el valor de si desea o no recibir info
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        <p>Nombre Completo:</p>
        <input type="text" name="nombreCompleto" value="<?php echo $nombreCompleto; ?>"/> <!--primero valdrán " " luego el valor del usuario-->
        <p>Nombre de usuario: (*)</p>
        <input type="text" name="nombreUsuario" value="<?php echo $nombreUsuario; ?>"/>
        <p>Contraseña: (*) como mínimo de 6 caracteres</p>
        <input type="password" name="contraseña" value=""/>
        <p>Edad: </p>
        <input type="text" name="edad" value="<?php echo $edad; ?>"/>
        <p>Data de nacimiento: (dd/mm/aaaa) </p>
        <input type="text" name="calendario" value="<?php echo $calendario; ?>"/>
        <p>Email: (*)</p>
        <input type="text" name="correo" value="<?php echo $correo; ?>"/>
        <p>URL página personal: </p>
        <input type="text" name="url" value="<?php echo $url; ?>"/>
        <p>IP del equipo: </p>
        <input type="text" name="ip" value="<?php echo $ip; ?>"/>
        <p>Hobbies: </p>
        <textarea name="hobbies" cols="50" rows="5"><?php echo $hobbies; ?></textarea>
        <p>Recibir info: </p>
        <input type="checkbox" name="info" <?php if ($info == "SI") echo "checked" ?>/>
        <p>Seleccion sexo: (*)</p>
        <input type="radio" value="Mujer" name="sexo" <?php if ($sexo == "Mujer") echo "checked" ?>/>Mujer  
        <input type="radio" value="Hombre" name="sexo"<?php if ($sexo == "Hombre") echo "checked" ?>/>Hombre        
        <p>Elegir lengua extranjera: </p>
        <select multiple=""  size="5" name="lengua[]">
            <option <?php
            if (in_array("Francés", $lengua)) {
                echo "selected";
            }
            ?>>Francés</option>
            <option <?php
            if (in_array("Italiano", $lengua)) {
                echo "selected";
            }
            ?>>Italiano</option>
            <option <?php
            if (in_array("Alemán", $lengua)) {
                echo "selected";
            }
            ?>>Alemán</option>                    
            <option <?php
            if (in_array("Ruso", $lengua)) {
                echo "selected";
            }
            ?>>Ruso</option>
            <option <?php
            if (in_array("Japonés", $lengua)) {
                echo "selected";
            }
            ?>>Japonés</option>
        </select>
        <p>Adjunta el currículum: </p>
        <input type="file" name="curriculum"/>
        <input type="submit" value="Enviar Formulario">
    </form>
    <?php
}

//Fin de función que dibuja el formulario
?>
<!--Creacion de formulario-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html charset=UTF-8"/> 
        <title></title>
    </head>
    <body>
        <h1>Validación formulario PHP_Self</h1>
        <?php
        if (count($_POST) == 0) {
            //primera vez que visitamos el formulario
            /* $nombreCompleto, $nombreUsuario, $contraseña, $edad,
              $calendario, $correo, $url, $ip,$hobbies, $info, $sexo, $lengua */
            incForm("", "", "", "", "", "", "", "", "", "", array());
        } else {
            $cadenaErros = ""; //Variable que almacena los errores que den.
            //Añadimos los controles que habiamos hecho en las anteriores tareas.
            //Verificacion nombre completo:
            $nombreCom = htmlspecialchars(trim(strip_tags($_REQUEST["nombreCompleto"])), ENT_QUOTES, "ISO-8859-1");
            if ($nombreCom == "") {
                $cadenaErros .= "Nombre completo inválido" . "<br>";
            }
            //Verificacion ususario
            $usuario = htmlspecialchars(trim(strip_tags($_REQUEST["nombreUsuario"])), ENT_QUOTES, "ISO-8859-1");
            if ($usuario == "") {
                $cadenaErros .= "Nombre de usuario OBLIGATORIO" . "<br>";
            }
            //Verificacion contraseña
            $contra = htmlspecialchars(trim(strip_tags($_REQUEST["contraseña"])), ENT_QUOTES, "ISO-8859-1");
            if ($contra == "") {
                $cadenaErros .= "Contraseña OBLIGATORIA" . "<br>";
            } else if (mb_strlen($contra) < 6) { //comprobacion longitud
                $cadenaErros .= "Contraseña de LONGITUD INVÁLIDA" . "<br>";
                $contra = "";
            }
            //Verificacion edad
            $edad = htmlspecialchars(trim(strip_tags($_REQUEST["edad"])), ENT_QUOTES, "ISO-8859-1");
            if ($edad == "") {
                $cadenaErros .= "La edad no ha sido introducida" . "<br>";
            } else if (!(filter_var($edad, FILTER_VALIDATE_FLOAT) && $edad > 0 && $edad < 150)) { //comprobacion rango edad y numero entero
                $cadenaErros .= "Edad erronea" . "<br>";
                $edad = "";
            }
            //Verificacion fecha
            $fecha = htmlspecialchars(trim(strip_tags($_REQUEST["calendario"])), ENT_QUOTES, "ISO-8859-1");
            if ($fecha != "") {
                //si no está vacia realizamos explode y checkdate
                $fechaArray = explode("/", $fecha);
                if (count($fechaArray) == 3) {
                    //comprueba el formato de fecha con checkdate, si no es el correcto, error
                    if (!(checkdate($fechaArray[1],
                                    $fechaArray[0], $fechaArray[2]))) {
                        $cadenaErros .= "Fecha de nacimiento erronea" . "<br>";
                        $fecha = "";
                    }
                } else { //si no se hizo el explode
                    $cadenaErros .= "Fecha de nacimiento erronea" . "<br>";
                    $fecha = "";
                }
            } else {
                //si está vacia avisamos
                $cadenaErros .= "La fecha de nacimiento está vacia" . "<br>";
            }
            //Verificacion correo
            $correo = htmlspecialchars(trim(strip_tags($_REQUEST["correo"])), ENT_QUOTES, "ISO-8859-1");
            if ($correo == "") {
                $cadenaErros .= "El correo es OBLIGATORIO" . "<br>";
            } else if (!(filter_var($correo, FILTER_VALIDATE_EMAIL))) { //validar mail
                $cadenaErros .= "El correo es inválido" . "<br>";
                $correo = "";
            }
            //Verificacion url personal
            $url = htmlspecialchars(trim(strip_tags($_REQUEST["url"])), ENT_QUOTES, "ISO-8859-1");
            if ($url == "") {
                $cadenaErros .= "Dirección URL no introducida" . "<br>";
            } else if (!(filter_var($url, FILTER_VALIDATE_URL))) { //validar url
                $cadenaErros .= "Direccion de URL inválida" . "<br>";
                $url = "";
            }
            //Verificacion ip
            $ip = htmlspecialchars(trim(strip_tags($_REQUEST["ip"])), ENT_QUOTES, "ISO-8859-1");
            if ($ip == "") {
                $cadenaErros .= "Dirección IP no introducida" . "<br>";
            } else if (!(filter_var($ip, FILTER_VALIDATE_IP))) { //validar IP
                $cadenaErros .= "Direccion de IP inválida" . "<br>";
                $ip = "";
            }
            //Verificacion hobbies
            $hobbies = htmlspecialchars(trim(strip_tags($_REQUEST["hobbies"])), ENT_QUOTES, "ISO-8859-1");
            if ($hobbies == "") {
                $cadenaErros .= "Hobbies no introducidos" . "<br>";
            }
            $info = "SI";
            //Verificacion de recibir info
            if (!isset($_REQUEST["info"])) {
                $info = "NO";
            }
            //Verificacion de sexo
            $sexo = (isset($_POST["sexo"])) ? $_POST["sexo"] : "";
            //Verificacion idiomas     
            $lenguas = (isset($_POST["lengua"])) ? $_POST["lengua"] : array();
            //Verificacion de archivo (curriculum)
            if ($_FILES["curriculum"]["error"] == 4) {
                $cadenaErros .= "No se ha subido ningun archivo" . "<br>";
            }
            ////////////////////////////////////////
            //Imprimimos:
            if ($cadenaErros != "") { //si hay errores
                incForm($nombreCom, $usuario, $edad,
                        $fecha, $correo, $url, $ip, $hobbies, $info, $sexo, $lenguas);
                //pintamos el formulario con los valores en este caso, vacios los huecos que sean erroneos
                echo "<strong><em>$cadenaErros</em></strong>"; //mostramos los errores en una frase al final                       
            } else {
                //Si no hay errores almacenados, llamamos a la funcion de mostrarValores
                echo "<p>Formulario rellenado correctamente. Valores Introducidos:</p>";
                include "funciones.php";
                //esta funcion tiene que recibir los datos que va a mostrar
                //Porque si solo tenemos una funcion con request, estamos pillando los valores
                //SIN LA LIMPIEZA QUE HEMOS APLICADO AQUI
                mostrarValores($nombreCom, $usuario, $contra, $edad, $fecha, $correo, $url, $ip, $hobbies, $info, $sexo, $lenguas);
                
            }
        }
        ?>       
    </body>
</html>