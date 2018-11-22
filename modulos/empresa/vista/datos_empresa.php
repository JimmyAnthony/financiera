<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">

        </style>
    </head>
    <body>
        <script type="text/javascript">	
            Ext.ns("xim.estadistica.empresa");
            xim.estadistica.empresa = {
                div : 'Div_MANT_PER',
                url:'modulos/empresa/capas/control.php',
                id:'xim',
                cod_empresa:'<?php echo $cod_empresa;?>',
				cod_mora:'<?php echo $cod_mora;?>',
                ximModo:0,
                btn:'',
                init: function(){          			
                    //Ext.tip.QuickTips.init();  // enable tooltips
                    //creamos un formulario
                    var clock = new Ext.Toolbar.TextItem('');
                    var chk_model = new Ext.grid.CheckboxSelectionModel({
                        singleSelect:false,
                        checkOnly:false,
                        injectCheckbox :false
                    });
                    var store = new Ext.data.JsonStore({
                        url:this.url,
                        autoLoad:true,
                        baseParams:{op:'get_fecha_no_habiles'},
                        root:'data',
                        fields:['cod_dias_no_hab','fecha','descripcion','flag']
                    }); 
                    /****TAB***/
                    var home = new Ext.Panel({
                        title:'Empresa',
                        iconCls: 'ubicaciones',
						listeners:{
							activate:this.estado_botones_false
						},
                        items:[
                            {
                            xtype:'fieldset',
                            //title:'Buscar Por',
                            border:false,
                            layout:'table',
                            layoutConfig:{
                            columns:2
                            },
                            width:615,
                            items:[
                                {
                                    xtype:'label',
                                    text:'Nombre Empresa:'
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.empresa+'_txt_empresa',
                                        autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $nombre;?>',
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
                                        //allowBlank:false,
                                        listeners:{
                                                keypress:function(obj,e){
                                                        if(e.keyCode==13){

                                                        }
                                                }
                                        }
                                },
                                {
                                xtype:'panel',
                                colspan:2,
                                border:false,
                                height:7
                                },
                                {
                                    xtype:'label',
                                    text:'Sub Titulo:'
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.empresa+'_txt_empresa_sub',
                                        autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
										value:'<?php echo $sub_titulo;?>',
                                        //allowBlank:false,
                                        listeners:{
                                                keypress:function(obj,e){
                                                        if(e.keyCode==13){

                                                        }
                                                }
                                        }
                                },
                                {
                                xtype:'panel',
                                colspan:2,
                                border:false,
                                height:7
                                },
                                {
                                    xtype:'label',
                                    text:'Ciudad:'
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.empresa+'_txt_empresa_ciudad',
                                        autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
										value:'<?php echo $cuidad;?>',
                                        //allowBlank:false,
                                        listeners:{
                                                keypress:function(obj,e){
                                                        if(e.keyCode==13){

                                                        }
                                                }
                                        }
                                },
                                {
                                xtype:'panel',
                                colspan:2,
                                border:false,
                                height:7
                                },
                                {
                                    xtype:'label',
                                    text:'Dirección:'
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.empresa+'_txt_empresa_direc',
                                        autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
										value:'<?php echo $direccion;?>',
                                        //allowBlank:false,
                                        listeners:{
                                                keypress:function(obj,e){
                                                        if(e.keyCode==13){

                                                        }
                                                }
                                        }
                                },
                                {
                                xtype:'panel',
                                colspan:2,
                                border:false,
                                height:7
                                },
                                {
                                    xtype:'label',
                                    text:'Telefono/Otros:'
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.empresa+'_txt_empresa_telf',
                                        autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
										value:'<?php echo $telefono;?>',
                                        //allowBlank:false,
                                        listeners:{
                                                keypress:function(obj,e){
                                                        if(e.keyCode==13){

                                                        }
                                                }
                                        }
                                },
								{
                                xtype:'panel',
                                colspan:2,
                                border:false,
                                height:7
                                },
								{
                                    xtype:'label',
                                    text:'Ruc:'
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.empresa+'_txt_empresa_ruc',
                                        autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
										value:'<?php echo $ruc;?>',
                                        //allowBlank:false,
                                        listeners:{
                                                keypress:function(obj,e){
                                                        if(e.keyCode==13){

                                                        }
                                                }
                                        }
                                },{
                                xtype:'panel',
                                colspan:2,
                                border:false,
                                height:7
                                },
                                {
                                    xtype:'label',
                                    text:'Horario Atención.:'
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.empresa+'_txt_empresa_horario',
                                        autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
										value:'<?php echo $horario;?>',
                                        //allowBlank:false,
                                        listeners:{
                                                keypress:function(obj,e){
                                                        if(e.keyCode==13){

                                                        }
                                                }
                                        }
                                },
                                {
                                xtype:'panel',
                                colspan:2,
                                border:false,
                                width:525,
                                items:[
                                {
                                xtype:'fieldset',
                                //title:'Buscar Por',
                                border:false,
                                layout:'table',
                                layoutConfig:{
                                columns:7
                                },
                                items:[
                                    {
                                    xtype:'label',
                                    text:'Web:'
                                    },
                                    {
                                    xtype:'panel',
                                    border:false,
                                    width:52
                                    },
                                    {
                                            xtype:'textfield',
                                            width:175,
                                            id:xim.estadistica.empresa+'_txt_empresa_web',
                                            autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off'},
                                            //fieldLabel:'Tramite',
                                            enableKeyEvents:true,
                                            selectOnFocus:true,
											value:'<?php echo $web;?>',
                                            //allowBlank:false,
                                            listeners:{
                                                    keypress:function(obj,e){
                                                            if(e.keyCode==13){

                                                            }
                                                    }
                                            }
                                    },
                                    {
                                    xtype:'panel',
                                    border:false,
                                    width:20
                                    },
                                    {
                                    xtype:'label',
                                    text:'Correo:'
                                    },
                                    {
                                    xtype:'panel',
                                    border:false,
                                    width:20
                                    },
                                    {
                                            xtype:'textfield',
                                            id:xim.estadistica.empresa+'_txt_empresa_correo',
                                            width:184,
                                            autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
                                            //fieldLabel:'Tramite',
                                            enableKeyEvents:true,
                                            selectOnFocus:true,
											value:'<?php echo $email;?>',
                                            //allowBlank:false,
                                            listeners:{
                                                    keypress:function(obj,e){
                                                            if(e.keyCode==13){

                                                            }
                                                    }
                                            }
                                    },
                                     {
                                        xtype:'panel',
                                        border:true,
                                        colspan:7,
                                        border:false,
                                        items:[
                                              {
                                                xtype:'fieldset',
                                                //title:'Buscar Por',
                                                border:false,
                                                layout:'table',
                                                layoutConfig:{
                                                columns:3
                                                },
                                                width:500,
                                                items:[
                                                            {
                                                                xtype:'panel',
                                                                border:true,
                                                                width:110,
                                                                height:75,
																html:'<div id="img_empre" style="width:105;heigth:70;"><img src="galeria/empresa/<?php echo $img;?>" id="img_empresa" name="img_empresa" width="105" height="70"/></div>'
                                                            },{
                                                            xtype:'panel',
                                                            border:false,
                                                            width:20
                                                            },{
                                                                xtype: 'tbbutton',
                                                                text: 'Cargar Imagen',
																iconCls:'imagen',
																handler:xim.estadistica.empresa.imagen_empresa,
                                                            }
                                                            ]
                                                         }
                                            ]
                                        }
                                ]
                                }
                            ]
                                }]
                            }
                        ]
                    });
                    var home2 = new Ext.Panel({
                        title:'Interes por Mora',
                        iconCls: 'Spam_Mail',
						listeners:{
							activate:this.estado_botones_false
						},
                        items:[
                            {
                                xtype:'fieldset',
                                title:'Mora',
                                border:true,
                                layout:'table',
                                layoutConfig:{
                                columns:2
                                },
                                width:615,
                                items:[
                                    {
									xtype:'checkbox',
									boxLabel:'Aplica Interes por Mora?',
									id:xim.estadistica.empresa+'check_interes',
									name:'estado',
									colspan:2,
									checked:<?php echo $flag; ?>,
									listeners:{
										check:function(obj, est){
											if(est){
												Ext.getCmp(xim.estadistica.empresa+'spiner_tasa').setDisabled(false);
												Ext.getCmp(xim.estadistica.empresa+'spiner_mora').setDisabled(false);
											}else{
												Ext.getCmp(xim.estadistica.empresa+'spiner_tasa').setDisabled(true);
												Ext.getCmp(xim.estadistica.empresa+'spiner_mora').setDisabled(true);
											}
										}
									}
									},
                                    {
                                    xtype:'panel',
                                    border:false,
                                    colspan:2,
                                    height:10
                                    },
                                     {
                                        xtype:'label',
                                        text:'Taza por Mora %'
                                     },
                                     {
                                        xtype: 'spinnerfield',
                                        fieldLabel: 'Test',
										id:xim.estadistica.empresa+'spiner_tasa',
										disabled:<?php echo $flag2;?>,
                                        //name: 'test',
                                        minValue: 0,
                                        maxValue: 100,
                                        allowDecimals: true,
                                        decimalPrecision: 2,
                                        incrementValue: 1,
                                        value:<?php echo $tasa;?>,
                                        alternateIncrementValue: 2.10,
                                        accelerate: true
                                    },
                                    {
                                    xtype:'panel',
                                    border:false,
                                    colspan:2,
                                    height:10
                                    },
                                    {
                                        xtype:'label',
                                        text:'Cobrar Mora a partir de :'
                                     },
                                     {
                                        xtype: 'spinnerfield',
                                        fieldLabel: 'Test',
                                       id:xim.estadistica.empresa+'spiner_mora',
										disabled:<?php echo $flag2;?>,
                                        minValue: 0,
                                        maxValue: 100,
                                        allowDecimals: false,
                                        decimalPrecision: 1,
                                        incrementValue: 1,
                                        value:<?php echo $tiempo_mora;?>,
                                        alternateIncrementValue: 99,
                                        accelerate: true
                                    },
                                    {
                                    xtype:'panel',
                                    border:false,
                                    colspan:2,
                                    height:10
                                    },
                                    {
                                        xtype:'label',
                                        text:'Las cuotas vencen despues de :'
                                     },
                                     {
                                        xtype: 'spinnerfield',
                                        fieldLabel: 'Test',
                                       id:xim.estadistica.empresa+'spiner_vencimiento',
										disabled:<?php echo $flag2;?>,
                                        minValue: 0,
                                        allowDecimals: false,
                                        decimalPrecision: 1,
                                        incrementValue: 1,
                                        value:<?php echo $vencimiento;?>,
                                        alternateIncrementValue: 99,
                                        accelerate: true
                                    },
                                    {
                                    xtype:'panel',
                                    border:false,
                                    colspan:2,
                                    height:10
                                    },
                                    {
                                        xtype:'panel',
                                        colspan:2,
                                        padding:5,
                                        width:320,
                                        html:'Las moras % se aplicarán a partir de los días que especifiques y se multiplicarán por la cantidad de días vencidos.<br>El vencimiento de las cuotas se aplicarán a partir de los dias que especiciques.'
                                     }
                                ]
                            }
                        ]
                    });
					
                    var home3 = new Ext.Panel({
                        title:'Dias no habiles',
						listeners:{
							activate:this.estado_botones
						},
                        iconCls: 'otros',
						layout:'fit',
                        //width:200,
                        items:[
                            {
                                    xtype:'grid',
                                    store:store,
                                    layout:'fit',
                                    //height:273,
                                    id:xim.estadistica.empresa+'_grid_personal',
                                    columns:[
                                        new Ext.grid.RowNumberer(),
                                        {header:'Fecha',dataIndex:'fecha',width:80},
                                        {header:'Descripcion',dataIndex:'descripcion',width:270},
                                        {header:'Estado',dataIndex:'flag',width:120},
                                        chk_model                        ],
                                    bbar: new Ext.PagingToolbar({
                                        id:'_pager',
                                        store:store,
                                        displayInfo:true,
                                        displayMsg:'{0} - {1} de {2} Fechas no Habiles Para Cobros.',
                                        emptyMsg:'No hay Fechas no Habiles Para Cobros',
                                        pageSize:80,
                                        items: ['',clock]
                                    }),
                                    sm:chk_model,
                                    stripeRows:true,
                                    anchor:'99%',
                                    loadMask:true
                                    /*,
                                        sm: new Ext.grid.RowSelectionModel({
                                                singleSelect:true,
                                                listeners:{
                                                        rowselect:function(sm,row,rec){

                                                        }
                                                }
                                        })*/
                                }
                        ]
                    });
                    this.tabs = new Ext.TabPanel({
                        id:'tab_panel_empresa',
                        border: false,
                        //tbar:[{iconCls:'save-icons'}],
                        activeTab: 0,
                        activeItem:0,
                        region:'center',
                        resizeTabs:true,
                        minTabWidth: 150,
                        height:390,
                        enableTabScroll:true,
                        items:[home,home2,home3]
                    });
                    /**FIN TAB**/
                    this.form = new Ext.form.FormPanel({
                        standardSubmit: true, // traditional submit
                        //url: 'submitform.php',
                        region		: "center",
                        layout:'border',
                        //layout:'fit',
                        margins		: "3 3 3 3",
                        //width		: 750,
                        anchor:'99%',
                        store		: this.store,
                        bodyStyle	: "padding: 2px;",
                        //url			: "recursos_humanos/rrhh_valores/capas/control.php",
                        border		: false,
                        defaults	: {allowBlank: false},
                        items		: [							
                            this.tabs
                        ]	
                    });
                    var ventana = Ext.getCmp(this.div);
                    ventana.add({                
                        //title	: "LISTADO DE VALORES",
						id:xim.estadistica.empresa+'ventana_empresa',
                        layout	: "border",
                        //margins		: "0 0 0 0",
                        /*width	: 600,
                                height	: 400,*/
                        items	: [this.form],
                        listeners:{
                            'render':function(obj){
                                ximx.closep();
                            }
                        }
                        ,buttons:[
                            {
                                text : "Nuevo", 
								id:xim.estadistica.empresa+'btn_nuevo',
                                iconCls:'nuevo',
								disabled:true,
                                scope : this, 
                                listeners:{
									click:function(a,b){
										xim.estadistica.empresa.dias_no_habiles(1,'');
									}
								}
                            },
                            {
                                text : "Editar", 
                                iconCls:'editar',
								disabled:true,
								id:xim.estadistica.empresa+'btn_editar',
                                scope : this, 
                                listeners:{
									click:function(a,b){
										var ximz = Ext.getCmp(xim.estadistica.empresa+'_grid_personal').getSelectionModel().getSelections();
										if(ximz.length <= 0){
											Ext.Msg.show({
												title: 'MAC',
												msg: 'Selecciona almenos un Registro!',
												buttons: Ext.Msg.OK,
												icon: Ext.Msg.WARNING
											});
										}else{
										var dias=ximz[0].get('cod_dias_no_hab');
										xim.estadistica.empresa.dias_no_habiles(2,dias);
										}
									}
								}
                            },
							 {
                                text : "Actualizar", 
                                iconCls:'actualizar',
								disabled:true,
								id:xim.estadistica.empresa+'btn_actualizar',
                                scope : this, 
                                handler:this.actulizar_datos
                            },
							{
                                text : "Activar", 
                                iconCls:'activar',
								disabled:true,
								id:xim.estadistica.empresa+'btn_activar',
                                scope : this, 
                                listeners:{
									click:function(a,b){
										xim.estadistica.empresa.XimRecorre(0);
									}
								}
                            },
							{
                                text : "Desactivar", 
                                iconCls:'desactivar',
								disabled:true,
								id:xim.estadistica.empresa+'btn_desactivar',
                                scope : this, 
                                listeners:{
									click:function(a,b){
										xim.estadistica.empresa.XimRecorre(1);
									}
								}
                            },
                            {
                                text : "Salir", 
                                scope : this, 
                                handler:this.clos,
                                iconCls:'salir'
                            }
                        ]//botones del formulario           	          
                    });    		 
                    ventana.doLayout();
                    //this.tree.getRootNode().expand(); 
                },
                clos:function(){
                    ximx.close('MANT_PER');
                },
				estado_botones:function(){
					Ext.getCmp(xim.estadistica.empresa+'btn_actualizar').setDisabled(true);
					Ext.getCmp(xim.estadistica.empresa+'btn_nuevo').setDisabled(false);
					Ext.getCmp(xim.estadistica.empresa+'btn_editar').setDisabled(false);
					Ext.getCmp(xim.estadistica.empresa+'btn_activar').setDisabled(false);
					Ext.getCmp(xim.estadistica.empresa+'btn_desactivar').setDisabled(false);
				},
				estado_botones_false:function(){
					Ext.getCmp(xim.estadistica.empresa+'btn_actualizar').setDisabled(false);
					Ext.getCmp(xim.estadistica.empresa+'btn_nuevo').setDisabled(true);
					Ext.getCmp(xim.estadistica.empresa+'btn_editar').setDisabled(true);	
					Ext.getCmp(xim.estadistica.empresa+'btn_activar').setDisabled(true);
					Ext.getCmp(xim.estadistica.empresa+'btn_desactivar').setDisabled(true);																				
				},
				actulizar_datos:function(){
				var nombre = Ext.getCmp(xim.estadistica.empresa+'_txt_empresa').getValue();
				var sub_titulo = Ext.getCmp(xim.estadistica.empresa+'_txt_empresa_sub').getValue();
				var ciudad = Ext.getCmp(xim.estadistica.empresa+'_txt_empresa_ciudad').getValue();
				var direccion = Ext.getCmp(xim.estadistica.empresa+'_txt_empresa_direc').getValue();
				var telefono = Ext.getCmp(xim.estadistica.empresa+'_txt_empresa_telf').getValue();
				var ruc = Ext.getCmp(xim.estadistica.empresa+'_txt_empresa_ruc').getValue();
				var horario = Ext.getCmp(xim.estadistica.empresa+'_txt_empresa_horario').getValue();
				var web = Ext.getCmp(xim.estadistica.empresa+'_txt_empresa_web').getValue();
				var correo = Ext.getCmp(xim.estadistica.empresa+'_txt_empresa_correo').getValue();
				var interes = Ext.getCmp(xim.estadistica.empresa+'check_interes').getValue();
				var tasa = Ext.getCmp(xim.estadistica.empresa+'spiner_tasa').getValue();
				var mora = Ext.getCmp(xim.estadistica.empresa+'spiner_mora').getValue();
				var vencimiento = Ext.getCmp(xim.estadistica.empresa+'spiner_vencimiento').getValue();
				interes=(interes)?1:0;
				if(nombre== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese un nombre por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});
            	}				
                if(!confirm('Desea ejecutar el proceso?')){return;}
				Ext.getCmp(xim.estadistica.empresa+'ventana_empresa').el.mask('Cargando...', 'x-mask-loading');	
							
                var data = 'op=set_empresa&nombre='+nombre+'&sub_titulo='+sub_titulo+'&ciudad='+ciudad+'&direccion='+direccion+'&telefono='+telefono+'&ruc='+ruc+'&horario='+horario+'&web='+web+'&correo='+correo+'&flag='+interes+'&tasa='+tasa+'&mora='+mora+'&vencimiento='+vencimiento;
                Ext.Ajax.request({
                    url:xim.estadistica.empresa.url,
                    params:data,
                    success:function(response,options){
                        Ext.getCmp(xim.estadistica.empresa+'ventana_empresa').el.unmask();
                        var msg = Ext.decode(response.responseText);
                        if(parseInt(msg['est'])==1){
                            Ext.Msg.show({
                                title: 'MAC',
                                msg: 'El proceso termino correctamente!',
                                buttons: Ext.Msg.OK,
                                icon: Ext.Msg.INFO
                            });
                        }else{//
                            Ext.Msg.show({
                                title: 'MAC',
                                msg: 'Ocurrio un Error al tratar de almacenar la informacion, informe al Administrador del Sistema',
                                buttons: Ext.Msg.OK,
                                icon: Ext.Msg.ERROR
                            });

                        }
                    }
                });
				},
				dias_no_habiles:function(modo,cod_dia){
					var win = new Ext.Window({  
					title: 'Dias no habiles para Cobros',
					id:'win_dias_habiles',
					width: 300,
					modal:true,
					//layout:'fit',
					height:200,
					items:[
						{
						xtype:'panel',
						border:false,
						bodyStyle	: "padding: 5px;",
						items:[
							{
                            xtype:'panel',
                            //title:'Buscar Por',
                            border:false,
                            bodyStyle	: "padding: 5px;",
                            layout:'table',
                            layoutConfig:{
                            columns:3
                            },
                            items:[
							 	{
                                    xtype:'label',
                                    text:'Fecha:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:20
                                },
								{
								   xtype:'datefield',
								   id:xim.estadistica.empresa+'fecha_dias',
								   fieldLabel:'Fecha',
								   format:'d/m/Y',
								   value:new Date()
								},
								{
                                xtype:'panel',
                                colspan:3,
                                border:false,
                                height:10
                                },
                                {
                                    xtype:'label',
                                    text:'Descripcion:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:20
                                },
                                {
									xtype: 'textarea',
									id:xim.estadistica.empresa+'_descripcion',
									width:180,
									height:80,
									hideLabel: true,
									name: 'msg',
									flex: 1
								}
                            ]
                           }
						]
						}
					],
					buttons:[
						{
							text : "Guadar",
							iconCls:'guardar',
							scope : this,
							listeners:{
								click:function(obj, e){
									xim.estadistica.empresa.actualizar_dias(modo,cod_dia);
								}
							}
						},
						{
							text : "Salir",
							scope : this,
							listeners:{
								click:function(obj, e){
									Ext.getCmp('win_dias_habiles').close();
								}
							},
							iconCls:'salir'
						}
					]//botones del formulario
					});  					 
					win.show();
					if(parseInt(modo)==1)return;
					Ext.getCmp('win_dias_habiles').el.mask('Cargando...', 'x-mask-loading');								
					var data = 'op=get_dias_no_habiles&cod_dia='+cod_dia;
					Ext.Ajax.request({
						url:xim.estadistica.empresa.url,
						params:data,
						success:function(response,options){
							Ext.getCmp('win_dias_habiles').el.unmask();
							var resp = Ext.decode(response.responseText);
							Ext.getCmp(xim.estadistica.empresa+'fecha_dias').setValue(resp['fecha']);
							Ext.getCmp(xim.estadistica.empresa+'_descripcion').setValue(resp['descripcion']);			
						}
					});

				},
				actualizar_dias:function(modo,cod_dia){
					var fecha = Ext.getCmp(xim.estadistica.empresa+'fecha_dias').getValue();
					fecha = fecha.format('Y/m/d');
					var descripcion = Ext.getCmp(xim.estadistica.empresa+'_descripcion').getValue();
					if(fecha== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese una fecha por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});
					return;
            		}
					if(!confirm('Desea ejecutar el proceso?')){return;}
					var data = 'op=set_dias_no_habiles&cod_dia='+cod_dia+'&fecha='+fecha+'&descripcion='+descripcion+'&modo='+modo;
					Ext.getCmp('win_dias_habiles').el.mask('Cargando...', 'x-mask-loading');	
					Ext.Ajax.request({
						url:xim.estadistica.empresa.url,
						params:data,
						success:function(response,options){
							Ext.getCmp('win_dias_habiles').el.unmask();
							var msg = Ext.decode(response.responseText);
							 	if(parseInt(msg['est'])==1){
									Ext.Msg.show({
										title: 'MAC',
										msg: 'El proceso termino correctamente!',
										buttons: Ext.Msg.OK, 
										icon: Ext.Msg.INFO
									});
									Ext.getCmp(xim.estadistica.empresa+'_grid_personal').getStore().reload({
										params:{
											op:'get_fecha_no_habiles'
										}
									});
								}else{//
									Ext.Msg.show({
										title: 'MAC',
										msg: 'Ocurrio un Error al tratar de almacenar la informacion, informe al Administrador del Sistema',
										buttons: Ext.Msg.OK,
										icon: Ext.Msg.ERROR
									});
		
								}		
						}
					});	
				},
				XimRecorre:function(flag){
					var ximz = Ext.getCmp(xim.estadistica.empresa+'_grid_personal').getSelectionModel().getSelections();
					if(ximz.length <= 0){
						Ext.Msg.show({
							title: 'MAC',
							msg: 'Selecciona almenos un Registro!',
							buttons: Ext.Msg.OK,
							icon: Ext.Msg.WARNING
						});
					}else{
						if(!confirm('Desea ejecutar el proceso?')){return;}
						/*****************************/
						var myXIM = new Array();
						/****************************/
						for(var ix=0;ix<ximz.length;++ix){
							myXIM[ix] = ximz[ix].get('cod_dias_no_hab');
						}
						Ext.getCmp(xim.estadistica.empresa+'ventana_empresa').el.mask('Cargando...', 'x-mask-loading');
						var data = 'op=set_activa_desactiva_dias&flag='+parseInt(flag)+'&cod_dias='+myXIM;
						Ext.Ajax.request({
							url:xim.estadistica.empresa.url,
							params:data,
							success:function(response,options){
								Ext.getCmp(xim.estadistica.empresa+'ventana_empresa').el.unmask();
								var msg = Ext.decode(response.responseText);
								if(parseInt(msg['est'])==1){
									Ext.Msg.show({
										title: 'MAC',
										msg: 'El proceso termino correctamente!',
										buttons: Ext.Msg.OK,
										icon: Ext.Msg.INFO
									});
									Ext.getCmp(xim.estadistica.empresa+'_grid_personal').getStore().reload({
										params:{
											op:'get_fecha_no_habiles'
										}
									});
								}else{//
									Ext.Msg.show({
										title: 'MAC',
										msg: 'Ocurrio un Error al tratar de almacenar la informacion, informe al Administrador del Sistema',
										buttons: Ext.Msg.OK,
										icon: Ext.Msg.ERROR
									});
		
								}
							}
						});
					}
				},
				imagen_empresa:function(){
					var win = new Ext.Window({  
					title: 'Imagen Empresa',
					id:'win_imagen_empresa',
					closable:false,
					width: 300,
					modal:true,
					//layout:'fit',
					height:300,
					html:'<iframe name="iframeUpload" style="display:none; height:10px"></iframe><div id="divContenedor" style="border:1px solid;width:280px;height:210px;overflow:auto; clear:both;" align="center"><img src="galeria/empresa/<?php echo $img;?>" style=" padding-top:0px;"/></div><form method="post" action="upload/uploader.php" name="FomrM"  enctype="multipart/form-data" target="iframeUpload"><iframe name="iframeUpload" style="display:none; height:10px"></iframe><input  name="archivo-xim-img" type="file" class="casilla" onChange="mostrarImagen();" id="archivo-xim-img" size="17" style="float:left"/><input type="hidden" name="action" value="image" /><input type="hidden" name="opcion" id="opcion" value="ESTADISTICA_EMPRESA" /><input type="hidden" name="imagen_ok" id="imagen_ok" value="<?php echo $img;?>" /><input type="button" class="button"  value="guardar" onClick="return SubMit();" id="btn_guardar" name="btn_guardar" style="float:left"/></form></fieldset>',
					buttons:[						
						{
							text : "Salir",
							scope : this,
							listeners:{
								click:function(obj, e){
									xim.estadistica.empresa.recarga_img();
								}
							},
							iconCls:'salir'
						}
					]//botones del formulario
					});  					 
					win.show();
				},
				recarga_img:function(){
					Ext.getCmp('win_imagen_empresa').el.mask('Cargando...', 'x-mask-loading');								
					var data = 'op=get_img';
					Ext.Ajax.request({
						url:xim.estadistica.empresa.url,
						params:data,
						success:function(response,options){
							Ext.getCmp('win_imagen_empresa').el.unmask();
							var resp = Ext.decode(response.responseText);
							document.getElementById("img_empre").innerHTML='<img src="galeria/empresa/'+resp['img']+'" id="img_empresa" name="img_empresa" width="105" height="70" />';	
							//document.getElementById("imagen_ok").value=resp['img'];  
							//document.getElementById("divContenedor").innerHTML='<img src="galeria/empresa/'+resp['img']+'"/>';							 
							Ext.getCmp('win_imagen_empresa').close();								
						}
					});
				}
            }
            Ext.onReady(xim.estadistica.empresa.init,xim.estadistica.empresa);

        </script>
    </body>
</html>