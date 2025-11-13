<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./agente.php" enctype="multipart/form-data" method="post">
        <pre>
        Nombre completo: <input type="text" name="nombre"/>

        Nombre de usuario: <input type="text" name="usuario"/>

        Contraseña: <input type="text" name="contraseña"/>

        Edad: <input type="text" name="edad"/>

        Data de nacimiento: <input type="text" name="fecha-nac"/>

        Email: <input type="text" name="email"/>

        URL de página personal: <input type="text" name="url"/>

        IP de equipo: <input type="text" name="ip"/>

        Hobbies: 
        <textarea name="hobbies"></textarea>

        Recibir información: <input type="checkbox" name="rec-info"/>

        Sexo: Hombre<input type="radio" name="sexo" value="Hombre"/> Mujer<input type="radio" name="sexo" value="Mujer"/>

        Elegir lengua extranjera: 
        <select multiple size="3" name="idiomas[]">
            <option value="ingles" selected="">Inglés</option>
            <option value="italiano">Italiano</option>
            <option value="frances">Francés</option>
            <option value="aleman">Alemán</option>
            <option value="holandes">Holandés</option>
        </select>

        Currículo: <input type="file" name="curriculo"/>
        </pre>
        <input type="submit">
    </form>
</body>

</html>