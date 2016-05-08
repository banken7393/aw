<?php echo '<?xml version="1.0" encoding="UTF-8"?>', "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTDXHTML1.0Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head><title>Generar una lista de opciones de selección única</title></head>
    <body>
<div>
<?php
//Inclusiondelarchivoquecontieneladefinicion
//delafuncion'mostrarmatriz'.
require('../include/funciones.inc.php');
//Conexion(conselecciondelabasededatos).
$db=mysqliconnect('localhost','eniweb','web','eni');
if(!$db){
exit('Falloenlaconexion.');
}
//Ejecuciondeunaconsulta
$sql='SELECT id,nombre,preciosiniva FROM coleccion LIMIT4';
$consulta=mysqliquery($db,$sql);
//Primerfetchconmysqlifetchrow.
$fila=mysqlifetchrow($consulta);
mostrarmatriz($fila,'mysql fetch row');
//Segundofetchconmysqlifetchassoc.
$fila=mysqlifetchassoc($consulta);
mostrarmatriz($fila,'mysql fetch assoc');
//Tercerfetchconmysqlifetcharray:
//−>sinsegundoparametro=MYSQLIBOTH
$fila=mysqlifetcharray($consulta);
mostrarmatriz($fila,'mysql fetch array');
//Cuartofetchconmysqlifetchobject.
$fila=mysqlifetchobject($consulta);
echo"<p/><b>mysqlfetchobject</b><br/>";
echo"\$fila−>id=$fila−>id<br/>";
echo"\$fila−>nombre=$fila−>nombre<br/>";
echo"\$fila−>preciosiniva=$fila−>preciosiniva<br/>";
//Quintofetchdenuevoconmysqlifetchrow:
//−>enprincipio,yanohayfilas.
$fila=mysqlifetchrow($consulta);
if($fila===NULL){
echo'<p/><b>Quintofetch:nadamas</b>';
}
//Desconexion.
$ok=mysqliclose($db);
?>
</div>
</body>
</html>
