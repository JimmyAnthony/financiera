<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('clientes-tab')){
		var clientes = {
			id:'clientes',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/clientes/',
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
				clientes.store_estado_civil = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: true,
			        data: myDataEstadoCivil,
			        fields: ['code', 'name']
			    });

			    var myDataTipoTel = [
					['CE','Celular'],
				    ['FI','Fijo']
				];
				clientes.store_tipo_tel = Ext.create('Ext.data.ArrayStore', {
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
				clientes.store_linea_tel = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'tel',
			        autoLoad: true,
			        data: myDataLineaTel,
			        fields: ['code', 'name']
			    });

			    clientes.store_ubigeo = Ext.create('Ext.data.Store',{
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

	            clientes.store_ubigeo2 = Ext.create('Ext.data.Store',{
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

	            clientes.store_ubigeo3 = Ext.create('Ext.data.Store',{
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


				tab.add({
					id:clientes.id+'-tab',
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
				                            title: 'LISTADO DE clientes',
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
					                                                    id:clientes.id+'-txt-estado-filter',
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
					                                                            Ext.getCmp(clientes.id+'-txt-estado-filter').setValue('C');
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
				                                                    id:clientes.id+'-txt-clientes',
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
					                                                id:clientes.id+'-txt-fecha-filtro',
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
											                            	clientes.getClientes();
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
				                               					            //clientes.getNew();
				                               					            win.show({vurl: clientes.url_per+'?id_id=0&id_per=0', id_menu: clientes.id_menu, class: ''});
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
											                        text: 'Editar',
											                        flex:1,
											                        scale: 'medium',
											                        icon: '/images/icon/edit.png',
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
				                               					            //clientes.getNew();
				                               					            try{
					                               					            var data = Ext.getCmp(clientes.id+'-list-clientes').getSelectionModel().getSelected().items[0].data;
					                               					            win.show({vurl: clientes.url_per+'?id_id='+data.id_cli+'&id_per='+data.id_per, id_menu: clientes.id_menu, class: ''});
					                               					        }catch(e){
					                               					        	global.Msg({msg:"Seleccione un registro en la lista para editar.",icon:2,fn:function(){}});	
					                               					        }
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
				                               					            clientes.setBack();
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
								                {
									                id:clientes.id+'-contentClientes',
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
								                            bodyStyle: 'background: transparent',
                        									bodyCls: 'transparent',
								                            id:clientes.id,
								                            mode:2,
								                            tab:clientes.id+'-tabContent',
								                            url:clientes.url+'getDataListClientes/',
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
	                        global.state_item_menu(clientes.id_menu, true);
	                    },
	                    afterrender: function(obj, e){
	                    	//clientes.getReloadGridclientes('');
	                        tab.setActiveTab(obj);
	                        global.state_item_menu_config(obj,clientes.id_menu);
	                        clientes.getClientes();
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
	                	//Ext.getCmp(creditos.id+'-form').el.unmask();
	                	obj.setValue(value);
	                }
	            });
			},
			setBack:function(){
				var tab=Ext.getCmp(clientes.id+'-tabContent');
				var active=Ext.getCmp(clientes.id+clientes.back);
				tab.setActiveTab(active);
			},/*
			getclientes:function(){
				var vp_op=Ext.getCmp(clientes.id+'-txt-estado-filter').getValue();
            	var vp_nombre=Ext.getCmp(clientes.id+'-txt-clientes').getValue();
		            Ext.getCmp(clientes.id+'-menu-view').getStore().removeAll();
				Ext.getCmp(clientes.id+'-menu-view').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:vp_nombre},
	                callback:function(){
	                	//Ext.getCmp(clientes.id+'-form').el.unmask();
	                }
	            });
			},*/
			getClientes:function(){
				var vp_op=Ext.getCmp(clientes.id+'-txt-estado-filter').getValue();
            	var vp_nombre=Ext.getCmp(clientes.id+'-txt-clientes').getValue();
		        Ext.getCmp(clientes.id+'-list-clientes').getStore().removeAll();
				Ext.getCmp(clientes.id+'-list-clientes').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:vp_nombre},
	                callback:function(){
	                	//Ext.getCmp(clientes.id+'-form').el.unmask();
	                }
	            });
			},
			getEdit:function(index){
				var rec = Ext.getCmp(clientes.id + '-grid-clientes').getStore().getAt(index);
				clientes.setForm('U',rec.data);
			},
			getNew:function(){
				clientes.setForm('I',{id_clientes:0,usr_codigo:'',usr_nombre:'',usr_perfil:1,usr_estado:1});
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

		    	Ext.getCmp(clientes.id + '-grid-clientes').getStore().removeAll();
				Ext.getCmp(clientes.id + '-grid-clientes').getStore().load(
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