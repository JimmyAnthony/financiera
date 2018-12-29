<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('credit_list-tab')){
		var credit_list = {
			id:'credit_list',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/creditos/',
			url_cli:'/gestion/clientes/',
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
	                    {name: 'flag', type: 'string'}
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: credit_list.url+'get_credit_list/',
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
				
				this.store_tipo_credito = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_tipo', type: 'string'},
	                    {name: 'nombre', type: 'string'},
	                    {name: 'dias', type: 'string'},
	                    {name: 'fecha', type: 'string'},                    
	                    {name: 'flag', type: 'string'}
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: credit_list.url+'SP_TIPO_CREDITO/',
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
	                    url: credit_list.url+'get_list_contratos/',
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
	                    url: credit_list.url+'get_ocr_plantillas/',
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
	                    url: credit_list.url+'get_ocr_trazos/',
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
					id:credit_list.id+'-form',
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
					id:credit_list.id+'-tab',
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
		                            title: 'Listado de Créditos',
		                            legend: 'Ingrese parametros de busqueda',
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
			                                                    id:credit_list.id+'-txt-estado-filter',
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
			                                                            Ext.getCmp(credit_list.id+'-txt-estado-filter').setValue('U');
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
		                                                    id:credit_list.id+'-txt-credit_list',
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
			                                                id:credit_list.id+'-txt-fecha-filtro',
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
		                               					            credit_list.getHistory();
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
									                        icon: '/images/icon/call_credit_list_01.png',
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
		                               					            credit_list.getNew();
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
			                        id: credit_list.id + '-grid-credit',
			                        store: store_creditos, 
			                         bbar: {
						                xtype: 'pagingtoolbar',
						                pageSize: 25,
						                store: store_creditos,
						                displayInfo: true//,
						                //plugins: new Ext.ux.ProgressBarPager()
						            },
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
			                                    text: 'DNI',
			                                    dataIndex: 'dni',
			                                    width: 80
			                                },
			                                {
			                                    text: 'Fecha',
			                                    dataIndex: 'fecha_creado',
			                                    align: 'center',
			                                    width: 80
			                                },
			                                {
			                                    text: 'tasa interes',
			                                    dataIndex: 'tasa_interes',
			                                    width: 100,
			                                    align: 'right'
			                                },
			                                {
			                                    text: 'Método',
			                                    dataIndex: 'cod_metodo',
			                                    align: 'center',
			                                    width: 100,
			                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
			                                        metaData.style = "padding: 0px; margin: 0px";
			                                        var nombre ='';
			                                        switch(parseInt(value)){
			                                        	case 1:
			                                        		nombre ='Simple';
			                                        	break;
			                                        	case 2:
			                                        		nombre ='Frances';
			                                        	break;
			                                        	case 3:
			                                        		nombre ='Aleman';
			                                        	break;
			                                        }
			                                        return nombre;
			                                    }
			                                },
			                                {
			                                    text: 'Prestamo',
			                                    dataIndex: 'prestamo',
			                                    width: 100,
			                                    align: 'right'
			                                },
			                                {
			                                    text: 'Cuotas',
			                                    dataIndex: 'cuotas',
			                                    width: 100,
			                                    align: 'right'
			                                },
			                                {
			                                    text: 'Tipo Crédito',
			                                    dataIndex: 'cod_tipo',
			                                    width: 100,
			                                    align: 'center',
			                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
			                                        metaData.style = "padding: 0px; margin: 0px";
			                                        var nombre ='';
			                                        switch(parseInt(value)){
			                                        	case 1:
			                                        		nombre ='Diario';
			                                        	break;
			                                        	case 2:
			                                        		nombre ='Semanal';
			                                        	break;
			                                        	case 3:
			                                        		nombre ='Quincenal';
			                                        	break;
			                                        	case 4:
			                                        		nombre ='Mensual';
			                                        	break;
			                                        	case 5:
			                                        		nombre ='Semestral';
			                                        	break;
			                                        	case 6:
			                                        		nombre ='Anual';
			                                        	break;
			                                        }
			                                        return nombre;
			                                    }
			                                },
			                                {
			                                    text: 'valor_cuota',
			                                    dataIndex: 'valor_cuota',
			                                    width: 100,
			                                    align: 'right'
			                                },
			                                {
			                                    text: 'total_credito',
			                                    dataIndex: 'total_credito',
			                                    width: 100,
			                                    align: 'right',
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
			                                        if(parseInt(record.get('flag'))==0){
			                                        	estado = 'check-circle-black-16.png';
			                                        }
			                                        metaData.style = "padding: 0px; margin: 0px";
			                                        return global.permisos({
			                                            type: 'link',
			                                            id_menu: credit_list.id_menu,
			                                            icons:[
			                                                {id_serv: 1, img: estado, qtip: 'Estado.', js: ""}

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
			                                            id_menu: credit_list.id_menu,
			                                            icons:[
			                                                {id_serv: 1, img: 'edit.png', qtip: 'Editar.', js: "credit_list.getEdit("+rowIndex+")"}

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
	                        global.state_item_menu(credit_list.id_menu, true);
	                    },
	                    afterrender: function(obj, e){
	                    	//credit_list.getReloadGridcredit_list('');
	                        tab.setActiveTab(obj);
	                        global.state_item_menu_config(obj,credit_list.id_menu);
	                        
	                    },
	                    beforeclose:function(obj,opts){
	                    	global.state_item_menu(credit_list.id_menu, false);
	                    }
					}

				}).show();
			},
			setItemClient:function(obj){
				alert(obj.nombres);
			},
			getEdit:function(index){
				var rec = Ext.getCmp(credit_list.id + '-grid-credit').getStore().getAt(index);
				credit_list.setForm('U',rec.data);
			},
			getNew:function(){
				credit_list.setForm('I',{cod_credito:0});
			},
			setForm:function(op,data){
				win.show({vurl: credit_list.url+'index_keep/?callback=credit_list.setItemClient&op='+op+'&cod_credito='+data.cod_credito, id_menu: credit_list.id_menu, class: ''});
			},
			setSavecredit_list:function(op){

		    	var codigo = Ext.getCmp(credit_list.id+'-txt-codigo').getValue();
		    	var usuario = Ext.getCmp(credit_list.id+'-txt-usuario-credit_list').getValue();
		    	var clave = Ext.getCmp(credit_list.id+'-txt-clave').getValue();
		    	var nombre = Ext.getCmp(credit_list.id+'-txt-nombre-credit_list').getValue();
		    	var perfil = Ext.getCmp(credit_list.id+'-cmb-perfil').getValue();
		    	var estado = Ext.getCmp(credit_list.id+'-cmb-estado-credit_list').getValue();

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
                    		Ext.getCmp(credit_list.id+'-tab').el.mask('Elinando Páginas…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:control.url+'set_save/',
			                    params:{
			                    	vp_op:op,
			                    	vp_id_credit_list:codigo,
			                    	vp_usr_codigo:usuario,
			                    	vp_usr_passwd:clave,
			                    	vp_usr_nombre:nombre,
			                    	vp_usr_perfil:perfil,
			                    	vp_usr_estado:estado
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                        Ext.getCmp(credit_list.id+'-tab').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	credit_list.getHistory();
			                                	Ext.getCmp(credit_list.id+'-win-form').close();
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
		    	var vp_op = Ext.getCmp(credit_list.id+'-txt-estado-filter').getValue();
				var nombre = Ext.getCmp(credit_list.id+'-txt-credit_list').getValue();

		    	Ext.getCmp(credit_list.id + '-grid-credit').getStore().removeAll();
				Ext.getCmp(credit_list.id + '-grid-credit').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:nombre},
	                callback:function(){
	                	//Ext.getCmp(credit_list.id+'-form').el.unmask();
	                }
	            });
	            
		    },
			getImagen:function(param){
				win.getGalery({container:'GaleryFull',width:390,height:250,params:{forma:'F',img_path:'/images/icon/'+param}});///credit_list/
			},
			getContratos:function(shi_codigo){
				Ext.getCmp(credit_list.id+'-cbx-contrato').getStore().removeAll();
				Ext.getCmp(credit_list.id+'-cbx-contrato').getStore().load(
	                {params: {vp_shi_codigo:shi_codigo},
	                callback:function(){
	                	//Ext.getCmp(credit_list.id+'-form').el.unmask();
	                }
	            });
			}
		}
		Ext.onReady(credit_list.init,credit_list);
	}else{
		tab.setActiveTab(credit_list.id+'-tab');
	}
</script>