<?php
	require_once('conexion.php');
	class Videojuego extends conexion{
		
		protected $tabla='video_juego';
		protected $campos=[];
 
		function __construct(){}
 		

		public function listar($param=array()){
			$db=$this->conectar();
			$whereAdd='';
			if (!empty($param['where'])) $whereAdd=' and '.$param['where'];

			$prep=$db->prepare("select t0.*,t1.nombre as categoria,t2.nombre as tecnologia,t3.stock,t3.alquilados,t3.disponibilidad  from $this->tabla t0 
			join categorias t1 on t1.id=t0.categoria_id 
			join tecnologia t2 on t2.id=t0.tecnologia_id
			join inventario t3 on t3.videojuego_id=t0.id
			where t0.eliminado=0 $whereAdd order by t0.id desc");
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