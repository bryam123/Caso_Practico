<?php
include_once '../model/Usuario.php';
session_start();
$user=$_POST['user'];
$pass=$_POST['pass'];
echo $user,$pass ;
$usuario = new Usuario();

if (!empty($_SESSION['us_tipo'])) {
	switch ($_SESSION['us_tipo']) {
		case 1:
			header('Location: ../view/sales_promoter_manager.php');
			break;
		
		case 2:
			header('Location: ../view/sales_promoter_manager.php');
			break;
	}
} else {
	
	$consulta = $usuario->loguearse($user,$pass);
	if (!empty($consulta)) {
		if ($consulta == 'logueado') {
			$usuario->obtener_datos_logueo($user);
		} else {
			$usuario->obtener_datos_logueo($user);

		}
		
	
		foreach ($usuario->objetos as $objeto) 
	    {
	        if(!empty($objeto->id_pro)){
	            $_SESSION['usuario']=$objeto->id_pro;
	            $_SESSION['us_tipo']=$objeto->us_tip_log;
	            $_SESSION['nombre']=$objeto->nom_log;
	            $_SESSION['apellidos']=$objeto->ape_log;
	        }else{ 
	        }
	    }
	    switch ($_SESSION['us_tipo']) {
			case 1:
				header('Location: ../view/sales_promoter_manager.php');
				break;
			
			case 2:
				header('Location: ../view/sales_promoter_manager.php');
				break;
		}	
	} else {
		header('Location: ../index.php');
	}
}

?>