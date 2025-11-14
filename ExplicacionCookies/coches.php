<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
        <title></title>
    </head>
    <body> 
<?php
    $marMod=(isset($_COOKIE["marcaModelo"]))
    ?$_COOKIE["marcaModelo"]
    :"";
    
    $nKm=(isset($_COOKIE["numKm"]))
    ?$_COOKIE["numKm"]
    :"";
    
    $url=(isset($_COOKIE["urlFabricante"]))
    ?$_COOKIE["urlFabricante"]
    :"";
    
    $com=(isset($_COOKIE["combustible"]))
    ?$_COOKIE["urlFabricante"]
    :"";  
    
    $eqEx=(isset($_COOKIE["equipEx"]))
    ? $_COOKIE["equipEx"]
    : array();
    
    echo "<p>Os valores contidos na cookie son:</p>";        
    echo "<p>Marca e modelo: ".$marMod."</p>";
    echo "<p>Nº km: ".$nKm."</p>";    
    echo "<p>URL do fabricante: ".$url."</p>";
    echo "<p>Combustible: ".$com."</p>";
    echo "<p>Equipamento extra: ";
    for ($i=0; $i<count($eqEx); $i++){
        echo $eqEx[$i];
        if ($i==(count($eqEx)-1))
            echo ".";
        else
            echo ", ";
    }
    echo "</p>";    
?>
    </body>
</html>