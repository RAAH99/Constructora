<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="widh=device-width, initial-scale=1, maximun=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../estilo/principal.css">
	
	 <script src="../jquery/jquery-3.3.1.min.js"></script>
  <script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body>
	<div class="row" >	<!--Cabecera menu-->
  <div class=".col-xs-12	.col-sm-12	.col-md-12	.col-lg-12" ><header id="header">
  	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <img src="../imagenes/logo.png" class="logo" >
      <a class="navbar-brand" href="#"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../html/menu.php">Home</a></li>
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
      <li><a href="CrearEmplado.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="../proceso/Acceso.php?cerrar=true"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
    </ul>
  </div>
</nav>
  </header></div>
</div>
<div class="container-fluid contenedor " ><!---->
  <div class="row">
    <div class="col-sm-2" ><p class="texto">
      <img src="../imagenes/Prestamo.jpg" class="opciones" ><br>Prestamo de herramientas</p>
      <p class="texto"> <img src="../imagenes/entrega.png" class="opciones" ><br>Devolucion de herramientas</p>
      <p class="texto"><a href="Ingresoherramientas.php"> <img src="../imagenes/Inventario.png" class="opciones2" ><br>Inventario de herramientas</p>
     
    </div>
    <div class="col-sm-10 contenido" >
    	<section > Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</section>
     
    </div>
  </div>
</div>
<div class="container-fluid">	
<div class="row">
<div class=".col-xs-12	.col-sm-12	.col-md-12	.col-lg-12" ><footer>
	<p >ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
</footer></div>
</div>
</div>

<?php 
if (isset($_SESSION["usuario"])) {
  if ($_SESSION["usuario"]["nivel"]=='Empleado') {
    print "Bienvenido".$_SESSION["usuario"]["nombre"]."(".$_SESSION["usuario"]["nivel"].").";
    print "<a href='../proceso/Acceso.php?cerrar=true'>Cerrar Sesion</a>";
  }else{
    header("Location:login.php");
  }
}else{
  header("Location:login.php");
}
?>
      <br><a href="menu.php?v=salir">Salir</a>
</body>
</html>