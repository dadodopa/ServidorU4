<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="agente.php" method="post">
        <p><label for="nombre">Introduce tu nombre completo: </label><input type="text" id="nombre" name="nombre"></p>
        <p><label for="usuario">Introduce nombre de usuario: </label><input type="text" id="usuario" name="usuario"></p>
        <p><label for="contra">Contraseña: </label><input type="password" id="contra" name="contra"></p>
        <p><label for="edad">Edad: </label><input type="number" id="edad" name="edad"></p>
        <p><label for="fechaancimiento"></label>Fecha de nacimiento: <input type="date" id="fechanacimiento" name="fechanacimiento"></p>
        <p><label for="email">Email: </label><input type="text" id="email" name="email"></p>
        <p><label for="url">URL personal </label><input type="text" id="url" name="url"></p>
        <p><label for="ip">IP del equipo: </label><input type="text" id="ip" name="ip"></p>
        <p><label for="hobbies">Hobbies: </label><br>
            <textarea id="hobbies" name="hobbies"></textarea>
        </p>
        <p><input type="checkbox" id="info" name="info"><label for="info"> Deseas recibir información</label></p>
        <p>Sexo: <br> 
            <input type="radio" name="sexo" value="hombre" id="h"> <label for="h">Hombre</label> 
            <input type="radio" name="sexo" value="mujer" id="m"> <label for="m">Mujer</label> 
        </p>
        <p> <label for="idioma">Elige un idioma:</label><br>
        <select id="idioma" name="idioma" multiple size="5">
            <option value="castellano">Castellano</option>
            <option value="gallego">Gallego</option>
            <option value="ingles">Inglés</option>
            <option value="aleman">Alemán</option>
            <option value="frances">Francés</option>
        </select>
    </p>
    <p><label for="file">Curriculun</label><input type="file" id="file" name="cv"></p>
    <p><button type="submit">Enviar</button></p>
    </form>
</body>
</html>