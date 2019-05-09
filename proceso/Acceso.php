<?php 
session_start();
include_once '../proceso/credenciales.php';

if (isset($_REQUEST["btnIngresar"])) {
	
	$usuario=$_REQUEST["txtUsuario"];
	$contra=$_REQUEST["txtPassword"];
	$conexion=new mysqli("127.0.0.1","root","","inventario");
	$sql="SELECT Privilegios from usuario where Usuario='$usuario' and Pasword='$contra'";
	$resultado=$conexion->query($sql);
	 /* determinar el número de filas del resultado */
	$cuantos=mysqli_num_rows($resultado);
	if ($cuantos==0) {
		
		header('location: ../login.php');
		
	}
		
	
	$fila=$resultado->fetch_array(MYSQLI_NUM);
	$nivel=$fila["0"];
	if ($nivel=="Administrador") {
		$_SESSION["usuario"]["nombre"]=$usuario;
		$_SESSION["usuario"]["nivel"]=$nivel;
		header("Location:../html/menu.php");
	}elseif ($nivel=="Empleado") {
		$_SESSION["usuario"]["nombre"]=$usuario;
		$_SESSION["usuario"]["nivel"]=$nivel;
		header("Location:../html/MenuEm.php");
	}else{
		header("Location:../login.php");
	}
	}
	if (isset($_REQUEST["cerrar"])) {
		session_destroy();
		header("Location:../login.php");
	}
	
?>