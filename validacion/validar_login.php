<?php 
session_start();
if(!empty($_POST['user2']) and !empty($_POST['user'])){
require_once "../factory/Parameter.class.php";
require_once "../factory/DAOFactory.class.php";
require_once "../bloque_consultas/travel/capas/consultas.php";
$parametros['user'] = trim($_POST['user2']);
$parametros['pass'] = trim($_POST['user']);
$consulta = new consultas();
$resp = $consulta->valida_login($parametros);
if($resp){
$_SESSION['ACTIVO'] ='OK';
header("Location:../administrador.php");
}else{
$_SESSION['ACTIVO'] ='OFF';
header("Location:../index.php?msn=2");
}
}else{
$_SESSION['ACTIVO'] ='OFF';
header("Location:../index.php?msn=1");
}
?>