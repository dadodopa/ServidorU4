<?php
if(count($_COOKIE)>0){
    print_r($_COOKIE);
} else {
    echo "No hay ninguna cookie almacenada.";
}


/*
if(count($_POST)!=0){
    //recoger datos
    //guardar cookies
} else{
    if(count($_COOKIE)==0){
    //Formulario vacío
    }else{
    //recuperar las cookies
    //formulario con datos
    }
}
*/