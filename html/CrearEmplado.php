<?php 
session_start();
include('../proceso/Funciones.php');

$conexion=new mysqli("127.0.0.1","root","","inventario");
$sql="SELECT * from roles";
$result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable
 
if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobit .=" <option value='".$row['Id_Roles']."'>".$row['Tipo_Rol']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
   echo '<script language="javascript">';
echo 'alert("No hay resultados para los roles en la base de datos")';
echo '</script>';
}
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
</head>
<body>
  <div class="container-fluid">
<div class="row" >	<!--Cabecera menu-->
  <div class=".col-xs-12	.col-sm-12	.col-md-12	.col-lg-12" ><header id="header">
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
       <form  method="get" accept-charset="utf-8" class="texto" > 
        Usuario<input type="text"id="usuario" name="Usuario" class="form-control entradas" required>
        Contraseña<input type="text" id="password" name="Pass" class="form-control entradas">
 Rol<select class="form-control entradas" name="Rol" >

  <?php echo $combobit; ?>
        </select><br>
        <input type="submit" id="registrarNuevo" name="Guardar"  value="Guardar" class="btn btn-primary" id="Guardar" onclick="formReset()">
         <input type="reset" name="Resetear" value="Resetear " class="btn btn-danger">
       <a href="MostrarUs.php"> <button type="button" class="btn btn-warning" name="Mostrar" id="Mostrar" value="Mostrar" >Mostrar</button></a>
        </form>
        </div>
      </div> 
    </div>
   <?php 
if (isset($_GET["Guardar"])) {
  $Usuario=$_GET["Usuario"];
$Pass=$_GET["Pass"];
$id_usuario=" ";
 $Privilegios=$_GET["Rol"];
 agregar($id_usuario,$Usuario,$Pass,$Privilegios);
 
}

?>

</div>
</body>
</html>



<script type="text/javascript">
  $(document).ready(function(){
    $('#registrarNuevo').click(function(){

      

      cadena="apellido=" + $('#apellido').val() +
          "&usuario=" + $('#usuario').val() + 
          "&password=" + $('#password').val();

          $.ajax({
            type:"POST",
            url:"php/registro.php",
            data:cadena,
            success:function(r){

              else if(r==1){
                $('#frmRegistro')[0].reset();
                alertify.success("Agregado con exito");
              }else{
                alertify.error("Fallo al agregar");
              }
            }
          });
    });
  });
</script>
<?php
               if (isset($_SESSION["usuario"])) {
  if ($_SESSION["usuario"]["nivel"]=='Administrador') {
    print "<br><br><label style='color:white;'>Bienvenido ". $_SESSION['usuario']["nombre"]."(".$_SESSION["usuario"]['nivel'].").</label>";
    print "<a href='../proceso/Acceso.php?cerrar=true'>Cerrar Sesion</a>";
    }
  else{
    header('Location:../login.php');
  }
}else{
      header('Location:../login.php');
}
      ?>
      <br><a href="../html/menu.php?v=salir">Salir</a>