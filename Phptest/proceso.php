<!DOCTYPE html PUBLIC"-//W3C//DTDXHTML1.0Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"xml:lang="es"lang="es">
    <head><title>proceso</title></head>
    <body>
        <div>
            <?php
//Visualizaciondelosdatoscontenidos
//enlasmatrices$POSTy$REQUEST.
            echo '$_POST[\'nombre\'] -> ', $_POST['nombre'], ' <br\>';
            echo '$_REQUEST[\'nombre\'] -> ', $_REQUEST['nombre'], ' <br\>';
            ?>
        </div>
    </body>
</html>