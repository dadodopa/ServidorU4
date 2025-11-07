<?php
if (isset($_POST["submit"])) {
    if (!empty($_POST["list"])) {
        switch ($_POST["list"]) {
            case 'A':
                echo "<h1>Ips de tipo A</h1>";
                echo "<table border=\"1px\">";
                for ($i = 0; $i < 10; $i++) {
                    echo "<tr>";
                    echo "<td>10." . rand(0, 255) . "." . rand(0, 255) . "." . rand(0, 255) . "</td>";
                    echo "</tr>";
                }
                echo "<table>";
                break;
            case 'B':
                echo "<h1>Ips de tipo B</h1>";
                echo "<table border=\"1px\">";
                for ($i = 0; $i < 10; $i++) {
                    echo "<tr>";
                    echo "<td>172." . rand(16, 31) . "." . rand(0, 255) . "." . rand(0, 255) . "</td>";
                    echo "</tr>";
                }
                echo "<table>";
                break;
            case 'C':
                echo "<h1>Ips de tipo C</h1>";
                echo "<table border=\"1px\">";
                for ($i = 0; $i < 10; $i++) {
                    echo "<tr>";
                    echo "<td>192.168." . rand(0, 255) . "." . rand(0, 255) . "</td>";
                    echo "</tr>";
                }
                echo "<table>";
                break;
            default:
                echo "<h1>Error vuelve a intertarlo</h1>";
                break;
        }
    }
}
