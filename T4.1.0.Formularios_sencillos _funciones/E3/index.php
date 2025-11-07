<?php
function generarPassNum($min,$max) {
    $finalString=[];
    $maxPassword = rand($min,$max);
    for ($i=0; $i < $maxPassword; $i++) { 
        $charPassword = rand(0,9);
        $finalString .= $charPassword;
    }
    return $finalString;
}
?>

