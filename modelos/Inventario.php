<?php
	require_once('conexion.php');
	class Inventario extends conexion{
		
		protected $tabla='inventario';
		protected $campos=[];
 
		function __construct(){}
 		

		public function listar($param=array()){
			$db=$this->conectar();
			$whereAdd='';
			if (!empty($param['where'])) $whereAdd=' and '.$param['where'];

			$prep=$db->prepare("select t0.* from $this->tabla t0 where t0.eliminado=0 $whereAdd order by t0.id desc");
			$prep->execute(array());
			$lista = $prep->fetchAll(PDO::FETCH_ASSOC);

			if (in_array('vector', $param)) {
				if (empty($lista)) return array();
				return $lista[0];
			}
			return $lista;
		}
		
	}
?>