<?php
   if(!isset($_GET['lang'])){  
                $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];  
                //es, es_MX, en, en_UK  
                $lang = substr($lang,0,2);  
    }else{  
                //Si el usuario ha seleccionado un lenguaje del combo  
    }  
	
	$lang = $_GET['lang'];  
   switch($lang){  
                case 'en':  
               case 'es':  
                case 'it':  
                case 'pt':  
                case 'ro':  
                            break;  
                default:  
                           $lang = 'en';  
   }  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Demo: Many languages | Quizzpot</title>

<link rel="stylesheet" type="text/css" href="../extjs/resources/css/ext-all.css" />
<link rel="stylesheet" type="text/css" href="../extjs/resources/css/xtheme-gray.css" />  
<script type="text/javascript" src="../extjs/adapter/ext/ext-base.js"></script>
<script type="text/javascript" src="../extjs/ext-all.js"></script>
<script type="text/javascript" src="../extjs/locale/ext-lang-<?php echo $lang;?>.js"></script>

<script type="text/javascript" src="yourlanguage.js"></script>
<script type="text/javascript" src="manylanguages.js"></script>
<style type="text/css">
	.cmb{
		float:right;
		margin:5px;
	}
</style>

</head>
<body>
<script type="text/javascript">
 
 Ext.onReady(function(){
Ext.Msg.alert('Removed','This is just an example! Just a dummy!');
 }) 
  
 </script>
<div class="cmb">
	<select id="language">
		<option value="en">English</option>
		<option value="es">Español</option>
		<option value="it">Italiano</option>
		<option value="pt">Português</option>
		<option value="ro">Română (Romanian)</option>
	</select>
</div>
</body>
</html>