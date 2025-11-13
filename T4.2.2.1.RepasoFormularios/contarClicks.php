<?php
    $contador = isset($_POST['contador']) ? (int)$_POST['contador'] : 0;
    /*
    if (isset)($_POST['contador']){
        $contador = (int)$_POST['contador'];
    }else {
        $contador = 0;
    }
    */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $contador++;
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
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <button type="submit">Click me!</button>
        <input type="hidden" name="contador" value="<?php echo $contador ?>" /> 
        <p>Click counter: <?php echo $contador ?></p>
    </form>
</body>
</html>