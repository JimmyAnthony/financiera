<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('client_keep-tab')){
		var client_keep = {
			id:'client_keep',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/creditos/',
			url_cli:'/gestion/clientes/',
			opcion:'<?php echo $p["op"];?>',
			cod_credito:'<?php echo $p["cod_credito"];?>',
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

			    var myDataclient_keep = [
					[1,'Activo'], 
				    [0,'Inactivo']
				];
				var store_estado_client_keep = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'perfil',
			        autoLoad: true,
			        data: myDataclient_keep,
			        fields: ['code', 'name']
			    });

			    var store_cuotas = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_det_credito', type: 'string'},
	                    {name: 'cod_credito', type: 'string'},
	                    {name: 'nro_cuota', type: 'string'},
	                    {name: 'fecha_cuota', type: 'string'},
	                    {name: 'valor_cuota', type: 'string'},
	                    {name: 'interes', type: 'string'},                    
	                    {name: 'amortizacion', type: 'string'},
	                    {name: 'capital_vivo', type: 'string'},
	                    {name: 'mora', type: 'string'},
	                    {name: 'saldo_cuota', type: 'string'},
	                    {name: 'vence', type: 'string'},
	                    {name: 'estado', type: 'string'},
	                    {name: 'flag', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: client_keep.url+'SP_CREDITOS_DETALLE_LIST/',
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
				
				
				Ext.create('Ext.window.Window',{
	                id:client_keep.id+'-win-form',
	                plain: true,
	                title:'Mantenimiento de Crédito',
	                icon: '/images/icon/default-avatar_man.png',
	                height: 770,
	                width: 1100,
	                resizable:false,
	                modal: true,
	                border:false,
	                closable:true,
	                padding:20,
	                layout:'border',
	                items:[
	                	{
	                		region:'west',
	                		width:300,
	                		border:false,
	                		items:[
	                			{
		                            xtype: 'textfield',	
		                            hidden:true,
		                            disabled:true,
		                            bodyStyle: 'background: transparent',
				                    padding:'5px 5px 5px 5px',
		                            fieldLabel: 'Código',
		                            id:client_keep.id+'_txt_codigo',
		                            labelWidth:50,
		                            //readOnly:true,
		                            labelAlign:'top',
		                            width:'50%',
		                            anchor:'100%',
		                            listeners:{
		                                afterrender:function(obj, e){
		                                    // obj.getStore().load();
		                                    
		                                }
		                            }
		                        },
		                        {
		                            xtype: 'datefield',	
		                            fieldLabel: 'Fecha de Creación',
		                            bodyStyle: 'background: transparent',
				                    padding:'0px 5px 5px 5px',
		                            //inputType: 'password',
		                            id:client_keep.id+'_fecha_cred',
		                            labelWidth:50,
		                            readOnly:true,
		                            labelAlign:'top',
		                            width:'90%',
		                            value:new Date(),
			                        format: 'Ymd',
		                            anchor:'100%'
		                        },
		                        {
		                            xtype: 'textfield',	
		                            hidden:true,
		                            disabled:true,
		                            bodyStyle: 'background: transparent',
				                    padding:'5px 5px 5px 5px',
		                            fieldLabel: 'Código',
		                            id:client_keep.id+'_txt_cod_cli',
		                            labelWidth:0,
		                            //readOnly:true,
		                            labelAlign:'top',
		                            width:'50%',
		                            anchor:'100%',
		                            listeners:{
		                                afterrender:function(obj, e){
		                                    // obj.getStore().load();
		                                    
		                                }
		                            }
		                        },
		                        {
						            //title: 'Main Content',
						            //collapsible: false,
						            //region: 'center',
						            border:false,
						            layout: 'column',
						            //margin: '5 0 0 0',
						            items:[
						            	{
	                						width: 30,
	                						border:false,
	                						items:[
	                							{
							                        xtype:'button',
							                        id:client_keep.id+'_btn_buscar',
							                        margin:'23px 5px 5px 5px',
							                        text: '',
							                        icon: '/images/icon/search.png',
							                        listeners:{
							                            beforerender: function(obj, opts){
														},
							                            click: function(obj, e){
							                            	win.show({vurl: client_keep.url_cli+'getSearchClient/?callback=client_keep.setItemClient', id_menu: client_keep.id_menu, class: ''});
							                            }
							                        }
							                    }
	                						]
	                					},
	                					{
	                						columnWidth: 1,
	                						border:false,
	                						items:[
			                					{
						                            xtype: 'textfield',	
						                            fieldLabel: 'Nombre Cliente',
						                            bodyStyle: 'background: transparent',
								                    padding:'0px 5px 5px 5px',
						                            id:client_keep.id+'_txt_nombres',
						                            labelWidth:50,
						                            readOnly:true,
						                            labelAlign:'top',
						                            width:'90%',
						                            anchor:'100%',
						                            listeners:{
						                                afterrender:function(obj, e){
						                                    // obj.getStore().load();
						                                    //obj.setValue(data.usr_codigo);
						                                }
						                            }
						                        }
						                    ]
						                }
						            ]
						        },
		                        {
		                            xtype: 'textfield',	
		                            fieldLabel: 'Límite de Crédito',
		                            bodyStyle: 'background: transparent',
				                    padding:'0px 5px 5px 5px',
		                            id:client_keep.id+'_txt_limite_cred',
		                            fieldStyle: 'text-align: right;',
		                            labelWidth:50,
		                            //readOnly:true,
		                            labelAlign:'top',
		                            width:'90%',
		                            anchor:'100%',
		                            value:10000,
		                            listeners:{
		                                afterrender:function(obj, e){
		                                    // obj.getStore().load();
		                                    //obj.setValue(data.usr_codigo);
		                                }
		                            }
		                        },
		                        {
		                            xtype:'combo',
		                            fieldLabel: 'Tipo de Crédito',
		                            bodyStyle: 'background: transparent',
				                    padding:'0px 5px 5px 5px',
		                            id:client_keep.id+'_cmb_tipo_credito',
		                            store: Ext.create('Ext.data.ArrayStore', {
								        //storeId: 'perfil',
								        autoLoad: true,
								        data: [
											[1,'Diario'], 
										    [2,'Semanal'],
										    [3,'Quincenal'],
										    [4,'Mensual'],
										    [5,'Semestral'],
										    [6,'Anual']
										],
								        fields: ['code', 'name']
								    }),
		                            queryMode: 'local',
		                            triggerAction: 'all',
		                            valueField: 'code',
		                            displayField: 'name',
		                            emptyText: '[Seleccione]',
		                            labelAlign:'top',
		                            //allowBlank: false,
		                            labelWidth: 50,
		                            width:'90%',
		                            anchor:'100%',
		                            //readOnly: true,
		                            listeners:{
		                                afterrender:function(obj, e){
		                                	obj.setValue(1);
		                                    // obj.getStore().load();
		                                    //Ext.getCmp(client_keep.id+'-cmb-estado-client_keep').setValue(data.usr_estado);
		                                },
		                                select:function(obj, records, eOpts){
		                        
		                                }
		                            }
		                        },
		                        {
		                            xtype:'combo',
		                            fieldLabel: 'Método de Cálculo',
		                            bodyStyle: 'background: transparent',
				                    padding:'0px 5px 5px 5px',
		                            id:client_keep.id+'_cmb_metodo',
		                            store: Ext.create('Ext.data.ArrayStore', {
								        //storeId: 'perfil',
								        autoLoad: true,
								        data: [
											[1,'Simple'], 
										    [2,'Frances'],
										    [3,'Aleman']
										],
								        fields: ['code', 'name']
								    }),
		                            queryMode: 'local',
		                            triggerAction: 'all',
		                            valueField: 'code',
		                            displayField: 'name',
		                            emptyText: '[Seleccione]',
		                            labelAlign:'top',
		                            //allowBlank: false,
		                            labelWidth: 50,
		                            width:'90%',
		                            anchor:'100%',
		                            //readOnly: true,
		                            listeners:{
		                                afterrender:function(obj, e){
		                                	obj.setValue(1);
		                                    // obj.getStore().load();
		                                    //Ext.getCmp(client_keep.id+'-cmb-perfil').setValue(data.usr_perfil);
		                                },
		                                select:function(obj, records, eOpts){
		                        
		                                }
		                            }
		                        },
		                        {
		                            xtype: 'textfield',
		                            bodyStyle: 'background: transparent',
				                    padding:'0px 5px 5px 5px',
		                            fieldLabel: 'Monto a Prestar',
		                            fieldStyle: 'text-align: right;',
		                            id:client_keep.id+'_txt_prestamos_monto',
		                            labelWidth:50,
		                            //readOnly:true,
		                            labelAlign:'top',
		                            width:'90%',
		                            anchor:'100%',
		                            listeners:{
		                                afterrender:function(obj, e){
		                                    // obj.getStore().load();
		                                    //obj.setValue(data.usr_nombre);
		                                }
		                            }
		                        },
		                        {
		                            xtype: 'textfield',
		                            bodyStyle: 'background: transparent',
				                    padding:'0px 5px 5px 5px',
		                            fieldLabel: 'Tasa de Interés',
		                            fieldStyle: 'text-align: right;',
		                            id:client_keep.id+'_txt_tasa_int',
		                            labelWidth:50,
		                            //readOnly:true,
		                            labelAlign:'top',
		                            width:'90%',
		                            anchor:'100%',
		                            listeners:{
		                                afterrender:function(obj, e){
		                                    // obj.getStore().load();
		                                    //obj.setValue(data.usr_nombre);
		                                }
		                            }
		                        },
		                        {
		                            xtype: 'textfield',
		                            bodyStyle: 'background: transparent',
				                    padding:'0px 5px 5px 5px',
		                            fieldLabel: 'Cuotas',
		                            id:client_keep.id+'_txt_cuotas_num',
		                            fieldStyle: 'text-align: right;',
		                            labelWidth:50,
		                            //readOnly:true,
		                            labelAlign:'top',
		                            width:'90%',
		                            anchor:'100%',
		                            listeners:{
		                                afterrender:function(obj, e){
		                                    // obj.getStore().load();
		                                    //obj.setValue(data.usr_nombre);
		                                }
		                            }
		                        },
		                        {
		                            xtype: 'datefield',
		                            bodyStyle: 'background: transparent',
				                    padding:'0px 5px 5px 5px',
		                            fieldLabel: 'Fecha Cálculo',
		                            id:client_keep.id+'_fecha_calculo',
		                            labelWidth:50,
		                            //readOnly:true,
		                            labelAlign:'top',
		                            width:'90%',
		                            anchor:'100%',
		                            value:new Date(),
									format: 'Ymd',
		                            listeners:{
		                                afterrender:function(obj, e){
		                                    // obj.getStore().load();
		                                    //obj.setValue(data.usr_nombre);
		                                }
		                            }
		                        }
	                		]
	                	},
	                	{
	                		region:'south',
	                		layout:'border',
	                		border:false,
	                		height:120,
	                		items:[
	                			{
						            //title: 'Footer',
						            region: 'south',
						            layout: 'fit',
						            border:false,
						            height: 62,
						            //minHeight: 75,
						            //maxHeight: 150,
						            items:[
						            	{
									        xtype: 'textareafield',
									        //columnWidth: 1,									        
									        bodyStyle: 'background: transparent',
									        padding:'0px 5px 5px 5px',
									        id:client_keep.id+'_txt_obs',
									        //name: 'textarea1',
									        fieldLabel: '',
									        labelWidth:0,
									        value: ''
									    }
						            ]
						        },
						        {
						            //title: 'Navigation',
						            region:'west',
						            border:false,
						            floatable: false,
						            margin: '5 0 0 0',
						            width: '40%',
						            //minWidth: 100,
						            //maxWidth: 250,
						            items:[]
						        },
						        {
						            //title: 'Main Content',
						            //collapsible: false,
						            region: 'center',
						            border:false,
						            layout: 'column',
						            margin: '5 0 0 0',
						            items:[
						            	{
	                						columnWidth: 0.4,
	                						border:false,
	                						items:[
	                							{
						                            xtype:'combo',
						                            fieldLabel: 'Entrega en',
						                            bodyStyle: 'background: transparent',
								                    padding:'0px 5px 5px 5px',
						                            id:client_keep.id+'_cmb_entrega',
						                            store:  Ext.create('Ext.data.ArrayStore', {
												        //storeId: 'perfil',
												        autoLoad: true,
												        data: [
															[1,'Soles'],
														    [2,'Dolares'],
														    [3,'Euros']
														],
												        fields: ['code', 'name']
												    }),
						                            queryMode: 'local',
						                            triggerAction: 'all',
						                            valueField: 'code',
						                            displayField: 'name',
						                            emptyText: '[Seleccione]',
						                            labelAlign:'top',
						                            //allowBlank: false,
						                            labelWidth: 50,
						                            width:'90%',
						                            anchor:'100%',
						                            //readOnly: true,
						                            listeners:{
						                                afterrender:function(obj, e){
						                                	obj.setValue(1);
						                                    // obj.getStore().load();
						                                    //Ext.getCmp(client_keep.id+'-cmb-perfil').setValue(data.usr_perfil);
						                                },
						                                select:function(obj, records, eOpts){
						                        
						                                }
						                            }
						                        }
	                						]
	                					},
	                					{
	                						columnWidth: 0.3,
	                						border:false,
	                						items:[
			                					{
						                            xtype: 'textfield',
						                            bodyStyle: 'background: transparent',
								                    padding:'0px 5px 5px 5px',
						                            fieldLabel: 'Valor Cuotas',
						                            id:client_keep.id+'_txt_valor_cuotas',
						                            fieldStyle: 'text-align: right;',
						                            labelWidth:50,
						                            readOnly:true,
						                            labelAlign:'top',
						                            width:'90%',
						                            anchor:'100%',
						                            listeners:{
						                                afterrender:function(obj, e){
						                                    // obj.getStore().load();
						                                    //obj.setValue(data.usr_nombre);
						                                }
						                            }
						                        }
						                    ]
						                },
	                					{
	                						columnWidth: 0.3,
	                						border:false,
	                						items:[
	                							{
						                            xtype: 'textfield',
						                            bodyStyle: 'background: transparent',
								                    padding:'0px 5px 5px 5px',
						                            fieldLabel: 'Total Crédito',
						                            id:client_keep.id+'_txt_total_cred',
						                            fieldStyle: 'text-align: right;',
						                            labelWidth:50,
						                            readOnly:true,
						                            labelAlign:'top',
						                            width:'90%',
						                            anchor:'100%',
						                            listeners:{
						                                afterrender:function(obj, e){
						                                    // obj.getStore().load();
						                                    //obj.setValue(data.usr_nombre);
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
	                		border:false,
	                		layout:'fit',
	                		items:[
	                			{
			                        xtype: 'grid',
			                        id: client_keep.id + '-grid-cuotas',
			                        store: store_cuotas, 
			                         /*bbar: {
						                xtype: 'pagingtoolbar', 
						                pageSize: 25,
						                store: store_cuotas,
						                displayInfo: true//,
						                //plugins: new Ext.ux.ProgressBarPager()
						            },*/
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
			                                    text: 'Fecha',
			                                    dataIndex: 'fecha_cuota',
			                                    flex: 1,
			                                    align: 'center'
			                                },
			                                {
			                                    text: 'Valor Cuota',
			                                    dataIndex: 'valor_cuota',
			                                    width: 80,
			                                    align: 'right'
			                                },
			                                {
			                                    text: 'Interés',
			                                    dataIndex: 'interes',
			                                    width: 80,
			                                    align: 'right'
			                                },
			                                {
			                                    text: 'Amortización',
			                                    dataIndex: 'amortizacion',
			                                    width: 80,
			                                    align: 'right'
			                                },
			                                {
			                                    text: 'Capital Vivo',
			                                    dataIndex: 'capital_vivo',
			                                    width: 80,
			                                    align: 'right'
			                                },
			                                {
			                                    text: 'Mora',
			                                    dataIndex: 'mora',
			                                    width: 80,
			                                    align: 'right'
			                                },
			                                {
			                                    text: 'Cuota Total',
			                                    dataIndex: 'saldo_cuota',
			                                    width: 100,
			                                    align: 'right'
			                                },
			                                {
			                                    text: 'Vence',
			                                    dataIndex: 'vence',
			                                    width: 80,
			                                    align: 'center'
			                                },/*
			                                {
			                                    text: 'Saldo cuota',
			                                    dataIndex: 'saldo_cuota',
			                                    width: 80,
			                                    align: 'right'
			                                },*/
											{
			                                    text: 'Estado',
			                                    dataIndex: 'flag',
			                                    //loocked : true,
			                                    width: 50,
			                                    align: 'center',
			                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
			                                        //console.log(record);
			                                        var estado = 'check-circle-green-16.png';
			                                        if(parseInt(record.get('flag'))==0){
			                                        	estado = 'check-circle-black-16.png';
			                                        }
			                                        metaData.style = "padding: 0px; margin: 0px";
			                                        return global.permisos({
			                                            type: 'link',
			                                            id_menu: client_keep.id_menu,
			                                            icons:[
			                                                {id_serv: 1, img: estado, qtip: 'Estado.', js: ""}

			                                            ]
			                                        });
			                                    }
			                                }
			                            ],
			                            defaults:{
			                                menuDisabled: true
			                            }
			                        },
			                        multiSelect: true,
			                        trackMouseOver: false,
			                        listeners:{
			                            afterrender: function(obj){
			                                
			                            },
			                            beforeselect:function(obj, record, index, eOpts ){
			                            	//scanning.setImageFile(record.get('path'),record.get('file'));
			                            }
			                        }
			                    }
	                		]
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
	                            	client_keep.setSaveCredit(client_keep.opcion);
	                            }
	                        }
	                    },
	                    {
	                        xtype:'button',
	                        text: 'Imprimir',
	                        icon: '/images/icon/pdf.png',
	                        listeners:{
	                            beforerender: function(obj, opts){
								},
	                            click: function(obj, e){
	                            	var codigo = Ext.getCmp(client_keep.id+'_txt_codigo').getValue(); 
	                            	var cod_cli =Ext.getCmp(client_keep.id+'_txt_cod_cli').getValue();
	                            	window.open(client_keep.url+'get_print/?VP_CODIGO='+codigo+'&VP_CODIGO_CLIENTE='+cod_cli, '_blank');
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
	                                Ext.getCmp(client_keep.id+'-win-form').close();
	                            }
	                        }
	                    },
	                    '-'
	                ],
	                listeners:{
	                    'afterrender':function(obj, e){ 
	                    	if(client_keep.opcion=='U'){
	                    		Ext.getCmp(client_keep.id+'_btn_buscar').setDisabled(true);
	                    		client_keep.getCreditValues();
	                    	}else{
	                    		Ext.getCmp(client_keep.id+'_btn_buscar').setDisabled(false);
	                    	}
	                    },
	                    'close':function(){

	                    }
	                }
	            }).show().center();
			},
			setItemClient:function(obj){
				Ext.getCmp(client_keep.id+'_txt_cod_cli').setValue(obj.cod_cli);
				Ext.getCmp(client_keep.id+'_txt_nombres').setValue(obj.nombres + ', '+obj.apellidos);
			},
			getCreditValues:function(){
				Ext.getCmp(client_keep.id+'-win-form').el.mask('Elinando Páginas…', 'x-mask-loading');
                Ext.Ajax.request({
                    url:client_keep.url+'get_credit_record/',
                    params:{
                    	VP_CODIGO:client_keep.cod_credito
                    },
                    //timeout: 300000,
                    success: function(response, options){
                        Ext.getCmp(client_keep.id+'-win-form').el.unmask();
                        var res = Ext.JSON.decode(response.responseText);
                        if (parseInt(res.total) != 0){
                            client_keep.setRestaureValue(res.data[0]);
                        } else{
                            global.Msg({
                                msg: 'No existe registro a editar, vuelva a intentarlo',
                                icon: 0,
                                buttons: 1,
                                fn: function(btn){
                                	 
                                }
                            });
                        }
                    }
                });
			},
			setRestaureValue:function(data){
				Ext.getCmp(client_keep.id+'_txt_codigo').setValue(data.cod_credito);
				Ext.getCmp(client_keep.id+'_fecha_cred').setValue(data.fecha);
				Ext.getCmp(client_keep.id+'_txt_cod_cli').setValue(data.cod_cli);
				Ext.getCmp(client_keep.id+'_txt_nombres').setValue(data.nombres);
				Ext.getCmp(client_keep.id+'_txt_limite_cred').setValue(100000);
				Ext.getCmp(client_keep.id+'_cmb_tipo_credito').setValue(data.cod_tipo);
				Ext.getCmp(client_keep.id+'_cmb_metodo').setValue(data.cod_metodo);
				Ext.getCmp(client_keep.id+'_txt_prestamos_monto').setValue(data.prestamo);
				Ext.getCmp(client_keep.id+'_txt_tasa_int').setValue(data.tasa_interes);
				Ext.getCmp(client_keep.id+'_txt_cuotas_num').setValue(data.cuotas);
				Ext.getCmp(client_keep.id+'_fecha_calculo').setValue(data.fecha_calculo);

				Ext.getCmp(client_keep.id+'_cmb_entrega').setValue(data.cod_entrega);
				Ext.getCmp(client_keep.id+'_txt_valor_cuotas').setValue(data.valor_cuota);
				Ext.getCmp(client_keep.id+'_txt_total_cred').setValue(data.total_credito);
				Ext.getCmp(client_keep.id+'_txt_obs').setValue(data.nota);
				client_keep.getCuotas();
			},
			setSaveCredit:function(op){
				var cod_credito = Ext.getCmp(client_keep.id+'_txt_codigo').getValue();
				var fecha = Ext.getCmp(client_keep.id+'_fecha_cred').getRawValue();
				var tasa = Ext.getCmp(client_keep.id+'_txt_tasa_int').getValue();
				var metodo =Ext.getCmp(client_keep.id+'_cmb_metodo').getValue();
				var prestamo =Ext.getCmp(client_keep.id+'_txt_prestamos_monto').getValue();
				var cuotas =Ext.getCmp(client_keep.id+'_txt_cuotas_num').getValue();
				var tipo_credito =Ext.getCmp(client_keep.id+'_cmb_tipo_credito').getValue();
				var fecha_calculo =Ext.getCmp(client_keep.id+'_fecha_calculo').getRawValue();
				var cod_cli =Ext.getCmp(client_keep.id+'_txt_cod_cli').getValue();
				var limite_cred=Ext.getCmp(client_keep.id+'_txt_limite_cred').getValue();
				var valor_cuota=Ext.getCmp(client_keep.id+'_txt_valor_cuotas').getValue();
				var cod_entrega=Ext.getCmp(client_keep.id+'_cmb_entrega').getValue();
				var total_credito=Ext.getCmp(client_keep.id+'_txt_total_cred').getValue();
				var nota=Ext.getCmp(client_keep.id+'_txt_obs').getValue();
				
				//fecha_calculo = fecha_calculo.format('Y/m/d');
				//fecha= fecha.format('Y/m/d');
				if(cod_cli== ''){
					global.Msg({
                        msg: 'Seleccione un cliente por favor!',
                        icon: 2,
                        buttons: 1,
                        fn: function(btn){
                        	 
                        }
                    });return;
        		}
				if(metodo== ''){
					global.Msg({
                        msg: 'Seleccione un metodo por favor!',
                        icon: 2,
                        buttons: 1,
                        fn: function(btn){
                        	 
                        }
                    });return;
        		}
				if(tipo_credito== ''){
					global.Msg({
                        msg: 'Seleccione un tipo de credito por favor!',
                        icon: 2,
                        buttons: 1,
                        fn: function(btn){
                        	 
                        }
                    });return;
        		}
				if(cod_entrega== ''){
					global.Msg({
                        msg: 'Seleccione un tipo de entrega por favor!',
                        icon: 2,
                        buttons: 1,
                        fn: function(btn){
                        	 
                        }
                    });return;
        		}
				if(prestamo< 1){
					global.Msg({
                        msg: 'El monto a prestar deber ser mayor a cero!',
                        icon: 2,
                        buttons: 1,
                        fn: function(btn){
                        	 
                        }
                    });return;
        		}
				if(prestamo>limite_cred){
					global.Msg({
                        msg: 'El monto a prestar deber ser menor o igual al limite de credito del cliente!',
                        icon: 2,
                        buttons: 1,
                        fn: function(btn){
                        	 
                        }
                    });return;
        		}

        		global.Msg({
                    msg: 'Desea ejecutar el proceso?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(client_keep.id+'-win-form').el.mask('Procesando...', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:client_keep.url+'setSaveCredit/',
			                    params:{
			                    	vp_op:op,
			                    	vp_fecha:fecha,
			                    	vp_tasa_interes:tasa,
			                    	vp_cod_metodo:metodo,
			                    	vp_prestamo:prestamo,
			                    	vp_cuotas:cuotas,
			                    	vp_cod_tipo:tipo_credito,
			                    	vp_valor_cuota:valor_cuota,
			                    	vp_fecha_calculo:fecha_calculo,
			                    	vp_total_credito:total_credito,
			                    	vp_cod_cli:cod_cli,
			                    	vp_limite_cred:limite_cred,
			                    	vp_nota:nota,
			                    	vp_cod_entrega:cod_entrega,
			                    	vp_cod_credito:cod_credito
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                        Ext.getCmp(client_keep.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //client_keep.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	client_keep.cod_credito=res.cod_credito;
			                                	client_keep.opcion='U';
			                                	client_keep.getCreditValues();
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
			getCuotas:function(){
				var codigo = Ext.getCmp(client_keep.id+'_txt_codigo').getValue();
				Ext.getCmp(client_keep.id + '-grid-cuotas').getStore().removeAll();
				Ext.getCmp(client_keep.id + '-grid-cuotas').getStore().load(
	                {params: {VP_CODIGO:codigo},
	                callback:function(){
	                	//Ext.getCmp(credit_list.id+'-form').el.unmask();
	                }
	            });
			}
		}
		Ext.onReady(client_keep.init,client_keep);
	}else{
		tab.setActiveTab(client_keep.id+'-tab');
	}
</script>