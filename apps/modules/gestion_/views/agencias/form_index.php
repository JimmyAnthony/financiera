<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('agencias-tab')){
		var agencias = {
			id:'agencias',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/agencias/',
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
	                    url: agencias.url+'get_list_ubigeo/',
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
	                    url: agencias.url+'get_list_ubigeo/',
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
	                    url: agencias.url+'get_list_ubigeo/',
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
				
				var store_agencias = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_age', type: 'string'},
	                    {name: 'nombre', type: 'string'},
	                    {name: 'descripcion', type: 'string'},
	                    {name: 'direccion', type: 'string'},                    
	                    {name: 'telefonos', type: 'string'},
	                    {name: 'cod_ubi', type: 'string'},
	                    {name: 'x', type: 'string'},
	                    {name: 'y', type: 'string'},
	                    {name: 'fecha', type: 'string'},
	                    {name: 'estado', type: 'string'},
	                    {name: 'Distrito', type: 'string'},
	                    {name: 'Provincia', type: 'string'},
	                    {name: 'Departamento', type: 'string'},
	                    {name: 'cod_ubi_pro', type: 'string'},
	                    {name: 'cod_ubi_dep', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: agencias.url+'get_list_agencias/',
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

	            agencias.store_ubigeoA1 = Ext.create('Ext.data.Store',{
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
	                    url: agencias.url+'get_list_ubigeo/',
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

	            agencias.store_ubigeoA2 = Ext.create('Ext.data.Store',{
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
	                    url: agencias.url+'get_list_ubigeo/',
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

	            agencias.store_ubigeoA3 = Ext.create('Ext.data.Store',{
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
	                    url: agencias.url+'get_list_ubigeo/',
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

				var myDataSearch = [
					['A','Activo'],
					['I','Inactivo']
				];
				agencias.store_estado = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'search',
			        autoLoad: true,
			        data: myDataSearch,
			        fields: ['code', 'name']
			    });
				var panel = Ext.create('Ext.form.Panel',{
					id:agencias.id+'-form',
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
					id:agencias.id+'-tab',
					border:false,
					autoScroll:true,
					closable:true,
					layout:'border',
					items:[
						{
                            region:'north',
                            layout:'border',
                            border:false,
                            height:90,
                            items:[
		                        {
		                            region:'center',
		                            border:false,
		                            xtype: 'uePanelS',
		                            logo: 'AG',
		                            title: 'Agencias',
		                            legend: 'Listado y Mantenimiento',
		                            width:1200,
		                            height:90,
		                            items:[
		                                {
		                                    xtype:'panel',
		                                    border:false,
		                                    bodyStyle: 'background: transparent',
		                                    padding:'2px 5px 1px 5px',
		                                    layout:'column',
		                                    items: [
		                                    	{
			                                   		width: 220,border:false,
			                                    	padding:'0px 2px 0px 0px',  
			                                    	bodyStyle: 'background: transparent',
			                                 		items:[
			                                                {
			                                                    xtype:'combo',
			                                                    fieldLabel: 'Departamento',
			                                                    id:agencias.id+'-txt-departamento',
			                                                    store: store_ubigeo,
			                                                    queryMode: 'local',
			                                                    triggerAction: 'all',
			                                                    valueField: 'cod_ubi',
			                                                    displayField: 'Departamento',
			                                                    emptyText: '[Seleccione]',
			                                                    labelAlign:'right',
			                                                    //allowBlank: false,
			                                                    labelWidth: 80,
			                                                    width:'100%',
			                                                    anchor:'100%',
			                                                    //readOnly: true,
			                                                    listeners:{
			                                                        afterrender:function(obj, e){
			                                                			Ext.getCmp(agencias.id+'-txt-provincia').getStore().removeAll();
			                                                			Ext.getCmp(agencias.id+'-txt-Distrito').getStore().removeAll();
			                                                        	agencias.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,'100101');
			                                                            // obj.getStore().load();
			                                                            //Ext.getCmp(agencias.id+'-txt-estado-filter').setValue('U');
			                                                        },
			                                                        select:function(obj, records, eOpts){
			                                                			var pro = Ext.getCmp(agencias.id+'-txt-provincia');
			                                                			Ext.getCmp(agencias.id+'-txt-provincia').setValue('');
			                                                			Ext.getCmp(agencias.id+'-txt-Distrito').getStore().removeAll();
			                                                			Ext.getCmp(agencias.id+'-txt-Distrito').setValue('');
			                                                        	agencias.getUbigeo({VP_OP:'P',VP_VALUE:obj.getValue()},pro,'');
			                                                        }
			                                                    }
			                                                }
			                                 		]
			                                    },
			                                    {
			                                   		width: 220,border:false,
			                                    	padding:'0px 2px 0px 0px',  
			                                    	bodyStyle: 'background: transparent',
			                                 		items:[
			                                                {
			                                                    xtype:'combo',
			                                                    fieldLabel: 'Provincia',
			                                                    id:agencias.id+'-txt-provincia',
			                                                    store: store_ubigeo2,
			                                                    queryMode: 'local',
			                                                    triggerAction: 'all',
			                                                    valueField: 'cod_ubi',
			                                                    displayField: 'Provincia',
			                                                    emptyText: '[Seleccione]',
			                                                    labelAlign:'right',
			                                                    //allowBlank: false,
			                                                    labelWidth: 70,
			                                                    width:'100%',
			                                                    anchor:'100%',
			                                                    //readOnly: true,
			                                                    listeners:{
			                                                        afterrender:function(obj, e){
			                                                			Ext.getCmp(agencias.id+'-txt-Distrito').getStore().removeAll();
			                                                        	agencias.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},obj,'100601');
			                                                        },
			                                                        select:function(obj, records, eOpts){
			                                                			var dis=Ext.getCmp(agencias.id+'-txt-Distrito');
			                                                        	agencias.getUbigeo({VP_OP:'X',VP_VALUE:obj.getValue()},dis,'');
			                                                        }
			                                                    }
			                                                }
			                                 		]
			                                    },
			                                    {
			                                   		width: 220,border:false,
			                                    	padding:'0px 2px 0px 0px',  
			                                    	bodyStyle: 'background: transparent',
			                                 		items:[
			                                                {
			                                                    xtype:'combo',
			                                                    fieldLabel: 'Distrito',
			                                                    id:agencias.id+'-txt-Distrito',
			                                                    store: store_ubigeo3,
			                                                    queryMode: 'local',
			                                                    triggerAction: 'all',
			                                                    valueField: 'cod_ubi',
			                                                    displayField: 'Distrito',
			                                                    emptyText: '[Seleccione]',
			                                                    labelAlign:'right',
			                                                    //allowBlank: false,
			                                                    labelWidth: 70,
			                                                    width:'100%',
			                                                    anchor:'100%',
			                                                    //readOnly: true,
			                                                    listeners:{
			                                                        afterrender:function(obj, e){
			                                                        	agencias.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
			                                                            // obj.getStore().load();
			                                                            //Ext.getCmp(agencias.id+'-txt-estado-filter').setValue('U');
			                                                        },
			                                                        select:function(obj, records, eOpts){
			                                                
			                                                        }
			                                                    }
			                                                }
			                                 		]
			                                    },
		                                        {
		                                            width:260,border:false,
		                                            padding:'0px 2px 0px 0px',  
		                                            bodyStyle: 'background: transparent',
		                                            items:[
		                                                {
		                                                    xtype: 'textfield',	
		                                                    fieldLabel: 'Nombre',
		                                                    id:agencias.id+'-txt-agencias',
		                                                    labelWidth:60,
		                                                    //readOnly:true,
		                                                    labelAlign:'right',
		                                                    width:'100%',
		                                                    anchor:'100%'
		                                                }
		                                            ]
		                                        },
		                                        {
		                                            width: 80,border:false,
		                                            padding:'0px 2px 0px 0px',  
		                                            bodyStyle: 'background: transparent',
		                                            items:[
		                                                {
									                        xtype:'button',
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
									                            	var cod_ubi = Ext.getCmp(agencias.id+'-txt-Distrito').getValue();
									                            	var nombre = Ext.getCmp(agencias.id+'-txt-agencias').getValue();           	
		                               					            agencias.getAgencias({vp_cod_age:0,vp_cod_ubi:cod_ubi,vp_nombre:nombre});
									                            }
									                        }
									                    }
		                                            ]
		                                        },
		                                        {
		                                            width: 80,border:false,
		                                            padding:'0px 2px 0px 0px',  
		                                            bodyStyle: 'background: transparent',
		                                            items:[
		                                                {
									                        xtype:'button',
									                        text: 'Nuevo',
									                        icon: '/images/icon/add.png',
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
		                               					            agencias.getNew();
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
							items:[
								{
			                        xtype: 'grid',
			                        id: agencias.id + '-grid-agencias',
			                        store: store_agencias, 
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
			                                    text: 'Nombre',
			                                    dataIndex: 'nombre',
			                                    width: 200
			                                },
			                                {
			                                    text: 'Descripción',
			                                    dataIndex: 'descripcion',
			                                    width: 400
			                                },
			                                {
			                                    text: 'Dirección',
			                                    dataIndex: 'direccion',
			                                    flex: 1
			                                },
			                                {
			                                    text: 'Teléfonos',
			                                    dataIndex: 'telefonos',
			                                    width: 100
			                                },
			                                {
			                                    text: 'Fecha',
			                                    dataIndex: 'fecha',
			                                    width: 100
			                                },
											{
			                                    text: 'ST',
			                                    dataIndex: 'estado',
			                                    //loocked : true,
			                                    width: 40,
			                                    align: 'center',
			                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
			                                        //console.log(record);
			                                        var estado = 'check-circle-green-16.png';
			                                        if(record.get('estado')=='I'){
			                                        	estado = 'check-circle-black-16.png';
			                                        }
			                                        metaData.style = "padding: 0px; margin: 0px";
			                                        return global.permisos({
			                                            type: 'link',
			                                            id_menu: agencias.id_menu,
			                                            icons:[
			                                                {id_serv: 8, img: estado, qtip: 'Estado.', js: ""}

			                                            ]
			                                        });
			                                    }
			                                },
			                                {
			                                    text: 'EDT',
			                                    dataIndex: 'estado',
			                                    //loocked : true,
			                                    width: 40,
			                                    align: 'center',
			                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
			                                        //console.log(record);
			                                        metaData.style = "padding: 0px; margin: 0px";
			                                        return global.permisos({
			                                            type: 'link',
			                                            id_menu: agencias.id_menu,
			                                            icons:[
			                                                {id_serv: 8, img: 'edit.png', qtip: 'Editar.', js: "agencias.getEdit("+rowIndex+")"}

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
					listeners:{
						beforerender: function(obj, opts){
	                        global.state_item_menu(agencias.id_menu, true);
	                    },
	                    afterrender: function(obj, e){
	                    	//agencias.getReloadGridagencias('');
	                        tab.setActiveTab(obj);
	                        global.state_item_menu_config(obj,agencias.id_menu);

	                        var cod_ubi = Ext.getCmp(agencias.id+'-txt-Distrito').getValue();
                        	var nombre = Ext.getCmp(agencias.id+'-txt-agencias').getValue();           	
					        agencias.getAgencias({vp_cod_age:0,vp_cod_ubi:cod_ubi,vp_nombre:nombre});
	                    },
	                    beforeclose:function(obj,opts){
	                    	global.state_item_menu(agencias.id_menu, false);
	                    }
					}

				}).show();
			},
			getEdit:function(index){
				var rec = Ext.getCmp(agencias.id + '-grid-agencias').getStore().getAt(index);
				agencias.setForm('U',rec.data);
			},
			getNew:function(){
				agencias.setForm('I',{id_agencias:0,usr_codigo:'',usr_nombre:'',usr_perfil:1,usr_estado:1});
			},
			setForm:function(op,data){

                Ext.create('Ext.window.Window',{
	                id:agencias.id+'-win-form',
	                plain: true,
	                title:'Mantenimiento de Agencias',
	                icon: '/images/icon/home.png',
	                height: 480,
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
                            id:agencias.id+'-txt-codigo',
                            labelWidth:80,
                            //readOnly:true,
                            labelAlign:'right',
                            width:'50%',
                            anchor:'100%',
                            listeners:{
                                afterrender:function(obj, e){
                                    // obj.getStore().load();
                                    //obj.setValue(data.id_agencias);
                                }
                            }
                        },
                        {
                            xtype: 'textfield',	
                            fieldLabel: 'Nombre',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            id:agencias.id+'-txt-nombre',
                            labelWidth:80,
                            //readOnly:true,
                            labelAlign:'right',
                            width:'90%',
                            anchor:'100%',
                            listeners:{
                                afterrender:function(obj, e){
                                    // obj.getStore().load();
                                    //obj.setValue(data.usr_codigo);
                                }
                            }
                        },
                        {
                            xtype: 'textfield',	
                            fieldLabel: 'Descripción',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            //inputType: 'password',
                            id:agencias.id+'-txt-descripcion',
                            labelWidth:80,
                            //readOnly:true,
                            labelAlign:'right',
                            width:'90%',
                            anchor:'100%'
                        },
                        {
                            xtype: 'textfield',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            fieldLabel: 'Teléfonos',
                            id:agencias.id+'-txt-telefonos',
                            labelWidth:80,
                            //readOnly:true,
                            labelAlign:'right',
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
                            xtype:'combo',
                            fieldLabel: 'Departamento',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            id:agencias.id+'-cmb-depart',
                            store: agencias.store_ubigeoA1,
                            queryMode: 'local',
                            triggerAction: 'all',
                            valueField: 'cod_ubi',
			                displayField: 'Departamento',
                            emptyText: '[Seleccione]',
                            labelAlign:'right',
                            //allowBlank: false,
                            labelWidth: 80,
                            width:'90%',
                            anchor:'100%',
                            //readOnly: true,
                            listeners:{
                                afterrender:function(obj, e){
                                	var dep = Ext.getCmp(agencias.id+'-cmb-depart');
                        			Ext.getCmp(agencias.id+'-cmb-prov').getStore().removeAll();
                        			Ext.getCmp(agencias.id+'-cmb-distri').getStore().removeAll();
                                	agencias.getUbigeo({VP_OP:'D',VP_VALUE:''},dep,'100101');
                                    // obj.getStore().load();
                                    //Ext.getCmp(agencias.id+'-txt-estado-filter').setValue('U');
                                },
                                select:function(obj, records, eOpts){
                        			var pro = Ext.getCmp(agencias.id+'-cmb-prov');
                        			Ext.getCmp(agencias.id+'-cmb-prov').setValue('');
                        			Ext.getCmp(agencias.id+'-cmb-distri').getStore().removeAll();
                        			Ext.getCmp(agencias.id+'-cmb-distri').setValue('');
                                	agencias.getUbigeo({VP_OP:'P',VP_VALUE:obj.getValue()},pro,'');
                                }
                            }
                        },
                        {
                            xtype:'combo',
                            fieldLabel: 'Provincia',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            id:agencias.id+'-cmb-prov',
                            store: agencias.store_ubigeoA2,
                            queryMode: 'local',
                            triggerAction: 'all',
                            valueField: 'cod_ubi',
                            displayField: 'Provincia',
                            emptyText: '[Seleccione]',
                            labelAlign:'right',
                            //allowBlank: false,
                            labelWidth: 80,
                            width:'90%',
                            anchor:'100%',
                            //readOnly: true,
                            listeners:{
                                afterrender:function(obj, e){
                        			Ext.getCmp(agencias.id+'-cmb-distri').getStore().removeAll();
                                	agencias.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},obj,'100601');
                                },
                                select:function(obj, records, eOpts){
                        			var dis=Ext.getCmp(agencias.id+'-cmb-distri');
                                	agencias.getUbigeo({VP_OP:'X',VP_VALUE:obj.getValue()},dis,'');
                                }
                            }
                        },
                        {
                            xtype:'combo',
                            fieldLabel: 'Distrito',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            id:agencias.id+'-cmb-distri',
                            store: agencias.store_ubigeoA3,
                            queryMode: 'local',
                            triggerAction: 'all',
                            valueField: 'cod_ubi',
                            displayField: 'Distrito',
                            emptyText: '[Seleccione]',
                            labelAlign:'right',
                            //allowBlank: false,
                            labelWidth: 80,
                            width:'90%',
                            anchor:'100%',
                            //readOnly: true,
                            listeners:{
                                afterrender:function(obj, e){
                                	agencias.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
                                    // obj.getStore().load();
                                    //Ext.getCmp(agencias.id+'-txt-estado-filter').setValue('U');
                                },
                                select:function(obj, records, eOpts){
                        
                                }
                            }
                        },
                        {
                            xtype: 'textfield',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            fieldLabel: 'Dirección',
                            id:agencias.id+'-txt-direccion',
                            labelWidth:80,
                            //readOnly:true,
                            labelAlign:'right',
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
		                    padding:'5px 5px 5px 5px',
                            fieldLabel: 'X',
                            id:agencias.id+'-txt-x',
                            labelWidth:80,
                            //readOnly:true,
                            labelAlign:'right',
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
		                    padding:'5px 5px 5px 5px',
                            fieldLabel: 'Y',
                            id:agencias.id+'-txt-y',
                            labelWidth:80,
                            //readOnly:true,
                            labelAlign:'right',
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
		                    xtype:'datefield',
		                    id:agencias.id+'-txt-fecha',
		                    fieldLabel:'Fecha',
		                    padding:'5px 5px 5px 5px',
		                    labelWidth:80,
		                    labelAlign:'right',
		                    value:new Date(),
		                    format: 'Ymd',
		                    //readOnly:true,
		                    width: 170,
		                    anchor:'100%'
		                },
		                {
                            xtype:'combo',
                            fieldLabel: 'Estado',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            id:agencias.id+'-cmb-estado',
                            store: agencias.store_estado,
                            queryMode: 'local',
                            triggerAction: 'all',
                            valueField: 'code',
                            displayField: 'name',
                            emptyText: '[Seleccione]',
                            labelAlign:'right',
                            //allowBlank: false,
                            labelWidth: 80,
                            width:170,
                            anchor:'100%',
                            //readOnly: true,
                            listeners:{
                                afterrender:function(obj, e){
                                    obj.setValue('A');
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
	                            	agencias.setSaveagencias(op);
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
	                                Ext.getCmp(agencias.id+'-win-form').close();
	                            }
	                        }
	                    },
	                    '-'
	                ],
	                listeners:{
	                    'afterrender':function(obj, e){ 
	                    	if(op=='U'){
		                    	Ext.getCmp(agencias.id+'-txt-codigo').setValue(data.cod_age);
						    	Ext.getCmp(agencias.id+'-txt-nombre').setValue(data.nombre);
						    	Ext.getCmp(agencias.id+'-txt-descripcion').setValue(data.descripcion);
						    	Ext.getCmp(agencias.id+'-txt-telefonos').setValue(data.telefonos);
						    	Ext.getCmp(agencias.id+'-cmb-distri').setValue(data.cod_ubi);
						    	Ext.getCmp(agencias.id+'-cmb-prov').setValue(data.cod_ubi_pro);
						    	Ext.getCmp(agencias.id+'-cmb-depart').setValue(data.cod_ubi_dep);
						    	Ext.getCmp(agencias.id+'-txt-direccion').setValue(data.direccion);
						    	Ext.getCmp(agencias.id+'-txt-x').setValue(data.x);
						    	Ext.getCmp(agencias.id+'-txt-y').setValue(data.y);
						    	Ext.getCmp(agencias.id+'-txt-fecha').setValue(data.fecha);
						    	Ext.getCmp(agencias.id+'-cmb-estado').setValue(data.estado);
					    	}
	                    },
	                    'close':function(){

	                    }
	                }
	            }).show().center();
			},
			setSaveagencias:function(op){

		    	var codigo = Ext.getCmp(agencias.id+'-txt-codigo').getValue();
		    	var nombre = Ext.getCmp(agencias.id+'-txt-nombre').getValue();
		    	var descripcion = Ext.getCmp(agencias.id+'-txt-descripcion').getValue();
		    	var telefonos = Ext.getCmp(agencias.id+'-txt-telefonos').getValue();
		    	var distri = Ext.getCmp(agencias.id+'-cmb-distri').getValue();
		    	var direccion = Ext.getCmp(agencias.id+'-txt-direccion').getValue();
		    	var x = Ext.getCmp(agencias.id+'-txt-x').getValue();
		    	var y = Ext.getCmp(agencias.id+'-txt-y').getValue();
		    	var fecha = Ext.getCmp(agencias.id+'-txt-fecha').getValue();
		    	var estado = Ext.getCmp(agencias.id+'-cmb-estado').getValue();

				if(nombre==''){ 
					global.Msg({msg:"Ingrese un Nombre.",icon:2,fn:function(){}});
					return false;
				}
				if(distri==''){ 
					global.Msg({msg:"Seleccione un distrito.",icon:2,fn:function(){}});
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
                    		Ext.getCmp(agencias.id+'-tab').el.mask('Elinando Páginas…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:agencias.url+'get_man_agencias/',
			                    params:{
			                    	vp_op:op,
			                    	vp_codigo:codigo,
			                    	vp_nombre:nombre,
			                    	vp_descripcion:descripcion,
			                    	vp_telefonos:telefonos,
			                    	vp_distri:distri,
			                    	vp_direccion:direccion,
			                    	vp_x:x,
			                    	vp_y:y,
			                    	vp_fecha:fecha,
			                    	vp_estado:estado
			                    },
			                    //timeout: 300000,
			                    success: function(response, options){
			                        Ext.getCmp(agencias.id+'-tab').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	var cod_ubi = Ext.getCmp(agencias.id+'-txt-Distrito').getValue();
				                            	var nombre = Ext.getCmp(agencias.id+'-txt-agencias').getValue();
                   					            agencias.getAgencias({vp_cod_age:0,vp_cod_ubi:cod_ubi,vp_nombre:nombre});
			                                	Ext.getCmp(agencias.id+'-win-form').close();
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
			getAgencias:function(json){
				Ext.getCmp(agencias.id + '-grid-agencias').getStore().removeAll();
				Ext.getCmp(agencias.id + '-grid-agencias').getStore().load(
	                {params: json,
	                callback:function(){
	                	//Ext.getCmp(agencias.id+'-form').el.unmask();
	                }
	            });
			},
		    getHistory:function(){
		    	var vp_op = Ext.getCmp(agencias.id+'-txt-estado-filter').getValue();
				var nombre = Ext.getCmp(agencias.id+'-txt-agencias').getValue();

		    	Ext.getCmp(agencias.id + '-grid-agencias').getStore().removeAll();
				Ext.getCmp(agencias.id + '-grid-agencias').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:nombre},
	                callback:function(){
	                	//Ext.getCmp(agencias.id+'-form').el.unmask();
	                }
	            });
	            
		    },
			getImagen:function(param){
				win.getGalery({container:'GaleryFull',width:390,height:250,params:{forma:'F',img_path:'/images/icon/'+param}});///agencias/
			},
			getContratos:function(shi_codigo){
				Ext.getCmp(agencias.id+'-cbx-contrato').getStore().removeAll();
				Ext.getCmp(agencias.id+'-cbx-contrato').getStore().load(
	                {params: {vp_shi_codigo:shi_codigo},
	                callback:function(){
	                	//Ext.getCmp(agencias.id+'-form').el.unmask();
	                }
	            });
			}
		}
		Ext.onReady(agencias.init,agencias);
	}else{
		tab.setActiveTab(agencias.id+'-tab');
	}
</script>