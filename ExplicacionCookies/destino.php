<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Destino
        <?php
        echo "<pre>";
        echo "Cookie ";
        print_r($_COOKIE);
               
        setcookie("otroValor", "Eva"); //Este dato no estará en Cookie, hasta la siguiente petición al sitio.
        
        echo "Cookie ";
        print_r($_COOKIE);
        
        //setCookie("otroValor", "Eva", time()-3000);
        
        echo "Cookie "; //Comprobamos si en Cookie está apellido, el valor debería de ser MiApellido
        print_r($_COOKIE);
        
        echo "REQUEST "; //Comprobamos si en el request está apellido, el valor debería de ser el que introduce el usuario.
        print_r($_REQUEST);
        //Aunque tengamos el mismo nombre para una Cookie que para una control del formulario no existe en la actualidad ningún problema, como ocurría en versiones anteriores de PHP. 
        //Desde la versión 5.3.0 no se guardan por defecto los datos de las Cookies en el REQUEST.
        
        echo "</pre>";
        ?>
    </body>
</html>