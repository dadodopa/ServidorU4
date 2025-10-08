<?php
    header('Content-Type: text/html; char-set=UTF-8'); 
    print_r($_FILES);
    echo "<br/>O nome do arquivo recibido no control arquivo2 é: ".$_FILES["arquivo2"]["name"];
    move_uploaded_file($_FILES["arquivo2"]["tmp_name"], "subidos/".$_FILES["arquivo2"]["name"]);
    
/*   Podemos también establecer rutas completas como 'C:\xampp\htdocs\pruebas_subidos\\' o definir variables
    $uploaddir = 'C:\xampp\htdocs\pruebas_subidos\\'; */
?>

<!-- EXPLICACIONES EVA
El $_FILES global existe a partir de PHP 4.1.0 (Usar $HTTP_POST_FILES en su lugar si se utiliza una versión anterior). 
Este array contendrá toda la información sobre el archivo cargado. 
$_FILES['userfile']['name']
El nombre original del archivo en la máquina cliente. 
$_FILES['userfile']['type']
El tipo mime del archivo, si el navegador proporciona esta información. 
Un ejemplo podría ser "image/gif". Este tipo mime, sin embargo no se verifica en el lado de PHP y por lo tanto no se garantiza su valor. 
$_FILES['userfile']['size']
El tamaño, en bytes, del archivo subido. 
$_FILES['userfile']['tmp_name']
El nombre temporal del archivo en el cual se almacena el archivo cargado en el servidor. 
$_FILES['userfile']['error']
El código de error asociado a esta carga de archivo. Este elemento fue añadido en PHP 4.2.0 


post_max_size integer
Define el tamaño máximo de datos de POST permitidos. Esta opción también afecta a la subida de ficheros.
Para subir ficheros grandes, este valor debe ser mayor que upload_max_filesize. 
Si el tamaño de los datos de POST es mayor que post_max_size, las superglobales $_POST y $_FILES estarán vacías. 

enable_post_data_reading boolean (por defecto está comentada en el fichero php.ini, con lo que sí podremos utilizar POST)
Al deshabilitar esta opción hace que $_POST y $_FILES no sean rellenados.


PROBLEMAS O ERRORES COMUNES
Si la carpeta no existe dentro del directorio del proyecto aparecerá un error informando que no se encuentra la ruta (el fichero es eleminado de tmp).

Si el fichero excede el tamaño, no será subido y aparecerá un 1 en error.



Los códigos de error que puede devolver $_FILES[‘mi_archivo’][‘error’] son:
0 → El ficher se subió correctamente.
1 → El fichero seleccionado excede el tamaño máximo permitido en php.ini (podemos saber el tamaño máximo permitido usando la función ini_get(‘upload_max_filesize’)).
2 → El archivo subido excede la directiva MAX_FILE_SIZE, si se especificó en el formulario.
3 → El archivo subido fue sólo parcialmente cargado.
4 → No se ha subido ningún archivo.
6 → Falta el directorio de almacenamiento temporal.
7 → No se puede escribir el archivo (posible problema relacionado con los permisos de escritura).
8 → Una extensión de PHP paró la subida del fichero.
-->