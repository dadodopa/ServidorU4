<?php 
//Consultar cookies:
function consultarCookies(){
    if(isset($_POST['enlace'])){
        if(!empty($_COOKIE)){
            $cookies = $_COOKIE;
            foreach($cookies as $cookie){
                echo $cookie;
            }
        } else {
            echo "No hay cookies almacenadas.";
        }
    }
}