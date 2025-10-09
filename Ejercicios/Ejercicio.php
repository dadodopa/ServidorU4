<?php
    header('Content-Type: text/html; char-set=UTF-8'); 
    print_r($_GET);
    // echo "<br/>O nome do arquivo recibido no control arquivo2 é: ".$_FILES["arquivo2"]["name"];
    // move_uploaded_file($_FILES["arquivo2"]["tmp_name"], "subidos/".$_FILES["arquivo2"]["name"]);
    
/*   Podemos también establecer rutas completas como 'C:\xampp\htdocs\pruebas_subidos\\' o definir variables
    $uploaddir = 'C:\xampp\htdocs\pruebas_subidos\\'; */
?>