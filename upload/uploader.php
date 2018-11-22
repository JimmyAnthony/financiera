<?php 
	require_once "../factory/Parameter.class.php";
	require_once "../factory/DAOFactory.class.php";	
	$archivo = $_FILES["archivo-xim-img"]['name'];
	$size = $_FILES["archivo-xim-img"]['size'];
	$param = $_REQUEST;
	if(empty($archivo)){echo  "<script>alert('Ingrese Una imagen Por vafor');</script>";exit();}
	
switch($param['opcion']){		
		case 'ESTADISTICA_EMPRESA':
			require_once "../modulos/empresa/capas/accion.php";
			$accion = new actcion();
			$ruta = "../galeria/empresa";
		break;
		case 'ESTADISTICA_CLIENTES':
			require_once "../modulos/clientes/capas/accion.php";
			$accion = new actcion();
			$ruta = "../galeria/clientes";
		break;
	}
$prefijo = substr(md5(uniqid(rand())),0,6);
$destino =  (string)($ruta."/".$prefijo."_xim".$archivo);
$parametros['nombre']=$prefijo."_xim".$archivo;
move_uploaded_file($_FILES['archivo-xim-img']['tmp_name'], $destino);

/***************************************************************************************************************/
include('uploadClass/class.upload.php');

$cli = (isset($argc) && $argc > 1);
if($cli) {
    if (isset($argv[1])) $_GET['file'] = $argv[1];
    if (isset($argv[2])) $_GET['dir'] = $argv[2];
    if (isset($argv[3])) $_GET['pics'] = $argv[3];
}
// set variables
$dir_dest = $ruta."/";
$dir_pics = $ruta."/";;
    switch($param['opcion']){		
		case 'ESTADISTICA_CLIENTES':				
				$handle4 = new upload($destino, 'es_ES');
					if ($handle4->uploaded) {
					$handle4->image_resize          = true;
					$handle4->image_ratio_crop      = 'C';
					$handle4->image_ratio_fill      = 'C';
					$handle4->image_x               = 100;
					$handle4->image_y               = 130;
					$handle4->Process($dir_dest);
					$nombre4 = $handle4->file_dst_name;
					$parametros['img']=$nombre4;
					/******************************************/
					$parametros['cod_cli']=$param['cod_cli'];
					$resp = $accion->set_img_clientes($parametros);
					unlink($destino);//unlink($ruta."/".$param['imagen_ok']);					
					if($resp){
					echo  "<script>alert('El proceso termino Correctamente');</script>";
					}else{
					echo  "<script>alert('Ocurrio un problema al tratar de subir la Imagen, Intente nuevamente');</script>";
					unlink($destino);
					}
				}else{
					echo  "<script>alert('Ocurrio un problema al tratar de subir la Imagen, Intente nuevamente');</script>";
				}
		break;
		case 'ESTADISTICA_EMPRESA':
				$handle4 = new upload($destino, 'es_ES');
					if ($handle4->uploaded) {
					$handle4->image_resize          = true;
					$handle4->image_ratio_crop      = 'C';
					$handle4->image_ratio_fill      = 'C';
					$handle4->image_x               = 100;
					$handle4->image_y               = 130;
					$handle4->Process($dir_dest);
					$nombre4 = $handle4->file_dst_name;
					$parametros['img']=$nombre4;
					/******************************************/
					$resp = $accion->set_img_empresa($parametros);
					unlink($destino);//unlink($ruta."/".$param['imagen_ok']);					
					if($resp){
					echo  "<script>alert('El proceso termino Correctamente');</script>";
					}else{
					echo  "<script>alert('Ocurrio un problema al tratar de subir la Imagen, Intente nuevamente');</script>";
					unlink($destino);
					}
				}else{
					echo  "<script>alert('Ocurrio un problema al tratar de subir la Imagen, Intente nuevamente');</script>";
				}
		break;
	}
	
?>