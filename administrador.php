<?php
session_start();
$stado = $_SESSION['ACTIVO'];
if ($stado != 'OK') {
    //header("Location:index.php?msn=1");
}
require_once "factory/Parameter.class.php";
require_once "factory/DAOFactory.class.php";

/* $logica = new logica();
  $visitas = $logica->get_visitas();
  $suscriptores = $logica->get_suscriptores(); */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="iconos/Calendar.png" />
            <title>FINANCIERA</title>
            <link rel="stylesheet" type="text/css" href="Extjs/extjs/resources/css/ext-all.css" />  
            <link rel="stylesheet" type="text/css" href="Extjs/extjs/resources/css/xtheme-gray.css" />  
            <link rel="stylesheet" type="text/css" href="Extjs/extjs/resources/css/Spinner.css" />  
            <link type="text/css" rel="Stylesheet" href="css/icons.css" />
            <script type="text/javascript" src="Extjs/extjs/adapter/ext/ext-base.js"></script>  
            <script type="text/javascript" src="Extjs/extjs/ext-all.js"></script>
            <script type="text/javascript" src="Extjs/extjs/locale/ext-lang-es.js"></script>
            <script type="text/javascript" src="Extjs/ux/statusbar/StatusBar.js"> </script>
            <script type="text/javascript" src="Extjs/ux/searchfield/SearchField.js"></script>
            <script type="text/javascript" src="Extjs/ux/Spinner.js"></script>
            <script type="text/javascript" src="Extjs/ux/SpinnerField.js"></script>
            <script type="text/javascript" src="js/xim.js"></script>
            <script type="text/javascript" src="js/windows.js"></script>
            <script type="text/javascript" src="js/view_galery_xim.js"></script>
            <script type="text/javascript">
                function suscriptores(){
                    ximx.show({vnombre:'TRAVEL_SUSCRIPTORES',title:'SUSCRIPTORES',vfile:estadistica_xim.url,data:'op=form_suscriptores',moduleId:'from_suscriptores',vwidth:'535',vheigth:'350'});
                }
            </script>
            <script type="text/javascript">
                Ext.ns('estadistica_xim');
                estadistica_xim={
                    url : 'modulos/inicio/capas/control.php',
                    urlp : 'modulos/personal/capas/control.php',
                    urls : 'modulos/solicitudes/capas/control.php',
                    urle : 'modulos/empresa/capas/control.php',
                    urlc : 'modulos/clientes/capas/control.php',
					urlcre : 'modulos/creditos/capas/control.php',
					urlde : 'modulos/deudas/capas/control.php',
					urlre : 'modulos/recibos/capas/control.php',
					urldia: 'modulos/diagramas/capas/control.php',
					urlcobra: 'modulos/cobradores/capas/control.php',
					urlcomp: 'modulos/compromisos/capas/control.php',
                    chooser:'',
                    init:function(){
                        //EXT_PERBTN.init(Ext.decode('<?php //echo $array; ?>'));
                        Ext.fly('contenico_travel').dom.innerHTML = '';
                        /*Ext.app.treeVum = Ext.extend(Ext.ux.tree.XmlTreeLoader,{
                        id:'xim_travel',
                        processAttributes:function(attr){
                            attr.text = attr.text;
                            attr.loaded = true;
                            attr.expanded = true;
                        }
                    });*/
		
                        var loader = new Ext.tree.TreeLoader({		//Paso 1
                            url:estadistica_xim.url,
                            baseParams:{op:'tree'}
                        });
                        var loader2 = new Ext.tree.TreeLoader({		//Paso 1
                            url:estadistica_xim.url,
                            baseParams:{op:'estadisticas'}
                        });
                        var store = new Ext.data.JsonStore({
                            url:estadistica_xim.url,
                            baseParams:{op:'tree'},
                            root:'data'
                            /*listeners:{
                            'datachanged':function(obj){
                                /*if(parseInt(obj.getCount())>0) Ext.getCmp('vum_pagdiver_btn_consul_pdf').enable();
                                else Ext.getCmp('vum_pagdiver_btn_consul_pdf').disable();*/
                            /*   }
                        }*/
                        });
		
                        this.tree = new Ext.tree.TreePanel({ 		//Paso 2
                            border: false,
                            //autoScroll:true,
                            //store:store,
                            //autoLoad:true,
                            animate:true,
                            dataUrl:estadistica_xim.url,
                            loader:loader, //para fines didácticos he creado el TreeLoader a mano
                            listeners:{
                                'click':function(obj){
                                    estadistica_xim.addTabs(obj);
                                }
                            }
                        });
                        this.tree2 = new Ext.tree.TreePanel({ 		//Paso 2
                            border: false,
                            //autoScroll:true,
                            //store:store,
                            //autoLoad:true,
                            animate:true,
                            dataUrl:estadistica_xim.url,//<--- Así nos crea automáticamente el TreeLoader
                            loader:loader2, //para fines didácticos he creado el TreeLoader a mano
                            listeners:{
                                'click':function(obj){
                                    estadistica_xim.addTabs(obj);
                                }
                            }
                        });
		
                        var root = new Ext.tree.AsyncTreeNode({	//Paso 3
                            text: 'EFREN CORRO VALLE',
                            id:'xim',
                            iconCls:'user_gray'
                        });
                        var root2 = new Ext.tree.AsyncTreeNode({	//Paso 3
                            text: 'EFREN CORRO VALLE',
                            id:'xim2',
                            iconCls:'user_gray'
                        });
		
                        this.tree.setRootNode(root);			//Paso 4
                        this.tree2.setRootNode(root2);			//Paso 4
		
                        //creamos el primer tab
                        var home = new Ext.Panel({
                            title:'Mac',
                            iconCls: 'monitor_off',
                            html: "<div align='center' style='padding:40px;'>Sistema de Prestamo <div></div></div>"
                        });
		
                        this.tabs = new Ext.TabPanel({
                            items: home //le agregamos el primer tab
                        });

                        this.tabs = new Ext.TabPanel({
                            border: false,
                            activeTab: 0 //<--activar el primer tab
                            //items:[home]
                        });
                        this.tabs = new Ext.TabPanel({
                            id:'tab_panel',
                            border: false,
                            //tbar:[{iconCls:'save-icons'}],
                            activeTab: 0,
                            activeItem:0,
                            region:'center',
                            resizeTabs:true,
                            minTabWidth: 150,
                            height:390,
                            enableTabScroll:true, //<-- muestra un scroll para los tabs
                            items:[home]
                        });
                        this.tabs = new Ext.TabPanel({
                            id:'tab_panel',
                            border: false,
                            //tbar:[{iconCls:'save-icons'}],
                            activeTab: 0,
                            activeItem:0,
                            region:'center',
                            resizeTabs:true,
                            minTabWidth: 150,
                            height:390,
                            enableTabScroll:true, //<-- muestra un scroll para los tabs
                            items:[home]
                        });
                        var panel = new Ext.Viewport({
                            title:'PANEL DE ADMINISTRACION',
                            layout:'border',
                            //height:495,
                            //frame:true,
                            items:[
                                {
                                    xtype:'panel',
                                    title:'PANEL DE ADMINISTRACION',
                                    collapsible: true,
                                    region: 'north',
                                    height:160, 
                                    items:[
                                        new Ext.BoxComponent({
					
                                            height: 98, // give north and south regions a height
                                            autoEl: {
                                                // tag: 'div',
                                                html:'<div style="height:100px;background: url(img/sistema_logo.jpg) no-repeat !important; margin-top:10px; margin-left:20px;"><div style="padding-left:95px; padding-top:40px; color: #00557e"><span  style="font-family:Verdana, Arial, Helvetica; font-size:19px;">Sistema de Prestamos</span><div style="float:right; width:350px; height: 70px; margin-top:-30px;"><div><table border="0" style=" text-align:center"><tr><td></td><td style="width:80px;"></td><td style="width:120px;"><img src="img//User.png"></br><p><span class="txt_menu">Usuario: <br>Efren Corro Valle</span></p></td><td><div style="color: #erfge;padding-left:10px;"><a href="validacion/cerrar_session.php"><img src="img//Electricinterruptor.png"></a><br><span class="txt_menu">Cerrar cesión</span></td></tr></table></div></div>'
                                            }
                                        })
                                        ,
                                        {
                                            xtype:'panel',
                                            title:'SISTEMA DE CREDITO'
                                        }
                                    ]
                                }
			
                                ,
                                {
                                    region: 'south',
                                    //contentEl: 'south',
                                    split: true,
                                    height: 100,
                                    minSize: 100,
                                    maxSize: 200,
                                    //title: 'South',
                                    collapsible: true,
                                    margins: '0 0 0 0',
                                    tag: 'div',
                                    html:'<div style="height:60px; background-image:url(img//pie_travel.png); padding-top:15px"><center>Desarrollado por Jimmy Anthony Bazan Solis</center></div>'
                                },
                                this.tabs,
                                {
                                    xtype:'treepanel',
                                    id:'objTreeVum_tramite',
                                    title:'Lista de Contenido',
                                    region:'west',
                                    split:'true',
                                    width:190,
                                    height:360,
                                    margins: '2 2 0 2',
                                    collapsible:true,
                                    autoScroll: true,
                                    rootVisible: false,
                                    root: new Ext.tree.AsyncTreeNode(),
                                    items:[this.tree],
                                    /*loader: new Ext.app.treeVum({
                                        dataUrl:this.url,
                                        baseParams:{p1:'lista_travel'}
                                    }),*/
                                    listeners:{
                                        'render':function(tp){
                                            /*tp.getSelectionModel().on('selectionchange', function(tree, node){
                                                var vid = node.id.split(',');
                                                //vum.evtTre_Click(vid);
                                                //Ext.getCmp('objTreeVum').getRootNode().reload();
                                                //Ext.getCmp('objTreeVum').el.mask('Cargando...', 'x-mask-loading');
                                            });*/
                                        },
                                        click:function(node){
                                            /*var vid = node.id.split(',');
                                            estadistica_xim.addTabs(vid[0]);*/
                                        }
                                    }
                                },
                                {
                                    xtype:'treepanel',
                                    id:'objTreeVum_tramites',
                                    title:'Estadisticas',
                                    region:'east',
                                    split:'true',
                                    width:180,
                                    height:360,
                                    margins: '2 2 0 2',
                                    collapsible:true,
                                    autoScroll: true,
                                    rootVisible: false,
                                    root: new Ext.tree.AsyncTreeNode(),
                                    items:[this.tree2],
                                    /*loader: new Ext.app.treeVum({
                                        dataUrl:this.url,
                                        baseParams:{p1:'lista_travel'}
                                    }),*/
                                    listeners:{
                                        'render':function(tp){
                                            /*tp.getSelectionModel().on('selectionchange', function(tree, node){
                                                var vid = node.id.split(',');
                                                //vum.evtTre_Click(vid);
                                                //Ext.getCmp('objTreeVum').getRootNode().reload();
                                                //Ext.getCmp('objTreeVum').el.mask('Cargando...', 'x-mask-loading');
                                            });*/
                                        },
                                        click:function(node){
                                            /*var vid = node.id.split(',');
                                            estadistica_xim.addTabs(vid[0]);*/
                                        }
                                    }
                                }
                            ],
                            renderTo:'contenico_travel'
                        });			
                        this.tree.getRootNode().expand(true);
                        this.tree2.getRootNode().expand(true);

                    },
                    setRootNode:function(nodo){
                        alert(nodo);
                    },
                    addTabs:function(obj){
                        //var tabs = Ext.getCmp('vum_tabs_op_tram');
                        /*switch(obj.text){
                        case 'Usuarios':
                         */				
                        if(Ext.getCmp(obj.id)==undefined){
                            if(obj.id=='xim')return;
                            switch(obj.id){
                                case 'ESTADISTICA_DATOS_EMP':
                                    var data = 'op=datos_empresa';
                                    ximx.show({title:'Datos de la Empresa',vnombre:'MANT_PER',vfile:estadistica_xim.urle,data:data,moduleId:'from_nuevo',vwidth:'570',vheigth:'430'});
                                    break;
                                case 'ESTADISTICA_CLIENTES':
                                    var data = 'op=get_clientes';
                                    ximx.show({vnombre:obj.id,vfile:estadistica_xim.urlc,data:data,moduleId:'from_'+obj.id});
                                    break;
								case 'ESTADISTICA_CREDITOS':
                                    var data = 'op=get_creditos';
                                    ximx.show({vnombre:obj.id,vfile:estadistica_xim.urlcre,data:data,moduleId:'from_'+obj.id});
                                    break;
								case 'ESTADISTICA_DEUDAS':
                                    var data = 'op=get_deudas';
                                    ximx.show({vnombre:obj.id,vfile:estadistica_xim.urlde,data:data,moduleId:'from_'+obj.id});
                                    break;
								case 'ESTADISTICA_RECIBOS':
                                    var data = 'op=get_recibos';
                                    ximx.show({vnombre:obj.id,vfile:estadistica_xim.urlre,data:data,moduleId:'from_'+obj.id});
                                    break;	  
								case 'COMPROMISOS':
                                    var data = 'op=get_compromisos';
                                    ximx.show({vnombre:obj.id,vfile:estadistica_xim.urlcomp,data:data,moduleId:'from_'+obj.id});
                                    break;
								case 'ESTADISTICA_DIAGRAMA':
                                    var data = 'op=get_diagrama';
                                    ximx.show({vnombre:obj.id,vfile:estadistica_xim.urldia,data:data,moduleId:'from_'+obj.id});
                                    break;     
								case 'ESTADISTICA_DATOS_COBRADOR':
                                    var data = 'op=datos_cobradores';
                                   ximx.show({title:'Listado de Cobradores',vnombre:'MANT_COBR',vfile:estadistica_xim.urlcobra,data:data,moduleId:'from_nuevo',vwidth:'570',vheigth:'430'});
                                    break;        
                                default:

                                break;
                            }
                        }else{ Ext.getCmp('tab_panel').setActiveTab(obj.id);}
                    },
                    addTab2: function(obj){
                        //aquí va el código para agregar un nuevo tab
                        var tab = new Ext.Panel({
                            title:obj.text,
                            id:obj.id,
                            //setActive:false,
                            closable: true, //<-- este tab se puede cerrar
                            iconCls: 'monitor_off',
                            //tbar:[{iconCls:'save-icon'},{iconCls:'spell-icon'},{iconCls:'search-icon'},{iconCls:'send-icon'},{iconCls:'print-icon'}],
                            html: 'Ejemplos xim '+obj.text
                        });
                        this.tabs.add(tab); //con esto le agregamos el tab
                        Ext.getCmp('tab_panel').setActiveTab(obj.id);
                    }
                }
                Ext.onReady(estadistica_xim.init,estadistica_xim);
            </script>
            <script>
                function mostrarImagen(){
                    document.getElementById("divContenedor").innerHTML = '';
                    imagenCodigoURL = document.getElementById('archivo-xim-img');	
                    image  = new Image();
                    image.src = imagenCodigoURL.files.item(0).getAsDataURL();
                    document.getElementById("divContenedor").appendChild(image);		
                }
                function SubMit(){
                    if(confirm('Esta seguro de Guardar la Imagen?')){
                        document.FomrM.submit();
                    }
                }
                function check_xim(obj){
                    if(obj.checked == true){
                        document.getElementById("comb_aerolineas").disabled=false;
                        document.getElementById("txt_subtitulo").disabled=false;
                        document.getElementById("txt_nota").disabled=false;
                        document.getElementById("txt_precio").disabled=false;
                    }else{
                        document.getElementById("comb_aerolineas").disabled=true;
                        document.getElementById("txt_subtitulo").disabled=true;
                        document.getElementById("txt_nota").disabled=true;
                        document.getElementById("txt_precio").disabled=true;
                    }	
                }
                function habilitado(id){
                    document.getElementById("comb_aerolineas").disabled=false;
                    document.getElementById("txt_subtitulo").disabled=false;
                    document.getElementById("txt_nota").disabled=false;
                    document.getElementById("txt_precio").disabled=false;
                    document.getElementById("port").disabled=true;
                    document.getElementById("opcion").value = 'TRAVEL_PORTADA';
                }
                function desabilitados(op,id){
                    
                }
                function ventana_edit_galeria(xim){
                    var myArray = xim.split("|");
                    var id = myArray[0];
                    var cat = myArray[1];
                    var title = 'CARGA IMAGEN';		
                    var win = new Ext.Window({
                        title:title,
                        layout:'fit',
                        id:'xim-vent-galeri-index',
                        width:parseInt(500),
                        height:parseInt(460),
                        resizable: false,
                        modal:true,
                        closable:false,
                        //items: tree
                        html:"<div id='cargar_imagen_gale'></div>",
                        listeners:{
                            'render':function(obj){

                            }
                        },
                        buttons: [
                            {
                                id: 'elim_xim_gale',
                                text: 'Eliminar Imagen',
                                iconCls:'eliminar',
                                handler: function(){
                                    if(!confirm('Esta seguro que desea eliminar la imagen, recuerde que al eliminar la imagen los modulos que la utilizan esta imagen quedaran sin contenido de imagen!')){return;}
                                    Ext.getCmp('xim-vent-galeri-index').el.mask('Cargando...', 'x-mask-loading');
                                    var data = 'op=general_desactivaActivaElimina&opcion=7&id_porta='+id;
                                    Ext.Ajax.request({
                                        url:'bloque_consultas/travel/capas/Control.php',
                                        params:data,
                                        success:function(response,options){
                                            Ext.getCmp('xim-vent-galeri-index').el.unmask();
                                            var msg = Ext.decode(response.responseText);
                                            if(parseInt(msg['est'])==1){
                                                Ext.Msg.show({
                                                    title: 'SIMI', //<- el t�tulo del di�logo
                                                    msg: 'El proceso termino correctamente!', //<- El mensaje
                                                    buttons: Ext.Msg.OK, //<- Botones de SI y NO
                                                    icon: Ext.Msg.INFO  // <- un �cono de error
                                                });
                                                Ext.getCmp('xim-vent-galeri-index').close();
                                                var catego = Ext.getCmp('combo_img_general').getValue();
                                                Ext.getCmp('xim-vista-img').getStore().reload({
                                                    params:{
                                                        op:'lista_imagen',id_cate:catego
                                                    }
                                                });
                                            }else{//
                                                Ext.Msg.show({
                                                    title: 'SIMI',
                                                    msg: 'Ocurrio un Error al tratar de almacenar la informacion, informe al Administrador del Sistema', 
                                                    buttons: Ext.Msg.OK,
                                                    icon: Ext.Msg.ERROR 
                                                });
								
                                            }
                                        }
                                    });

                                },
                                scope: this
                            },
                            {
                                text: 'Salir',
                                iconCls:'salir',
                                handler: function(){ 
                                    Ext.getCmp('xim-vent-galeri-index').close();
                                    /*var catego = Ext.getCmp('combo_img_general').getValue();
                                                    Ext.getCmp('xim-vista-img').getStore().reload({
                                                            params:{
                                                                    op:'lista_imagen',id_cate:catego
                                                            }
                                                    });*/
                                },
                                scope: this
                            }
                        ]
                    });
                    win.show();
                    var data = '';
                    var datas = '?op=edita_imagen_galeri&id='+id+'&cat='+cat;
                    Ext.Ajax.request({
                        url:'bloque_consultas/travel/capas/Control.php'+datas,
                        params:data,
                        success:function(response,options){					
                            //alert(response.responseText);
                            document.getElementById('cargar_imagen_gale').innerHTML =response.responseText;
                            document.getElementById("comb_aerolineas").disabled=true;
                            document.getElementById("txt_subtitulo").disabled=true;
                            document.getElementById("txt_nota").disabled=true;
                            document.getElementById("txt_precio").disabled=true;
                            document.getElementById("port").disabled=true;
                            document.getElementById("archivo-xim-img").disabled=true;
                            document.getElementById("btn_guardar").disabled=true;
                            document.getElementById("txt_nombre").disabled=true;
                            document.getElementById("comb_cate").disabled=true;
                        }
                    });
                }
            </script>
            <style type="text/css">

                fieldset{
                    background-color:#FFFFFF !important;
                    color:#000000 !important;
                    -moz-border-radius: 0 !important;
                }
                body {
                    /*font-family:helvetica,tahoma,verdana,sans-serif;
                    padding:20px;
                padding-top:32px;
                font-size:13px;
                    background-color:#fff !important;*/
                }
                p {
                    margin-bottom:15px;
                }
                h1 {
                    font-size:large;
                    margin-bottom:20px;
                }
                h2 {
                    font-size:14px;
                    color:#333;
                    font-weight:bold;
                    margin:10px 0;
                }
                .example-info{
                    width:150px;
                    border:1px solid #c3daf9;
                    border-top:1px solid #DCEAFB;
                    border-left:1px solid #DCEAFB;
                    background:#ecf5fe url( info-bg.gif ) repeat-x;
                    font-size:10px;
                    padding:8px;
                }
                pre.code{
                    background: #F8F8F8;
                    border: 1px solid #e8e8e8;
                    padding:10px;
                    margin:10px;
                    margin-left:0px;
                    border-left:5px solid #e8e8e8;
                    font-size: 12px !important;
                    line-height:14px !important;
                }
                .msg .x-box-mc {
                    font-size:14px;
                }
                #msg-div {
                    position:absolute;
                    left:35%;
                    top:10px;
                    width:250px;
                    z-index:20000;
                }
                .x-grid3-row-body p {
                    margin:5px 5px 10px 5px !important;
                }
                #img-chooser-dlg .details{
                    padding: 10px;
                    text-align: center;
                }
                #img-chooser-dlg .details-info{
                    border-top: 1px solid #cccccc;
                    font: 11px Arial, Helvetica, sans-serif;
                    margin-top: 5px;
                    padding-top: 5px;
                    text-align: left;
                }
                #img-chooser-dlg .details-info b{
                    color: #555555;
                    display: block;
                    margin-bottom: 4px;
                }
                #img-chooser-dlg .details-info span{
                    display: block;
                    margin-bottom: 5px;
                    margin-left: 5px;
                }

                #img-chooser-view{
                    background: white;
                    font: 11px Arial, Helvetica, sans-serif;
                }
                #img-chooser-view .thumb{
                    background: #dddddd;
                    padding: 3px;
                }
                #img-chooser-view .thumb img{
                    height: 60px;
                    width: 80px;
                }
                #img-chooser-view .thumb-wrap{
                    float: left;
                    margin: 4px;
                    margin-right: 0;
                    padding: 5px;
                }
                #img-chooser-view .thumb-wrap span{
                    display: block;
                    overflow: hidden;
                    text-align: center;
                }
                #img-chooser-view .x-view-over{
                    border:1px solid #dddddd;
                    background: #efefef url(Extjs/resources/images/default/grid/row-over.gif) repeat-x left top;
                    padding: 4px;
                }
                #img-chooser-view .x-view-selected{
                    background: #DFEDFF;
                    border: 1px solid #6593cf;
                    padding: 4px;
                }
                #img-chooser-view .x-view-selected .thumb{
                    background:transparent;
                }
                #img-chooser-view .x-view-selected span{
                    color:#1A4D8F;
                }
                #img-chooser-view .loading-indicator {
                    font-size:11px;
                    background-image:url('Extjs/resources/images/grid/loading.gif');
                    background-repeat: no-repeat;
                    background-position: left;
                    padding-left:20px;
                    margin:10px;
                }	
                .txt_menu{
                    font-family:verdana; color: #00557e;
                    font-size:11px;
                }
            </style>
    </head>
    <body style="background-color:#e3e3e3">
        <div>
            <!-- <div style="height:100px;background: url(img//panel_img_travel.png) no-repeat !important; margin-top:10px; margin-left:20px;">
            <div style="padding-left:130px; padding-top:40px; color: #00557e"><span  style="font-family:Verdana, Arial, Helvetica; font-size:19px;">Panel Administrativo Travel</span></div>
            </div>-->
            <div id="contenico_travel">
            </div>
            <!--<div style="height:60px; background-image:url(img//pie_travel.png)"></div>-->
        </div>
    </body>
</html>