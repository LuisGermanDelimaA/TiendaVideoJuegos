<?php
require_once('../modelos/Videojuego.php');
require_once('../modelos/Inventario.php');

$objvideo=new Videojuego();
$objIven=new Inventario();

// echo '<pre>';
// print_r($_POST); die();

	if($_POST['crud']=='create' || $_POST['crud']=='update'){
		$param=[];
		$param['id']=@$_POST['id'];
		$param['categoria_id']=$_POST['categoria_id'];
		$param['tecnologia_id']=$_POST['tecnologia_id'];
		$param['titulo']=$_POST['titulo'];
		$param['protagonista']=$_POST['protagonista'];
		$param['director']=$_POST['director'];
		$param['productor']=$_POST['productor'];
		$param['tecnologia_id']=$_POST['tecnologia_id'];
		$param['descripcion']=$_POST['descripcion'];
		$param['anio']=$_POST['anio'];
		$param['precio']=$_POST['precio'];
		$video_id = $objvideo->guardar($param);
		
		$resInve=$objIven->listar(['where'=>' videojuego_id='.$video_id,'vector']);
		$param2['id']=@$resInve['id'];
		$param2['videojuego_id']=$video_id;
		$param2['stock']=$_POST['stock'];
		$objIven->guardar($param2);


		header('Location: ../videojuego_listar.php');

	}
	if($_REQUEST['crud']=='deleted'){
		$param['id']=@$_REQUEST['id'];
		$objvideo->eliminar($param['id']);

		if (!empty($_REQUEST['selec_id'])){
			foreach ($_REQUEST['selec_id'] as $key => $value) {
				$objvideo->eliminar($value);
			}
		}

		header('Location: ../videojuego_listar.php');
	}

	

?>