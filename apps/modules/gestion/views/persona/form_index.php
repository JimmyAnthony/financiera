<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('persona-tab')){
		var persona = {
			id:'persona',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/persona/',
			opcion:'I',
			id_lote:0,
			shi_codigo:0,
			fac_cliente:0,
			lote:0,
			paramsStore:{},
			back:'NONE',
			init:function(){
				Ext.tip.QuickTipManager.init();

				var store_persona = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'id_persona', type: 'string'},
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
	                    url: persona.url+'get_list_persona/',
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
	                    {name: 'id_persona', type: 'string'},
	                    {name: 'fecha_actual', type: 'string'}
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: persona.url+'get_list_shipper/',
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
	                    url: persona.url+'get_list_contratos/',
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
	                    url: persona.url+'get_ocr_plantillas/',
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
	                    url: persona.url+'get_ocr_trazos/',
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
				persona.store_estado_civil = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: true,
			        data: myDataEstadoCivil,
			        fields: ['code', 'name']
			    });

			    var myDataTipoTel = [
					['C','Celular'],
				    ['F','Fijo']
				];
				persona.store_tipo_tel = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'tel',
			        autoLoad: true,
			        data: myDataTipoTel,
			        fields: ['code', 'name']
			    });

			    var myDataLineaTel = [
					['CA','Claro'],
				    ['MO','Movistar'],
				    ['FI','Fijo']
				];
				persona.store_linea_tel = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'tel',
			        autoLoad: true,
			        data: myDataLineaTel,
			        fields: ['code', 'name']
			    });

			    persona.store_ubigeo = Ext.create('Ext.data.Store',{
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
	                    url: persona.url+'get_list_ubigeo/',
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

	            persona.store_ubigeo2 = Ext.create('Ext.data.Store',{
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
	                    url: persona.url+'get_list_ubigeo/',
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

	            persona.store_ubigeo3 = Ext.create('Ext.data.Store',{
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
	                    url: persona.url+'get_list_ubigeo/',
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

			    var myDatapersona = [
					[1,'Activo'], 
				    [0,'Inactivo']
				];
				var store_estado_persona = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'perfil',
			        autoLoad: true,
			        data: myDatapersona,
			        fields: ['code', 'name']
			    });

			    var imageTplPointer = new Ext.XTemplate(
		            '<tpl for=".">',
		                '<div class="list_grid_as__list_menu_select" >',
		                    '<div class="list_grid_as__list_menu" >',
		                        '<div class="list_grid_as__menu_bx" >',
		                            '<div class="">',
		                                '<img src="/images/menu/{icono}" />',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:180px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>Nombres:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{nombres}, {ape_pat} {ape_mat}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:80px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>DNI:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{dni}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                    '</div>',
		                '</div>',
		            '</tpl>'
		        );

		        var store_telefonos = Ext.create('Ext.data.Store',{
		            fields: [
		                {name: 'id_asesor', type: 'string'},
		                {name: 'nombres', type: 'string'},
		                {name: 'ape_pat', type: 'string'},
		                {name: 'ape_mat', type: 'string'},
		                {name: 'dni', type: 'string'},
		                {name: 'numero', type: 'string'}
		            ],
		            autoLoad:true, 
		            proxy:{
		                type: 'ajax',
		                url: persona.url+'getDataMenuView/',
		                reader:{
		                    type: 'json',
		                    rootProperty: 'data'
		                },
		                extraParams:{vp_op:'C'}
		            },
		            listeners:{
		                load: function(obj, records, successful, opts){
		                    console.log(records);
		                    //document.getElementById("menu_spinner").innerHTML = "";
		                }
		            }
		        });

                Ext.create('Ext.window.Window',{
	                id:persona.id+'-win-form',
	                plain: true,
	                title:'Mantenimiento',
	                icon: '/images/icon/default-avatar_man.png',
	                height: 530,
	                width: 450,
	                resizable:false,
	                modal: true,
	                border:false,
	                closable:true,
	                padding:20,
	                layout:'fit',
	                items:[
	                	{
							xtype: 'tabpanel',
							//region:'center',
							bodyStyle: 'background: transparent',
                            id: persona.id+'-tabContentAsesor',
                            activeItem: 0,
                            autoScroll: false,

                            defaults:{
                                closable: true,
                                autoScroll: true,
                                closable:false
                            },
                            border: false,
                            //layout: 'fit',
                            tabPosition: 'left',
                            bodyCls: 'transparent',
                            bodyStyle: 'background: transparent',
							items:[
								{
									xtype:'tabpanel',
									title:'Datos',
									bodyStyle: 'background: transparent',
		                            id: persona.id+'-tabContentDatos',
		                            activeItem: 0,
		                            autoScroll: false,

		                            defaults:{
		                                closable: true,
		                                autoScroll: true,
		                                closable:false
		                            },
		                            border: false,
		                            //layout: 'fit',
		                            tabPosition: 'right',
		                            bodyCls: 'transparent',
		                            bodyStyle: 'background: transparent',
		                            autoScroll:false,
									items:[
										{
											xtype:'panel',
											bodyStyle: 'background: transparent',
											title:'Registro',
											border:false,
											items:[
												{
													layout:'hbox',
													bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													border:false,
													items:[
														{
								                            xtype: 'textfield',	
								                            fieldLabel: 'IDCLI',
								                            id:persona.id+'-sol-txt-id-cli',
								                            hidden:true,
								                            bodyStyle: 'background: transparent',
										                    padding:'15px 5px 5px 25px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            //width:120,
								                            //height:60,
								                            labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
								                            value:'0',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
														{
								                            xtype: 'textfield',	
								                            fieldLabel: 'IDPER',
								                            id:persona.id+'-sol-txt-id-per',
								                            hidden:true,
								                            bodyStyle: 'background: transparent',
										                    padding:'15px 5px 5px 25px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            //width:120,
								                            //height:60,
								                            labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
								                            value:'0',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
														{
								                            xtype: 'textfield',
								                            id:persona.id+'-sol-txt-apellido-paterno',
								                            fieldLabel: 'Apellido Paterno',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            width:'50%',
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
								                        {
								                            xtype: 'textfield',	
								                            id:persona.id+'-sol-txt-apellido-materno',
								                            fieldLabel: 'Apellido Materno',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            width:'50%',
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
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
													bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													border:false,
													items:[
										                {
								                            xtype: 'textfield',
								                            fieldLabel: 'Nombres',
								                            id:persona.id+'-sol-txt-nombres',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            width:'100%',
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
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
						                            xtype:'combo',
						                            fieldLabel: 'Sexo',
						                            bodyStyle: 'background: transparent',
						                            id:persona.id+'-sol-cmb-sexo',
						                            store: Ext.create('Ext.data.ArrayStore', {
												        //storeId: 'estado',
												        autoLoad: true,
												        data: [
															['M','MASCULINO'],
														    ['F','FEMENINO']
														],
												        fields: ['code', 'name']
												    }),
						                            queryMode: 'local',
						                            triggerAction: 'all',
						                            valueField: 'code',
						                            displayField: 'name',
						                            emptyText: '[Seleccione]',
						                            labelAlign:'right',
						                            //allowBlank: false,
						                            width:'92%',
						                            flex:1,
						                            //height:30,
						                            labelStyle: "font-size:12px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
						                            fieldStyle: 'font-size:12px; text-align: center; font-weight: bold',
		                                            anchor:'100%',
		                                            labelWidth:50,
		                                            padding:'15px 5px 5px 10px',
						                            listeners:{
						                                afterrender:function(obj, e){
						                                    // obj.getStore().load();
						                                    obj.setValue('M');
						                                },
						                                select:function(obj, records, eOpts){
						                        
						                                }
						                            }
						                        },
								                {
													layout:'hbox',
													bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													border:false,
													items:[
													    {
								                            xtype: 'textfield',	
								                            id:persona.id+'-sol-txt-doc-dni',
								                            fieldLabel: 'DNI',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            //width:'50%',
								                            flex:1,
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
								                        {
								                            xtype: 'textfield',	
								                            id:persona.id+'-sol-txt-doc-ce',
								                            fieldLabel: 'CE',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            //width:'50%',
								                            flex:1,
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
													    {
								                            xtype: 'textfield',	
								                            id:persona.id+'-sol-txt-doc-cip',
								                            fieldLabel: 'CIP',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            //width:'50%',
								                            flex:1,
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
													    {
								                            xtype: 'textfield',	
								                            id:persona.id+'-sol-txt-doc-ruc',
								                            fieldLabel: 'RUC',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            //width:'50%',
								                            flex:1,
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
													    {
								                            xtype: 'textfield',	
								                            id:persona.id+'-sol-txt-doc-cm',
								                            fieldLabel: 'CM',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            //width:'50%',
								                            flex:1,
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
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
													bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													border:false,
													items:[
														{
								                            xtype:'combo',
								                            fieldLabel: 'Estado Civil',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            id:persona.id+'-sol-cmb-estado-civil',
								                            store: persona.store_estado_civil,
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
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                    // obj.getStore().load();
								                                    obj.setValue('S');
								                                },
								                                select:function(obj, records, eOpts){
								                        
								                                }
								                            }
								                        },
														{
													        xtype: 'datefield',
													        id:persona.id+'-sol-date-fecha-nac',
													        padding:'5px 5px 5px 5px',
													        //name: 'date1',
													        labelAlign:'top',
													        format:'Y-m-d',
													        flex:1,
								                            height:40,
													        labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
													        fieldLabel: 'Fecha de Nacimiento',
													        value:''
													    }
								                    ]
								                },
								                {
													layout:'hbox',
													bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													border:false,
													items:[
														{
													        xtype: 'label',
													        //forId: 'myFieldId',
													        text: 'Domicilio Actual:',
													        style: 'font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold',
													        padding:'26px 10px 5px 5px',
													        width:80,
													        //flex:1,
								                            anchor:'100%'
													    },
														{
													        xtype: 'checkboxfield',
													        id:persona.id+'-sol-chk-domi-propio',
													        name: 'checkbox1',
													        fieldLabel: 'Propio',
													        labelAlign:'top',
													        padding:'5px 10px 5px 5px',
													        labelWidth:100,
													        flex:1,
													        //boxLabel: 'Domicilio Actual',
													        style: 'font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold',
								                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
													    },
													    {
													        xtype: 'checkboxfield',
													        id:persona.id+'-sol-chk-domi-pagando',
													        name: 'checkbox1',
													        fieldLabel: 'Pagandolo',
													        labelAlign:'top',
													        padding:'5px 5px 5px 5px',
													        labelWidth:40,
													        flex:1,
													        //boxLabel: 'box label',
													        style: 'font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold',
								                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
													    },
													    {
													        xtype: 'checkboxfield',
													        id:persona.id+'-sol-chk-domi-alquilado',
													        name: 'checkbox1',
													        fieldLabel: 'Alquilado',
													        labelAlign:'top',
													        padding:'5px 5px 5px 5px',
													        labelWidth:40,
													        flex:1,
													        //boxLabel: 'box label',
													        style: 'font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold',
								                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
													    },
													    {
													        xtype: 'checkboxfield',
													        id:persona.id+'-sol-chk-domi-familiar',
													        name: 'checkbox1',
													        fieldLabel: 'Familiar',
													        labelAlign:'top',
													        padding:'5px 5px 5px 5px',
													        labelWidth:40,
													        flex:1,
													        //boxLabel: 'box label',
													        style: 'font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold',
								                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold'
													    }
								                    ]
								                },
								                {
							                        layout:'hbox',
							                        bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													height:70,
													border:false,
													items:[
								                        {
									                        xtype:'button',
									                        margin:'20px 5px 5px 5px',
									                        height:30,
									                        //text: 'Grabar',
									                        icon: '/images/icon/save.png',
									                        listeners:{
									                            beforerender: function(obj, opts){
																},
									                            click: function(obj, e){
									                            	persona.setSavePersona();
									                            }
									                        }
									                    },
									                    {
									                        xtype:'button',
									                        height:30,
									                        margin:'20px 5px 5px 5px',
									                        //text: 'Grabar',
									                        icon: '/images/icon/Document.png',
									                        listeners:{
									                            beforerender: function(obj, opts){
																},
									                            click: function(obj, e){
									                            	//persona.setSavepersona(op);
									                            }
									                        }
									                    },
									                    {
									                        xtype:'button',
									                        height:30,
									                        margin:'20px 5px 5px 5px',
									                        //text: 'Grabar',
									                        icon: '/images/icon/Trash.png',
									                        listeners:{
									                            beforerender: function(obj, opts){
																},
									                            click: function(obj, e){
									                            	//persona.setSavepersona(op);
									                            }
									                        }
									                    }
								                    ]
								                }
							            	]
							            },
							            {
											xtype:'panel',
											bodyStyle: 'background: transparent',
											title:'Foto',
											border:false,
											layout:'border',
											items:[
												{
													region:'center',
													border:false,
													layout:'fit',
													bodyStyle: 'background: transparent',
													items:[
														{
									                        layout:'hbox',
									                        bodyStyle: 'background: transparent',
															padding:'5px 5px 5px 5px',
															//height:70,
															flex:1,
															border:true,
															padding:'20px 20px 20px 20px',
															margin:'20px 20px 20px 20px',
															items:[

															]
														}
													]
												},
												{
													region:'south',
													height:95,
													border:false,
													bodyStyle: 'background: transparent',
													items:[
														{
									                        layout:'hbox',
									                        bodyStyle: 'background: transparent',
															padding:'5px 5px 5px 5px',
															height:45,
															border:false,
															items:[
																{
														            xtype: 'filefield',
														            labelWidth:40,
														            flex:1,
														            emptyText: 'Seleccione una imagen',
														            fieldLabel: 'Foto',
														            name: 'photo-path',
														            buttonText: '',
														            buttonConfig: {
														                iconCls: 'upload-icon'
														            }
														        }
															]
														},
														{
									                        layout:'hbox',
									                        bodyStyle: 'background: transparent',
															padding:'5px 5px 5px 5px',
															height:45,
															border:false,
															items:[
										                        {
											                        xtype:'button',
											                        margin:'5px 5px 5px 5px',
											                        height:30,
											                        //text: 'Grabar',
											                        icon: '/images/icon/save.png',
											                        listeners:{
											                            beforerender: function(obj, opts){
																		},
											                            click: function(obj, e){
											                            	//persona.setSavepersona(op);
											                            }
											                        }
											                    },
											                    {
											                        xtype:'button',
											                        height:30,
											                        margin:'5px 5px 5px 5px',
											                        //text: 'Grabar',
											                        icon: '/images/icon/Document.png',
											                        listeners:{
											                            beforerender: function(obj, opts){
																		},
											                            click: function(obj, e){
											                            	//persona.setSavepersona(op);
											                            }
											                        }
											                    },
											                    {
											                        xtype:'button',
											                        height:30,
											                        margin:'5px 5px 5px 5px',
											                        //text: 'Grabar',
											                        icon: '/images/icon/Trash.png',
											                        listeners:{
											                            beforerender: function(obj, opts){
																		},
											                            click: function(obj, e){
											                            	//persona.setSavepersona(op);
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
									xtype:'panel',
									title:'Teléfonos',
									bodyStyle: 'background: transparent',
									border:false,
									layout:'border',
									items:[
										{
											region:'north',
											height:130,
											bodyStyle: 'background: transparent',
											padding:'5px 5px 5px 5px',
											border:false,
											//layout:'fit',
											items:[
												{
						                            xtype: 'textfield',	
						                            fieldLabel: 'IDTEL',
						                            id:persona.id+'-sol-txt-id-tel',
						                            hidden:true,
						                            bodyStyle: 'background: transparent',
								                    padding:'15px 5px 5px 25px',
						                            //id:persona.id+'-txt-dni',
						                            labelWidth:50,
						                            //readOnly:true,
						                            labelAlign:'top',
						                            //width:120,
						                            //height:60,
						                            labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
						                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
						                            value:'0',
						                            //anchor:'100%',
						                            listeners:{
						                                afterrender:function(obj, e){
						                                }
						                            }
						                        },
						                        {
							                        layout:'hbox',
							                        bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													border:false,
													items:[
														{
								                            xtype:'combo',
								                            fieldLabel: 'Tipo Teléfono',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            id:persona.id+'-sol-cmb-tipo-tel',
								                            store: persona.store_tipo_tel,
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
								                            //readOnly: true,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                    // obj.getStore().load();
								                                    obj.setValue('CE');
								                                },
								                                select:function(obj, records, eOpts){
								                        
								                                }
								                            }
								                        },
								                        {
								                            xtype:'combo',
								                            fieldLabel: 'Linea Teléfono',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            id:persona.id+'-sol-cmb-line-tel',
								                            store: persona.store_linea_tel,
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
								                            //readOnly: true,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                    // obj.getStore().load();
								                                    obj.setValue('C');
								                                },
								                                select:function(obj, records, eOpts){
								                        
								                                }
								                            }
								                        }
													]
						                        },
						                        {
							                        layout:'hbox',
							                        bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													height:70,
													border:false,
													items:[
								                        {
								                            xtype: 'textfield',	
								                            id:persona.id+'-sol-txt-tel-cel',
								                            fieldLabel: 'Teléfono Fijo/N° Celular',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            width:'95%',
								                            flex:1,
								                            height:30,
								                            maskRe: new RegExp("[0-9]+"),
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:13px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
								                        {
									                        xtype:'button',
									                        margin:'20px 5px 5px 5px',
									                        height:30,
									                        //text: 'Grabar',
									                        icon: '/images/icon/save.png',
									                        listeners:{
									                            beforerender: function(obj, opts){
																},
									                            click: function(obj, e){
									                            	persona.setSaveTelefono();
									                            }
									                        }
									                    },
									                    {
									                        xtype:'button',
									                        height:30,
									                        margin:'20px 5px 5px 5px',
									                        //text: 'Grabar',
									                        icon: '/images/icon/Document.png',
									                        listeners:{
									                            beforerender: function(obj, opts){
																},
									                            click: function(obj, e){
									                            	//persona.setSavepersona(op);
									                            }
									                        }
									                    },
									                    {
									                        xtype:'button',
									                        height:30,
									                        margin:'20px 5px 5px 5px',
									                        //text: 'Grabar',
									                        icon: '/images/icon/Trash.png',
									                        listeners:{
									                            beforerender: function(obj, opts){
																},
									                            click: function(obj, e){
									                            	persona.setSavepersona(op);
									                            }
									                        }
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
							                        xtype: 'dataview',
							                        id: persona.id+'-list-telefonos',
							                        bodyStyle: 'background: transparent',
							                        bodyCls: 'transparent',
							                        layout:'fit',
							                        store: store_telefonos,
							                        autoScroll: true,
							                        loadMask:true,
							                        autoHeight: false,
							                        tpl: imageTplPointer,
							                        multiSelect: false,
							                        singleSelect: false,
							                        loadingText:'Cargando Lista de Teléfono...',
							                        emptyText: '<div class="list_grid_as__list_menu"><div class="list_grid_as__none_data" ></div><div class="list_grid_as__title_clear_data">NO TIENE NINGUN TELÉFONO</div></div>',
							                        itemSelector: 'div.list_grid_as__list_menu_select',
							                        trackOver: true,
							                        overItemCls: 'list_grid_as__list_menu-hover',
							                        listeners: {
							                            'itemdblclick': function(view, record, item, idx, event, opts) {
							                                me.idx=idx;
							                                var record = this.getStore().getAt(idx);
							                                var val =record.data;
							                                var menu_class = val.menu_class == null || val.menu_class == '' ? '' : val.menu_class;
							                                if(val.nivel!=0){
							                                    if(me.config_.mode==1){
							                                        win.show({vurl: val.url, id_menu: idx, class: menu_class});//obj.getItemId().split('-')[1]  
							                                    }else{
							                                        var tab=Ext.getCmp(me.config_.tab);
							                                        var active=Ext.getCmp(me.config_.id+val.url);
							                                        tab.setActiveTab(active);
							                                    }
							                                }
							                                
							                            }
							                        }
							                    }
											]
										}
									]
								},
								{
									xtype:'tabpanel',
									title:'Dirección',
									bodyStyle: 'background: transparent',
		                            id: persona.id+'-tabContentDirecciones',
		                            activeItem: 0,
		                            autoScroll: false,

		                            defaults:{
		                                closable: true,
		                                autoScroll: true,
		                                closable:false
		                            },
		                            border: false,
		                            //layout: 'fit',
		                            tabPosition: 'right',
		                            bodyCls: 'transparent',
		                            bodyStyle: 'background: transparent',
									items:[
										{
											xtype:'panel',
											bodyStyle: 'background: transparent',
											title:'Registro',
											border:false,
											items:[
												{
						                            xtype: 'textfield',	
						                            fieldLabel: 'IDdir',
						                            id:persona.id+'-sol-txt-id-dir',
						                            hidden:true,
						                            bodyStyle: 'background: transparent',
								                    //padding:'15px 5px 5px 25px',
						                            //id:persona.id+'-txt-dni',
						                            labelWidth:50,
						                            //readOnly:true,
						                            labelAlign:'top',
						                            //width:120,
						                            //height:60,
						                            labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
						                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
						                            value:'0',
						                            //anchor:'100%',
						                            listeners:{
						                                afterrender:function(obj, e){
						                                }
						                            }
						                        },
								                {
						                            xtype: 'textfield',
						                            fieldLabel: 'Avenida/Calle/Jirón/Pasaje',
						                            id:persona.id+'-sol-txt-dir-direccion',
						                            bodyStyle: 'background: transparent',
								                    padding:'5px 10px 5px 5px',
						                            //id:persona.id+'-txt-dni',
						                            labelWidth:50,
						                            //readOnly:true,
						                            labelAlign:'top',
						                            width:'92%',
						                            flex:1,
						                            height:40,
						                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
						                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
						                            value:'',
						                            //anchor:'100%',
						                            listeners:{
						                                afterrender:function(obj, e){
						                                },
						                                change: function(field, newValue, oldValue){
								                            field.setValue(newValue.toUpperCase());
								                        }
						                            }
						                        },
												{
													layout:'hbox',
													bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													border:false,
													items:[
								                        {
								                            xtype: 'textfield',
								                            id:persona.id+'-sol-txt-dir-numero',
								                            fieldLabel: 'N°',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 10px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            width:50,
								                            //flex:1,
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                },
								                                change: function(field, newValue, oldValue){
										                            field.setValue(newValue.toUpperCase());
										                        }
								                            }
								                        },
								                        {
								                            xtype: 'textfield',
								                            id:persona.id+'-sol-txt-dir-mz',
								                            fieldLabel: 'MZ',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 10px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            width:50,
								                            //flex:1,
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                },
								                                change: function(field, newValue, oldValue){
										                            field.setValue(newValue.toUpperCase());
										                        }
								                            }
								                        },
								                        {
								                            xtype: 'textfield',
								                            id:persona.id+'-sol-txt-dir-lt',
								                            fieldLabel: 'LT',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 10px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            width:50,
								                            //flex:1,
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                },
								                                change: function(field, newValue, oldValue){
										                            field.setValue(newValue.toUpperCase());
										                        }
								                            }
								                        },
								                        {
								                            xtype: 'textfield',
								                            id:persona.id+'-sol-txt-dir-dpto',
								                            fieldLabel: 'DPTO',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 10px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            width:50,
								                            //flex:1,
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                },
								                                change: function(field, newValue, oldValue){
										                            field.setValue(newValue.toUpperCase());
										                        }
								                            }
								                        },
														{
								                            xtype: 'textfield',
								                            id:persona.id+'-sol-txt-dir-interior',
								                            fieldLabel: 'INT.',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 10px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            width:50,
								                            //flex:1,
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                },
								                                change: function(field, newValue, oldValue){
										                            field.setValue(newValue.toUpperCase());
										                        }
								                            }
								                        }
								                    ]
								                },
								                {
													layout:'hbox',
													bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													border:false,
													items:[
										                {
								                            xtype: 'textfield',
								                            id:persona.id+'-sol-txt-dir-urb',
								                            fieldLabel: 'Urbanización/AA.HH/PJ/ASOC',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 10px 5px 5px',
								                            //id:persona.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            //width:'100%',
								                            flex:1,
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                },
								                                change: function(field, newValue, oldValue){
										                            field.setValue(newValue.toUpperCase());
										                        }
								                            }
								                        }
								                    ]
								                },
						                        {
						                            xtype: 'textfield',
						                            id:persona.id+'-sol-txt-dir-referencia',
						                            fieldLabel: 'Referencia de Domicilio',
						                            bodyStyle: 'background: transparent',
								                    padding:'5px 5px 5px 10px',
						                            //id:persona.id+'-txt-dni',
						                            labelWidth:55,
						                            //readOnly:true,
						                            labelAlign:'top',
						                            width:'92%',
						                            flex:1,
						                            height:40,
						                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
						                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
						                            value:'',
						                            //anchor:'100%',
						                            listeners:{
						                                afterrender:function(obj, e){
						                                },
						                                change: function(field, newValue, oldValue){
								                            field.setValue(newValue.toUpperCase());
								                        }
						                            }
						                        },
								                {
		                                            xtype:'combo',
		                                            fieldLabel: 'Departamento',
		                                            id:persona.id+'-sol-cmb-departamento',
		                                            store: persona.store_ubigeo,
		                                            queryMode: 'local',
		                                            triggerAction: 'all',
		                                            valueField: 'cod_ubi',
		                                            displayField: 'Departamento',
		                                            emptyText: '[Seleccione]',
		                                            labelAlign:'right',
		                                            //allowBlank: false,
		                                            labelAlign:'top',
						                            width:'92%',
						                            flex:1,
						                            height:40,
						                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
						                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
		                                            anchor:'100%',
		                                            padding:'5px 5px 5px 10px',
		                                            //readOnly: true,
		                                            listeners:{
		                                                afterrender:function(obj, e){
		                                        			Ext.getCmp(persona.id+'-sol-cmb-provincia').getStore().removeAll();
		                                        			Ext.getCmp(persona.id+'-sol-cmb-Distrito').getStore().removeAll();
		                                                	persona.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,'100101');
		                                                    // obj.getStore().load();
		                                                    //Ext.getCmp(persona.id+'-txt-estado-filter').setValue('U');
		                                                },
		                                                select:function(obj, records, eOpts){
		                                        			var pro = Ext.getCmp(persona.id+'-sol-cmb-provincia');
		                                        			Ext.getCmp(persona.id+'-sol-cmb-provincia').setValue('');
		                                        			Ext.getCmp(persona.id+'-sol-cmb-Distrito').getStore().removeAll();
		                                        			Ext.getCmp(persona.id+'-sol-cmb-Distrito').setValue('');
		                                                	persona.getUbigeo({VP_OP:'P',VP_VALUE:obj.getValue()},pro,'');
		                                                }
		                                            }
		                                        },
		                                        {
		                                            xtype:'combo',
		                                            fieldLabel: 'Provincia',
		                                            id:persona.id+'-sol-cmb-provincia',
		                                            store: persona.store_ubigeo2,
		                                            queryMode: 'local',
		                                            triggerAction: 'all',
		                                            valueField: 'cod_ubi',
		                                            displayField: 'Provincia',
		                                            emptyText: '[Seleccione]',
		                                            labelAlign:'right',
		                                            //allowBlank: false,
		                                            labelAlign:'top',
						                            width:'92%',
						                            flex:1,
						                            height:40,
						                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
						                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
		                                            anchor:'100%',
		                                            padding:'5px 5px 5px 10px',
		                                            //readOnly: true,
		                                            listeners:{
		                                                afterrender:function(obj, e){
		                                        			Ext.getCmp(persona.id+'-sol-cmb-Distrito').getStore().removeAll();
		                                                	persona.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},obj,'100601');
		                                                },
		                                                select:function(obj, records, eOpts){
		                                        			var dis=Ext.getCmp(persona.id+'-sol-cmb-Distrito');
		                                                	persona.getUbigeo({VP_OP:'X',VP_VALUE:obj.getValue()},dis,'');
		                                                }
		                                            }
		                                        },
		                                        {
		                                            xtype:'combo',
		                                            fieldLabel: 'Distrito',
		                                            id:persona.id+'-sol-cmb-Distrito',
		                                            store: persona.store_ubigeo3,
		                                            queryMode: 'local',
		                                            triggerAction: 'all',
		                                            valueField: 'cod_ubi',
		                                            displayField: 'Distrito',
		                                            emptyText: '[Seleccione]',
		                                            labelAlign:'right',
		                                            //allowBlank: false,
		                                            labelAlign:'top',
						                            width:'92%',
						                            flex:1,
						                            height:40,
						                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
						                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
		                                            anchor:'100%',
		                                            padding:'5px 5px 5px 10px',
		                                            //readOnly: true,
		                                            listeners:{
		                                                afterrender:function(obj, e){
		                                                	persona.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
		                                                    // obj.getStore().load();
		                                                    //Ext.getCmp(persona.id+'-txt-estado-filter').setValue('U');
		                                                },
		                                                select:function(obj, records, eOpts){
		                                        
		                                                }
		                                            }
		                                        },
		                                        {
							                        layout:'hbox',
							                        bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													height:70,
													border:false,
													items:[
								                        {
									                        xtype:'button',
									                        margin:'20px 5px 5px 5px',
									                        height:30,
									                        //text: 'Grabar',
									                        icon: '/images/icon/save.png',
									                        listeners:{
									                            beforerender: function(obj, opts){
																},
									                            click: function(obj, e){
									                            	//persona.setSavepersona(op);
									                            }
									                        }
									                    },
									                    {
									                        xtype:'button',
									                        height:30,
									                        margin:'20px 5px 5px 5px',
									                        //text: 'Grabar',
									                        icon: '/images/icon/Document.png',
									                        listeners:{
									                            beforerender: function(obj, opts){
																},
									                            click: function(obj, e){
									                            	//persona.setSavepersona(op);
									                            }
									                        }
									                    },
									                    {
									                        xtype:'button',
									                        height:30,
									                        margin:'20px 5px 5px 5px',
									                        //text: 'Grabar',
									                        icon: '/images/icon/Trash.png',
									                        listeners:{
									                            beforerender: function(obj, opts){
																},
									                            click: function(obj, e){
									                            	//persona.setSavepersona(op);
									                            }
									                        }
									                    }
								                    ]
								                }
											]
										},
										{
											xtype:'panel',
											title:'Registrados',
											border:false,
											layout:'fit',
											items:[
												{
							                        xtype: 'dataview',
							                        id: persona.id+'-list-direcciones',
							                        bodyStyle: 'background: transparent',
							                        bodyCls: 'transparent',
							                        layout:'fit',
							                        store: store_telefonos,
							                        autoScroll: true,
							                        loadMask:true,
							                        autoHeight: false,
							                        tpl: imageTplPointer,
							                        multiSelect: false,
							                        singleSelect: false,
							                        loadingText:'Cargando Lista de Direcciones...',
							                        emptyText: '<div class="list_grid_as__list_menu"><div class="list_grid_as__none_data" ></div><div class="list_grid_as__title_clear_data">NO TIENE NINGUNA DIRECCIÓN</div></div>',
							                        itemSelector: 'div.list_grid_as__list_menu_select',
							                        trackOver: true,
							                        overItemCls: 'list_grid_as__list_menu-hover',
							                        listeners: {
							                            'itemdblclick': function(view, record, item, idx, event, opts) {
							                                me.idx=idx;
							                                var record = this.getStore().getAt(idx);
							                                var val =record.data;
							                                var menu_class = val.menu_class == null || val.menu_class == '' ? '' : val.menu_class;
							                                if(val.nivel!=0){
							                                    if(me.config_.mode==1){
							                                        win.show({vurl: val.url, id_menu: idx, class: menu_class});//obj.getItemId().split('-')[1]  
							                                    }else{
							                                        var tab=Ext.getCmp(me.config_.tab);
							                                        var active=Ext.getCmp(me.config_.id+val.url);
							                                        tab.setActiveTab(active);
							                                    }
							                                }
							                                
							                            }
							                        }
							                    }
											]
										}
									]
								},
								{
									xtype:'panel',
									title:'Agencia',
									bodyStyle: 'background: transparent',
									border:false,
									layout:'border',
									items:[
										{
											region:'north',
											height:70,
											bodyStyle: 'background: transparent',
											padding:'5px 5px 5px 5px',
											border:false,
											//layout:'fit',
											items:[
												{
						                            xtype: 'textfield',	
						                            fieldLabel: 'IDTEL',
						                            id:persona.id+'-sol-txt-id-age',
						                            hidden:true,
						                            bodyStyle: 'background: transparent',
								                    //padding:'15px 5px 5px 25px',
						                            //id:persona.id+'-txt-dni',
						                            labelWidth:50,
						                            //readOnly:true,
						                            labelAlign:'top',
						                            //width:120,
						                            //height:60,
						                            labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
						                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
						                            value:'0',
						                            //anchor:'100%',
						                            listeners:{
						                                afterrender:function(obj, e){
						                                }
						                            }
						                        },
						                        {
							                        layout:'hbox',
							                        bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													height:70,
													border:false,
													items:[
								                        {
								                            xtype:'combo',
								                            fieldLabel: 'Agencia',
								                            bodyStyle: 'background: transparent',
										                    padding:'0px 5px 5px 5px',
								                            id:persona.id+'-sol-cmb-agencia',
								                            store: persona.store_tipo_tel,
								                            queryMode: 'local',
								                            triggerAction: 'all',
								                            valueField: 'code',
								                            displayField: 'name',
								                            emptyText: '[Seleccione]',
								                            labelAlign:'right',
								                            //allowBlank: false,
								                            labelAlign:'top',
								                            labelWidth: 50,
								                            height:50,
								                            //width:150,
								                            flex:1,
								                            anchor:'100%',
								                            //readOnly: true,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                    // obj.getStore().load();
								                                    //obj.setValue('CE');
								                                },
								                                select:function(obj, records, eOpts){
								                        
								                                }
								                            }
								                        },
								                        {
									                        xtype:'button',
									                        margin:'20px 5px 5px 5px',
									                        height:30,
									                        //text: 'Grabar',
									                        icon: '/images/icon/save.png',
									                        listeners:{
									                            beforerender: function(obj, opts){
																},
									                            click: function(obj, e){
									                            	//persona.setSavepersona(op);
									                            }
									                        }
									                    },
									                    {
									                        xtype:'button',
									                        height:30,
									                        margin:'20px 5px 5px 5px',
									                        //text: 'Grabar',
									                        icon: '/images/icon/Document.png',
									                        listeners:{
									                            beforerender: function(obj, opts){
																},
									                            click: function(obj, e){
									                            	//persona.setSavepersona(op);
									                            }
									                        }
									                    },
									                    {
									                        xtype:'button',
									                        height:30,
									                        margin:'20px 5px 5px 5px',
									                        //text: 'Grabar',
									                        icon: '/images/icon/Trash.png',
									                        listeners:{
									                            beforerender: function(obj, opts){
																},
									                            click: function(obj, e){
									                            	//persona.setSavepersona(op);
									                            }
									                        }
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
							                        xtype: 'dataview',
							                        id: persona.id+'-list-agencias',
							                        bodyStyle: 'background: transparent',
							                        bodyCls: 'transparent',
							                        layout:'fit',
							                        store: store_telefonos,
							                        autoScroll: true,
							                        loadMask:true,
							                        autoHeight: false,
							                        tpl: imageTplPointer,
							                        multiSelect: false,
							                        singleSelect: false,
							                        loadingText:'Cargando Lista de Agencias...',
							                        emptyText: '<div class="list_grid_as__list_menu"><div class="list_grid_as__none_data" ></div><div class="list_grid_as__title_clear_data">NO TIENE NINGUNA AGENCIA RELACIONADA</div></div>',
							                        itemSelector: 'div.list_grid_as__list_menu_select',
							                        trackOver: true,
							                        overItemCls: 'list_grid_as__list_menu-hover',
							                        listeners: {
							                            'itemdblclick': function(view, record, item, idx, event, opts) {
							                                me.idx=idx;
							                                var record = this.getStore().getAt(idx);
							                                var val =record.data;
							                                var menu_class = val.menu_class == null || val.menu_class == '' ? '' : val.menu_class;
							                                if(val.nivel!=0){
							                                    if(me.config_.mode==1){
							                                        win.show({vurl: val.url, id_menu: idx, class: menu_class});//obj.getItemId().split('-')[1]  
							                                    }else{
							                                        var tab=Ext.getCmp(me.config_.tab);
							                                        var active=Ext.getCmp(me.config_.id+val.url);
							                                        tab.setActiveTab(active);
							                                    }
							                                }
							                                
							                            }
							                        }
							                    }
											]
										}
									]
								}
		                    ]
		                }
	                ],/*
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
	                            	persona.setSavepersona(op);
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
	                                Ext.getCmp(persona.id+'-win-form').close();
	                            }
	                        }
	                    },
	                    '-'
	                ],*/
	                listeners:{
	                    'afterrender':function(obj, e){ 

	                    },
	                    'close':function(){

	                    }
	                }
	            }).show().center();
			},
			setSavePersona:function(){
				
				var vp_sol_id_cli = Ext.getCmp(persona.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(persona.id+'-sol-txt-id-per').getValue();
				var op = vp_sol_id_cli!=0?'U':'I';
				var sol_ape_pat = Ext.getCmp(persona.id+'-sol-txt-apellido-paterno').getValue();
				var sol_ape_mat = Ext.getCmp(persona.id+'-sol-txt-apellido-materno').getValue();
				var sol_nombres = Ext.getCmp(persona.id+'-sol-txt-nombres').getValue();
				var sol_sexo = Ext.getCmp(persona.id+'-sol-cmb-sexo').getValue();
				var sol_doc_dni = Ext.getCmp(persona.id+'-sol-txt-doc-dni').getValue();
				var sol_doc_ce = Ext.getCmp(persona.id+'-sol-txt-doc-ce').getValue();
				var sol_doc_cip = Ext.getCmp(persona.id+'-sol-txt-doc-cip').getValue();
				var sol_doc_ruc = Ext.getCmp(persona.id+'-sol-txt-doc-ruc').getValue();
				var sol_doc_cm = Ext.getCmp(persona.id+'-sol-txt-doc-cm').getValue();
				var sol_estado_civil = Ext.getCmp(persona.id+'-sol-cmb-estado-civil').getValue();
				var sol_fecha_nac = Ext.getCmp(persona.id+'-sol-date-fecha-nac').getRawValue();

				var sol_domi_propio = Ext.getCmp(persona.id+'-sol-chk-domi-propio').getValue();
				sol_domi_propio = sol_domi_propio?'S':'N';
				var sol_domi_pagando = Ext.getCmp(persona.id+'-sol-chk-domi-pagando').getValue();
				sol_domi_pagando = sol_domi_pagando?'S':'N';
				var sol_domi_alquilado = Ext.getCmp(persona.id+'-sol-chk-domi-alquilado').getValue();
				sol_domi_alquilado = sol_domi_alquilado?'S':'N';
				var sol_domi_familiar = Ext.getCmp(persona.id+'-sol-chk-domi-familiar').getValue();
				sol_domi_familiar = sol_domi_familiar?'S':'N';

				var vp_sol_id_tel = Ext.getCmp(persona.id+'-sol-txt-id-tel').getValue();
				var vp_sol_id_dir = Ext.getCmp(persona.id+'-sol-txt-id-dir').getValue();

				global.Msg({
                    msg: '¿Seguro de guardar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(persona.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:persona.url+'setSavePersona/',
			                    params:{
			                    	vp_op:op,
			                    	vp_sol_id_cli:vp_sol_id_cli,
									vp_sol_id_per:vp_sol_id_per,
									vp_sol_ape_pat:sol_ape_pat,
									vp_sol_ape_mat:sol_ape_mat,
									vp_sol_nombres:sol_nombres,
									vp_sol_sexo:sol_sexo,
									vp_sol_doc_dni:sol_doc_dni,
									vp_sol_doc_ce:sol_doc_ce,
									vp_sol_doc_cip:sol_doc_cip,
									vp_sol_doc_ruc:sol_doc_ruc,
									vp_sol_doc_cm:sol_doc_cm,
									vp_sol_estado_civil:sol_estado_civil,
									vp_sol_fecha_nac:sol_fecha_nac,
									vp_sol_domi_propio:sol_domi_propio,
									vp_sol_domi_pagando:sol_domi_pagando,
									vp_sol_domi_alquilado:sol_domi_alquilado,
									vp_sol_domi_familiar:sol_domi_familiar,
									vp_id_tel:vp_sol_id_tel,
									vp_id_dir:vp_sol_id_dir,

									vp_sol_img:'',
									vp_flag:'A'
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(persona.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//persona.getHistory();
			                                	Ext.getCmp(persona.id+'-sol-txt-id-cli').setValue(res.CODIGO);
			                                	Ext.getCmp(persona.id+'-sol-txt-id-per').setValue(res.ID_PER);
			                                	//callback
			                                }
			                            });
			                        }else{
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
			setSavePersonaIMG:function(){
				var vp_sol_id_cli = Ext.getCmp(persona.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(persona.id+'-sol-txt-id-per').getValue();



			},
			setSaveTelefono:function(){
				var vp_sol_id_cli = Ext.getCmp(persona.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(persona.id+'-sol-txt-id-per').getValue();
				var vp_sol_id_tel = Ext.getCmp(persona.id+'-sol-txt-id-tel').getValue();

				var vp_sol_tipo_tel = Ext.getCmp(persona.id+'-sol-cmb-tipo-tel').getValue();
				var vp_sol_line_tel = Ext.getCmp(persona.id+'-sol-cmb-line-tel').getValue();


				var op = vp_sol_id_tel!=0?'U':'I';
				var sol_tel_cel = Ext.getCmp(persona.id+'-sol-txt-tel-cel').getValue();

				global.Msg({
                    msg: '¿Seguro de guardar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(persona.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:persona.url+'setSavePhone/',
			                    params:{
			                    	vp_op:op,
			                    	vp_sol_id_per:vp_sol_id_per,
									vp_sol_id_tel:vp_sol_id_tel,
									vp_sol_tel_cel:sol_tel_cel,
									vp_sol_tipo_tel:vp_sol_tipo_tel,
									vp_sol_line_tel:vp_sol_line_tel,
									vp_flag:'A'
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(persona.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//persona.getHistory();
			                                	Ext.getCmp(persona.id+'-sol-txt-id-tel').setValue(res.CODIGO);
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
			setSaveDireccion:function(){
				var vp_sol_id_cli = Ext.getCmp(persona.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(persona.id+'-sol-txt-id-per').getValue();
				var vp_sol_id_dir = Ext.getCmp(persona.id+'-sol-txt-id-dir').getValue();
				var sol_dir_direccion = Ext.getCmp(persona.id+'-sol-txt-dir-direccion').getValue();
				var sol_dir_numero = Ext.getCmp(persona.id+'-sol-txt-dir-numero').getValue();
				var sol_dir_mz = Ext.getCmp(persona.id+'-sol-txt-dir-mz').getValue();
				var sol_dir_lt = Ext.getCmp(persona.id+'-sol-txt-dir-lt').getValue();
				var sol_dir_dpto = Ext.getCmp(persona.id+'-sol-txt-dir-dpto').getValue();
				var sol_dir_interior = Ext.getCmp(persona.id+'-sol-txt-dir-interior').getValue();
				var sol_dir_urb = Ext.getCmp(persona.id+'-sol-txt-dir-urb').getValue();
				var sol_dir_referencia = Ext.getCmp(persona.id+'-sol-txt-dir-referencia').getValue();
				var sol_departamento = Ext.getCmp(persona.id+'-sol-cmb-departamento').getValue();
				var sol_provincia = Ext.getCmp(persona.id+'-sol-cmb-provincia').getValue();
				var sol_distrito = Ext.getCmp(persona.id+'-sol-cmb-Distrito').getValue();

				global.Msg({
                    msg: '¿Seguro de guardar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(persona.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:persona.url+'setSaveInfoCredito/',
			                    params:{
			                    	vp_op:op,
			                    	vp_sol_id_cli:vp_sol_id_cli,
			                    	vp_sol_id_per:vp_sol_id_per,
									vp_sol_id_dir:vp_sol_id_dir,
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
									vp_flag:'A'
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(persona.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//persona.getHistory();
			                                	Ext.getCmp(persona.id+'-win-form').close();
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
	                	//Ext.getCmp(persona.id+'-form').el.unmask();
	                	obj.setValue(value);
	                }
	            });
			},
			setBack:function(){
				var tab=Ext.getCmp(persona.id+'-tabContent');
				var active=Ext.getCmp(persona.id+persona.back);
				tab.setActiveTab(active);
			},
			getpersona:function(){
				var vp_op=Ext.getCmp(persona.id+'-txt-estado-filter').getValue();
            	var vp_nombre=Ext.getCmp(persona.id+'-txt-persona').getValue();
		            Ext.getCmp(persona.id+'-menu-view').getStore().removeAll();
				Ext.getCmp(persona.id+'-menu-view').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:vp_nombre},
	                callback:function(){
	                	//Ext.getCmp(persona.id+'-form').el.unmask();
	                }
	            });
			},
			getClientes:function(vp_id){
				var vp_op=Ext.getCmp(persona.id+'-txt-estado-filter').getValue();
            	var vp_nombre=Ext.getCmp(persona.id+'-txt-persona').getValue();
		        Ext.getCmp(persona.id+'-list-clientes').getStore().removeAll();
				Ext.getCmp(persona.id+'-list-clientes').getStore().load(
	                {params: {vp_op:vp_op,vp_id:vp_id},
	                callback:function(){
	                	//Ext.getCmp(persona.id+'-form').el.unmask();
	                }
	            });
			},
			getEdit:function(index){
				var rec = Ext.getCmp(persona.id + '-grid-persona').getStore().getAt(index);
				persona.setForm('U',rec.data);
			},
			getNew:function(){
				persona.setForm('I',{id_persona:0,usr_codigo:'',usr_nombre:'',usr_perfil:1,usr_estado:1});
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
			setSavepersona:function(op){

		    	var codigo = Ext.getCmp(persona.id+'-txt-codigo').getValue();
		    	var usuario = Ext.getCmp(persona.id+'-txt-usuario-persona').getValue();
		    	var clave = Ext.getCmp(persona.id+'-txt-clave').getValue();
		    	var nombre = Ext.getCmp(persona.id+'-txt-nombre-persona').getValue();
		    	var perfil = Ext.getCmp(persona.id+'-cmb-perfil').getValue();
		    	var estado = Ext.getCmp(persona.id+'-cmb-estado-persona').getValue();

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
                    		Ext.getCmp(persona.id+'-tab').el.mask('Elinando Páginas…', 'x-mask-loading');
	                        scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:control.url+'set_save/',
			                    params:{
			                    	vp_op:op,
			                    	vp_id_persona:codigo,
			                    	vp_usr_codigo:usuario,
			                    	vp_usr_passwd:clave,
			                    	vp_usr_nombre:nombre,
			                    	vp_usr_perfil:perfil,
			                    	vp_usr_estado:estado
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                        Ext.getCmp(persona.id+'-tab').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	persona.getHistory();
			                                	Ext.getCmp(persona.id+'-win-form').close();
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
		    	var vp_op = Ext.getCmp(persona.id+'-txt-estado-filter').getValue();
				var nombre = Ext.getCmp(persona.id+'-txt-persona').getValue();

		    	Ext.getCmp(persona.id + '-grid-persona').getStore().removeAll();
				Ext.getCmp(persona.id + '-grid-persona').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:nombre},
	                callback:function(){
	                	//Ext.getCmp(persona.id+'-form').el.unmask();
	                }
	            });
	            
		    },
			getImagen:function(param){
				win.getGalery({container:'GaleryFull',width:390,height:250,params:{forma:'F',img_path:'/images/icon/'+param}});///persona/
			},
			getContratos:function(shi_codigo){
				Ext.getCmp(persona.id+'-cbx-contrato').getStore().removeAll();
				Ext.getCmp(persona.id+'-cbx-contrato').getStore().load(
	                {params: {vp_shi_codigo:shi_codigo},
	                callback:function(){
	                	//Ext.getCmp(persona.id+'-form').el.unmask();
	                }
	            });
			}
		}
		Ext.onReady(persona.init,persona);
	}else{
		tab.setActiveTab(persona.id+'-tab');
	}
</script>