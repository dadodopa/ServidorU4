<!DOCTYPE html>
<!--
EXEMPLO DE FORMULARIO CON CONTROL FILE

Revisar los valores de configuración del fichero php.ini, para las subida de archivos.
 file_uploads: pode tomar un dos valores “on” ou “off”. Permite que haxa ou non cargas de ficheiros.
 upload_max_filesize: tamaño máximo do ficheiro que se pode subir.
 upload_tmp_dir: directorio temporal onde se gardan os ficheiros cargados.
 post_max_size: tamaño máximo dos datos enviados polo método post.

enable_post_data_reading, por defecto está comentada en el fichero php.ini, con lo que sí podremos utilizar POST.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exemplo Form Type File</title>
    </head>
    <body>
        <form action="Ejercicio.php" enctype="multipart/form-data" method="POST">    
            <p>Nombre: <input type="text" name="nombre"></p>
            <!-- <input type="file" name="arquivo2" />     -->
            <p><input type="submit" value="Submit" /></p>
        </form>

    </body>
</html>


<!-- EXPLICACIONES

GET (opción por defecto): indica que los datos enviados se adjuntarán en la barra de direcciones del cliente, al final de la url correspondiente y después de un signo de interrogación de cierre. Si se envía más de un dato, éstos irán separados por el símbolo &.

Un ejemplo de un formulario enviado por el method=“get” sería el siguiente: http://www…………?nombre1=valor1&nombre2=valor2

POST: El valor post indica que el método de envío no se hará a través de la url, sino formando parte del cuerpo de la petición.


enctype="multipart/form-data"

EL ATRIBUTO ENCTYPE DE LA ETIQUETA FORM
Cuando el valor del atributo method es post, este atributo es el  tipo MIME del contenido que es usado para enviar el formulario al servidor.
Los posibles valores son:

- application/x-www-form-urlencoded: El valor por defecto si un atributo no está especificado.

- multipart/form-data: Usar este valor si se está usando el elemento <input> con el atributo type ajustado a "file".

- text/plain (HTML5)


Para enviar archivos debe especificarse el valor del atributo enctype =  "multipart/form-data" 

-->