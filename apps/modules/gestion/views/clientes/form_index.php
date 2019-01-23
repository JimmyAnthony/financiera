<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('clientes-tab')){
		var clientes = {
			id:'clientes',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/clientes/',
			urli: '/inicio/index/',
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
	                    url: clientes.url+'get_list_ubigeo/',
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
	                    url: clientes.url+'get_list_ubigeo/',
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
	                    url: clientes.url+'get_list_ubigeo/',
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
	                    url: clientes.url+'get_credit_list/',
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
	                    {name: 'id_clientes', type: 'string'},
	                    {name: 'fecha_actual', type: 'string'}
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: clientes.url+'get_list_shipper/',
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
	                    url: clientes.url+'get_list_contratos/',
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
	                    url: clientes.url+'get_ocr_plantillas/',
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
	                    url: clientes.url+'get_ocr_trazos/',
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
					id:clientes.id+'-form',
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
					id:clientes.id+'-tab',
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
					                id:clientes.id+'-contentMenuClient',
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
					                            id:clientes.id,
					                            url:clientes.url+'getDataMenu/',
					                            params:{sis_id:2}
					                        }
					                    ]
				                }
							]
						},
						{
							region:'center',
							layout:'border',
							items:[
								{
									region:'west',
									layout:'border',
									//hidden:true,
									width:200,
									//border:false,
									items:[
										{
											region:'north',
											height:220,
											layout:'fit',
											padding:'5px 5px 5px 5px',
											html: '<img src="/images/menu/usuario.png" style="width:100%; padding:20px;" >'
										},
										{
											region:'center',
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
						                            id:clientes.id+'-txt-dni',
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
								},
								{
									xtype: 'tabpanel',
									region:'center',
                                    id: clientes.id+'-tabContent',
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
										/*ANÁLISIS*/
										{
											layout:'border',
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
														                            fieldLabel: '',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
																			        style: 'font: normal 25px Sans-serif;font-weight: bold;',
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
														                            fieldLabel: 'Promotor Financiero',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-cmb-moneda',
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
														                            fieldLabel: 'Agencia',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-cmb-moneda',
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
										/*SOLICITUD*/
										{
											layout:'border',
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
														                            fieldLabel: 'Moneda',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-cmb-moneda',
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
														                            fieldLabel: 'N° Cuotas',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'Importe Aprobado',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
										/*RESEÑA*/
										{
											layout:'border',
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
														                            fieldLabel: '',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
										/*REFERENCIA*/
										{
											layout:'border',
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
														                            fieldLabel: 'Personal',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'Teléfono 1',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'Teléfono 2',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'Comercial',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'Teléfono 1',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'Teléfono 2',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
										/*GARANTE*/
										{
											layout:'border',
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
												                            fieldLabel: 'Apellido Paterno',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'Apellido Materno',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'DNI',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'CE',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'CIP',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'RUC',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'CM',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            //id:clientes.id+'-txt-dni',
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
												                            //id:clientes.id+'-cmb-estado-civil',
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
												                            fieldLabel: 'Teléfono Fijo/N° Celular',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'Profesión',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'Centro de Trabajo Actual',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'Cargo que Ocupa',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'Avenida/Calle/Jirón/Pasaje',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'N°',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'MZ',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'LT',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'DPTO',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'INT.',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'Urbanización/AA.HH/PJ/ASOC',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'Referencia de Domicilio',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
						                                                    //id:clientes.id+'-txt-departamento',
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
						                                                			Ext.getCmp(clientes.id+'-txt-provincia').getStore().removeAll();
						                                                			Ext.getCmp(clientes.id+'-txt-Distrito').getStore().removeAll();
						                                                        	clientes.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,'100101');
						                                                            // obj.getStore().load();
						                                                            //Ext.getCmp(clientes.id+'-txt-estado-filter').setValue('U');
						                                                        },
						                                                        select:function(obj, records, eOpts){
						                                                			var pro = Ext.getCmp(clientes.id+'-txt-provincia');
						                                                			Ext.getCmp(clientes.id+'-txt-provincia').setValue('');
						                                                			Ext.getCmp(clientes.id+'-txt-Distrito').getStore().removeAll();
						                                                			Ext.getCmp(clientes.id+'-txt-Distrito').setValue('');
						                                                        	clientes.getUbigeo({VP_OP:'P',VP_VALUE:obj.getValue()},pro,'');
						                                                        }
						                                                    }
						                                                },
						                                                {
						                                                    xtype:'combo',
						                                                    fieldLabel: 'Provincia',
						                                                    //id:clientes.id+'-txt-provincia',
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
						                                                			Ext.getCmp(clientes.id+'-txt-Distrito').getStore().removeAll();
						                                                        	clientes.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},obj,'100601');
						                                                        },
						                                                        select:function(obj, records, eOpts){
						                                                			var dis=Ext.getCmp(clientes.id+'-txt-Distrito');
						                                                        	clientes.getUbigeo({VP_OP:'X',VP_VALUE:obj.getValue()},dis,'');
						                                                        }
						                                                    }
						                                                },
						                                                {
						                                                    xtype:'combo',
						                                                    fieldLabel: 'Distrito',
						                                                    //id:clientes.id+'-txt-Distrito',
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
						                                                        	clientes.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
						                                                            // obj.getStore().load();
						                                                            //Ext.getCmp(clientes.id+'-txt-estado-filter').setValue('U');
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
										/*CONYUGUE*/
										{
											layout:'border',
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
												                            fieldLabel: 'Apellido Paterno',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'Apellido Materno',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'DNI',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'CE',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'CIP',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'RUC',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'CM',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            //id:clientes.id+'-txt-dni',
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
												                            //id:clientes.id+'-cmb-estado-civil',
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
												                            fieldLabel: 'Teléfono Fijo/N° Celular',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'Profesión',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'Centro de Trabajo Actual',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'Cargo que Ocupa',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
										/*LABORAL*/
										{
											layout:'border',
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
														                            fieldLabel: 'Avenida/Calle/Jirón/Pasaje',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'N°',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'MZ',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'LT',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'DPTO',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'INT.',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'Urbanización/AA.HH/PJ/ASOC',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'Referencia de Domicilio / Fiscal',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
								                                                    //id:clientes.id+'-txt-departamento',
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
								                                                			Ext.getCmp(clientes.id+'-txt-provincia').getStore().removeAll();
								                                                			Ext.getCmp(clientes.id+'-txt-Distrito').getStore().removeAll();
								                                                        	clientes.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,'100101');
								                                                            // obj.getStore().load();
								                                                            //Ext.getCmp(clientes.id+'-txt-estado-filter').setValue('U');
								                                                        },
								                                                        select:function(obj, records, eOpts){
								                                                			var pro = Ext.getCmp(clientes.id+'-txt-provincia');
								                                                			Ext.getCmp(clientes.id+'-txt-provincia').setValue('');
								                                                			Ext.getCmp(clientes.id+'-txt-Distrito').getStore().removeAll();
								                                                			Ext.getCmp(clientes.id+'-txt-Distrito').setValue('');
								                                                        	clientes.getUbigeo({VP_OP:'P',VP_VALUE:obj.getValue()},pro,'');
								                                                        }
								                                                    }
								                                                },
								                                                {
								                                                    xtype:'combo',
								                                                    fieldLabel: 'Provincia',
								                                                    //id:clientes.id+'-txt-provincia',
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
								                                                			Ext.getCmp(clientes.id+'-txt-Distrito').getStore().removeAll();
								                                                        	clientes.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},obj,'100601');
								                                                        },
								                                                        select:function(obj, records, eOpts){
								                                                			var dis=Ext.getCmp(clientes.id+'-txt-Distrito');
								                                                        	clientes.getUbigeo({VP_OP:'X',VP_VALUE:obj.getValue()},dis,'');
								                                                        }
								                                                    }
								                                                },
								                                                {
								                                                    xtype:'combo',
								                                                    fieldLabel: 'Distrito',
								                                                    //id:clientes.id+'-txt-Distrito',
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
								                                                        	clientes.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
								                                                            // obj.getStore().load();
								                                                            //Ext.getCmp(clientes.id+'-txt-estado-filter').setValue('U');
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
														                            fieldLabel: 'Giro del Negocio',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'Antiguedad del Negocio',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
														                            fieldLabel: 'Observación Adicional',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:clientes.id+'-txt-dni',
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
										/*PRINCIPAL*/
										{
											layout:'border',
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
										                            id:clientes.id+'-cmb-moneda',
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
										                            bodyStyle: 'background: transparent',
												                    padding:'15px 5px 5px 25px',
										                            //id:clientes.id+'-txt-dni',
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
										                            bodyStyle: 'background: transparent',
												                    padding:'15px 5px 5px 25px',
										                            //id:clientes.id+'-txt-dni',
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
																			        name: 'checkbox1',
																			        fieldLabel: 'SI',
																			        labelWidth:40,
																			        //boxLabel: 'box label',
																			        labelStyle: "font-size:17px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
																			    },
																			    {
																			        xtype: 'checkboxfield',
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
												                            fieldLabel: 'Apellido Paterno',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'Apellido Materno',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'DNI',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'CE',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'CIP',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'RUC',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'CM',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            //id:clientes.id+'-txt-dni',
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
												                            id:clientes.id+'-cmb-estado-civil',
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
												                            fieldLabel: 'Teléfono Fijo/N° Celular',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'N°',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'MZ',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'LT',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'DPTO',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'INT.',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'Urbanización/AA.HH/PJ/ASOC',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
												                            fieldLabel: 'Referencia de Domicilio',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:clientes.id+'-txt-dni',
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
						                                                    id:clientes.id+'-txt-departamento',
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
						                                                			Ext.getCmp(clientes.id+'-txt-provincia').getStore().removeAll();
						                                                			Ext.getCmp(clientes.id+'-txt-Distrito').getStore().removeAll();
						                                                        	clientes.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,'100101');
						                                                            // obj.getStore().load();
						                                                            //Ext.getCmp(clientes.id+'-txt-estado-filter').setValue('U');
						                                                        },
						                                                        select:function(obj, records, eOpts){
						                                                			var pro = Ext.getCmp(clientes.id+'-txt-provincia');
						                                                			Ext.getCmp(clientes.id+'-txt-provincia').setValue('');
						                                                			Ext.getCmp(clientes.id+'-txt-Distrito').getStore().removeAll();
						                                                			Ext.getCmp(clientes.id+'-txt-Distrito').setValue('');
						                                                        	clientes.getUbigeo({VP_OP:'P',VP_VALUE:obj.getValue()},pro,'');
						                                                        }
						                                                    }
						                                                },
						                                                {
						                                                    xtype:'combo',
						                                                    fieldLabel: 'Provincia',
						                                                    id:clientes.id+'-txt-provincia',
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
						                                                			Ext.getCmp(clientes.id+'-txt-Distrito').getStore().removeAll();
						                                                        	clientes.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},obj,'100601');
						                                                        },
						                                                        select:function(obj, records, eOpts){
						                                                			var dis=Ext.getCmp(clientes.id+'-txt-Distrito');
						                                                        	clientes.getUbigeo({VP_OP:'X',VP_VALUE:obj.getValue()},dis,'');
						                                                        }
						                                                    }
						                                                },
						                                                {
						                                                    xtype:'combo',
						                                                    fieldLabel: 'Distrito',
						                                                    id:clientes.id+'-txt-Distrito',
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
						                                                        	clientes.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
						                                                            // obj.getStore().load();
						                                                            //Ext.getCmp(clientes.id+'-txt-estado-filter').setValue('U');
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
										}
									]
								}
							]
						}
					],
					listeners:{
						beforerender: function(obj, opts){
	                        global.state_item_menu(clientes.id_menu, true);
	                    },
	                    afterrender: function(obj, e){
	                    	//clientes.getReloadGridclientes('');
	                        tab.setActiveTab(obj);
	                        global.state_item_menu_config(obj,clientes.id_menu);
	                        Ext.getCmp(clientes.id+'-txt-dni').focus();
	                    },
	                    beforeclose:function(obj,opts){
	                    	global.state_item_menu(clientes.id_menu, false);
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
	                	//Ext.getCmp(clientes.id+'-form').el.unmask();
	                	obj.setValue(value);
	                }
	            });
			},
			getEdit:function(index){
				var rec = Ext.getCmp(clientes.id + '-grid-credit').getStore().getAt(index);
				clientes.setForm('U',rec.data);
			},
			getNew:function(){
				clientes.setForm('I',{id_clientes:0,usr_codigo:'',usr_nombre:'',usr_perfil:1,usr_estado:1});
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

			    var myDataclientes = [
					[1,'Activo'], 
				    [0,'Inactivo']
				];
				var store_estado_clientes = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'perfil',
			        autoLoad: true,
			        data: myDataclientes,
			        fields: ['code', 'name']
			    });

                Ext.create('Ext.window.Window',{
	                id:clientes.id+'-win-form',
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
                            id:clientes.id+'-txt-codigo',
                            labelWidth:50,
                            //readOnly:true,
                            labelAlign:'right',
                            width:'50%',
                            anchor:'100%',
                            listeners:{
                                afterrender:function(obj, e){
                                    // obj.getStore().load();
                                    obj.setValue(data.id_clientes);
                                }
                            }
                        },
                        {
                            xtype: 'textfield',	
                            fieldLabel: 'Usuario',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            id:clientes.id+'-txt-usuario-clientes',
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
                            id:clientes.id+'-txt-clave',
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
                            id:clientes.id+'-txt-nombre-clientes',
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
                            id:clientes.id+'-cmb-perfil',
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
                                    Ext.getCmp(clientes.id+'-cmb-perfil').setValue(data.usr_perfil);
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
                            id:clientes.id+'-cmb-estado-clientes',
                            store: store_estado_clientes,
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
                                    Ext.getCmp(clientes.id+'-cmb-estado-clientes').setValue(data.usr_estado);
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
	                            	clientes.setSaveclientes(op);
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
	                                Ext.getCmp(clientes.id+'-win-form').close();
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
			setSaveclientes:function(op){

		    	var codigo = Ext.getCmp(clientes.id+'-txt-codigo').getValue();
		    	var usuario = Ext.getCmp(clientes.id+'-txt-usuario-clientes').getValue();
		    	var clave = Ext.getCmp(clientes.id+'-txt-clave').getValue();
		    	var nombre = Ext.getCmp(clientes.id+'-txt-nombre-clientes').getValue();
		    	var perfil = Ext.getCmp(clientes.id+'-cmb-perfil').getValue();
		    	var estado = Ext.getCmp(clientes.id+'-cmb-estado-clientes').getValue();

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
                    		Ext.getCmp(clientes.id+'-tab').el.mask('Elinando Páginas…', 'x-mask-loading');
	                        scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:control.url+'set_save/',
			                    params:{
			                    	vp_op:op,
			                    	vp_id_clientes:codigo,
			                    	vp_usr_codigo:usuario,
			                    	vp_usr_passwd:clave,
			                    	vp_usr_nombre:nombre,
			                    	vp_usr_perfil:perfil,
			                    	vp_usr_estado:estado
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                        Ext.getCmp(clientes.id+'-tab').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	clientes.getHistory();
			                                	Ext.getCmp(clientes.id+'-win-form').close();
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
		    	var vp_op = Ext.getCmp(clientes.id+'-txt-estado-filter').getValue();
				var nombre = Ext.getCmp(clientes.id+'-txt-clientes').getValue();

		    	Ext.getCmp(clientes.id + '-grid-credit').getStore().removeAll();
				Ext.getCmp(clientes.id + '-grid-credit').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:nombre},
	                callback:function(){
	                	//Ext.getCmp(clientes.id+'-form').el.unmask();
	                }
	            });
	            
		    },
			getImagen:function(param){
				win.getGalery({container:'GaleryFull',width:390,height:250,params:{forma:'F',img_path:'/images/icon/'+param}});///clientes/
			},
			getContratos:function(shi_codigo){
				Ext.getCmp(clientes.id+'-cbx-contrato').getStore().removeAll();
				Ext.getCmp(clientes.id+'-cbx-contrato').getStore().load(
	                {params: {vp_shi_codigo:shi_codigo},
	                callback:function(){
	                	//Ext.getCmp(clientes.id+'-form').el.unmask();
	                }
	            });
			}
		}
		Ext.onReady(clientes.init,clientes);
	}else{
		tab.setActiveTab(clientes.id+'-tab');
	}
</script>