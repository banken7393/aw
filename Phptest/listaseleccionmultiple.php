<?php echo '<?xml version="1.0" encoding="UTF-8"?>', "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTDXHTML1.0Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head><title>Generar una lista de opciones de selección multiple</title></head>
    <body>
        <div>
            <?php
//Frutasparamostrarenlalista,conlaforma
//deunamatrizasociativaquedaelcodigo
//delafruta(clavedelamatriz)yelnombredelafruta.
            $frutasdelmercado = array(
                'A' => 'Albaricoques',
                'C' => 'Cerezas',
                'F' => 'Fresas',
                'P' => 'Melocotones',
                '?' => 'Nosabe');
//Frutaspreferidasdelusuario,conlaforma
//deunamatrizquedaelcodigodelasfrutascorrespondientes.
            $frutaspreferidas = array('A', 'F', 'P');
//Advertencia:veremosmasadelantecomorecuperar
//estainformacionenunabasededatos.
            ?>
            <!--creaciondelformulario-->
            <form action="entrada.php" method="POST">
                Frutaspreferidas:<br/>
                <select name="frutas[]" multiplesize="8">
                    <?php
//CodigoPHPquegeneralapartedinamicadelformulario.
//Recorrerlalistaparamostraryrecuperarelcodigo
//yelnombre.
                    foreach ($frutasdelmercado as $codigo => $nombre) {
//Determinarsilalıneadebeestarseleccionada
//-sı,sielcodigofiguraenlalistadelasfrutas
//preferidasdelusuario=>busquedade$codigo
//en$frutaspreferidasconlafuncioninarray
//-sieselcaso,ponerelatributo"selected"en
//laetiqueta"option";sino,noponernada.
                        $seleccion = in_array($codigo, $frutaspreferidas)?'selected="selected"' : '';
//Generarlaetiqueta"option"conlavariable$codigo
//paraelatributo"value",lavariable$seleccion
//paralaindicaciondeseleccionylavariable$nombre
//paraeltextomostradoenlalista.
                        echo"<option value=\"$codigo\"$seleccion>$nombre</option>";
                    }
                    ?>
            </form>
    </body>
</html>

