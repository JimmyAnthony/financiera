<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="iconos/Calendar.png" />
<title>Sistema de credito</title>
<link type="text/css" rel="Stylesheet" href="css/login.css" />
<link type="text/css" rel="Stylesheet" href="css/icons.css" />
<link rel="stylesheet" type="text/css" href="Extjs/extjs/resources/css/ext-all.css" />  
<link rel="stylesheet" type="text/css" href="Extjs/extjs/resources/css/xtheme-gray.css" />  
<script type="text/javascript" src="Extjs/extjs/adapter/ext/ext-base.js"></script>  
<script type="text/javascript" src="Extjs/extjs/ext-all.js"></script>
<script type="text/javascript" src="Extjs/ux/statusbar/StatusBar.js"> </script>
<script type="text/javascript" src="Extjs/ux/searchfield/SearchField.js"></script>
<script type="text/javascript" src="js/xim.js"></script>
<script type="text/javascript" src="js/windows.js"></script>
<script type="text/javascript" src="js/view_galery_xim.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script>
Ext.ns('login_estadistica');
login_estadistica={
    url : 'modulos/login/capas/control.php',
	id: 'xim',
    init:function(){
		var panel_login = new Ext.Panel({
			title:'INGRESO DE USUARIO',
			layout:'form',
			id:login_estadistica.id+'_form_login',
			width:250,
			height:300,
			renderTo:'login_user',
			iconCls: 'lock',
			padding:10,
			items:[
				{
					xtype:'textfield',
					fieldLabel:'Usuario',
					emptyText:'Ingrese Usuario...',
					id:login_estadistica.id+'_txt_user',
					padding:15,
					anchor:'99%',
					enableKeyEvents:true,
					selectOnFocus:true,
					listeners:{
						keyup:function(obj,e){
							
						},
						keypress:function(obj,e){
							if(e.keyCode==13){
								//if(obj.value!='')
								//Ext.setFocus(login_estadistica.id+'_txt_pass');
							}
						}
					}
				},
				{
					xtype:'textfield',
					fieldLabel:'Clave',
					emptyText:'Clave...',
					inputType: 'password',
					id:login_estadistica.id+'_txt_pass',
					padding:15,
					anchor:'99%',
					enableKeyEvents:true,
					selectOnFocus:true,
					listeners:{
						keyup:function(obj,e){
							
						},
						keypress:function(obj,e){
							if(e.keyCode==13){
								if(obj.value!='')
								login_estadistica.ingreso_user();
							}
						}
					}
				},
				{
					xtype:'panel',
					border:false,
					padding:15,
					items:[
							{
								xtype:'button',
								id:'btn_ingresar',
								text:' Ingresar ',
								width:90,
								iconCls:'key',
								listeners:{
									click:function(obj,e){
										login_estadistica.ingreso_user();
									}
								}
							}
						]
				},
				{
					xtype:'panel',
					border:true,
					id:'mensajero',
					width:227,
					height:120,
					html:'<table><tr><td><div><img src="img/iMac.png" /></div>Sistema de control y generación de creditos<div id="cargador" style="display:none"><img src="img/mini_loading.gif" /></div></td></tr></table>'
				},
				{
					xtype:'button',
					id:'btn_ingresar_2',
					text:' Cambiar Clave ',
					padding:5,
					width:90,
					iconCls:'editar',
					listeners:{
						click:function(obj,e){
								
						}
					}
				}
				
			]
		});
	},
	ingreso_user:function(){
		var user = Ext.getCmp(login_estadistica.id+'_txt_user').getValue();
		var pass = Ext.getCmp(login_estadistica.id+'_txt_pass').getValue();
		if(user==''){
			Ext.Msg.show({
				title: 'SIMI',
				msg: 'Ingrese un nombre de usuario para ingresar al sistema por favor!',
				buttons: Ext.Msg.OK,
				icon: Ext.Msg.WARNING
			});
			return;
		}else if(pass==''){
			Ext.Msg.show({
				title: 'SIMI',
				msg: 'Ingrese una clave para ingresar al sistema por favor!',
				buttons: Ext.Msg.OK,
				icon: Ext.Msg.WARNING
			});
			return;
		}
		document.getElementById('cargador').style.display = 'block';
		//Ext.getCmp('mensajero').el.mask('Cargando...', 'x-mask-loading');
		var data = 'op=ingreso_user&user='+user+'&pass='+pass;
		Ext.Ajax.request({
			url:login_estadistica.url,
			params:data,
			success:function(response,options){			
				//Ext.getCmp('mensajero').el.unmask();
				//alert(response.responseText);
				var msg = Ext.decode(response.responseText);
				if(parseInt(msg['est'])==1){								 
					location.href='administrador.php';
					//login_estadistica.aperturar_sistema();
				}else if(parseInt(msg['est'])==0){//
					Ext.Msg.show({
						title: 'SIMI',
						msg: 'Usuario o Clave Incorrecta, intente nuevamente por favor', 
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});			
					document.getElementById('cargador').style.display = 'none';		
				}else{
					Ext.Msg.show({
					title: 'SIMI',
					msg: 'Ocurrio un error en la consulta por favor si el problema persiste contacte con el administrador del sistema gracias', 
					buttons: Ext.Msg.OK,
					icon: Ext.Msg.ERROR
					});			
					document.getElementById('cargador').style.display = 'none';
				}
			}
		});
	},
	aperturar_sistema:function(){
		var panel_login = new Ext.Panel({
			title:'AREA DE TRABAJO',
			layout:'form',
			id:login_estadistica.id+'_form_loginS',
			//width:250,
			height:300,
			renderTo:'area_trabajo',
			iconCls: 'lock',
			padding:10,
			items:[]
			});
	}
	
}
Ext.onReady(login_estadistica.init,login_estadistica);
</script>
</head>

<body>
<div id="imagen_empre" align="center"><img src="img/gente.jpg" /></div>
<div id="contenido_estadistica">
<div id="login_user">
</div>
<div id="area_trabajo">

</div>
</div>
</body>
</html>
