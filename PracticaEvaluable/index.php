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
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indices-->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- imagenes y php -->
            <?php
            //primero conectamos
            $user = "cocinapepinadef";
            $password = "cocinapepinadef";
            $database = "cocinapepinadef";
            mysql_connect('localhost', $user, $password) or die('No pudo conectarse: ' . mysql_error());
            @mysql_select_db($database) or die("Unable to select database");
            //Creamos la consulta
            $query = "SELECT * FROM platos ORDER BY ID DESC LIMIT 3";
            //ejecutamos la consulta
            $result = mysql_query($query);

            //almacenamos los resultados
            $img1 = mysql_result($result, 0, "img");
            $img2 = mysql_result($result, 1, "img");
            $img3 = mysql_result($result, 2, "img");

            $nombre1 = mysql_result($result, 0, "Nombre");
            $nombre2 = mysql_result($result, 1, "Nombre");
            $nombre3 = mysql_result($result, 2, "Nombre");

            $id1 = mysql_result($result, 0, "ID");
            $id2 = mysql_result($result, 1, "ID");
            $id3 = mysql_result($result, 2, "ID");
            //cerramos conexxion
            mysql_close();
            ?>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <a href="receta.php ?ID=<?php echo $id1; ?>">
                    <img src="img/<?php echo $img1; ?>" alt="<?php echo $nombre1; ?>" width="460" height="345">
                    <div class="carousel-caption">
                    <h3><?php echo $nombre1; ?></h3>
                    </div>
                    </a>
                </div>

                <div class="item">
                    <a href="receta.php ?ID=<?php echo $id2; ?>">
                    <img src="img/<?php echo $img2; ?>" alt="<?php echo $nombre2; ?>"width="460" height="345">
                    <div class="carousel-caption">
                    <h3><?php echo $nombre2; ?></h3>
                    </div>
                    </a>
                </div>

                <div class="item">
                    <a href="receta.php ?ID=<?php echo $id3; ?>">
                    <img src="img/<?php echo $img3; ?>" alt="<?php echo $nombre1; ?>"width="460" height="345">
                    <div class="carousel-caption">
                    <h3><?php echo $nombre3; ?></h3>
                    </div>
                    </a>
                </div>


            </div>

            <!-- controles -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</body>
</html>
