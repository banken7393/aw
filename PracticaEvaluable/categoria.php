<?php
$categoria = $_GET['categoria'];

//primero conectamos
$user = "cocinapepinadef";
$password = "cocinapepinadef";
$database = "cocinapepinadef";
mysql_connect('localhost', $user, $password) or die('No pudo conectarse: ' . mysql_error());
@mysql_select_db($database) or die("Unable to select database");
mysql_query("SET NAMES 'utf8'");
//Creamos la consulta
if ($categoria != "Todas") {
    $query = 'SELECT * FROM platos WHERE categoria="';
    $query .= $categoria;
    $query .= '"';
} else {
    $query = "SELECT * FROM platos";
}
//ejecutamos la consulta
$result = mysql_query($query);
$num = mysql_numrows($result);

//cerramos conexxion
mysql_close();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta http-equiv="Content-type" content="text/html" charset="utf-8">
        <title>La cocina pepina</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link href="bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" media="screen">-->
        <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/estiloPrincipal.css" rel="stylesheet" type="text/css" media="screen">
        <script src="jquery.js"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <style>
            .carousel-inner > .item > img,
            .carousel-inner > .item > a > img {
                width: 70%;
                margin: auto;
            }
        </style>
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
                                <li><a href="categoria.php ?categoria=Todas">Todas</a></li>
                                <li class="divider"></li>
                                <li><a href="categoria.php ?categoria=China">China</a></li>
                                <li><a href="categoria.php ?categoria=Española">Española</a></li>
                                <li><a href="categoria.php ?categoria=Francesa">Francesa</a></li>
                                <li><a href="categoria.php ?categoria=Alemana">Alemana</a></li>
                                <li><a href="categoria.php ?categoria=Japonesa">Japonesa</a></li>
                                <li><a href="categoria.php ?categoria=Postres">Postres</a></li>
                                <li><a href="categoria.php ?categoria=Italiana">Italiana</a></li>
                                <li><a href="categoria.php ?categoria=Mexicana">Mexicana</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="Nosotros.html">Nosotros</a>
                        </li>
                        <li>
                            <a href="enviar.php">Enviar Receta</a>
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
        </div>
        <?php
        $i = 0;
        while ($i < $num) {
            
            $img = mysql_result($result, $i, "img");
            $nombre = mysql_result($result, $i, "Nombre");
            $id = mysql_result($result, $i,"ID");
            echo '<a href="receta.php ?ID=';
            echo "$id";
            echo'">';
            echo '<div class="row">
                <div class="col-xs-4">

                    <img src="img/'; echo "$img";echo '"  class="img-responsive"  >
                </div>
                <div class="col-xs-8">
                    <div class="jumbotron">
                        <h1>';
                    echo "$nombre</h1>
                    </div>
                </div>
            </div> </a>";
            
            $i++;
        }
        ?>

    </div>

</body>
</html>
