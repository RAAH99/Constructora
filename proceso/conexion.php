<?php
	class Conexion{
	protected $conn;
	 public function Conexion()	{
		
		$this->conn=new mysqli("127.0.0.1","root","","inventario");
		
		}
	
	public function desconectar(){
		$this->conn->close();
	}
	public function consultar($sql){
		$this->Conexion();
		$res=$this->conn->query($sql);
		$this->desconectar();
		return $res;
	}
	public function ejecutar($sql){
		$this->Conexion();
		$this->conn->query($sql);
		$this->desconectar();
		return true;
	}
}
?> 
