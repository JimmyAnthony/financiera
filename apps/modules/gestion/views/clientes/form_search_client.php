<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('client_search-tab')){
		var client_search = {
			id:'client_search',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestiones/clientes/',
			opcion:'I',
			id_lote:'<?php echo $p["id_lote"];?>',
			shi_codigo:'<?php echo $p["shi_codigo"];?>',
			fac_cliente:'<?php echo $p["fac_cliente"];?>',
			callback:'<?php echo $p["callback"];?>',
			paramsStore:{
				hijo:0,
				padre:0,
				nivel:0
			},
			init:function(){
				Ext.Ajax.timeout = 180000;
            	Ext.QuickTips.init();
				Ext.tip.QuickTipManager.init();

				var store = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_cli', type: 'string'},
	                    {name: 'nombres', type: 'string'},
	                    {name: 'apellidos', type: 'string'},
	                    {name: 'fecha', type: 'string'},
	                    {name: 'nacimiento', type: 'string'},
	                    {name: 'edad', type: 'string'},
	                    {name: 'dni', type: 'string'},
	                    {name: 'domicilio', type: 'string'},
	                    {name: 'cod_pais', type: 'string'},
	                    {name: 'cod_pro', type: 'string'},
	                    {name: 'telefonos', type: 'string'},
	                    {name: 'limite_credito', type: 'string'},
	                    {name: 'cod_estado', type: 'string'},
	                    {name: 'cod_garante', type: 'string'},
	                    {name: 'cod_laboral', type: 'string'},
	                    {name: 'cod_prop', type: 'string'},
	                    {name: 'descripcionp', type: 'string'},
	                    {name: 'descripcion', type: 'string'},
	                    {name: 'img', type: 'string'},
	                    {name: 'fecha_creacion', type: 'string'},
	                    {name: 'flag', type: 'string'},
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: client_search.url+'SP_CLIENTES_LIST/',
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

	            var myDataFiltro = [
					['D','DNI'],
				    ['N','Nombres'],
				    ['T','Teléfonos']
				];
				var store_filtro = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: true,
			        data: myDataFiltro,
			        fields: ['code', 'name']
			    });

				
				var panel = Ext.create('Ext.form.Panel',{
					id:client_search.id+'-form',
					bodyStyle: 'background: transparent',
					border:false,
					layout:'border',
					defaults:{
						border:false
					},
					//tbar:[],
					items:[
						{
							region:'north',
							border:false,
							height:30,
							layout: 'column',
						    margin: '5 0 0 0',
							items:[
								{
            						columnWidth: 0.4,
            						padding:'5px 0px 5px 5px',
            						border:false,
            						items:[
            							{
				                            xtype:'combo',
				                            fieldLabel: 'Filtro',
				                            bodyStyle: 'background: transparent',
				                            id:client_search.id+'_cmb_filtro',
				                            store: store_filtro,
				                            queryMode: 'local',
				                            triggerAction: 'all',
				                            valueField: 'code',
				                            displayField: 'name',
				                            emptyText: '[Seleccione]',
				                            //labelAlign:'top',
				                            //allowBlank: false,
				                            labelWidth: 35,
				                            width:'90%',
				                            anchor:'100%',
				                            //readOnly: true,
				                            listeners:{
				                                afterrender:function(obj, e){
				                                    obj.setValue('D');
				                                },
				                                select:function(obj, records, eOpts){
				                        
				                                }
				                            }
				                        }
            						]
            					},
            					{
            						columnWidth: 0.6,
            						padding:'5px 0px 5px 0px',
            						border:false,
            						items:[
	                					{
				                            xtype: 'textfield',	
				                            fieldLabel: '',
				                            bodyStyle: 'background: transparent',
				                            id:client_search.id+'_txt_filtro',
				                            labelWidth:0,
				                            //readOnly:true,
				                            //labelAlign:'top',
				                            width:'99%',
				                            anchor:'100%',
				                            listeners:{
				                                afterrender:function(obj, e){
				                                    // obj.getStore().load();
				                                    //obj.setValue(data.usr_codigo);
				                                }
				                            }
		                        		}
                        			]
                        		},
                        		{
            						width: 80,
            						border:false,
            						padding:'5px 5px 5px 5px',
            						items:[
	                					{
					                        xtype:'button',
					                        text: 'Buscar',
					                        icon: '/images/icon/search.png',
					                        listeners:{
					                            beforerender: function(obj, opts){
												},
					                            click: function(obj, e){
					                            	client_search.getSearchClient();
					                            }
					                        }
					                    }
                        			]
                        		}
							]
						},
						{
							region:'center',
							//layout:'border',
							layout:'fit',
							border:false,
							items:[
								{
			                        xtype: 'grid',
			                        id: client_search.id + '_grid_client',
			                        //disabled:true,
			                        store: store,
			                        columnLines: true,
			                        columns:{
			                            items:[
			                            	{
			                            		text: 'N°',
											    xtype: 'rownumberer',
											    width: 40,
											    sortable: false,
											    locked: true
											},
			                                {
			                                    text: 'Nombres',
			                                    dataIndex: 'nombres',
			                                    //loocked : true,
			                                    flex: 1//,
			                                    //align: 'center'
			                                },
			                                {
			                                    text: 'Apellidos',
			                                    dataIndex: 'apellidos',
			                                    //loocked : true,
			                                    width: 100//,
			                                    //align: 'center'
			                                },
			                                {
			                                    text: 'dni',
			                                    dataIndex: 'dni',
			                                    width: 100
			                                }
			                            ],
			                            defaults:{
			                                menuDisabled: true
			                            }
			                        },
			                        trackMouseOver: false,
			                        listeners:{
			                            afterrender: function(obj){
			                            },
			                            beforeselect:function(obj, record, index, eOpts ){
			                            },
			                            itemclick:function(obj, record, index, eOpts ){
			                            	eval(client_search.callback+'({cod_cli:'+record.get('cod_cli')+',nombres:"'+record.get('nombres')+'",apellidos:"'+record.get('apellidos')+'",dni:"'+record.get('dni')+'",telefonos:"'+record.get('telefonos')+'"})');
			                            	Ext.getCmp(client_search.id+'-win').close();
			                            }
			                        }
			                    }
							]
						}
					]
				});

				
				var win = Ext.create('Ext.window.Window',{
					id:client_search.id+'-win',
					title:'Busqueda de Clientes',
					height:530,
					width:500,
					resizable:false,
					//closable:false,
					//minimizable:true,
					plaint:true,
					constrain:true,
					constrainHeader:true,
					//renderTo:Ext.get(gtransporte.id+'cont_map'),
					header:true,
					border:false,
					layout:{
						type:'fit'
					},
					modal:true,
					items:[panel],
					bbar:[
						{
			                xtype:'button',
			                flex:1,
			                text: 'Grabar Orden',
			                icon: '/images/icon/save.png',
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
			                    	client_search.setclient_search();
			                    	//scanning.setLibera();
							        //scanning.getReloadGridscanning();
			                    }
			                }
			            },
			            {
			                xtype:'button',
			                flex:1,
			                text: 'Salir',
			                icon: '/images/icon/person.png',
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
			                    	Ext.getCmp(client_search.id+'-win').close();
			                    }
			                }
			            }
					],
					listeners:{
						show:function(window,eOpts){
							//window.alignTo(Ext.get(gtransporte.id+'Mapsa'),'bl-bl');
						},
						minimize:function(window,opts){
							/*window.collapse();
							window.setWidth(100);
							window.alignTo(Ext.get(gtransporte.id+'Mapsa'), 'bl-bl');*/
						},
						beforerender:function(obj,opts){
							//client_search.getReloadGridclient_search();
						}
					}
				}).show();
			},
			getSearchClient:function(){
				var filtro = Ext.getCmp(client_search.id+'_cmb_filtro').getValue();
				var value = Ext.getCmp(client_search.id+'_txt_filtro').getValue();
				
				if(filtro== null || filtro==''){
		            global.Msg({msg:"Seleccione un filtro por favor.",icon:2,fn:function(){}});
		            return false;
		        }
				if(value== null || value==''){
		            global.Msg({msg:"Ingrese un valor en la caja de texto por favor.",icon:2,fn:
		            	function(){ 
		            		Ext.getCmp(client_search.id+'_txt_filtro').focus();
		            	}
		        	});
		            return false;
		        }
		        //Ext.getCmp(client_search.id + '-grid-client_search').getStore().removeAll();
		        //Ext.getCmp(client_search.id + '-grid-client_search').getView().refresh();
		        Ext.getCmp(client_search.id+'-win').el.mask('Realizando Busqueda', 'x-mask-loading');
		        client_search.paramsStore={vp_filtro:filtro,vp_value:value};
		        Ext.getCmp(client_search.id + '_grid_client').getStore().load(
	                {params: client_search.paramsStore,
	                callback:function(){
	                	Ext.getCmp(client_search.id+'-win').el.unmask();
	                }
	            });
			},
			setclient_search:function(){
				global.Msg({
                    msg: '¿Está seguro de actualizar los registros?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(client_search.id+'-win').el.mask('Actualizando Registros', 'x-mask-loading');

							var recordsToSend = [];
							Ext.getCmp(client_search.id + '-grid-client_search').getStore().each(function(record, idx) {
								//console.log(record.data);
								//console.log('padre',record.parentNode.data);
								var hijo= record.get('hijo');
								var padre= record.get('padre');
								//var nombre= record.get('nombre');
								var hijo= record.get('hijo');

								var nivel= record.get('nivel');
								if(nivel!=3){
									var nombre= record.get('nombre');
								}else{
									var nombre= record.get('img');
								}
								recordsToSend.push(Ext.apply({vp_id_lote:client_search.id_lote,vp_hijo:hijo,vp_padre:padre,vp_nivel:nivel,vp_nombre:nombre,vp_order:0},hijo));
							});

							var vp_recordsToSend = Ext.encode(recordsToSend);
							//console.log(recordsToSend);

					    	Ext.Ajax.request({
			                    url: client_search.url + 'set_client_search/',
			                    params:{
			                    	vp_id_lote:client_search.id_lote,
			                    	vp_recordsToSend:vp_recordsToSend
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                    	Ext.getCmp(client_search.id+'-win').el.unmask();
			                    	//control.getLoader(false);
			                        var res = Ext.JSON.decode(response.responseText);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	client_search.getReloadGridclient_search();
			                                	eval(client_search.callback);
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
			setChangeRecord:function(op){
				var nombre = Ext.getCmp(client_search.id+'-txt-scanning').getValue();
				if(nombre== null || nombre==''){
		            global.Msg({msg:"Ingrese un Nombre.",icon:2,fn:function(){}});
		            return false;
		        }
		        if(client_search.paramsStore.hijo== 0 || client_search.paramsStore.hijo==''){
		            global.Msg({msg:"Seleccione un registro.",icon:2,fn:function(){}});
		            return false;
		        }
		        if(client_search.paramsStore.padre== 0 || client_search.paramsStore.padre==''){
		            global.Msg({msg:"Seleccione un registro.",icon:2,fn:function(){}});
		            return false;
		        }
		        if(client_search.paramsStore.nivel== 0 || client_search.paramsStore.nivel==''){
		            global.Msg({msg:"Seleccione un registro.",icon:2,fn:function(){}});
		            return false;
		        }

				global.Msg({
                    msg: '¿Está seguro de actualizar el registro?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(client_search.id+'-win').el.mask('Actualizando Registro', 'x-mask-loading');

					    	Ext.Ajax.request({
			                    url: client_search.url + 'setChangeRecord/',
			                    params:{
			                    	vp_op:op,
			                    	vp_id_lote:client_search.id_lote,
			                    	vp_nombre:nombre,
			                    	vp_hijo:client_search.paramsStore.hijo,
			                    	vp_padre:client_search.paramsStore.padre,
			                    	vp_nivel:client_search.paramsStore.nivel
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                    	Ext.getCmp(client_search.id+'-win').el.unmask();
			                    	//control.getLoader(false);
			                        var res = Ext.JSON.decode(response.responseText);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	client_search.getReloadGridclient_search();
			                                	eval(client_search.callback);
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
			}
		}
		Ext.onReady(client_search.init,client_search);
	}else{
		tab.setActiveTab(client_search.id+'-tab');
	}
</script>