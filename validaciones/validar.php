<?php
session_start();
session_register('id_usuario');
session_register('usuario');
session_register('clave');
require_once('../conexion/simplificar.php');
$simpli = new simplificar;
//$cant = $simpli->cantidad();
$ses =$_SESSION["autentificado"];
	if($ses!="SI"){
	$_SESSION["usuario"]=$_POST["txt_user"];
	$_SESSION["clave"]=$_POST["txt_pass"];
 $condicion[0]=$_SESSION["usuario"];
 $condicion[1]=$_POST["txt_pass"];

@$consulta= $simpli->simplificado('usuario',0,0,6,$condicion,0,0,0,0,0,0,0,'select');
$cn = $simpli->cantidad();
	}else{
	 $condicion2[0]=$_SESSION['usuario'];
	 $condicion2[1]=$_SESSION['clave'];
	@$consulta= $simpli->simplificado('usuario',0,0,6,$condicion2,0,0,0,0,0,0,0,'select');
$cn = $simpli->cantidad();
	} 
//vemos si el usuario y contraseña es váildo
if ($cn){
//usuario y contraseña válidos
session_start();
//asigno un nombre a la sesión para poder guardar diferentes datos
session_name("loginUsuario");
//session_set_cookie_params(0, "/", $HTTP_SERVER_VARS["HTTP_HOST"], 0);
//defino la sesión que demuestra que el usuario está autorizado
$_SESSION["autentificado"]= "SI";
//cambiamos la duración a la cookie de la sesión
$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
//defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss
//header ("Location:index.php");
$val = mysql_fetch_array($consulta);
$_SESSION["id_usuario"] = $val[0];
//echo "XIM19880102SI";
header("Location:../index.php");
}else {
unset($_SESSION["usuario"]);
//si no existe le mando otra vez a la portada
//header("Location: index.php?respuesta=$res");
$error="1";
header("Location:../index.php?error=".$error);
}
?>

?>