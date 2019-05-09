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
    ID<input type="text" name="txtId" id="txtId"  class="form-control entradas2 " required readonly="true"><br>
    Usuario <input type="text" name="txtUsuario" id="txtUsuario" class="form-control entradas2" required><br>
    Pasword<input type="text" name="txtPasword" id="txtPasword" class="form-control entradas2" required><br>
   Rol<select class="form-control entradas2" name="Rol" id="Rol" >

  <?php echo $combobit; ?>
        </select><br>
   <a href="CrearEmplado.php"><button type="button" class="btn btn-primary">Nuevo Usuario</button></a>
          <input type="submit" name="btnModificar" value="Modificar" class="btn btn-primary" onclick="formReset()">
            
  </form><br>
     <table class="table table-hover" style="background-color: #1A6697">
      <thead>
                  <tr  >
                      <th scope="col">Id</th>
                      <th scope="col">Usuario</th>
                      <th scope="col">Password</th>
                      <th scope="col">Privilegios</th>
                       <th scope="col" colspan="2" >Acciones</th>                  
                    </tr>
                  </thead>
<tbody>
                    <?php

                    $sql1 = "SELECT * FROM usuario";
                    $result2 = $conexion->query($sql1); 
                    while ($mostrar = mysqli_fetch_array($result2)) {
                      ?>

                     <tr >
                      <td scope="col" class="success"><?php echo $mostrar['Id_Usuario'] ?></td>
                      <td scope="col" class="success"><?php echo $mostrar['Usuario'] ?></td>
                      <td scope="col" class="success"><?php echo $mostrar['Pasword'] ?></td>
                      <td scope="col" class="success"><?php echo $mostrar['Privilegios'] ?></td>
                      
                      <td class="success"><button name="modificar" class="btn btn-success btn-sm" value="ver" onclick="$('#txtPasword').val(<?php echo $mostrar['Pasword'] ?>);$('#txtId').val('<?php echo $mostrar['Id_Usuario'] ?>');$('#txtUsuario').val('<?php echo $mostrar['Usuario'] ?>');">Ver </button><a href="../proceso/Funciones.php?no=<?php echo $mostrar['Id_Usuario'] ?> "> &nbsp;<input type="submit" name="eliminar" class="btn btn-danger btn-sm" value="Eliminar"></a></td>
                     
                    </tr>
                                <?php
                    }
                  ?>
                  </tbody>
                   </table>
    </center>
  </div>
</div>

</div>
<?php 
if (isset($_GET['btnModificar'])) {
  $Usuario=$_GET["txtUsuario"];
$Pass=$_GET["txtPasword"];
$id_usuario=$_GET["txtId"];
 $Privilegios=$_GET["Rol"];
 if ($Privilegios==1) {
$conexion=new mysqli("127.0.0.1","root","","inventario");
 $rol="Administrador";
 $queri="UPDATE Usuario set Usuario='$Usuario',Pasword='$Pass',Privilegios='$rol' WHERE Id_Usuario='$id_usuario'";
$resultado=$conexion->query($queri);
echo "sdsdsds";
 }
 else{
  $rol="Empleado";
 $queri="UPDATE Usuario set Usuario='$Usuario',Pasword='$Pass',Privilegios='$rol'WHERE Id_Usuario='$id_usuario' ";
 $conexion=new mysqli("127.0.0.1","root","","inventario");
$resultado=$conexion->query($queri);


 }
}
?>
</body>
</html>
<script type="text/javascript">$('#nombre').ht(' <?php echo $mostrar['nombre'] ?>');</script>
