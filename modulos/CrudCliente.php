<?php
require_once('../modelos/Cliente.php');

$objCliente=new Cliente();

// echo '<pre>';
// print_r($_POST); die();

	if($_POST['crud']=='create' || $_POST['crud']=='update'){
		$param=[];
		$param['id']=@$_POST['id'];
		$param['nombre']=$_POST['nombre'];
		$param['apellido']=$_POST['apellido'];
		$param['cedula']=$_POST['cedula'];
		$param['fecha_nac']=$_POST['fecha_nac'];
		$param['correo']=$_POST['correo'];
		$param['direccion']=$_POST['direccion'];
		$cliente_id = $objCliente->guardar($param);


		header('Location: ../index.php');

	}
	if($_REQUEST['crud']=='deleted'){
		$param['id']=@$_REQUEST['id'];
		$objCliente->eliminar($param['id']);

		if (!empty($_REQUEST['selec_id'])){
			foreach ($_REQUEST['selec_id'] as $key => $value) {
				$objCliente->eliminar($value);
			}
		}

		header('Location: ../index.php');
	}

	

?>