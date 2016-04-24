<?php echo '<?xml version="1.0" encoding="UTF-8"?>', "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTDXHTML1.0Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head><title>Generar una lista de opciones de selección única</title></head>
    <body>
        <div>
            <?php
//Lista de los idiomas para mostrar en la lista,
//con la forma de una matriz asociativa queda el código
//del idioma(clave de la matriz)y el nombre del idioma.
            $idiomas_disponibles = array(
                'E' => 'Español',
                'F' => 'Francés',
                'I' => 'Italiano');
//C´odigodelidiomadelusuario.
            $idioma = 'E';
            ?>
            <!--creación del formulario-->
            <form action="entrada.php" method="POST">
                Idioma:<br/>
                <select name="idioma">
                    <?php
//Código PHP que genera la parte dinámica del formulario.
//Recorrer la lista para mostrar y recuperar el código
//y el nombre.
                    foreach ($idiomas_disponibles as $código => $nombre) {
//Determinar si la línea debe estar seleccionada
//-sí,si el código es igual al código del idioma
//del usuario
//-si es el caso,poner el atributo "selected" en
//la etiqueta "option" ;si no,no poner nada
                        $selección = ($código == $idioma) ? 'selected="selected"' : '';
//Generar la etiqueta"option"con la variable $código
//la opción"value",la variable $selección
//para la indicación de selección y la variable $nombre
//para el texto mostrado en la lista.
                        echo "<option value=\"$código\"$selección>$nombre</option>";
                    }
                    ?>
                </select>
            </form>
        </div>
    </body>
</html>