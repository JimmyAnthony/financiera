<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('cierre-tab')){
		var cierre = {
			id:'cierre',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/cierre/',
			url_ct:'/gestion/centroTrabajo/',
			opcion:'I',
			id_per:'<?php echo $p["id_per"];?>',
			id_id:'<?php echo $p["id_id"];?>',
			id_asesor:0,
			id_caja_det:0,
			id_age:0,
			fecha_pago:'',
			paramsStore:{},
			init:function(){
				Ext.tip.QuickTipManager.init();

				var store_creditos = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'id_creditos', type: 'string'},
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

	                    {name: 'tot_credito', type: 'string'},
	                    {name: 'tot_acumulado', type: 'string'},
	                    {name: 'tot_ganancia', type: 'string'},

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
	                    url: cierre.url+'get_list_client_creditos/',
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

	            var store_cierre_detalle = Ext.create('Ext.data.Store',{
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
	                    url: cierre.url+'get_list_creditos_detalle/',
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
				

				var myData = [
				    ['databox_interno_color','databox_interno_color','databox_interno_color','databox_interno_color','databox_interno_color','databox_interno_color']
				];
				var store_estados = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: false,
			        data: myData,
			        fields: ['clase_box1', 'clase_box2', 'clase_box3', 'clase_box4', 'clase_box5', 'clase_box6']
			    });

				var myDataCaja = [
					['N','NO CREADO'],
					['A','APERTURADO'],
				    ['C','CERRADO']
				];
			    var store_estado_caja = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: false,
			        data: myDataCaja,
			        fields: ['code', 'name']
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
					['N','Nombres'],
				    ['D','DNI']
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
				cierre.store_estado_civil = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: true,
			        data: myDataEstadoCivil,
			        fields: ['code', 'name']
			    });

			    var myDataTipoTel = [
					['CE','Celular'],
				    ['FI','Fijo']
				];
				cierre.store_tipo_tel = Ext.create('Ext.data.ArrayStore', {
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
				cierre.store_linea_tel = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'tel',
			        autoLoad: true,
			        data: myDataLineaTel,
			        fields: ['code', 'name']
			    });

			    cierre.store_conceptos = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'id_concepto', type: 'string'},
	                    {name: 'nombre', type: 'string'},
	                    {name: 'gestion', type: 'string'},
	                    {name: 'tipo', type: 'string'}
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: cierre.url+'get_list_concepto/',
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

			    cierre.store_ubigeo = Ext.create('Ext.data.Store',{
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
	                    url: cierre.url+'get_list_ubigeo/',
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

	            cierre.store_ubigeo2 = Ext.create('Ext.data.Store',{
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
	                    url: cierre.url+'get_list_ubigeo/',
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

	            cierre.store_ubigeo3 = Ext.create('Ext.data.Store',{
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
	                    url: cierre.url+'get_list_ubigeo/',
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

			    var myDatacierre = [
					[1,'Activo'], 
				    [0,'Inactivo']
				];
				var store_estado_cierre = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'perfil',
			        autoLoad: true,
			        data: myDatacierre,
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
		                                    '<img src="/images/icon/Trash.png" onClick="cierre.setDeleteDir({id_dir});"/>',
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
		                url: cierre.url+'getListPersona/',
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
		                url: cierre.url+'getListPersona/',
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
		                        '<div class="list_grid_sol__menu_line" style="width:80px;">',
		                            '<div class="list_grid_sol__menu_bar">',
		                                '<div class="list_grid_sol__menu_title_A">',
		                                '<span>Fecha:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:left;">',
		                                    '<span>{fecha_sol}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_sol__menu_line" style="width:67px;">',
		                            '<div class="list_grid_sol__menu_bar">',
		                                '<div class="list_grid_sol__menu_title_A" style="text-align:right;">',
		                                '<span>Moneda:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:right;">',
		                                    '<span>{moneda}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_sol__menu_line" style="width:67px;">',
		                            '<div class="list_grid_sol__menu_bar">',
		                                '<div class="list_grid_sol__menu_title_A" style="text-align:right;">',
		                                '<span>Monto:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:right;">',
		                                    '<span>{tot_credito}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_sol__menu_line" style="width:67px;">',
		                            '<div class="list_grid_sol__menu_bar">',
		                                '<div class="list_grid_sol__menu_title_A" style="text-align:right;">',
		                                '<span>Cuotas:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:right;">',
		                                    '<span>{nro_cuotas}</span>',
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
		                url: cierre.url+'get_list_telefonos/',
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
		                url: cierre.url+'getListDirecciones/',
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
	                    url: cierre.url+'get_list_agencias/',
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
	                    url: cierre.url+'get_list_asesores/',
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
	                    url: cierre.url+'get_list_motivos/',
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
	                    url: cierre.url+'get_list_documentos/',
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
		                url: cierre.url_ct+'getListEmpresa/',
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
					id:cierre.id+'-win-form',
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
		                            logo: 'CC',
		                            title: 'Cierre de Caja',
		                            legend: 'Ingrese los parametros para Ubicar al Asesor',
		                            width:1400,
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
		                                            id:cierre.id+'-sol-cmb-agencia-filtro',
		                                            store: store_agencias,
		                                            queryMode: 'local',
		                                            triggerAction: 'all',
		                                            valueField: 'cod_age',
		                                            displayField: 'nombre',
		                                            emptyText: '[Seleccione]',
		                                            labelAlign:'right',
		                                            //allowBlank: false,
		                                            //labelAlign:'top',
						                            width:270,
						                            labelWidth:70,
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
		                                        			var obja = Ext.getCmp(cierre.id+'-sol-cmb-asesor');
                        									cierre.getReload(obja,{vp_cod_age:obj.getValue()});
		                                                }
		                                            }
		                                        },
		                                    	{
			                                   		width: 200,border:false,
			                                    	padding:'0px 2px 0px 0px',  
			                                    	bodyStyle: 'background: transparent',
			                                 		items:[
			                                                {
			                                                    xtype:'combo',
			                                                    fieldLabel: 'Buscar por',
			                                                    id:cierre.id+'-txt-filter',
			                                                    store: store_search,
			                                                    queryMode: 'local',
			                                                    triggerAction: 'all',
			                                                    valueField: 'code',
			                                                    displayField: 'name',
			                                                    emptyText: '[Seleccione]',
			                                                    labelAlign:'right',
			                                                    //allowBlank: false,
			                                                    labelWidth: 70,
			                                                    labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
						                            				fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
			                                                    width:'100%',
			                                                    anchor:'100%',
			                                                    //readOnly: true,
			                                                    listeners:{
			                                                        afterrender:function(obj, e){
			                                                            // obj.getStore().load();
			                                                            Ext.getCmp(cierre.id+'-txt-filter').setValue('N');
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
		                                                    id:cierre.id+'-txt-asesores',
		                                                    labelWidth:0,
		                                                    //readOnly:true,
		                                                    labelAlign:'right',
		                                                    width:'100%',
		                                                    anchor:'100%'
		                                                }
		                                            ]
		                                        },
		                                        {
			                                        width: 180,border:false,
			                                        //hidden:true,
			                                        padding:'0px 2px 0px 0px',  
			                                    	bodyStyle: 'background: transparent',
			                                        items:[
			                                            {
			                                                xtype:'datefield',
			                                                id:cierre.id+'-txt-fecha',
			                                                fieldLabel:'Fecha Caja',
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
		                               					            cierre.getCaja();
									                            }
									                        }
									                    }
		                                            ]
		                                        },
		                                        {
		                                            width: 110,border:false,
		                                            padding:'0px 2px 0px 0px',  
		                                            bodyStyle: 'background: transparent',
		                                            items:[
		                                                {
									                        xtype:'button',
									                        text: 'Aperturar caja',
									                        icon: '/images/icon/1315404769_gear_wheel.png',
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
		                               					            cierre.setGenerate();
									                            }
									                        }
									                    }
		                                            ]
		                                        },
		                                        {
		                                            width: 100,border:false,
		                                            padding:'0px 2px 0px 0px',  
		                                            bodyStyle: 'background: transparent',
		                                            items:[
		                                                {
									                        xtype:'button',
									                        text: 'Cerrar Caja',
									                        icon: '/images/icon/padlock-closed.png',
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
		                               					            cierre.setGenerateCierreCaja();
									                            }
									                        }
									                    }
		                                            ]
		                                        },
		                                        {
		                                            width: 130,border:false,
		                                            padding:'0px 2px 0px 0px',  
		                                            bodyStyle: 'background: transparent',
		                                            items:[
		                                                {
									                        xtype:'button',
									                        text: 'Generar Movimiento',
									                        icon: '/images/icon/actualizar.png',
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
									                            	var id_caja =Ext.getCmp(cierre.id+'-txt-id-caja').getValue();
													            	if(!id_caja ||id_caja==0){
													            		global.Msg({msg:"Debe Generar una caja para cobros para esta fecha.",icon:2,fn:function(){}});
																		return false;
													            	}else{
		                               					            	cierre.setGenerateMovimiento();
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
		                    ]
		                },
						{
							layout:'fit',
				            width: '47%',
				            border:true,
				            region:'west',
				            items:[
				            	{
				            		layout:'border',
				            		bodyStyle: 'background: #fff;',
				            		items:[
				            			{
				            				region:'north',
				            				layout:'border',
				            				bodyStyle: 'background: #fff;',
				            				height:200,
				            				border:false,
				            				items:[
				            					{
			                						region:'north',bodyStyle: 'background: #fff;',
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
															        text: 'ESTADO ACTUAL DE LA CAJA DE COBROS POR DÍA',
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
			                						//layout:'border',
			                						border:false,
			                						//layout:'hbox',
			                						//padding:5,
			                						items:[
			                							{
			                								layout:'hbox',
			                								padding:5,
			                								items:[
			                									{
										                            xtype: 'textfield',	
										                            fieldLabel: 'CODIGO',
										                            id:cierre.id+'-txt-id-caja',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 5px 4px 5px',
										                            //id:cobranza.id+'-txt-dni',
										                            labelWidth:65,
										                            readOnly:true,
										                            align:'right',
										                            labelAlign:'top',
										                            //width:80,
										                            flex:0.5,
										                            //width:'95%',
										                            //columnWidth: 0.2,
										                            height:25,
										                            labelStyle: "font-size:11px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
										                            fieldStyle: 'font-size:15px; text-align: right; font-weight: bold',
										                            value:0,
										                            maskRe: new RegExp("[0-9.]+"),
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                }
										                            }
										                        },
					                							{
				                                                    xtype:'combo',
				                                                    fieldLabel: 'ESTADO',
				                                                    id:cierre.id+'-cmb-estado-caja',
				                                                    store: store_estado_caja,
				                                                    queryMode: 'local',
				                                                    triggerAction: 'all',
				                                                    valueField: 'code',
				                                                    displayField: 'name',
				                                                    emptyText: '[Seleccione]',
				                                                    labelAlign:'top',
				                                                    //allowBlank: false,
				                                                    labelWidth: 70,
				                                                    padding:'5px 5px 5px 5px',
				                                                    labelStyle: "font-size:11px;font-weight:bold;padding:0px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:11px; text-align: center; font-weight: bold',
				                                                    //width:'100%',
				                                                    flex:1,
				                                                    anchor:'100%',
				                                                    readOnly: true,
				                                                    listeners:{
				                                                        afterrender:function(obj, e){
				                                                            // obj.getStore().load();
				                                                            Ext.getCmp(cierre.id+'-cmb-estado-caja').setValue('N');
				                                                        },
				                                                        select:function(obj, records, eOpts){
				                                                
				                                                        }
				                                                    }
				                                                },
				                                                {
										                            xtype: 'textfield',	
										                            fieldLabel: 'MONTO APERTURADO',
										                            id:cierre.id+'-txt-monto-apertura-caja',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 5px 4px 5px',
										                            //id:cobranza.id+'-txt-dni',
										                            labelWidth:65,
										                            readOnly:true,
										                            align:'right',
										                            labelAlign:'top',
										                            //width:80,
										                            flex:1,
										                            //width:'95%',
										                            //columnWidth: 0.2,
										                            height:25,
										                            labelStyle: "font-size:11px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
										                            fieldStyle: 'font-size:15px; text-align: right; font-weight: bold',
										                            value:'',
										                            maskRe: new RegExp("[0-9.]+"),
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                }
										                            }
										                        },
										                        {
										                            xtype: 'textfield',	
										                            fieldLabel: 'MONTO ACTUAL',
										                            id:cierre.id+'-txt-monto-actual-caja',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 5px 4px 5px',
										                            //id:cobranza.id+'-txt-dni',
										                            labelWidth:65,
										                            readOnly:true,
										                            align:'right',
										                            labelAlign:'top',
										                            //width:80,
										                            flex:1,
										                            //width:'95%',
										                            //columnWidth: 0.2,
										                            height:25,
										                            labelStyle: "font-size:11px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
										                            fieldStyle: 'font-size:15px; text-align: right; font-weight: bold',
										                            value:'',
										                            maskRe: new RegExp("[0-9.]+"),
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                }
										                            }
										                        },
										                        {
										                            xtype: 'textfield',	
										                            fieldLabel: 'MONTO CIERRE',
										                            id:cierre.id+'-txt-monto-cierre-caja',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 5px 4px 5px',
										                            //id:cobranza.id+'-txt-dni',
										                            labelWidth:65,
										                            readOnly:true,
										                            align:'right',
										                            labelAlign:'top',
										                            //width:80,
										                            flex:1,
										                            //width:'95%',
										                            //columnWidth: 0.2,
										                            height:25,
										                            labelStyle: "font-size:11px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
										                            fieldStyle: 'font-size:15px; text-align: right; font-weight: bold',
										                            value:'',
										                            maskRe: new RegExp("[0-9.]+"),
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
			                								height:80,
			                								padding:5,
			                								items:[
				                                                {
										                            xtype: 'textfield',	
										                            fieldLabel: 'ASESORES',
										                            id:cierre.id+'-txt-asesores-caja',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 5px 4px 5px',
										                            //id:cobranza.id+'-txt-dni',
										                            labelWidth:65,
										                            readOnly:true,
										                            align:'right',
										                            labelAlign:'top',
										                            //width:80,
										                            flex:1,
										                            //width:'95%',
										                            //columnWidth: 0.2,
										                            height:50,
										                            labelStyle: "font-size:11px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
										                            fieldStyle: 'font-size:15px; text-align: right; font-weight: bold',
										                            value:'',
										                            maskRe: new RegExp("[0-9.]+"),
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                }
										                            }
										                        },
										                        {
										                            xtype: 'textfield',	
										                            fieldLabel: 'CUOTAS',
										                            id:cierre.id+'-txt-cuotas-caja',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 5px 4px 5px',
										                            //id:cobranza.id+'-txt-dni',
										                            labelWidth:65,
										                            readOnly:true,
										                            align:'right',
										                            labelAlign:'top',
										                            //width:80,
										                            flex:1,
										                            //width:'95%',
										                            //columnWidth: 0.2,
										                            height:50,
										                            labelStyle: "font-size:11px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
										                            fieldStyle: 'font-size:15px; text-align: right; font-weight: bold',
										                            value:'',
										                            maskRe: new RegExp("[0-9.]+"),
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                }
										                            }
										                        },
										                        {
										                            xtype: 'textfield',	
										                            fieldLabel: 'VALOR CUOTAS',
										                            id:cierre.id+'-txt-valor-cuotas-caja',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 5px 4px 5px',
										                            //id:cobranza.id+'-txt-dni',
										                            labelWidth:65,
										                            readOnly:true,
										                            align:'right',
										                            labelAlign:'top',
										                            //width:80,
										                            flex:1,
										                            //width:'95%',
										                            //columnWidth: 0.2,
										                            height:50,
										                            labelStyle: "font-size:11px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
										                            fieldStyle: 'font-size:15px; text-align: right; font-weight: bold',
										                            value:'',
										                            maskRe: new RegExp("[0-9.]+"),
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                }
										                            }
										                        },
										                        {
										                            xtype: 'textfield',	
										                            fieldLabel: 'MORA',
										                            id:cierre.id+'-txt-mora-caja',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 5px 4px 5px',
										                            //id:cobranza.id+'-txt-dni',
										                            labelWidth:65,
										                            readOnly:true,
										                            align:'right',
										                            labelAlign:'top',
										                            //width:80,
										                            flex:1,
										                            //width:'95%',
										                            //columnWidth: 0.2,
										                            height:50,
										                            labelStyle: "font-size:11px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
										                            fieldStyle: 'font-size:15px; text-align: right; font-weight: bold',
										                            value:'',
										                            maskRe: new RegExp("[0-9.]+"),
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                }
										                            }
										                        },
										                        {
										                            xtype: 'textfield',	
										                            fieldLabel: 'TOTAL DÍA',
										                            id:cierre.id+'-txt-total-dia-caja',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 5px 4px 5px',
										                            //id:cobranza.id+'-txt-dni',
										                            labelWidth:65,
										                            readOnly:true,
										                            align:'right',
										                            labelAlign:'top',
										                            //width:80,
										                            flex:1,
										                            width:'95%',
										                            //columnWidth: 0.2,
										                            height:50,
										                            labelStyle: "font-size:11px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
										                            fieldStyle: 'font-size:15px; text-align: right; font-weight: bold',
										                            value:'',
										                            maskRe: new RegExp("[0-9.]+"),
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                }
										                            }
										                        },
										                        {
										                            xtype: 'textfield',	
										                            fieldLabel: 'TOTAL COBRADO',
										                            id:cierre.id+'-txt-total-cobrado-caja',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 5px 4px 5px',
										                            //id:cobranza.id+'-txt-dni',
										                            labelWidth:65,
										                            readOnly:true,
										                            align:'right',
										                            labelAlign:'top',
										                            //width:80,
										                            flex:1,
										                            //width:'95%',
										                            //columnWidth: 0.2,
										                            height:50,
										                            labelStyle: "font-size:10px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
										                            fieldStyle: 'font-size:15px; text-align: right; font-weight: bold',
										                            value:'',
										                            maskRe: new RegExp("[0-9.]+"),
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
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
															        text: 'ASESORES',
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
			                						//layout:'border',
			                						border:false,
			                						layout:'fit',
			                						items:[
			                							{
									                        xtype: 'grid',
									                        id: cierre.id+'-grid-asesores',
									                        store: Ext.create('Ext.data.Store',{
													            fields: [
													                {name: 'id_caja_det', type: 'string'},
													                {name: 'id_age', type: 'string'},
													                {name: 'id_caja', type: 'string'},
													                {name: 'fecha', type: 'string'},
													                {name: 'id_asesor', type: 'string'},
													                {name: 'nombre', type: 'string'},
													                {name: 'nombres', type: 'string'},
													                {name: 'ape_pat', type: 'string'},
													                {name: 'ape_mat', type: 'string'},
													                {name: 'doc_dni', type: 'string'},
													                {name: 'fecha', type: 'string'},
													                {name: 'solicitado', type: 'string'},
													                {name: 'monto_solicitado', type: 'string'},
													                {name: 'cuotas_cobradas', type: 'string'},
													                {name: 'valor_cuota', type: 'string'},
													                {name: 'pagado', type: 'string'},
													                {name: 'mora', type: 'string'},
													                {name: 'total', type: 'string'},
													                {name: 'saldo_cuota', type: 'string'},
													                {name: 'efectivo', type: 'string'},

													                {name: 'fecha_cierre', type: 'string'},
													                {name: 'estado', type: 'string'},
													                {name: 'fecha_creado', type: 'string'}
													            ], 
													            autoLoad:true,
													            proxy:{
													                type: 'ajax',
													                url: cierre.url+'getDataAsesores/',
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
																	    locked: true
																	},
																	{
																		text:'<div style="display: inline-flex;"><div >DNI</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																		align:'center',
																		dataIndex: 'doc_dni',
																		width:65,
																		menuDisabled:true
																	},
																	{
																		text:'<div style="display: inline-flex;"><div style="width: 76px;">Asesor</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																		align:'left',
																		dataIndex: 'nombre',
																		flex:1,
																		menuDisabled:true
																	},
																	{
																		text:'<div style="display: inline-flex;"><div style="width: 76px;">Solicitudes</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																		align:'center',
																		//width: 100,
																		//flex:1,
																		menuDisabled:true,
																		columns:[
											                                {
											                                    text: 'Cant',
											                                    align:'center',
											                                    dataIndex: 'solicitado',
											                                    width: 60
											                                },
											                                {
											                                    text: 'M.Sol',
											                                    align:'right',
											                                    dataIndex: 'monto_solicitado',
											                                    width: 60
											                                }
											                            ]
											                        },
											                        {
																		text:'<div style="display: inline-flex;"><div style="width: 76px;">Gestión Cobro</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																		align:'center',
																		//width: 100,
																		//flex:1,
																		menuDisabled:true,
																		columns:[
											                                {
											                                    text: 'Cuotas',
											                                    align:'center',
											                                    dataIndex: 'cuotas_cobradas',
											                                    width: 55
											                                },
											                                {
											                                    text: 'Valor Cuotas',
											                                    align:'right',
											                                    dataIndex: 'valor_cuota',
											                                    width: 70
											                                },
											                                {
											                                    text: 'Mora',
											                                    align:'right',
											                                    dataIndex: 'mora',
											                                    width: 60
											                                },
											                                {
											                                    text: 'Total',
											                                    align:'right',
											                                    dataIndex: 'total',
											                                    width: 60
											                                },
											                                {
											                                    text: 'Cobrado',
											                                    align:'right',
											                                    dataIndex: 'pagado',
											                                    width: 60
											                                },
											                                {
											                                    text: 'Saldo',
											                                    align:'right',
											                                    dataIndex: 'saldo_cuota',
											                                    width: 60
											                                }
									                                	]
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
									                                        var jsf='';
									                                        if(record.get('estado')=='C'){
									                                        	estado = 'padlock-closed.png';
									                                        	jsf='cierre.setOpenCajaOnly('+record.get('id_caja_det')+','+record.get('id_caja')+','+record.get('id_asesor')+')';
									                                        }
									                                        metaData.style = "padding: 0px; margin: 0px";
									                                        return global.permisos({
									                                            type: 'link',
									                                            id_menu: cierre.id_menu,
									                                            icons:[
									                                                {id_serv: 2, img: estado, qtip: 'Estado.', js: jsf}

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
									                                            id_menu: cierre	.id_menu,
									                                            icons:[
									                                                {id_serv: 8, img: 'edit.png', qtip: 'Editar.', js: "cierre.getEdit("+rowIndex+")"}

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
									                            },
									                            select:function(obj, record, index, eOpts ){
									                            	//cierre.setClearCierreCal();
									                            	Ext.getCmp(cierre.id+'-btn-cerrar-caja-asesor').setDisabled(record.get('estado')=='C'?true:false);
									                            	Ext.getCmp(cierre.id+'-btn-limpiar-caja-asesor').setDisabled(record.get('estado')=='C'?true:false);
									                            	Ext.getCmp(cierre.id+'-btn-pdf-caja-asesor').setDisabled(record.get('estado')=='C'?false:true);
									                            	var objp = Ext.getCmp(cierre.id+'-grid-distribucion'); 
																	cierre.getReload(objp,{vp_id_caja_det:record.get('id_caja_det'),vp_id_caja:record.get('id_caja'),vp_id_asesor:record.get('id_asesor')});
									                            	Ext.getCmp(cierre.id+'-sol-txt-cuotas-pago').setValue(record.get('cuotas_cobradas'));
									                            	Ext.getCmp(cierre.id+'-sol-txt-monto-valor').setValue(record.get('valor_cuota'));
									                            	Ext.getCmp(cierre.id+'-sol-txt-monto-mora').setValue(record.get('mora'));
									                            	Ext.getCmp(cierre.id+'-sol-txt-monto-total').setValue(record.get('total'));
									                            	Ext.getCmp(cierre.id+'-sol-txt-monto-cobrado').setValue(record.get('pagado'));
									                            	Ext.getCmp(cierre.id+'-sol-txt-monto-efectivo').setValue(record.get('efectivo'));
									                            	cierre.id_asesor=record.get('id_asesor');
									                            	cierre.id_caja_det=record.get('id_caja_det');
																	cierre.id_age=record.get('id_age'); 
																	cierre.fecha_pago=record.get('fecha');
									                            	cierre.getClientes(record.get('id_asesor'));
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
				        	layout:'border',
				        	border:false,
				        	items:[
				        		{
		         					layout:'border',
		         					region:'north',
		         					height:360,
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
													        text: 'DISTRIBUCIÓN DEL COBRO',
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
	                						//layout:'fit',
	                						bodyStyle: 'background: #fff',
	                						items:[
								            	{
			                						region:'center',
			                						//layout:'border',
			                						border:false,
			                						layout:'fit',
			                						items:[
										            	{
												         	xtype:'grid',   
												         	id:cierre.id+'-grid-distribucion',
												            plugins: [new Ext.grid.plugin.CellEditing({
													            clicksToEdit: 1
													        })],
												            store: Ext.create('Ext.data.Store',{
													            fields: [
													                {name: 'moneda', type: 'string'},
													                {name: 'valor', type: 'string'},
													                {name: 'cantidad', type: 'string'}
													            ], 
													            autoLoad:false,
													            proxy:{
													                type: 'ajax',
													                url: cierre.url+'getDataMonedas/',
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
													        }),
												            columns: [
												            {
												                header: 'Moneda',
												                dataIndex: 'moneda',
												                align: 'center',
												                readOnly:true,
												                flex: 1
												            },
												            {
												                header: 'Valor',
												                dataIndex: 'valor',
												                align: 'center',
												                readOnly:true,
												                flex: 1
												            },
												            {
												                header: 'Cantidad',
												                dataIndex: 'cantidad',
												                width: 60,
												                align: 'right',
												                fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
												                //formatter: 'usMoney',
												                editor: {
												                    xtype: 'numberfield',
												                    allowBlank: false,
												                    maskRe: new RegExp("[0-9]+"),
												                    align: 'right',
												                    fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
												                    minValue: 0,
												                    maxValue: 1000000,
												                    listeners:{
												                    	
												                    	blur:function(e) {
												                    		cierre.setCalculaPagado();
												                    	},
												                    	change:function(obj, records, eOpts){
												                    		cierre.setCalculaPagado();
												                    	}
												                    }
												                }
												            }],
												            selModel: {
												                selType: 'cellmodel'
												            }
												        }
													]
												},
												{
			                						region:'east',
			                						//layout:'border',
			                						width:220,
			                						border:false,
			                						margin:10,
			                						layout:'vbox',
			                						items:[
			                							{
								                            xtype: 'textfield',	
								                            fieldLabel: 'Cuotas',
								                            id:cierre.id+'-sol-txt-cuotas-pago',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 4px 5px',
								                            //id:cobranza.id+'-txt-dni',
								                            labelWidth:65,
								                            readOnly:true,
								                            align:'left',
								                            //labelAlign:'top',
								                            //width:80,
								                            //flex:1,
								                            width:'95%',
								                            //columnWidth: 0.2,
								                            height:25,
								                            labelStyle: "font-size:12px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
								                            fieldStyle: 'font-size:11px; text-align: right; font-weight: bold',
								                            value:'',
								                            maskRe: new RegExp("[0-9]+"),
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
								                        {
								                            xtype: 'textfield',	
								                            fieldLabel: 'Valor',
								                            id:cierre.id+'-sol-txt-monto-valor',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 4px 5px',
								                            //id:cobranza.id+'-txt-dni',
								                            labelWidth:65,
								                            readOnly:true,
								                            align:'left',
								                            //labelAlign:'top',
								                            //width:80,
								                            //flex:1,
								                            width:'95%',
								                            //columnWidth: 0.2,
								                            height:25,
								                            labelStyle: "font-size:12px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
								                            fieldStyle: 'font-size:11px; text-align: right; font-weight: bold',
								                            value:'',
								                            maskRe: new RegExp("[0-9.]+"),
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
								                        {
								                            xtype: 'textfield',	
								                            fieldLabel: 'Mora',
								                            id:cierre.id+'-sol-txt-monto-mora',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 4px 5px',
								                            //id:cobranza.id+'-txt-dni',
								                            labelWidth:65,
								                            readOnly:true,
								                            align:'right',
								                            //labelAlign:'top',
								                            //width:80,
								                            //flex:1,
								                            width:'95%',
								                            //columnWidth: 0.2,
								                            height:25,
								                            labelStyle: "font-size:12px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
								                            fieldStyle: 'font-size:11px; text-align: right; font-weight: bold',
								                            value:'',
								                            maskRe: new RegExp("[0-9.]+"),
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
								                        {
								                            xtype: 'textfield',	
								                            fieldLabel: 'Total',
								                            id:cierre.id+'-sol-txt-monto-total',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 4px 5px',
								                            //id:cobranza.id+'-txt-dni',
								                            labelWidth:65,
								                            readOnly:true,
								                            align:'right',
								                            //labelAlign:'top',
								                            //width:80,
								                            //flex:1,
								                            width:'95%',
								                            //columnWidth: 0.2,
								                            height:25,
								                            labelStyle: "font-size:12px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
								                            fieldStyle: 'font-size:11px; text-align: right; font-weight: bold',
								                            value:'',
								                            maskRe: new RegExp("[0-9.]+"),
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
								                        {
								                            xtype: 'textfield',	
								                            fieldLabel: 'Cobrado',
								                            id:cierre.id+'-sol-txt-monto-cobrado',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 4px 5px',
								                            //id:cobranza.id+'-txt-dni',
								                            labelWidth:65,
								                            readOnly:true,
								                            align:'right',
								                            //labelAlign:'top',
								                            //width:80,
								                            //flex:1,
								                            width:'95%',
								                            //columnWidth: 0.2,
								                            height:25,
								                            labelStyle: "font-size:12px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
								                            fieldStyle: 'font-size:11px; text-align: right; font-weight: bold',
								                            value:'',
								                            maskRe: new RegExp("[0-9.]+"),
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
						                        		{
								                            xtype: 'textfield',	
								                            fieldLabel: 'Efectivo',
								                            id:cierre.id+'-sol-txt-monto-efectivo',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 4px 5px',
								                            //id:cobranza.id+'-txt-dni',
								                            labelWidth:65,
								                            readOnly:true,
								                            align:'right',
								                            //labelAlign:'top',
								                            width:'95%',
								                            //flex:0.5,
								                            //columnWidth: 0.2,
								                            height:25,
								                            labelStyle: "font-size:12px;font-weight:bold;padding:0px 0px 0px 0px;text-align: left;font-weight: bold",
								                            fieldStyle: 'font-size:11px; text-align: right; font-weight: bold',
								                            value:'',
								                            maskRe: new RegExp("[0-9.]+"),
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
										                {
								                        	layout:'hbox',
								                        	padding:5,
								                        	items:[
												            	{
												                    xtype: 'button',
												                    id:cierre.id+'-btn-cerrar-caja-asesor',
												                    margin:'5px 5px 5px 5px',
												                    icon: '/images/icon/1315404769_gear_wheel.png',
												                    //glyph: 72,
												                    //columnWidth: 0.1,
												                    //width:70,
												                    disabled:true,
												                    flex:1,
												                    text: 'CERRAR',
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
											                            	cierre.setCierre();
											                            }
											                        }
												                },
												                {
												                    xtype: 'button',
												                    id:cierre.id+'-btn-limpiar-caja-asesor',
												                    margin:'5px 5px 5px 5px',
												                    icon: '/images/icon/Document.png',
												                    //glyph: 72,
												                    //columnWidth: 0.1,
												                    //width:70,
												                    flex:1,
												                    disabled:true,
												                    text: 'LIMPIAR',
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
											                            	cierre.setClearCierreCal();
											                            }
											                        }
												                },
												                {
												                    xtype: 'button',
												                    margin:'5px 5px 5px 5px',
												                    id:cierre.id+'-btn-pdf-caja-asesor',
												                    icon: '/images/icon/pdf.png',
												                    disabled:true,
												                    //glyph: 72,
												                    //columnWidth: 0.1,
												                    //width:70,
												                    flex:1,
												                    text: 'IMPRIMIR',
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
											                            	//cobranza.setPagar();
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
		         					//height:460,
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
													        text: 'CLIENTES',
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
	                						//layout:'border',
	                						border:false,
	                						layout:'fit',
	                						items:[
								            	{
						                            xtype:'GridViewVertCLI',
						                            bodyStyle: 'background: transparent',
                									bodyCls: 'transparent',
						                            id:cierre.id,
						                            mode:1,
						                            //tab:cierre.id+'-tabContent',
						                            url:cierre.url+'getDataListClientes/',
						                            back:'-contentClientes',
						                            params:{sis_id:2}
						                        }
											]
										}
							    	]
							    }
						         
				        	]
				        },
				        {
				         	width:'27%',
				         	region:'east',
				         	border:false,
				         	layout:'border',
				         	items:[
				         		{
				         			height:'50%',
				         			region:'north',
				         			//border:true,
				         			html:'<div id="chart-container-asesor-diario-montos"></div>'
				         		},
				         		{
				         			region:'center',
				         			//border:false,
				         			html:'<div id="chart-container-asesor-diario-cantidad"></div>'
				         		}
				         	]
				         }
					],
					listeners:{
						beforerender: function(obj, opts){
	                        global.state_item_menu(cierre.id_menu, true);
	                    },
	                    afterrender: function(obj, e){
	                    	//cierre.getReloadGridcierre('');
	                        tab.setActiveTab(obj);
	                        global.state_item_menu_config(obj,cierre.id_menu);
	                        //Ext.getCmp(cierre.id+'-txt-dni').focus();
	                        /*var obj = Ext.getCmp(cierre.id+'-sol-txt-centro-trabajo');
							cierre.getReload(obj,{vp_op:'N',vp_id:0,vp_nombre:''});
							cierre.getSelectUbi();*/
							//cierre.setCollapse();
							//cierre.getchartsAsesores();
	                    },
	                    beforeclose:function(obj,opts){
	                    	global.state_item_menu(cierre.id_menu, false);
	                    }
					}

				}).show();
				Ext.EventManager.onWindowResize(function(){
					cierre.setCollapse();
				});
			},
			setOpenCajaOnly:function(id_caja_det,id_caja,id_asesor){
				global.Msg({
					msg: '¿Está seguro aperturar la caja para este asesor?',
					icon:3,
					buttons:3,
					fn:function(obj){
						//console.log(obj);
						if (obj == 'yes'){
							Ext.getCmp(cierre.id+'-win-form').el.mask('Cargando…', 'x-mask-loading');
							Ext.Ajax.request({
								url:cierre.url+'setOpenCajaOnly/',
								params:{
									vp_op:'A',
									vp_id_caja_det:id_caja_det,
									vp_id_caja:id_caja,
									vp_id_asesor:id_asesor,
									vp_id_age:cierre.id_age,
									vp_id_age:cierre.id_age,
									vp_fecha_pago:cierre.fecha_pago,
									vp_efectivo:0
								},
								success: function(response, options){
									Ext.getCmp(cierre.id+'-win-form').el.unmask();
									var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	cierre.getAsesores();
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
			setClearCierreCal:function(){

            	var grid = Ext.getCmp(cierre.id+'-grid-distribucion');
                var store = grid.getStore();

            	store.each(function (v, idx) {
                	v.set('cantidad',0);
                	v.commit();
                });
                grid.getView().refresh();

                Ext.getCmp(cierre.id+'-sol-txt-monto-efectivo').setValue(Ext.Number.toFixed(0, 2));
			},
			setGenerate:function(){
				var id_caja =Ext.getCmp(cierre.id+'-txt-id-caja').getValue();
				var agencia =Ext.getCmp(cierre.id+'-sol-cmb-agencia-filtro').getValue();
				var fecha   =Ext.getCmp(cierre.id+'-txt-fecha').getRawValue();
				if(!id_caja){
					id_caja=0;
				}
				if(!agencia){
					global.Msg({msg:"Seleccione una agencia para generar la caja diaria",icon:2,fn:function(){}});
					return false;
				}
				if(!fecha){
					global.Msg({msg:"Seleccione una fecha de pago para generar la caja diaria",icon:2,fn:function(){}});
					return false;
				}
				global.Msg({
					msg: '¿Está seguro aperturar o verificar la caja?',
					icon:3,
					buttons:3,
					fn:function(obj){
						//console.log(obj);
						if (obj == 'yes'){
							Ext.getCmp(cierre.id+'-win-form').el.mask('Cargando…', 'x-mask-loading');
							Ext.Ajax.request({
								url:cierre.url+'setGenerar/',
								params:{
									vp_id_caja:id_caja,
									vp_agencia:agencia,
									vp_fecha:fecha
								},
								success: function(response, options){
									Ext.getCmp(cierre.id+'-win-form').el.unmask();
									var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	try{
				                                	Ext.getCmp(cierre.id+'-txt-total-cobrado-caja').setValue(res.cobado);
				                                	Ext.getCmp(cierre.id+'-txt-total-dia-caja').setValue(res.total);
				                                	Ext.getCmp(cierre.id+'-txt-mora-caja').setValue(res.mora);
				                                	Ext.getCmp(cierre.id+'-txt-valor-cuotas-caja').setValue(res.valor_cuotas);
				                                	Ext.getCmp(cierre.id+'-txt-cuotas-caja').setValue(res.cuotas);
				                                	Ext.getCmp(cierre.id+'-txt-asesores-caja').setValue(res.asesores);
				                                	Ext.getCmp(cierre.id+'-cmb-estado-caja').setValue(res.estado);
				                                	Ext.getCmp(cierre.id+'-txt-id-caja').setValue(res.CODIGO);

				                                	Ext.getCmp(cierre.id+'-txt-monto-cierre-caja').setValue(res.monto_cierre);
				                                	Ext.getCmp(cierre.id+'-txt-monto-actual-caja').setValue(res.monto_actual);
				                                	Ext.getCmp(cierre.id+'-txt-monto-apertura-caja').setValue(res.monto_apertura);
				                                	cierre.getAsesores();
				                                }catch(e){

				                                }
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
			setGenerateCierreCaja:function(){
				var id_caja =Ext.getCmp(cierre.id+'-txt-id-caja').getValue();
				var agencia =Ext.getCmp(cierre.id+'-sol-cmb-agencia-filtro').getValue();
				var fecha   =Ext.getCmp(cierre.id+'-txt-fecha').getRawValue();
				if(!id_caja){
					id_caja=0;
				}
				if(!agencia){
					global.Msg({msg:"Seleccione una agencia para generar la caja diaria",icon:2,fn:function(){}});
					return false;
				}
				if(!fecha){
					global.Msg({msg:"Seleccione una fecha de pago para generar la caja diaria",icon:2,fn:function(){}});
					return false;
				}
				global.Msg({
					msg: '¿ESTÁ REALMENTE SEGURO DE CERRAR LA CAJA?, ESTE PROCESO ES IREVERSIBLE.',
					icon:2,
					buttons:3,
					fn:function(obj){
						//console.log(obj);
						if (obj == 'yes'){
							Ext.getCmp(cierre.id+'-win-form').el.mask('Cargando…', 'x-mask-loading');
							Ext.Ajax.request({
								url:cierre.url+'setGenerarCierreCaja/',
								params:{
									vp_id_caja:id_caja,
									vp_agencia:agencia,
									vp_fecha:fecha
								},
								success: function(response, options){
									Ext.getCmp(cierre.id+'-win-form').el.unmask();
									var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	Ext.getCmp(cierre.id+'-txt-total-cobrado-caja').setValue(res.cobado);
			                                	Ext.getCmp(cierre.id+'-txt-total-dia-caja').setValue(res.total);
			                                	Ext.getCmp(cierre.id+'-txt-mora-caja').setValue(res.mora);
			                                	Ext.getCmp(cierre.id+'-txt-valor-cuotas-caja').setValue(res.valor_cuotas);
			                                	Ext.getCmp(cierre.id+'-txt-cuotas-caja').setValue(res.cuotas);
			                                	Ext.getCmp(cierre.id+'-txt-asesores-caja').setValue(res.asesores);
			                                	Ext.getCmp(cierre.id+'-cmb-estado-caja').setValue(res.estado);
			                                	Ext.getCmp(cierre.id+'-txt-id-caja').setValue(res.CODIGO);

			                                	Ext.getCmp(cierre.id+'-txt-monto-cierre-caja').setValue(res.monto_cierre);
			                                	Ext.getCmp(cierre.id+'-txt-monto-actual-caja').setValue(res.monto_actual);
			                                	Ext.getCmp(cierre.id+'-txt-monto-apertura-caja').setValue(res.monto_apertura);
			                                	cierre.getAsesores();
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
			setCierre:function(){
				//Ext.getCmp(cierre.id+'-sol-txt-cuotas-pago').setValue(record.get('cuotas_cobradas'));
				cierre.setCalculaPagado();
				var agencia =Ext.getCmp(cierre.id+'-sol-cmb-agencia-filtro').getValue();
				var id_caja =Ext.getCmp(cierre.id+'-txt-id-caja').getValue();
            	var total =Ext.getCmp(cierre.id+'-sol-txt-monto-cobrado').getValue();
            	//var mora  = Ext.getCmp(cierre.id+'-sol-txt-monto-mora').getValue();
            	var efectivo = Ext.getCmp(cierre.id+'-sol-txt-monto-efectivo').getValue();
            	if(!agencia){
					global.Msg({msg:"Seleccione una agencia para generar la caja diaria",icon:2,fn:function(){}});
					return false;
				}
            	if(!id_caja){
            		global.Msg({msg:"Debe Generar una caja para cobros para esta fecha de pago.",icon:2,fn:function(){}});
					return false;
            	}
            	if(id_caja==0){
            		global.Msg({msg:"Debe Generar una caja para cobros para esta fecha de pago.",icon:2,fn:function(){}});
					return false;
            	}
            	if(cierre.id_asesor==0){
            		global.Msg({msg:"Seleccione un asesor para procesar.",icon:2,fn:function(){}});
					return false;
            	}
            	if(cierre.id_age==0){
            		global.Msg({msg:"Seleccione un asesor para procesar.",icon:2,fn:function(){}});
					return false;
            	}
            	if(cierre.id_caja_det==0){
            		global.Msg({msg:"Seleccione un asesor para procesar.",icon:2,fn:function(){}});
					return false;
            	}
            	if(parseFloat(total)!=parseFloat(efectivo)){
					global.Msg({msg:"El pago cobrado no cuadra con el monto en efectivo.",icon:2,fn:function(){}});
					return false;
				}

				if(parseFloat(efectivo)==0){
					global.Msg({msg:"El efectivo debe ser mayor a cero.",icon:2,fn:function(){}});
					return false;
				}
            	var recordsToSend = [];
            	var grid = Ext.getCmp(cierre.id+'-grid-distribucion');
                var store = grid.getStore();
            	Ext.each(store.data.items, function (recordx,i) {
					recordsToSend.push(Ext.apply({id:recordx.id},recordx.data));
				});
				recordsToSend = Ext.encode(recordsToSend);
                console.log(recordsToSend);
                global.Msg({
					msg: '¿Está seguro cerrar la caja para este asesor?',
					icon:3,
					buttons:3,
					fn:function(obj){
						//console.log(obj);
						if (obj == 'yes'){
							Ext.getCmp(cierre.id+'-win-form').el.mask('Cargando…', 'x-mask-loading');
							Ext.Ajax.request({
								url:cierre.url+'setGeneraClasificacionCaja/',
								params:{
									vp_id_caja:id_caja,
									vp_id_caja_det:cierre.id_caja_det,
									vp_id_age:cierre.id_age,
									vp_id_asesor:cierre.id_asesor,
									vp_fecha_pago:cierre.fecha_pago,
									vp_efectivo:efectivo,
									vp_recordsToSend:recordsToSend
								},
								success: function(response, options){
									Ext.getCmp(cierre.id+'-win-form').el.unmask();
									var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//Ext.getCmp(cierre.id+'-select-garante').setValue('');
			                                	//var objp = Ext.getCmp(cierre.id+'-list-garante');
												//cierre.getReload(objp,{vp_op:'G',vp_id:vp_sol_id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});
												cierre.getAsesores();
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
			setCalculaPagado:function(){
				Ext.getCmp(cierre.id+'-sol-txt-monto-efectivo').setValue(0);
            	var grid = Ext.getCmp(cierre.id+'-grid-distribucion');
                var store = grid.getStore();
                var val=0;
                var cnt=0;
                var eff=0;

            	store.each(function (v, idx) {
                	val=parseFloat(v.get('valor'));
                	cnt=parseInt(v.get('cantidad'));
                	eff+=val*cnt;
                });
                grid.getView().refresh();

                Ext.getCmp(cierre.id+'-sol-txt-monto-efectivo').setValue(Ext.Number.toFixed(eff, 2));
            },
			getchartsAsesores:function(id){
				var fecha = Ext.getCmp(cierre.id+'-txt-fecha').getRawValue();
                var ANIOS =[];
                ANIOS.push({"label":fecha});

                var SOLICITUDES =[];
                var MONTOS_SOLICITADO =[];

                var TOT_CUOTAS =[];
                var TOT_COBRADO =[];
                var TOT_MORA =[];
                var TOT_SALDO =[];


                var SOLICITUDES_=0;
                var MONTOS_SOLICITADO_ =0;

                var TOT_CUOTAS_ =0;
                var TOT_COBRADO_ =0;
                var TOT_MORA_ =0;
                var TOT_SALDO_ =0;

				Ext.getCmp(cierre.id+'-grid-asesores').getStore().each(function(record, idx) {
					if(record.get('id_asesor')==id || id==0){
			            SOLICITUDES_ = SOLICITUDES_ + (record.get('solicitado'))?record.get('solicitado'):0;
			            MONTOS_SOLICITADO_ = MONTOS_SOLICITADO_ + (record.get('monto_solicitado'))?record.get('monto_solicitado'):0;

			            TOT_CUOTAS_ = TOT_CUOTAS_ + (record.get('valor_cuota'))?record.get('valor_cuota'):0;
			            TOT_COBRADO_ = TOT_COBRADO_ + (record.get('pagado'))?record.get('pagado'):0;
			            TOT_MORA_ = TOT_MORA_ + (record.get('mora'))?record.get('mora'):0;
			            TOT_SALDO_ = TOT_SALDO_ + (record.get('saldo_cuota'))?record.get('saldo_cuota'):0;
		            }
		        });

				SOLICITUDES.push({"value":SOLICITUDES_});
				MONTOS_SOLICITADO.push({"value":MONTOS_SOLICITADO_});

				TOT_CUOTAS.push({"value":TOT_CUOTAS_});
				TOT_COBRADO.push({"value":TOT_COBRADO_});
				TOT_MORA.push({"value":TOT_MORA_});
				TOT_SALDO.push({"value":TOT_SALDO_});

				if(!TOT_CUOTAS_)TOT_CUOTAS_=0;
				if(!TOT_COBRADO_)TOT_COBRADO_=0;
				if(!TOT_MORA_)TOT_MORA_=0;
				if(!TOT_SALDO_)TOT_SALDO_=0;

				const dataSource = {
					  "chart": {
					    "caption": "Recommended Portfolio Split",
					    "subcaption": "For a net-worth of $1M",
					    "showvalues": "1",
					    "showpercentintooltip": "0",
					    "numberprefix": "$",
					    "enablemultislicing": "1",
					    "theme": "fusion"
					  },
					  "data": [
					    {
					      "label": "Valor Cuotas",
					      "value": parseFloat(TOT_CUOTAS_)
					    },
					    {
					      "label": "Cobrado",
					      "value": parseFloat(TOT_COBRADO_)
					    },
					    {
					      "label": "Saldo",
					      "value": parseFloat(TOT_SALDO_)
					    },
					    {
					      "label": "Mora",
					      "value": parseFloat(TOT_MORA_)
					    }
					  ]
					};

				const dataSource2 = {
				  "chart": {
				    "caption": "Cuadro Cantidades",
				    "subcaption": "Solicitado,Cantidad Cuotas Cobradas",
				    "yaxisname": "Montos",
				    "syaxisname": "Porcentajes",
				    "snumbersuffix": "%",
				    "drawcustomlegendicon": "0",
				    "showvalues": "0",
				    "rotatelabels": "0",
				    "theme": "fusion",
				    "plotToolText": "$value"
				  },
				  "categories": [
				    {
				      "category": eval(JSON.stringify(ANIOS))
				    }
				  ],
				  "dataset": [
				    {
				      "seriesname": "cantidad",
				      "data": eval(JSON.stringify(SOLICITUDES))
				    },
				    {
				      "seriesname": "Cuotas Cobradas",
				      "data": eval(JSON.stringify(TOT_CUOTAS))
				    }/*
				    {
				      "seriesname": "Interes",
				      "data": eval(JSON.stringify(INTERES))
				    },
				    {
				      "seriesname": "Mora",
				      "data": eval(JSON.stringify(MORA))
				    },
				    {
				      "seriesname": "Ganancias",
				      "data": eval(JSON.stringify(TOT_GANA))
				    }
				    {
				      "seriesname": "% Unit Share",
				      "renderas": "line",
				      "parentyaxis": "S",
				      "data": eval(JSON.stringify(INTERES))
				    }*/
				  ]
				};
				
				const dataSource3 = {
				  "chart": {
				    "caption": "Cuadro por Montos",
				    "subcaption": "Monto Solicitado,Cobrado,Saldo,Mora",
				    "yaxisname": "Montos",
				    "syaxisname": "Porcentajes",
				    "snumbersuffix": "$",
				    "drawcustomlegendicon": "0",
				    "showvalues": "0",
				    "rotatelabels": "0",
				    "theme": "fusion",
				    "plotToolText": "$value"
				  },
				  "categories": [
				    {
				      "category": eval(JSON.stringify(ANIOS))
				    }
				  ],
				  "dataset": [
				    {
				      "seriesname": "M. Solicitado",
				      "data": eval(JSON.stringify(MONTOS_SOLICITADO))
				    },
				    {
				      "seriesname": "V.Cuotas",
				      "data": eval(JSON.stringify(TOT_CUOTAS))
				    },
				    {
				      "seriesname": "Cobrado",
				      "data": eval(JSON.stringify(TOT_COBRADO))
				    },
				    {
				      "seriesname": "Saldo",
				      "data": eval(JSON.stringify(TOT_SALDO))
				    },
				    {
				      "seriesname": "Mora",
				      "data": eval(JSON.stringify(TOT_MORA))
				    }/*,
				    {
				      "seriesname": "Ganancias",
				      "data": eval(JSON.stringify(TOT_GANA))
				    }
				    {
				      "seriesname": "% Unit Share",
				      "renderas": "line",
				      "parentyaxis": "S",
				      "data": eval(JSON.stringify(INTERES))
				    }*/
				  ]
				};

				/*FusionCharts.ready(function() {
				   var myChart = new FusionCharts({
				      type: "pie3d",
				      renderAt: "chart-container-asesor-diario-montos",
				      width: "100%",
				      height: "100%",
				      dataFormat: "json",
				      dataSource:dataSource
				   }).render();
				});*/
				FusionCharts.ready(function() {
				   var myChart = new FusionCharts({
				      type: "mscolumn3dlinedy",
				      renderAt: "chart-container-asesor-diario-cantidad",
				      width: "100%",
				      height: "100%",
				      dataFormat: "json",
				      dataSource:dataSource2
				   }).render();

				   var myChart = new FusionCharts({
				      type: "mscolumn3dlinedy",
				      renderAt:  "chart-container-asesor-diario-montos",
				      width: "100%",
				      height: "100%",
				      dataFormat: "json",
				      dataSource:dataSource3
				   }).render();
				});
			},
			setPagarCuotas:function(){
				var vp_sol_id_cli = Ext.getCmp(cierre.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(cierre.id+'-sol-txt-id-per').getValue();

				var fecha=Ext.getCmp(cierre.id+'-sol-date-fecha-pago').getValue();
				var cuotas=Ext.getCmp(cierre.id+'-sol-txt-cuotas-pago').getValue();
				var monto = Ext.getCmp(cierre.id+'-sol-txt-monto-pago').getValue();
				var real=Ext.getCmp(cierre.id+'-sol-txt-monto-real-pago').getValue();
				
				global.Msg({
                    msg: '¿Seguro de Pagar cuota(s)?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cierre.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cierre.url+'setSaveCuota/',
			                    params:{
			                    	vp_sol_id_cli	:vp_sol_id_cli,
			                    	vp_fecha 		:fecha,
									vp_real			:vp_real
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(cierre.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//Ext.getCmp(cierre.id+'-select-garante').setValue('');
			                                	//var objp = Ext.getCmp(cierre.id+'-list-garante');
												//cierre.getReload(objp,{vp_op:'G',vp_id:vp_sol_id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});
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
			setAsignar: function (index,estado) {
                var grid = Ext.getCmp(cierre.id + '-grid-cuotas');
                var store = grid.getStore();
                var cuotas=0,monto=0;

                store.each(function (v, idx) {
                	var st=v.get('estado');
                	if(st=='X'){
	                	v.set('estado', 'P');
		                v.commit();
	            	}
                });
                grid.getView().refresh();


                store.each(function (v, idx) {
                    if (index >= idx) {
                    	var st=v.get('estado');
                    	if(st!='S'){
	                        v.set('estado', estado);
	                        v.commit();
                        }
                    }
                });
                grid.getView().refresh();

                store.each(function (v, idx) {
                	var st=v.get('estado');
                	if(st=='X'){
	                	monto+=parseFloat(v.get('valor_cuota'));
	                	cuotas += 1;
	                	
	            	}
                });
                Ext.getCmp(cierre.id+'-sol-txt-cuotas-pago').setValue(cuotas);
            	Ext.getCmp(cierre.id+'-sol-txt-monto-pago').setValue(monto);
            	Ext.getCmp(cierre.id+'-sol-txt-monto-real-pago').setValue(monto);
            },
            setCalculaPagoCuotas:function(){
            	var grid = Ext.getCmp(cierre.id + '-grid-cuotas');
                var store = grid.getStore();
                var cuotas=0,monto=0;
            	store.each(function (v, idx) {
                	var st=v.get('estado');
                	if(st=='X'){
	                	v.set('estado', 'P');
		                v.commit();
	            	}
                });
                grid.getView().refresh();
            },
			setPagar:function(){
				Ext.create('Ext.window.Window',{
	                id:cierre.id+'-win-cierre',
	                plain: true,
	                title:'Pagos',
	                icon: '/images/icon/1315404769_gear_wheel.png',
	                height: 150,
	                width: 360,
	                resizable:false,
	                modal: true,
	                border:false,
	                closable:true,
	                padding:20,
	                layout:'hbox',
	                items:[],
	                bbar:[       
	                    '->',
	                    '-',
	                    {
	                        xtype:'button',
	                        text: 'Pagar',
	                        icon: '/images/icon/1315404769_gear_wheel.png',
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
	                                Ext.getCmp(user.id+'-win-form-menu').close();
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
			setCleaDataCaja:function(){
				Ext.getCmp(cierre.id+'-txt-total-cobrado-caja').setValue(0);
            	Ext.getCmp(cierre.id+'-txt-total-dia-caja').setValue(0);
            	Ext.getCmp(cierre.id+'-txt-mora-caja').setValue(0);
            	Ext.getCmp(cierre.id+'-txt-valor-cuotas-caja').setValue(0);
            	Ext.getCmp(cierre.id+'-txt-cuotas-caja').setValue(0);
            	Ext.getCmp(cierre.id+'-txt-asesores-caja').setValue(0);
            	Ext.getCmp(cierre.id+'-cmb-estado-caja').setValue('N');
            	Ext.getCmp(cierre.id+'-txt-id-caja').setValue(0);

            	Ext.getCmp(cierre.id+'-txt-monto-cierre-caja').setValue(0);
            	Ext.getCmp(cierre.id+'-txt-monto-actual-caja').setValue(0);
            	Ext.getCmp(cierre.id+'-txt-monto-apertura-caja').setValue(0); 
			},
			getCaja:function(){
				cierre.setCleaDataCaja();
				var vp_id_age=Ext.getCmp(cierre.id+'-sol-cmb-agencia-filtro').getValue();
				var vp_fecha=Ext.getCmp(cierre.id+'-txt-fecha').getRawValue();
				Ext.getCmp(cierre.id+'-win-form').el.mask('Cargando…', 'x-mask-loading');
				Ext.Ajax.request({
					url:cierre.url+'getGenerarCaja/',
					params:{
						vp_agencia:vp_id_age,
						vp_fecha:vp_fecha
					},
					success: function(response, options){
						Ext.getCmp(cierre.id+'-win-form').el.unmask();
						var res = Ext.JSON.decode(response.responseText);
                        //control.getLoader(false);
                        try{
                        	Ext.getCmp(cierre.id+'-txt-total-cobrado-caja').setValue(res.cobado);
                        	Ext.getCmp(cierre.id+'-txt-total-dia-caja').setValue(res.total);
                        	Ext.getCmp(cierre.id+'-txt-mora-caja').setValue(res.mora);
                        	Ext.getCmp(cierre.id+'-txt-valor-cuotas-caja').setValue(res.valor_cuotas);
                        	Ext.getCmp(cierre.id+'-txt-cuotas-caja').setValue(res.cuotas);
                        	Ext.getCmp(cierre.id+'-txt-asesores-caja').setValue(res.asesores);
                        	Ext.getCmp(cierre.id+'-cmb-estado-caja').setValue(res.estado);
                        	Ext.getCmp(cierre.id+'-txt-id-caja').setValue(res.CODIGO);

                        	Ext.getCmp(cierre.id+'-txt-monto-cierre-caja').setValue(res.monto_cierre);
                        	Ext.getCmp(cierre.id+'-txt-monto-actual-caja').setValue(res.monto_actual);
                        	Ext.getCmp(cierre.id+'-txt-monto-apertura-caja').setValue(res.monto_apertura);
                        	cierre.getAsesores();
                        }catch(e){
                        	cierre.setCleaDataCaja();
                        }
					}
				});
			},
			getAsesores:function(){
				var vp_id_caja=Ext.getCmp(cierre.id+'-txt-id-caja').getValue();
				var vp_id_age=Ext.getCmp(cierre.id+'-sol-cmb-agencia-filtro').getValue();
				var vp_fecha=Ext.getCmp(cierre.id+'-txt-fecha').getRawValue();
				var vp_op=Ext.getCmp(cierre.id+'-txt-filter').getValue();
            	var vp_nombres=Ext.getCmp(cierre.id+'-txt-asesores').getValue(); 
            	var vp_doc_dni ='';
            	if(vp_op=='D'){
            		vp_doc_dni = vp_nombres;
            	}
		        Ext.getCmp(cierre.id+'-grid-asesores').getStore().removeAll();
				Ext.getCmp(cierre.id+'-grid-asesores').getStore().load(
	                {params: {vp_id_caja:vp_id_caja,vp_id_age:vp_id_age,vp_fecha:vp_fecha,vp_doc_dni:vp_doc_dni,vp_nombres:vp_nombres},
	                callback:function(){
	                	//Ext.getCmp(asesores.id+'-form').el.unmask();
	                	cierre.getchartsAsesores(0);
	                }
	            });
			},
			getClientes:function(vp_id){
				cierre.getchartsAsesores(vp_id);
				var vp_op=Ext.getCmp(cierre.id+'-txt-filter').getValue();
		        Ext.getCmp(cierre.id+'-list-clientes').getStore().removeAll();
				Ext.getCmp(cierre.id+'-list-clientes').getStore().load(
	                {params: {vp_id:vp_id},
	                callback:function(){
	                	//Ext.getCmp(asesores.id+'-form').el.unmask();
	                }
	            });
			},
			setDataSolicitud:function(data){
				Ext.getCmp(cierre.id+'-sol-date-fecha-solicitud').setValue(data.fecha_sol);
				Ext.getCmp(cierre.id+'-sol-cmb-agencia').setValue(data.id_age);
				
				var obja = Ext.getCmp(cierre.id+'-sol-cmb-asesor');
				cierre.getReload(obja,{vp_cod_age:data.id_age});

				Ext.getCmp(cierre.id+'-sol-txt-id-per').setValue(data.id_per);
				Ext.getCmp(cierre.id+'-sol-cmb-asesor').setValue(data.id_asesor);


				Ext.getCmp(cierre.id+'-sol-cmb-motivo').setValue(data.id_motivo);
				Ext.getCmp(cierre.id+'-sol-txt-id-solicitud').setValue(data.id_creditos);
				Ext.getCmp(cierre.id+'-sol-txt-nro-solicitud').setValue(data.nro_solicitud);
				Ext.getCmp(cierre.id+'-sol-cmb-moneda').setValue(data.moneda);
				Ext.getCmp(cierre.id+'-sol-txt-monto').setValue(data.monto_solicitado);
				Ext.getCmp(cierre.id+'-sol-txt-tipo-cliente').setValue(data.tipo_cliente);
				Ext.getCmp(cierre.id+'-sol-cmb-excepcion').setValue(data.excepcion);
				Ext.getCmp(cierre.id+'-sol-txt-import-aprobado').setValue(data.monto_aprobado);
				Ext.getCmp(cierre.id+'-sol-txt-numero-cuotas').setValue(data.nro_cuotas);
				Ext.getCmp(cierre.id+'-sol-txt-interes').setValue(data.interes);
				Ext.getCmp(cierre.id+'-sol-txt-mora').setValue(data.mora);

				Ext.getCmp(cierre.id+'-sol-txt-tot_credito').setValue(data.tot_credito);
				Ext.getCmp(cierre.id+'-sol-txt-tot_pagado').setValue(data.tot_pagado);
				Ext.getCmp(cierre.id+'-sol-txt-tot_saldo').setValue(data.tot_saldo);

				Ext.getCmp(cierre.id+'-sol-date-fecha-1-letra').setValue(data.fecha_1ra_letra);
				Ext.getCmp(cierre.id + '-txt-nota').setValue(data.nota);

				
				var objc = Ext.getCmp(cierre.id + '-grid-cuotas');
				cierre.getReload(objc,{VP_CODIGO:data.id_creditos});
			},
			setCollapse:function(){
				/*var W = Ext.getCmp(inicio.id + '-contenedor').getWidth();
				if(W<1680){
					Ext.getCmp(cierre.id+'-panel-direccion').collapse();
				}else{
					Ext.getCmp(cierre.id+'-panel-direccion').expand();
				}*/
			},
			getSelectUbi:function(){
				var obj=Ext.getCmp(cierre.id+'-sol-cmb-departamento');
				Ext.getCmp(cierre.id+'-sol-cmb-provincia').getStore().removeAll();
				Ext.getCmp(cierre.id+'-sol-cmb-Distrito').getStore().removeAll();
				cierre.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,'100101');
				var objp=Ext.getCmp(cierre.id+'-sol-cmb-provincia');
				Ext.getCmp(cierre.id+'-sol-cmb-Distrito').getStore().removeAll();
				cierre.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},objp,'100601');
				var objd=Ext.getCmp(cierre.id+'-sol-cmb-Distrito');
				cierre.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},objd,'100601');
			},
			setSaveSolicitud:function(op){
				/*DATOS DE SOLICITUD*/
				var vp_fecha_solicitud 	= Ext.getCmp(cierre.id+'-sol-date-fecha-solicitud').getRawValue();
				var vp_id_agencia 		= Ext.getCmp(cierre.id+'-sol-cmb-agencia').getValue();
				var vp_sol_id_per = Ext.getCmp(cierre.id+'-sol-txt-id-per').getValue();
				var vp_id_asesor 		= Ext.getCmp(cierre.id+'-sol-cmb-asesor').getValue();
				var vp_id_mot 			= Ext.getCmp(cierre.id+'-sol-cmb-motivo').getValue();
				var vp_id_solicitud 	= Ext.getCmp(cierre.id+'-sol-txt-id-solicitud').getValue();
				var vp_nro_solicitud 	= Ext.getCmp(cierre.id+'-sol-txt-nro-solicitud').getValue();
				var vp_moneda 			= Ext.getCmp(cierre.id+'-sol-cmb-moneda').getValue();
				var vp_monto 			= Ext.getCmp(cierre.id+'-sol-txt-monto').getValue();
				var vp_tipo_cliente 	= Ext.getCmp(cierre.id+'-sol-txt-tipo-cliente').getValue();
				var vp_excepcion 		= Ext.getCmp(cierre.id+'-sol-cmb-excepcion').getValue();
				var vp_import_aprobado 	= Ext.getCmp(cierre.id+'-sol-txt-import-aprobado').getValue();
				var vp_nro_cuotas 		= Ext.getCmp(cierre.id+'-sol-txt-numero-cuotas').getValue();

				var vp_interes  		= Ext.getCmp(cierre.id+'-sol-txt-interes').getValue();
				var vp_mora  	 		= Ext.getCmp(cierre.id+'-sol-txt-mora').getValue();


				var vp_fecha_1ra_letra 	= Ext.getCmp(cierre.id+'-sol-date-fecha-1-letra').getRawValue();
				var vp_nota 			= Ext.getCmp(cierre.id + '-txt-nota').getValue();

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

				if(vp_fecha_1ra_letra==''){
					global.Msg({msg:"Ingrese Fecha 1ra Letra.",icon:2,fn:function(){}});
					return false;
				}

				if(vp_nro_cuotas==''){
					global.Msg({msg:"Ingrese El número de Cuotas.",icon:2,fn:function(){}});
					return false;
				}

				op=(vp_id_solicitud=='' || vp_id_solicitud==0)?'I':'U';

				var msn=op=='I'?'¿Seguro de generar el crédito?':'¿Seguro de actualizar el crédito?';
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cierre.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cierre.url+'setSavecierre/',
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
			                        Ext.getCmp(cierre.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//Ext.getCmp(cierre.id+'-select-garante').setValue('');
			                                	//var objp = Ext.getCmp(cierre.id+'-list-garante');
												//cierre.getReload(objp,{vp_op:'G',vp_id:vp_sol_id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});
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
			setSavecierre:function(forma){
				
				var vp_sol_id_cli = Ext.getCmp(cierre.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(cierre.id+'-sol-txt-id-per').getValue();


				var sol_ape_pat = Ext.getCmp(cierre.id+'-sol-txt-apellido-paterno').getValue();
				var sol_ape_mat = Ext.getCmp(cierre.id+'-sol-txt-apellido-materno').getValue();
				var sol_nombres = Ext.getCmp(cierre.id+'-sol-txt-nombres').getValue();
				var sol_sexo = Ext.getCmp(cierre.id+'-sol-cmb-sexo').getValue();
				var sol_doc_dni = Ext.getCmp(cierre.id+'-sol-txt-doc-dni').getValue();
				var sol_doc_ce = Ext.getCmp(cierre.id+'-sol-txt-doc-ce').getValue();
				var sol_doc_cip = Ext.getCmp(cierre.id+'-sol-txt-doc-cip').getValue();
				var sol_doc_ruc = Ext.getCmp(cierre.id+'-sol-txt-doc-ruc').getValue();
				var sol_doc_cm = Ext.getCmp(cierre.id+'-sol-txt-doc-cm').getValue();
				var sol_estado_civil = Ext.getCmp(cierre.id+'-sol-cmb-estado-civil').getValue();
				var sol_fecha_nac = Ext.getCmp(cierre.id+'-sol-date-fecha-nac').getRawValue();

				/*var sol_domi_propio = Ext.getCmp(cierre.id+'-sol-chk-domi-propio').getValue();
				sol_domi_propio = sol_domi_propio?'S':'N';
				var sol_domi_pagando = Ext.getCmp(cierre.id+'-sol-chk-domi-pagando').getValue();
				sol_domi_pagando = sol_domi_pagando?'S':'N';
				var sol_domi_alquilado = Ext.getCmp(cierre.id+'-sol-chk-domi-alquilado').getValue();
				sol_domi_alquilado = sol_domi_alquilado?'S':'N';
				var sol_domi_familiar = Ext.getCmp(cierre.id+'-sol-chk-domi-familiar').getValue();
				sol_domi_familiar = sol_domi_familiar?'S':'N';*/

				var sol_domicilio = Ext.getCmp(cierre.id+'-sol-cmb-domicilio').getValue();
				var sol_estudios = Ext.getCmp(cierre.id+'-sol-cmb-estudios').getValue();
				var sol_profesion = Ext.getCmp(cierre.id+'-sol-txt-profesion').getValue();
				var sol_laboral = Ext.getCmp(cierre.id+'-sol-cmb-laboral').getValue();
				var sol_cargo = Ext.getCmp(cierre.id+'-sol-txt-cargo').getValue();
				var sol_centro_trabajo = Ext.getCmp(cierre.id+'-sol-txt-centro-trabajo').getValue();
				var sol_fecha_ingreso = Ext.getCmp(cierre.id+'-sol-date-fecha-ingreso').getRawValue();


				var vp_sol_id_tel = Ext.getCmp(cierre.id+'-sol-txt-id-tel').getValue();
				var vp_sol_id_dir = Ext.getCmp(cierre.id+'-sol-txt-id-dir').getValue();

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

				cierre.setSaveDatacierre(op=='D'?'¿Seguro de Eliminar?':'¿Seguro de guardar?',
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
			setSavecierreConyugue:function(forma){
				var vp_sol_id_per = Ext.getCmp(cierre.id+'-sol-txt-id-per').getValue();

				var sol_doc_dni = Ext.getCmp(cierre.id+'-select-conyugue').getValue();
				/*var sol_doc_ce = Ext.getCmp(cierre.id+'-sol-txt-doc-ce').getValue();
				var sol_doc_cip = Ext.getCmp(cierre.id+'-sol-txt-doc-cip').getValue();
				var sol_doc_ruc = Ext.getCmp(cierre.id+'-sol-txt-doc-ruc').getValue();
				var sol_doc_cm = Ext.getCmp(cierre.id+'-sol-txt-doc-cm').getValue();*/

				var op =forma;
				if(vp_sol_id_per==0){
					global.Msg({msg:"No es posible Eliminar, aun no existe un registro en la base datos.",icon:2,fn:function(){}});
					return false;
				}
				if(sol_doc_dni==''){
					global.Msg({msg:"Ingrese el DNI.",icon:2,fn:function(){}});
					return false;
				}

				var msn=op=='Z'?'¿Seguro de quitar relación?':'¿Seguro de Relacionar cierre?';
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cierre.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cierre.url+'setSavecierre/',
			                    params:{
			                    	vp_op:op,
									vp_sol_id_per:vp_sol_id_per,
									vp_sol_doc_dni:sol_doc_dni,
									vp_flag:'A'
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(cierre.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	Ext.getCmp(cierre.id+'-select-conyugue').setValue('');
			                                	var objp = Ext.getCmp(cierre.id+'-list-Conyugues');
												cierre.getReload(objp,{vp_op:'Y',vp_id:vp_sol_id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});
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
			setSavecierreGarante:function(forma){
				var vp_sol_id_per = Ext.getCmp(cierre.id+'-sol-txt-id-per').getValue();

				var sol_doc_dni = Ext.getCmp(cierre.id+'-select-garante').getValue();
				/*var sol_doc_ce = Ext.getCmp(cierre.id+'-sol-txt-doc-ce').getValue();
				var sol_doc_cip = Ext.getCmp(cierre.id+'-sol-txt-doc-cip').getValue();
				var sol_doc_ruc = Ext.getCmp(cierre.id+'-sol-txt-doc-ruc').getValue();
				var sol_doc_cm = Ext.getCmp(cierre.id+'-sol-txt-doc-cm').getValue();*/

				var op =forma;
				if(vp_sol_id_per==0){
					global.Msg({msg:"No es posible Eliminar, aun no existe un registro en la base datos.",icon:2,fn:function(){}});
					return false;
				}
				if(sol_doc_dni==''){
					global.Msg({msg:"Ingrese el DNI.",icon:2,fn:function(){}});
					return false;
				}

				var msn=op=='G'?'¿Seguro de quitar relación?':'¿Seguro de Relacionar cierre?';
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cierre.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cierre.url+'setSavecierre/',
			                    params:{
			                    	vp_op:op,
									vp_sol_id_per:vp_sol_id_per,
									vp_sol_doc_dni:sol_doc_dni,
									vp_flag:'A'
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(cierre.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	Ext.getCmp(cierre.id+'-select-garante').setValue('');
			                                	var objp = Ext.getCmp(cierre.id+'-list-garante');
												cierre.getReload(objp,{vp_op:'G',vp_id:vp_sol_id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});
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
			setSaveDatacierre:function(msn,params){
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cierre.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cierre.url+'setSavecierre/',
			                    params:params,
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(cierre.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//cierre.getHistory();
			                                	if(params.vp_op!='D'){
				                                	Ext.getCmp(cierre.id+'-sol-txt-id-cli').setValue(res.CODIGO);
				                                	Ext.getCmp(cierre.id+'-sol-txt-id-per').setValue(res.ID_PER);
				                            	}else{
				                            		Ext.getCmp(cierre.id+'-win-form').close();
				                            	}
				                            	var obj = Ext.getCmp(cierre.id+'-list-telefonos');
					                            cierre.getReload(obj,{vp_op:'P',vp_id:res.ID_PER,vp_flag:'A'});
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
				//cierre.setClearcierre();
				Ext.Ajax.request({
                    url:cierre.url+'getListPersona/',
                    params:{
                    	vp_op:'D',
						vp_id:0,
						vp_dni:dato,
						vp_nombres:''
                    },
                    timeout: 30000000,
                    success: function(response, options){
                        Ext.getCmp(cierre.id+'-win-form').el.unmask();
                        var res = Ext.JSON.decode(response.responseText);
                        console.log(res.data[0]);
                        var data = res.data[0];
                        //Ext.getCmp(cierre.id+'-sol-txt-id-cli').setValue(cierre.id_id);
                        //Ext.getCmp(cierre.id+'-sol-txt-id-per').setValue(data.id_per);
						/*Ext.getCmp(cierre.id+'-sol-txt-apellido-paterno').setValue(data.ape_pat);
						Ext.getCmp(cierre.id+'-sol-txt-apellido-materno').setValue(data.ape_mat);
						Ext.getCmp(cierre.id+'-sol-txt-nombres').setValue(data.nombres);
						Ext.getCmp(cierre.id+'-sol-cmb-sexo').setValue(data.sexo);
						Ext.getCmp(cierre.id+'-sol-txt-doc-dni').setValue(data.doc_dni);
						Ext.getCmp(cierre.id+'-sol-txt-doc-ce').setValue(data.doc_ce);
						Ext.getCmp(cierre.id+'-sol-txt-doc-cip').setValue(data.doc_cip);
						Ext.getCmp(cierre.id+'-sol-txt-doc-ruc').setValue(data.doc_ruc);
						Ext.getCmp(cierre.id+'-sol-txt-doc-cm').setValue(data.doc_cm);
						Ext.getCmp(cierre.id+'-sol-cmb-estado-civil').setValue(data.estado_civil);
						Ext.getCmp(cierre.id+'-sol-date-fecha-nac').setValue(data.fecha_nac);*/

						
						/*Ext.getCmp(cierre.id+'-sol-chk-domi-propio').setValue(data.domi_propio=='S'?true:false);
						Ext.getCmp(cierre.id+'-sol-chk-domi-pagando').setValue(data.domi_pagando=='S'?true:false);
						Ext.getCmp(cierre.id+'-sol-chk-domi-alquilado').setValue(data.domi_alquilado=='S'?true:false);
						Ext.getCmp(cierre.id+'-sol-chk-domi-familiar').setValue(data.domi_familiar=='S'?true:false);*/

						/*Ext.getCmp(cierre.id+'-sol-cmb-domicilio').setValue(data.domicilio);
						Ext.getCmp(cierre.id+'-sol-cmb-estudios').setValue(data.estudios);
						Ext.getCmp(cierre.id+'-sol-txt-profesion').setValue(data.profesion);
						Ext.getCmp(cierre.id+'-sol-cmb-laboral').setValue(data.laboral);
						Ext.getCmp(cierre.id+'-sol-txt-cargo').setValue(data.cargo);
						Ext.getCmp(cierre.id+'-sol-txt-centro-trabajo').setValue(data.id_empresa);
						Ext.getCmp(cierre.id+'-sol-date-fecha-ingreso').setValue(data.fecha_ingreso);*/

						//Ext.getCmp(cierre.id+'-sol-txt-id-tel').setValue(data.id_tel);
						/*Ext.getCmp(cierre.id+'-sol-txt-id-dir').setValue(data.id_dir);
						var obj = Ext.getCmp(cierre.id+'-list-telefonos');
						cierre.getReload(obj,{vp_op:'P',vp_id:data.id_per,vp_flag:'A'});*/

						

						//var obj = Ext.getCmp(cierre.id+'-sol-documentos-adjuntos');
						//cierre.getReload(obj,{vp_sol_id_per:data.id_per,vp_flag:'A'}); 
						//win.getGalery({container:'contenedor-documentos',forma:'L',url:cierre.url+'get_list_documentos/',params:{vp_sol_id_per:data.id_per,vp_flag:'A'} });

						/*if(data.id_dir!=0){
							cierre.getDirecciones(data.id_dir);
						}else{
							cierre.getSelectUbi();
						}*/
						//var objd = Ext.getCmp(cierre.id+'-list-direcciones');
						//cierre.getReload(objd,{vp_op:'R',vp_id:data.id_per,vp_nombre:''});

						/*if(data.img!==''){
							var img = '/persona/'+data.id_per+'/PHOTO/'+data.img;
							cierre.setPhotoForm(img,data.ape_pat+' '+data.ape_mat +', '+data.nombres);
						}*/

						/*var objp = Ext.getCmp(cierre.id+'-list-Conyugues');
						cierre.getReload(objp,{vp_op:'Y',vp_id:data.id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});

						var objg = Ext.getCmp(cierre.id+'-list-garante');
						cierre.getReload(objg,{vp_op:'G',vp_id:data.id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});
						*/
						var objv = Ext.getCmp(cierre.id+'-list-solicitudes');
						cierre.getReload(objv,{VP_T_DOC:'P',VP_ID_PER:data.id_per,VP_DOC:''});
                    }
                });
			},
			getDirecciones:function(id){
				Ext.Ajax.request({
                    url:cierre.url+'getListDirecciones/',
                    params:{
                    	vp_op:'C',
						vp_id:id,
						vp_nombres:''
                    },
                    timeout: 30000000,
                    success: function(response, options){
                        Ext.getCmp(cierre.id+'-win-form').el.unmask();
                        var res = Ext.JSON.decode(response.responseText);
                        console.log(res.data[0]);
                        var data = res.data[0];

                        Ext.getCmp(cierre.id+'-sol-txt-id-dir').setValue(data.id_dir);
						Ext.getCmp(cierre.id+'-sol-txt-dir-direccion').setValue(data.dir_direccion);
						Ext.getCmp(cierre.id+'-sol-txt-dir-numero').setValue(data.dir_numero);
						Ext.getCmp(cierre.id+'-sol-txt-dir-mz').setValue(data.dir_mz);
						Ext.getCmp(cierre.id+'-sol-txt-dir-lt').setValue(data.dir_lt);
						Ext.getCmp(cierre.id+'-sol-txt-dir-dpto').setValue(data.dir_dpto);
						Ext.getCmp(cierre.id+'-sol-txt-dir-interior').setValue(data.dir_interior);
						Ext.getCmp(cierre.id+'-sol-txt-dir-urb').setValue(data.dir_urb);
						Ext.getCmp(cierre.id+'-sol-txt-dir-referencia').setValue(data.dir_referencia);

						/*DIRECCIONES*/
						var obj=Ext.getCmp(cierre.id+'-sol-cmb-departamento');
						Ext.getCmp(cierre.id+'-sol-cmb-provincia').getStore().removeAll();
						Ext.getCmp(cierre.id+'-sol-cmb-Distrito').getStore().removeAll();
						cierre.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,data.cod_ubi_dep); 

						var objp=Ext.getCmp(cierre.id+'-sol-cmb-provincia');
						Ext.getCmp(cierre.id+'-sol-cmb-Distrito').getStore().removeAll();
						cierre.getUbigeo({VP_OP:'P',VP_VALUE:data.cod_ubi_dep},objp,data.cod_ubi_pro);

						var objd=Ext.getCmp(cierre.id+'-sol-cmb-Distrito');
						cierre.getUbigeo({VP_OP:'X',VP_VALUE:data.cod_ubi_pro},objd,data.cod_ubi);

						//Ext.getCmp(cierre.id+'-sol-cmb-departamento').setValue(data.cod_ubi_dep);
						//Ext.getCmp(cierre.id+'-sol-cmb-provincia').setValue(data.cod_ubi_pro);
						//Ext.getCmp(cierre.id+'-sol-cmb-Distrito').setValue(data.cod_ubi);
                    }
                });
			},
			setClearcierre:function(){
				//Ext.getCmp(cierre.id+'-sol-txt-id-per').setValue(0);
				Ext.getCmp(cierre.id+'-sol-txt-apellido-paterno').setValue('');
				Ext.getCmp(cierre.id+'-sol-txt-apellido-materno').setValue('');
				Ext.getCmp(cierre.id+'-sol-txt-nombres').setValue('');
				Ext.getCmp(cierre.id+'-sol-cmb-sexo').setValue('M');
				Ext.getCmp(cierre.id+'-sol-txt-doc-dni').setValue('');
				Ext.getCmp(cierre.id+'-sol-txt-doc-ce').setValue('');
				Ext.getCmp(cierre.id+'-sol-txt-doc-cip').setValue('');
				Ext.getCmp(cierre.id+'-sol-txt-doc-ruc').setValue('');
				Ext.getCmp(cierre.id+'-sol-txt-doc-cm').setValue('');
				Ext.getCmp(cierre.id+'-sol-cmb-estado-civil').setValue('S');
				Ext.getCmp(cierre.id+'-sol-txt-centro-trabajo').setValue('0');
				Ext.getCmp(cierre.id+'-sol-date-fecha-nac').setValue('');

				
				/*Ext.getCmp(cierre.id+'-sol-chk-domi-propio').setValue(false);
				Ext.getCmp(cierre.id+'-sol-chk-domi-pagando').setValue(false);
				Ext.getCmp(cierre.id+'-sol-chk-domi-alquilado').setValue(false);
				Ext.getCmp(cierre.id+'-sol-chk-domi-familiar').setValue(false);*/
			},
			setSavecierreIMG:function(){
				var vp_sol_id_cli = Ext.getCmp(cierre.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(cierre.id+'-sol-txt-id-per').getValue();



			},
			setClearTelefono:function(){
				Ext.getCmp(cierre.id+'-sol-txt-id-tel').setValue(0);
				Ext.getCmp(cierre.id+'-sol-cmb-tipo-tel').setValue('CE');
				Ext.getCmp(cierre.id+'-sol-cmb-line-tel').setValue('CL');
				Ext.getCmp(cierre.id+'-sol-txt-tel-cel').setValue('');
				Ext.getCmp(cierre.id+'-sol-cmb-tel-estado').setValue('A');
			},
			setSaveTelefono:function(forma){
				var vp_sol_id_cli = Ext.getCmp(cierre.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(cierre.id+'-sol-txt-id-per').getValue();
				var vp_sol_id_tel = Ext.getCmp(cierre.id+'-sol-txt-id-tel').getValue();

				if(vp_sol_id_per=='' || vp_sol_id_per == 0){
					global.Msg({msg:"Debe guardar los datos de la cierre antes.",icon:2,fn:function(){}});
					return false;
				}

				var vp_sol_tipo_tel = Ext.getCmp(cierre.id+'-sol-cmb-tipo-tel').getValue();
				var vp_sol_line_tel = Ext.getCmp(cierre.id+'-sol-cmb-line-tel').getValue();
				var vp_flag = Ext.getCmp(cierre.id+'-sol-cmb-tel-estado').getValue();
				var sol_tel_cel = Ext.getCmp(cierre.id+'-sol-txt-tel-cel').getValue();

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

				

				cierre.setSaveTelefonoData({vp_op:op,vp_sol_id_per:vp_sol_id_per,vp_sol_id_tel:vp_sol_id_tel,vp_sol_tel_cel:sol_tel_cel,vp_sol_tipo_tel:vp_sol_tipo_tel,vp_sol_line_tel:vp_sol_line_tel,vp_flag:vp_flag},'¿Seguro de guardar?');
			},
			setSaveTelefonoData:function(params,msn){
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cierre.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cierre.url+'setSavePhone/',
			                    params:params,
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(cierre.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//cierre.getHistory();
			                                	//Ext.getCmp(cierre.id+'-sol-txt-id-tel').setValue(res.CODIGO);
			                                	cierre.setClearTelefono();
			                                	var obj = Ext.getCmp(cierre.id+'-list-telefonos');
				                            	cierre.getReload(obj,{vp_op:'P',vp_id:params.vp_sol_id_per,vp_flag:'A'});
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
				Ext.getCmp(cierre.id+'-sol-txt-id-dir').setValue(0);
				Ext.getCmp(cierre.id+'-sol-txt-dir-direccion').setValue('');
				Ext.getCmp(cierre.id+'-sol-txt-dir-numero').setValue('');
				Ext.getCmp(cierre.id+'-sol-txt-dir-mz').setValue('');
				Ext.getCmp(cierre.id+'-sol-txt-dir-lt').setValue('');
				Ext.getCmp(cierre.id+'-sol-txt-dir-dpto').setValue('');
				Ext.getCmp(cierre.id+'-sol-txt-dir-interior').setValue('');
				Ext.getCmp(cierre.id+'-sol-txt-dir-urb').setValue('');
				Ext.getCmp(cierre.id+'-sol-txt-dir-referencia').setValue('');
			},
			setSaveDireccion:function(){

				var vp_sol_id_cli = Ext.getCmp(cierre.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(cierre.id+'-sol-txt-id-per').getValue();
				
				var vp_sol_id_dir = Ext.getCmp(cierre.id+'-sol-txt-id-dir').getValue();
				var vp_op = vp_sol_id_dir==0?'I':'U';
				var sol_dir_direccion = Ext.getCmp(cierre.id+'-sol-txt-dir-direccion').getValue();
				var sol_dir_numero = Ext.getCmp(cierre.id+'-sol-txt-dir-numero').getValue();
				var sol_dir_mz = Ext.getCmp(cierre.id+'-sol-txt-dir-mz').getValue();
				var sol_dir_lt = Ext.getCmp(cierre.id+'-sol-txt-dir-lt').getValue();
				var sol_dir_dpto = Ext.getCmp(cierre.id+'-sol-txt-dir-dpto').getValue();
				var sol_dir_interior = Ext.getCmp(cierre.id+'-sol-txt-dir-interior').getValue();
				var sol_dir_urb = Ext.getCmp(cierre.id+'-sol-txt-dir-urb').getValue();
				var sol_dir_referencia = Ext.getCmp(cierre.id+'-sol-txt-dir-referencia').getValue();
				var sol_departamento = Ext.getCmp(cierre.id+'-sol-cmb-departamento').getValue();
				var sol_provincia = Ext.getCmp(cierre.id+'-sol-cmb-provincia').getValue();
				var sol_distrito = Ext.getCmp(cierre.id+'-sol-cmb-Distrito').getValue();

				if(vp_sol_id_per=='' || vp_sol_id_per == 0){
					global.Msg({msg:"Debe guardar los datos de la cierre antes.",icon:2,fn:function(){}});
					return false;
				}

				global.Msg({
                    msg: '¿Seguro de guardar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cierre.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cierre.url+'setSaveDireccion/',
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
			                        Ext.getCmp(cierre.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//cierre.getHistory();
			                                	//Ext.getCmp(cierre.id+'-win-form').close();
			                                	var objd = Ext.getCmp(cierre.id+'-list-direcciones');
												cierre.getReload(objd,{vp_op:'R',vp_id:vp_sol_id_per,vp_nombre:''});
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
				var vp_sol_id_per = Ext.getCmp(cierre.id+'-sol-txt-id-per').getValue();
				global.Msg({
                    msg: '¿Seguro de Eliminar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cierre.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cierre.url+'setSaveDireccion/',
			                    params:{
			                    	vp_op:'D',
			                    	vp_sol_id_per:vp_sol_id_per,
									vp_sol_id_dir:id_dir
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(cierre.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//cierre.getHistory();
			                                	//Ext.getCmp(cierre.id+'-win-form').close();
			                                	var objd = Ext.getCmp(cierre.id+'-list-direcciones');
												cierre.getReload(objd,{vp_op:'R',vp_id:vp_sol_id_per,vp_nombre:''});
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
	                	//Ext.getCmp(cierre.id+'-form').el.unmask();
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
				var tab=Ext.getCmp(cierre.id+'-tabContent');
				var active=Ext.getCmp(cierre.id+cierre.back);
				tab.setActiveTab(active);
			},
			getcierre:function(){
				var vp_op=Ext.getCmp(cierre.id+'-txt-estado-filter').getValue();
            	var vp_nombre=Ext.getCmp(cierre.id+'-txt-cierre').getValue();
		            Ext.getCmp(cierre.id+'-menu-view').getStore().removeAll();
				Ext.getCmp(cierre.id+'-menu-view').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:vp_nombre},
	                callback:function(){
	                	//Ext.getCmp(cierre.id+'-form').el.unmask();
	                }
	            });
			},
			getEdit:function(index){
				var rec = Ext.getCmp(cierre.id + '-grid-cierre').getStore().getAt(index);
				cierre.setForm('U',rec.data);
			},
			getNew:function(){
				cierre.setForm('I',{id_cierre:0,usr_codigo:'',usr_nombre:'',usr_perfil:1,usr_estado:1});
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
			setSavecierre:function(op){

		    	var codigo = Ext.getCmp(cierre.id+'-txt-codigo').getValue();
		    	var usuario = Ext.getCmp(cierre.id+'-txt-usuario-cierre').getValue();
		    	var clave = Ext.getCmp(cierre.id+'-txt-clave').getValue();
		    	var nombre = Ext.getCmp(cierre.id+'-txt-nombre-cierre').getValue();
		    	var perfil = Ext.getCmp(cierre.id+'-cmb-perfil').getValue();
		    	var estado = Ext.getCmp(cierre.id+'-cmb-estado-cierre').getValue();

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
                    		Ext.getCmp(cierre.id+'-win-form').el.mask('Elinando Páginas…', 'x-mask-loading');
	                        scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:control.url+'set_save/',
			                    params:{
			                    	vp_op:op,
			                    	vp_id_cierre:codigo,
			                    	vp_usr_codigo:usuario,
			                    	vp_usr_passwd:clave,
			                    	vp_usr_nombre:nombre,
			                    	vp_usr_perfil:perfil,
			                    	vp_usr_estado:estado
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                        Ext.getCmp(cierre.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	cierre.getHistory();
			                                	Ext.getCmp(cierre.id+'-win-form').close();
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
		    	var vp_op = Ext.getCmp(cierre.id+'-txt-estado-filter').getValue();
				var nombre = Ext.getCmp(cierre.id+'-txt-cierre').getValue();

		    	Ext.getCmp(cierre.id + '-grid-cierre').getStore().removeAll();
				Ext.getCmp(cierre.id + '-grid-cierre').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:nombre},
	                callback:function(){
	                	//Ext.getCmp(cierre.id+'-form').el.unmask();
	                }
	            });
	            
		    },
			getImagen:function(param){
				win.getGalery({container:'GaleryFull',width:390,height:250,params:{forma:'F',img_path:'/cierre/icon/'+param}});///cierre/
			},
			getContratos:function(shi_codigo){
				Ext.getCmp(cierre.id+'-cbx-contrato').getStore().removeAll();
				Ext.getCmp(cierre.id+'-cbx-contrato').getStore().load(
	                {params: {vp_shi_codigo:shi_codigo},
	                callback:function(){
	                	//Ext.getCmp(cierre.id+'-form').el.unmask();
	                }
	            });
			},
			getAddMagicRefresh:function(url){
			    var symbol = '?';//url.indexOf('?') == -1 ? '?' : '&';
			    var magic = Math.random()*999999;
			    return url + symbol + 'magic=' + magic;
			},
			setPhotoForm:function(img,nombre){
				var img = cierre.getAddMagicRefresh(img);
				win.getGalery({container:'imagen-contenedor',forma:'F',width:170,height:200,params:{img_path:img,title:nombre}});
				/*
				var panel = Ext.getCmp(cierre.id + '-photo-person');
				panel.removeAll();
				panel.add({
                    html: '<img id="imagen-cierre" src="'+img+'" style="width:100%; height:"100%;overflow: scroll;" />',
                    border:false,
                    bodyStyle: 'background: transparent;text-align:center;'//style=""
                });

                panel.doLayout();

                var image = document.getElementById('imagen-cierre');
				var downloadingImage = new Image();
				downloadingImage.onload = function(){
				    image.src = this.src;
	                Ext.getCmp(cierre.id + '-photo-person').doLayout();
				};
				downloadingImage.src = img;
				console.log(img);*/
			},
			getCentroTrabajo:function(){
				win.show({vurl: cierre.url_ct+'get_centro_trabajo/?rollback=cierre.getReloadCentroTrabajo();', id_menu: clientes.id_menu, class: ''});
			},
			getReloadCentroTrabajo:function(){
				
			},
			setGenerateMovimiento:function(){
				var monto_actual = Ext.getCmp(cierre.id+'-txt-monto-actual-caja').getValue();
				Ext.create('Ext.window.Window',{
	                id:cierre.id+'-win-form-movimiento',
	                plain: true,
	                title:'Generar Movimiento',
	                icon: '/images/icon/actualizar.png',
	                height: 280,
	                width: 250,
	                resizable:false,
	                modal: true,
	                border:false,
	                closable:true,
	                padding:20,
	                //layout:'fit',
	                items:[
	                	{
                            xtype:'combo',
                            fieldLabel: 'CONCEPTO',
                            id:cierre.id+'-cmb-conceptos',
                            store: cierre.store_conceptos,
                            queryMode: 'local',
                            triggerAction: 'all',
                            valueField: 'id_concepto',
                            displayField: 'nombre',
                            emptyText: '[Seleccione]',
                            labelAlign:'right',
                            //allowBlank: false,
                            padding:'5px 5px 5px 5px',
                            labelAlign:'top',
                            width:'98%',
                            labelWidth:70,
                            //flex:1,
                            //height:40,
                            labelStyle: "font-size:13px;font-weight:bold;padding:0px 0px 0px 0px;text-align: center;font-weight: bold",
                            fieldStyle: 'font-size:20px; text-align: right; font-weight: bold',
                            anchor:'100%',
                            
                            //readOnly: true,
                            listeners:{
                                afterrender:function(obj, e){
                                	//cierre.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
                                	//obj.setValue(2);
                                },
                                select:function(obj, records, eOpts){
                        			//var obja = Ext.getCmp(cierre.id+'-sol-cmb-asesor');
									//cierre.getReload(obja,{vp_cod_age:obj.getValue()});
                                }
                            }
                        },
                        {
                            xtype: 'textfield',	
                            fieldLabel: 'MONTO ACTUAL',
                            id:cierre.id+'-txt-monto-actual-caja-mov',
                            bodyStyle: 'background: transparent',
		                    padding:'10px 5px 5px 5px',
                            //id:cobranza.id+'-txt-dni',
                            labelWidth:65,
                            readOnly:true,
                            labelAlign:'top',
                            width:'98%',
                            //flex:1,
                            //columnWidth: 0.2,
                            height:50,
                            labelStyle: "font-size:13px;font-weight:bold;padding:0px 0px 0px 0px;text-align: center;font-weight: bold",
                            fieldStyle: 'font-size:20px; text-align: right; font-weight: bold',
                            value:monto_actual,
                            maskRe: new RegExp("[0-9.]+"),
                            //anchor:'100%',
                            listeners:{
                                afterrender:function(obj, e){
                                },
                                keypress:function(e) {
                                	//cobranza.setPagarCuotas();
                                }
                            }
                        },
                        {
                            xtype: 'textfield',	
                            fieldLabel: 'MONTO',
                            id:cierre.id+'-txt-monto-movimiento',	
                            bodyStyle: 'background: transparent',
		                    padding:'10px 5px 5px 5px',
                            //id:cobranza.id+'-txt-dni',
                            labelWidth:65,
                            //readOnly:true,
                            labelAlign:'top',
                            width:'98%',
                            //flex:1,
                            //columnWidth: 0.2,
                            height:50,
                            labelStyle: "font-size:13px;font-weight:bold;padding:0px 0px 0px 0px;text-align: center;font-weight: bold",
                            fieldStyle: 'font-size:20px; text-align: right; font-weight: bold',
                            value:'',
                            maskRe: new RegExp("[0-9.]+"),
                            //anchor:'100%',
                            listeners:{
                                afterrender:function(obj, e){
                                },
                                keypress:function(e) {
                                	//cobranza.setPagarCuotas();
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
	                            	cierre.setRegisterMovCaja();
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
	                                Ext.getCmp(cierre.id+'-win-form-movimiento').close();
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
			setRegisterMovCaja:function(){
				/*DATOS DE SOLICITUD*/
				var id_caja =Ext.getCmp(cierre.id+'-txt-id-caja').getValue();
				var agencia =Ext.getCmp(cierre.id+'-sol-cmb-agencia-filtro').getValue();
				var fecha   =Ext.getCmp(cierre.id+'-txt-fecha').getRawValue();

				var vp_id_concepto  	= Ext.getCmp(cierre.id+'-cmb-conceptos').getValue();
				var vp_monto_mov 		= Ext.getCmp(cierre.id+'-txt-monto-movimiento').getValue();
				
				if(!id_caja){
					global.Msg({msg:"Seleccione una caja para generar el movimiento",icon:2,fn:function(){}});
					return false;
				}
				if(!agencia){
					global.Msg({msg:"Seleccione una agencia para generar la caja diaria",icon:2,fn:function(){}});
					return false;
				}

				if(vp_id_concepto==''){
					global.Msg({msg:"Seleccione un concepto.",icon:2,fn:function(){}});
					return false;
				}
				if(vp_monto_mov==''){
					global.Msg({msg:"Ingrese el Monto.",icon:2,fn:function(){}});
					return false;
				}
				if(vp_monto_mov<=0){
					global.Msg({msg:"Ingrese un Monto mayor a cero.",icon:2,fn:function(){}});
					return false;
				}

				global.Msg({
                    msg: '¿Seguro de generar el movimiento de caja?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cierre.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cierre.url+'setRegisterMovCaja/',
			                    params:{
			                    	vp_id_caja:id_caja,
			                    	vp_id_age:agencia,
			                    	vp_id_concepto 		:vp_id_concepto,
			                    	vp_monto_mov  		:vp_monto_mov
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(cierre.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	Ext.getCmp(cierre.id+'-win-form-movimiento').close();
			                                	try{
				                                	Ext.getCmp(cierre.id+'-txt-total-cobrado-caja').setValue(res.cobado);
				                                	Ext.getCmp(cierre.id+'-txt-total-dia-caja').setValue(res.total);
				                                	Ext.getCmp(cierre.id+'-txt-mora-caja').setValue(res.mora);
				                                	Ext.getCmp(cierre.id+'-txt-valor-cuotas-caja').setValue(res.valor_cuotas);
				                                	Ext.getCmp(cierre.id+'-txt-cuotas-caja').setValue(res.cuotas);
				                                	Ext.getCmp(cierre.id+'-txt-asesores-caja').setValue(res.asesores);
				                                	Ext.getCmp(cierre.id+'-cmb-estado-caja').setValue(res.estado);
				                                	Ext.getCmp(cierre.id+'-txt-id-caja').setValue(res.CODIGO);

				                                	Ext.getCmp(cierre.id+'-txt-monto-cierre-caja').setValue(res.monto_cierre);
				                                	Ext.getCmp(cierre.id+'-txt-monto-actual-caja').setValue(res.monto_actual);
				                                	Ext.getCmp(cierre.id+'-txt-monto-apertura-caja').setValue(res.monto_apertura);
				                                	cierre.getAsesores();
				                                }catch(e){

				                                }
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
			}
		}
		Ext.onReady(cierre.init,cierre);
	}else{
		tab.setActiveTab(cierre.id+'-win-form');
	}
</script>