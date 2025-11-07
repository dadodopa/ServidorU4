<?php
if (isset($_POST["esPalindromo"])) {
    if (!empty($_POST["esPalindromo"])) {
        $esPalindromo = $_POST["esPalindromo"];
        $stringReverse = strrev($esPalindromo);
        if (strtoupper($esPalindromo) == strtoupper($stringReverse)) {
            echo "<h1>La palabra es Palindromo</h1>";
        } else echo "<h1> La palabra no es Palindomo</h1>";
    }
}
