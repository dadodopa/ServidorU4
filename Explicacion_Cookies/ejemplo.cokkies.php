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