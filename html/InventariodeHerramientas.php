<?php 
session_start();
include('../proceso/Funciones.php');
$conexion=new mysqli("127.0.0.1","root","","inventario");


?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="widh=device-width, initial-scale=1, maximun=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../estilo/estiloNuevoUsuario.css">
    <script src="../jquery/jquery-3.3.1.min.js"></script>
  <script src="../bootstrap/js/bootstrap.js"></script>
 
  </script>
</head>
<body>

  <div class="container-fluid">
<div class="row" >  <!--Cabecera menu-->
  <div class=".col-xs-12  .col-sm-12  .col-md-12  .col-lg-12" ><header id="header">
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <img src="../imagenes/logo.png" class="logo" >
      <a class="navbar-brand" href="#"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="menu.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">More <span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="EnviarHerramientas.php">Agregar Herramientas</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>

        </ul>
      </li>
      <li><a href="#">Reporte</a></li>
      <li><a href="#">Registro</a></li>
     
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="menu.php?v=salir"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul></div></nav></header></div>
 </div>
  <div class="row">
  <div class=".col-xs-12  .col-sm-12  .col-md-12  .col-lg-12 ">
   
    <center>
       <form action="#" method="get" name="frmUsuario" class="texto2">
    ID<input type="text" name="txtId"  class="form-control entradas2 "><br>
   <input type="submit" name="btn1">
  </form><br>
       <table class="table table-hover" style="background-color: #1A6697">
      <thead>
                  <tr  >
                      <th scope="col">Id Herramienta</th>
                      <th scope="col">Id Tipo</th>
                      <th scope="col">Nombre herramienta</th>
                      <th scope="col">Marca</th> <th scope="col">Modelo</th> <th scope="col">Estado</th> <th scope="col">Cantidad</th>
                       <th scope="col">Disponibilidad</th>
                                         
                    </tr>
                  </thead>
<tbody>                <?php if (isset($_GET['btn1'])) {
  $txtId=$_GET['txtId'];
                        ?>
 
                    <?php
                     
                    $sql1 = "SELECT * FROM  herramientas where Id_Herramienta like '%$txtId%' or Id_Tipo like '%$txtId%' or Nombre_Herramientas like '%$txtId%' or Marca like '%$txtId%' or Estado like  '%$txtId%' or Cantidad like '%$txtId%' or Disponibilidad like '%$txtId%' or Modelo like  '%$txtId%'  ";
                    $result2 = $conexion->query($sql1); 
                    while ($mostrar = mysqli_fetch_array($result2)) {
                      ?>

                     <tr >
                      <td scope="col" class="success"><?php echo $mostrar['Id_Herramienta'] ?></td>
                      <td scope="col" class="success"><?php echo $mostrar['Id_Tipo'] ?></td>
                      <td scope="col" class="success"><?php echo $mostrar['Nombre_Herramientas'] ?></td>
                      <td scope="col" class="success"><?php echo $mostrar['Marca'] ?></td>
                      <td scope="col" class="success"><?php echo $mostrar['Modelo'] ?></td>
                      <td scope="col" class="success"><?php echo $mostrar['Estado'] ?></td>
                      <td scope="col" class="success"><?php echo $mostrar['Cantidad'] ?></td>
                      <td scope="col" class="success"><?php echo $mostrar['Disponibilidad'] ?></td>
                      
                      
                     
                    </tr>
                                <?php
                    }
                  ?><?php  }?>
                  </tbody>
                   </table>
    </center>           
  </div>
</div>

</div>
<?php

if (isset($_GET['btn1'])) {
  $Id_Herramienta=$_GET['txtId'];
}
 ?>
</body>
</html>
