<?php
	class  conexion{
		private $conexion=NULL;

		protected $tabla='';
		protected $campos=[];

		private function __construct (){}

		public function conectar(){
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			$this->conexion= new PDO('mysql:host=localhost;dbname=videojuegos_db','root','',$pdo_options);
			return $this->conexion;
		}

		public function guardar($param){

			$db=$this->conectar();
			$id=empty($param['id']) ? '' : $param['id'];
			unset($param['id']);
			$prepara='';
			$prepara2='';
			$execute=array();
			foreach ($param as $key => $val) {
				if (empty($id)){ #insert
					$prepara.=$key.',';
					$prepara2.='?,';
					$execute[]=$val;
				}
				else{ #update
					$prepara.=$key.'=?,';
					$execute[]=$val;
				}
			}
			$prepara=trim($prepara,',');
			$prepara2=trim($prepara2,',');
			if (empty($id)) #insert
				$prepara="insert into ".$this->tabla." ($prepara) values ($prepara2)";
			else{
				$execute[]=$id;
				$prepara="update ".$this->tabla." set $prepara where id=?";
			}

			// print_r($execute); 
			// echo $prepara; die();

			$prep=$db->prepare($prepara);
			$prep->execute($execute);
			if (empty($id)) $id=$db->lastInsertId();

			return $id;
		}

		public function eliminar($id){
			$db=$this->conectar();
			$prep=$db->prepare('update '.$this->tabla.' set eliminado=1 where id=? ');
			$prep->execute([$id]);
		}


	} 
?>