<?php
session_start();
$_SESSION["nombre"]="Daniel";
//unset($_SESSION["nombre"]);//Pedemos eliminar un valor de la session
echo "<pre>";
print_r($_SESSION); 
echo "Identificador ". session_id();
echo "Estado 1des - 2hab: ". session_status();
echo "</pre>";
session_reset();//Para vaciar la sesion
session_destroy();//Para destruir la session
echo "<pre>";
print_r($_SESSION);
echo "Identificador ". session_id();
echo "Estado 1des - 2hab: ". session_status();
echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
    </head>
    <body>
        <h1>Registro simple</h1>
        <form action="" method="post">
            <p>
                <label for="fullName">Nombre completo: </label>
                <input id="fullName" type="text" />
            </p>
            <p>
                <label for="userName">Nombre de usuario: </label>
                <input id="userName" type="text" />
            </p>
            <p>
                <label for="password">Contraseña:</label>
                <input id="password" type="password" />
            </p>
            <p>
                <label for="age">Edad:</label>
                <input id="age" type="number" />
            </p>
            <p>
                <label for="birthday">Dia de nacimiento:</label>
                <input id="birthday" type="date" />
            </p>
            <p>
                <label for="email">Correo electrónico:</label>
                <input id="email" type="text" />
            </p>
            <p>
                <label for="personalUrl">URL personal:</label>
                <input id="personalUrl" type="text" />
            </p>
            <p>
                <label for="pcIP">Ip del equipo:</label>
                <input id="pcIP" type="text" />
            </p>
            <p>
                <label for="hobbies">Hobbies:</label><br>
                <textarea name="hobbies" id="hobbies"></textarea>
            </p>
            <p>
                <label for="acceptInfo">Recibir información</label>
                <input type="checkbox" name="acceptInfo" id="acceptInfo">
            </p>
            <p>
                <label for="sex">Sexo:</label>
                <label for="h"><input id="h" value="male" name="sex" type="radio">Hombre</label>
                <label for="m"><input id="m" value="female" name="sex" type="radio">Mujer</label>
            </p>
            <p>
                <label for="languages">Idiomas</label>
                <select name="languages" id="languages">
                    <option value="spanish">Español</option>
                    <option value="german">Aleman</option>
                    <option value="danish">Danés</option>
                    <option value="english">Inglés</option>
                    <option value="catalonian">Catalán</option>
                    <option value="esperanto">Esperanto</option>
                </select>
            </p>
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>
