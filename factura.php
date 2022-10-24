<?php

//Asigno el Input a variables:
//$fecha = $_POST["fecha"]; Cambié la presentación de la fecha:
$fecha = date("d-m-Y", strtotime($_POST["fecha"])); 
//Pequeña validación del input, se quitan espacios en blanco y se modifican carácteres de HTML para evitar XSS (trim(htmlspecialchars($_POST[""]))).
$nombre = trim(htmlspecialchars($_POST["nombre"])); 
$provincia = trim(htmlspecialchars($_POST["provincia"]));
$nombre = trim(htmlspecialchars($_POST["nombre"])); 

//Producto en la primera fila:
$codigoUno = trim(htmlspecialchars($_POST["codigoUno"])); 
$descripcionUno = trim(htmlspecialchars($_POST["descripcionUno"])); 
//Validación especial para cantidad y precio para evitar errores, ya que son sujetos de operaciones.
$cantidadUno = floatval(trim(htmlspecialchars($_POST["cantidadUno"]))); 
$precioUno = floatval(trim(htmlspecialchars($_POST["precioUno"]))); 

//Producto en la segunda fila:
$codigoDos = trim(htmlspecialchars($_POST["codigoDos"])); 
$descripcionDos = trim(htmlspecialchars($_POST["descripcionDos"])); 
//Validación especial para cantidad y precio para evitar errores, ya que son sujetos de operaciones.
$cantidadDos = floatval(trim(htmlspecialchars($_POST["cantidadDos"]))); 
$precioDos = floatval(trim(htmlspecialchars($_POST["precioDos"]))); 

//Operaciones entre variables:
$totalUno = $cantidadUno * $precioUno;
$totalDos = $cantidadDos * $precioDos;
$neto = $totalUno + $totalDos;
$impuestos = $neto * ($provincia / 100);
$total = $neto + $impuestos;

//Código que utilicé para ir validando el proceso:
//echo "$fecha $nombre $provincia $codigoUno $descripcionUno $cantidadUno $precioUno $codigoDos $descripcionDos $cantidadDos $precioDos <br>";
//echo "$totalUno $totalDos $neto $impuestos $total";
?>

<!--HTML de la Factura final: -->
<!doctype html>
<html lang="en">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>CDS Final</title>
  </head>
  <body class="container mt-3" style="text-align: center;">
    <h1>Factura Detallada</h1>    
    <!-- Optional JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container">
      <form action="factura.php" method="post">
        <table class="table table-striped table-hover table-dark">
            <tr>
                <td><h4>Fecha (d-m-a): </h4></td>
                <td><?php echo "$fecha"; ?></td>
                <td colspan="3"></td>
            </tr>              
            <tr>
                <td><h4>Nombre: </h4></td>
                <td><?php echo "$nombre"; ?></td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td><h4>Impuesto: </h4></td>
                <td><?php echo "$provincia %"; ?></td>
                <td colspan="3"></td>
            </tr>  
            <tr>
                <td colspan="5"><h4>Detalle</h4></td>
            </tr>        
            <tr>
                <td><h4>Código</h4></td>
                <td><h4>Descripción</h4></td>
                <td><h4>Cantidad</h4></td>
                <td><h4>Precio</h4></td>
                <td><h4>Total</h4></td>
            </tr>
            <tr>            
                <td><?php echo "$codigoUno"; ?></td>
                <td><?php echo "$descripcionUno"; ?></td>
                <td><?php echo "$cantidadUno"; ?></td>
                <td><?php echo "$precioUno"; ?></td>
                <td><?php echo "$totalUno"; ?></td>
            </tr>
            <tr>            
                <td><?php echo "$codigoDos"; ?></td>
                <td><?php echo "$descripcionDos"; ?></td>
                <td><?php echo "$cantidadDos"; ?></td>
                <td><?php echo "$precioDos"; ?></td>
                <td><?php echo "$totalDos"; ?></td>
            </tr>
            <tr>
                <td colspan="3"></td>  
                <td><h4>Neto</h4></td>    
                <td><?php echo "$neto"; ?></td>      
            </tr>
            <tr>
                <td colspan="3"></td>  
                <td><h4>Impuestos</h4></td>    
                <td><?php echo "$impuestos"; ?></td>      
            </tr>
            <tr>
                <td colspan="3"></td>  
                <td><h4>Total</h4></td>    
                <td><?php echo "$total"; ?></td>      
            </tr>
            <tr>
                <td colspan="5"><a href="index.html" class="link-light" style="text-decoration: none"><h4>Volver</h4></a></td>
            </tr>
        </table>
      </form>
    </div>    
  </body>
</html>