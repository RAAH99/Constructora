<?php 
session_start();
include('../proceso/Funciones.php');


?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="widh=device-width, initial-scale=1, maximun=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../estilo/Prestamo.css">
    <script src="../jquery/jquery-3.3.1.min.js"></script>
  <script src="../bootstrap/js/bootstrap.js"></script>
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
      <form class="navbar-form navbar-left" action="/action_page.php">
      
    </form>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    
      <li><a href="../proceso/Acceso.php?cerrar=true"><span class="glyphicon glyphicon-log-in"></span> Loug out</a></li>
    </ul></div></nav></header></div>
 </div>
    <div class="row ">
      <div class=".col-xs-12  .col-sm-12  .col-md-12  .col-lg-12">
        <div class=" contenedor">
       <form  method="get" accept-charset="utf-8" class="texto"> 
        Nomero de Tiquet<input type="text" name="tiquet"  class="form-control entradas" required>
       
       <center><input type="submit" name="Buscar" value="Buscar" class="btn btn-primary"></center>
        


</div>
</body>
</html>
