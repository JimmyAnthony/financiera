<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('user-tab')){
		var user = {
			id:'user',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/user/',
			opcion:'I',
			id_lote:0,
			shi_codigo:0,
			fac_cliente:0,
			lote:0,
			paramsStore:{},
			init:function(){
				Ext.tip.QuickTipManager.init();

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
	                    url: user.url+'get_credit_list/',
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
	                    {name: 'id_user', type: 'string'},
	                    {name: 'fecha_actual', type: 'string'}
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: user.url+'get_list_shipper/',
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
	                    url: user.url+'get_list_contratos/',
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
	                    url: user.url+'get_ocr_plantillas/',
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
	                    url: user.url+'get_ocr_trazos/',
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
					['U','Usuario'],
				    ['N','Nombre Usuario']
				];
				var store_estado_lote = Ext.create('Ext.data.ArrayStore', {
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
				var panel = Ext.create('Ext.form.Panel',{
					id:user.id+'-form',
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
					id:user.id+'-tab',
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
		                            logo: 'DC',
		                            title: 'Busqueda de Documentos',
		                            legend: 'Búsqueda de Lotes registrados',
		                            width:1100,
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
			                                   		width: 200,border:false,
			                                    	padding:'0px 2px 0px 0px',  
			                                    	bodyStyle: 'background: transparent',
			                                 		items:[
			                                                {
			                                                    xtype:'combo',
			                                                    fieldLabel: 'Filtro',
			                                                    id:user.id+'-txt-estado-filter',
			                                                    store: store_estado_lote,
			                                                    queryMode: 'local',
			                                                    triggerAction: 'all',
			                                                    valueField: 'code',
			                                                    displayField: 'name',
			                                                    emptyText: '[Seleccione]',
			                                                    labelAlign:'right',
			                                                    //allowBlank: false,
			                                                    labelWidth: 50,
			                                                    width:'100%',
			                                                    anchor:'100%',
			                                                    //readOnly: true,
			                                                    listeners:{
			                                                        afterrender:function(obj, e){
			                                                            // obj.getStore().load();
			                                                            Ext.getCmp(user.id+'-txt-estado-filter').setValue('U');
			                                                        },
			                                                        select:function(obj, records, eOpts){
			                                                
			                                                        }
			                                                    }
			                                                }
			                                 		]
			                                    },
		                                        {
		                                            width:200,border:false,
		                                            padding:'0px 2px 0px 0px',  
		                                            bodyStyle: 'background: transparent',
		                                            items:[
		                                                {
		                                                    xtype: 'textfield',	
		                                                    fieldLabel: '',
		                                                    id:user.id+'-txt-user',
		                                                    labelWidth:0,
		                                                    //readOnly:true,
		                                                    labelAlign:'right',
		                                                    width:'100%',
		                                                    anchor:'100%'
		                                                }
		                                            ]
		                                        },
		                                        {
			                                        width: 140,border:false,
			                                        hidden:true,
			                                        padding:'0px 2px 0px 0px',  
			                                    	bodyStyle: 'background: transparent',
			                                        items:[
			                                            {
			                                                xtype:'datefield',
			                                                id:user.id+'-txt-fecha-filtro',
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
		                               					            user.getHistory();
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
									                        icon: '/images/icon/call_user_01.png',
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
		                               					            user.getNew();
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
			                        id: user.id + '-grid-credit',
			                        store: store_creditos, 
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
			                                    flex: 1
			                                },
			                                {
			                                    text: 'dni',
			                                    dataIndex: 'dni',
			                                    width: 40
			                                },
			                                {
			                                    text: 'fecha',
			                                    dataIndex: 'fecha',
			                                    width: 60
			                                },
			                                {
			                                    text: 'tasa interes',
			                                    dataIndex: 'tasa_interes',
			                                    width: 100
			                                },
			                                {
			                                    text: 'cod_metodo',
			                                    dataIndex: 'cod_metodo',
			                                    width: 100
			                                },
			                                {
			                                    text: 'prestamo',
			                                    dataIndex: 'prestamo',
			                                    width: 100
			                                },
			                                {
			                                    text: 'cuotas',
			                                    dataIndex: 'cuotas',
			                                    width: 100
			                                },
			                                {
			                                    text: 'cod_tipo',
			                                    dataIndex: 'cod_tipo',
			                                    width: 100
			                                },
			                                {
			                                    text: 'valor_cuota',
			                                    dataIndex: 'valor_cuota',
			                                    width: 100
			                                },
			                                {
			                                    text: 'total_credito',
			                                    dataIndex: 'total_credito',
			                                    width: 100
			                                },
											{
			                                    text: 'ST',
			                                    dataIndex: 'flag',
			                                    //loocked : true,
			                                    width: 40,
			                                    align: 'center',
			                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
			                                        //console.log(record);
			                                        var estado = 'check-circle-green-16.png';
			                                        if(parseInt(record.get('usr_estado'))==0){
			                                        	estado = 'check-circle-black-16.png';
			                                        }
			                                        metaData.style = "padding: 0px; margin: 0px";
			                                        return global.permisos({
			                                            type: 'link',
			                                            id_menu: user.id_menu,
			                                            icons:[
			                                                {id_serv: 10, img: estado, qtip: 'Estado.', js: ""}

			                                            ]
			                                        });
			                                    }
			                                },
			                                {
			                                    text: 'EDT',
			                                    dataIndex: 'usr_estado',
			                                    //loocked : true,
			                                    width: 40,
			                                    align: 'center',
			                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
			                                        //console.log(record);
			                                        metaData.style = "padding: 0px; margin: 0px";
			                                        return global.permisos({
			                                            type: 'link',
			                                            id_menu: user.id_menu,
			                                            icons:[
			                                                {id_serv: 10, img: 'edit.png', qtip: 'Editar.', js: "user.getEdit("+rowIndex+")"}

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
						/*beforerender: function(obj, opts){
	                        global.state_item_menu(user.id_menu, true);
	                    },
	                    afterrender: function(obj, e){
	                    	//user.getReloadGriduser('');
	                        tab.setActiveTab(obj);
	                        global.state_item_menu_config(obj,user.id_menu);
	                    },
	                    beforeclose:function(obj,opts){
	                    	global.state_item_menu(user.id_menu, false);
	                    }*/
					}

				}).show();
			},
			getEdit:function(index){
				var rec = Ext.getCmp(user.id + '-grid-credit').getStore().getAt(index);
				user.setForm('U',rec.data);
			},
			getNew:function(){
				user.setForm('I',{id_user:0,usr_codigo:'',usr_nombre:'',usr_perfil:1,usr_estado:1});
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

			    var myDataUser = [
					[1,'Activo'], 
				    [0,'Inactivo']
				];
				var store_estado_user = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'perfil',
			        autoLoad: true,
			        data: myDataUser,
			        fields: ['code', 'name']
			    });

                Ext.create('Ext.window.Window',{
	                id:user.id+'-win-form',
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
                            id:user.id+'-txt-codigo',
                            labelWidth:50,
                            //readOnly:true,
                            labelAlign:'right',
                            width:'50%',
                            anchor:'100%',
                            listeners:{
                                afterrender:function(obj, e){
                                    // obj.getStore().load();
                                    obj.setValue(data.id_user);
                                }
                            }
                        },
                        {
                            xtype: 'textfield',	
                            fieldLabel: 'Usuario',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            id:user.id+'-txt-usuario-user',
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
                            id:user.id+'-txt-clave',
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
                            id:user.id+'-txt-nombre-user',
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
                            id:user.id+'-cmb-perfil',
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
                                    Ext.getCmp(user.id+'-cmb-perfil').setValue(data.usr_perfil);
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
                            id:user.id+'-cmb-estado-user',
                            store: store_estado_user,
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
                                    Ext.getCmp(user.id+'-cmb-estado-user').setValue(data.usr_estado);
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
	                            	user.setSaveUser(op);
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
	                                Ext.getCmp(user.id+'-win-form').close();
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
			setSaveUser:function(op){

		    	var codigo = Ext.getCmp(user.id+'-txt-codigo').getValue();
		    	var usuario = Ext.getCmp(user.id+'-txt-usuario-user').getValue();
		    	var clave = Ext.getCmp(user.id+'-txt-clave').getValue();
		    	var nombre = Ext.getCmp(user.id+'-txt-nombre-user').getValue();
		    	var perfil = Ext.getCmp(user.id+'-cmb-perfil').getValue();
		    	var estado = Ext.getCmp(user.id+'-cmb-estado-user').getValue();

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
                    		Ext.getCmp(user.id+'-tab').el.mask('Elinando Páginas…', 'x-mask-loading');
	                        scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:control.url+'set_save/',
			                    params:{
			                    	vp_op:op,
			                    	vp_id_user:codigo,
			                    	vp_usr_codigo:usuario,
			                    	vp_usr_passwd:clave,
			                    	vp_usr_nombre:nombre,
			                    	vp_usr_perfil:perfil,
			                    	vp_usr_estado:estado
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                        Ext.getCmp(user.id+'-tab').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	user.getHistory();
			                                	Ext.getCmp(user.id+'-win-form').close();
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
		    	var vp_op = Ext.getCmp(user.id+'-txt-estado-filter').getValue();
				var nombre = Ext.getCmp(user.id+'-txt-user').getValue();

		    	Ext.getCmp(user.id + '-grid-credit').getStore().removeAll();
				Ext.getCmp(user.id + '-grid-credit').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:nombre},
	                callback:function(){
	                	//Ext.getCmp(user.id+'-form').el.unmask();
	                }
	            });
	            
		    },
			getImagen:function(param){
				win.getGalery({container:'GaleryFull',width:390,height:250,params:{forma:'F',img_path:'/images/icon/'+param}});///user/
			},
			getContratos:function(shi_codigo){
				Ext.getCmp(user.id+'-cbx-contrato').getStore().removeAll();
				Ext.getCmp(user.id+'-cbx-contrato').getStore().load(
	                {params: {vp_shi_codigo:shi_codigo},
	                callback:function(){
	                	//Ext.getCmp(user.id+'-form').el.unmask();
	                }
	            });
			}
		}
		Ext.onReady(user.init,user);
	}else{
		tab.setActiveTab(user.id+'-tab');
	}
</script>