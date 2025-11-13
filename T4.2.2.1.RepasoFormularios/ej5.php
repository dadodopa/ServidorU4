<?php
function incForm(){
?>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        Introduce tu nota: <input type="text" name="nota"/>
        <input type="submit" value="Enviar"/>
    </form>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (empty($_REQUEST)) {
            incForm();
        } else {
            $num = (int)$_POST["nota"];
            $nota = "";
            switch (true) {
                case ($num < 5): $nota = "SUSPENSO";
                break;
                case ($num > 6 && $num < 9): $nota = "NOTABLE";
                break;
                case ($num > 8 && $num < 11): $nota = "SOBRESALIENTE";
                break;
                default: $nota = "SUFICIENTE";
            }
            echo "<p>Tu nota es: ".$nota."</p>";
        }
    ?>
</body>
</html>