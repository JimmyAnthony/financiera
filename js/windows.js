// JavaScript Document
Logeo = function(obj,oyente){
	if(obj){
		this.objVal    = obj.value;
		this.objId     = obj.id;
		this.even      = oyente;
	}
	 this.closeXim = function(div){
		 //Windows.close("Div_"+divs);
		if(div.substring(0,4)=='Div_'){
			Ext.getCmp(div).close();
		}else{
			Ext.getCmp("Div_"+div).close();
		}
};
	 
	this.Abrir_Login=function(){
		title = "Administrador";
		var url="../bloque_inicio/vista/login.php";
  		WinOpen(['logeo',title,url,'','320','211',true]);
	};
	this.evaluar = function(){
		var inst = this;
		var user = $('p2').value;
		var pass = $('p3').value;
		if(user==''){$('login_mensaje1').innerHTML ="<br>Ingrese el usuario por favor";return;}
		if(pass==''){$('login_mensaje1').innerHTML ="<br>Ingrese la clave por favor";return;}
		var data = "op=comprueba_user&user="+user+"&pass="+pass;
		var url="../bloque_inicio/capas/Control.php";
		$('login_mensaje1').innerHTML ="<br><img src='../imagen page/mini_loading.gif' />";
		new Ajax.Request( url,
					  {	method	:'post',
							parameters	:data,
							onLoading	: estado_cargador2(4),
							onComplete	:function(transport){
							estado_cargador2(4);
							 var op = transport.responseText;
							 if(parseInt(op)==0){
							 $('login_mensaje1').innerHTML = "<br> Usuario o Clave incorrecta, intente otra vez por favor"; 
							 }else if(parseInt(op) ==1){
								$('login_mensaje1').innerHTML = "<br> ...";
								//inst.closeXim('logeo');
								var url2="../bloque_inicio/capas/Control.php";
								var data2 = "op=muestra_contenido";
								inst.myAjax(url2,data2,10); 
							}else{
								$('login_mensaje1').innerHTML = transport.responseText;
							}
							//cerrar_ventana("Lista_Entidades");
							}
					  });
	};
	this.myAjax = function(url,data,modo){
		new Ajax.Request( url,
					  {	method	:'post',
							parameters	:data,
							onLoading	: estado_cargador2(1),
							onComplete	:function(transport){
								estado_cargador2(0);
								if(modo == 10){
									$('contenedor').innerHTML = transport.responseText;
									//body.css("background","#000000");
									return;
									}
							 var op = transport.responseText;
							 if(parseInt(op)==0){
							
							 	}else{
								
							  }
							}
					  });
	}
	this.cerrar_v=function(vent){
		cerrar_ventana(vent);
	};
	this.cambiar_clave = function(){
		title = "CAMBIAR CLAVE";
		var url="../bloque_inicio/vista/cambiar_clave.php";
  		WinOpen(['Cambiar_clave',title,url,'','320','232',true]);
	};
	this.new_clave = function(){
		var user = $('p2').value;
		var pass = $('p3').value;
		if(user==''){$('login_mensaje').innerHTML ="<br>Ingrese el usuario por favor";return;}
		if(pass==''){$('login_mensaje').innerHTML ="<br>Ingrese la clave por favor";return;}
		var data = "op=comprueba_user&user="+user+"&pass="+pass;
		var url="../bloque_inicio/capas/Control.php";
		$('login_mensaje').innerHTML ="<br><img src='../imagen page/mini_loading.gif' />";
		new Ajax.Request( url,
					  {	method	:'post',
							parameters	:data,
							onLoading	: estado_cargador2(4),
							onComplete	:function(transport){
							estado_cargador2(4);
							 var op = transport.responseText;
							 if(parseInt(op)==0){
							 $('login_mensaje').innerHTML = "<br>Usuario o Clave incorrecta, intente otra vez por favor";
							$('txt_exist').value=0;
							 }else if(parseInt(op)==1){
								$('login_mensaje').innerHTML = "<br>El usuario es correcto y existe en la base de datos<br>";	 
								$('txt_exist').value=1;
							}else{
								$('contenedor').innerHTML = transport.responseText;
								 $('txt_exist').value=0;
							}
							//cerrar_ventana("Lista_Entidades");
							}
					  });
	};
	this.comprueba_pass= function(){
				var user = $('txt_user').value;
				var pass = $('txt_pass').value;
				var passnew = $('txt_new_pass').value;
				var passnew2 = $('txt_new_pass2').value;
				var estado =$('txt_exist').value;
				var exts = $('txt_exist').value;
				if(user==''){$('login_mensaje').innerHTML ="<br>Ingrese el usuario por favor";return;}
				if(pass==''){$('login_mensaje').innerHTML ="<br>Ingrese la clave por favor";return;}
				if(parseInt(estado) == 0){$('login_mensaje').innerHTML ="<br>Usuario o Clave incorrecta, intente otra vez por favor";$('txt_pass').focus();return;}
				if(!parseInt(exts)){$('txt_new_pass').value ='';$('txt_new_pass2').value='';$('txt_user').focus();}
				if(passnew != passnew2){$('login_mensaje').innerHTML ="<br>La nueva clave no son iguales!";$('txt_new_pass').value ='';$('txt_new_pass2').value='';$('txt_new_pass').focus();return;}
				var data = "op=cambia_clave&user="+user+"&pass="+pass+"&newpass="+passnew;
				var url="../bloque_inicio/capas/Control.php";
				$('login_mensaje').innerHTML ="<br><img src='imagen page/mini_loading.gif' />";
				new Ajax.Request( url,
					  {	method	:'post',
							parameters	:data,
							onLoading	: estado_cargador2(4),
							onComplete	:function(transport){
							estado_cargador2(4);
							 var op = transport.responseText;
							 if(parseInt(op)==0){
							 $('login_mensaje').innerHTML = "<br>No se logro cambiar la clave";
							 	
							 }else if(parseInt(op)==1){
								$('login_mensaje').innerHTML = "<br>La clave se cambio con exito!<br>";
								$('txt_pass').value='';
								$('txt_new_pass').value='';
								$('txt_new_pass2').value='';
								
							}else{
								$('login_mensaje').innerHTML = transport.responseText;
								}
							//cerrar_ventana("Lista_Entidades");
							}
					  });
	};
}//fin login
function validaLogin(opcion,evt){
    key = LeeTecla(evt);
    switch(opcion){	
		case 'login_user':
            if( (key == 13 || key == 0 || key == undefined) && $F('txt_user') != '')
            {             salta_foco();
                /*var usuario = $F('p2');
                var sistema = $F('p4');//4*/
                var user = $('txt_user').value;
				var pass = $('txt_pass').value;
				/*var passnew = $('txt_new_pass').value;
				var passnew2 = $('txt_new_pass2').value;*/
				if(user==''){$('login_mensaje').innerHTML ="<br>Ingrese el usuario por favor";return;}
				if(pass==''){$('login_mensaje').innerHTML ="<br>Ingrese la clave por favor";return;}else{$('txt_pass').focus();}
				/*if(passnew != passnew2){$('login_mensaje').innerHTML ="<br>La nueva clave no son iguales!";$('txt_new_pass').value ='';$('txt_new_pass2').value='';return;}*/
				var data = "op=comprueba_user&user="+user+"&pass="+pass;
				var url="../bloque_inicio/capas/Control.php";
				$('login_mensaje').innerHTML ="<br><img src='../imagen page/mini_loading.gif' />";
				new Ajax.Request( url,
					  {	method	:'post',
							parameters	:data,
							onLoading	: estado_cargador2(4),
							onComplete	:function(transport){
							estado_cargador2(4);
							 var op = transport.responseText;
							 if(parseInt(op)==0){
							 $('login_mensaje').innerHTML = "<br>Usuario o Clave incorrecta, intente otra vez por favor"; 
							 $('txt_exist').value=0;
							
							}else if(parseInt(op)==1){
								$('login_mensaje').innerHTML = "<br>El usuario es correcto y existe en la base de datos<br>";
								$('txt_exist').value=1;
								$('txt_new_pass').focus();
							}else{
								$('login_mensaje').innerHTML = transport.responseText;
								$('txt_exist').value=0;
								}
							//cerrar_ventana("Lista_Entidades");
							}
					  });
                /*var id_contenedor = 'login_mensaje';
                http = getHttp();
                http.onreadystatechange = function(){
                	if(http.readyState == 4 && http.status == 200){
                		respuesta = http.responseText;
                		//alert(respuesta);
                		//cargarpagina (http, id_contenedor)
                	}
                }
                http.open('GET',url,true);
                http.send(null);
                //llamarasincrono (url, id_contenedor);
                return false;*/
            }
        break;
    }
}
function salta_foco(){
		 var user = $('txt_user').value;
		 var pass = $('txt_pass').value;
		 if(user ==''){
			 $('txt_new_pass').value ='';
			 $('txt_new_pass2').value='';
			 $('txt_pass').value='';
			 $('txt_user').focus();
		}
}
function FocoNoFoco(opcion,Campo){ 
   bfs=ObtenerValorObjeto("bfs");
   ffs=ObtenerValorObjeto("ffs");
   ffns=ObtenerValorObjeto("ffns");
   bfns=ObtenerValorObjeto("bfns");
	if(opcion==1){
		ColocarValorObjeto(Campo,ffs,'style.background');		
	}
	else{
		ColocarValorObjeto(Campo,ffns,'style.background');		
	}
}

function EsTecla(evt,tecla){	
	key=LeeTecla(evt);
	if(key==tecla)	return 1;
	else		return 0;			
}

function LeeTecla(evt){	
	var nav1 = window.Event ? true : false;
	var key = nav1 ? evt.which : evt.keyCode;
	return key;			
}

function SiguienteCampo(evt,tecla,control){
	key=LeeTecla(evt);
	var a=new Array();
	a=CadenaConvertirArreglo(tecla,',');
	for (x=0;x<a.length;x++){
		if(key==parseInt(a[x])) ColocarFocoObjeto(control);
	}
}
function estado_cargador2(estado){
	switch (estado){
		case 0:	{$('cargando').style.display='none'; break;}
		case 1:	{$('cargando').style.display='block'; break;}		
	}
}
function WinOpen2(param){
	var vid="Div_"+param[0];
	var vidfrm="Frm_"+param[0];
	var vclose = param[6]==undefined?true:param[6];
	var vjs = param[7]==undefined?'':param[7];
	var win = new Window({	id	:vid, 		 	className		:"mac_os_x",
				blurClassName	:"mac_os_x", 	title			:param[1],
				width			:param[4],		height			:param[5],
				resizable		:false,			closable		:vclose,
				minimizable		:false,			maximizable		:false,
				draggable		:true});
	win.getContent().innerHTML="<div id='"+vidfrm+"'></div>";
	win.setDestroyOnClose();
	win.showCenter(true);
	win.toFront();
	new Ajax.Request(param[2],
		{	method		:'get',
			parameters	:param[3],
			onLoading	:estado_cargador2(1),
			onComplete	:function(transport){
				estado_cargador2(0);
				$(vidfrm).innerHTML = transport.responseText;
				eval(param[7]);
				}
		}
	)	
}
function cerrar_ventana(ven){
Windows.close("Div_"+ven);
}
function WinOpen(param){
	var vid="Div_"+param[0];
	var vidfrm="Frm_"+param[0];
	var vclose = param[6]==undefined?true:param[6];
	var vjs = param[7]==undefined?'':param[7];
Ext.ns('com.quizzpot.tutorial');

com.quizzpot.tutorial.TreeTutorial = {
	init: function(){
		/*var tree = new Ext.tree.TreePanel({
			border: false,
			autoScroll:true,
			root: this.getData()
		});*/

		var win = new Ext.Window({
			title:param[1],
			layout:'fit',
			id:'xim-vent',
			width:parseInt(param[4]),
			height:parseInt(param[5]),
			resizable: false,
			modal:true,
			closable:false,
			//items: tree
			html:"<div id="+vid+"></div>",
			buttons: [
				{
					id: 'ok-btn-xim',
					text: 'Aceptar',
					iconCls:'aceptar',
					//handler: this.doCallback,
					scope: this
				},{
					text: 'Cancelar',
					iconCls:'cancelar',
					handler: function(){ 
					com.quizzpot.tutorial.TreeTutorial.closep(); 
					},
					scope: this
				}
				]
		});
		win.show();
		//alert(param[2]+'---'+param[3]+'---'+vid);
		otroAjax(param[2],param[3],vid);
		/*btnCerrar.on('click',function(){
      		win.setVisible(false);
		});*/
		//tree.getRootNode().expand();
	},
	closep:function(id){
		Ext.getCmp('xim-vent').close();
		xim.com.sentencia.nuevo.load_store_view();
	},
	//returns the data for the tree
	getData: function(){
		/*var root = {
			text:'Root',
			expanded: true,
			children:[
				{
					text:'Documents',
					children:[{text:'Xim',children:[{text:'ok',children:[{text:'Xim',children:[{text:'ok',leaf:true}]}]}]}]
				},{
					text:'Pictures',
					children:[{text:'friends.jpg',leaf:true},{text:'working.jpg',leaf:true}]
				},{
					text:'Presentation.ppt',
					leaf:true
				}
			]
		}

		return root;*/
	}
}

Ext.onReady(com.quizzpot.tutorial.TreeTutorial.init,com.quizzpot.tutorial.TreeTutorial);
}
function otroAjax(url,data,vent){
	//alert(url+'---'+data+'---'+vent);
		/*new Ajax.Request(url,
					  {	method	:'post',
						parameters	:data,
						onLoading	: estado_cargador2(1),
						onComplete	:function(transport){
						estado_cargador2(0);
						 $(vent).innerHTML = transport.responseText;
						}
		});	*/
		Ext.Ajax.request({
		url:url,
		params:data,
		success:function(response,options){					
		//alert(response.responseText);
			document.getElementById(vent).innerHTML =response.responseText;
		}
		});
}


function CargarVentana(vformname,vtitle,file,vwidth,vheight,vcenter,vresizable,vstyle,vopacity,veffect,vposx1,vposx2,vposy1,vposy2,vfunctionjava,idform,opbus,opfabrir){
	CargarVentanaFormulario("VENTANA",vformname,vtitle,file,vwidth,vheight,vcenter,vresizable,false,vstyle,vopacity,veffect,vposx1,vposx2,vposy1,vposy2,'',vfunctionjava,idform,opbus,opfabrir)
}
function CargarVentanaFormulario(vFormaAbrir,vformname,vtitle,file02,vwidth,vheight,vcenter,vresizable,vmodal,vstyle,vopacity,veffect,vposx1,vposx2,vposy1,vposy2,file01,vfunctionjava,idform,opbus,opfabrir){
	vmodal=0;myRand=parseInt(Math.random()*999999999999999);if(vwidth==undefined||vwidth==0)vwidth=700;if(vheight==undefined||vheight==0)vheight=400;if(vposx1==undefined||vposx1==0)vposx1=25;if(vposy1==undefined||vposy1==0)vposy1=110;if(vposx2==undefined||vposx2==0)vposx2=25;if(vposy2==undefined||vposy2==0)vposy2=110;if(vresizable==undefined||vresizable==0)vresizable=true;else vresizable=false;if(vstyle==undefined||vstyle==0)vstyle="alphacube";if(veffect==veffect||veffect==0)veffect="popup_effect1";if(vmodal==undefined||vmodal==0)vmodal=false;else vmodal=true;if(vopacity==undefined||vopacity==0)vopacity=1;if(vcenter==undefined||vcenter==0)vcenter=true;if(vtitle==undefined)vtitle=vformname;if(idform==undefined||idform==0)idform="";if(opbus==undefined||opbus==0)opbus="";
	var vurl1=file01.split("?");
	var vurl2=file02.split("?");
	if(parseInt(vurl2.length)>2){
		var url = vurl2[0];
		var data = vurl2[1]+vurl2[2];
	}else{
		var url = vurl2[0];
		var data = vurl2[1];
	}	
	if(vFormaAbrir=="INTERNO"){
		if(file01==""){
			new Ajax.Request(url,
				{	method		:'get',
					parameters	:data,
					onLoading	:estado_cargador(1),
					onComplete	:function(transport){estado_cargador(0);
						$("contenidosprincipal").innerHTML = transport.responseText;
						eval(vfunctionjava);
					}
				}
			)
		}else{
			var data = '&vformaabrir='+vFormaAbrir+'&vformname='+vformname+'&vtitle='+vtitle+'&vwidth='+vwidth+'&vheight='+vheight+'&vposx1='+vposx1+'&vposy1='+vposy1+'&vposx2='+vposx2+'&vposy2='+vposy2+'&vresizable='+vresizable+'&vstyle='+vstyle+'&veffect='+veffect+'&vmodal='+vmodal+'&vopacity='+vopacity+'&vcenter='+vcenter+'&vtitle='+vtitle+"&vfunctionjava="+vfunctionjava+'&idform='+idform+'&opbus='+opbus;
			var param = '?file02='+encodeURIComponent(file02)+'&rand='+myRand+data;
			var vid="Div_Inicial";
			var vidfrm="Frm_Inicial";
			var win = new Window({	id				:vid, 			className		:"mac_os_x",
									blurClassName	:"blur_os_x", 	title			:vtitle,
									width			:700,			height			:400,
									resizable		:false,			closable		:true,
									minimizable		:false,			maximizable		:false,		draggable		:true
						  		});
			win.getContent().innerHTML="<div id='"+vidfrm+"'></div>";
			win.setDestroyOnClose();
			win.showCenter(true);
			win.setConstraint(true, {left:25, right:25, top: 110, bottom:110})
			win.toFront();
			new Ajax.Request(vurl1[0],
				{	method		:'get',
					parameters	:param,
					onLoading	:estado_cargador(1),
					onComplete	:function(transport){estado_cargador(0);
						$(vidfrm).innerHTML = transport.responseText;

						setTimeout("fun_inicial()",500);
					}
				}
			)
		}		
	}else{
		var vid="Div_"+vformname;
		var vidfrm="Frm_"+vformname;
		var win = new Window({	id				:vid, 		 	className		:"mac_os_x", 
								blurClassName	:"blur_os_x", 	title			:vtitle,
								width			:vwidth,		height			:vheight,
								resizable		:false,			closable		:true,
								minimizable		:false,			maximizable		:false,		draggable		:true
						  	});
		win.getContent().innerHTML="<div id='"+vidfrm+"'></div>";
		win.setDestroyOnClose();
		win.showCenter(true);
		win.setConstraint(true, {left:25, right:25, top: 110, bottom:110})
		win.toFront();
		new Ajax.Request(url,
			{	method		:'get',
				parameters	:data,
				onLoading	:estado_cargador(1),
				onComplete	:function(transport){estado_cargador(0);
					$(vidfrm).innerHTML = transport.responseText;
					eval(vfunctionjava);
				}
			}
		)	
	}
}
/*--------------------------------------------------------------------------*/
function WinTollTip(param){
	TooltipManager.init("tooltip",{showEffect: Element.show, hideEffect: Element.hide});
	TooltipManager.addHTML(param[0], param[1]);
}
/*---------------------------------------------------------------------------*/

/*---------------------------------------------------------------------------*/
function fun_inicial(){
	$("codigo").focus();
}  
/*Ext.BLANK_IMAGE_URL = 'extjs/resources/images/default/s.gif';  
   Ext.onReady(function(){  
     var win = new  Ext.Window({
	 	title : "REPORTES",
		width : 400,
		height  : 300,
		minimizable : true,
		maximizable : true,
		bodyStyle : 'background-color:#fff',
		items : [new Ext.tree.TreePanel({
		border :false,
		root : {
			nodeType : 'async',
			text : 'Ext JS',
			draggable : false,
			id : 'source'
				}
		})]
	 }); 
	 win.show();
	 
	 var xim = new Ext.Window({
	 title : "XIM",
	 width : 400,
	 height : 200,
	 minimizable : true,
	 maximizable : true,
	 bodyStyle :'background-color:#fff',
	 items : [new Ext.tree.TreePanel({
	 border : false,
	 root : {
	 	nodeType : 'async',
		text : 'jajaja',
		draggable : false,
		id : 'source'
		 }
	 })]
	 });
	 xim.show();

var xim2 = new  Ext.Window({
	title : 'vamos',
	width : 500,
	height : 200,
	minimizable : true,
	maximizable : true,
	bodyStyle :'background-color:#fff',
	html :'ok'
});
xim2.show();

var xim3 = new Ext.Window({
	title : 'Oye',
	width : 400,
	height : 100,
	minimizable : true,
	maximizable : true
});
xim3.show();
  });  */