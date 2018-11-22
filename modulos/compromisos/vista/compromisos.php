<script type="text/javascript">

    Ext.ns('compromisos.varios');
	compromisos.varios={
        id:'compromisos.varios',
        url:'modulos/creditos/capas/control.php',
        init:function(){
            var clock = new Ext.Toolbar.TextItem('');
            var tab = Ext.getCmp('tab_panel');
            var chk_model = new Ext.grid.CheckboxSelectionModel({
                singleSelect:false,
                checkOnly:false,
                injectCheckbox :false
            });			

            var store = new Ext.data.JsonStore({
                url:this.url,
                autoLoad:true,
                baseParams:{op:'get_lista_creditos'},
                root:'data',
                fields:['cod_credito','fecha','cod_cli','nombres','tasa_interes','cod_metodo','nombre_metodo','prestamo','cuotas','cod_tipo','nombre_tipo','valor_cuota','fecha_calculo','total_credito','nota','cod_entrega','nombre_entrega','flag']
            });
            var COMPROMISO = new Ext.Panel({
                //title:'',
                layout:'border',
                //height:495,
                //frame:true,
                items:[
                    {
                        xtype:'panel',
                        border:false,
                        region: 'north',
                        height:60,
                        items:[
                            {
                                xtype:'fieldset',
                                //region: 'north',
                                title:'Buscar por',
                                //height:60,
                                layout:'table',
                                layoutConfig:{
                                    columns:5
                                },
                                items:[
                                    {
                                        xtype:'panel',
                                        border:false,
                                        width:900,
                                        id:'_busquedassss',
                                        items:[
                                            {
                                                xtype:'panel',
                                                border:false,
                                                layout:'table',
                                                id:compromisos.varios.id+'buscar_documentosss',
                                                layoutConfig:{
                                                    columns:10
                                                },
                                                items:[                                                   
                                                    {
                                                        xtype:'panel',
                                                        width:430,
                                                        layout:'form',
                                                        labelWidth:100,
                                                        border:false,
                                                        items:[
                                                            new Ext.ux.form.SearchField({
                                                                store: this.store,
                                                                fieldLabel:'Buscar Por',
                                                                id: 'filter-nombresddd',
                                                                emptyText:'Ingrese Nombre a buscar...',
                                                                enableKeyEvents:true,
                                                                width:320,
                                                                listeners:{
                                                                    keypress:function(obj,e){
                                                                        if (e.keyCode == e.ENTER) {
                                                                            Ext.getCmp( compromisos.varios.id+'_cmb_documento').setValue('');
                                                                            var sub = Ext.getCmp('filter-galeries').getValue();
                                                                            Ext.getCmp(compromisos.varios+'_grid_TRAVEL_VUELOS').getStore().reload({
                                                                                params:{
                                                                                    op:'grid_travel_busqueda',subtitulo:sub,opcion:2
                                                                                }
                                                                            });}
                                                                    },
                                                                    keyup:function(obj,e){
                                                                        //xim.com.sentencia.galeria.filter();
                                                                    }
                                                                }
                                                            })
                                                        ]
                                                    },
                                                    {
                                                        xtype:'panel',
                                                        border:false,
                                                        items:[
                                                            {
                                                                xtype:'button',
                                                                iconCls:'buscar',
                                                                text:'Buscar',
                                                                //width:80,
                                                                listeners:{
                                                                    click:function(obj,e){
                                                                        Ext.getCmp( compromisos.varios.id+'_cmb_documento').setValue('');
                                                                        var sub = Ext.getCmp('filter-galeries').getValue();
                                                                        Ext.getCmp(compromisos.varios+'_grid_TRAVEL_VUELOS').getStore().reload({
                                                                            params:{
                                                                                op:'grid_travel_busqueda',subtitulo:sub,opcion:2
                                                                            }
                                                                        });
                                                                    }
                                                                }
                                                            }
                                                        ]
                                                    }
                                                ]
                                            }//fin
                                        ]
                                    }
                                ]
                            }]
                    },
                    {//panel GRID
                        xtype:'panel',
                        border:false,
                        layout:'fit',
                        region:'center',
                        items:[
                            {
                                xtype:'panel',
                                border:false,
                                listeners: {
                                    render:{
                                        fn: function(){
                                            Ext.fly(clock.getEl().parent()).addClass('x-status-text-panels').createChild({cls:'spacer'});

                                            // Kick off the clock timer that updates the clock el every second:
                                            Ext.TaskMgr.start({
                                                run: function(){
                                                    Ext.fly(clock.getEl()).update(new Date().format('g:i:s A'));
                                                },
                                                interval: 1000
                                            });
                                        },
                                        delay: 100
                                    }
                                },
                                layout:'fit',
                                //region:'center',
                                items:[
                                    {
                                        xtype:'grid',
                                        store:store,
                                        layout:'fit',
                                        id:compromisos.varios+'_grid_clientes',									
                                        columns:[
                                            new Ext.grid.RowNumberer(),
                                            {header:'Codigo',dataIndex:'cod_credito',width:45},
                                            {header:'Fecha',dataIndex:'fecha',width:70},
                                            {header:'Cliente',dataIndex:'nombres',width:160},
                                            {header:'Prestamo',dataIndex:'prestamo',width:60},
											{header:'Nro Cuotas',dataIndex:'cuotas',width:70},
											{header:'Valor Cuota',dataIndex:'valor_cuota',width:70},
                                            {header:'Interes%',dataIndex:'tasa_interes',width:55},
                                            {header:'Tipo de Cuotas',dataIndex:'nombre_tipo',width:85},
                                            {header:'Metodo',dataIndex:'nombre_metodo',width:60},
											{header:'Total Credito',dataIndex:'total_credito',width:70},
                                            {header:'Estado',dataIndex:'flag',width:80},
                                            chk_model],
                                        bbar: new Ext.PagingToolbar({
                                            id:compromisos.varios.id+'_pagers',
                                            store:store,
                                            displayInfo:true,
                                            displayMsg:'{0} - {1} de {2} Prestamos.',
                                            emptyMsg:'Sin Prestamos',
                                            pageSize:80,
                                            items: ['',clock]
                                        }),
                                        sm:chk_model,
                                        stripeRows:true,
                                        anchor:'99%',
                                        loadMask:true
                                        /*,
                        sm: new Ext.grid.RowSelectionModel({
                            singleSelect:true,
                            listeners:{
                                rowselect:function(sm,row,rec){

                                }
                            }
                        })*/
                                    }//fin grid
                                ]}
                        ]}
                ],
                buttonAlign:'left',
                buttons:[
                    {
                        text:'Nuevo',
                        iconCls:'nuevo',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
                                var data = 'op=form_nuevo_credito';
                                ximx.show({title:'Nuevo Credito',vnombre:'ESTADISTICA_CREDITO_NUEVO',vfile:compromisos.varios.url,data:data,moduleId:'from_nuevo',vwidth:'780',vheigth:'500'});
                            }
                        }
                    },
                    {
                        text:'Editar',
                        iconCls:'editar',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
                                var grid = Ext.getCmp(compromisos.varios+'_grid_clientes').getSelectionModel().getSelections();
                                if(grid.length <= 0){
                                    Ext.Msg.show({
                                        title: 'MAC',
                                        msg: 'Selecciona un Registro!',
                                        buttons: Ext.Msg.OK,
                                        icon: Ext.Msg.WARNING
                                    });
                                }else{
                                    var cod_credito = grid[0].get('cod_credito');
                                   	var data = 'op=form_nuevo_credito&editar=editar&cod_credito='+cod_credito;
                                	ximx.show({title:'Editar Credito',vnombre:'ESTADISTICA_CREDITO_NUEVO',vfile:compromisos.varios.url,data:data,moduleId:'from_nuevo',vwidth:'780',vheigth:'500'});
                                }
                            }
                        }
                    },
                    {
                        text:'Activar',
                        iconCls:'activar',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
                                compromisos.varios.XimRecorre(0);
                            }
                        }
                    },
                    {
                        text:'Anular',
                        iconCls:'desactivar',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
                                compromisos.varios.XimRecorre(1);
                            }
                        }
                    },                   
                    {
                        text:'Salir',
                        iconCls:'salir',
                        listeners:{
                            click:function(obj, e){
                                /*
                                tabs.remove(compromisos.varios.id,true);*/
                            }
                        }
                    }                ]
            });
            tab.add({
                title: 'Creditos',
                id:'ESTADISTICA_CREDITOS',//'XIM_VUELOS',
                iconCls:'Sofa',
                autoScroll:true,
                layout:'fit',
                items:[
                    COMPROMISO                ],
                closable:true,
                listeners:{
                    'render':function(obj){
                        ximx.ximxx.close();
                        ximx.closep();
                    }
                }
            }).show();
        },
        ximRecorreElimina:function(opciones){
          
        }

        ,
        XimRecorre:function(flag){
            var ximz = Ext.getCmp(compromisos.varios+'_grid_clientes').getSelectionModel().getSelections();
            if(ximz.length <= 0){
                Ext.Msg.show({
                    title: 'MAC',
                    msg: 'Selecciona almenos un Registro!',
                    buttons: Ext.Msg.OK,
                    icon: Ext.Msg.WARNING
                });
            }else{
			
              	if(!confirm('Desea ejecutar el proceso?')){return;}
                /*****************************/
                var myXIM = new Array();
                /****************************/
                for(var ix=0;ix<ximz.length;++ix){
                    myXIM[ix] = ximz[ix].get('cod_credito');
                }
                Ext.getCmp(compromisos.varios+'_grid_clientes').el.mask('Cargando...', 'x-mask-loading');
                var data = 'op=set_general_desactivaActiva&flag='+parseInt(flag)+'&cod_credito='+myXIM;
                Ext.Ajax.request({
                    url:compromisos.varios.url,
                    params:data,
                    success:function(response,options){
                        Ext.getCmp(compromisos.varios+'_grid_clientes').el.unmask();
                        var msg = Ext.decode(response.responseText);
                        if(parseInt(msg['est'])==1){
                            Ext.Msg.show({
                                title: 'MAC',
                                msg: 'El proceso termino correctamente!',
                                buttons: Ext.Msg.OK,
                                icon: Ext.Msg.INFO 
                            });
						Ext.getCmp(compromisos.varios+'_grid_clientes').getStore().reload({
							params:{
								op:'get_lista_creditos'
							}
						});		
                        }else{//
                            Ext.Msg.show({
                                title: 'MAC',
                                msg: 'Ocurrio un Error al tratar de almacenar la informacion, informe al Administrador del Sistema',
                                buttons: Ext.Msg.OK,
                                icon: Ext.Msg.ERROR
                            });

                        }
                    }
                });
            }
        }
    }
    Ext.onReady(compromisos.varios.init,compromisos.varios);
</script>
<style>
    .agregar{background: url(iconos/AddGreenButton.png) no-repeat !important;}
    .buscar{background: url(iconos/Binocular.png) no-repeat !important;}
</style>