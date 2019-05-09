<?php 
include '../proceso/conexion.php';

class Funciones{
	protected $c;
	public function Funciones(){
		//inicializar lo necesario 
		$this->c = new conexion();
	}
	
	public function mostrar(){
		$sql = "SELECT * from usuario";
		$resultado = $this->c->consultar($sql);
		$ncampos = mysqli_num_fields($resultado);
		$tabla = "<table  class='table table-hover'>";
		$tabla .="<tr class='active'>";
		while ($encabezado = mysqli_fetch_field($resultado)) {
			$tabla .= "<td><b>".$encabezado->name."</td></b>";
		}
		$tabla .= "<td><b>Acciones</b></td>";
		$tabla .="</tr>";
		for ($i=0; $i <$ncampos ; $i++) { 
			while ($fila=mysqli_fetch_row($resultado)) {
				$tabla .= "<tr class='success'>";
				for ($col=0; $col < $ncampos; $col++) { 
					$tabla .="<td>".$fila[$col]."</td>";
				}
				$tabla .= "<td><b><a href=\"javascript:carga('$fila[0]','$fila[1]','$fila[2],'$fila[3]')\" ><button type='button' onclick='' class='btn btn-danger'>Cargar</button></a></td></b>";
				$tabla.="</tr>";
			}
		}
		$tabla .="</table>";
		return $tabla;
	}
	
	
 
}

if (isset($_REQUEST["no"])) {
		$numero = $_REQUEST["no"];
		$query = "DELETE FROM `usuario` 
		WHERE Id_Usuario = $numero";
		$conexion=new mysqli("127.0.0.1","root","","inventario");

	$result = $conexion->query($query);
		if (!$result) {
			$_REQUEST['error'] = 'Error al eliminar el registro.';
			header('location: ../html/MostrarUs.php');
		}
		else{
			$_REQUEST['success'] = 'Registro eliminado correctamente';
			header('location: ../html/MostrarUs.php');
		}
	}
function agregar($id_usuario,$Usuario,$Pass,$Privilegios){	

$conexion=new mysqli("127.0.0.1","root","","inventario");
if ($Privilegios==1) {

 $rol="Administrador";
 $query="INSERT INTO  usuario (Id_Usuario,Usuario,Pasword,Privilegios)  VALUES('$id_usuario','$Usuario','$Pass','$rol')";
$resultado=$conexion->query($query);
if ($resultado) {
echo '<script language="javascript">;
alert("Usuario Agregado exitosamente");
</script>';
 header('Location:CrearEmplado.php');

}else{
 echo '<script language="javascript">';
echo 'alert("falla de insercion")';
echo '</script>';

}
 }
 else{
  $rol="Empleado";
 $query="INSERT INTO  usuario (Id_Usuario,Usuario,Pasword,Privilegios)  VALUES('$id_usuario','$Usuario','$Pass','$rol')";
$resultado=$conexion->query($query);
if ($resultado) {

header('Location:CrearEmplado.php');
echo '<script language="javascript">';
echo 'alert("Usuario Agregado exitosamente")';
echo '</script>';
}else{
 echo '<script language="javascript">';
echo 'alert("falla de insercion")';
echo '</script>';
}

 }}
 function agregarHerramienta($Id_Herramienta,$Id_Tipo,$Nombre,$Marca,$Modelo,$Estado,$Cantidad,$Disponibilidad){	


 $conexion=new mysqli("127.0.0.1","root","","inventario");

 $query="INSERT INTO `herramientas`(`Id_Herramienta`, `Id_Tipo`, `Nombre_Herramientas`, `Marca`, `Modelo`, `Estado`, `Cantidad`, `Disponibilidad`) VALUES ('$Id_Herramienta','$Id_Tipo','$Nombre','$Marca','$Modelo','$Estado','$Cantidad','$Disponibilidad')";
$resultado=$conexion->query($query);
if ($resultado) {
echo '<script language="javascript">';
echo 'alert("Usuario Agregado exitosamente")';
echo '</script>';
header('Location:EnviarHerramientas.php');


}else{
 echo '<script language="javascript">';
echo 'alert("falla de insercion")';
echo '</script>';

}


 }
 
	
	if (isset($_REQUEST["nu"])) {
		$numero = $_REQUEST["nu"];
		$query = "DELETE FROM `herramientas` 
		WHERE Id_Herramienta = $numero";
		$conexion=new mysqli("127.0.0.1","root","","inventario");

	$result = $conexion->query($query);
		if (!$result) {
			$_REQUEST['error'] = 'Error al eliminar el registro.';
			header('location:../html/AgregarHerramientas.php');
		}
		else{
			$_REQUEST['success'] = 'Registro eliminado correctamente';
			header('location: ../html/AgregarHerramientas.php');
		}
	}
?>