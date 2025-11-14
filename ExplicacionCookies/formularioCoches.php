<?php
if (count($_POST) != 0) {
    $cadeaErros = "";
    $marMod = htmlspecialchars(trim(strip_tags($_POST["marMod"])), ENT_QUOTES, "ISO-8859-1");
    if ($marMod == "")
        $cadeaErros .= "O campo Marca e modelo non pode estar baleiro. ";

    $nKm = htmlspecialchars(trim(strip_tags($_POST["nKm"])), ENT_QUOTES, "ISO-8859-1");
    if ($nKm == "")
        $cadeaErros .= "O campo Nº km non pode estar baleiro. ";
    else
        if (filter_var($nKm, FILTER_VALIDATE_INT)) {
        if ((int)$nKm <= 0)
            $cadeaErros .= "O Nº km deber ser maior que 0. ";
    } else {
        $cadeaErros .= "O Nº km non é un número enteiro. ";
    }

    $urlFab = htmlspecialchars(trim(strip_tags($_POST["urlFab"])), ENT_QUOTES, "ISO-8859-1");
    if ($urlFab == "")
        $cadeaErros .= "O campo URL do fabricante non pode estar baleiro. ";
    else {
        if (!filter_var($urlFab, FILTER_VALIDATE_URL))
            $cadeaErros .= "A URL do fabricante especificada non é válida.";
    }

    $com = (isset($_POST["com"]))
        ? $_POST["com"]
        : "";

    $eqEx = (isset($_POST["eqEx"]))
        ? $_POST["eqEx"]
        : array();

    if ($cadeaErros == "") {
        setcookie("marcaModelo", $marMod, time() + 3600 * 24 * 30);
        setcookie("numKm", $nKm, time() + 3600 * 24 * 30);
        setcookie("urlFabricante", $urlFab);
        setcookie("combustible", $com);
        for ($i = 0; $i < count($eqEx); $i++)
            setcookie("equipEx[$i]", $eqEx[$i]);
    }
}
?>
<?php
function incForm($marMod, $nKm, $urlFab, $com, $eqEx)
{ ?>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <p>Marca e modelo: <input type="text" name="marMod" value="<?php echo $marMod; ?>" /></p>
        <p>Nº km: <input type="text" name="nKm" value="<?php echo $nKm; ?>" /></p>
        <p>URL do fabricante:<input type="text" name="urlFab" value="<?php echo $urlFab; ?>" /></p>
        <p>Combustible: <input type="radio" name="com" value="Diésel" <?php if ($com == "Diesel") echo "checked" ?> /> Diesel
            <input type="radio" name="com" value="Gasolina" <?php if ($com == "Gasolina") echo "checked" ?> /> Gasolina
            <input type="radio" name="com" value="Eléctrico/Híbrido" <?php if ($com == "Eléctrico/Híbirdo") echo "checked" ?> /> Eléctrico/Híbrido
        </p>
        <p>Equipamento extra:<select name="eqEx[]" size="3" multiple="multiple">
                <option <?php if (in_array("Pintura metalizada", $eqEx)) {
                            echo "selected=\"selected\"";
                        } ?>>Pintura metalizada</option>
                <option <?php if (in_array("Sistema de navegación", $eqEx)) {
                            echo "selected=\"selected\"";
                        } ?>>Sistema de navegación</option>
                <option <?php if (in_array("Reposabrazos central delanteiro", $eqEx)) {
                            echo "selected=\"selected\"";
                        } ?>>Reposabrazos central delanteiro</option>
            </select></p>
        <p><input type="reset" value="Borrar" /> <input type="submit" value="Enviar" /></p>
    </form>
<?php
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title></title>
</head>

<body>
    <?php
    if (count($_POST) == 0)
        incForm("", "", "", "", array());
    else {
        if ($cadeaErros != "") {
            incForm($marMod, $nKm, $urlFab, $com, $eqEx);
            echo "<strong><em>$cadeaErros</em></strong>";
        } else {
            echo "<p>O formulario encheuse correctamente. Os datos recibidos son:</p>";
            echo "<p>Marca e modelo: " . $marMod . "</p>";
            echo "<p>Nº km: " . $nKm . "</p>";
            echo "<p>URL do fabricante: " . $urlFab . "</p>";
            echo "<p>Combustible: " . $com . "</p>";
            echo "<p>Equipamento extra: ";
            $numExtras = count($eqEx);
            for ($i = 0; $i < $numExtras; $i++) {
                echo $eqEx[$i];
                if ($i == ($numExtras - 1))
                    echo ".";
                else
                    echo ", ";
            }
            echo "</p>";
            echo "<pre>";
            print_r($_COOKIE);
            echo "</pre>";
        }
    }

    ?>
</body>

</html>