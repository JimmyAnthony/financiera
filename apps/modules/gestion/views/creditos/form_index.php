<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('creditos-tab')){
		var creditos = {
			id:'creditos',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/creditos/',
			opcion:'I',
			id_lote:0,
			shi_codigo:0,
			fac_cliente:0,
			lote:0,
			paramsStore:{},
			init:function(){
				Ext.tip.QuickTipManager.init();

				var store_ubigeo = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_ubi', type: 'string'},
	                    {name: 'Distrito', type: 'string'},
	                    {name: 'Provincia', type: 'string'},
	                    {name: 'Departamento', type: 'string'},                    
	                    {name: 'Poblacion', type: 'string'},
	                    {name: 'Superficie', type: 'string'},
	                    {name: 'Y', type: 'string'},
	                    {name: 'X', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: creditos.url+'get_list_ubigeo/',
	                    reader:{
	                        type: 'json',
	                        rootProperty: 'data'
	                    }
	                },
	                listeners:{
	                    load: function(obj, records, successful, opts){
	                        
	                    }
	                }
	            });

	            var store_ubigeo2 = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_ubi', type: 'string'},
	                    {name: 'Distrito', type: 'string'},
	                    {name: 'Provincia', type: 'string'},
	                    {name: 'Departamento', type: 'string'},                    
	                    {name: 'Poblacion', type: 'string'},
	                    {name: 'Superficie', type: 'string'},
	                    {name: 'Y', type: 'string'},
	                    {name: 'X', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: creditos.url+'get_list_ubigeo/',
	                    reader:{
	                        type: 'json',
	                        rootProperty: 'data'
	                    }
	                },
	                listeners:{
	                    load: function(obj, records, successful, opts){
	                        
	                    }
	                }
	            });

	            var store_ubigeo3 = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_ubi', type: 'string'},
	                    {name: 'Distrito', type: 'string'},
	                    {name: 'Provincia', type: 'string'},
	                    {name: 'Departamento', type: 'string'},                    
	                    {name: 'Poblacion', type: 'string'},
	                    {name: 'Superficie', type: 'string'},
	                    {name: 'Y', type: 'string'},
	                    {name: 'X', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: creditos.url+'get_list_ubigeo/',
	                    reader:{
	                        type: 'json',
	                        rootProperty: 'data'
	                    }
	                },
	                listeners:{
	                    load: function(obj, records, successful, opts){
	                        
	                    }
	                }
	            });

				var store_creditos = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_credito', type: 'string'},
	                    {name: 'nombres', type: 'string'},
	                    {name: 'dni', type: 'string'},
	                    {name: 'fecha', type: 'string'},
	                    {name: 'cod_cli', type: 'string'},
	                    {name: 'tasa_interes', type: 'string'},                    
	                    {name: 'cod_metodo', type: 'string'},
	                    {name: 'prestamo', type: 'string'},
	                    {name: 'cuotas', type: 'string'},
	                    {name: 'cod_tipo', type: 'string'},
	                    {name: 'valor_cuota', type: 'string'},
	                    {name: 'fecha_calculo', type: 'string'},
	                    {name: 'total_credito', type: 'string'},
	                    {name: 'nota', type: 'string'},
	                    {name: 'cod_entrega', type: 'string'},
	                    {name: 'fecha_creado', type: 'string'},
	                    {name: 'flag', type: 'string'},
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: creditos.url+'get_credit_list/',
	                    reader:{
	                        type: 'json',
	                        rootProperty: 'data'
	                    }
	                },
	                listeners:{
	                    load: function(obj, records, successful, opts){
	                        
	                    }
	                }
	            });
				
				var store_shipper = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'shi_codigo', type: 'string'},
	                    {name: 'shi_nombre', type: 'string'},
	                    {name: 'shi_logo', type: 'string'},
	                    {name: 'fec_ingreso', type: 'string'},                    
	                    {name: 'shi_estado', type: 'string'},
	                    {name: 'id_creditos', type: 'string'},
	                    {name: 'fecha_actual', type: 'string'}
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: creditos.url+'get_list_shipper/',
	                    reader:{
	                        type: 'json',
	                        rootProperty: 'data'
	                    }
	                },
	                listeners:{
	                    load: function(obj, records, successful, opts){
	                        
	                    }
	                }
	            });
	            var store_contratos = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'fac_cliente', type: 'string'},
	                    {name: 'cod_contrato', type: 'string'},
	                    {name: 'pro_descri', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: creditos.url+'get_list_contratos/',
	                    reader:{
	                        type: 'json',
	                        rootProperty: 'data'
	                    }
	                },
	                listeners:{
	                    load: function(obj, records, successful, opts){
	                        
	                    }
	                }
	            });

	            var store_plantillas = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_plantilla', type: 'string'},
				        {name: 'shi_codigo', type: 'string'},
				        {name: 'fac_cliente', type: 'string'},
				        {name: 'nombre', type: 'string'},
	                    {name: 'cod_formato', type: 'string'},
	                    {name: 'tot_trazos', type: 'string'},
	                    {name: 'path', type: 'string'},
	                    {name: 'img', type: 'string'},
	                    {name: 'pathorigen', type: 'string'},
	                    {name: 'imgorigen', type: 'string'},
	                    {name: 'texto', type: 'string'},
	                    {name: 'estado', type: 'string'},
	                    {name: 'fecha', type: 'string'},
	                    {name: 'usuario', type: 'string'},
	                    {name: 'width', type: 'string'},
	                    {name: 'height', type: 'string'},
	                    {name: 'width_formato', type: 'string'},
	                    {name: 'height_formato', type: 'string'},
	                    {name: 'formato', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: creditos.url+'get_ocr_plantillas/',
	                    reader:{
	                        type: 'json',
	                        rootProperty: 'data'
	                    }
	                },
	                listeners:{
	                    load: function(obj, records, successful, opts){
	                        
	                    }
	                }
	            });

				var store_trazos = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_trazo', type: 'string'},
				        {name: 'cod_plantilla', type: 'string'},
				        {name: 'nombre', type: 'string'},
				        {name: 'tipo', type: 'string'},
	                    {name: 'x', type: 'string'},
	                    {name: 'y', type: 'string'},
	                    {name: 'w', type: 'string'},
	                    {name: 'h', type: 'string'},
	                    {name: 'path', type: 'string'},
	                    {name: 'img', type: 'string'},
	                    {name: 'texto', type: 'string'},
	                    {name: 'estado', type: 'string'},
	                    {name: 'usuario', type: 'string'},
	                    {name: 'fecha', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: creditos.url+'get_ocr_trazos/',
	                    reader:{
	                        type: 'json',
	                        rootProperty: 'data'
	                    }
	                },
	                listeners:{
	                    load: function(obj, records, successful, opts){
	                        
	                    }
	                }
	            });

				var myData = [
				    ['databox_interno_color','databox_interno_color','databox_interno_color','databox_interno_color','databox_interno_color','databox_interno_color']
				];
				var store_estados = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: false,
			        data: myData,
			        fields: ['clase_box1', 'clase_box2', 'clase_box3', 'clase_box4', 'clase_box5', 'clase_box6']
			    });

			    
			    var myDataEstadoCivil = [
					[1,'Soltero'],
				    [2,'Casado'],
				    [3,'Viudo']
				];
				var store_estado_civil = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: true,
			        data: myDataEstadoCivil,
			        fields: ['code', 'name']
			    });

			    var myDataMoneda = [
					['SOL','SOLES'],
				    ['USD','DOLARES']
				];
				var store_moneda = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: true,
			        data: myDataMoneda,
			        fields: ['code', 'name']
			    });
				var myDataSearch = [
					['L','N° Lote'],
					['N','Nombre Lote'],
				    ['A','Nombre Archivo'],
				    ['G','Nombre Archivo Generado'],
				    ['O','Full Text OCR'],
				    ['T','Texto en Trazo OCR']
				];
				var store_search = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'search',
			        autoLoad: true,
			        data: myDataSearch,
			        fields: ['code', 'name']
			    });
				var panel = Ext.create('Ext.form.Panel',{
					id:creditos.id+'-form',
					bodyStyle: 'background: transparent',
					border:false,
					layout:'border',
					defaults:{
						border:false
					},
					tbar:[],
					items:[
					]
				});

				tab.add({
					id:creditos.id+'-tab',
					border:false,
					autoScroll:true,
					closable:true,
					layout:'border',
					items:[
						{
							region:'west',
							layout:'fit',
							width:200,
							border:false,
							items:[
								{
					                id:creditos.id+'-contentMenuClient',
					                layout:'fit',
					                floatable: false,
					                collapsible: false,
					                //split: true,
					                border:false,
					                //bodyPadding: 10,
					                //margin: '5 0 0 0',
					                //width: 0,
					                //hidden:true,
					                //cls: 'cmp_menu',
					                //bodyCls: 'cmp_menu',
					                html:'<div id="menu_spinner" class="spinner"><div class="cube1"></div><div class="cube2"></div></div>',
					                items:[
					                        {
					                            xtype:'MenuViewVert',
					                            id:creditos.id,
					                            mode:2,
					                            tab:creditos.id+'-tabContent',
					                            url:inicio.url+'getDataMenuView/',
					                            params:{sis_id:2}
					                        }
					                    ]
				                }
							]
						},
						{
							region:'center',
							layout:'border',
							border:false,
							items:[
								{
									region:'west',
									layout:'border',
									//hidden:true,
									width:200,
									border:false,
									items:[
										{
											region:'north',
											height:220,
											layout:'fit',
											border:false,
											padding:'5px 5px 5px 5px',
											html: '<img src="/images/menu/usuario.png" style="width:100%; padding:20px;" >'
										},
										{
											region:'center',
											layout:'border',
											border:false,
											items:[
												{
													region:'north',
													height:68,
													border:false,
													layout:'hbox',
													padding:'5px 5px 5px 5px',
													items:[
														{
										                    xtype: 'button',
										                    margin:'2px 2px 2px 2px',
										                    icon: '/images/icon/save.png',
										                    //glyph: 72,
										                    flex:1,
										                    text: 'Guardar',
										                    scale: 'medium',
										                    iconAlign: 'top',
										                    listeners:{
									                            beforerender: function(obj, opts){
									                                /*global.permisos({
									                                    id: 15,
									                                    id_btn: obj.getId(), 
									                                    id_menu: gestion_devolucion.id_menu,
									                                    fn: ['panel_asignar_gestion.limpiar']
									                                });*/
									                            },
									                            click: function(obj, e){	  
									                            	creditos.setSaveSolicitud('I');
									                            }
									                        }
										                },
										                {
										                    xtype: 'button',
										                    margin:'2px 2px 2px 2px',
										                    icon: '/images/icon/Note-Add.png',
										                    //glyph: 72,
										                    flex:1,
										                    text: 'Nuevo',
										                    scale: 'medium',
										                    iconAlign: 'top'
										                }/*,
										                {
										                    xtype: 'button',
										                    margin:'2px 2px 2px 2px',
										                    icon: '/images/icon/Note-Remove.png',
										                    //glyph: 72,
										                    flex:1,
										                    text: 'Desactivar',
										                    scale: 'medium',
										                    iconAlign: 'top'
										                }*/
													]
												},
												{
													region:'center',
													border:false,
													layout:'vbox',
													//border:false,
													items:[
														/*{
													        xtype: 'label',
													        //forId: 'myFieldId',
													        padding:'5px 5px 5px 2px',
													        text: 'My Awesome Field',
													        margin: '0 0 0 10'
													    },
		                                                {
													        xtype: 'label',
													        //forId: 'myFieldId',
													        padding:'0px 5px 5px 2px',
													        text: 'My Awesome Field',
													        margin: '0 0 0 10'
													    },*/
														{
								                            xtype: 'textfield',	
								                            fieldLabel: 'DNI',
								                            bodyStyle: 'background: transparent',
										                    padding:'15px 5px 5px 5px',
								                            id:creditos.id+'-txt-dni',
								                            labelWidth:40,
								                            //readOnly:true,
								                            labelAlign:'left',
								                            labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;",
								                            fieldStyle: 'font-size:25px; text-align: center;font-weight: bold ',
								                            emptyText: 'ENTER',
								                            allowOnlyWhitespace: false,
								                            allowDecimals: false,
								                            allowExponential: false,
								                            allowBlank: true,
								                            maxLength: 8,
								                            width:180,
								                            height:50,
								                            maxLength : 8,
															enforceMaxLength : true,
															maskRe:/[0-9]/,
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
								                        {
													        xtype: 'label',
													        //forId: 'myFieldId',
													        padding:'15px 5px 5px 2px',
													        text: 'Nombres:',
													        margin: '0 0 0 10'
													    },
								                        {
													        xtype: 'label',
													        //forId: 'myFieldId',
													        padding:'5px 5px 5px 2px',
													        text: 'Jimmy Anthony',
													        style: 'font: normal 17px Sans-serif;font-weight: bold',
													        margin: '0 0 0 10'
													    },
													    {
													        xtype: 'label',
													        //forId: 'myFieldId',
													        padding:'10px 5px 5px 2px',
													        text: 'Apellidos:',
													        margin: '0 0 0 10'
													    },
								                        {
													        xtype: 'label',
													        //forId: 'myFieldId',
													        padding:'5px 5px 5px 2px',
													        text: 'Bazán Solis',
													        style: 'font: normal 17px Sans-serif;font-weight: bold;',
													        margin: '0 0 0 10'
													    }
													]
												}
											]
										}
									]
								},
								{
									xtype: 'tabpanel',
									region:'center',
                                    id: creditos.id+'-tabContent',
                                    activeItem: 0,
                                    autoScroll: false,
                                    defaults:{
                                        closable: true,
                                        autoScroll: true
                                    },
                                    border: false,
                                    layout: 'fit',
                                    tabPosition: 'left',
                                    bodyCls: 'transparent',
									items:[
										/*PRINCIPAL*/
										{
											layout:'border',
											id:creditos.id+'-tab-solicitante',
											title:'INFORMACIÓN',
											border:false,
											items:[
												{
													region:'north',
													height:150,
													layout:'border',
													items:[
														{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:50,
															bodyStyle: 'background: #F0EFEF;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'SOLICITUD DE CRÉDITO',
															        style: 'font: normal 25px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},
														{
															region:'center',
															layout:'hbox',
															items:[
																{
										                            xtype:'combo',
										                            fieldLabel: 'Moneda',
										                            bodyStyle: 'background: transparent',
												                    padding:'15px 5px 5px 25px',
										                            id:creditos.id+'-sol-cmb-moneda',
										                            store: store_moneda,
										                            queryMode: 'local',
										                            triggerAction: 'all',
										                            valueField: 'code',
										                            displayField: 'name',
										                            emptyText: '[Seleccione]',
										                            labelAlign:'right',
										                            //allowBlank: false,
										                            labelAlign:'top',
										                            labelWidth: 50,
										                            width:150,
										                            anchor:'100%',
										                            //readOnly: true,
										                            labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                    // obj.getStore().load();
										                                    obj.setValue('SOL');
										                                },
										                                select:function(obj, records, eOpts){
										                        
										                                }
										                            }
										                        },
																{
										                            xtype: 'textfield',	
										                            fieldLabel: 'Monto Solicitado',
										                            id:creditos.id+'-sol-txt-monto',
										                            bodyStyle: 'background: transparent',
												                    padding:'15px 5px 5px 25px',
										                            //id:creditos.id+'-txt-dni',
										                            labelWidth:50,
										                            //readOnly:true,
										                            labelAlign:'top',
										                            width:200,
										                            height:60,
										                            labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
										                            value:'1,444.40',
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                }
										                            }
										                        },
										                        {
										                            xtype: 'textfield',	
										                            fieldLabel: 'Tipo de Cliente',
										                            id:creditos.id+'-sol-txt-tipo-cliente',
										                            bodyStyle: 'background: transparent',
												                    padding:'15px 5px 5px 25px',
										                            //id:creditos.id+'-txt-dni',
										                            labelWidth:50,
										                            //readOnly:true,
										                            labelAlign:'top',
										                            width:200,
										                            height:60,
										                            labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
										                            value:'',
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                }
										                            }
										                        },
										                        {
										                        	xtype:'panel',
										                        	width:180,
										                        	border:false,
										                        	layout:'vbox',
										                        	bodyStyle: 'background: transparent',
												                    padding:'20px 5px 5px 25px',
												                    //width:200,
										                        	items:[
										                        		{
												                        	xtype:'panel',
												                        	border:false,
												                        	layout:'hbox',
												                        	padding:'0px 0px 0px 10px',
												                        	items:[
												                        		{
																			        xtype: 'label',
																			        //forId: 'myFieldId',
																			        text: 'EXCEPCIÓN:',
																			        style: 'font: normal 17px Sans-serif;font-weight: bold;',
																			        //padding:'15px 5px 5px 25px',
																			        width:'100%',
														                            anchor:'100%'
																			    }
												                        	]
												                        },
												                        {
												                        	xtype:'panel',
												                        	border:false,
												                        	layout:'hbox',
												                        	padding:'5px 0px 0px 0px',
												                        	items:[
												                        		{
																			        xtype: 'checkboxfield',
																			        id:creditos.id+'-sol-chk-excepcion-si',
																			        name: 'checkbox1',
																			        fieldLabel: 'SI',
																			        labelWidth:40,
																			        //boxLabel: 'box label',
																			        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																			    },
																			    {
																			        xtype: 'checkboxfield',
																			        id:creditos.id+'-sol-chk-excepcion-no',
																			        name: 'checkbox1',
																			        fieldLabel: 'NO',
																			        labelWidth:40,
																			        //boxLabel: 'box label',
																			        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																			    }
												                        	]
												                        }
										                        	]
										                        },
										                        {
															        xtype: 'datefield',
															        id:creditos.id+'-sol-date-fecha',
															        padding:'15px 5px 5px 25px',
															        //name: 'date1',
															        labelAlign:'top',
															        width:200,
										                            height:60,
															        labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
								                            		fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
															        fieldLabel: 'Date Field',
															        value:'22/01/2019'
															    }	
															]
														}
													]
												},
												{
													region:'west',
													layout:'border',
													width:'50%',
													items:false,
													items:[
														{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:50,
															bodyStyle: 'background: #F0EFEF;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'INFORMACIÓN DEL SOLICITANTE',
															        style: 'font: normal 18px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},
														{
															region:'center',
															//layout:'border',
															items:[
																{
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																		{
												                            xtype: 'textfield',
												                            id:creditos.id+'-sol-txt-apellido-paterno',
												                            fieldLabel: 'Apellido Paterno',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:'50%',
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'BAZÁN',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-sol-txt-apellido-materno',
												                            fieldLabel: 'Apellido Materno',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:'50%',
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'SOLIS',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
														                {
												                            xtype: 'textfield',
												                            fieldLabel: 'Nombres',
												                            id:creditos.id+'-sol-txt-nombres',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:'100%',
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'JIMMY ANTHONY',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-sol-txt-doc-dni',
												                            fieldLabel: 'DNI',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'44949730',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-sol-txt-doc-ce',
												                            fieldLabel: 'CE',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-sol-txt-doc-cip',
												                            fieldLabel: 'CIP',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-sol-txt-doc-ruc',
												                            fieldLabel: 'RUC',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-sol-txt-doc-cm',
												                            fieldLabel: 'CM',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }/*
														                {
												                            xtype: 'textfield',
												                            fieldLabel: 'DNI/CE/CIP/RUC/CM',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'10449497304',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }*/
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																		{
												                            xtype:'combo',
												                            fieldLabel: 'Estado Civil',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            id:creditos.id+'-sol-cmb-estado-civil',
												                            store: store_estado_civil,
												                            queryMode: 'local',
												                            triggerAction: 'all',
												                            valueField: 'code',
												                            displayField: 'name',
												                            emptyText: '[Seleccione]',
												                            labelAlign:'right',
												                            //allowBlank: false,
												                            labelAlign:'top',
												                            labelWidth: 50,
												                            width:150,
												                            anchor:'100%',
												                            //readOnly: true,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                    // obj.getStore().load();
												                                    obj.setValue(1);
												                                },
												                                select:function(obj, records, eOpts){
												                        
												                                }
												                            }
												                        },
																		{
																	        xtype: 'datefield',
																	        id:creditos.id+'-sol-date-fecha-nac',
																	        padding:'5px 5px 5px 5px',
																	        //name: 'date1',
																	        labelAlign:'top',
																	        flex:1,
												                            height:40,
																	        labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
																	        fieldLabel: 'Fecha de Nacimiento',
																	        value:'22/01/2019'
																	    },
												                        {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-sol-txt-tel-cel',
												                            fieldLabel: 'Teléfono Fijo/N° Celular',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'987827171',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																		{
																	        xtype: 'label',
																	        //forId: 'myFieldId',
																	        text: 'Domicilio Actual:',
																	        style: 'font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold',
																	        padding:'26px 10px 5px 5px',
																	        width:170,
																	        //flex:1,
												                            anchor:'100%'
																	    },
																		{
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-sol-chk-domi-propio',
																	        name: 'checkbox1',
																	        fieldLabel: 'Propio',
																	        labelAlign:'top',
																	        padding:'5px 10px 5px 5px',
																	        labelWidth:100,
																	        flex:1,
																	        //boxLabel: 'Domicilio Actual',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    },
																	    {
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-sol-chk-domi-pagando',
																	        name: 'checkbox1',
																	        fieldLabel: 'Pagandolo',
																	        labelAlign:'top',
																	        padding:'5px 5px 5px 5px',
																	        labelWidth:40,
																	        flex:1,
																	        //boxLabel: 'box label',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    },
																	    {
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-sol-chk-domi-alquilado',
																	        name: 'checkbox1',
																	        fieldLabel: 'Alquilado',
																	        labelAlign:'top',
																	        padding:'5px 5px 5px 5px',
																	        labelWidth:40,
																	        flex:1,
																	        //boxLabel: 'box label',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    },
																	    {
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-sol-chk-domi-familiar',
																	        name: 'checkbox1',
																	        fieldLabel: 'Familiar',
																	        labelAlign:'top',
																	        padding:'5px 5px 5px 5px',
																	        labelWidth:40,
																	        flex:1,
																	        //boxLabel: 'box label',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
														                {
												                            xtype: 'textfield',
												                            fieldLabel: 'Avenida/Calle/Jirón/Pasaje',
												                            id:creditos.id+'-sol-txt-dir-direccion',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',
												                            id:creditos.id+'-sol-txt-dir-numero',
												                            fieldLabel: 'N°',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:50,
												                            //flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',
												                            id:creditos.id+'-sol-txt-dir-mz',
												                            fieldLabel: 'MZ',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:50,
												                            //flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',
												                            id:creditos.id+'-sol-txt-dir-lt',
												                            fieldLabel: 'LT',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:50,
												                            //flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',
												                            id:creditos.id+'-sol-txt-dir-dpto',
												                            fieldLabel: 'DPTO',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:50,
												                            //flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',
												                            id:creditos.id+'-sol-txt-dir-interior',
												                            fieldLabel: 'INT.',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:50,
												                            //flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
														                {
												                            xtype: 'textfield',
												                            id:creditos.id+'-sol-txt-dir-urb',
												                            fieldLabel: 'Urbanización/AA.HH/PJ/ASOC',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',
												                            id:creditos.id+'-sol-txt-dir-referencia',
												                            fieldLabel: 'Referencia de Domicilio',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																		{
						                                                    xtype:'combo',
						                                                    fieldLabel: 'Departamento',
						                                                    id:creditos.id+'-sol-cmb-departamento',
						                                                    store: store_ubigeo,
						                                                    queryMode: 'local',
						                                                    triggerAction: 'all',
						                                                    valueField: 'cod_ubi',
						                                                    displayField: 'Departamento',
						                                                    emptyText: '[Seleccione]',
						                                                    labelAlign:'right',
						                                                    //allowBlank: false,
						                                                    labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
						                                                    anchor:'100%',
						                                                    padding:'5px 10px 5px 5px',
						                                                    //readOnly: true,
						                                                    listeners:{
						                                                        afterrender:function(obj, e){
						                                                			Ext.getCmp(creditos.id+'-sol-cmb-provincia').getStore().removeAll();
						                                                			Ext.getCmp(creditos.id+'-sol-cmb-Distrito').getStore().removeAll();
						                                                        	creditos.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,'100101');
						                                                            // obj.getStore().load();
						                                                            //Ext.getCmp(creditos.id+'-txt-estado-filter').setValue('U');
						                                                        },
						                                                        select:function(obj, records, eOpts){
						                                                			var pro = Ext.getCmp(creditos.id+'-sol-cmb-provincia');
						                                                			Ext.getCmp(creditos.id+'-sol-cmb-provincia').setValue('');
						                                                			Ext.getCmp(creditos.id+'-sol-cmb-Distrito').getStore().removeAll();
						                                                			Ext.getCmp(creditos.id+'-sol-cmb-Distrito').setValue('');
						                                                        	creditos.getUbigeo({VP_OP:'P',VP_VALUE:obj.getValue()},pro,'');
						                                                        }
						                                                    }
						                                                },
						                                                {
						                                                    xtype:'combo',
						                                                    fieldLabel: 'Provincia',
						                                                    id:creditos.id+'-sol-cmb-provincia',
						                                                    store: store_ubigeo2,
						                                                    queryMode: 'local',
						                                                    triggerAction: 'all',
						                                                    valueField: 'cod_ubi',
						                                                    displayField: 'Provincia',
						                                                    emptyText: '[Seleccione]',
						                                                    labelAlign:'right',
						                                                    //allowBlank: false,
						                                                    labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
						                                                    anchor:'100%',
						                                                    padding:'5px 10px 5px 5px',
						                                                    //readOnly: true,
						                                                    listeners:{
						                                                        afterrender:function(obj, e){
						                                                			Ext.getCmp(creditos.id+'-sol-cmb-Distrito').getStore().removeAll();
						                                                        	creditos.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},obj,'100601');
						                                                        },
						                                                        select:function(obj, records, eOpts){
						                                                			var dis=Ext.getCmp(creditos.id+'-sol-cmb-Distrito');
						                                                        	creditos.getUbigeo({VP_OP:'X',VP_VALUE:obj.getValue()},dis,'');
						                                                        }
						                                                    }
						                                                },
						                                                {
						                                                    xtype:'combo',
						                                                    fieldLabel: 'Distrito',
						                                                    id:creditos.id+'-sol-cmb-Distrito',
						                                                    store: store_ubigeo3,
						                                                    queryMode: 'local',
						                                                    triggerAction: 'all',
						                                                    valueField: 'cod_ubi',
						                                                    displayField: 'Distrito',
						                                                    emptyText: '[Seleccione]',
						                                                    labelAlign:'right',
						                                                    //allowBlank: false,
						                                                    labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
						                                                    anchor:'100%',
						                                                    padding:'5px 10px 5px 5px',
						                                                    //readOnly: true,
						                                                    listeners:{
						                                                        afterrender:function(obj, e){
						                                                        	creditos.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
						                                                            // obj.getStore().load();
						                                                            //Ext.getCmp(creditos.id+'-txt-estado-filter').setValue('U');
						                                                        },
						                                                        select:function(obj, records, eOpts){
						                                                
						                                                        }
						                                                    }
						                                                }
																	]
																}
															]
														}
													]
												},
												{
													region:'center',
													layout:'border',
													border:false,
													items:[
														{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:50,
															bodyStyle: 'background: #F0EFEF;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'DOCUMENTOS ADJUNTOS',
															        style: 'font: normal 18px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},
														{
															region:'center',
															layout:'fit',
															items:[
																{
														            xtype: 'dataview',
														            tpl: [
														                '<tpl for=".">',
														                    '<div class="dataview-multisort-item">',
														                        '<img src="resources/images/touch-icons/{thumb}" />',
														                        '<h3>{name}</h3>',
														                    '</div>',
														                '</tpl>'
														            ],
														            /*plugins: {
														                xclass: 'Ext.ux.DataView.Animated'
														            },*/
														            itemSelector: 'div.dataview-multisort-item',
														            store:store_search,
														            /*store: Ext.create('Ext.data.Store', {
														                autoLoad: true,
														                sortOnLoad: true,
														                fields: ['name', 'thumb', 'url', 'type'],
														                proxy: {
														                    type: 'ajax',
														                    url : 'resources/data/sencha-touch-examples.json',
														                    reader: {
														                        type: 'json',
														                        rootProperty: ''
														                    }
														                }
														            })*/
														        }
															]
														}
													]
												}
											]
										},
										/*LABORAL*/
										{
											layout:'border',
											id:creditos.id+'-tab-laboral',
											title:'LABORAL',
											border:false,
											items:[
												{
													region:'center',
													layout:'border',
													items:[
														{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:50,
															bodyStyle: 'background: #F0EFEF;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'INFORMACIÓN LABORAL DEL SOLICITANTE',
															        style: 'font: normal 25px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},
														{
															region:'center',
															layout:'border',
															items:[
																{
																	region:'center',
																	border:false,
																	items:[
																		{
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																                {
														                            xtype: 'textfield',
														                            id:creditos.id+'-lab-txt-dir-direccion',
														                            fieldLabel: 'Avenida/Calle/Jirón/Pasaje',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield',
														                            id:creditos.id+'-lab-txt-dir-numero',
														                            fieldLabel: 'N°',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            width:50,
														                            //flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield',
														                            id:creditos.id+'-lab-txt-dir-mz',
														                            fieldLabel: 'MZ',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            width:50,
														                            //flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield',
														                            id:creditos.id+'-lab-txt-dir-lt',
														                            fieldLabel: 'LT',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            width:50,
														                            //flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield',
														                            id:creditos.id+'-lab-txt-dir-dpto',
														                            fieldLabel: 'DPTO',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            width:50,
														                            //flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield',
														                            id:creditos.id+'-lab-txt-dir-interior',
														                            fieldLabel: 'INT.',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            width:50,
														                            //flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																                {
														                            xtype: 'textfield',
														                            id:creditos.id+'-lab-txt-dir-urb',
														                            fieldLabel: 'Urbanización/AA.HH/PJ/ASOC',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield',
														                            id:creditos.id+'-lab-txt-dir-referencia',
														                            fieldLabel: 'Referencia de Domicilio / Fiscal',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																				{
								                                                    xtype:'combo',
								                                                    fieldLabel: 'Departamento',
								                                                    id:creditos.id+'-lab-cmb-departamento',
								                                                    store: store_ubigeo,
								                                                    queryMode: 'local',
								                                                    triggerAction: 'all',
								                                                    valueField: 'cod_ubi',
								                                                    displayField: 'Departamento',
								                                                    emptyText: '[Seleccione]',
								                                                    labelAlign:'right',
								                                                    //allowBlank: false,
								                                                    labelAlign:'top',
														                            //width:'100%',
														                            flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
								                                                    anchor:'100%',
								                                                    padding:'5px 10px 5px 5px',
								                                                    //readOnly: true,
								                                                    listeners:{
								                                                        afterrender:function(obj, e){
								                                                			Ext.getCmp(creditos.id+'-lab-cmb-provincia').getStore().removeAll();
								                                                			Ext.getCmp(creditos.id+'-lab-cmb-Distrito').getStore().removeAll();
								                                                        	creditos.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,'100101');
								                                                            // obj.getStore().load();
								                                                            //Ext.getCmp(creditos.id+'-txt-estado-filter').setValue('U');
								                                                        },
								                                                        select:function(obj, records, eOpts){
								                                                			var pro = Ext.getCmp(creditos.id+'-lab-cmb-provincia');
								                                                			Ext.getCmp(creditos.id+'-lab-cmb-provincia').setValue('');
								                                                			Ext.getCmp(creditos.id+'-lab-cmb-Distrito').getStore().removeAll();
								                                                			Ext.getCmp(creditos.id+'-lab-cmb-Distrito').setValue('');
								                                                        	creditos.getUbigeo({VP_OP:'P',VP_VALUE:obj.getValue()},pro,'');
								                                                        }
								                                                    }
								                                                },
								                                                {
								                                                    xtype:'combo',
								                                                    fieldLabel: 'Provincia',
								                                                    id:creditos.id+'-lab-cmb-provincia',
								                                                    store: store_ubigeo2,
								                                                    queryMode: 'local',
								                                                    triggerAction: 'all',
								                                                    valueField: 'cod_ubi',
								                                                    displayField: 'Provincia',
								                                                    emptyText: '[Seleccione]',
								                                                    labelAlign:'right',
								                                                    //allowBlank: false,
								                                                    labelAlign:'top',
														                            //width:'100%',
														                            flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
								                                                    anchor:'100%',
								                                                    padding:'5px 10px 5px 5px',
								                                                    //readOnly: true,
								                                                    listeners:{
								                                                        afterrender:function(obj, e){
								                                                			Ext.getCmp(creditos.id+'-lab-cmb-Distrito').getStore().removeAll();
								                                                        	creditos.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},obj,'100601');
								                                                        },
								                                                        select:function(obj, records, eOpts){
								                                                			var dis=Ext.getCmp(creditos.id+'-lab-cmb-Distrito');
								                                                        	creditos.getUbigeo({VP_OP:'X',VP_VALUE:obj.getValue()},dis,'');
								                                                        }
								                                                    }
								                                                },
								                                                {
								                                                    xtype:'combo',
								                                                    fieldLabel: 'Distrito',
								                                                    id:creditos.id+'-lab-cmb-Distrito',
								                                                    store: store_ubigeo3,
								                                                    queryMode: 'local',
								                                                    triggerAction: 'all',
								                                                    valueField: 'cod_ubi',
								                                                    displayField: 'Distrito',
								                                                    emptyText: '[Seleccione]',
								                                                    labelAlign:'right',
								                                                    //allowBlank: false,
								                                                    labelAlign:'top',
														                            //width:'100%',
														                            flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
								                                                    anchor:'100%',
								                                                    padding:'5px 10px 5px 5px',
								                                                    //readOnly: true,
								                                                    listeners:{
								                                                        afterrender:function(obj, e){
								                                                        	creditos.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
								                                                            // obj.getStore().load();
								                                                            //Ext.getCmp(creditos.id+'-txt-estado-filter').setValue('U');
								                                                        },
								                                                        select:function(obj, records, eOpts){
								                                                
								                                                        }
								                                                    }
								                                                }
																			]
																		},
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																                {
														                            xtype: 'textfield',
														                            id:creditos.id+'-lab-txt-giro-negocio',
														                            fieldLabel: 'Giro del Negocio',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield',
														                            id:creditos.id+'-lab-txt-ant-negocio',
														                            fieldLabel: 'Antiguedad del Negocio',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            width:200,
														                            //flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
														                        {
														                            xtype: 'textfield',
														                            id:creditos.id+'-lab-txt-obs',
														                            fieldLabel: 'Observación Adicional',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        }
														                    ]
														                }
																	]
																},
																{
																	region:'east',
																	layout:'border',
																	width:'50%',
																	items:[
																		{
																			region:'north',
																			xtype:'panel',
																			layout:'hbox',
																			border:false,
																			height:50,
																			bodyStyle: 'background: #F0EFEF;text-align:center;',
																			//layout:'fit',
																			items:[
																				{
																			        xtype: 'label',
																			        //forId: 'myFieldId',
																			        text: 'CROQUIS',
																			        style: 'font: normal 25px Sans-serif;font-weight: bold;',
																			        padding:'15px 5px 5px 25px',
																			        width:'100%',
														                            anchor:'100%'
																			    }
																			]
																		},
																		{
																			region:'center',
																			items:[]
																		}
																	]
																}
															]
														}
													]
												}
											]
										},
										/*CONYUGUE*/
										{
											layout:'border',
											id:creditos.id+'-tab-conyuge',
											title:'CONYUGUE',
											border:false,
											items:[
												{
													region:'west',
													layout:'border',
													width:'50%',
													items:false,
													items:[
														{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:50,
															bodyStyle: 'background: #F0EFEF;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'INFORMACIÓN DE CONYUGUE',
															        style: 'font: normal 18px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},
														{
															region:'center',
															//layout:'border',
															items:[
																{
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																		{
												                            xtype: 'textfield',
												                            id:creditos.id+'-conyu-txt-apellido-paterno',
												                            fieldLabel: 'Apellido Paterno',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:'50%',
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'BAZÁN',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-conyu-txt-apellido-materno',
												                            fieldLabel: 'Apellido Materno',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:'50%',
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'SOLIS',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
														                {
												                            xtype: 'textfield',
												                            id:creditos.id+'-conyu-txt-nombres',
												                            fieldLabel: 'Nombres',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:'100%',
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'JIMMY ANTHONY',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-conyu-txt-dni',
												                            fieldLabel: 'DNI',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'44949730',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-conyu-txt-ce',
												                            fieldLabel: 'CE',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-conyu-txt-cip',
												                            fieldLabel: 'CIP',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-conyu-txt-ruc',
												                            fieldLabel: 'RUC',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-conyu-txt-cm',
												                            fieldLabel: 'CM',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }/*
														                {
												                            xtype: 'textfield',
												                            fieldLabel: 'DNI/CE/CIP/RUC/CM',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'10449497304',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }*/
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																		{
												                            xtype:'combo',
												                            id:creditos.id+'-conyu-cmb-estado-civil',
												                            fieldLabel: 'Estado Civil',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-cmb-estado-civil',
												                            store: store_estado_civil,
												                            queryMode: 'local',
												                            triggerAction: 'all',
												                            valueField: 'code',
												                            displayField: 'name',
												                            emptyText: '[Seleccione]',
												                            labelAlign:'right',
												                            //allowBlank: false,
												                            labelAlign:'top',
												                            labelWidth: 50,
												                            width:150,
												                            anchor:'100%',
												                            //readOnly: true,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                    // obj.getStore().load();
												                                    obj.setValue(1);
												                                },
												                                select:function(obj, records, eOpts){
												                        
												                                }
												                            }
												                        },
																		{
																	        xtype: 'datefield',
																	        id:creditos.id+'-conyu-date-fecha-nacimiento',
																	        padding:'5px 5px 5px 5px',
																	        //name: 'date1',
																	        labelAlign:'top',
																	        flex:1,
												                            height:40,
																	        labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
																	        fieldLabel: 'Fecha de Nacimiento',
																	        value:'22/01/2019'
																	    },
												                        {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-conyu-txt-telefonos',
												                            fieldLabel: 'Teléfono Fijo/N° Celular',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'987827171',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																		/*{
																	        xtype: 'label',
																	        //forId: 'myFieldId',
																	        text: 'Domicilio Actual:',
																	        style: 'font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold',
																	        padding:'26px 10px 5px 5px',
																	        width:170,
																	        //flex:1,
												                            anchor:'100%'
																	    },*/
																		{
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-conyu-chk-sts-contratado',
																	        name: 'checkbox1',
																	        fieldLabel: 'Contratado',
																	        labelAlign:'top',
																	        padding:'5px 10px 5px 5px',
																	        labelWidth:100,
																	        flex:1,
																	        //boxLabel: 'Domicilio Actual',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    },
																	    {
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-conyu-chk-sts-dependiente',
																	        name: 'checkbox1',
																	        fieldLabel: 'Dependiente',
																	        labelAlign:'top',
																	        padding:'5px 5px 5px 5px',
																	        labelWidth:40,
																	        flex:1,
																	        //boxLabel: 'box label',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    },
																	    {
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-conyu-chk-sts-independiente',
																	        name: 'checkbox1',
																	        fieldLabel: 'Independiente',
																	        labelAlign:'top',
																	        padding:'5px 5px 5px 5px',
																	        labelWidth:40,
																	        flex:1,
																	        //boxLabel: 'box label',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    },
																	    {
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-conyu-chk-sts-otros',
																	        name: 'checkbox1',
																	        fieldLabel: 'Otros',
																	        labelAlign:'top',
																	        padding:'5px 5px 5px 5px',
																	        labelWidth:40,
																	        flex:1,
																	        //boxLabel: 'box label',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																		/*{
																	        xtype: 'label',
																	        //forId: 'myFieldId',
																	        text: 'Domicilio Actual:',
																	        style: 'font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold',
																	        padding:'26px 10px 5px 5px',
																	        width:170,
																	        //flex:1,
												                            anchor:'100%'
																	    },*/
																		{
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-conyu-chk-estu-bachiller',
																	        name: 'checkbox1',
																	        fieldLabel: 'Bachiller',
																	        labelAlign:'top',
																	        padding:'5px 10px 5px 5px',
																	        labelWidth:100,
																	        flex:1,
																	        //boxLabel: 'Domicilio Actual',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    },
																	    {
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-conyu-chk-estu-tecnologia',
																	        name: 'checkbox1',
																	        fieldLabel: 'Tecnología',
																	        labelAlign:'top',
																	        padding:'5px 5px 5px 5px',
																	        labelWidth:40,
																	        flex:1,
																	        //boxLabel: 'box label',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    },
																	    {
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-conyu-chk-estu-titulado',
																	        name: 'checkbox1',
																	        fieldLabel: 'Titulado',
																	        labelAlign:'top',
																	        padding:'5px 5px 5px 5px',
																	        labelWidth:40,
																	        flex:1,
																	        //boxLabel: 'box label',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    },
																	    {
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-conyu-chk-estu-magister',
																	        name: 'checkbox1',
																	        fieldLabel: 'Magister',
																	        labelAlign:'top',
																	        padding:'5px 5px 5px 5px',
																	        labelWidth:40,
																	        flex:1,
																	        //boxLabel: 'box label',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-conyu-txt-profesion',
												                            fieldLabel: 'Profesión',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-conyu-txt-centro-trab',
												                            fieldLabel: 'Centro de Trabajo Actual',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-conyu-txt-cargo',
												                            fieldLabel: 'Cargo que Ocupa',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'44949730',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
																	        xtype: 'datefield',
																	        id:creditos.id+'-conyu-date-fecha-ingreso',
																	        padding:'5px 5px 5px 5px',
																	        //name: 'date1',
																	        labelAlign:'top',
																	        width:200,
												                            height:40,
																	        labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
																	        fieldLabel: 'Fecha de Ingreso',
																	        value:'22/01/2019'
																	    }
												                    ]
												                }
															]
														}
													]
												},
												{
													region:'center',
													layout:'border',
													border:false,
													items:[
														{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:50,
															bodyStyle: 'background: #F0EFEF;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'DOCUMENTOS ADJUNTOS',
															        style: 'font: normal 18px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},
														{
															region:'center',
															layout:'fit',
															items:[
																{
														            xtype: 'dataview',
														            tpl: [
														                '<tpl for=".">',
														                    '<div class="dataview-multisort-item">',
														                        '<img src="resources/images/touch-icons/{thumb}" />',
														                        '<h3>{name}</h3>',
														                    '</div>',
														                '</tpl>'
														            ],
														            /*plugins: {
														                xclass: 'Ext.ux.DataView.Animated'
														            },*/
														            itemSelector: 'div.dataview-multisort-item',
														            store:store_search,
														            /*store: Ext.create('Ext.data.Store', {
														                autoLoad: true,
														                sortOnLoad: true,
														                fields: ['name', 'thumb', 'url', 'type'],
														                proxy: {
														                    type: 'ajax',
														                    url : 'resources/data/sencha-touch-examples.json',
														                    reader: {
														                        type: 'json',
														                        rootProperty: ''
														                    }
														                }
														            })*/
														        }
															]
														}
													]
												}
											]
										},
										/*GARANTE*/
										{
											layout:'border',
											id:creditos.id+'-tab-garante',
											title:'GARANTE',
											border:false,
											items:[
												{
													region:'west',
													layout:'border',
													width:'50%',
													items:false,
													items:[
														{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:50,
															bodyStyle: 'background: #F0EFEF;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'INFORMACIÓN DEL GARANTE',
															        style: 'font: normal 18px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},
														{
															region:'center',
															//layout:'border',
															items:[
																{
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																		{
												                            xtype: 'textfield',
												                            id:creditos.id+'-garan-txt-apellido-paterno',
												                            fieldLabel: 'Apellido Paterno',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:'50%',
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'BAZÁN',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-garan-txt-apellido-materno',
												                            fieldLabel: 'Apellido Materno',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:'50%',
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'SOLIS',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
														                {
												                            xtype: 'textfield',
												                            id:creditos.id+'-garan-txt-nombres',
												                            fieldLabel: 'Nombres',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:'100%',
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'JIMMY ANTHONY',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-garan-txt-doc-dni',
												                            fieldLabel: 'DNI',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'44949730',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-garan-txt-doc-ce',
												                            fieldLabel: 'CE',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-garan-txt-doc-cip',
												                            fieldLabel: 'CIP',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-garan-txt-doc-ruc',
												                            fieldLabel: 'RUC',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-garan-txt-doc-cm',
												                            fieldLabel: 'CM',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }/*
														                {
												                            xtype: 'textfield',
												                            fieldLabel: 'DNI/CE/CIP/RUC/CM',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'10449497304',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }*/
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																		{
												                            xtype:'combo',
												                            id:creditos.id+'-garan-cmb-estado-civil',
												                            fieldLabel: 'Estado Civil',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-cmb-estado-civil',
												                            store: store_estado_civil,
												                            queryMode: 'local',
												                            triggerAction: 'all',
												                            valueField: 'code',
												                            displayField: 'name',
												                            emptyText: '[Seleccione]',
												                            labelAlign:'right',
												                            //allowBlank: false,
												                            labelAlign:'top',
												                            labelWidth: 50,
												                            width:150,
												                            anchor:'100%',
												                            //readOnly: true,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                    // obj.getStore().load();
												                                    obj.setValue(1);
												                                },
												                                select:function(obj, records, eOpts){
												                        
												                                }
												                            }
												                        },
																		{
																	        xtype: 'datefield',
																	        id:creditos.id+'-garan-date-fecha-nacimiento',
																	        padding:'5px 5px 5px 5px',
																	        //name: 'date1',
																	        labelAlign:'top',
																	        flex:1,
												                            height:40,
																	        labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
																	        fieldLabel: 'Fecha de Nacimiento',
																	        value:'22/01/2019'
																	    },
												                        {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-garan-cmb-telefonos',
												                            fieldLabel: 'Teléfono Fijo/N° Celular',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'987827171',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																		{
																	        xtype: 'label',
																	        //forId: 'myFieldId',
																	        text: 'Domicilio Actual:',
																	        style: 'font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold',
																	        padding:'26px 10px 5px 5px',
																	        width:170,
																	        //flex:1,
												                            anchor:'100%'
																	    },
																		{
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-garan-chk-domi-propio',
																	        name: 'checkbox1',
																	        fieldLabel: 'Propio',
																	        labelAlign:'top',
																	        padding:'5px 10px 5px 5px',
																	        labelWidth:100,
																	        flex:1,
																	        //boxLabel: 'Domicilio Actual',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    },
																	    {
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-garan-chk-domi-pagando',
																	        name: 'checkbox1',
																	        fieldLabel: 'Pagandolo',
																	        labelAlign:'top',
																	        padding:'5px 5px 5px 5px',
																	        labelWidth:40,
																	        flex:1,
																	        //boxLabel: 'box label',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    },
																	    {
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-garan-chk-domi-alquilado',
																	        name: 'checkbox1',
																	        fieldLabel: 'Alquilado',
																	        labelAlign:'top',
																	        padding:'5px 5px 5px 5px',
																	        labelWidth:40,
																	        flex:1,
																	        //boxLabel: 'box label',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    },
																	    {
																	        xtype: 'checkboxfield',
																	        id:creditos.id+'-garan-chk-domi-familiar',
																	        name: 'checkbox1',
																	        fieldLabel: 'Familiar',
																	        labelAlign:'top',
																	        padding:'5px 5px 5px 5px',
																	        labelWidth:40,
																	        flex:1,
																	        //boxLabel: 'box label',
																	        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																	    }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-garan-txt-profesion',
												                            fieldLabel: 'Profesión',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-garan-txt-centro-trab',
												                            fieldLabel: 'Centro de Trabajo Actual',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																	    {
												                            xtype: 'textfield',	
												                            id:creditos.id+'-garan-txt-cargo',
												                            fieldLabel: 'Cargo que Ocupa',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'50%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
																	    {
																	        xtype: 'datefield',
																	        id:creditos.id+'-garan-date-fecha-ingreso',
																	        padding:'5px 5px 5px 5px',
																	        //name: 'date1',
																	        labelAlign:'top',
																	        width:200,
												                            height:40,
																	        labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
																	        fieldLabel: 'Fecha de Ingreso',
																	        value:'22/01/2019'
																	    }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
														                {
												                            xtype: 'textfield',
												                            id:creditos.id+'-garan-txt-dir-direccion',
												                            fieldLabel: 'Avenida/Calle/Jirón/Pasaje',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',
												                            id:creditos.id+'-garan-txt-dir-numero',
												                            fieldLabel: 'N°',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:50,
												                            //flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',
												                            id:creditos.id+'-garan-txt-dir-mz',
												                            fieldLabel: 'MZ',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:50,
												                            //flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',
												                            id:creditos.id+'-garan-txt-dir-lt',
												                            fieldLabel: 'LT',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:50,
												                            //flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',
												                            id:creditos.id+'-garan-txt-dir-dpto',
												                            fieldLabel: 'DPTO',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:50,
												                            //flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',
												                            id:creditos.id+'-garan-txt-dir-interior',
												                            fieldLabel: 'INT.',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            width:50,
												                            //flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
														                {
												                            xtype: 'textfield',
												                            id:creditos.id+'-garan-txt-dir-urb',
												                            fieldLabel: 'Urbanización/AA.HH/PJ/ASOC',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',
												                            id:creditos.id+'-garan-txt-dir-ref',
												                            fieldLabel: 'Referencia de Domicilio',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:creditos.id+'-txt-dni',
												                            labelWidth:50,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
												                            value:'',
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        }
												                    ]
												                },
												                {
																	layout:'hbox',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																		{
						                                                    xtype:'combo',
						                                                    id:creditos.id+'-garan-cmb-departamento',
						                                                    fieldLabel: 'Departamento',
						                                                    //id:creditos.id+'-txt-departamento',
						                                                    store: store_ubigeo,
						                                                    queryMode: 'local',
						                                                    triggerAction: 'all',
						                                                    valueField: 'cod_ubi',
						                                                    displayField: 'Departamento',
						                                                    emptyText: '[Seleccione]',
						                                                    labelAlign:'right',
						                                                    //allowBlank: false,
						                                                    labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
						                                                    anchor:'100%',
						                                                    padding:'5px 10px 5px 5px',
						                                                    //readOnly: true,
						                                                    listeners:{
						                                                        afterrender:function(obj, e){
						                                                			Ext.getCmp(creditos.id+'-garan-cmb-provincia').getStore().removeAll();
						                                                			Ext.getCmp(creditos.id+'-garan-cmb-Distrito').getStore().removeAll();
						                                                        	creditos.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,'100101');
						                                                            // obj.getStore().load();
						                                                            //Ext.getCmp(creditos.id+'-txt-estado-filter').setValue('U');
						                                                        },
						                                                        select:function(obj, records, eOpts){
						                                                			var pro = Ext.getCmp(creditos.id+'-garan-cmb-provincia');
						                                                			Ext.getCmp(creditos.id+'-garan-cmb-provincia').setValue('');
						                                                			Ext.getCmp(creditos.id+'-garan-cmb-Distrito').getStore().removeAll();
						                                                			Ext.getCmp(creditos.id+'-garan-cmb-Distrito').setValue('');
						                                                        	creditos.getUbigeo({VP_OP:'P',VP_VALUE:obj.getValue()},pro,'');
						                                                        }
						                                                    }
						                                                },
						                                                {
						                                                    xtype:'combo',
						                                                    id:creditos.id+'-garan-cmb-provincia',
						                                                    fieldLabel: 'Provincia',
						                                                    //id:creditos.id+'-txt-provincia',
						                                                    store: store_ubigeo2,
						                                                    queryMode: 'local',
						                                                    triggerAction: 'all',
						                                                    valueField: 'cod_ubi',
						                                                    displayField: 'Provincia',
						                                                    emptyText: '[Seleccione]',
						                                                    labelAlign:'right',
						                                                    //allowBlank: false,
						                                                    labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
						                                                    anchor:'100%',
						                                                    padding:'5px 10px 5px 5px',
						                                                    //readOnly: true,
						                                                    listeners:{
						                                                        afterrender:function(obj, e){
						                                                			Ext.getCmp(creditos.id+'-garan-cmb-Distrito').getStore().removeAll();
						                                                        	creditos.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},obj,'100601');
						                                                        },
						                                                        select:function(obj, records, eOpts){
						                                                			var dis=Ext.getCmp(creditos.id+'-garan-cmb-Distrito');
						                                                        	creditos.getUbigeo({VP_OP:'X',VP_VALUE:obj.getValue()},dis,'');
						                                                        }
						                                                    }
						                                                },
						                                                {
						                                                    xtype:'combo',
						                                                    id:creditos.id+'-garan-cmb-Distrito',
						                                                    fieldLabel: 'Distrito',
						                                                    //id:creditos.id+'-txt-Distrito',
						                                                    store: store_ubigeo3,
						                                                    queryMode: 'local',
						                                                    triggerAction: 'all',
						                                                    valueField: 'cod_ubi',
						                                                    displayField: 'Distrito',
						                                                    emptyText: '[Seleccione]',
						                                                    labelAlign:'right',
						                                                    //allowBlank: false,
						                                                    labelAlign:'top',
												                            //width:'100%',
												                            flex:1,
												                            height:40,
												                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
						                                                    anchor:'100%',
						                                                    padding:'5px 10px 5px 5px',
						                                                    //readOnly: true,
						                                                    listeners:{
						                                                        afterrender:function(obj, e){
						                                                        	creditos.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
						                                                            // obj.getStore().load();
						                                                            //Ext.getCmp(creditos.id+'-txt-estado-filter').setValue('U');
						                                                        },
						                                                        select:function(obj, records, eOpts){
						                                                
						                                                        }
						                                                    }
						                                                }
																	]
																}
															]
														}
													]
												},
												{
													region:'center',
													layout:'border',
													border:false,
													items:[
														{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:50,
															bodyStyle: 'background: #F0EFEF;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'DOCUMENTOS ADJUNTOS',
															        style: 'font: normal 18px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},
														{
															region:'center',
															layout:'fit',
															items:[
																{
														            xtype: 'dataview',
														            tpl: [
														                '<tpl for=".">',
														                    '<div class="dataview-multisort-item">',
														                        '<img src="resources/images/touch-icons/{thumb}" />',
														                        '<h3>{name}</h3>',
														                    '</div>',
														                '</tpl>'
														            ],
														            /*plugins: {
														                xclass: 'Ext.ux.DataView.Animated'
														            },*/
														            itemSelector: 'div.dataview-multisort-item',
														            store:store_search,
														            /*store: Ext.create('Ext.data.Store', {
														                autoLoad: true,
														                sortOnLoad: true,
														                fields: ['name', 'thumb', 'url', 'type'],
														                proxy: {
														                    type: 'ajax',
														                    url : 'resources/data/sencha-touch-examples.json',
														                    reader: {
														                        type: 'json',
														                        rootProperty: ''
														                    }
														                }
														            })*/
														        }
															]
														}
													]
												}
											]
										},
										/*REFERENCIA*/
										{
											layout:'border',
											id:creditos.id+'-tab-referencia',
											title:'REFERENCIA',
											border:false,
											items:[
												{
													region:'center',
													layout:'border',
													items:[
														{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:50,
															bodyStyle: 'background: #F0EFEF;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'REFERENCIA PERSONAL',
															        style: 'font: normal 25px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},
														{
															region:'center',
															layout:'border',
															items:[
																{
																	region:'center',
																	border:false,
																	items:[
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																                {
														                            xtype: 'textfield',
														                            id:creditos.id+'-ref-txt-personal',
														                            fieldLabel: 'Personal',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield',
														                            id:creditos.id+'-ref-txt-personal-telefono-1',
														                            fieldLabel: 'Teléfono 1',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            width:100,
														                            //flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield',
														                            id:creditos.id+'-ref-txt-personal-telefono-2',
														                            fieldLabel: 'Teléfono 2',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            width:100,
														                            //flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																                {
														                            xtype: 'textfield',
														                            id:creditos.id+'-ref-txt-comercial',
														                            fieldLabel: 'Comercial',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield',
														                            id:creditos.id+'-ref-txt-comercial-telefono-1',
														                            fieldLabel: 'Teléfono 1',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            width:100,
														                            //flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield',
														                            id:creditos.id+'-ref-txt-comercial-telefono-2',
														                            fieldLabel: 'Teléfono 2',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            width:100,
														                            //flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        }
														                    ]
														                }
																	]
																},
																{
																	region:'east',
																	layout:'border',
																	width:'50%',
																	items:[
																		{
																			region:'north',
																			hidden:true,
																			xtype:'panel',
																			layout:'hbox',
																			border:false,
																			height:50,
																			bodyStyle: 'background: #F0EFEF;text-align:center;',
																			//layout:'fit',
																			items:[
																				{
																			        xtype: 'label',
																			        //forId: 'myFieldId',
																			        text: 'CROQUIS',
																			        style: 'font: normal 25px Sans-serif;font-weight: bold;',
																			        padding:'15px 5px 5px 25px',
																			        width:'100%',
														                            anchor:'100%'
																			    }
																			]
																		},
																		{
																			region:'center',
																			items:[]
																		}
																	]
																}
															]
														}
													]
												}
											]
										},
										/*RESEÑA*/
										{
											layout:'border',
											id:creditos.id+'-tab-resena',
											title:'RESEÑA',
											border:false,
											items:[
												{
													region:'center',
													layout:'border',
													items:[
														{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:50,
															bodyStyle: 'background: #F0EFEF;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'BREVE RESEÑA',
															        style: 'font: normal 25px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},
														{
															region:'center',
															layout:'border',
															items:[
																{
																	region:'center',
																	border:false,
																	items:[
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																                {
														                            xtype: 'textarea',
														                            id:creditos.id+'-res-txt-resena',
														                            fieldLabel: '',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            flex:1,
														                            height:200,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: left; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        }
														                    ]
														                }
																	]
																},
																{
																	region:'east',
																	layout:'border',
																	width:'50%',
																	items:[
																		{
																			region:'north',
																			hidden:true,
																			xtype:'panel',
																			layout:'hbox',
																			border:false,
																			height:50,
																			bodyStyle: 'background: #F0EFEF;text-align:center;',
																			//layout:'fit',
																			items:[
																				{
																			        xtype: 'label',
																			        //forId: 'myFieldId',
																			        text: 'CROQUIS',
																			        style: 'font: normal 25px Sans-serif;font-weight: bold;',
																			        padding:'15px 5px 5px 25px',
																			        width:'100%',
														                            anchor:'100%'
																			    }
																			]
																		},
																		{
																			region:'center',
																			items:[]
																		}
																	]
																}
															]
														}
													]
												}
											]
										},
										/*SOLICITUD*/
										{
											layout:'border',
											id:creditos.id+'-tab-credito',
											title:'SOLICITUD',
											border:false,
											items:[
												{
													region:'center',
													layout:'border',
													items:[
														{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:50,
															bodyStyle: 'background: #F0EFEF;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'SOLICITUD DE FINANCIAMIENTO / INFORMACIÓN DE CRÉDITO',
															        style: 'font: normal 25px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},
														{
															region:'center',
															layout:'border',
															items:[
																{
																	region:'center',
																	border:false,
																	items:[
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																				{
														                            xtype:'combo',
														                            id:creditos.id+'-sol-cmb-moneda',
														                            fieldLabel: 'Moneda',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-cmb-moneda',
														                            store: store_moneda,
														                            queryMode: 'local',
														                            triggerAction: 'all',
														                            valueField: 'code',
														                            displayField: 'name',
														                            emptyText: '[Seleccione]',
														                            labelAlign:'right',
														                            //allowBlank: false,
														                            labelAlign:'top',
														                            labelWidth: 50,
														                            width:150,
														                            anchor:'100%',
														                            height:40,
														                            //readOnly: true,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                    // obj.getStore().load();
														                                    obj.setValue('SOL');
														                                },
														                                select:function(obj, records, eOpts){
														                        
														                                }
														                            }
														                        },
																                {
														                            xtype: 'textfield',
														                            id:creditos.id+'-sol-txt-numero-cuotas',
														                            fieldLabel: 'N° Cuotas',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            flex:1,
														                            height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
																			        xtype: 'datefield',
																			        id:creditos.id+'-sol-date-fecha-1-letra',
																			        padding:'5px 5px 5px 5px',
																			        //name: 'date1',
																			        labelAlign:'top',
																			        flex:1,
														                            height:40,
																			        labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
																			        fieldLabel: 'Fecha de la 1° Letra',
																			        value:'22/01/2019'
																			    },
														                        {
														                            xtype: 'textfield',
														                            id:creditos.id+'-sol-txt-import-aprobado',
														                            fieldLabel: 'Importe Aprobado',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            width:100,
														                            flex:1,
														                            //height:40,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        }
														                    ]
														                }
																	]
																},
																{
																	region:'east',
																	layout:'border',
																	width:'40%',
																	items:[
																		{
																			region:'north',
																			hidden:true,
																			xtype:'panel',
																			layout:'hbox',
																			border:false,
																			height:50,
																			bodyStyle: 'background: #F0EFEF;text-align:center;',
																			//layout:'fit',
																			items:[
																				{
																			        xtype: 'label',
																			        //forId: 'myFieldId',
																			        text: 'CROQUIS',
																			        style: 'font: normal 25px Sans-serif;font-weight: bold;',
																			        padding:'15px 5px 5px 25px',
																			        width:'100%',
														                            anchor:'100%'
																			    }
																			]
																		},
																		{
																			region:'center',
																			items:[]
																		}
																	]
																}
															]
														}
													]
												}
											]
										},
										/*MOTIVO*/
										{
											layout:'border',
											id:creditos.id+'-tab-motivo',
											title:'MOTIVO',
											border:false,
											items:[
												{
													region:'center',
													layout:'border',
													items:[
														{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:50,
															bodyStyle: 'background: #F0EFEF;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'MOTIVO DEL PRESTAMO',
															        style: 'font: normal 25px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},
														{
															region:'center',
															layout:'border',
															items:[
																{
																	region:'center',
																	border:false,
																	items:[
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																				{
																			        xtype: 'checkboxfield',
																			        id:creditos.id+'-mot-chk-adqui-merca',
																			        name: 'checkbox1',
																			        fieldLabel: 'Adquisición de Mercadería',
																			        //labelAlign:'top',
																			        padding:'5px 10px 5px 5px',
																			        labelWidth:330,
																			        flex:1,
																			        //boxLabel: 'Domicilio Actual',
																			        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: right;font-weight: bold",
														                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																			    }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																				{
																			        xtype: 'checkboxfield',
																			        id:creditos.id+'-mot-chk-ampliar-neg',
																			        name: 'checkbox1',
																			        fieldLabel: 'Ampliar o Mejorar su Negocio',
																			        //labelAlign:'top',
																			        padding:'5px 10px 5px 5px',
																			        labelWidth:330,
																			        flex:1,
																			        //boxLabel: 'Domicilio Actual',
																			        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: right;font-weight: bold",
														                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																			    }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																				{
																			        xtype: 'checkboxfield',
																			        id:creditos.id+'-mot-chk-compra-acc-insu',
																			        name: 'checkbox1',
																			        fieldLabel: 'Compra de accesorios y/o Insumos',
																			        //labelAlign:'top',
																			        padding:'5px 10px 5px 5px',
																			        labelWidth:330,
																			        flex:1,
																			        //boxLabel: 'Domicilio Actual',
																			        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: right;font-weight: bold",
														                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																			    }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																				{
																			        xtype: 'checkboxfield',
																			        id:creditos.id+'-mot-chk-otros',
																			        name: 'checkbox1',
																			        fieldLabel: 'Otros',
																			        //labelAlign:'top',
																			        padding:'5px 10px 5px 5px',
																			        labelWidth:330,
																			        flex:1,
																			        //boxLabel: 'Domicilio Actual',
																			        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: right;font-weight: bold",
														                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																			    }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																				{
																			        xtype: 'datefield',
																			        id:creditos.id+'-mot-date-fecha',
																			        padding:'5px 5px 5px 5px',
																			        //name: 'date1',
																			        labelAlign:'top',
																			        //flex:1,
																			        width:200,
														                            height:40,
																			        labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
																			        fieldLabel: 'Fecha',
																			        value:'22/01/2019'
																			    }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																				{
														                            xtype:'combo',
														                            id:creditos.id+'-mot-cmb-promotor',
														                            fieldLabel: 'Promotor Financiero',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-cmb-moneda',
														                            store: store_moneda,
														                            queryMode: 'local',
														                            triggerAction: 'all',
														                            valueField: 'code',
														                            displayField: 'name',
														                            emptyText: '[Seleccione]',
														                            labelAlign:'right',
														                            //allowBlank: false,
														                            labelAlign:'top',
														                            labelWidth: 50,
														                            //width:150,
														                            flex:1,
														                            anchor:'100%',
														                            height:40,
														                            //readOnly: true,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: left; font-weight: bold',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                    // obj.getStore().load();
														                                    obj.setValue('SOL');
														                                },
														                                select:function(obj, records, eOpts){
														                        
														                                }
														                            }
														                        }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																				{
														                            xtype:'combo',
														                            id:creditos.id+'-mot-cmb-agencia',
														                            fieldLabel: 'Agencia',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-cmb-moneda',
														                            store: store_moneda,
														                            queryMode: 'local',
														                            triggerAction: 'all',
														                            valueField: 'code',
														                            displayField: 'name',
														                            emptyText: '[Seleccione]',
														                            labelAlign:'right',
														                            //allowBlank: false,
														                            labelAlign:'top',
														                            labelWidth: 50,
														                            //width:150,
														                            flex:1,
														                            anchor:'100%',
														                            height:40,
														                            //readOnly: true,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: left; font-weight: bold',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                    // obj.getStore().load();
														                                    obj.setValue('SOL');
														                                },
														                                select:function(obj, records, eOpts){
														                        
														                                }
														                            }
														                        }
														                    ]
														                }
																	]
																},
																{
																	region:'east',
																	layout:'border',
																	width:'50%',
																	items:[
																		{
																			region:'north',
																			hidden:true,
																			xtype:'panel',
																			layout:'hbox',
																			border:false,
																			height:50,
																			bodyStyle: 'background: #F0EFEF;text-align:center;',
																			//layout:'fit',
																			items:[
																				{
																			        xtype: 'label',
																			        //forId: 'myFieldId',
																			        text: 'CROQUIS',
																			        style: 'font: normal 25px Sans-serif;font-weight: bold;',
																			        padding:'15px 5px 5px 25px',
																			        width:'100%',
														                            anchor:'100%'
																			    }
																			]
																		},
																		{
																			region:'center',
																			items:[]
																		}
																	]
																}
															]
														}
													]
												}
											]
										},
										/*ANÁLISIS*/
										{
											layout:'border',
											id:creditos.id+'-tab-evaluador',
											title:'ANÁLISIS',
											border:false,
											items:[
												{
													region:'center',
													layout:'border',
													items:[
														{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:50,
															bodyStyle: 'background: #F0EFEF;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'ANÁLISIS DEL EVALUADOR',
															        style: 'font: normal 25px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},
														{
															region:'center',
															layout:'border',
															items:[
																{
																	region:'center',
																	border:false,
																	items:[
																		{
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																				{
																			        xtype: 'label',
																			        //forId: 'myFieldId',
																			        text: 'SERVICIOS CON LA QUE CUENTA LA CASA:',
																			        style: 'font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: left;font-weight: bold',
																			        padding:'26px 10px 5px 5px',
																			        //width:220,
																			        flex:1,
														                            anchor:'100%'
																			    }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																				{
																			        xtype: 'checkboxfield',
																			        id:creditos.id+'-ana-chk-serv-luz',
																			        name: 'checkbox1',
																			        fieldLabel: 'LUZ',
																			        labelAlign:'top',
																			        padding:'5px 10px 5px 5px',
																			        labelWidth:100,
																			        flex:1,
																			        //boxLabel: 'Domicilio Actual',
																			        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: left;font-weight: bold",
														                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																			    },
																			    {
																			        xtype: 'checkboxfield',
																			        id:creditos.id+'-ana-chk-serv-agua',
																			        name: 'checkbox1',
																			        fieldLabel: 'AGUA',
																			        labelAlign:'top',
																			        padding:'5px 5px 5px 5px',
																			        labelWidth:40,
																			        flex:1,
																			        //boxLabel: 'box label',
																			        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: left;font-weight: bold",
														                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																			    },
																			    {
																			        xtype: 'checkboxfield',
																			        id:creditos.id+'-ana-chk-serv-cable',
																			        name: 'checkbox1',
																			        fieldLabel: 'CABLE',
																			        labelAlign:'top',
																			        padding:'5px 5px 5px 5px',
																			        labelWidth:40,
																			        flex:1,
																			        //boxLabel: 'box label',
																			        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: left;font-weight: bold",
														                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																			    },
																			    {
																			        xtype: 'checkboxfield',
																			        id:creditos.id+'-ana-chk-serv-internet',
																			        name: 'checkbox1',
																			        fieldLabel: 'INTERNET',
																			        labelAlign:'top',
																			        padding:'5px 5px 5px 5px',
																			        labelWidth:40,
																			        flex:1,
																			        //boxLabel: 'box label',
																			        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: left;font-weight: bold",
														                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																			    }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																				{
																			        xtype: 'label',
																			        //forId: 'myFieldId',
																			        text: 'DESCRIPCIÓN DE LA CASA:',
																			        style: 'font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: left;font-weight: bold',
																			        padding:'26px 10px 5px 5px',
																			        //width:220,
																			        flex:1,
														                            anchor:'100%'
																			    }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																                {
														                            xtype: 'textarea',
														                            id:creditos.id+'-ana-txt-descripcion',
														                            fieldLabel: '',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:creditos.id+'-txt-dni',
														                            labelWidth:50,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            flex:1,
														                            height:200,
														                            labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:15px; text-align: left; font-weight: bold',
														                            value:'',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																				{
																			        xtype: 'label',
																			        //forId: 'myFieldId',
																			        text: 'APROBADO POR:',
																			        style: 'font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: left;font-weight: bold',
																			        padding:'26px 10px 5px 5px',
																			        //width:220,
																			        flex:1,
														                            anchor:'100%'
																			    }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																				{
																			        xtype: 'checkboxfield',
																			        id:creditos.id+'-ana-chk-apro-aprobado',
																			        name: 'checkbox1',
																			        fieldLabel: 'V° B° APROBACIÓN',
																			        labelAlign:'top',
																			        padding:'5px 10px 5px 5px',
																			        labelWidth:100,
																			        flex:1,
																			        //boxLabel: 'Domicilio Actual',
																			        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: left;font-weight: bold",
														                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																			    }
														                    ]
														                },
														                {
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			border:false,
																			items:[
																			    {
																			        xtype: 'checkboxfield',
																			        id:creditos.id+'-ana-chk-apro-asesor-comercial',
																			        name: 'checkbox1',
																			        fieldLabel: 'V° B° ASESOR COMERCIAL',
																			        labelAlign:'top',
																			        padding:'5px 5px 5px 5px',
																			        labelWidth:40,
																			        flex:1,
																			        //boxLabel: 'box label',
																			        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: left;font-weight: bold",
														                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																			    }
														                    ]
														                }
																	]
																},
																{
																	region:'east',
																	layout:'border',
																	width:'60%',
																	items:[
																		{
																			region:'center',
																			layout:'border',
																			width:'50%',
																			items:[
																				{
																					region:'north',
																					//hidden:true,
																					xtype:'panel',
																					layout:'hbox',
																					border:false,
																					height:50,
																					bodyStyle: 'background: #F0EFEF;text-align:center;',
																					//layout:'fit',
																					items:[
																						{
																					        xtype: 'label',
																					        //forId: 'myFieldId',
																					        text: 'CROQUIS',
																					        style: 'font: normal 20px Sans-serif;font-weight: bold;',
																					        padding:'15px 5px 5px 25px',
																					        width:'100%',
																                            anchor:'100%'
																					    }
																					]
																				},
																				{
																					region:'center',
																					items:[

																					]
																				}
																			]
																		},
																		{
																			region:'south',
																			layout:'border',
																			height:'40%',
																			items:[
																				{
																					region:'center',
																					layout:'border',
																					items:[
																						{
																							region:'north',
																							//hidden:true,
																							xtype:'panel',
																							layout:'hbox',
																							border:false,
																							height:50,
																							bodyStyle: 'background: #F0EFEF;text-align:center;',
																							//layout:'fit',
																							items:[
																								{
																							        xtype: 'label',
																							        //forId: 'myFieldId',
																							        text: 'FIRMA TITULAR',
																							        style: 'font: normal 15px Sans-serif;font-weight: bold;',
																							        padding:'15px 5px 5px 25px',
																							        width:'100%',
																		                            anchor:'100%'
																							    }
																							]
																						},
																						{
																							region:'center',
																							layout:'border',
																							items:[
																								{
																									region:'east',
																									width:'40%',
																									items:[
																										
																									]
																								},
																								{
																									region:'center',
																									items:[
																										
																									]
																								}
																							]
																						}
																					]
																				},
																				{
																					region:'west',
																					width:'50%',
																					layout:'border',
																					items:[
																						{
																							region:'north',
																							//hidden:true,
																							xtype:'panel',
																							layout:'hbox',
																							border:false,
																							height:50,
																							bodyStyle: 'background: #F0EFEF;text-align:center;',
																							//layout:'fit',
																							items:[
																								{
																							        xtype: 'label',
																							        //forId: 'myFieldId',
																							        text: 'FIRMA CONYUGUE',
																							        style: 'font: normal 15px Sans-serif;font-weight: bold;',
																							        padding:'15px 5px 5px 25px',
																							        width:'100%',
																		                            anchor:'100%'
																							    }
																							]
																						},
																						{
																							region:'center',
																							layout:'border',
																							items:[
																								{
																									region:'east',
																									width:'40%',
																									items:[
																										
																									]
																								},
																								{
																									region:'center',
																									items:[
																										
																									]
																								}
																							]
																						}
																					]
																				}
																			]
																		}
																	]
																}
															]
														}
													]
												}
											]
										}
									],
									listeners:{
                                        afterrender: function(obj){
                                            obj.getTabBar().hide();
                                        }
                                    }
								}
							]
						}
					],
					listeners:{
						beforerender: function(obj, opts){
	                        global.state_item_menu(creditos.id_menu, true);
	                    },
	                    afterrender: function(obj, e){
	                    	//creditos.getReloadGridcreditos('');
	                        tab.setActiveTab(obj);
	                        global.state_item_menu_config(obj,creditos.id_menu);
	                        Ext.getCmp(creditos.id+'-txt-dni').focus();
	                    },
	                    beforeclose:function(obj,opts){
	                    	global.state_item_menu(creditos.id_menu, false);
	                    }
					}

				}).show();
			},
			getUbigeo:function(json,obj,value){
				console.log(obj);
		    	obj.getStore().removeAll();
				obj.getStore().load(
	                {params: json,
	                callback:function(){
	                	//Ext.getCmp(creditos.id+'-form').el.unmask();
	                	obj.setValue(value);
	                }
	            });
			},
			getEdit:function(index){
				var rec = Ext.getCmp(creditos.id + '-grid-credit').getStore().getAt(index);
				creditos.setForm('U',rec.data);
			},
			getNew:function(){
				creditos.setForm('I',{id_creditos:0,usr_codigo:'',usr_nombre:'',usr_perfil:1,usr_estado:1});
			},
			setForm:function(op,data){

                var myDataPerfil = [
					[1,'Básico'], 
				    [2,'Consultor'],
				    [3,'Intermedio'],
				    [4,'Supervisor'],
				    [5,'Administrador']
				];
				var store_perfil = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'perfil',
			        autoLoad: true,
			        data: myDataPerfil,
			        fields: ['code', 'name']
			    });

			    var myDatacreditos = [
					[1,'Activo'], 
				    [0,'Inactivo']
				];
				var store_estado_creditos = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'perfil',
			        autoLoad: true,
			        data: myDatacreditos,
			        fields: ['code', 'name']
			    });

                Ext.create('Ext.window.Window',{
	                id:creditos.id+'-win-form',
	                plain: true,
	                title:'Mantenimiento Usuario',
	                icon: '/images/icon/default-avatar_man.png',
	                height: 300,
	                width: 400,
	                resizable:false,
	                modal: true,
	                border:false,
	                closable:true,
	                padding:20,
	                //layout:'fit',
	                items:[
	                	{
                            xtype: 'textfield',	
                            disabled:true,
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            fieldLabel: 'Código',
                            id:creditos.id+'-txt-codigo',
                            labelWidth:50,
                            //readOnly:true,
                            labelAlign:'right',
                            width:'50%',
                            anchor:'100%',
                            listeners:{
                                afterrender:function(obj, e){
                                    // obj.getStore().load();
                                    obj.setValue(data.id_creditos);
                                }
                            }
                        },
                        {
                            xtype: 'textfield',	
                            fieldLabel: 'Usuario',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            id:creditos.id+'-txt-usuario-creditos',
                            labelWidth:50,
                            //readOnly:true,
                            labelAlign:'right',
                            width:'90%',
                            anchor:'100%',
                            listeners:{
                                afterrender:function(obj, e){
                                    // obj.getStore().load();
                                    obj.setValue(data.usr_codigo);
                                }
                            }
                        },
                        {
                            xtype: 'textfield',	
                            fieldLabel: 'Clave',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            inputType: 'password',
                            id:creditos.id+'-txt-clave',
                            labelWidth:50,
                            //readOnly:true,
                            labelAlign:'right',
                            width:'90%',
                            anchor:'100%'
                        },
                        {
                            xtype: 'textfield',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            fieldLabel: 'Nombre',
                            id:creditos.id+'-txt-nombre-creditos',
                            labelWidth:50,
                            //readOnly:true,
                            labelAlign:'right',
                            width:'90%',
                            anchor:'100%',
                            listeners:{
                                afterrender:function(obj, e){
                                    // obj.getStore().load();
                                    obj.setValue(data.usr_nombre);
                                }
                            }
                        },
                        {
                            xtype:'combo',
                            fieldLabel: 'Perfil',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            id:creditos.id+'-cmb-perfil',
                            store: store_perfil,
                            queryMode: 'local',
                            triggerAction: 'all',
                            valueField: 'code',
                            displayField: 'name',
                            emptyText: '[Seleccione]',
                            labelAlign:'right',
                            //allowBlank: false,
                            labelWidth: 50,
                            width:'90%',
                            anchor:'100%',
                            //readOnly: true,
                            listeners:{
                                afterrender:function(obj, e){
                                    // obj.getStore().load();
                                    Ext.getCmp(creditos.id+'-cmb-perfil').setValue(data.usr_perfil);
                                },
                                select:function(obj, records, eOpts){
                        
                                }
                            }
                        },
                        {
                            xtype:'combo',
                            fieldLabel: 'Estado',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            id:creditos.id+'-cmb-estado-creditos',
                            store: store_estado_creditos,
                            queryMode: 'local',
                            triggerAction: 'all',
                            valueField: 'code',
                            displayField: 'name',
                            emptyText: '[Seleccione]',
                            labelAlign:'right',
                            //allowBlank: false,
                            labelWidth: 50,
                            width:'90%',
                            anchor:'100%',
                            //readOnly: true,
                            listeners:{
                                afterrender:function(obj, e){
                                    // obj.getStore().load();
                                    Ext.getCmp(creditos.id+'-cmb-estado-creditos').setValue(data.usr_estado);
                                },
                                select:function(obj, records, eOpts){
                        
                                }
                            }
                        }
	                ],
	                bbar:[       
	                    '->',
	                    '-',
	                    {
	                        xtype:'button',
	                        text: 'Grabar',
	                        icon: '/images/icon/save.png',
	                        listeners:{
	                            beforerender: function(obj, opts){
								},
	                            click: function(obj, e){
	                            	creditos.setSavecreditos(op);
	                            }
	                        }
	                    },
	                    '-',
	                    {
	                        xtype:'button',
	                        text: 'Salir',
	                        icon: '/images/icon/get_back.png',
	                        listeners:{
	                            beforerender: function(obj, opts){
	                            },
	                            click: function(obj, e){
	                                Ext.getCmp(creditos.id+'-win-form').close();
	                            }
	                        }
	                    },
	                    '-'
	                ],
	                listeners:{
	                    'afterrender':function(obj, e){ 

	                    },
	                    'close':function(){

	                    }
	                }
	            }).show().center();
			},
			setSaveSolicitud:function(op){
				var sol_moneda = Ext.getCmp(creditos.id+'-sol-cmb-moneda').getValue();
				var sol_monto = Ext.getCmp(creditos.id+'-sol-txt-monto').getValue();
				var sol_tipo_cliente = Ext.getCmp(creditos.id+'-sol-txt-tipo-cliente').getValue();
				var sol_excep_si = Ext.getCmp(creditos.id+'-sol-chk-excepcion-si').getValue();
				var sol_excep_no = Ext.getCmp(creditos.id+'-sol-chk-excepcion-no').getValue();
				var sol_fecha = Ext.getCmp(creditos.id+'-sol-date-fecha').getValue();
				var sol_ape_pat = Ext.getCmp(creditos.id+'-sol-txt-apellido-paterno').getValue();
				var sol_ape_mat = Ext.getCmp(creditos.id+'-sol-txt-apellido-materno').getValue();
				var sol_nombres = Ext.getCmp(creditos.id+'-sol-txt-nombres').getValue();
				var sol_doc_dni = Ext.getCmp(creditos.id+'-sol-txt-doc-dni').getValue();
				var sol_doc_ce = Ext.getCmp(creditos.id+'-sol-txt-doc-ce').getValue();
				var sol_doc_cip = Ext.getCmp(creditos.id+'-sol-txt-doc-cip').getValue();
				var sol_doc_ruc = Ext.getCmp(creditos.id+'-sol-txt-doc-ruc').getValue();
				var sol_doc_cm = Ext.getCmp(creditos.id+'-sol-txt-doc-cm').getValue();
				var sol_estado_civil = Ext.getCmp(creditos.id+'-sol-cmb-estado-civil').getValue();
				var sol_fecha_nac = Ext.getCmp(creditos.id+'-sol-date-fecha-nac').getValue();
				var sol_tel_cel = Ext.getCmp(creditos.id+'-sol-txt-tel-cel').getValue();
				var sol_domi_propio = Ext.getCmp(creditos.id+'-sol-chk-domi-propio').getValue();
				var sol_domi_pagando = Ext.getCmp(creditos.id+'-sol-chk-domi-pagando').getValue();
				var sol_domi_alquilado = Ext.getCmp(creditos.id+'-sol-chk-domi-alquilado').getValue();
				var sol_domi_familiar = Ext.getCmp(creditos.id+'-sol-chk-domi-familiar').getValue();
				var sol_dir_direccion = Ext.getCmp(creditos.id+'-sol-txt-dir-direccion').getValue();
				var sol_dir_numero = Ext.getCmp(creditos.id+'-sol-txt-dir-numero').getValue();
				var sol_dir_mz = Ext.getCmp(creditos.id+'-sol-txt-dir-mz').getValue();
				var sol_dir_lt = Ext.getCmp(creditos.id+'-sol-txt-dir-lt').getValue();
				var sol_dir_dpto = Ext.getCmp(creditos.id+'-sol-txt-dir-dpto').getValue();
				var sol_dir_interior = Ext.getCmp(creditos.id+'-sol-txt-dir-interior').getValue();
				var sol_dir_urb = Ext.getCmp(creditos.id+'-sol-txt-dir-urb').getValue();
				var sol_dir_referencia = Ext.getCmp(creditos.id+'-sol-txt-dir-referencia').getValue();
				var sol_departamento = Ext.getCmp(creditos.id+'-sol-cmb-departamento').getValue();
				var sol_provincia = Ext.getCmp(creditos.id+'-sol-cmb-provincia').getValue();
				var sol_distrito = Ext.getCmp(creditos.id+'-sol-cmb-Distrito').getValue();


				var lab_dir_direccion = Ext.getCmp(creditos.id+'-lab-txt-dir-direccion').getValue();
				var lab_dir_numero = Ext.getCmp(creditos.id+'-lab-txt-dir-numero').getValue();
				var lab_dir_mz = Ext.getCmp(creditos.id+'-lab-txt-dir-mz').getValue();
				var lab_dir_lt = Ext.getCmp(creditos.id+'-lab-txt-dir-lt').getValue();
				var lab_dir_dpto = Ext.getCmp(creditos.id+'-lab-txt-dir-dpto').getValue();
				var lab_dir_interior = Ext.getCmp(creditos.id+'-lab-txt-dir-interior').getValue();
				var lab_dir_urb = Ext.getCmp(creditos.id+'-lab-txt-dir-urb').getValue();
				var lab_dir_referencia = Ext.getCmp(creditos.id+'-lab-txt-dir-referencia').getValue();
				var lab_departamento = Ext.getCmp(creditos.id+'-lab-cmb-departamento').getValue();
				var lab_provincia = Ext.getCmp(creditos.id+'-lab-cmb-provincia').getValue();
				var lab_distrito = Ext.getCmp(creditos.id+'-lab-cmb-Distrito').getValue();
				var lab_negocio = Ext.getCmp(creditos.id+'-lab-txt-giro-negocio').getValue();
				var lab_ant_negocio = Ext.getCmp(creditos.id+'-lab-txt-ant-negocio').getValue();
				var lab_obs = Ext.getCmp(creditos.id+'-lab-txt-obs').getValue();

				var conyu_ape_pater = Ext.getCmp(creditos.id+'-conyu-txt-apellido-paterno').getValue();
				var conyu_ape_mater = Ext.getCmp(creditos.id+'-conyu-txt-apellido-materno').getValue();
				var conyu_nombres = Ext.getCmp(creditos.id+'-conyu-txt-nombres').getValue();
				var conyu_dni = Ext.getCmp(creditos.id+'-conyu-txt-dni').getValue();
				var conyu_ce = Ext.getCmp(creditos.id+'-conyu-txt-ce').getValue();
				var conyu_cip = Ext.getCmp(creditos.id+'-conyu-txt-cip').getValue();
				var conyu_ruc = Ext.getCmp(creditos.id+'-conyu-txt-ruc').getValue();
				var conyu_cm = Ext.getCmp(creditos.id+'-conyu-txt-cm').getValue();
				var conyu_estado_civil = Ext.getCmp(creditos.id+'-conyu-cmb-estado-civil').getValue();
				var conyu_fecha_nacimiento = Ext.getCmp(creditos.id+'-conyu-date-fecha-nacimiento').getValue();
				var conyu_telefonos = Ext.getCmp(creditos.id+'-conyu-txt-telefonos').getValue();
				var conyu_contratado = Ext.getCmp(creditos.id+'-conyu-chk-sts-contratado').getValue();
				var conyu_dependiente = Ext.getCmp(creditos.id+'-conyu-chk-sts-dependiente').getValue();
				var conyu_independiente = Ext.getCmp(creditos.id+'-conyu-chk-sts-independiente').getValue();
				var conyu_otros = Ext.getCmp(creditos.id+'-conyu-chk-sts-otros').getValue();
				var conyu_bachiller = Ext.getCmp(creditos.id+'-conyu-chk-estu-bachiller').getValue();
				var conyu_tecnologia = Ext.getCmp(creditos.id+'-conyu-chk-estu-tecnologia').getValue();
				var conyu_titulado = Ext.getCmp(creditos.id+'-conyu-chk-estu-titulado').getValue();
				var conyu_magister = Ext.getCmp(creditos.id+'-conyu-chk-estu-magister').getValue();
				var conyu_profesion = Ext.getCmp(creditos.id+'-conyu-txt-profesion').getValue();
				var conyu_centro_trab = Ext.getCmp(creditos.id+'-conyu-txt-centro-trab').getValue();
				var conyu_cargo = Ext.getCmp(creditos.id+'-conyu-txt-cargo').getValue();
				var conyu_fecha_ingreso = Ext.getCmp(creditos.id+'-conyu-date-fecha-ingreso').getValue();

				var garan_ape_pate = Ext.getCmp(creditos.id+'-garan-txt-apellido-paterno').getValue();
				var garan_ape_mate = Ext.getCmp(creditos.id+'-garan-txt-apellido-materno').getValue();
				var garan_ape_nombres = Ext.getCmp(creditos.id+'-garan-txt-nombres').getValue();
				var garan_doc_dni = Ext.getCmp(creditos.id+'-garan-txt-doc-dni').getValue();
				var garan_doc_ce = Ext.getCmp(creditos.id+'-garan-txt-doc-ce').getValue();
				var garan_doc_cip = Ext.getCmp(creditos.id+'-garan-txt-doc-cip').getValue();
				var garan_doc_ruc = Ext.getCmp(creditos.id+'-garan-txt-doc-ruc').getValue();
				var garan_doc_cm = Ext.getCmp(creditos.id+'-garan-txt-doc-cm').getValue();
				var garan_estado_civil = Ext.getCmp(creditos.id+'-garan-cmb-estado-civil').getValue();
				var garan_fecha_nac = Ext.getCmp(creditos.id+'-garan-date-fecha-nacimiento').getValue();
				var garan_telefonos = Ext.getCmp(creditos.id+'-garan-cmb-telefonos').getValue();
				var garan_domi_propio = Ext.getCmp(creditos.id+'-garan-chk-domi-propio').getValue();
				var garan_domi_pagando = Ext.getCmp(creditos.id+'-garan-chk-domi-pagando').getValue();
				var garan_domi_alquilado = Ext.getCmp(creditos.id+'-garan-chk-domi-alquilado').getValue();
				var garan_domi_familiar = Ext.getCmp(creditos.id+'-garan-chk-domi-familiar').getValue();
				var garan_profesion = Ext.getCmp(creditos.id+'-garan-txt-profesion').getValue();
				var garan_centro_lab = Ext.getCmp(creditos.id+'-garan-txt-centro-trab').getValue();
				var garan_cargo = Ext.getCmp(creditos.id+'-garan-txt-cargo').getValue();
				var garan_fecha_ingreso = Ext.getCmp(creditos.id+'-garan-date-fecha-ingreso').getValue();
				var garan_dir_direccion = Ext.getCmp(creditos.id+'-garan-txt-dir-direccion').getValue();
				var garan_dir_numero = Ext.getCmp(creditos.id+'-garan-txt-dir-numero').getValue();
				var garan_dir_mz = Ext.getCmp(creditos.id+'-garan-txt-dir-mz').getValue();
				var garan_dir_lt = Ext.getCmp(creditos.id+'-garan-txt-dir-lt').getValue();
				var garan_dir_dpto = Ext.getCmp(creditos.id+'-garan-txt-dir-dpto').getValue();
				var garan_dir_interior = Ext.getCmp(creditos.id+'-garan-txt-dir-interior').getValue();
				var garan_dir_ubr = Ext.getCmp(creditos.id+'-garan-txt-dir-urb').getValue();
				var garan_dir_ref = Ext.getCmp(creditos.id+'-garan-txt-dir-ref').getValue();
				var garan_departamento = Ext.getCmp(creditos.id+'-garan-cmb-departamento').getValue();
				var garan_provincia = Ext.getCmp(creditos.id+'-garan-cmb-provincia').getValue();
				var garan_distrito = Ext.getCmp(creditos.id+'-garan-cmb-Distrito').getValue();

				var garan_personal = Ext.getCmp(creditos.id+'-ref-txt-personal').getValue();
				var garan_personal_telf_1 = Ext.getCmp(creditos.id+'-ref-txt-personal-telefono-1').getValue();
				var garan_personal_telf_2 = Ext.getCmp(creditos.id+'-ref-txt-personal-telefono-2').getValue();
				var garan_comercial = Ext.getCmp(creditos.id+'-ref-txt-comercial').getValue();
				var garan_comercial_telf_1 = Ext.getCmp(creditos.id+'-ref-txt-comercial-telefono-1').getValue();
				var garan_comercial_telf_2 = Ext.getCmp(creditos.id+'-ref-txt-comercial-telefono-2').getValue();

				var rese_resena = Ext.getCmp(creditos.id+'-res-txt-resena').getValue();

				var sol_moneda = Ext.getCmp(creditos.id+'-sol-cmb-moneda').getValue();
				var sol_nro_cuota = Ext.getCmp(creditos.id+'-sol-txt-numero-cuotas').getValue();
				var sol_fecha_1_letra = Ext.getCmp(creditos.id+'-sol-date-fecha-1-letra').getValue();
				var sol_importe_aprobado = Ext.getCmp(creditos.id+'-sol-txt-import-aprobado').getValue();

				var mot_adqui_merca = Ext.getCmp(creditos.id+'-mot-chk-adqui-merca').getValue();
				var mot_ampliar_neg = Ext.getCmp(creditos.id+'-mot-chk-ampliar-neg').getValue();
				var mot_compra_acc_insu = Ext.getCmp(creditos.id+'-mot-chk-compra-acc-insu').getValue();
				var mot_otros = Ext.getCmp(creditos.id+'-mot-chk-otros').getValue();
				var mot_fecha = Ext.getCmp(creditos.id+'-mot-date-fecha').getValue();
				var mot_cod_asesor = Ext.getCmp(creditos.id+'-mot-cmb-promotor').getValue();
				var mot_cod_agencia = Ext.getCmp(creditos.id+'-mot-cmb-agencia').getValue();

				var ana_serv_luz = Ext.getCmp(creditos.id+'-ana-chk-serv-luz').getValue();
				var ana_serv_agua = Ext.getCmp(creditos.id+'-ana-chk-serv-agua').getValue();
				var ana_serv_cable = Ext.getCmp(creditos.id+'-ana-chk-serv-cable').getValue();
				var ana_serv_internet = Ext.getCmp(creditos.id+'-ana-chk-serv-internet').getValue();
				var ana_descripcion = Ext.getCmp(creditos.id+'-ana-txt-descripcion').getValue();
				var ana_apro_aprobado = Ext.getCmp(creditos.id+'-ana-chk-apro-aprobado').getValue();
				var ana_apro_asesor = Ext.getCmp(creditos.id+'-ana-chk-apro-asesor-comercial').getValue();


				global.Msg({
                    msg: '¿Seguro de guardar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(creditos.id+'-tabContent').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:creditos.url+'set_save/',
			                    params:{
			                    	vp_op:op,
			                    	vp_sol_moneda:sol_moneda,
									vp_sol_monto:sol_monto,
									vp_sol_tipo_cliente:sol_tipo_cliente,
									vp_sol_excep_si:sol_excep_si,
									vp_sol_excep_no:sol_excep_no,
									vp_sol_fecha:sol_fecha,
									vp_sol_ape_pat:sol_ape_pat,
									vp_sol_ape_mat:sol_ape_mat,
									vp_sol_nombres:sol_nombres,
									vp_sol_doc_dni:sol_doc_dni,
									vp_sol_doc_ce:sol_doc_ce,
									vp_sol_doc_cip:sol_doc_cip,
									vp_sol_doc_ruc:sol_doc_ruc,
									vp_sol_doc_cm:sol_doc_cm,
									vp_sol_estado_civil:sol_estado_civil,
									vp_sol_fecha_nac:sol_fecha_nac,
									vp_sol_tel_cel:sol_tel_cel,
									vp_sol_domi_propio:sol_domi_propio,
									vp_sol_domi_pagando:sol_domi_pagando,
									vp_sol_domi_alquilado:sol_domi_alquilado,
									vp_sol_domi_familiar:sol_domi_familiar,
									vp_sol_dir_direccion:sol_dir_direccion,
									vp_sol_dir_numero:sol_dir_numero,
									vp_sol_dir_mz:sol_dir_mz,
									vp_sol_dir_lt:sol_dir_lt,
									vp_sol_dir_dpto:sol_dir_dpto,
									vp_sol_dir_interior:sol_dir_interior,
									vp_sol_dir_urb:sol_dir_urb,
									vp_sol_dir_referencia:sol_dir_referencia,
									vp_sol_departamento:sol_departamento,
									vp_sol_provincia:sol_provincia,
									vp_sol_distrito:sol_distrito,


									vp_lab_dir_direccion:lab_dir_direccion,
									vp_lab_dir_numero:lab_dir_numero,
									vp_lab_dir_mz:lab_dir_mz,
									vp_lab_dir_lt:lab_dir_lt,
									vp_lab_dir_dpto:lab_dir_dpto,
									vp_lab_dir_interior:lab_dir_interior,
									vp_lab_dir_urb:lab_dir_urb,
									vp_lab_dir_referencia:lab_dir_referencia,
									vp_lab_departamento:lab_departamento,
									vp_lab_provincia:lab_provincia,
									vp_lab_distrito:lab_distrito,
									vp_lab_negocio:lab_negocio,
									vp_lab_ant_negocio:lab_ant_negocio,
									vp_lab_obs:lab_obs,

									vp_conyu_ape_pater:conyu_ape_pater,
									vp_conyu_ape_mater:conyu_ape_mater,
									vp_conyu_nombres:conyu_nombres,
									vp_conyu_dni:conyu_dni,
									vp_conyu_ce:conyu_ce,
									vp_conyu_cip:conyu_cip,
									vp_conyu_ruc:conyu_ruc,
									vp_conyu_cm:conyu_cm,
									vp_conyu_estado_civil:conyu_estado_civil,
									vp_conyu_fecha_nacimiento:conyu_fecha_nacimiento,
									vp_conyu_telefonos:conyu_telefonos,
									vp_conyu_contratado:conyu_contratado,
									vp_conyu_dependiente:conyu_dependiente,
									vp_conyu_independiente:conyu_independiente,
									vp_conyu_otros:conyu_otros,
									vp_conyu_bachiller:conyu_bachiller,
									vp_conyu_tecnologia:conyu_tecnologia,
									vp_conyu_titulado:conyu_titulado,
									vp_conyu_magister:conyu_magister,
									vp_conyu_profesion:conyu_profesion,
									vp_conyu_centro_trab:conyu_centro_trab,
									vp_conyu_cargo:conyu_cargo,
									vp_conyu_fecha_ingreso:conyu_fecha_ingreso,

									vp_garan_ape_pate:garan_ape_pate,
									vp_garan_ape_mate:garan_ape_mate,
									vp_garan_ape_nombres:garan_ape_nombres,
									vp_garan_doc_dni:garan_doc_dni,
									vp_garan_doc_ce:garan_doc_ce,
									vp_garan_doc_cip:garan_doc_cip,
									vp_garan_doc_ruc:garan_doc_ruc,
									vp_garan_doc_cm:garan_doc_cm,
									vp_garan_estado_civil:garan_estado_civil,
									vp_garan_fecha_nac:garan_fecha_nac,
									vp_garan_telefonos:garan_telefonos,
									vp_garan_domi_propio:garan_domi_propio,
									vp_garan_domi_pagando:garan_domi_pagando,
									vp_garan_domi_alquilado:garan_domi_alquilado,
									vp_garan_domi_familiar:garan_domi_familiar,
									vp_garan_profesion:garan_profesion,
									vp_garan_centro_lab:garan_centro_lab,
									vp_garan_cargo:garan_cargo,
									vp_garan_fecha_ingreso:garan_fecha_ingreso,
									vp_garan_dir_direccion:garan_dir_direccion,
									vp_garan_dir_numero:garan_dir_numero,
									vp_garan_dir_mz:garan_dir_mz,
									vp_garan_dir_lt:garan_dir_lt,
									vp_garan_dir_dpto:garan_dir_dpto,
									vp_garan_dir_interior:garan_dir_interior,
									vp_garan_dir_ubr:garan_dir_ubr,
									vp_garan_dir_ref:garan_dir_ref,
									vp_garan_departamento:garan_departamento,
									vp_garan_provincia:garan_provincia,
									vp_garan_distrito:garan_distrito,

									vp_garan_personal:garan_personal,
									vp_garan_personal_telf_1:garan_personal_telf_1,
									vp_garan_personal_telf_2:garan_personal_telf_2,
									vp_garan_comercial:garan_comercial,
									vp_garan_comercial_telf_1:garan_comercial_telf_1,
									vp_garan_comercial_telf_2:garan_comercial_telf_2,

									vp_rese_resena:rese_resena,

									vp_sol_moneda:sol_moneda,
									vp_sol_nro_cuota:sol_nro_cuota,
									vp_sol_fecha_1_letra:sol_fecha_1_letra,
									vp_sol_importe_aprobado:sol_importe_aprobado,

									vp_mot_adqui_merca:mot_adqui_merca,
									vp_mot_ampliar_neg:mot_ampliar_neg,
									vp_mot_compra_acc_insu:mot_compra_acc_insu,
									vp_mot_otros:mot_otros,
									vp_mot_fecha:mot_fecha,
									vp_mot_cod_asesor:mot_cod_asesor,
									vp_mot_cod_agencia:mot_cod_agencia,

									vp_ana_serv_luz:ana_serv_luz,
									vp_ana_serv_agua:ana_serv_agua,
									vp_ana_serv_cable:ana_serv_cable,
									vp_ana_serv_internet:ana_serv_internet,
									vp_ana_descripcion:ana_descripcion,
									vp_ana_apro_aprobado:ana_apro_aprobado,
									vp_ana_apro_asesor:ana_apro_asesor
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(creditos.id+'-tabContent').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//creditos.getHistory();
			                                	Ext.getCmp(creditos.id+'-win-form').close();
			                                }
			                            });
			                        } else{
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 0,
			                                buttons: 1,
			                                fn: function(btn){
			                                	 
			                                }
			                            });
			                        }
			                    }
			                });
						}
					}
				});

			},
			setSavecreditos:function(op){

		    	var codigo = Ext.getCmp(creditos.id+'-txt-codigo').getValue();
		    	var usuario = Ext.getCmp(creditos.id+'-txt-usuario-creditos').getValue();
		    	var clave = Ext.getCmp(creditos.id+'-txt-clave').getValue();
		    	var nombre = Ext.getCmp(creditos.id+'-txt-nombre-creditos').getValue();
		    	var perfil = Ext.getCmp(creditos.id+'-cmb-perfil').getValue();
		    	var estado = Ext.getCmp(creditos.id+'-cmb-estado-creditos').getValue();

				if(usuario==''){ 
					global.Msg({msg:"Ingrese Usuario.",icon:2,fn:function(){}});
					return false;
				}
				if(clave==''){ 
					global.Msg({msg:"Ingrese Clave.",icon:2,fn:function(){}});
					return false;
				}
				if(nombre==''){ 
					global.Msg({msg:"Ingrese Nombre.",icon:2,fn:function(){}});
					return false;
				}
				if(perfil==''){ 
					global.Msg({msg:"Seleccione Perfil.",icon:2,fn:function(){}});
					return false;
				}
				if(estado==''){ 
					global.Msg({msg:"Seleccione Estado.",icon:2,fn:function(){}});
					return false;
				}

				
				global.Msg({
                    msg: '¿Seguro de guardar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(creditos.id+'-tab').el.mask('Elinando Páginas…', 'x-mask-loading');
	                        scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:control.url+'set_save/',
			                    params:{
			                    	vp_op:op,
			                    	vp_id_creditos:codigo,
			                    	vp_usr_codigo:usuario,
			                    	vp_usr_passwd:clave,
			                    	vp_usr_nombre:nombre,
			                    	vp_usr_perfil:perfil,
			                    	vp_usr_estado:estado
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                        Ext.getCmp(creditos.id+'-tab').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	creditos.getHistory();
			                                	Ext.getCmp(creditos.id+'-win-form').close();
			                                }
			                            });
			                        } else{
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 0,
			                                buttons: 1,
			                                fn: function(btn){
			                                	 
			                                }
			                            });
			                        }
			                    }
			                });
						}
					}
				});
			},
		    getHistory:function(){
		    	var vp_op = Ext.getCmp(creditos.id+'-txt-estado-filter').getValue();
				var nombre = Ext.getCmp(creditos.id+'-txt-creditos').getValue();

		    	Ext.getCmp(creditos.id + '-grid-credit').getStore().removeAll();
				Ext.getCmp(creditos.id + '-grid-credit').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:nombre},
	                callback:function(){
	                	//Ext.getCmp(creditos.id+'-form').el.unmask();
	                }
	            });
	            
		    },
			getImagen:function(param){
				win.getGalery({container:'GaleryFull',width:390,height:250,params:{forma:'F',img_path:'/images/icon/'+param}});///creditos/
			},
			getContratos:function(shi_codigo){
				Ext.getCmp(creditos.id+'-cbx-contrato').getStore().removeAll();
				Ext.getCmp(creditos.id+'-cbx-contrato').getStore().load(
	                {params: {vp_shi_codigo:shi_codigo},
	                callback:function(){
	                	//Ext.getCmp(creditos.id+'-form').el.unmask();
	                }
	            });
			}
		}
		Ext.onReady(creditos.init,creditos);
	}else{
		tab.setActiveTab(creditos.id+'-tab');
	}
</script>