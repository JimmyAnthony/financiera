<?php
	require_once "../factory/Parameter.class.php";
	require_once "../factory/DAOFactory.class.php";
	require_once "../bloque_consultas/travel/capas/Logica.php";
	$logica = new logica();
	$param = $_REQUEST;
	$parametros['nombres'] = utf8_decode(trim($param["txt_nombre"]));
	$parametros['apellidos'] = utf8_decode(trim($param["txt_ape"]));
	$parametros['empresa'] = utf8_decode(trim($param["txt_empresa"]));
	$parametros['correo'] = utf8_decode(trim($param["txt_correo"]));
	$parametros['telefono'] = utf8_decode(trim($param["txt_telf"]));
	$parametros['asunto'] = utf8_decode(trim($param["txt_asunto"]));
	$parametros['coment'] = utf8_decode(trim($param["txt_coment"]));
	$nombre = $_FILES["txt_cv"]['name'];
	$prefijo = substr(md5(uniqid(rand())),0,6);
	$destino =  (string)("../cv/".$prefijo."_travel_".$nombre);
	$parametros['destino'] = $prefijo."_travel_".$nombre;
	move_uploaded_file($_FILES['txt_cv']['tmp_name'], $destino);
	$resp = $logica->register_cv($parametros);
	if($resp){
	echo "Se Envio Correctamente!.";
	}else{
	echo "Ocurrio un Problema ,Intenente otra vez.";
	}
	//header("Location:../../pops/empleos_login.php?resp=".$resp);
?>