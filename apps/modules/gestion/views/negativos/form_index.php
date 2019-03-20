<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('negativos-tab')){
		var negativos = {
			id:'negativos',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/negativos/',
			url_ct:'/gestion/centroTrabajo/',
			url_per:'/gestion/persona/',
			opcion:'I',
			id_per:'<?php echo $p["id_per"];?>',
			id_id:'<?php echo $p["id_id"];?>',
			idx:-1,
			paramsStore:{},
			init:function(){
				Ext.tip.QuickTipManager.init();

				var store_negativos = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'id_negativos', type: 'string'},
	                    {name: 'nro_solicitud', type: 'string'},
	                    {name: 'id_age', type: 'string'},
	                    {name: 'id_per', type: 'string'},                    
	                    {name: 'id_garante', type: 'string'},
	                    {name: 'id_asesor', type: 'string'},
	                    {name: 'moneda', type: 'string'},
	                    {name: 'monto_solicitado', type: 'string'},
	                    {name: 'tipo_cliente', type: 'string'},
	                    {name: 'excepcion', type: 'string'},
	                    {name: 'nro_cuotas', type: 'string'},

	                    {name: 'interes', type: 'string'},
	                    {name: 'mora', type: 'string'},
	                    {name: 'fecha_1ra_letra', type: 'string'},
	                    {name: 'monto_aprobado', type: 'string'},
	                    {name: 'tot_pagado', type: 'string'},
	                    {name: 'tot_interes', type: 'string'},
	                    {name: 'tot_mora', type: 'string'},
	                    {name: 'tot_saldo', type: 'string'},
	                    {name: 'id_motivo', type: 'string'},
	                    {name: 'estado', type: 'string'},
	                    {name: 'fecha_sol', type: 'string'},
	                    {name: 'nota', type: 'string'},

	                    {name: 'fecha_mod', type: 'string'},
	                    {name: 'enviado', type: 'string'},
	                    {name: 'flag', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: negativos.url+'get_list_client_negativos/',
	                    reader:{
	                        type: 'json',
	                        rootProperty: 'data'
	                    }
	                },
	                listeners:{
	                    load: function(obj, records, successful, opts){
	                    	try{
		                        if(negativos.idx!=-1){
									var grid=Ext.getCmp(negativos.id+'-list-solicitudes');
									grid.getSelectionModel().select(negativos.idx);
								}
							}catch(a){

							}
	                    }
	                }
	            });

	            var store_negativos_detalle = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'id_det_credito', type: 'string'},
	                    {name: 'id_credito', type: 'string'},
	                    {name: 'nro_cuota', type: 'string'},
	                    {name: 'fecha_cuota', type: 'string'},                    
	                    {name: 'DIA', type: 'string'},
	                    {name: 'MES', type: 'string'},
	                    {name: 'ANO', type: 'string'},
	                    {name: 'valor_cuota', type: 'string'},
	                    {name: 'pagado', type: 'string'},
	                    {name: 'fecha_pago', type: 'string'},
	                    {name: 'PDIA', type: 'string'},

	                    {name: 'PMES', type: 'string'},
	                    {name: 'PANO', type: 'string'},
	                    {name: 'mora', type: 'string'},
	                    {name: 'dias', type: 'string'},
	                    {name: 'saldo_cuota', type: 'string'},
	                    {name: 'vence', type: 'string'},
	                    {name: 'estado', type: 'string'},
	                    {name: 'flag', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: negativos.url+'get_list_negativos_detalle/',
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
				
				var store_shipper = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'shi_codigo', type: 'string'},
	                    {name: 'shi_nombre', type: 'string'},
	                    {name: 'shi_logo', type: 'string'},
	                    {name: 'fec_ingreso', type: 'string'},                    
	                    {name: 'shi_estado', type: 'string'},
	                    {name: 'id_negativos', type: 'string'},
	                    {name: 'fecha_actual', type: 'string'}
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: negativos.url+'get_list_shipper/',
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
	                    url: negativos.url+'get_list_contratos/',
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
	                    url: negativos.url+'get_ocr_plantillas/',
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
	                    url: negativos.url+'get_ocr_trazos/',
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

			    var myDataEstadoSol = [
					['S','Solicitado'],
					['A','Aprobado'],
				    ['X','Anulado'],
				    ['F','Cancelado']
				];
				var store_estado_sol = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'search',
			        autoLoad: true,
			        data: myDataEstadoSol,
			        fields: ['code', 'name']
			    });

			    var myDataFuente = [
					['W','Web'],
					['M','Móvil']
				];
				var store_fuente = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'search',
			        autoLoad: true,
			        data: myDataFuente,
			        fields: ['code', 'name']
			    });

			    var myDataEstadoCivil = [
					['S','Soltero'],
				    ['C','Casado'],
				    ['V','Viudo']
				];
				negativos.store_estado_civil = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: true,
			        data: myDataEstadoCivil,
			        fields: ['code', 'name']
			    });

			    var myDataTipoTel = [
					['CE','Celular'],
				    ['FI','Fijo']
				];
				negativos.store_tipo_tel = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'tel',
			        autoLoad: true,
			        data: myDataTipoTel,
			        fields: ['code', 'name']
			    });

			    var myDataLineaTel = [
					['CL','Claro'],
				    ['MO','Movistar'],
				    ['EN','Entel'],
				    ['BI','Bitel'],
				    ['FI','Fijo'],
				    ['OT','Otros']
				];
				negativos.store_linea_tel = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'tel',
			        autoLoad: true,
			        data: myDataLineaTel,
			        fields: ['code', 'name']
			    });

			    negativos.store_ubigeo = Ext.create('Ext.data.Store',{
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
	                    url: negativos.url+'get_list_ubigeo/',
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

	            negativos.store_ubigeo2 = Ext.create('Ext.data.Store',{
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
	                    url: negativos.url+'get_list_ubigeo/',
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

	            negativos.store_ubigeo3 = Ext.create('Ext.data.Store',{
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
	                    url: negativos.url+'get_list_ubigeo/',
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

			    var myDatanegativos = [
					[1,'Activo'], 
				    [0,'Inactivo']
				];
				var store_estado_negativos = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'perfil',
			        autoLoad: true,
			        data: myDatanegativos,
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

		        var imageTplTelefonos = new Ext.XTemplate(
		            '<tpl for=".">',
		                '<div class="list_grid_as__list_menu_select" >',
		                    '<div class="list_grid_as__list_menu" >',
		                        '<div class="list_grid_as__menu_bx" >',
		                            '<div class="">',
		                                '<img src="/images/icon/{icono}" />',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:80px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>Número:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{numero}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:60px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>Tipo:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{tnombre}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:70px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>Operador:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{toperador}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                    '</div>',
		                '</div>',
		            '</tpl>'
		        );
		        var imageTplPointerDirecciones = new Ext.XTemplate(
		            '<tpl for=".">',
		                '<div class="list_grid_as__list_menu_select" >',
		                    '<div class="list_grid_as__list_menu" >',
		                        '<div class="list_grid_as__menu_bx" >',
		                            '<div class="">',
		                                '<img src="/images/icon/{icono}" />',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:300px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                	'<span>Dirección:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title" >',
		                                    '<span style="font-size:10px;">{dir_direccion} N°:{dir_numero} Mz:{dir_mz} Lt:{dir_lt} Dpto:{dir_dpto} Int:{dir_interior}</span>',
		                                    '<span style="font-size:10px;">Urb:{dir_urb} Ref:{dir_referencia} </span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        /*'<div class="list_grid_as__menu_line" style="width:10px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                
		                                '<div class="list_grid_as__menu_title">',
		                                    '<img src="/images/icon/Trash.png" onClick="negativos.setDeleteDir({id_dir});"/>',
		                                '</div>',
		                            '</div>',
		                        '</div>',*/
		                    '</div>',
		                '</div>',
		            '</tpl>'
		        );
		        var imageTplPointerConyugue = new Ext.XTemplate(
		            '<tpl for=".">',
		                '<div class="list_grid_as__list_menu_select" >',
		                    '<div class="list_grid_as__list_menu" >',
		                        '<div class="list_grid_as__menu_bx" >',
		                            '<div class="" >',
		                                '<img src="/images/menu/default_user.png"  />',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:200px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>Nombres:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{nombres}, {ape_pat} {ape_mat}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:70px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>DNI:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{doc_dni}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:100px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>Teléfonos:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{numero}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:350px; display: inline-flex;margin-top: 20px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>Dirección:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title" >',
		                                    '<span style="font-size:10px;">{dir_direccion} N°:{dir_numero} Mz:{dir_mz} Lt:{dir_lt} Dpto:{dir_dpto} Int:{dir_interior}</span>',
		                                    '<span style="font-size:10px;">Urb:{dir_urb} Ref:{dir_referencia} </span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                    '</div>',
		                '</div>',
		            '</tpl>'
		        );
				var store_conyugue = Ext.create('Ext.data.Store',{
		            fields: [
		                {name: 'id_per', type: 'string'},
		                {name: 'nombres', type: 'string'},
		                {name: 'ape_pat', type: 'string'},
		                {name: 'ape_mat', type: 'string'},
		                {name: 'doc_dni', type: 'string'},
		                {name: 'numero', type: 'string'},

		                {name: 'id_dir', type: 'string'},
		                {name: 'dir_direccion', type: 'string'},
		                {name: 'dir_numero', type: 'string'},
		                {name: 'dir_mz', type: 'string'},
		                {name: 'dir_lt', type: 'string'},
		                {name: 'dir_dpto', type: 'string'},
		                {name: 'dir_interior', type: 'string'},
		                {name: 'dir_urb', type: 'string'},
		                {name: 'dir_referencia', type: 'string'},
		                {name: 'cod_ubi', type: 'string'},
		                {name: 'fecha', type: 'string'},
		                {name: 'clase', type: 'string'},
		                {name: 'flag', type: 'string'}
		            ],
		            autoLoad:false,
		            proxy:{
		                type: 'ajax',
		                url: negativos.url+'getListPersona/',
		                reader:{
		                    type: 'json',
		                    rootProperty: 'data'
		                }//,
		                //extraParams:config.params
		            },
		            listeners:{
		                load: function(obj, records, successful, opts){
		                    console.log(records);
		                    //document.getElementById("menu_spinner").innerHTML = "";
		                }
		            }
		        });
		        var store_garante = Ext.create('Ext.data.Store',{
		            fields: [
		                {name: 'id_per', type: 'string'},
		                {name: 'nombres', type: 'string'},
		                {name: 'ape_pat', type: 'string'},
		                {name: 'ape_mat', type: 'string'},
		                {name: 'doc_dni', type: 'string'},
		                {name: 'numero', type: 'string'},

		                {name: 'id_dir', type: 'string'},
		                {name: 'dir_direccion', type: 'string'},
		                {name: 'dir_numero', type: 'string'},
		                {name: 'dir_mz', type: 'string'},
		                {name: 'dir_lt', type: 'string'},
		                {name: 'dir_dpto', type: 'string'},
		                {name: 'dir_interior', type: 'string'},
		                {name: 'dir_urb', type: 'string'},
		                {name: 'dir_referencia', type: 'string'},
		                {name: 'cod_ubi', type: 'string'},
		                {name: 'fecha', type: 'string'},
		                {name: 'clase', type: 'string'},
		                {name: 'flag', type: 'string'}
		            ],
		            autoLoad:false,
		            proxy:{
		                type: 'ajax',
		                url: negativos.url+'getListPersona/',
		                reader:{
		                    type: 'json',
		                    rootProperty: 'data'
		                }//,
		                //extraParams:config.params
		            },
		            listeners:{
		                load: function(obj, records, successful, opts){
		                    console.log(records);
		                    //document.getElementById("menu_spinner").innerHTML = "";
		                }
		            }
		        });
		        
		        var imageTplPointerSolicitudes = new Ext.XTemplate(
		            '<tpl for=".">',
		                '<div class="list_grid_sol__list_menu_select" >',
		                    '<div class="list_grid_sol__list_menu" >',
		                        '<div class="list_grid_sol__menu_line" style="width:80px;">',
		                            '<div class="list_grid_sol__menu_bar">',
		                                '<div class="list_grid_sol__menu_title_A">',
		                                '<span>N°Solicitud:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:left;">',
		                                    '<span>{nro_solicitud}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_sol__menu_line" style="width:67px;">',
		                            '<div class="list_grid_sol__menu_bar">',
		                                '<div class="list_grid_sol__menu_title_A" style="text-align:right;">',
		                                '<span>Monto:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:right;">',
		                                    '<span>{monto_aprobado}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        /*'<div class="list_grid_sol__menu_line" style="display: inline-flex;width:170px;">',
		                            '<div class="list_grid_sol__menu_bar" style="width:170px;">',
		                                '<div class="list_grid_sol__menu_title_A" style="text-align:right;">',
		                                '<span>Monto:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:right;">',
		                                    '<span>{doc_dni}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',*/
		                    '</div>',
		                '</div>',
		            '</tpl>'
		        );
		        var imageTplPointerSolicitudesTotales = new Ext.XTemplate(
		            '<tpl for=".">',
		                '<div class="list_grid_sol__list_menu_select" >',
		                    '<div class="list_grid_sol__list_menu" >',
		                        '<div class="list_grid_sol__menu_line" style="width:180px;">',
		                            '<div class="list_grid_sol__menu_bar">',
		                                '<div class="list_grid_sol__menu_title_A" style="text-align:right;">',
		                                '<span style="text-align:right;">Total Solicitado:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:right;">',
		                                    '<span >{doc_dni}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                    '</div>',
		                '</div>',
		            '</tpl>'
		        );
		        var store_telefonos = Ext.create('Ext.data.Store',{
		            fields: [
		                {name: 'id_per', type: 'string'},
		                {name: 'id_tel', type: 'string'},
		                {name: 'numero', type: 'string'},
		                {name: 'tipo', type: 'string'},
		                {name: 'tnombre', type: 'string'},
		                {name: 'operador', type: 'string'},
		                {name: 'toperador', type: 'string'},
		                {name: 'fecha', type: 'string'},
		                {name: 'flag', type: 'string'}
		            ],
		            autoLoad:false, 
		            proxy:{
		                type: 'ajax',
		                url: negativos.url+'get_list_telefonos/',
		                reader:{
		                    type: 'json',
		                    rootProperty: 'data'
		                },
		                extraParams:{vp_op:'P',vp_id:0,vp_flag:'A'}
		            },
		            listeners:{
		                load: function(obj, records, successful, opts){
		                    console.log(records);
		                    //document.getElementById("menu_spinner").innerHTML = "";
		                }
		            }
		        });

		        var store_direcciones = Ext.create('Ext.data.Store',{
		            fields: [
		                {name: 'id_dir', type: 'string'},
		                {name: 'dir_direccion', type: 'string'},
		                {name: 'dir_numero', type: 'string'},
		                {name: 'dir_mz', type: 'string'},
		                {name: 'dir_lt', type: 'string'},
		                {name: 'dir_dpto', type: 'string'},
		                {name: 'dir_interior', type: 'string'},
		                {name: 'dir_urb', type: 'string'},
		                {name: 'dir_referencia', type: 'string'},
		                {name: 'cod_ubi', type: 'string'},
		                {name: 'flag', type: 'string'}
		            ],
		            autoLoad:false, 
		            proxy:{
		                type: 'ajax',
		                url: negativos.url+'getListDirecciones/',
		                reader:{
		                    type: 'json',
		                    rootProperty: 'data'
		                },
		                extraParams:{vp_op:'P',vp_id:0,vp_nombre:''}
		            },
		            listeners:{
		                load: function(obj, records, successful, opts){
		                    console.log(records);
		                    //document.getElementById("menu_spinner").innerHTML = "";
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
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: negativos.url+'get_list_agencias/',
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
	            

	            var store_asesores = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'id_asesor', type: 'int'},
	                    {name: 'id_per', type: 'int'},
	                    {name: 'id_per', type: 'int'},
	                    {name: 'id_age', type: 'int'},
	                    {name: 'nombre', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: negativos.url+'get_list_asesores/',
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

	            var store_motivos = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'id_mot', type: 'int'},
	                    {name: 'nombre', type: 'string'},
	                    {name: 'fecha', type: 'string'},
	                    {name: 'flag', type: 'string'}
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: negativos.url+'get_list_motivos/',
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

	            var store_documentos = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'id_doc', type: 'string'},
	                    {name: 'id_per', type: 'string'},
	                    {name: 'nombre', type: 'string'},
	                    {name: 'img', type: 'string'},
	                    {name: 'thumb', type: 'string'},
	                    {name: 'flag', type: 'string'},
	                    {name: 'fecha', type: 'string'},
	                    {name: 'id_user', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: negativos.url+'get_list_documentos/',
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
	            
	            var store_centro_trabajo = Ext.create('Ext.data.Store',{
		            fields: [
		            	{name: 'id_empresa', type: 'string'},
		                {name: 'nombre', type: 'string'},
		                {name: 'rubro', type: 'string'},
		                {name: 'telefono', type: 'string'},
		                {name: 'ruc', type: 'string'},
		                {name: 'img', type: 'string'},
		                {name: 'id_dir', type: 'string'},
		                {name: 'dir_direccion', type: 'string'},
		                {name: 'dir_numero', type: 'string'},
		                {name: 'dir_mz', type: 'string'},
		                {name: 'dir_lt', type: 'string'},
		                {name: 'dir_dpto', type: 'string'},
		                {name: 'dir_interior', type: 'string'},
		                {name: 'dir_urb', type: 'string'},
		                {name: 'dir_referencia', type: 'string'},
		                {name: 'cod_ubi', type: 'string'},
		                {name: 'flag', type: 'string'}
		            ],
		            autoLoad:false, 
		            proxy:{
		                type: 'ajax',
		                url: negativos.url_ct+'getListEmpresa/',
		                reader:{
		                    type: 'json',
		                    rootProperty: 'data'
		                },
		                extraParams:{vp_op:'P',vp_id:0,vp_nombre:''}
		            },
		            listeners:{
		                load: function(obj, records, successful, opts){
		                    console.log(records);
		                    //document.getElementById("menu_spinner").innerHTML = "";
		                }
		            }
		        });

				tab.add({
					id:negativos.id+'-win-form',
					border:false,
					autoScroll:true,
					closable:true,
					//layout:'border',

					xtype: 'tabpanel',
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
							border:false,bodyCls: 'transparent',
							id:negativos.id+'-border-one',
							layout:'border',
							items:[
								//{region:'west',bodyCls: 'transparent',width:'10%'},{region:'east',bodyCls: 'transparent',width:'10%'},
								{
									region:'center',
									border:false,
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
						                            logo: 'SC',
						                            title: 'LISTADO DE CRÉDITOS EN NEGATIVO',
						                            legend: 'Panel de Aprobación de Créditos',
						                            width:1300,
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
						                                            xtype:'combo',
						                                            fieldLabel: 'Agencia',
						                                            id:negativos.id+'-sol-cmb-agencia-filtro',
						                                            store: store_agencias,
						                                            queryMode: 'local',
						                                            triggerAction: 'all',
						                                            valueField: 'cod_age',
						                                            displayField: 'nombre',
						                                            emptyText: '[Seleccione]',
						                                            labelAlign:'right',
						                                            //allowBlank: false,
						                                            //labelAlign:'top',
										                            width:200,
										                            labelWidth:50,
										                            //flex:1,
										                            //height:40,
										                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
						                                            anchor:'100%',
						                                            
						                                            //readOnly: true,
						                                            listeners:{
						                                                afterrender:function(obj, e){
						                                                	//cierre.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
						                                                	obj.setValue(1);
						                                                },
						                                                select:function(obj, records, eOpts){
						                                        			//var obja = Ext.getCmp(cierre.id+'-sol-cmb-asesor');
				                        									//negativos.getReload(obja,{vp_cod_age:obj.getValue()});
						                                                }
						                                            }
						                                        },
						                                        {
										                            xtype: 'textfield',	
										                            fieldLabel: 'DNI',
										                            bodyStyle: 'background: transparent',
												                    padding:'0px 5px 0px 5px',
										                            id:negativos.id+'-txt-cliente',
										                            labelWidth:40,
										                            //readOnly:true,
										                            //labelAlign:'top',
										                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
										                            emptyText: 'ENTER',
										                            allowOnlyWhitespace: false,
										                            allowDecimals: false,
										                            allowExponential: false,
										                            //allowBlank: true,
										                            maxLength: 8,
										                            width:200,
										                            //flex:1,
										                            //height:40,
										                            //maxLength : 8,
																	enforceMaxLength : true,
																	maskRe:/[0-9]/,
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                	obj.focus();
										                                },
										                                specialkey: function(f,e){
                                                                            if(e.getKey() == e.ENTER){
                                                                                //panel_novedades.buscar_novedad();
                                                                                negativos.getSolicitudes();
                                                                            }
                                                                        }
										                            }
										                        },
						                                        {
							                                        width: 160,border:false,
							                                        layout:'hbox',
							                                        //hidden:true,
							                                        padding:'0px 2px 0px 10px',  
							                                    	bodyStyle: 'background: transparent',
							                                        items:[
							                                            {
																	        xtype: 'radiofield',
																	        id:negativos.id+'-rd-creado',
																	        name: 'radio1',
																	        value: 'radiovalue1',
																	        labelWidth:0,
																	        value:true,
																	        //fieldLabel: 'Radio buttons',
																	        boxLabel: 'Creado'
																	    }, 
																	    {
																	        xtype: 'radiofield',
																	        id:negativos.id+'-rd-solicitado',
																	        name: 'radio1',
																	        value: 'radiovalue2',
																	        fieldLabel: '',
																	        labelSeparator: '',
																	        labelWidth:0,
																	        hideEmptyLabel: false,
																	        boxLabel: 'Solicitado'
																	    }
							                                        ]
							                                    },
						                                        {
							                                        width: 180,border:false,
							                                        hidden:true,
							                                        //hidden:true,
							                                        padding:'0px 2px 0px 0px',  
							                                    	bodyStyle: 'background: transparent',
							                                        items:[
							                                            {
							                                                xtype:'datefield',
							                                                id:negativos.id+'-txt-fecha-desde',
							                                                fieldLabel:'Fecha desde',
							                                                labelWidth:80,
							                                                labelAlign:'right',
							                                                value:new Date(),
							                                                format: 'Y/m/d',
							                                                //readOnly:true,
							                                                labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            		fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
							                                                width: '100%',
							                                                anchor:'100%',
							                                                maxValue:new Date()
							                                            }
							                                        ]
							                                    },
							                                    {
							                                        width: 145,border:false,
							                                        hidden:true,
							                                        //hidden:true,
							                                        padding:'0px 2px 0px 0px',  
							                                    	bodyStyle: 'background: transparent',
							                                        items:[
							                                            {
							                                                xtype:'datefield',
							                                                id:negativos.id+'-txt-fecha-hasta',
							                                                fieldLabel:'Hasta',
							                                                labelWidth:50,
							                                                labelAlign:'right',
							                                                value:new Date(),
							                                                format: 'Y/m/d',
							                                                //readOnly:true,
							                                                labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            		fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
							                                                width: '100%',
							                                                anchor:'100%',
							                                                maxValue:new Date()
							                                            }
							                                        ]
							                                    },
						                                        {
						                                            width: 70,border:false,
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
						                               					            negativos.getSolicitudes();
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
											border:false,
											layout:'fit',
											items:[
												{
							                        xtype: 'grid',
							                        region:'center',
							                        id: negativos.id+'-grid-solicitudes', 
							                        store: Ext.create('Ext.data.Store',{
											            fields: [
											            	{name: 'id_negativos', type: 'string'},
										                    {name: 'nro_solicitud', type: 'string'},
										                    {name: 'id_age', type: 'string'},
										                    {name: 'id_per', type: 'string'},
										                    {name: 'nombre', type: 'string'},
										                    {name: 'id_garante', type: 'string'},
										                    {name: 'id_asesor', type: 'string'},
										                    {name: 'moneda', type: 'string'},
										                    {name: 'monto_solicitado', type: 'string'},
										                    {name: 'tipo_cliente', type: 'string'},
										                    {name: 'excepcion', type: 'string'},
										                    //{name: 'nro_cuotas', type: 'string'},

										                    {name: 'interes', type: 'string'},
										                    {name: 'mora', type: 'string'},
										                    {name: 'fecha_1ra_letra', type: 'string'},
										                    {name: 'monto_aprobado', type: 'string'},
										                    {name: 'tot_credito', type: 'string'},
										                    {name: 'tot_acumulado', type: 'string'},
										                    //{name: 'tot_pagado', type: 'string'},
										                    {name: 'tot_interes', type: 'string'},
										                    //{name: 'tot_mora', type: 'string'},
										                    //{name: 'tot_saldo', type: 'string'},
										                    {name: 'id_motivo', type: 'string'},
										                    {name: 'estado', type: 'string'},
										                    {name: 'fecha_sol', type: 'string'},
										                    {name: 'nota', type: 'string'},

										                    {name: 'nro_cuotas', type: 'string'},
										                    {name: 'valor_cuota', type: 'string'},
										                    {name: 'tot_mora', type: 'string'},
										                    {name: 'tot_saldo', type: 'string'},
										                    {name: 'dias', type: 'string'},
										                    {name: 'total', type: 'string'},
										                    {name: 'tot_pagado', type: 'string'},

										                    {name: 'fecha_mod', type: 'string'},
										                    {name: 'enviado', type: 'string'},
										                    {name: 'flag', type: 'string'}
											            ],
											            autoLoad:false,
											            proxy:{
											                type: 'ajax',
											                url: negativos.url+'getListSolicitudes/', 
											                reader:{
											                    type: 'json',
											                    rootProperty: 'data'
											                }/*,
											                extraParams:config.params*/
											            },
											            listeners:{
											                load: function(obj, records, successful, opts){
											                    console.log(records);
											                    //document.getElementById("menu_spinner").innerHTML = "";
											                }
											            }
											        }), 
							                        columnLines: true,
							                        //layout:'fit',
							                        columns:{
							                            items:[
							                            	{
							                            		text: 'N°',
															    xtype: 'rownumberer',
															    width: 30,
															    sortable: false,
															    locked: true//,
															    /*renderer: function (value, metaData, record, rowIdx, colIdx, store) {
							                                        //console.log(record);
							                                        return store.indexOf(record);
							                                    }*/
															},
															{
							                                    text: 'N° Solicitud',
							                                    dataIndex: 'nro_solicitud',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 80,
							                                    align: 'center',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
															{
							                                    text: 'Nombres',
							                                    dataIndex: 'nombre',
							                                    //loocked : true,
							                                    //width: 40,
							                                    flex:1,
							                                    align: 'left',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
							                                {
							                                    text: 'DNI',
							                                    dataIndex: 'doc_dni',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 80,
							                                    align: 'center',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
							                                {
							                                    text: 'Moneda',
							                                    dataIndex: 'moneda',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 80,
							                                    align: 'center',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
							                                {
							                                    text: 'Monto Solicitado',
							                                    dataIndex: 'monto_solicitado',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 100,
							                                    align: 'right',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
							                                {
							                                    text: 'Motivo',
							                                    dataIndex: 'nombre_motivo',
							                                    //loocked : true,
							                                    //width: 40,
							                                    flex:1,
							                                    //width: 80,
							                                    align: 'left',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
							                                {
							                                    text: 'Cuotas',
							                                    dataIndex: 'nro_cuotas',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 80,
							                                    align: 'center',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
							                                {
							                                    text: 'Monto Aprobado',
							                                    dataIndex: 'monto_aprobado',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 100,
							                                    align: 'right',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
							                                {
							                                    text: 'Total Crédito',
							                                    dataIndex: 'tot_credito',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 100,
							                                    align: 'right',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
							                                {
							                                    text: 'Valor Cuotas',
							                                    dataIndex: 'valor_cuota',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 100,
							                                    align: 'right',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
							                                {
							                                    text: 'Mora',
							                                    dataIndex: 'tot_mora',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 80,
							                                    align: 'center',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
							                                {
							                                    text: 'Total',
							                                    dataIndex: 'total',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 80,
							                                    align: 'center',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },/*
							                                {
							                                    text: 'Saldo',
							                                    dataIndex: 'tot_saldo',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 80,
							                                    align: 'center',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },*/
							                                {
							                                    text: 'Días de Atrazo',
							                                    dataIndex: 'dias',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 80,
							                                    align: 'center',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
							                                {
							                                    text: 'Pagado',
							                                    dataIndex: 'tot_pagado',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 80,
							                                    align: 'center',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
							                                {
							                                    text: 'Fecha Solicitado',
							                                    dataIndex: 'fecha_sol',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 90,
							                                    align: 'right',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
							                                {
							                                    text: 'Fecha Creado',
							                                    dataIndex: 'fecha_creado',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 80,
							                                    align: 'right',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },/*
							                                {
							                                    text: 'Usuario',
							                                    dataIndex: 'usuario',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 150,
							                                    align: 'right',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },
							                                {
							                                    text: 'Fuente',
							                                    dataIndex: 'fuente',
							                                    //loocked : true,
							                                    //width: 40,
							                                    //flex:1,
							                                    width: 80,
							                                    align: 'right',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        return value;
							                                    }
							                                },*/
															{
							                                    text: 'Estado',
							                                    dataIndex: 'estado',
							                                    //loocked : true,
							                                    width: 80,
							                                    //flex:1,
							                                    align: 'center',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        //console.log(record);
							                                        var dato ='SOLICITADO';
							                                        if(record.get('estado')=='A'){
							                                        	dato = 'APROBADO';
							                                        }
							                                        if(record.get('estado')=='X'){
							                                        	dato = 'ANULADO';
							                                        }

							                                        metaData.style = "padding: 0px; margin: 0px";
							                                        return dato;
							                                    }
							                                },
							                                {
							                                    text: 'EDT',
							                                    dataIndex: 'estado',
							                                    //loocked : true,
							                                    width: 60,
							                                    align: 'center',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        //console.log(record);
							                                        var estado = 'panasonic.png';
							                                        negativos.index=rowIndex;
							                                        var fun = "negativos.setDataSolicitudX("+rowIndex+")";
							                                        
							                                        metaData.style = "padding: 0px; margin: 0px";
							                                        return global.permisos({
							                                            type: 'link',
							                                            id_menu: negativos.id_menu,
							                                            icons:[
							                                                {id_serv: 6, img: estado, qtip: 'Ver.', js: fun}

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
							                            },
							                            select:function(obj, record, index, eOpts ){
							                            	//scanning.setImageFile(record.get('path'),record.get('file'));
							                            	//cobranza.getListSolicitudes(record.get('id_asesor'));
							                            	//var data = record.data;
							                            	//negativos.index=index;
							                            	//negativos.setDataSolicitud(negativos.index);
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
							border:false,
							id:negativos.id+'-border-two',
						    layout:'border',
							items:[
								{
									layout:'fit',
						            width: 200,
						            border:true,
						            region:'west',
						            items:[
						            	{
						            		layout:'border',
						            		items:[
						            			{
													region:'north',
													height:260,
													border:false,
													layout:'border',
													bodyStyle: 'background: transparent',
													items:[
														{
															region:'north',
															height:220,
															id: negativos.id + '-photo-center',
															border:false,
															layout:'fit',
															bodyStyle: 'background: transparent',
															items:[
																{
											                        //layout:'hbox',
											                        id: negativos.id + '-photo-person',
											                        bodyStyle: 'background: transparent',
																	padding:'5px 5px 5px 5px',
																	//height:70,
																	flex:1,
																	border:true,
																	padding:'5px 5px 5px 5px',
																	margin:'10px 10px 10px 10px',
																	html:'<div id="imagen-contenedor" ><img id="imagen-negativos" src="/images/photo.png" style="width:100%; height:"100%;overflow: scroll;" /></div>'
																}
															]
														},
														{
															region:'center',
															border:false,
															bodyStyle: 'background: transparent',
															items:[
																{
																	//region:'north',
																	xtype:'panel',
																	layout:'hbox',
																	border:false,
																	height:40,
																	//bodyStyle: 'background: #F0EFEF;text-align:center;',
																	bodyStyle: 'background: transparent;text-align:center;',
																	//layout:'fit',
																	items:[
																		{
																	        xtype: 'label',
																	        //forId: 'myFieldId',
																	        text: 'FOTO',
																	        style: 'font: normal 15px Sans-serif;font-weight: bold;',
																	        padding:'10px 5px 5px 5px',
																	        width:'100%',
												                            anchor:'100%'
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
															height:80,
															hidden:true,
															border:false,
															items:[
																{
																	layout:'vbox',
																	bodyStyle: 'background: transparent',
																	padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																		{
																			layout:'hbox',
																			border:false,
																			padding:'0px 5px 0px 5px',
																			items:[
																				{
														                            xtype: 'textfield',	
														                            fieldLabel: 'DNI',
														                            bodyStyle: 'background: transparent',
																                    padding:'10px 0px 5px 5px',
														                            id:negativos.id+'-txt-dni',
														                            labelWidth:40,
														                            //readOnly:true,
														                            labelAlign:'top',
														                            labelStyle: "font-size:15px;font-weight:bold;padding:12px 0px 0px 0px;",
														                            fieldStyle: 'font-size:17px; text-align: center;font-weight: bold ',
														                            emptyText: 'ENTER',
														                            allowOnlyWhitespace: false,
														                            allowDecimals: false,
														                            allowExponential: false,
														                            allowBlank: true,
														                            maxLength: 8,
														                            width:130,
														                            //flex:1,
														                            height:40,
														                            maxLength : 8,
																					enforceMaxLength : true,
																					maskRe:/[0-9]/,
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                	obj.focus();
														                                },
														                                specialkey: function(f,e){
				                                                                            if(e.getKey() == e.ENTER){
				                                                                                //panel_novedades.buscar_novedad();
				                                                                                negativos.getListaSolicitudes(f.getValue());
				                                                                            }
				                                                                        }
														                            }
														                        },
														                        {
																                    xtype: 'button',
																                    margin:'30px 5px 5px 5px',
																                    icon: '/images/icon/add_green_button.png',
																                    //glyph: 72,
																                    //columnWidth: 0.1,
																                    //flex:0.5,
																                    width:40,
																                    //text: 'Agregar',
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
															                            	//win.show({vurl: negativos.url_per, id_menu: negativos.id_menu, class: ''}); 
															                            	var dni=Ext.getCmp(negativos.id+'-txt-dni').getValue();
															                            	win.show({vurl: negativos.url_per+'?opcion=D&id_id='+0+'&id_per='+0+'&dni='+dni, id_menu: negativos.id_menu, class: ''});
															                            }
															                        }
																                }
																			]
																		},
												                        {
												                            xtype: 'textfield',	
												                            fieldLabel: 'N° SOLICITUD',
												                            bodyStyle: 'background: transparent',
														                    padding:'10px 5px 5px 5px',
												                            id:negativos.id+'-txt-nro-sol',
												                            labelWidth:40,
												                            hidden:true,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            labelStyle: "font-size:15px;font-weight:bold;padding:12px 0px 0px 0px;",
												                            fieldStyle: 'font-size:17px; text-align: center;font-weight: bold ',
												                            emptyText: 'ENTER',
												                            allowOnlyWhitespace: false,
												                            allowDecimals: false,
												                            allowExponential: false,
												                            allowBlank: true,
												                            maxLength: 8,
												                            width:180,
												                            height:40,
												                            maxLength : 8,
																			enforceMaxLength : true,
																			maskRe:/[0-9]/,
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                },
												                                specialkey: function(f,e){
		                                                                            if(e.getKey() == e.ENTER){
		                                                                                //panel_novedades.buscar_novedad();
		                                                                                negativos.getListaSolicitudes(f.getValue());
		                                                                            }
		                                                                        }
												                            }
												                        }
																	]
																}
															]
														},
														{
															region:'center',
															layout:'border',
															title:'Lista de Solicitudes',
															border:false,
															items:[
																/*GRID DE SOLICITUDES*/
																{
																	region:'center',
																	border:false,
																	autoScroll: true,
																	disabled:true,
																	items:[
																		{
													                        xtype: 'dataview',
													                        id: negativos.id+'-list-solicitudes',
													                        bodyStyle: 'background: transparent',
													                        bodyCls: 'transparent',
													                        layout:'fit',
													                        store: store_negativos,
													                        autoScroll: true,
													                        loadMask:true,
													                        autoHeight: false,
													                        tpl: imageTplPointerSolicitudes,
													                        multiSelect: false,
													                        singleSelect: false,
													                        loadingText:'Cargando Lista de Solicitudes...',
													                        emptyText: '<div class="list_grid_sol__list_menu"><div class="list_grid_sol__none_data" ></div><div class="list_grid_sol__title_clear_data">NO TIENE NINGUNA SOLICITUD</div></div>',
													                        itemSelector: 'div.list_grid_sol__list_menu_select',
													                        trackOver: true,
													                        overItemCls: 'list_grid_sol__list_menu-hover',
													                        listeners: {
													                            'itemclick': function(view, record, item, idx, event, opts) {
													                                /*me.idx=idx;
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
													                                }*/
													                                negativos.idx=idx;
													                                
																					//Ext.getCmp(negativos.id+'-select-conyugue').setValue(val.dni);
																					negativos.setDataSolicitud(idx);
													                                
													                            },
													                            afterrender:function(obj){
													                            	
													                            }
													                        }
													                    }
																	]
																},
																{
																	region:'south',
																	height:70,
																	border:false,
																	hidden:true,
																	items:[
																		{
													                        xtype: 'dataview',
													                        id: negativos.id+'-list-solicitudes-totales',
													                        bodyStyle: 'background: transparent',
													                        bodyCls: 'transparent',
													                        layout:'fit',
													                        store: store_conyugue,
													                        autoScroll: true,
													                        loadMask:true,
													                        autoHeight: false,
													                        tpl: imageTplPointerSolicitudesTotales,
													                        multiSelect: false,
													                        singleSelect: false,
													                        loadingText:'Cargando Lista de Solicitudes...',
													                        emptyText: '<div class="list_grid_sol__list_menu"><div class="list_grid_sol__none_data" ></div><div class="list_grid_sol__title_clear_data">NO TIENE NINGUNA SOLICITUD</div></div>',
													                        itemSelector: 'div.list_grid_sol__list_menu_select',
													                        trackOver: true,
													                        overItemCls: 'list_grid_sol__list_menu-hover',
													                        listeners: {
													                        	//'itemdblclick': function(view, record, item, idx, event, opts) {
													                            'itemclick': function(view, record, item, idx, event, opts) {
													                                /*me.idx=idx;
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
													                                }*/
													                                
													                                var record = this.getStore().getAt(idx);
													                                var val =record.data;
																					//Ext.getCmp(negativos.id+'-select-conyugue').setValue(val.dni);
													                                
													                            },
													                            afterrender:function(obj){
													                            	
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
						            	}
						            ]
						        },
						        {
						        	region:'center',
						        	layout:'border',
						        	border:false,
						        	items:[
						        		{
											layout:'border',
											title:'DATOS DEL SOLICITANTE',
						         			split:true,
						         			collapsible: true,
						         			header:false,
								            width: 520,
								            border:false,
								            region:'west',
								            items:[
								            	{
						         					layout:'border',
						         					region:'north',
						         					height:460,
						         					border:false,
						         					items:[
						         						{
					                						region:'north',
					                						height:40,
					                						//border:false,
					                						items:[
					                							{
																	//region:'north',
																	xtype:'panel',
																	layout:'hbox',
																	border:false,
																	height:40,
																	//bodyStyle: 'background: #F0EFEF;text-align:center;',
																	bodyStyle: 'background: transparent;text-align:center;',
																	//layout:'fit',
																	items:[
																		{
																	        xtype: 'label',
																	        //forId: 'myFieldId',
																	        text: 'DATOS DEL SOLICITANTE',
																	        style: 'font: normal 15px Sans-serif;font-weight: bold;',
																	        padding:'10px 5px 5px 5px',
																	        width:'100%',
												                            anchor:'100%'
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
									                				height:420,
									                				border:false,
									                				items:[
											                			{
																			xtype:'panel',
																			bodyStyle: 'background: transparent',
																			//title:'Registro',
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
																                            id:negativos.id+'-sol-txt-id-cli',
																                            hidden:true,
																                            bodyStyle: 'background: transparent',
																		                    padding:'15px 5px 5px 25px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:50,
																                            readOnly:true,
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
																                            id:negativos.id+'-sol-txt-id-per',
																                            hidden:true,
																                            bodyStyle: 'background: transparent',
																		                    padding:'15px 5px 5px 25px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:50,
																                            readOnly:true,
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
																                            id:negativos.id+'-sol-txt-apellido-paterno',
																                            fieldLabel: 'Apellido Paterno',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:50,
																                            readOnly:true,
																                            labelAlign:'top',
																                            width:'50%',
																                            height:40,
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
																                            xtype: 'textfield',	
																                            id:negativos.id+'-sol-txt-apellido-materno',
																                            fieldLabel: 'Apellido Materno',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:50,
																                            readOnly:true,
																                            labelAlign:'top',
																                            width:'50%',
																                            height:40,
																                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:13px; text-align: center; font-weight: bold',
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
																                            id:negativos.id+'-sol-txt-nombres',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:50,
																                            readOnly:true,
																                            //labelAlign:'top',
																                            //width:'100%',
																                            flex:2,
																                            //height:60,
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
																					        xtype: 'datefield',
																					        id:negativos.id+'-sol-date-fecha-nac',
																					        padding:'5px 5px 5px 5px',
																					        readOnly:true,
																					        //name: 'date1',
																					        //labelAlign:'top',
																					        format:'Y-m-d',
																					        flex:1,
																                            //height:40,
																                            labelWidth: 50,
																					        labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
																					        fieldLabel: 'Nacido',
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
																                            xtype:'combo',
																                            fieldLabel: 'Sexo',
																                            bodyStyle: 'background: transparent',
																                            id:negativos.id+'-sol-cmb-sexo',
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
																                            width:'95%',
																                            flex:1,
																                            readOnly:true,
																                            //height:30,
																                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:12px; text-align: center; font-weight: bold',
												                                            anchor:'100%',
												                                            labelWidth:50,
												                                            padding:'5px 5px 5px 5px',
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
																                            xtype:'combo',
																                            fieldLabel: 'Estado Civil',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            id:negativos.id+'-sol-cmb-estado-civil',
																                            store: negativos.store_estado_civil,
																                            queryMode: 'local',
																                            triggerAction: 'all',
																                            valueField: 'code',
																                            displayField: 'name',
																                            emptyText: '[Seleccione]',
																                            labelAlign:'right',
																                            //allowBlank: false,
																                            //labelAlign:'top',
																                            readOnly:true,
																                            labelWidth: 80,
																                            width:200,
																                            anchor:'98%',
																                            height:20,
																                            //readOnly: true,
																                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:12px; text-align: center; font-weight: bold',
																                            listeners:{
																                                afterrender:function(obj, e){
																                                    // obj.getStore().load();
																                                    obj.setValue('S');
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
																					border:false,
																					items:[
																					    {
																                            xtype: 'textfield',	
																                            id:negativos.id+'-sol-txt-doc-dni',
																                            fieldLabel: 'DNI',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:50,
																                            //readOnly:true,
																                            labelAlign:'top',
																                            //width:'50%',
																                            readOnly:true,
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
																                            id:negativos.id+'-sol-txt-doc-ce',
																                            fieldLabel: 'CE',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:50,
																                            readOnly:true,
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
																                            id:negativos.id+'-sol-txt-doc-cip',
																                            fieldLabel: 'CIP',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:50,
																                            readOnly:true,
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
																                            id:negativos.id+'-sol-txt-doc-ruc',
																                            fieldLabel: 'RUC',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:50,
																                            readOnly:true,
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
																                            id:negativos.id+'-sol-txt-doc-cm',
																                            fieldLabel: 'CM',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:50,
																                            readOnly:true,
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
																                            fieldLabel: 'Domicilio',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            id:negativos.id+'-sol-cmb-domicilio',
																                            store: Ext.create('Ext.data.ArrayStore', {
																						        storeId: 'estado',
																						        autoLoad: true,
																						        data: [
																									['PRO','Propio'],
																								    ['PAG','Pagado'],
																								    ['ALQ','Alquilado'],
																								    ['FAM','Familiar']
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
																                            //labelAlign:'top',
																                            labelWidth: 50,
																                            width:200,
																                            anchor:'98%',
																                            height:20,
																                            readOnly: true,
																                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:12px; text-align: center; font-weight: bold',
																                            listeners:{
																                                afterrender:function(obj, e){
																                                    // obj.getStore().load();
																                                    obj.setValue('PRO');
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
																					border:false,
																					items:[
																						{
																                            xtype:'combo',
																                            fieldLabel: 'Estudios',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            id:negativos.id+'-sol-cmb-estudios',
																                            store: Ext.create('Ext.data.ArrayStore', {
																						        storeId: 'estado',
																						        autoLoad: true,
																						        data: [
																									['BA','Bachiller'],
																								    ['TI','Titulado'],
																								    ['MA','Magister'],
																								    ['TE','Tecnico'],
																								    ['OT','Otros']
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
																                            //labelAlign:'top',
																                            labelWidth: 50,
																                            width:200,
																                            anchor:'98%',
																                            height:20,
																                            readOnly: true,
																                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:12px; text-align: center; font-weight: bold',
																                            listeners:{
																                                afterrender:function(obj, e){
																                                    // obj.getStore().load();
																                                    obj.setValue('OT');
																                                },
																                                select:function(obj, records, eOpts){
																                        
																                                }
																                            }
																                        },
																					    {
																                            xtype: 'textfield',	
																                            id:negativos.id+'-sol-txt-profesion',
																                            fieldLabel: 'Profesión',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:55,
																                            readOnly:true,
																                            //labelAlign:'top',
																                            //width:'50%',
																                            flex:1,
																                            //height:40,
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
																                            fieldLabel: 'Laboral',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            id:negativos.id+'-sol-cmb-laboral',
																                            store: Ext.create('Ext.data.ArrayStore', {
																						        storeId: 'estado',
																						        autoLoad: true,
																						        data: [
																									['CO','Contratado'],
																								    ['DE','Dependiente'],
																								    ['IN','Independiente'],
																								    ['OT','Otros']
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
																                            //labelAlign:'top',
																                            labelWidth: 50,
																                            width:200,
																                            anchor:'98%',
																                            height:20,
																                            readOnly: true,
																                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:12px; text-align: center; font-weight: bold',
																                            listeners:{
																                                afterrender:function(obj, e){
																                                    // obj.getStore().load();
																                                    obj.setValue('OT');
																                                },
																                                select:function(obj, records, eOpts){
																                        
																                                }
																                            }
																                        },
																                        {
																                            xtype: 'textfield',	
																                            id:negativos.id+'-sol-txt-cargo',
																                            fieldLabel: 'Cargo',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:55,
																                            readOnly:true,
																                            //labelAlign:'top',
																                            //width:'50%',
																                            flex:1,
																                            //height:40,
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
																                            fieldLabel: 'Centro de Trabajo',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            id:negativos.id+'-sol-txt-centro-trabajo',
																                            store: store_centro_trabajo,
																                            queryMode: 'local',
																                            triggerAction: 'all',
																                            valueField: 'id_empresa',
																                            displayField: 'nombre',
																                            emptyText: '[Seleccione]',
																                            labelAlign:'right',
																                            //allowBlank: false,
																                            //labelAlign:'top',
																                            labelWidth: 110,
																                            //width:200,
																                            flex:1,
																                            anchor:'98%',
																                            height:20,
																                            readOnly: true,
																                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
																                            listeners:{
																                                afterrender:function(obj, e){
																                                    // obj.getStore().load();
																                                    //obj.setValue('S');
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
																					border:false,
																					items:[
																                        {
																					        xtype: 'datefield',
																					        id:negativos.id+'-sol-date-fecha-ingreso',
																					        padding:'5px 5px 5px 5px',
																					        //name: 'date1',
																					        //labelAlign:'top',
																					        format:'Y-m-d',
																					        //flex:1,
																                            //height:40,
																                            width:220,
																                            readOnly:true,
																                            labelWidth: 110,
																					        labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
																					        fieldLabel: 'Fecha Ingreso',
																					        value:''
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
											    },
											    {
											    	region:'center',
											    	border:false,
											    	layout:'border',
											    	items:[
											    		{
									                		xtype:'tabpanel',
									                		region:'center',
									                		//height:205,
															//title:'Datos',
															bodyStyle: 'background: transparent',
								                            id: negativos.id+'-tabContentDatos',
								                            activeItem: 0,
								                            autoScroll: false,
								                            defaults:{
								                                closable: true,
								                                autoScroll: true,
								                                closable:false
								                            },
								                            border: false,
								                            //layout: 'fit',
								                            tabPosition: 'top',
								                            bodyCls: 'transparent',
								                            bodyStyle: 'background: transparent',
								                            autoScroll:false,
								                            layout:'fit',
															items:[
																{
																	xtype:'panel',
																	title:'Documentos Adjuntos',
																	bodyStyle: 'background: transparent',
																	border:false,
																	layout:'border',
																	items:[
																		{
																			region:'center',
																			border:false,
																			autoScroll:true,
																			html:'<div id="contenedor-documentos" ></div>',
																			items:[
																				/*{
																		            xtype: 'dataview',
																		            id:negativos.id+'-sol-documentos-adjuntos',
																		            tpl: [
																		                '<tpl for=".">',
																		                    '<div class="dataview-multisort-item">',
																		                        '<img src="{thumb}" />',
																		                        '<h3>{nombre}</h3>',
																		                    '</div>',
																		                '</tpl>'
																		            ],
																		            itemSelector: 'div.dataview-multisort-item',
																		            store:store_documentos,
																		            listeners: {
															                            'itemdblclick': function(view, record, item, idx, event, opts) {
															                                
															                                
															                            },
															                            afterrender:function(obj){
															                            	
															                            }
															                        }
																		        }*/
																			]
																		}
																	]
																},
																{
																	xtype:'panel',
																	title:'Conyugue',
																	//bodyStyle: 'background: transparent',
																	border:false,
																	//layout:'border',
																	/*bbar:[
																		{
												                            xtype: 'textfield',
												                            id:negativos.id+'-select-conyugue',
												                            fieldLabel: 'DNI',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:negativos.id+'-txt-dni',
												                            labelWidth:40,
												                            //readOnly:true,
												                            //labelAlign:'top',
												                            width:120,
												                            //flex:1,
												                            //height:40,
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
													                        xtype:'button',
													                        //margin:'20px 5px 5px 5px',
													                        height:30,
													                        //text: 'Grabar',
													                        icon: '/images/icon/add.gif',
													                        listeners:{
													                            beforerender: function(obj, opts){
																				},
													                            click: function(obj, e){
													                            	negativos.setSavenegativosConyugue('Y');
													                            }
													                        }
													                    },
													                    {
													                        xtype:'button',
													                        height:30,
													                        //margin:'20px 5px 5px 5px',
													                        //text: 'Grabar',
													                        icon: '/images/icon/Document.png',
													                        listeners:{
													                            beforerender: function(obj, opts){
																				},
													                            click: function(obj, e){
													                            	Ext.getCmp(negativos.id+'-select-conyugue').setValue('');
													                            }
													                        }
													                    },
													                    {
													                        xtype:'button',
													                        height:30,
													                        //margin:'20px 5px 5px 5px',
													                        //text: 'Grabar',
													                        icon: '/images/icon/Trash.png',
													                        listeners:{
													                            beforerender: function(obj, opts){
																				},
													                            click: function(obj, e){
													                            	negativos.setSavenegativosConyugue('Z');
													                            }
													                        }
													                    }
																	],*/
																	items:[
																		 {
													                        xtype: 'dataview',
													                        id: negativos.id+'-list-Conyugues',
													                        bodyStyle: 'background: transparent',
													                        bodyCls: 'transparent',
													                        layout:'fit',
													                        store: store_conyugue,
													                        autoScroll: true,
													                        loadMask:true,
													                        autoHeight: false,
													                        tpl: imageTplPointerConyugue,
													                        multiSelect: false,
													                        singleSelect: false,
													                        loadingText:'Cargando Lista de Conyugues...',
													                        emptyText: '<div class="list_grid_as__list_menu"><div class="list_grid_as__none_data" ></div><div class="list_grid_as__title_clear_data">NO TIENE NINGUN Conyugue</div></div>',
													                        itemSelector: 'div.list_grid_as__list_menu_select',
													                        trackOver: true,
													                        overItemCls: 'list_grid_as__list_menu-hover',
													                        listeners: {
													                            'itemdblclick': function(view, record, item, idx, event, opts) {
													                                /*me.idx=idx;
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
													                                }*/
													                                
													                                var record = this.getStore().getAt(idx);
													                                var val =record.data;
																					Ext.getCmp(negativos.id+'-select-conyugue').setValue(val.dni);
													                                
													                            },
													                            afterrender:function(obj){
													                            	
													                            }
													                        }
													                    }
																	]
																},
																{
																	xtype:'panel',
																	title:'Garante',
																	//bodyStyle: 'background: transparent',
																	border:false,
																	//layout:'border',
																	bbar:[
																		{
												                            xtype: 'textfield',
												                            id:negativos.id+'-select-garante',
												                            fieldLabel: 'DNI',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 10px 5px 5px',
												                            //id:negativos.id+'-txt-dni',
												                            labelWidth:40,
												                            //readOnly:true,
												                            //labelAlign:'top',
												                            width:120,
												                            //flex:1,
												                            //height:40,
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
													                        xtype:'button',
													                        //margin:'20px 5px 5px 5px',
													                        height:30,
													                        //text: 'Grabar',
													                        icon: '/images/icon/add.gif',
													                        listeners:{
													                            beforerender: function(obj, opts){
																				},
													                            click: function(obj, e){
													                            	negativos.setSavenegativosGarante('G');
													                            }
													                        }
													                    },
													                    {
													                        xtype:'button',
													                        height:30,
													                        //margin:'20px 5px 5px 5px',
													                        //text: 'Grabar',
													                        icon: '/images/icon/Document.png',
													                        listeners:{
													                            beforerender: function(obj, opts){
																				},
													                            click: function(obj, e){
													                            	Ext.getCmp(negativos.id+'-select-garante').setValue('');
													                            }
													                        }
													                    },
													                    {
													                        xtype:'button',
													                        height:30,
													                        //margin:'20px 5px 5px 5px',
													                        //text: 'Grabar',
													                        icon: '/images/icon/Trash.png',
													                        listeners:{
													                            beforerender: function(obj, opts){
																				},
													                            click: function(obj, e){
													                            	negativos.setSavenegativosGarante('H');
													                            }
													                        }
													                    }
																	],
																	items:[
																		 {
													                        xtype: 'dataview',
													                        id: negativos.id+'-list-garante',
													                        bodyStyle: 'background: transparent',
													                        bodyCls: 'transparent',
													                        layout:'fit',
													                        store: store_garante,
													                        autoScroll: true,
													                        loadMask:true,
													                        autoHeight: false,
													                        tpl: imageTplPointerConyugue,
													                        multiSelect: false,
													                        singleSelect: false,
													                        loadingText:'Cargando Lista de Conyugues...',
													                        emptyText: '<div class="list_grid_as__list_menu"><div class="list_grid_as__none_data" ></div><div class="list_grid_as__title_clear_data">NO TIENE NINGUN Conyugue</div></div>',
													                        itemSelector: 'div.list_grid_as__list_menu_select',
													                        trackOver: true,
													                        overItemCls: 'list_grid_as__list_menu-hover',
													                        listeners: {
													                            'itemdblclick': function(view, record, item, idx, event, opts) {
													                                /*me.idx=idx;
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
													                                }*/
													                                
													                                var record = this.getStore().getAt(idx);
													                                var val =record.data;
																					Ext.getCmp(negativos.id+'-select-garante').setValue(val.dni);
													                                
													                            },
													                            afterrender:function(obj){
													                            	
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
								         	layout:'border',
								         	region:'center',
								         	border:false,
								         	items:[
								         		{
								         			id:negativos.id+'-panel-direccion',
								         			layout:'border',
								         			region:'west',
								         			title:'DIRECCIÓN',
								         			split:true,
								         			collapsible: true,
								         			header:false,
								         			width:320,
								         			//border:false,
								         			items:[
								         				{
								         					layout:'border',
								         					region:'north',
								         					height:390,
								         					border:false,
								         					items:[
								         						{
							                						region:'north',
							                						height:40,
							                						border:false,
							                						items:[
							                							{
																			//region:'north',
																			xtype:'panel',
																			layout:'hbox',
																			border:false,
																			height:40,
																			//bodyStyle: 'background: #F0EFEF;text-align:center;',
																			bodyStyle: 'background: transparent;text-align:center;',
																			//layout:'fit',
																			items:[
																				{
																			        xtype: 'label',
																			        //forId: 'myFieldId',
																			        text: 'DIRECCIÓN',
																			        style: 'font: normal 15px Sans-serif;font-weight: bold;',
																			        padding:'10px 5px 5px 5px',
																			        width:'100%',
														                            anchor:'100%'
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
											                				padding:'5px 0px 5px 5px',
											                				height:340,
											                				bodyStyle: 'background: transparent',
											                				border:false,
											                				items:[
											                					{
																					xtype:'panel',
																					bodyStyle: 'background: transparent',
																					//title:'Registro',
																					border:false,
																					items:[
																						{
																                            xtype: 'textfield',	
																                            fieldLabel: 'IDdir',
																                            id:negativos.id+'-sol-txt-id-dir',
																                            hidden:true,
																                            bodyStyle: 'background: transparent',
																		                    //padding:'15px 5px 5px 25px',
																                            //id:negativos.id+'-txt-dni',
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
																                            id:negativos.id+'-sol-txt-dir-direccion',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 10px 5px 5px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:50,
																                            readOnly:true,
																                            labelAlign:'top',
																                            width:'95%',
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
																		                            id:negativos.id+'-sol-txt-dir-numero',
																		                            fieldLabel: 'N°',
																		                            bodyStyle: 'background: transparent',
																				                    padding:'5px 10px 5px 5px',
																		                            //id:negativos.id+'-txt-dni',
																		                            labelWidth:50,
																		                            readOnly:true,
																		                            labelAlign:'top',
																		                            //width:50,
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
																		                            xtype: 'textfield',
																		                            id:negativos.id+'-sol-txt-dir-mz',
																		                            fieldLabel: 'MZ',
																		                            bodyStyle: 'background: transparent',
																				                    padding:'5px 10px 5px 5px',
																		                            //id:negativos.id+'-txt-dni',
																		                            labelWidth:50,
																		                            readOnly:true,
																		                            labelAlign:'top',
																		                            //width:50,
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
																		                            xtype: 'textfield',
																		                            id:negativos.id+'-sol-txt-dir-lt',
																		                            fieldLabel: 'LT',
																		                            bodyStyle: 'background: transparent',
																				                    padding:'5px 10px 5px 5px',
																		                            //id:negativos.id+'-txt-dni',
																		                            labelWidth:50,
																		                            readOnly:true,
																		                            labelAlign:'top',
																		                            //width:50,
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
																		                            xtype: 'textfield',
																		                            id:negativos.id+'-sol-txt-dir-dpto',
																		                            fieldLabel: 'DPTO',
																		                            bodyStyle: 'background: transparent',
																				                    padding:'5px 10px 5px 5px',
																		                            //id:negativos.id+'-txt-dni',
																		                            labelWidth:50,
																		                            readOnly:true,
																		                            labelAlign:'top',
																		                            //width:50,
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
																		                            xtype: 'textfield',
																		                            id:negativos.id+'-sol-txt-dir-interior',
																		                            fieldLabel: 'INT.',
																		                            bodyStyle: 'background: transparent',
																				                    padding:'5px 10px 5px 5px',
																		                            //id:negativos.id+'-txt-dni',
																		                            labelWidth:50,
																		                            readOnly:true,
																		                            labelAlign:'top',
																		                            //width:50,
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
																							layout:'hbox',
																							bodyStyle: 'background: transparent',
																							padding:'5px 5px 5px 5px',
																							border:false,
																							items:[
																				                {
																		                            xtype: 'textfield',
																		                            id:negativos.id+'-sol-txt-dir-urb',
																		                            fieldLabel: 'Urbanización/AA.HH/PJ/ASOC',
																		                            bodyStyle: 'background: transparent',
																				                    padding:'5px 10px 5px 5px',
																		                            //id:negativos.id+'-txt-dni',
																		                            labelWidth:50,
																		                            readOnly:true,
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
																                            id:negativos.id+'-sol-txt-dir-referencia',
																                            fieldLabel: 'Referencia de Domicilio',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 10px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:55,
																                            readOnly:true,
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
												                                            id:negativos.id+'-sol-cmb-departamento',
												                                            store: negativos.store_ubigeo,
												                                            queryMode: 'local',
												                                            triggerAction: 'all',
												                                            valueField: 'cod_ubi',
												                                            displayField: 'Departamento',
												                                            emptyText: '[Seleccione]',
												                                            labelAlign:'right',
												                                            //allowBlank: false,
												                                            //labelAlign:'top',
																                            width:'92%',
																                            labelWidth:75,
																                            flex:1,
																                            readOnly:true,
																                            //height:40,
																                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
												                                            anchor:'100%',
												                                            padding:'5px 5px 5px 10px',
												                                            //readOnly: true,
												                                            listeners:{
												                                                afterrender:function(obj, e){
												                                        			/*Ext.getCmp(negativos.id+'-sol-cmb-provincia').getStore().removeAll();
												                                        			Ext.getCmp(negativos.id+'-sol-cmb-Distrito').getStore().removeAll();
												                                                	negativos.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,'100101');*/
												                                                },
												                                                select:function(obj, records, eOpts){
												                                        			var pro = Ext.getCmp(negativos.id+'-sol-cmb-provincia');
												                                        			Ext.getCmp(negativos.id+'-sol-cmb-provincia').setValue('');
												                                        			Ext.getCmp(negativos.id+'-sol-cmb-Distrito').getStore().removeAll();
												                                        			Ext.getCmp(negativos.id+'-sol-cmb-Distrito').setValue('');
												                                                	negativos.getUbigeo({VP_OP:'P',VP_VALUE:obj.getValue()},pro,'');
												                                                }
												                                            }
												                                        },
												                                        {
												                                            xtype:'combo',
												                                            fieldLabel: 'Provincia',
												                                            id:negativos.id+'-sol-cmb-provincia',
												                                            store: negativos.store_ubigeo2,
												                                            queryMode: 'local',
												                                            triggerAction: 'all',
												                                            valueField: 'cod_ubi',
												                                            displayField: 'Provincia',
												                                            emptyText: '[Seleccione]',
												                                            labelAlign:'right',
												                                            //allowBlank: false,
												                                            //labelAlign:'top',
																                            width:'92%',
																                            labelWidth:75,
																                            flex:1,
																                            readOnly:true,
																                            //height:40,
																                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
												                                            anchor:'100%',
												                                            padding:'5px 5px 5px 10px',
												                                            //readOnly: true,
												                                            listeners:{
												                                                afterrender:function(obj, e){
												                                        			/*Ext.getCmp(negativos.id+'-sol-cmb-Distrito').getStore().removeAll();
												                                                	negativos.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},obj,'100601');*/
												                                                },
												                                                select:function(obj, records, eOpts){
												                                        			var dis=Ext.getCmp(negativos.id+'-sol-cmb-Distrito');
												                                                	negativos.getUbigeo({VP_OP:'X',VP_VALUE:obj.getValue()},dis,'');
												                                                }
												                                            }
												                                        },
												                                        {
												                                            xtype:'combo',
												                                            fieldLabel: 'Distrito',
												                                            id:negativos.id+'-sol-cmb-Distrito',
												                                            store: negativos.store_ubigeo3,
												                                            queryMode: 'local',
												                                            triggerAction: 'all',
												                                            valueField: 'cod_ubi',
												                                            displayField: 'Distrito',
												                                            emptyText: '[Seleccione]',
												                                            labelAlign:'right',
												                                            //allowBlank: false,
												                                            //labelAlign:'top',
																                            width:'92%',
																                            labelWidth:75,
																                            flex:1,
																                            readOnly:true,
																                            //height:40,
																                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
												                                            anchor:'100%',
												                                            padding:'5px 5px 5px 10px',
												                                            //readOnly: true,
												                                            listeners:{
												                                                afterrender:function(obj, e){
												                                                	//negativos.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
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
											                	}
								         					]
								         				},
							                			{
							                				region:'center',
							                				border:false,
							                				layout:'border',
							                				items:[
							                					{
							                						region:'north',
							                						height:40,
							                						border:false,
							                						items:[
							                							{
																			//region:'north',
																			xtype:'panel',
																			layout:'hbox',
																			border:false,
																			height:40,
																			//bodyStyle: 'background: #F0EFEF;text-align:center;',
																			bodyStyle: 'background: transparent;text-align:center;',
																			//layout:'fit',
																			items:[
																				{
																			        xtype: 'label',
																			        //forId: 'myFieldId',
																			        text: 'TELÉFONOS',
																			        style: 'font: normal 15px Sans-serif;font-weight: bold;',
																			        padding:'10px 5px 5px 5px',
																			        width:'100%',
														                            anchor:'100%'
																			    }
																			]
																		}
							                						]
							                					},
							                					{
							                						region:'center',
							                						border:false,
							                						items:[
							                							{
													                        xtype: 'dataview',
													                        id: negativos.id+'-list-telefonos',
													                        bodyStyle: 'background: transparent',
													                        bodyCls: 'transparent',
													                        layout:'fit',
													                        store: store_telefonos,
													                        autoScroll: true,
													                        loadMask:true,
													                        autoHeight: false,
													                        tpl: imageTplTelefonos,
													                        multiSelect: false,
													                        singleSelect: false,
													                        loadingText:'Cargando Lista de Teléfono...',
													                        emptyText: '<div class="list_grid_as__list_menu"><div class="list_grid_as__none_data" ></div><div class="list_grid_as__title_clear_data">NO TIENE NINGUN TELÉFONO</div></div>',
													                        itemSelector: 'div.list_grid_as__list_menu_select',
													                        trackOver: true,
													                        overItemCls: 'list_grid_as__list_menu-hover',
													                        listeners: {
													                            'itemdblclick': function(view, record, item, idx, event, opts) {
													                                /*me.idx=idx;
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
													                                }*/

													                                var record = this.getStore().getAt(idx);
													                                var val =record.data;
													                                
													                            },
													                            afterrender:function(obj){
													                            	
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
								         			layout:'border',
								         			region:'center',
								         			bodyStyle: 'background: #FFF;',
								         			border:false,
								         			items:[
								         				{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:40,
															bodyStyle: 'background: #B5D6E6;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'INFORMACIÓN DEL CRÉDITO',
															        style: 'font: normal 18px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},
														{
															region:'center',
															padding:5,
															layout:'border',
															bodyStyle: 'background: transparent',
															items:[
																{
																	layout:'border',
																	region:'north',
																	bodyStyle: 'background: transparent',
																	height:360,
																	border:false,
																	items:[
																		{
																			region:'north',
																			//layout:'vbox',
																			bodyStyle: 'background: transparent',
																			//padding:'5px 5px 5px 5px',
																			height:125,
																			border:true,
																			items:[
																				{
																					layout:'hbox',
																					bodyStyle: 'background: transparent',
																					padding:'5px 5px 5px 5px',
																					//border:false,
																					items:[
																						{
																					        xtype: 'datefield',
																					        id:negativos.id+'-sol-date-fecha-solicitud',
																					        padding:'5px 5px 0px 5px',
																					        //name: 'date1',
																					        labelAlign:'top',
																					        format:'Y-m-d',
																					        flex:1,
																					        padding:'5px 5px 5px 5px',
																					        //width:87,
																                            //height:40,
																					        //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            //fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
																					        fieldLabel: 'F.Solicitado',
																					        value:new Date(),
																					        maxValue:new Date()
																					    },
																					    {
																                            xtype: 'textfield',	
																                            fieldLabel: 'N° Solicitud',
																                            id:negativos.id+'-sol-txt-id-solicitud',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 0px 5px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:50,
																                            hidden:true,
																                            readOnly:true,
																                            labelAlign:'top',
																                            //flex:1,
																                            flex:1,
																                            //width:70,
																                            //height:60,
																                            //labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
																                            //fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
																                            value:'0',
																                            //anchor:'100%',
																                            listeners:{
																                                afterrender:function(obj, e){
																                                }
																                            }
																                        },
																						{
																                            xtype: 'textfield',	
																                            fieldLabel: 'N° Solicitud',
																                            id:negativos.id+'-sol-txt-nro-solicitud',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:50,
																                            readOnly:true,
																                            labelAlign:'top',
																                            maskRe: new RegExp("[0-9]+"),
																                            //width:70,
																                            flex:1,
																                            //flex:1,
																                            //height:60,
																                            //labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
																                            value:'0',
																                            //anchor:'100%',
																                            listeners:{
																                                afterrender:function(obj, e){
																                                }
																                            }
																                        },
																                        {
																                            xtype: 'textfield',
																                            id:negativos.id+'-sol-txt-estado-solicitud',
																                            fieldLabel: 'Estado',
																                            bodyStyle: 'background: transparent',
																		                    padding:'5px 5px 5px 5px',
																                            //id:negativos.id+'-txt-dni',
																                            labelWidth:50,
																                            //readOnly:true,
																                            labelAlign:'top',
																                            //width:'50%',
																                            flex:1,
																                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
																                            value:'',
																                            //anchor:'100%',
																                            listeners:{
																                                afterrender:function(obj, e){
																                                }
																                            }
																                        },
																                        {
																		                    xtype: 'button',
																		                    hidden:true,
																		                    id:negativos.id+'-btn-guardar-solicitud',
																		                    margin:'2px 2px 2px 2px',
																		                    icon: '/images/icon/1315404769_gear_wheel.png',
																		                    //glyph: 72,
																		                    //columnWidth: 0.1,
																		                    flex:0.5,
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
																	                            	negativos.setSaveSolicitud('I');
																	                            }
																	                        }
																		                },
																		                {
																		                    xtype: 'button',
																		                    hidden:true,
																		                    id:negativos.id+'-btn-aprobar-solicitud',
																		                    margin:'2px 2px 2px 2px',
																		                    icon: '/images/icon/ok.png',
																		                    //glyph: 72,
																		                    //columnWidth: 0.1,
																		                    flex:0.5,
																		                    text: 'Aprobar',
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
																	                            	negativos.setSaveSolicitud('A');
																	                            }
																	                        }
																		                },
																		                {
																		                    xtype: 'button',
																		                    hidden:true,
																		                    id:negativos.id+'-btn-anular-solicitud',
																		                    margin:'2px 2px 2px 2px',
																		                    icon: '/images/icon/remove.png',
																		                    //glyph: 72,
																		                    //columnWidth: 0.1,
																		                    flex:0.5,
																		                    text: 'Anular',
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
																	                            	negativos.setSaveSolicitud('X');
																	                            }
																	                        }
																		                },
																		                {
																		                    xtype: 'button',
																		                    id:negativos.id+'-btn-nuevo-solicitud',
																		                    margin:'2px 2px 2px 2px',
																		                    icon: '/images/icon/Door.png',
																		                    //glyph: 72,
																		                    //columnWidth: 0.1,
																		                    flex:0.5,
																		                    text: 'Salir',
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
																	                            	negativos.idx=-1;
																	                            	negativos.setDisabledBTNSolicitud(false);
																									negativos.setClearSolicitud();
																									var tab=Ext.getCmp(negativos.id+'-win-form'); 
																					                var active=Ext.getCmp(negativos.id+'-border-one');
																					                tab.setActiveTab(active);
																	                            }
																	                        }
																		                }
																					]
																				},{
																					layout:'hbox',
																					bodyStyle: 'background: transparent',
																					padding:'5px 5px 5px 5px',
																					//border:false,
																					items:[
																						
																						{
												                                            xtype:'combo',
												                                            fieldLabel: 'Agencia',
												                                            id:negativos.id+'-sol-cmb-agencia',
												                                            store: store_agencias,
												                                            queryMode: 'local',
												                                            triggerAction: 'all',
												                                            valueField: 'cod_age',
												                                            displayField: 'nombre',
												                                            emptyText: '[Seleccione]',
												                                            labelAlign:'right',
												                                            //allowBlank: false,
												                                            labelAlign:'top',
																                            //width:'92%',
																                            labelWidth:75,
																                            flex:1,
																                            //height:40,
																                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
												                                            //anchor:'100%',
												                                            padding:'0px 5px 5px 5px',
												                                            //readOnly: true,
												                                            listeners:{
												                                                afterrender:function(obj, e){
												                                                	//negativos.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
												                                                },
												                                                select:function(obj, records, eOpts){
												                                        			var obja = Ext.getCmp(negativos.id+'-sol-cmb-asesor');
									                            									negativos.getReload(obja,{vp_cod_age:obj.getValue()});
												                                                }
												                                            }
												                                        },
																                        {
												                                            xtype:'combo',
												                                            fieldLabel: 'Asesor',
												                                            id:negativos.id+'-sol-cmb-asesor',
												                                            store: store_asesores,
												                                            queryMode: 'local',
												                                            triggerAction: 'all',
												                                            valueField: 'id_asesor',
												                                            displayField: 'nombre',
												                                            emptyText: '[Seleccione]',
												                                            labelAlign:'right',
												                                            //allowBlank: false,
												                                            labelAlign:'top',
																                            //width:'92%',
																                            labelWidth:75,
																                            flex:1,
																                            //height:40,
																                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
												                                            //anchor:'100%',
												                                            padding:'0px 5px 5px 5px',
												                                            //readOnly: true,
												                                            listeners:{
												                                                afterrender:function(obj, e){
												                                                	//negativos.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
												                                                },
												                                                select:function(obj, records, eOpts){
												                                        
												                                                }
												                                            }
												                                        },
												                                        {
												                                            xtype:'combo',
												                                            fieldLabel: 'Motivo',
												                                            id:negativos.id+'-sol-cmb-motivo',
												                                            store: store_motivos,
												                                            queryMode: 'local',
												                                            triggerAction: 'all',
												                                            valueField: 'id_mot',
												                                            displayField: 'nombre',
												                                            emptyText: '[Seleccione]',
												                                            labelAlign:'right',
												                                            //allowBlank: false,
												                                            labelAlign:'top',
																                            //width:'92%',
																                            labelWidth:75,
																                            flex:1,
																                            //height:40,
																                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
												                                            //anchor:'100%',
												                                            padding:'0px 5px 5px 5px',
												                                            //readOnly: true,
												                                            listeners:{
												                                                afterrender:function(obj, e){
												                                                	//negativos.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
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
																			region:'center',
																			bodyStyle: 'background: transparent',
																			border:false,
																			layout:'border',
																			items:[
																				{
																					region:'center',
																					bodyStyle: 'background: transparent',
																					//height:80,
																					//layout:'border',
																					//flex:1,
																					//padding:'5px 5px 5px 5px',
																					border:false,
																					items:[
																						{
																							layout:'hbox',
																							//region:'north',
																							//height:100,
																							//flex:1,
																							border:true,
																							padding:'5px 5px 5px 5px',
																							items:[
																								{
																		                            xtype:'combo',
																		                            fieldLabel: 'Moneda',
																		                            bodyStyle: 'background: transparent',
																				                    padding:'5px 5px 5px 5px',
																		                            id:negativos.id+'-sol-cmb-moneda',
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
																		                            //width:80,
																		                            //columnWidth: 0.2,
																		                            flex:1,
																		                            //flex:1,
																		                            anchor:'100%',
																		                            //readOnly: true,
																		                            //labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
																		                            //fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
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
																		                            fieldLabel: 'M.Solicitado',
																		                            id:negativos.id+'-sol-txt-monto',
																		                            bodyStyle: 'background: transparent',
																				                    padding:'5px 5px 5px 5px',
																		                            //id:negativos.id+'-txt-dni',
																		                            labelWidth:50,
																		                            //readOnly:true,
																		                            labelAlign:'top',
																		                            //width:80,
																		                            flex:1,
																		                            //columnWidth: 0.2,
																		                            //height:60,
																		                            //labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
																		                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
																		                            value:'1444.40',
																		                            maskRe: new RegExp("[0-9.]+"),
																		                            //anchor:'100%',
																		                            listeners:{
																		                                afterrender:function(obj, e){
																		                                }
																		                            }
																		                        },
																		                        {
																		                            xtype:'combo',
																		                            fieldLabel: 'Tipo de Cliente',
																		                            bodyStyle: 'background: transparent',
																				                    padding:'5px 5px 5px 5px',
																		                            id:negativos.id+'-sol-txt-tipo-cliente',
																		                            store: Ext.create('Ext.data.ArrayStore', {
																								        storeId: 'estado',
																								        autoLoad: true,
																								        data: [
																											['F','Frecuente'],
																										    ['N','Nuevo']
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
																		                            labelAlign:'top',
																		                            labelWidth: 50,
																		                            //width:100,
																		                            flex:1,
																		                            //columnWidth: 0.2,
																		                            anchor:'100%',
																		                            //readOnly: true,
																		                            //labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
																		                            //fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
																		                            listeners:{
																		                                afterrender:function(obj, e){
																		                                    // obj.getStore().load();
																		                                    obj.setValue('N');
																		                                },
																		                                select:function(obj, records, eOpts){
																		                        
																		                                }
																		                            }
																		                        },
																		                        {
																		                            xtype:'combo',
																		                            fieldLabel: 'Excepcion',
																		                            bodyStyle: 'background: transparent',
																				                    padding:'5px 5px 5px 5px',
																		                            id:negativos.id+'-sol-cmb-excepcion',
																		                            store: Ext.create('Ext.data.ArrayStore', {
																								        storeId: 'estado',
																								        autoLoad: true,
																								        data: [
																											['Y','SI'],
																										    ['N','NO']
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
																		                            labelAlign:'top',
																		                            labelWidth: 50,
																		                            //width:100,
																		                            flex:1,
																		                            //columnWidth: 0.2,
																		                            anchor:'100%',
																		                            //readOnly: true,
																		                            //labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
																		                            //fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
																		                            listeners:{
																		                                afterrender:function(obj, e){
																		                                    // obj.getStore().load();
																		                                    obj.setValue('N');
																		                                },
																		                                select:function(obj, records, eOpts){
																		                        
																		                                }
																		                            }
																		                        },/*,
																		                        {
																							        xtype: 'datefield',
																							        id:negativos.id+'-sol-date-fecha',
																							        padding:'15px 5px 5px 25px',
																							        //name: 'date1',
																							        labelAlign:'top',
																							        width:100,
																		                            //height:60,
																							        //labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
																                            		//fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
																							        fieldLabel: 'Date Field',
																							        value:'22/01/2019'
																							    }*/	
																							]
																						},
																						{
																							layout:'hbox',
																							padding:'5px 5px 5px 5px',
																							//padding:'5px 5px 5px 5px',
																							//border:false,
																							//flex:1,
																							items:[
																		                        {
																		                            xtype: 'textfield',
																		                            id:negativos.id+'-sol-txt-import-aprobado',
																		                            fieldLabel: 'M.Aprobado',
																		                            bodyStyle: 'background: transparent',
																				                    padding:'5px 10px 5px 10px',
																		                            //id:negativos.id+'-txt-dni',
																		                            labelWidth:50,
																		                            //readOnly:true,
																		                            labelAlign:'top',
																		                            //columnWidth: 0.15,
																		                            //width:'100%',
																		                            flex:1,
																		                            maskRe: new RegExp("[0-9.]+"),
																		                            //height:40,
																		                            //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																		                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
																		                            value:'0',
																		                            //anchor:'100%',
																		                            listeners:{
																		                                afterrender:function(obj, e){
																		                                }
																		                            }
																		                        },
																		                        {
																		                            xtype: 'textfield', 
																		                            id:negativos.id+'-sol-txt-numero-cuotas', 
																		                            fieldLabel: 'Cuotas',
																		                            bodyStyle: 'background: transparent',
																				                    padding:'5px 10px 5px 5px',
																		                            //id:negativos.id+'-txt-dni',
																		                            labelWidth:50,
																		                            //readOnly:true,
																		                            labelAlign:'top',
																		                            //width:'100%',
																		                            //columnWidth: 0.1,
																		                            flex:1,
																		                            maskRe: new RegExp("[0-9]+"),
																		                            height:40,
																		                            //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																		                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
																		                            value:'0',
																		                            //anchor:'100%',
																		                            listeners:{
																		                                afterrender:function(obj, e){
																		                                }
																		                            }
																		                        },
																		                        {
																		                            xtype: 'textfield', 
																		                            id:negativos.id+'-sol-txt-interes', 
																		                            fieldLabel: 'Interes',
																		                            bodyStyle: 'background: transparent',
																				                    padding:'5px 10px 5px 5px',
																		                            //id:negativos.id+'-txt-dni',
																		                            labelWidth:50,
																		                            //readOnly:true,
																		                            labelAlign:'top',
																		                            //width:'100%',
																		                            //columnWidth: 0.1,
																		                            flex:1,
																		                            maskRe: new RegExp("[0-9.]+"),
																		                            height:40,
																		                            //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																		                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
																		                            value:'0.1',
																		                            //anchor:'100%',
																		                            listeners:{
																		                                afterrender:function(obj, e){
																		                                }
																		                            }
																		                        },
																		                        {
																		                            xtype: 'textfield', 
																		                            id:negativos.id+'-sol-txt-mora', 
																		                            fieldLabel: 'Mora',
																		                            bodyStyle: 'background: transparent',
																				                    padding:'5px 10px 5px 5px',
																		                            //id:negativos.id+'-txt-dni',
																		                            labelWidth:50,
																		                            //readOnly:true,
																		                            labelAlign:'top',
																		                            //width:'100%',
																		                            //columnWidth: 0.1,
																		                            flex:1,
																		                            maskRe: new RegExp("[0-9.]+"),
																		                            height:40,
																		                            //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																		                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
																		                            value:'0.05',
																		                            //anchor:'100%',
																		                            listeners:{
																		                                afterrender:function(obj, e){
																		                                }
																		                            }
																		                        },
																		                        {
																							        xtype: 'datefield',
																							        id:negativos.id+'-sol-date-fecha-1-letra',
																							        padding:'5px 5px 5px 5px',
																							        //name: 'date1',
																							        labelAlign:'top',
																							        format:'Y-m-d',
																							        //flex:1,
																							        //columnWidth: 0.15,
																							        flex:1,
																		                            height:40,
																							        //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
																		                            //fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
																							        fieldLabel: '1° Letra',
																							        value:'22/01/2019'
																							    }
																		                    ]
																		                },
																		                {
																							layout:'column',
																							xtype: 'fieldset',
																							title: 'Nota',
																							bodyStyle: 'background: transparent',
																							//region:'north',
																							//height:100,
																							//flex:1,
																							border:true,
																							padding:'5px 5px 5px 5px',
																							margin:'5px 5px 5px 5px',
																							items:[
																								{
																							        xtype: 'textareafield',
																							        id: negativos.id + '-txt-nota',
																							        columnWidth: 1,
																							        //name: 'textarea1',
																							        //iconAlign: 'top',
																							        //fieldLabel: 'Nota',
																							        value: ''
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
																	layout:'border',
																	border:false,
																	items:[
																		{
																			region:'north',
																			xtype:'panel',
																			layout:'hbox',
																			border:false,
																			height:40,
																			bodyStyle: 'background: #9CC4DE;text-align:center;',
																			//layout:'fit',
																			items:[
																				{
																			        xtype: 'label',
																			        //forId: 'myFieldId',
																			        text: 'LISTADO DE CUOTAS',
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
																			border:false,
																			items:[
																				{
															                        xtype: 'grid',
															                        id: negativos.id + '-grid-cuotas',
															                        store: store_negativos_detalle, 
															                        columnLines: true,
															                        //layout:'fit',
															                        columns:{
															                            items:[
															                            	{
															                            		text: 'N°',
																							    xtype: 'rownumberer',
																							    width: 40,
																							    sortable: false,
																							    locked: true,
																							    renderer: function (value, metaData, record, rowIdx, colIdx, store) {
															                                        //console.log(record);
															                                        return store.indexOf(record);
															                                    }
																							},
																							{
																								text:'<div style="display: inline-flex;"><div style="width: 76px;">FECHA</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																								align:'center',
																								//width: 100,
																								//flex:1,
																								menuDisabled:true,
																								columns:[
																	                                {
																	                                    text: 'DIA',
																	                                    align:'center',
																	                                    dataIndex: 'DIA',
																	                                    width: 40,
																	                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
																	                                        //console.log(record);
																	                                        var DAT = value;
																	                                        if(record.get('estado')=='S'){
																	                                        	DAT = '';
																	                                        }
																	                                        metaData.style = "padding: 0px; margin: 0px";
																	                                        return DAT;
																	                                    }
																	                                },
																	                                {
																	                                    text: 'MES',
																	                                    align:'center',
																	                                    dataIndex: 'MES',
																	                                    width: 40,
																	                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
																	                                        //console.log(record);
																	                                        var DAT = value;
																	                                        if(record.get('estado')=='S'){
																	                                        	DAT = '';
																	                                        }
																	                                        metaData.style = "padding: 0px; margin: 0px";
																	                                        return DAT;
																	                                    }
																	                                }
															                                	]
															                            	},
															                            	{
																								text:'<div style="display: inline-flex;"><div style="width: 76px;">CUOTA</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																								align:'center',
																								//flex:1,
																								menuDisabled:true,
																								columns:[
																	                                {
																	                                    text: 'DIARIA',
																	                                    align:'right',
																	                                    dataIndex: 'valor_cuota',
																	                                    width: 80,
																	                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
																	                                        //console.log(record);
																	                                        var DAT = value;
																	                                        if(record.get('estado')=='S'){
																	                                        	DAT = '';
																	                                        }
																	                                        metaData.style = "padding: 0px; margin: 0px";
																	                                        return DAT;
																	                                    }
																	                                }
																	                            ]
																	                        },
																	                        {
																								text:'<div style="display: inline-flex;"><div style="width: 76px;">MONTO</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																								align:'center',
																								//flex:1,
																								menuDisabled:true,
																								columns:[
																	                                {
																	                                    text: 'PAGADO',
																	                                    align:'right',
																	                                    dataIndex: 'pagado',
																	                                    width: 80,
																	                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
																	                                        //console.log(record);
																	                                        var DAT = value;
																	                                        if(record.get('estado')=='S'){
																	                                        	DAT = '';
																	                                        }
																	                                        metaData.style = "padding: 0px; margin: 0px";
																	                                        return DAT;
																	                                    }
																	                                }
																	                            ]
																	                        },
																	                        {
																								text:'<div style="display: inline-flex;"><div style="width: 76px;">FECHA</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																								align:'center',
																								//flex:1,
																								menuDisabled:true,
																								columns:[
																	                                {
																	                                    text: 'DIA',
																	                                    align:'center',
																	                                    dataIndex: 'PDIA',
																	                                    width: 40,
																	                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
																	                                        //console.log(record);
																	                                        var DAT = value;
																	                                        if(record.get('estado')=='S'){
																	                                        	DAT = '';
																	                                        }
																	                                        metaData.style = "padding: 0px; margin: 0px";
																	                                        return DAT;
																	                                    }
																	                                },
																	                                {
																	                                    text: 'MES',
																	                                    align:'center',
																	                                    dataIndex: 'PMES',
																	                                    width: 40,
																	                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
																	                                        //console.log(record);
																	                                        var DAT = value;
																	                                        if(record.get('estado')=='S'){
																	                                        	DAT = '';
																	                                        }
																	                                        metaData.style = "padding: 0px; margin: 0px";
																	                                        return DAT;
																	                                    }
																	                                }
															                                	]
															                            	},
															                            	{
																								text:'<div style="display: inline-flex;"><div style="width: 76px;">MORA</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																								align:'center',
																								//flex:1,
																								menuDisabled:true,
																								columns:[
																	                                {
																	                                    text: 'S/.',
																	                                    align:'right',
																	                                    dataIndex: 'mora',
																	                                    width: 60,
																	                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
																	                                        //console.log(record);
																	                                        var DAT = value;
																	                                        if(record.get('estado')=='S'){
																	                                        	DAT = '';
																	                                        }
																	                                        metaData.style = "padding: 0px; margin: 0px";
																	                                        return DAT;
																	                                    }
																	                                },
																	                                {
																	                                    text: 'DIAS',
																	                                    align:'center',
																	                                    dataIndex: 'dias',
																	                                    width: 50,
																	                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
																	                                        //console.log(record);
																	                                        var DAT = value;
																	                                        if(record.get('estado')=='S'){
																	                                        	DAT = '';
																	                                        }
																	                                        metaData.style = "padding: 0px; margin: 0px";
																	                                        return DAT;
																	                                    }
																	                                }
															                                	]
															                            	},
															                                {
																								text:'<div style="display: inline-flex;"><div style="width: 76px;">SALDO A</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																								align:'center',
																								//flex:1,
																								menuDisabled:true,
																								columns:[
																	                                {
																	                                    text: 'PAGAR',
																	                                    align:'right',
																	                                    dataIndex: 'saldo_cuota',
																	                                    width: 80
																	                                }
																	                            ]
																	                        },
																							{
															                                    text: 'ST',
															                                    dataIndex: 'estado',
															                                    //loocked : true,
															                                    //width: 40,
															                                    flex:0.5,
															                                    align: 'center',
															                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
															                                        //console.log(record);
															                                        var estado = 'check-circle-green-16.png';
															                                        if(record.get('estado')=='P'){
															                                        	estado = 'check-circle-black-16.png';
															                                        }
															                                        metaData.style = "padding: 0px; margin: 0px";
															                                        return global.permisos({
															                                            type: 'link',
															                                            id_menu: negativos.id_menu,
															                                            icons:[
															                                                {id_serv: 8, img: estado, qtip: 'Estado.', js: ""}

															                                            ]
															                                        });
															                                    }
															                                }/*,
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
															                                            id_menu: negativos.id_menu,
															                                            icons:[
															                                                {id_serv: 8, img: 'edit.png', qtip: 'Editar.', js: "agencias.getEdit("+rowIndex+")"}

															                                            ]
															                                        });
															                                    }
															                                }*/
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
						beforerender: function(obj, opts){
	                        global.state_item_menu(negativos.id_menu, true);
	                    },
	                    afterrender: function(obj, e){
	                    	//negativos.getReloadGridnegativos('');
	                    	obj.getTabBar().hide();
	                        tab.setActiveTab(obj);
	                        global.state_item_menu_config(obj,negativos.id_menu);
	                        //Ext.getCmp(negativos.id+'-txt-dni').focus();
	                        var obj = Ext.getCmp(negativos.id+'-sol-txt-centro-trabajo');
							negativos.getReload(obj,{vp_op:'N',vp_id:0,vp_nombre:''});
							//negativos.getSelectUbi();
							negativos.setCollapse();
	                    },
	                    beforeclose:function(obj,opts){
	                    	global.state_item_menu(negativos.id_menu, false);
	                    }
					}

				}).show();
				try{
				Ext.EventManager.onWindowResize(function(){
					negativos.setCollapse();
				});
				}catch(e){}
			},
			getSolicitudes:function(){
				var id_age=Ext.getCmp(negativos.id+'-sol-cmb-agencia-filtro').getValue();
				var cliente=Ext.getCmp(negativos.id+'-txt-cliente').getValue();
				var creado=Ext.getCmp(negativos.id+'-rd-creado').getValue();
				//var solicitado=Ext.getCmp(negativos.id+'-rd-solicitado').getValue();
				var op = (creado)?'C':'S';

				if(cliente!='')op='N';
				var fecha_desde=Ext.getCmp(negativos.id+'-txt-fecha-desde').getRawValue();
				var fecha_hasta=Ext.getCmp(negativos.id+'-txt-fecha-hasta').getRawValue();
				/*var estado=Ext.getCmp(negativos.id+'-cmb-estado').getValue();
				var fuente=Ext.getCmp(negativos.id+'-cmb-fuente').getValue();*/
				
				var obja = Ext.getCmp(negativos.id+'-grid-solicitudes');
				negativos.getReload(obja,{vp_id_age:id_age,vp_cliente:cliente,vp_op:op,vp_desde:fecha_desde,vp_hasta:fecha_hasta});
			},
			setDisabledBTNSolicitud:function(bool){
				Ext.getCmp(negativos.id+'-btn-guardar-solicitud').setDisabled(bool);
				Ext.getCmp(negativos.id+'-btn-aprobar-solicitud').setDisabled(bool);
				Ext.getCmp(negativos.id+'-btn-nuevo-solicitud').setDisabled(false);
				Ext.getCmp(negativos.id+'-btn-anular-solicitud').setDisabled(bool);
			},
			setClearSolicitud:function(){
				Ext.getCmp(negativos.id+'-sol-date-fecha-solicitud').setValue(new Date());
				Ext.getCmp(negativos.id+'-sol-txt-id-solicitud').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-nro-solicitud').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-estado-solicitud').setValue('');
				Ext.getCmp(negativos.id+'-sol-cmb-agencia').setValue('');
				Ext.getCmp(negativos.id+'-sol-cmb-asesor').setValue('');
				Ext.getCmp(negativos.id+'-sol-cmb-motivo').setValue('');
				Ext.getCmp(negativos.id+'-sol-cmb-moneda').setValue('SOL');
				Ext.getCmp(negativos.id+'-sol-txt-monto').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-tipo-cliente').setValue('N');
				Ext.getCmp(negativos.id+'-sol-cmb-excepcion').setValue('N');
				Ext.getCmp(negativos.id+'-sol-txt-import-aprobado').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-numero-cuotas').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-interes').setValue('0.1');
				Ext.getCmp(negativos.id+'-sol-txt-mora').setValue('0.05');
				Ext.getCmp(negativos.id+'-sol-date-fecha-1-letra').setValue(new Date());
				Ext.getCmp(negativos.id + '-txt-nota').setValue('');
				negativos.setReadOnlySolicitud(false);
			},
			setReadOnlySolicitud:function(bool){
				Ext.getCmp(negativos.id+'-sol-date-fecha-solicitud').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-txt-id-solicitud').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-txt-nro-solicitud').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-txt-estado-solicitud').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-cmb-agencia').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-cmb-asesor').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-cmb-motivo').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-cmb-moneda').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-txt-monto').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-txt-tipo-cliente').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-cmb-excepcion').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-txt-import-aprobado').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-txt-numero-cuotas').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-txt-interes').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-txt-mora').setReadOnly(bool);
				Ext.getCmp(negativos.id+'-sol-date-fecha-1-letra').setReadOnly(bool);
				Ext.getCmp(negativos.id + '-txt-nota').setReadOnly(bool);
			},
			setDataSolicitudX:function(idx){
				var tab=Ext.getCmp(negativos.id+'-win-form'); 
                var active=Ext.getCmp(negativos.id+'-border-two');
                tab.setActiveTab(active);

				var grid=Ext.getCmp(negativos.id+'-grid-solicitudes');
				var record = grid.getStore().getAt(idx);
				var data =record.data;

				negativos.setClearnegativos();
				negativos.setDisabledBTNSolicitud(false);
				negativos.setClearSolicitud();

				Ext.Ajax.request({
                    url:negativos.url+'getListPersona/',
                    params:{
                    	vp_op:'D',
						vp_id:0,
						vp_dni:data.doc_dni,
						vp_nombres:''
                    },
                    timeout: 30000000,
                    success: function(response, options){
                        Ext.getCmp(negativos.id+'-win-form').el.unmask();
                        var res = Ext.JSON.decode(response.responseText);
                        console.log(res.data[0]);
                        var data = res.data[0];
                        if(data){
	                        Ext.getCmp(negativos.id+'-sol-txt-id-cli').setValue(negativos.id_id);
	                        Ext.getCmp(negativos.id+'-sol-txt-id-per').setValue(data.id_per);
							Ext.getCmp(negativos.id+'-sol-txt-apellido-paterno').setValue(data.ape_pat);
							Ext.getCmp(negativos.id+'-sol-txt-apellido-materno').setValue(data.ape_mat);
							Ext.getCmp(negativos.id+'-sol-txt-nombres').setValue(data.nombres);
							Ext.getCmp(negativos.id+'-sol-cmb-sexo').setValue(data.sexo);
							Ext.getCmp(negativos.id+'-sol-txt-doc-dni').setValue(data.doc_dni);
							Ext.getCmp(negativos.id+'-sol-txt-doc-ce').setValue(data.doc_ce);
							Ext.getCmp(negativos.id+'-sol-txt-doc-cip').setValue(data.doc_cip);
							Ext.getCmp(negativos.id+'-sol-txt-doc-ruc').setValue(data.doc_ruc);
							Ext.getCmp(negativos.id+'-sol-txt-doc-cm').setValue(data.doc_cm);
							Ext.getCmp(negativos.id+'-sol-cmb-estado-civil').setValue(data.estado_civil);
							Ext.getCmp(negativos.id+'-sol-date-fecha-nac').setValue(data.fecha_nac);

							
							/*Ext.getCmp(negativos.id+'-sol-chk-domi-propio').setValue(data.domi_propio=='S'?true:false);
							Ext.getCmp(negativos.id+'-sol-chk-domi-pagando').setValue(data.domi_pagando=='S'?true:false);
							Ext.getCmp(negativos.id+'-sol-chk-domi-alquilado').setValue(data.domi_alquilado=='S'?true:false);
							Ext.getCmp(negativos.id+'-sol-chk-domi-familiar').setValue(data.domi_familiar=='S'?true:false);*/

							Ext.getCmp(negativos.id+'-sol-cmb-domicilio').setValue(data.domicilio);
							Ext.getCmp(negativos.id+'-sol-cmb-estudios').setValue(data.estudios);
							Ext.getCmp(negativos.id+'-sol-txt-profesion').setValue(data.profesion);
							Ext.getCmp(negativos.id+'-sol-cmb-laboral').setValue(data.laboral);
							Ext.getCmp(negativos.id+'-sol-txt-cargo').setValue(data.cargo);
							Ext.getCmp(negativos.id+'-sol-txt-centro-trabajo').setValue(data.id_empresa);
							Ext.getCmp(negativos.id+'-sol-date-fecha-ingreso').setValue(data.fecha_ingreso);

							//Ext.getCmp(negativos.id+'-sol-txt-id-tel').setValue(data.id_tel);
							Ext.getCmp(negativos.id+'-sol-txt-id-dir').setValue(data.id_dir);
							var obj = Ext.getCmp(negativos.id+'-list-telefonos');
							negativos.getReload(obj,{vp_op:'P',vp_id:data.id_per,vp_flag:'A'});

							

							//var obj = Ext.getCmp(negativos.id+'-sol-documentos-adjuntos');
							//negativos.getReload(obj,{vp_sol_id_per:data.id_per,vp_flag:'A'}); 
							win.getGalery({container:'contenedor-documentos',forma:'L',url:negativos.url+'get_list_documentos/',params:{vp_sol_id_per:data.id_per,vp_flag:'A'} });

							if(data.id_dir!=0){
								negativos.getDirecciones(data.id_dir);
							}else{
								negativos.getSelectUbi();
							}
							//var objd = Ext.getCmp(negativos.id+'-list-direcciones');
							//negativos.getReload(objd,{vp_op:'R',vp_id:data.id_per,vp_nombre:''});

							if(data.img!==''){
								var img = '/persona/'+data.id_per+'/PHOTO/'+data.img;
								negativos.setPhotoForm(img,data.ape_pat+' '+data.ape_mat +', '+data.nombres);
							}

							var objp = Ext.getCmp(negativos.id+'-list-Conyugues');
							negativos.getReload(objp,{vp_op:'Y',vp_id:data.id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});

							var objg = Ext.getCmp(negativos.id+'-list-garante');
							negativos.getReload(objg,{vp_op:'G',vp_id:data.id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});

							var objv = Ext.getCmp(negativos.id+'-list-solicitudes');
							negativos.getReload(objv,{VP_T_DOC:'P',VP_ID_PER:data.id_per,VP_DOC:''});
							negativos.setDataSolicitudXX(idx);
						}else{
							global.Msg({msg:"No existe una persona con el número de DNI Ingresado.",icon:2,fn:function(){}});
						}
                    }
                });
			},
			setDataSolicitudXX:function(idx){
				var grid=Ext.getCmp(negativos.id+'-grid-solicitudes');
				var record = grid.getStore().getAt(idx);
				var data =record.data;

				negativos.setDisabledBTNSolicitud(true);
				//negativos.setClearSolicitud();
				negativos.setReadOnlySolicitud(true);

				if(data.estado=='S'){//solicitado
					negativos.setDisabledBTNSolicitud(false);
					Ext.getCmp(negativos.id+'-sol-txt-estado-solicitud').setValue('SOLICITADO');
					negativos.setReadOnlySolicitud(false);
				}
				if(data.estado=='A'){
					//Ext.getCmp(negativos.id+'-btn-guardar-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-aprobar-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-nuevo-solicitud').setDisabled(bool);
					Ext.getCmp(negativos.id+'-btn-anular-solicitud').setDisabled(true);
					Ext.getCmp(negativos.id+'-sol-txt-estado-solicitud').setValue('APROBADO');
				}
				if(data.estado=='C'){//ASIGNADO A ASESOR
					//Ext.getCmp(negativos.id+'-btn-guardar-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-aprobar-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-nuevo-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-anular-solicitud').setDisabled(false);
					Ext.getCmp(negativos.id+'-sol-txt-estado-solicitud').setValue('EN COBRANZA');
				}
				if(data.estado=='F'){//ASIGNADO A ASESOR
					//Ext.getCmp(negativos.id+'-btn-guardar-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-aprobar-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-nuevo-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-anular-solicitud').setDisabled(false);
					Ext.getCmp(negativos.id+'-sol-txt-estado-solicitud').setValue('FINALIZADO');
				}

				Ext.getCmp(negativos.id+'-sol-date-fecha-solicitud').setValue(data.fecha_sol);
				Ext.getCmp(negativos.id+'-sol-cmb-agencia').setValue(data.id_age);
				
				var obja = Ext.getCmp(negativos.id+'-sol-cmb-asesor');
				negativos.getReload(obja,{vp_cod_age:data.id_age});

				Ext.getCmp(negativos.id+'-sol-txt-id-per').setValue(data.id_per);
				Ext.getCmp(negativos.id+'-sol-cmb-asesor').setValue(data.id_asesor);


				Ext.getCmp(negativos.id+'-sol-cmb-motivo').setValue(data.id_motivo);
				Ext.getCmp(negativos.id+'-sol-txt-id-solicitud').setValue(data.id_negativos);
				Ext.getCmp(negativos.id+'-sol-txt-nro-solicitud').setValue(data.nro_solicitud);
				Ext.getCmp(negativos.id+'-sol-cmb-moneda').setValue(data.moneda);
				Ext.getCmp(negativos.id+'-sol-txt-monto').setValue(data.monto_solicitado);
				Ext.getCmp(negativos.id+'-sol-txt-tipo-cliente').setValue(data.tipo_cliente);
				Ext.getCmp(negativos.id+'-sol-cmb-excepcion').setValue(data.excepcion);
				Ext.getCmp(negativos.id+'-sol-txt-import-aprobado').setValue(data.monto_aprobado);
				Ext.getCmp(negativos.id+'-sol-txt-numero-cuotas').setValue(data.nro_cuotas);
				Ext.getCmp(negativos.id+'-sol-txt-interes').setValue(data.interes);
				Ext.getCmp(negativos.id+'-sol-txt-mora').setValue(data.mora);
				Ext.getCmp(negativos.id+'-sol-date-fecha-1-letra').setValue(data.fecha_1ra_letra);
				Ext.getCmp(negativos.id + '-txt-nota').setValue(data.nota);

				
				var objc = Ext.getCmp(negativos.id + '-grid-cuotas');
				negativos.getReload(objc,{VP_CODIGO:data.id_negativos});
			},
			setDataSolicitud:function(idx){
				var grid=Ext.getCmp(negativos.id+'-grid-solicitudes');
				var record = grid.getStore().getAt(idx);
				var data =record.data;

				negativos.setDisabledBTNSolicitud(true);
				negativos.setClearSolicitud();
				negativos.setReadOnlySolicitud(true);

				if(data.estado=='S'){//solicitado
					negativos.setDisabledBTNSolicitud(false);
					Ext.getCmp(negativos.id+'-sol-txt-estado-solicitud').setValue('SOLICITADO');
					negativos.setReadOnlySolicitud(false);
				}
				if(data.estado=='A'){
					//Ext.getCmp(negativos.id+'-btn-guardar-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-aprobar-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-nuevo-solicitud').setDisabled(bool);
					Ext.getCmp(negativos.id+'-btn-anular-solicitud').setDisabled(true);
					Ext.getCmp(negativos.id+'-sol-txt-estado-solicitud').setValue('APROBADO');
				}
				if(data.estado=='C'){//ASIGNADO A ASESOR
					//Ext.getCmp(negativos.id+'-btn-guardar-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-aprobar-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-nuevo-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-anular-solicitud').setDisabled(false);
					Ext.getCmp(negativos.id+'-sol-txt-estado-solicitud').setValue('EN COBRANZA');
				}
				if(data.estado=='F'){//ASIGNADO A ASESOR
					//Ext.getCmp(negativos.id+'-btn-guardar-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-aprobar-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-nuevo-solicitud').setDisabled(bool);
					//Ext.getCmp(negativos.id+'-btn-anular-solicitud').setDisabled(false);
					Ext.getCmp(negativos.id+'-sol-txt-estado-solicitud').setValue('FINALIZADO');
				}

				Ext.getCmp(negativos.id+'-sol-date-fecha-solicitud').setValue(data.fecha_sol);
				Ext.getCmp(negativos.id+'-sol-cmb-agencia').setValue(data.id_age);
				
				var obja = Ext.getCmp(negativos.id+'-sol-cmb-asesor');
				negativos.getReload(obja,{vp_cod_age:data.id_age});

				Ext.getCmp(negativos.id+'-sol-txt-id-per').setValue(data.id_per);
				Ext.getCmp(negativos.id+'-sol-cmb-asesor').setValue(data.id_asesor);


				Ext.getCmp(negativos.id+'-sol-cmb-motivo').setValue(data.id_motivo);
				Ext.getCmp(negativos.id+'-sol-txt-id-solicitud').setValue(data.id_negativos);
				Ext.getCmp(negativos.id+'-sol-txt-nro-solicitud').setValue(data.nro_solicitud);
				Ext.getCmp(negativos.id+'-sol-cmb-moneda').setValue(data.moneda);
				Ext.getCmp(negativos.id+'-sol-txt-monto').setValue(data.monto_solicitado);
				Ext.getCmp(negativos.id+'-sol-txt-tipo-cliente').setValue(data.tipo_cliente);
				Ext.getCmp(negativos.id+'-sol-cmb-excepcion').setValue(data.excepcion);
				Ext.getCmp(negativos.id+'-sol-txt-import-aprobado').setValue(data.monto_aprobado);
				Ext.getCmp(negativos.id+'-sol-txt-numero-cuotas').setValue(data.nro_cuotas);
				Ext.getCmp(negativos.id+'-sol-txt-interes').setValue(data.interes);
				Ext.getCmp(negativos.id+'-sol-txt-mora').setValue(data.mora);
				Ext.getCmp(negativos.id+'-sol-date-fecha-1-letra').setValue(data.fecha_1ra_letra);
				Ext.getCmp(negativos.id + '-txt-nota').setValue(data.nota);

				
				var objc = Ext.getCmp(negativos.id + '-grid-cuotas');
				negativos.getReload(objc,{VP_CODIGO:data.id_negativos});
			},
			setCollapse:function(){
				/*try{
				var W = Ext.getCmp(inicio.id + '-contenedor').getWidth();
				if(W<1680){
					Ext.getCmp(negativos.id+'-panel-direccion').collapse();
				}else{
					Ext.getCmp(negativos.id+'-panel-direccion').expand();
				}
				}catch(e){}*/
			},
			getSelectUbi:function(){
				var obj=Ext.getCmp(negativos.id+'-sol-cmb-departamento');
				Ext.getCmp(negativos.id+'-sol-cmb-provincia').getStore().removeAll();
				Ext.getCmp(negativos.id+'-sol-cmb-Distrito').getStore().removeAll();
				negativos.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,'100101');
				var objp=Ext.getCmp(negativos.id+'-sol-cmb-provincia');
				Ext.getCmp(negativos.id+'-sol-cmb-Distrito').getStore().removeAll();
				negativos.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},objp,'100601');
				var objd=Ext.getCmp(negativos.id+'-sol-cmb-Distrito');
				negativos.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},objd,'100601');
			},
			setSaveSolicitud:function(op){
				/*DATOS DE SOLICITUD*/
				var vp_fecha_solicitud 	= Ext.getCmp(negativos.id+'-sol-date-fecha-solicitud').getRawValue();
				var vp_id_agencia 		= Ext.getCmp(negativos.id+'-sol-cmb-agencia').getValue();
				var vp_sol_id_per = Ext.getCmp(negativos.id+'-sol-txt-id-per').getValue();
				var vp_id_asesor 		= Ext.getCmp(negativos.id+'-sol-cmb-asesor').getValue();
				var vp_id_mot 			= Ext.getCmp(negativos.id+'-sol-cmb-motivo').getValue();
				var vp_id_solicitud 	= Ext.getCmp(negativos.id+'-sol-txt-id-solicitud').getValue();
				var vp_nro_solicitud 	= Ext.getCmp(negativos.id+'-sol-txt-nro-solicitud').getValue();
				var vp_moneda 			= Ext.getCmp(negativos.id+'-sol-cmb-moneda').getValue();
				var vp_monto 			= Ext.getCmp(negativos.id+'-sol-txt-monto').getValue();
				var vp_tipo_cliente 	= Ext.getCmp(negativos.id+'-sol-txt-tipo-cliente').getValue();
				var vp_excepcion 		= Ext.getCmp(negativos.id+'-sol-cmb-excepcion').getValue();
				var vp_import_aprobado 	= Ext.getCmp(negativos.id+'-sol-txt-import-aprobado').getValue();
				var vp_nro_cuotas 		= Ext.getCmp(negativos.id+'-sol-txt-numero-cuotas').getValue();

				var vp_interes  		= Ext.getCmp(negativos.id+'-sol-txt-interes').getValue();
				var vp_mora  	 		= Ext.getCmp(negativos.id+'-sol-txt-mora').getValue();


				var vp_fecha_1ra_letra 	= Ext.getCmp(negativos.id+'-sol-date-fecha-1-letra').getRawValue();
				var vp_nota 			= Ext.getCmp(negativos.id + '-txt-nota').getValue();


				

				if(vp_fecha_solicitud==''){
					global.Msg({msg:"Ingrese la fecha de la Solicitud.",icon:2,fn:function(){}});
					return false;
				}

				if(vp_id_agencia==''){
					global.Msg({msg:"Seleccione la agencia.",icon:2,fn:function(){}});
					return false;
				}
				if(vp_id_asesor==''){
					global.Msg({msg:"Seleccione un asesor.",icon:2,fn:function(){}});
					return false;
				}
				if(vp_id_mot==''){
					global.Msg({msg:"Seleccione un motivo.",icon:2,fn:function(){}});
					return false;
				}

				if(vp_moneda==''){
					global.Msg({msg:"Seleccione la Moneda.",icon:2,fn:function(){}});
					return false;
				}

				if(vp_monto==''){
					global.Msg({msg:"Ingrese el Monto Solicitado.",icon:2,fn:function(){}});
					return false;
				}

				if(vp_tipo_cliente==''){
					global.Msg({msg:"Seleccione el tipo de cliente.",icon:2,fn:function(){}});
					return false;
				}

				if(vp_import_aprobado==''){
					global.Msg({msg:"Ingrese Importe Aprobado.",icon:2,fn:function(){}});
					return false;
				}
				if(vp_nro_cuotas==''){
					global.Msg({msg:"Ingrese El número de Cuotas.",icon:2,fn:function(){}});
					return false;
				}
				if(vp_interes==''){
					global.Msg({msg:"Ingrese el interés.",icon:2,fn:function(){}});
					return false;
				}
				if(vp_mora==''){
					global.Msg({msg:"Ingrese la mora.",icon:2,fn:function(){}});
					return false;
				}

				if(vp_fecha_1ra_letra==''){
					global.Msg({msg:"Ingrese Fecha 1ra Letra.",icon:2,fn:function(){}});
					return false;
				}

				var msn='';				
				if(op=='I'){
					op=(vp_id_solicitud=='' || vp_id_solicitud==0)?'I':'U';
					msn=op=='I'?'¿Seguro de generar el crédito?':'¿Seguro de actualizar el crédito?';
				}
				if(op=='U'){
					op=(vp_id_solicitud=='' || vp_id_solicitud==0)?'I':'U';
					msn=op=='I'?'¿Seguro de generar el crédito?':'¿Seguro de actualizar el crédito?';
				}

				if(op=='A'){
					if(!vp_id_solicitud){
						global.Msg({msg:"Seleccione una solicitud.",icon:2,fn:function(){}});
						return false;
					}
					msn='¿Seguro de aprobar el crédito?';
				}
				if(op=='X'){
					if(!vp_id_solicitud){
						global.Msg({msg:"Seleccione una solicitud.",icon:2,fn:function(){}});
						return false;
					}
					msn='¿Seguro de Anular el crédito?';
				}
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(negativos.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:negativos.url+'setSavenegativos/',
			                    params:{
			                    	vp_op 				:op,
			                    	vp_fecha_solicitud	:vp_fecha_solicitud,
									vp_id_agencia		:vp_id_agencia,
									vp_sol_id_per		:vp_sol_id_per,
									vp_id_asesor		:vp_id_asesor,
									vp_id_mot			:vp_id_mot,
									vp_id_solicitud		:vp_id_solicitud,
									vp_nro_solicitud	:vp_nro_solicitud,
									vp_moneda			:vp_moneda,
									vp_monto 			:vp_monto,
									vp_tipo_cliente		:vp_tipo_cliente,
									vp_excepcion		:vp_excepcion,
									vp_import_aprobado	:vp_import_aprobado,
									vp_nro_cuotas		:vp_nro_cuotas, 
									vp_interes			:vp_interes,
									vp_mora 			:vp_mora,
									vp_fecha_1ra_letra	:vp_fecha_1ra_letra,
									vp_resena 			:vp_nota,
									vp_flag 			:'A'
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(negativos.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	var vp_dni = Ext.getCmp(negativos.id+'-sol-txt-doc-dni').getValue();
			                                	Ext.getCmp(negativos.id+'-txt-dni').setValue(vp_dni);
			                                	negativos.getListaSolicitudes(vp_dni);
			                                	negativos.setDataSolicitud(negativos.idx);
			                                	//Ext.getCmp(negativos.id+'-select-garante').setValue('');
			                                	//var objp = Ext.getCmp(negativos.id+'-list-garante');
												//negativos.getReload(objp,{vp_op:'G',vp_id:vp_sol_id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});
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
			setSavenegativos:function(forma){
				
				var vp_sol_id_cli = Ext.getCmp(negativos.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(negativos.id+'-sol-txt-id-per').getValue();


				var sol_ape_pat = Ext.getCmp(negativos.id+'-sol-txt-apellido-paterno').getValue();
				var sol_ape_mat = Ext.getCmp(negativos.id+'-sol-txt-apellido-materno').getValue();
				var sol_nombres = Ext.getCmp(negativos.id+'-sol-txt-nombres').getValue();
				var sol_sexo = Ext.getCmp(negativos.id+'-sol-cmb-sexo').getValue();
				var sol_doc_dni = Ext.getCmp(negativos.id+'-sol-txt-doc-dni').getValue();
				var sol_doc_ce = Ext.getCmp(negativos.id+'-sol-txt-doc-ce').getValue();
				var sol_doc_cip = Ext.getCmp(negativos.id+'-sol-txt-doc-cip').getValue();
				var sol_doc_ruc = Ext.getCmp(negativos.id+'-sol-txt-doc-ruc').getValue();
				var sol_doc_cm = Ext.getCmp(negativos.id+'-sol-txt-doc-cm').getValue();
				var sol_estado_civil = Ext.getCmp(negativos.id+'-sol-cmb-estado-civil').getValue();
				var sol_fecha_nac = Ext.getCmp(negativos.id+'-sol-date-fecha-nac').getRawValue();

				/*var sol_domi_propio = Ext.getCmp(negativos.id+'-sol-chk-domi-propio').getValue();
				sol_domi_propio = sol_domi_propio?'S':'N';
				var sol_domi_pagando = Ext.getCmp(negativos.id+'-sol-chk-domi-pagando').getValue();
				sol_domi_pagando = sol_domi_pagando?'S':'N';
				var sol_domi_alquilado = Ext.getCmp(negativos.id+'-sol-chk-domi-alquilado').getValue();
				sol_domi_alquilado = sol_domi_alquilado?'S':'N';
				var sol_domi_familiar = Ext.getCmp(negativos.id+'-sol-chk-domi-familiar').getValue();
				sol_domi_familiar = sol_domi_familiar?'S':'N';*/

				var sol_domicilio = Ext.getCmp(negativos.id+'-sol-cmb-domicilio').getValue();
				var sol_estudios = Ext.getCmp(negativos.id+'-sol-cmb-estudios').getValue();
				var sol_profesion = Ext.getCmp(negativos.id+'-sol-txt-profesion').getValue();
				var sol_laboral = Ext.getCmp(negativos.id+'-sol-cmb-laboral').getValue();
				var sol_cargo = Ext.getCmp(negativos.id+'-sol-txt-cargo').getValue();
				var sol_centro_trabajo = Ext.getCmp(negativos.id+'-sol-txt-centro-trabajo').getValue();
				var sol_fecha_ingreso = Ext.getCmp(negativos.id+'-sol-date-fecha-ingreso').getRawValue();


				var vp_sol_id_tel = Ext.getCmp(negativos.id+'-sol-txt-id-tel').getValue();
				var vp_sol_id_dir = Ext.getCmp(negativos.id+'-sol-txt-id-dir').getValue();

				var op =forma;
				if(op!='D'){
					op = vp_sol_id_cli!=0?'U':'I';

					if(sol_ape_pat==''){
						global.Msg({msg:"Ingrese el Apellido Paterno.",icon:2,fn:function(){}});
						return false;
					}

					if(sol_ape_mat==''){
						global.Msg({msg:"Ingrese el Apellido Materno.",icon:2,fn:function(){}});
						return false;
					}

					if(sol_nombres==''){
						global.Msg({msg:"Ingrese el Nombre.",icon:2,fn:function(){}});
						return false;
					}

					if(sol_sexo==''){
						global.Msg({msg:"Ingrese el Sexo.",icon:2,fn:function(){}});
						return false;
					}

					if(sol_doc_dni==''){
						global.Msg({msg:"Ingrese el DNI.",icon:2,fn:function(){}});
						return false;
					}
					if(sol_estado_civil==''){
						global.Msg({msg:"Ingrese el Estado Civil.",icon:2,fn:function(){}});
						return false;
					}
					if(sol_fecha_nac==''){
						global.Msg({msg:"Ingrese la fecha de nacimiento.",icon:2,fn:function(){}});
						return false;
					}

					if(vp_sol_id_tel==''){
						vp_sol_id_tel = 0;
					}

					if(vp_sol_id_dir==''){
						vp_sol_id_dir = 0;
					}

				}else{
					if(vp_sol_id_cli==0){
						global.Msg({msg:"No es posible Eliminar, aun no existe un registro en la base datos.",icon:2,fn:function(){}});
						return false;
					}
					if(vp_sol_id_per==0){
						global.Msg({msg:"No es posible Eliminar, aun no existe un registro en la base datos.",icon:2,fn:function(){}});
						return false;
					}
				}

				negativos.setSaveDatanegativos(op=='D'?'¿Seguro de Eliminar?':'¿Seguro de guardar?',
					{
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

						vp_sol_domicilio:sol_domicilio,
						vp_sol_estudios:sol_estudios,
						vp_sol_profesion:sol_profesion,
						vp_sol_laboral:sol_laboral,
						vp_sol_cargo:sol_cargo,
						vp_sol_centro_trabajo:sol_centro_trabajo,
						vp_sol_fecha_ingreso:sol_fecha_ingreso,

						vp_id_tel:vp_sol_id_tel,
						vp_id_dir:vp_sol_id_dir,

						vp_sol_img:'',
						vp_flag:'A'
                    }
				);
			},
			setSavenegativosConyugue:function(forma){
				var vp_sol_id_per = Ext.getCmp(negativos.id+'-sol-txt-id-per').getValue();

				var sol_doc_dni = Ext.getCmp(negativos.id+'-select-conyugue').getValue();
				/*var sol_doc_ce = Ext.getCmp(negativos.id+'-sol-txt-doc-ce').getValue();
				var sol_doc_cip = Ext.getCmp(negativos.id+'-sol-txt-doc-cip').getValue();
				var sol_doc_ruc = Ext.getCmp(negativos.id+'-sol-txt-doc-ruc').getValue();
				var sol_doc_cm = Ext.getCmp(negativos.id+'-sol-txt-doc-cm').getValue();*/

				var op =forma;
				if(vp_sol_id_per==0){
					global.Msg({msg:"No es posible Eliminar, aun no existe un registro en la base datos.",icon:2,fn:function(){}});
					return false;
				}
				if(sol_doc_dni==''){
					global.Msg({msg:"Ingrese el DNI.",icon:2,fn:function(){}});
					return false;
				}

				var msn=op=='Z'?'¿Seguro de quitar relación?':'¿Seguro de Relacionar negativos?';
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(negativos.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:negativos.url+'setSavenegativos/',
			                    params:{
			                    	vp_op:op,
									vp_sol_id_per:vp_sol_id_per,
									vp_sol_doc_dni:sol_doc_dni,
									vp_flag:'A'
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(negativos.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	Ext.getCmp(negativos.id+'-select-conyugue').setValue('');
			                                	var objp = Ext.getCmp(negativos.id+'-list-Conyugues');
												negativos.getReload(objp,{vp_op:'Y',vp_id:vp_sol_id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});
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
			setSavenegativosGarante:function(forma){
				var vp_sol_id_per = Ext.getCmp(negativos.id+'-sol-txt-id-per').getValue();

				var sol_doc_dni = Ext.getCmp(negativos.id+'-select-garante').getValue();
				/*var sol_doc_ce = Ext.getCmp(negativos.id+'-sol-txt-doc-ce').getValue();
				var sol_doc_cip = Ext.getCmp(negativos.id+'-sol-txt-doc-cip').getValue();
				var sol_doc_ruc = Ext.getCmp(negativos.id+'-sol-txt-doc-ruc').getValue();
				var sol_doc_cm = Ext.getCmp(negativos.id+'-sol-txt-doc-cm').getValue();*/

				var op =forma;
				if(vp_sol_id_per==0){
					global.Msg({msg:"No es posible Eliminar, aun no existe un registro en la base datos.",icon:2,fn:function(){}});
					return false;
				}
				if(sol_doc_dni==''){
					global.Msg({msg:"Ingrese el DNI.",icon:2,fn:function(){}});
					return false;
				}

				var msn=op=='G'?'¿Seguro de quitar relación?':'¿Seguro de Relacionar negativos?';
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(negativos.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:negativos.url+'setSavenegativos/',
			                    params:{
			                    	vp_op:op,
									vp_sol_id_per:vp_sol_id_per,
									vp_sol_doc_dni:sol_doc_dni,
									vp_flag:'A'
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(negativos.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	Ext.getCmp(negativos.id+'-select-garante').setValue('');
			                                	var objp = Ext.getCmp(negativos.id+'-list-garante');
												negativos.getReload(objp,{vp_op:'G',vp_id:vp_sol_id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});
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
			setSaveDatanegativos:function(msn,params){
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(negativos.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:negativos.url+'setSavenegativos/',
			                    params:params,
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(negativos.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//negativos.getHistory();
			                                	if(params.vp_op!='D'){
				                                	Ext.getCmp(negativos.id+'-sol-txt-id-cli').setValue(res.CODIGO);
				                                	Ext.getCmp(negativos.id+'-sol-txt-id-per').setValue(res.ID_PER);
				                            	}else{
				                            		Ext.getCmp(negativos.id+'-win-form').close();
				                            	}
				                            	var obj = Ext.getCmp(negativos.id+'-list-telefonos');
					                            negativos.getReload(obj,{vp_op:'P',vp_id:res.ID_PER,vp_flag:'A'});
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
			getListaSolicitudes:function(dato){ 
				negativos.setClearnegativos();
				negativos.setDisabledBTNSolicitud(false);
				negativos.setClearSolicitud();

				Ext.Ajax.request({
                    url:negativos.url+'getListPersona/',
                    params:{
                    	vp_op:'D',
						vp_id:0,
						vp_dni:dato,
						vp_nombres:''
                    },
                    timeout: 30000000,
                    success: function(response, options){
                        Ext.getCmp(negativos.id+'-win-form').el.unmask();
                        var res = Ext.JSON.decode(response.responseText);
                        console.log(res.data[0]);
                        var data = res.data[0];
                        if(data){
	                        Ext.getCmp(negativos.id+'-sol-txt-id-cli').setValue(negativos.id_id);
	                        Ext.getCmp(negativos.id+'-sol-txt-id-per').setValue(data.id_per);
							Ext.getCmp(negativos.id+'-sol-txt-apellido-paterno').setValue(data.ape_pat);
							Ext.getCmp(negativos.id+'-sol-txt-apellido-materno').setValue(data.ape_mat);
							Ext.getCmp(negativos.id+'-sol-txt-nombres').setValue(data.nombres);
							Ext.getCmp(negativos.id+'-sol-cmb-sexo').setValue(data.sexo);
							Ext.getCmp(negativos.id+'-sol-txt-doc-dni').setValue(data.doc_dni);
							Ext.getCmp(negativos.id+'-sol-txt-doc-ce').setValue(data.doc_ce);
							Ext.getCmp(negativos.id+'-sol-txt-doc-cip').setValue(data.doc_cip);
							Ext.getCmp(negativos.id+'-sol-txt-doc-ruc').setValue(data.doc_ruc);
							Ext.getCmp(negativos.id+'-sol-txt-doc-cm').setValue(data.doc_cm);
							Ext.getCmp(negativos.id+'-sol-cmb-estado-civil').setValue(data.estado_civil);
							Ext.getCmp(negativos.id+'-sol-date-fecha-nac').setValue(data.fecha_nac);

							
							/*Ext.getCmp(negativos.id+'-sol-chk-domi-propio').setValue(data.domi_propio=='S'?true:false);
							Ext.getCmp(negativos.id+'-sol-chk-domi-pagando').setValue(data.domi_pagando=='S'?true:false);
							Ext.getCmp(negativos.id+'-sol-chk-domi-alquilado').setValue(data.domi_alquilado=='S'?true:false);
							Ext.getCmp(negativos.id+'-sol-chk-domi-familiar').setValue(data.domi_familiar=='S'?true:false);*/

							Ext.getCmp(negativos.id+'-sol-cmb-domicilio').setValue(data.domicilio);
							Ext.getCmp(negativos.id+'-sol-cmb-estudios').setValue(data.estudios);
							Ext.getCmp(negativos.id+'-sol-txt-profesion').setValue(data.profesion);
							Ext.getCmp(negativos.id+'-sol-cmb-laboral').setValue(data.laboral);
							Ext.getCmp(negativos.id+'-sol-txt-cargo').setValue(data.cargo);
							Ext.getCmp(negativos.id+'-sol-txt-centro-trabajo').setValue(data.id_empresa);
							Ext.getCmp(negativos.id+'-sol-date-fecha-ingreso').setValue(data.fecha_ingreso);

							//Ext.getCmp(negativos.id+'-sol-txt-id-tel').setValue(data.id_tel);
							Ext.getCmp(negativos.id+'-sol-txt-id-dir').setValue(data.id_dir);
							var obj = Ext.getCmp(negativos.id+'-list-telefonos');
							negativos.getReload(obj,{vp_op:'P',vp_id:data.id_per,vp_flag:'A'});

							

							//var obj = Ext.getCmp(negativos.id+'-sol-documentos-adjuntos');
							//negativos.getReload(obj,{vp_sol_id_per:data.id_per,vp_flag:'A'}); 
							win.getGalery({container:'contenedor-documentos',forma:'L',url:negativos.url+'get_list_documentos/',params:{vp_sol_id_per:data.id_per,vp_flag:'A'} });

							if(data.id_dir!=0){
								negativos.getDirecciones(data.id_dir);
							}else{
								negativos.getSelectUbi();
							}
							//var objd = Ext.getCmp(negativos.id+'-list-direcciones');
							//negativos.getReload(objd,{vp_op:'R',vp_id:data.id_per,vp_nombre:''});

							if(data.img!==''){
								var img = '/persona/'+data.id_per+'/PHOTO/'+data.img;
								negativos.setPhotoForm(img,data.ape_pat+' '+data.ape_mat +', '+data.nombres);
							}

							var objp = Ext.getCmp(negativos.id+'-list-Conyugues');
							negativos.getReload(objp,{vp_op:'Y',vp_id:data.id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});

							var objg = Ext.getCmp(negativos.id+'-list-garante');
							negativos.getReload(objg,{vp_op:'G',vp_id:data.id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});

							var objv = Ext.getCmp(negativos.id+'-list-solicitudes');
							negativos.getReload(objv,{VP_T_DOC:'P',VP_ID_PER:data.id_per,VP_DOC:''});
						}else{
							global.Msg({msg:"No existe una persona con el número de DNI Ingresado.",icon:2,fn:function(){}});
						}
                    }
                });
			},
			getDirecciones:function(id){
				Ext.Ajax.request({
                    url:negativos.url+'getListDirecciones/',
                    params:{
                    	vp_op:'C',
						vp_id:id,
						vp_nombres:''
                    },
                    timeout: 30000000,
                    success: function(response, options){
                        Ext.getCmp(negativos.id+'-win-form').el.unmask();
                        var res = Ext.JSON.decode(response.responseText);
                        console.log(res.data[0]);
                        var data = res.data[0];

                        Ext.getCmp(negativos.id+'-sol-txt-id-dir').setValue(data.id_dir);
						Ext.getCmp(negativos.id+'-sol-txt-dir-direccion').setValue(data.dir_direccion);
						Ext.getCmp(negativos.id+'-sol-txt-dir-numero').setValue(data.dir_numero);
						Ext.getCmp(negativos.id+'-sol-txt-dir-mz').setValue(data.dir_mz);
						Ext.getCmp(negativos.id+'-sol-txt-dir-lt').setValue(data.dir_lt);
						Ext.getCmp(negativos.id+'-sol-txt-dir-dpto').setValue(data.dir_dpto);
						Ext.getCmp(negativos.id+'-sol-txt-dir-interior').setValue(data.dir_interior);
						Ext.getCmp(negativos.id+'-sol-txt-dir-urb').setValue(data.dir_urb);
						Ext.getCmp(negativos.id+'-sol-txt-dir-referencia').setValue(data.dir_referencia);

						/*DIRECCIONES*/
						var obj=Ext.getCmp(negativos.id+'-sol-cmb-departamento');
						Ext.getCmp(negativos.id+'-sol-cmb-provincia').getStore().removeAll();
						Ext.getCmp(negativos.id+'-sol-cmb-Distrito').getStore().removeAll();
						negativos.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,data.cod_ubi_dep); 

						var objp=Ext.getCmp(negativos.id+'-sol-cmb-provincia');
						Ext.getCmp(negativos.id+'-sol-cmb-Distrito').getStore().removeAll();
						negativos.getUbigeo({VP_OP:'P',VP_VALUE:data.cod_ubi_dep},objp,data.cod_ubi_pro);

						var objd=Ext.getCmp(negativos.id+'-sol-cmb-Distrito');
						negativos.getUbigeo({VP_OP:'X',VP_VALUE:data.cod_ubi_pro},objd,data.cod_ubi);

						//Ext.getCmp(negativos.id+'-sol-cmb-departamento').setValue(data.cod_ubi_dep);
						//Ext.getCmp(negativos.id+'-sol-cmb-provincia').setValue(data.cod_ubi_pro);
						//Ext.getCmp(negativos.id+'-sol-cmb-Distrito').setValue(data.cod_ubi);
                    }
                });
			},
			setClearnegativos:function(){
				//Ext.getCmp(negativos.id+'-sol-txt-id-per').setValue(0);
				Ext.getCmp(negativos.id+'-sol-txt-apellido-paterno').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-apellido-materno').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-nombres').setValue('');
				Ext.getCmp(negativos.id+'-sol-cmb-sexo').setValue('M');
				Ext.getCmp(negativos.id+'-sol-txt-doc-dni').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-doc-ce').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-doc-cip').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-doc-ruc').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-doc-cm').setValue('');
				Ext.getCmp(negativos.id+'-sol-cmb-estado-civil').setValue('S');
				Ext.getCmp(negativos.id+'-sol-txt-centro-trabajo').setValue('0');
				Ext.getCmp(negativos.id+'-sol-date-fecha-nac').setValue('');

				
				/*Ext.getCmp(negativos.id+'-sol-chk-domi-propio').setValue(false);
				Ext.getCmp(negativos.id+'-sol-chk-domi-pagando').setValue(false);
				Ext.getCmp(negativos.id+'-sol-chk-domi-alquilado').setValue(false);
				Ext.getCmp(negativos.id+'-sol-chk-domi-familiar').setValue(false);*/

				Ext.getCmp(negativos.id+'-sol-cmb-domicilio').setValue('PRO');
				Ext.getCmp(negativos.id+'-sol-cmb-estudios').setValue('OT');
				Ext.getCmp(negativos.id+'-sol-txt-profesion').setValue('');
				Ext.getCmp(negativos.id+'-sol-cmb-laboral').setValue('OT');
				Ext.getCmp(negativos.id+'-sol-txt-cargo').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-centro-trabajo').setValue('');
				Ext.getCmp(negativos.id+'-sol-date-fecha-ingreso').setValue('');

				//Ext.getCmp(negativos.id+'-sol-txt-id-tel').setValue(0);
				//Ext.getCmp(negativos.id+'-sol-txt-id-dir').setValue(0);
				Ext.getCmp(negativos.id+'-list-telefonos').getStore().removeAll();
				//negativos.getReload(obj,{vp_op:'P',vp_id:0,vp_flag:'A'});

				

				//var obj = Ext.getCmp(persona.id+'-sol-documentos-adjuntos');
				//persona.getReload(obj,{vp_sol_id_per:data.id_per,vp_flag:'A'}); 
				win.getGalery({container:'contenedor-documentos',forma:'L',url:negativos.url+'get_list_documentos/',params:{vp_sol_id_per:0,vp_flag:'A'} });

				negativos.getSelectUbi();
				
				//persona.getReload(objd,{vp_op:'R',vp_id:0,vp_nombre:''});

				var img = '/images/photo.png';
				negativos.setPhotoForm(img,'ANONIMO');

				Ext.getCmp(negativos.id+'-list-Conyugues').getStore().removeAll();
				//persona.getReload(objp,{vp_op:'Y',vp_id:0,vp_dni:'',vp_nombres:'',vp_flag:'A'});

				Ext.getCmp(negativos.id+'-list-garante').getStore().removeAll();
				//persona.getReload(objg,{vp_op:'G',vp_id:0,vp_dni:'',vp_nombres:'',vp_flag:'A'});

				//negativos.setClearTelefono();
				negativos.setClearDireccion();
			},
			setSavenegativosIMG:function(){
				var vp_sol_id_cli = Ext.getCmp(negativos.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(negativos.id+'-sol-txt-id-per').getValue();



			},
			setClearTelefono:function(){
				//Ext.getCmp(negativos.id+'-sol-txt-id-tel').setValue(0);
				Ext.getCmp(negativos.id+'-sol-cmb-tipo-tel').setValue('CE');
				Ext.getCmp(negativos.id+'-sol-cmb-line-tel').setValue('CL');
				Ext.getCmp(negativos.id+'-sol-txt-tel-cel').setValue('');
				Ext.getCmp(negativos.id+'-sol-cmb-tel-estado').setValue('A');
			},
			setSaveTelefono:function(forma){
				var vp_sol_id_cli = Ext.getCmp(negativos.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(negativos.id+'-sol-txt-id-per').getValue();
				var vp_sol_id_tel = Ext.getCmp(negativos.id+'-sol-txt-id-tel').getValue();

				if(vp_sol_id_per=='' || vp_sol_id_per == 0){
					global.Msg({msg:"Debe guardar los datos de la negativos antes.",icon:2,fn:function(){}});
					return false;
				}

				var vp_sol_tipo_tel = Ext.getCmp(negativos.id+'-sol-cmb-tipo-tel').getValue();
				var vp_sol_line_tel = Ext.getCmp(negativos.id+'-sol-cmb-line-tel').getValue();
				var vp_flag = Ext.getCmp(negativos.id+'-sol-cmb-tel-estado').getValue();
				var sol_tel_cel = Ext.getCmp(negativos.id+'-sol-txt-tel-cel').getValue();

				var op =forma;
				if(op!='D'){
					var op = vp_sol_id_tel!=0?'U':'I';

					if(vp_sol_tipo_tel==''){
						global.Msg({msg:"Ingrese un tipo de teléfono.",icon:2,fn:function(){}});
						return false;
					}

					if(vp_sol_line_tel==''){
						global.Msg({msg:"Ingrese un operador de teléfono.",icon:2,fn:function(){}});
						return false;
					}

					if(sol_tel_cel==''){
						global.Msg({msg:"Ingrese un número de teléfono.",icon:2,fn:function(){}});
						return false;
					}
				}else{
					if(vp_sol_id_tel==''){
						global.Msg({msg:"Seleccione un teléfono a eliminar dando doble Click en la lista.",icon:2,fn:function(){}});
						return false;
					}
				}

				

				negativos.setSaveTelefonoData({vp_op:op,vp_sol_id_per:vp_sol_id_per,vp_sol_id_tel:vp_sol_id_tel,vp_sol_tel_cel:sol_tel_cel,vp_sol_tipo_tel:vp_sol_tipo_tel,vp_sol_line_tel:vp_sol_line_tel,vp_flag:vp_flag},'¿Seguro de guardar?');
			},
			setSaveTelefonoData:function(params,msn){
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(negativos.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:negativos.url+'setSavePhone/',
			                    params:params,
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(negativos.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//negativos.getHistory();
			                                	//Ext.getCmp(negativos.id+'-sol-txt-id-tel').setValue(res.CODIGO);
			                                	negativos.setClearTelefono();
			                                	var obj = Ext.getCmp(negativos.id+'-list-telefonos');
				                            	negativos.getReload(obj,{vp_op:'P',vp_id:params.vp_sol_id_per,vp_flag:'A'});
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
			setClearDireccion:function(){
				//Ext.getCmp(negativos.id+'-sol-txt-id-dir').setValue(0);
				Ext.getCmp(negativos.id+'-sol-txt-dir-direccion').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-dir-numero').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-dir-mz').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-dir-lt').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-dir-dpto').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-dir-interior').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-dir-urb').setValue('');
				Ext.getCmp(negativos.id+'-sol-txt-dir-referencia').setValue('');
				//Ext.getCmp(negativos.id+'-list-direcciones').getStore().removeAll();
			},
			setSaveDireccion:function(){

				var vp_sol_id_cli = Ext.getCmp(negativos.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(negativos.id+'-sol-txt-id-per').getValue();
				
				var vp_sol_id_dir = Ext.getCmp(negativos.id+'-sol-txt-id-dir').getValue();
				var vp_op = vp_sol_id_dir==0?'I':'U';
				var sol_dir_direccion = Ext.getCmp(negativos.id+'-sol-txt-dir-direccion').getValue();
				var sol_dir_numero = Ext.getCmp(negativos.id+'-sol-txt-dir-numero').getValue();
				var sol_dir_mz = Ext.getCmp(negativos.id+'-sol-txt-dir-mz').getValue();
				var sol_dir_lt = Ext.getCmp(negativos.id+'-sol-txt-dir-lt').getValue();
				var sol_dir_dpto = Ext.getCmp(negativos.id+'-sol-txt-dir-dpto').getValue();
				var sol_dir_interior = Ext.getCmp(negativos.id+'-sol-txt-dir-interior').getValue();
				var sol_dir_urb = Ext.getCmp(negativos.id+'-sol-txt-dir-urb').getValue();
				var sol_dir_referencia = Ext.getCmp(negativos.id+'-sol-txt-dir-referencia').getValue();
				var sol_departamento = Ext.getCmp(negativos.id+'-sol-cmb-departamento').getValue();
				var sol_provincia = Ext.getCmp(negativos.id+'-sol-cmb-provincia').getValue();
				var sol_distrito = Ext.getCmp(negativos.id+'-sol-cmb-Distrito').getValue();

				if(vp_sol_id_per=='' || vp_sol_id_per == 0){
					global.Msg({msg:"Debe guardar los datos de la negativos antes.",icon:2,fn:function(){}});
					return false;
				}

				global.Msg({
                    msg: '¿Seguro de guardar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(negativos.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:negativos.url+'setSaveDireccion/',
			                    params:{
			                    	vp_op:vp_op,
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
			                        Ext.getCmp(negativos.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//negativos.getHistory();
			                                	//Ext.getCmp(negativos.id+'-win-form').close();
			                                	var objd = Ext.getCmp(negativos.id+'-list-direcciones');
												negativos.getReload(objd,{vp_op:'R',vp_id:vp_sol_id_per,vp_nombre:''});
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
			setDeleteDir:function(id_dir){
				var vp_sol_id_per = Ext.getCmp(negativos.id+'-sol-txt-id-per').getValue();
				global.Msg({
                    msg: '¿Seguro de Eliminar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(negativos.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:negativos.url+'setSaveDireccion/',
			                    params:{
			                    	vp_op:'D',
			                    	vp_sol_id_per:vp_sol_id_per,
									vp_sol_id_dir:id_dir
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(negativos.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//negativos.getHistory();
			                                	//Ext.getCmp(negativos.id+'-win-form').close();
			                                	var objd = Ext.getCmp(negativos.id+'-list-direcciones');
												negativos.getReload(objd,{vp_op:'R',vp_id:vp_sol_id_per,vp_nombre:''});
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
	                	//Ext.getCmp(negativos.id+'-form').el.unmask();
	                	obj.setValue(value);
	                }
	            });
			},
			getReload:function(obj,json){
		    	obj.getStore().removeAll();
				obj.getStore().load(
	                {params: json,
	                callback:function(){
	                }
	            });
			},
			setBack:function(){
				var tab=Ext.getCmp(negativos.id+'-tabContent');
				var active=Ext.getCmp(negativos.id+negativos.back);
				tab.setActiveTab(active);
			},
			getnegativos:function(){
				var vp_op=Ext.getCmp(negativos.id+'-txt-estado-filter').getValue();
            	var vp_nombre=Ext.getCmp(negativos.id+'-txt-negativos').getValue();
		            Ext.getCmp(negativos.id+'-menu-view').getStore().removeAll();
				Ext.getCmp(negativos.id+'-menu-view').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:vp_nombre},
	                callback:function(){
	                	//Ext.getCmp(negativos.id+'-form').el.unmask();
	                }
	            });
			},
			getClientes:function(vp_id){
				var vp_op=Ext.getCmp(negativos.id+'-txt-estado-filter').getValue();
            	var vp_nombre=Ext.getCmp(negativos.id+'-txt-negativos').getValue();
		        Ext.getCmp(negativos.id+'-list-clientes').getStore().removeAll();
				Ext.getCmp(negativos.id+'-list-clientes').getStore().load(
	                {params: {vp_op:vp_op,vp_id:vp_id},
	                callback:function(){
	                	//Ext.getCmp(negativos.id+'-form').el.unmask();
	                }
	            });
			},
			getEdit:function(index){
				var rec = Ext.getCmp(negativos.id + '-grid-negativos').getStore().getAt(index);
				negativos.setForm('U',rec.data);
			},
			getNew:function(){
				negativos.setForm('I',{id_negativos:0,usr_codigo:'',usr_nombre:'',usr_perfil:1,usr_estado:1});
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
			setSavenegativos:function(op){

		    	var codigo = Ext.getCmp(negativos.id+'-txt-codigo').getValue();
		    	var usuario = Ext.getCmp(negativos.id+'-txt-usuario-negativos').getValue();
		    	var clave = Ext.getCmp(negativos.id+'-txt-clave').getValue();
		    	var nombre = Ext.getCmp(negativos.id+'-txt-nombre-negativos').getValue();
		    	var perfil = Ext.getCmp(negativos.id+'-cmb-perfil').getValue();
		    	var estado = Ext.getCmp(negativos.id+'-cmb-estado-negativos').getValue();

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
                    		Ext.getCmp(negativos.id+'-win-form').el.mask('Elinando Páginas…', 'x-mask-loading');
	                        scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:control.url+'set_save/',
			                    params:{
			                    	vp_op:op,
			                    	vp_id_negativos:codigo,
			                    	vp_usr_codigo:usuario,
			                    	vp_usr_passwd:clave,
			                    	vp_usr_nombre:nombre,
			                    	vp_usr_perfil:perfil,
			                    	vp_usr_estado:estado
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                        Ext.getCmp(negativos.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	negativos.getHistory();
			                                	Ext.getCmp(negativos.id+'-win-form').close();
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
		    	var vp_op = Ext.getCmp(negativos.id+'-txt-estado-filter').getValue();
				var nombre = Ext.getCmp(negativos.id+'-txt-negativos').getValue();

		    	Ext.getCmp(negativos.id + '-grid-negativos').getStore().removeAll();
				Ext.getCmp(negativos.id + '-grid-negativos').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:nombre},
	                callback:function(){
	                	//Ext.getCmp(negativos.id+'-form').el.unmask();
	                }
	            });
	            
		    },
			getImagen:function(param){
				win.getGalery({container:'GaleryFull',width:390,height:250,params:{forma:'F',img_path:'/negativos/icon/'+param}});///negativos/
			},
			getContratos:function(shi_codigo){
				Ext.getCmp(negativos.id+'-cbx-contrato').getStore().removeAll();
				Ext.getCmp(negativos.id+'-cbx-contrato').getStore().load(
	                {params: {vp_shi_codigo:shi_codigo},
	                callback:function(){
	                	//Ext.getCmp(negativos.id+'-form').el.unmask();
	                }
	            });
			},
			getAddMagicRefresh:function(url){
			    var symbol = '?';//url.indexOf('?') == -1 ? '?' : '&';
			    var magic = Math.random()*999999;
			    return url + symbol + 'magic=' + magic;
			},
			setPhotoForm:function(img,nombre){
				var img = negativos.getAddMagicRefresh(img);
				win.getGalery({container:'imagen-contenedor',forma:'F',width:170,height:200,params:{img_path:img,title:nombre}});
				/*
				var panel = Ext.getCmp(negativos.id + '-photo-person');
				panel.removeAll();
				panel.add({
                    html: '<img id="imagen-negativos" src="'+img+'" style="width:100%; height:"100%;overflow: scroll;" />',
                    border:false,
                    bodyStyle: 'background: transparent;text-align:center;'//style=""
                });

                panel.doLayout();

                var image = document.getElementById('imagen-negativos');
				var downloadingImage = new Image();
				downloadingImage.onload = function(){
				    image.src = this.src;
	                Ext.getCmp(negativos.id + '-photo-person').doLayout();
				};
				downloadingImage.src = img;
				console.log(img);*/
			},
			getCentroTrabajo:function(){
				win.show({vurl: negativos.url_ct+'get_centro_trabajo/?rollback=negativos.getReloadCentroTrabajo();', id_menu: clientes.id_menu, class: ''});
			},
			getReloadCentroTrabajo:function(){
				
			}
		}
		Ext.onReady(negativos.init,negativos);
	}else{
		tab.setActiveTab(negativos.id+'-win-form');
	}
</script>