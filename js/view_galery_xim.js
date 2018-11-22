/****************************/
/******Created by Xim********/
/**********Xim***************/

var ImageChooser_class_img_xim = function(config){
	this.config = config;
}

ImageChooser_class_img_xim.prototype = {
    // cache data by image name for easy lookup
    lookup : {},
	chooser:'',
	id_xim:'',
	url:'bloque_consultas/travel/capas/Control.php',
	aerolinea:'',
	subtitulo:'',
	nota:'',
	precio:'',
	show : function(el, callback){
		if(!this.win){
			this.initTemplates();

			this.store = new Ext.data.JsonStore({
			    url: this.config.url,
			    root: 'images',
				baseParams:{op:'lista_imagen'},
				totalProperty: 'result',
			    fields: [
			        'name', 'url','nombre','id','img',
			        {name:'size', type: 'float'},
					{name:'nombre'},
			        {name:'lastmod', type:'date', dateFormat:'timestamp'}
			    ],
			    listeners: {
			    	'load': {fn:function(){ this.view.select(0); }, scope:this, single:true}
			    }
			});
			//this.store.load();
			
			this.pagingbar = new Ext.PagingToolbar({
			style: 'border:1px solid #99BBE8;',
			store: this.store,
			pageSize: 80,
			displayInfo:true,
			displayMsg:'{0} - {1} de {2} Imagenes',
			emptyMsg:'Sin Imagenes',
			doRefresh:function(){
					Ext.getCmp('xim-view-ext-galeri').getStore().reload({
						params:{
							op:'lista_imagen',id_xim:ImageChooser_class_img_xim.id_xim
						}
					});
				}
			});	
			var formatSize = function(data){
		        if(data.size < 1024) {
		            return data.size + " bytes";
		        } else {
		            return (Math.round(((data.size*10) / 1024))/10) + " KB";
		        }
		    };

			var formatData = function(data){
		    	data.shortName = data.name.ellipse(15);
		    	data.sizeString = formatSize(data);
		    	data.dateString = new Date(data.lastmod).format("m/d/Y g:i a");
		    	this.lookup[data.name] = data;
		    	return data;
		    };

		    this.view = new Ext.DataView({
				id:'xim-view-ext-galeri',
				store: this.store,
				tpl: this.thumbTemplate,
				singleSelect: true,
				loadMask:true,
				overClass:'x-view-over',
				itemSelector: 'div.thumb-wrap',
				displayField: 'url',
				valueField: 'id',
				emptyText : '<div style="padding:10px;">No se encontraron Imagenes</div>',
				listeners: {
					'selectionchange': {fn:this.showDetails, scope:this, buffer:100},
					'dblclick'       : {fn:this.doCallback, scope:this},
					'loadexception'  : {fn:this.onLoadException, scope:this},
					'beforeselect'   : {fn:function(view){
				        return view.store.getRange().length > 0;
				    }
					}
				},
				prepareData: formatData.createDelegate(this)
			});

			var cfg = {
		    	title: 'Contenedor de Imagenes',
		    	id: 'img-chooser-dlg',
		    	layout: 'border',
				minWidth: 500,
				minHeight: 300,
				modal: true,
				closeAction: 'hide',
				border: false,
				items:[{
					id: 'img-chooser-view',
					region: 'center',
					autoScroll: true,
					items: this.view,
                    tbar:[{
                    	text: 'Filtro:'
                    },{
                    	xtype: 'textfield',
                    	id: 'filter',
                    	selectOnFocus: true,
                    	width: 200,
                    	listeners: {
                    		'render': {fn:function(){
						    	Ext.getCmp('filter').getEl().on('keyup', function(){
						    		this.filter();
						    	}, this, {buffer:500});
                    		}, scope:this}
                    	}
                    }, ' ', '-', {
                    	text: 'Ordenar Por:'
                    }, {
                    	id: 'sortSelect',
                    	xtype: 'combo',
				        typeAhead: true,
				        triggerAction: 'all',
				        width: 100,
				        editable: false,
				        mode: 'local',
				        displayField: 'desc',
				        valueField: 'name',
				        lazyInit: false,
				        value: 'name',
				        store: new Ext.data.ArrayStore({
					        fields: ['name', 'desc'],
					        data : [['name', 'Nombre'],['size', 'Tamaño'],['lastmod', 'Modificado']]
					    }),
					    listeners: {
							'select': {fn:this.sortImages, scope:this}
					    }
				    }]
				},{
					id: 'img-detail-panel',
					region: 'east',
					split: true,
					collapsible:true,
					width: 150,
					minWidth: 150,
					maxWidth: 250
				}],
				buttons: [
				this.pagingbar,
				{
					id: 'ok-btns',
					text: 'Cargar Imagen',
					iconCls:'imagen',
					handler: this.cargaImagen,
					scope: this
				},{
					id: 'ok-btn',
					text: 'Aceptar',
					iconCls:'aceptar',
					handler: this.doCallback,
					scope: this
				},{
					text: 'Cancelar',
					iconCls:'cancelar',
					handler: function(){ this.win.hide(); },
					scope: this
				}],
				keys: {
					key: 27, // Esc key
					handler: function(){ this.win.hide(); },
					scope: this
				}
			};
			Ext.apply(cfg, this.config);
		    this.win = new Ext.Window(cfg);
		}

		this.reset();
	    this.win.show(el);
		this.callback = callback;
		this.animateTarget = el;
	},
	cargaImagen:function(){
			var aerolinea = ImageChooser_class_img_xim.aerolinea;
			var subtitulo = ImageChooser_class_img_xim.subtitulo;
			var nota = ImageChooser_class_img_xim.nota;
			var precio = ImageChooser_class_img_xim.precio;
			title = 'CARGA IMAGEN';
		//WinOpen(['cargar_imagen',title,ImageChooser_class_img_xim.url+'?op=carga_imagen&aero='+aerolinea+'&subtitulo='+subtitulo+'&nota='+nota+'&precio='+precio+'&opcion='+'".$parametros['id_xim']."','','500','455',true]);
		var win = new Ext.Window({
			title:title,
			layout:'fit',
			id:'xim-vent',
			width:parseInt(500),
			height:parseInt(460),
			resizable: false,
			modal:true,
			closable:false,
			//items: tree
			html:"<div id='cargar_imagen'></div>",
			buttons: [
				/*{
					id: 'ok-btn-xim',
					text: 'Aceptar',
					iconCls:'aceptar',
					//handler: this.doCallback,
					scope: this
				},*/{
					text: 'Salir',
					iconCls:'salir',
					handler: function(){ 
					this.closep(); 
					},
					scope: this
				}
				]
		});
		win.show();
		var data = '';
		var datas = '?op=carga_imagen&aero='+aerolinea+'&subtitulo='+subtitulo+'&nota='+nota+'&precio='+precio+'&opcion='+ImageChooser_class_img_xim.id_xim;
		Ext.Ajax.request({
		url:'bloque_consultas/travel/capas/Control.php'+datas,
		params:data,
		success:function(response,options){					
		//alert(response.responseText);
			document.getElementById('cargar_imagen').innerHTML =response.responseText;
		}
		});
		},
		closep:function(){
			Ext.getCmp('xim-vent').close();
			this.load_store_view();
		},
	load_store_view : function(){
		Ext.getCmp('xim-view-ext-galeri').getStore().reload({
			params:{
				op:'lista_imagen',id_xim:ImageChooser_class_img_xim.id_xim
			}
		});
	},
	initTemplates : function(){
		this.thumbTemplate = new Ext.XTemplate(
			'<tpl for=".">',
				'<div class="thumb-wrap" id="{name}">',
				'<div class="thumb"><img src="{url}" title="{nombre}"></div>',
				'<span style="display:block;overflow: hidden;text-align: center;">{nombre}</span></div>',
			'</tpl>'
		);
		this.thumbTemplate.compile();

		this.detailsTemplate = new Ext.XTemplate(
			'<div class="details">',
				'<tpl for=".">',
					'<img src="{url}" height="100" width="120"><div class="details-info">',
					'<b>Nombre de Imagen:</b>',
					'<span>{nombre}</span>',
					'<b>Tamaño:</b>',
					'<span>{sizeString}</span>',
					'<b>Modificado:</b>',
					'<span>{dateString}</span></div>',
				'</tpl>',
			'</div>'
		);
		this.detailsTemplate.compile();
	},

	showDetails : function(){
	    var selNode = this.view.getSelectedNodes();
	    var detailEl = Ext.getCmp('img-detail-panel').body;
		if(selNode && selNode.length > 0){
			selNode = selNode[0];
			Ext.getCmp('ok-btn').enable();
		    var data = this.lookup[selNode.id];
            detailEl.hide();
            this.detailsTemplate.overwrite(detailEl, data);
            detailEl.slideIn('l', {stopFx:true,duration:.2});
		}else{
		    Ext.getCmp('ok-btn').disable();
		    detailEl.update('');
		}
	},

	filter : function(){
		var filter = Ext.getCmp('filter');
		this.view.store.filter('nombre', filter.getValue());
		this.view.select(0);
	},

	sortImages : function(){
		var v = Ext.getCmp('sortSelect').getValue();
    	this.view.store.sort(v, v == 'name' ? 'asc' : 'desc');
    	this.view.select(0);
    },

	reset : function(){
		if(this.win.rendered){
			Ext.getCmp('filter').reset();
			this.view.getEl().dom.scrollTop = 0;
		}
	    this.view.store.clearFilter();
		this.view.select(0);
	},
	doCallback : function(){
		var selNode = this.view.getSelectedNodes()[0];
		var callback = this.callback;
		var lookup = this.lookup;
		this.win.hide(this.animateTarget, function(){
			if(selNode && callback){
				var data = lookup[selNode.id];
				callback(data);
			}
		});
	},
	onLoadException : function(v,o){
	    this.view.getEl().update('<div style="padding:10px;">Problemas al cargar las Imagenes.</div>');
	}
};

String.prototype.ellipse = function(maxLength){
    if(this.length > maxLength){
        return this.substr(0, maxLength-3) + '...';
    }
    return this;
};
