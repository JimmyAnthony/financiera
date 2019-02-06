<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('asesores-tab')){
		var asesores = {
			id:'asesores',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/asesor/',
			url_per:'/gestion/persona/',
			opcion:'I',
			id_lote:0,
			shi_codigo:0,
			fac_cliente:0,
			lote:0,
			paramsStore:{},
			back:'NONE',
			init:function(){
				Ext.tip.QuickTipManager.init();

				var store_asesores = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'id_asesores', type: 'string'},
	                    {name: 'usr_codigo', type: 'string'},
	                    {name: 'usr_tipo', type: 'string'},
	                    {name: 'usr_nombre', type: 'string'},                    
	                    {name: 'per_id', type: 'string'},
	                    {name: 'id_contacto', type: 'string'},
	                    {name: 'usr_perfil', type: 'string'},
	                    {name: 'usr_estado', type: 'string'},
	                    {name: 'id_usuario', type: 'string'},
	                    {name: 'fecact', type: 'string'},
	                    {name: 'hora', type: 'string'}
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: asesores.url+'get_list_asesores/',
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
	                    {name: 'id_asesores', type: 'string'},
	                    {name: 'fecha_actual', type: 'string'}
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: asesores.url+'get_list_shipper/',
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
	                    url: asesores.url+'get_list_contratos/',
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
	                    url: asesores.url+'get_ocr_plantillas/',
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
	                    url: asesores.url+'get_ocr_trazos/',
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

			    

			    var myDataLote = [
					['C','CÓDIGO'],
				    ['D','DNI'],
				    ['N','NOMBRE']
				];
				var store_filtro = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: true,
			        data: myDataLote,
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

			    var myDataEstadoCivil = [
					['S','Soltero'],
				    ['C','Casado'],
				    ['V','Viudo']
				];
				asesores.store_estado_civil = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: true,
			        data: myDataEstadoCivil,
			        fields: ['code', 'name']
			    });

			    var myDataTipoTel = [
					['CE','Celular'],
				    ['FI','Fijo']
				];
				asesores.store_tipo_tel = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'tel',
			        autoLoad: true,
			        data: myDataTipoTel,
			        fields: ['code', 'name']
			    });

			    var myDataLineaTel = [
					['C','Claro'],
				    ['M','Movistar'],
				    ['F','Fijo']
				];
				asesores.store_linea_tel = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'tel',
			        autoLoad: true,
			        data: myDataLineaTel,
			        fields: ['code', 'name']
			    });

			    asesores.store_ubigeo = Ext.create('Ext.data.Store',{
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
	                    url: asesores.url+'get_list_ubigeo/',
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

	            asesores.store_ubigeo2 = Ext.create('Ext.data.Store',{
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
	                    url: asesores.url+'get_list_ubigeo/',
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

	            asesores.store_ubigeo3 = Ext.create('Ext.data.Store',{
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
	                    url: asesores.url+'get_list_ubigeo/',
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

				var panel = Ext.create('Ext.form.Panel',{
					id:asesores.id+'-form',
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
					id:asesores.id+'-tab',
					bodyStyle: 'background: transparent',
					bodyCls: 'transparent',
					border:false,
					autoScroll:true,
					closable:true,
					layout:'border',
					items:[
						{
							region:'west',
							bodyStyle: 'background: transparent',
							bodyCls: 'transparent',
							border:false,
							width:'15%'
						},
						{
							region:'east',
							bodyStyle: 'background: transparent',
							bodyCls: 'transparent',
							border:false,
							width:'15%'
						},
						{
							region:'center',
							layout:'border',
							border:false,
							bodyStyle: 'background: transparent',
							bodyCls: 'transparent',
							items:[
								{
		                            region:'north',
		                            layout:'border',
		                            bodyStyle: 'background: transparent',
		                            bodyCls: 'transparent',
		                            border:false,
		                            height:125,
		                            items:[
				                        {
				                            region:'center',
				                            border:false,
				                            xtype: 'uePanelS',
				                            bodyStyle: 'background: transparent',
				                            logo: 'AS',
				                            title: 'LISTADO DE ASESORES',
				                            legend: 'Gestión de Créditos',
				                            width:1100,
				                            height:115,
				                            items:[
				                                {
				                                    xtype:'panel',
				                                    border:false,
				                                    bodyStyle: 'background: transparent',
				                                    padding:'2px 5px 1px 5px',
				                                    layout:'column',

				                                    items: [
				                                    	{
					                                   		width: 320,border:false,
					                                    	padding:'15px 5px 5px 20px',
					                                    	bodyStyle: 'background: transparent',
					                                 		items:[
					                                                {
					                                                    xtype:'combo',
					                                                    fieldLabel: 'BUSCAR POR',
					                                                    bodyStyle: 'background: transparent',
														                labelStyle: "font-size:18px;font-weight:bold;padding:6px 0px 0px 0px;text-align: center;font-weight: bold",
												                        fieldStyle: 'font-size:20px; text-align: center; font-weight: bold',
					                                                    id:asesores.id+'-txt-estado-filter',
					                                                    store: store_filtro,
					                                                    queryMode: 'local',
					                                                    triggerAction: 'all',
					                                                    valueField: 'code',
					                                                    displayField: 'name',
					                                                    emptyText: '[Seleccione]',
					                                                    labelAlign:'right',
					                                                    //allowBlank: false,
					                                                    labelWidth: 150,
					                                                    width:'95%',
					                                                    anchor:'100%',
					                                                    //readOnly: true,
					                                                    listeners:{
					                                                        afterrender:function(obj, e){
					                                                            // obj.getStore().load();
					                                                            Ext.getCmp(asesores.id+'-txt-estado-filter').setValue('C');
					                                                        },
					                                                        select:function(obj, records, eOpts){
					                                                
					                                                        }
					                                                    }
					                                                }
					                                 		]
					                                    },
				                                        {
				                                            width:200,border:false,
				                                            padding:'15px 5px 5px 5px',
				                                            bodyStyle: 'background: transparent',
				                                            items:[
				                                                {
				                                                    xtype: 'textfield',	
				                                                    fieldLabel: '',
				                                                    id:asesores.id+'-txt-asesores',
				                                                    labelWidth:0,
				                                                    //readOnly:true,
				                                                    labelAlign:'right',
				                                                    height:30,
										                            labelStyle: "font-size:20px;font-weight:bold;padding:4px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:20px; text-align: center; font-weight: bold',
				                                                    width:'100%',
				                                                    anchor:'100%'
				                                                }
				                                            ]
				                                        },/*
				                                        {
					                                        width: 140,border:false,
					                                        hidden:true,
					                                        padding:'0px 2px 0px 0px',  
					                                    	bodyStyle: 'background: transparent',
					                                        items:[
					                                            {
					                                                xtype:'datefield',
					                                                id:asesores.id+'-txt-fecha-filtro',
					                                                fieldLabel:'Fecha',
					                                                labelWidth:50,
					                                                labelAlign:'right',
					                                                value:new Date(),
					                                                format: 'Ymd',
					                                                //readOnly:true,
					                                                width: '100%',
					                                                anchor:'100%'
					                                            }
					                                        ]
					                                    },*/
				                                        {
				                                            width: 90,border:false,
				                                            padding:'15px 5px 5px 5px',
				                                            bodyStyle: 'background: transparent',
				                                            items:[
				                                                {
											                        xtype:'button',
											                        flex:1,
											                        scale: 'medium',
											                        text: 'Buscar',
											                        icon: '/images/icon/binocular.png',
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
											                            	asesores.getAsesores();
											                            }
											                        }
											                    }
				                                            ]
				                                        },
				                                        {
				                                            width: 90,border:false,
				                                            padding:'15px 5px 5px 5px',
				                                            bodyStyle: 'background: transparent',
				                                            items:[
				                                                {
											                        xtype:'button',
											                        text: 'Nuevo',
											                        flex:1,
											                        scale: 'medium',
											                        icon: '/images/icon/Draft.png',
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
				                               					            //asesores.getNew();
				                               					            win.show({vurl: asesores.url_per, id_menu: asesores.id_menu, class: ''});
											                            }
											                        }
											                    }
				                                            ]
				                                        },
				                                        {
				                                            width: 90,border:false,
				                                            padding:'15px 5px 5px 5px',
				                                            bodyStyle: 'background: transparent',
				                                            items:[
				                                                {
											                        xtype:'button',
											                        text: 'Atrás',
											                        flex:1,
											                        scale: 'medium',
											                        icon: '/images/icon/get_back.png',
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
				                               					            asesores.setBack();
											                            }
											                        }
											                    }
				                                            ]
				                                        }
				                                    ]
				                                }
				                            ]
				                        }
				                    ]
				                },
				                {
				                	region:'center',
				                	layout:'fit',
				                	bodyStyle: 'background: transparent',
				                	bodyCls: 'transparent',
				                	border:false,
				                	items:[
					                	{
											xtype: 'tabpanel',
											//region:'center',
											bodyStyle: 'background: transparent',
		                                    id: asesores.id+'-tabContent',
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
						                		{
									                id:asesores.id+'-contentAsesores',
									                bodyStyle: 'background: transparent',
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
								                            xtype:'GridViewVertAS',
								                            id:asesores.id,
								                            mode:2,
								                            tab:asesores.id+'-tabContent',
								                            url:asesores.url+'getDataMenuView/',
								                            back:'-contentAsesores',
								                            params:{sis_id:2}
								                        }
								                    ]
								                },
								                {
									                id:asesores.id+'-contentClientes',
									                bodyStyle: 'background: transparent',
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
									                /*html:'<div id="menu_spinner" class="spinner"><div class="cube1"></div><div class="cube2"></div></div>',*/
									                items:[
								                        {
								                            xtype:'GridViewVertCLI',
								                            id:asesores.id,
								                            mode:2,
								                            tab:asesores.id+'-tabContent',
								                            url:asesores.url+'getDataListClientes/',
								                            back:'-contentClientes',
								                            params:{sis_id:2}
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
							]
						}
					],
					listeners:{
						beforerender: function(obj, opts){
	                        global.state_item_menu(asesores.id_menu, true);
	                    },
	                    afterrender: function(obj, e){
	                    	//asesores.getReloadGridasesores('');
	                        tab.setActiveTab(obj);
	                        global.state_item_menu_config(obj,asesores.id_menu);
	                        asesores.getAsesores();
	                    },
	                    beforeclose:function(obj,opts){
	                    	global.state_item_menu(asesores.id_menu, false);
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
			setBack:function(){
				var tab=Ext.getCmp(asesores.id+'-tabContent');
				var active=Ext.getCmp(asesores.id+asesores.back);
				tab.setActiveTab(active);
			},
			getAsesores:function(){
				var vp_op=Ext.getCmp(asesores.id+'-txt-estado-filter').getValue();
            	var vp_nombre=Ext.getCmp(asesores.id+'-txt-asesores').getValue();
		            Ext.getCmp(asesores.id+'-menu-view').getStore().removeAll();
				Ext.getCmp(asesores.id+'-menu-view').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:vp_nombre},
	                callback:function(){
	                	//Ext.getCmp(asesores.id+'-form').el.unmask();
	                }
	            });
			},
			getClientes:function(vp_id){
				var vp_op=Ext.getCmp(asesores.id+'-txt-estado-filter').getValue();
            	var vp_nombre=Ext.getCmp(asesores.id+'-txt-asesores').getValue();
		        Ext.getCmp(asesores.id+'-list-clientes').getStore().removeAll();
				Ext.getCmp(asesores.id+'-list-clientes').getStore().load(
	                {params: {vp_op:vp_op,vp_id:vp_id},
	                callback:function(){
	                	//Ext.getCmp(asesores.id+'-form').el.unmask();
	                }
	            });
			},
			getEdit:function(index){
				var rec = Ext.getCmp(asesores.id + '-grid-asesores').getStore().getAt(index);
				asesores.setForm('U',rec.data);
			},
			getNew:function(){
				asesores.setForm('I',{id_asesores:0,usr_codigo:'',usr_nombre:'',usr_perfil:1,usr_estado:1});
			},
			setForm:function(op,data){

                
			},
			getUbigeo:function(json,obj,value){
				console.log(obj);
		    	obj.getStore().removeAll();
				obj.getStore().load(
	                {params: json,
	                callback:function(){
	                	//Ext.getCmp(agencias.id+'-form').el.unmask();
	                	obj.setValue(value);
	                }
	            });
			},
			setSaveasesores:function(op){

		    	var codigo = Ext.getCmp(asesores.id+'-txt-codigo').getValue();
		    	var usuario = Ext.getCmp(asesores.id+'-txt-usuario-asesores').getValue();
		    	var clave = Ext.getCmp(asesores.id+'-txt-clave').getValue();
		    	var nombre = Ext.getCmp(asesores.id+'-txt-nombre-asesores').getValue();
		    	var perfil = Ext.getCmp(asesores.id+'-cmb-perfil').getValue();
		    	var estado = Ext.getCmp(asesores.id+'-cmb-estado-asesores').getValue();

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
                    		Ext.getCmp(asesores.id+'-tab').el.mask('Elinando Páginas…', 'x-mask-loading');
	                        scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:control.url+'set_save/',
			                    params:{
			                    	vp_op:op,
			                    	vp_id_asesores:codigo,
			                    	vp_usr_codigo:usuario,
			                    	vp_usr_passwd:clave,
			                    	vp_usr_nombre:nombre,
			                    	vp_usr_perfil:perfil,
			                    	vp_usr_estado:estado
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                        Ext.getCmp(asesores.id+'-tab').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	asesores.getHistory();
			                                	Ext.getCmp(asesores.id+'-win-form').close();
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
		    	var vp_op = Ext.getCmp(asesores.id+'-txt-estado-filter').getValue();
				var nombre = Ext.getCmp(asesores.id+'-txt-asesores').getValue();

		    	Ext.getCmp(asesores.id + '-grid-asesores').getStore().removeAll();
				Ext.getCmp(asesores.id + '-grid-asesores').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:nombre},
	                callback:function(){
	                	//Ext.getCmp(asesores.id+'-form').el.unmask();
	                }
	            });
	            
		    },
			getImagen:function(param){
				win.getGalery({container:'GaleryFull',width:390,height:250,params:{forma:'F',img_path:'/images/icon/'+param}});///asesores/
			},
			getContratos:function(shi_codigo){
				Ext.getCmp(asesores.id+'-cbx-contrato').getStore().removeAll();
				Ext.getCmp(asesores.id+'-cbx-contrato').getStore().load(
	                {params: {vp_shi_codigo:shi_codigo},
	                callback:function(){
	                	//Ext.getCmp(asesores.id+'-form').el.unmask();
	                }
	            });
			}
		}
		Ext.onReady(asesores.init,asesores);
	}else{
		tab.setActiveTab(asesores.id+'-tab');
	}
</script>