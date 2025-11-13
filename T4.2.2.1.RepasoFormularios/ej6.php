<?php
function incForm($clicks){?>
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
    <p>Veces enviado: <?php echo $clicks; ?></p>
    <input type="submit" value="Enviar :)"/>
    <input type="hidden" name="clicks" value="<?php echo $clicks; ?>"/>
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
        $clicks = isset($_POST["clicks"]) ? $_POST["clicks"] : 0;
        if (empty($_REQUEST)) {
            incForm($clicks);
        } else {
            $clicks++;
            incForm($clicks);
        }
    ?>
</body>
</html>