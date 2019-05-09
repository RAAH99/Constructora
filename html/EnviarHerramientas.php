<?php 
session_start();
include('../proceso/Funciones.php');
$conexion=new mysqli("127.0.0.1","root","","inventario");
$sql="SELECT * from categoria";
$result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable
 
if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobit .=" <option value='".$row['Id_Tipo']."'>".$row['Tipo']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
   echo '<script language="javascript">';
echo 'alert("No hay resultados para los Tipos de herramientas en la base de datos")';
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
  <script type="text/javascript">
    function cargar(id,Usuario,Pasword,Privilegios) {
      document.frmUsuario.txtId.value=id;
      document.frmUsuario.txtUsuario.value = Usuario;
      document.frmUsuario.txtPasword.value = Pasword;
      document.frmUsuario.txtPrivilegios.value = Privilegios;
      
    }
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
      <form class="navbar-form navbar-left" action="/action_page.php">
     
    </form>
    </ul>

    <ul class="nav navbar-nav navbar-right">
   
      <li><a href="../proceso/Acceso.php?cerrar=true"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
    </ul></div></nav></header></div>
 </div>
   <div class="row">
  <div class=".col-xs-12  .col-sm-12  .col-md-12  .col-lg-12 ">
   
    <center>
       <form action="#" method="get" name="frmUsuario" class="texto2">
   
    <select class="form-control entradas2" name="Idtipo" id="Idtipo" >
  <?php echo $combobit; ?>
        </select>
    Nombre Herramienta <input type="text" name="txtHerramienta" id="txtHerramienta" class="form-control entradas2" required><br>
    Marca<input type="text" name="txtMarca" id="txtMarca" class="form-control entradas2" required>
    Modelo<input type="text" name="txtModelo" id="txtModelo" class="form-control entradas2" required><br>
    <select name="estado" id="estado" class="form-control entradas2">
      <option value="Nueva">Nueva</option>
       <option value="Defectuosa">Defectuosa</option>
    </select>
    Cantidad<input type="text" name="txtCantidad" id="txtCantidad" class="form-control entradas2" required><br>
    <select name="dispo" id="dispo" class="form-control entradas2">
      <option value="Disponible">Disponible</option>
       <option value="No Disponible">No Disponible</option>
    </select>
   <br>
   <button type="submit" class="btn btn-primary" name="btnAgregar">Agregar</button></a>
           
          &nbsp;  <a href="AgregarHerramientas.php"> <button type="button" class="btn btn-toolbar">Mostrar</button></a> <button type="reset" class="btn btn-danger">Reset</button>
  </form><br>
    
  </div>
</div>

</div>
<?php 

if (isset($_GET['btnAgregar'])) {
  $Id_Herramienta=" ";
  $Id_Tipo=$_GET['Idtipo'];
  $Nombre=$_GET['txtHerramienta'];
  $Marca=$_GET['txtMarca'];
  $Modelo=$_GET['txtModelo'];
  $Estado=$_GET['estado'];
  $Cantidad=$_GET['txtCantidad'];
  $Disponibilidad=$_GET['dispo'];
  agregarHerramienta($Id_Herramienta,$Id_Tipo,$Nombre,$Marca,$Modelo,$Estado,$Cantidad,$Disponibilidad);
 }
?>
</body>
</html>
<script type="text/javascript">$('#nombre').ht(' <?php echo $mostrar['nombre'] ?>');</script>
