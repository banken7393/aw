<?php
$errPlato = "";
$errReceta = "";
$errImg = "";
//si no pongo esto no se porque no encuentra plato y salta un error
$_POST['plato'] = $_POST['plato'];
if (isset($_POST["submit"])) {

    // comprobacion plato
    if (!$_POST['plato']) {
        $errPlato = 'Por favor nombre tu plato';
    } else {
        $errPlato = "";
    }

    // comprobacion receta
    if (!$_POST['receta']) {
        $errReceta = 'Porfavor escribenos tu receta';
    } else {
        $errReceta = "";
    }

    //Recogemos el archivo enviado por el formulario
    $archivo = $_FILES['imagen']['name'];

    if (!(isset($archivo) && $archivo != "")) {
        $errImg = 'por favor sube una foto';
    } else {
        $errImg = "";
    }



// si no hay errores envia el formulario
    if (!$errPlato && !$errReceta && !$errImg) {
        //Recogemos datos enviados por el formulario
        $plato = $_POST['plato'];
        $receta = $_POST['receta'];
        $categoria = $_POST['categoria'];

        //Obtenemos algunos datos necesarios sobre el archivo
        $tipo = $_FILES['imagen']['type'];
        $tamano = $_FILES['imagen']['size'];
        $temp = $_FILES['imagen']['tmp_name'];
        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
        } else {
            //Si la imagen es correcta en tamaño y tipo
            //Se intenta subir al servidor
            if (move_uploaded_file($temp, 'img/' . $archivo)) {
                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                chmod('img/' . $archivo, 0777);
                //subimos los datos a la bbdd
                //primero conectamos
                $user = "cocinapepinadef";
                $password = "cocinapepinadef";
                $database = "cocinapepinadef";
                mysql_connect('localhost', $user, $password) or die('No pudo conectarse: ' . mysql_error());
                @mysql_select_db($database) or die("Unable to select database");
                //Creamos la consulta
                $query = "INSERT INTO platos(categoria, img, Nombre, receta) VALUES('$categoria','$archivo','$plato','$receta')";
                //ejecutamos la consulta
                mysql_query($query);
                //cerramos conexxion
                mysql_close();
                header('Location: success.php');
            } else {
                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
            }
        }
    }
}
?>




<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>La cocina pepina</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link href="bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" media="screen">-->
        <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/estiloPrincipal.css" rel="stylesheet" type="text/css" media="screen">
        <script src="jquery.js"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

    </head>
    <!Barra de Navegacion--------------------------------------------------------------------------------------------------------------------->
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="http://localhost/PracticaEvaluable/index.php#" class="navbar-brand">La cocina pepina</a>
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../default/">Todas</a></li>
                                <li class="divider"></li>
                                <li><a href="#">China</a></li>
                                <li><a href="#">Española</a></li>
                                <li><a href="#">Francesa</a></li>
                                <li><a href="#">Alemana</a></li>
                                <li><a href="#">Japonesa</a></li>
                                <li><a href="#">Postres</a></li>
                                <li><a href="#">Italiana</a></li>
                                <li><a href="#">Mexicana</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Nosotros</a>
                        </li>
                        <li>
                            <a href="enviar.html">Enviar Receta</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">United <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="download">
                                <li><a href="http://jsfiddle.net/bootswatch/cvLkpsx0/">Open Sandbox</a></li>
                                <li class="divider"></li>
                                <li><a href="./bootstrap.min.css">bootstrap.min.css</a></li>
                                <li><a href="./bootstrap.css">bootstrap.css</a></li>
                                <li class="divider"></li>
                                <li><a href="./variables.less">variables.less</a></li>
                                <li><a href="./bootswatch.less">bootswatch.less</a></li>
                                <li class="divider"></li>
                                <li><a href="./_variables.scss">_variables.scss</a></li>
                                <li><a href="./_bootswatch.scss">_bootswatch.scss</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <!cuerpo---------------------------------------------------------------------------------------------------------------------------------->
    <div class="container">
        <div class="jumbotron">
            <h1>La Cocina Pepina</h1>
            <p>Tu página de recetas</p> 



            <form role="form" action="enviar.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="plato">plato</label>
                    <input type="text" class="form-control" id="plato" name="plato" placeholder="plato" value="<?php echo htmlspecialchars($_POST['plato']); ?>">
                    <?php echo "<p class='text-danger'>$errPlato</p>"; ?>
                </div>
                <div class="form-group">
                    <label for="receta">receta</label>
                    <textarea class="form-control" rows="10" id="receta" name="receta" placeholder="Escribe aqui la receta" id="receta" value="<?php echo htmlspecialchars($_POST['receta']); ?>" ></textarea>
                    <?php echo "<p class='text-danger'>$errReceta</p>"; ?>
                </div>
                <div class="form-group">
                    <label for="categoria">categoria</label>
                    <select id="categoria" class="form-control" name="categoria" >

                        <option>China</option>
                        <option>Española</option>
                        <option>Francesa</option>
                        <option>Alemana</option>
                        <option>Japonesa</option>
                        <option>Postres</option>
                        <option>Italiana</option>
                        <option>Mexicana</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="imagen">subir imagen</label>
                    <input type="file" id="imagen" name="imagen">
                    <?php echo "<p class='text-danger'>$errImg</p>"; ?>
                </div>
                <button type="submit" class="btn btn-default" id="submit" name="submit">Enviar</button>
            </form>
        </div>
    </div>
</body>
</html>