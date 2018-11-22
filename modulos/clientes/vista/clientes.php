<script type="text/javascript">

    Ext.ns('xim.estadistica.clientes');
	xim.estadistica.clientes={
        id:'xim.estadistica.clientes',
        url:'modulos/clientes/capas/control.php',		
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
                baseParams:{op:'get_grid_clientes'},
                root:'data',
                fields:['cod_cli','telefonos','dni','domicilio','nombres','apellidos','nomb','flag']
            });
            var ESTADISTICA_EFREN_CORRO_VALLES = new Ext.Panel({
                //title:'PANEL DE ADMINISTRACION TRAVEL',
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
                                        id:xim.estadistica.clientes.id+'_div_parent_busssD',
                                        items:[
                                            {
                                                xtype:'panel',
                                                border:false,
                                                layout:'table',
                                                id:xim.estadistica.clientes.id+'div_documentoss',
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
                                                                //store: this.store,
                                                                fieldLabel:'Buscar Por',
                                                                id: 'filter-galeriesSSS',
                                                                emptyText:'Ingrese Nombre a buscar...',
                                                                enableKeyEvents:true,
                                                                width:320,
                                                                listeners:{
                                                                    keypress:function(obj,e){
                                                                        if (e.keyCode == e.ENTER) {
                                                                            Ext.getCmp( xim.estadistica.clientes.id+'_cmb_documento').setValue('');
                                                                            var sub = Ext.getCmp('filter-galeries').getValue();
                                                                            Ext.getCmp(xim.estadistica.clientes+'_grid_TRAVEL_VUELOS').getStore().reload({
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
                                                                        Ext.getCmp( xim.estadistica.clientes.id+'_cmb_documento').setValue('');
                                                                        var sub = Ext.getCmp('filter-galeries').getValue();
                                                                        Ext.getCmp(xim.estadistica.clientes+'_grid_TRAVEL_VUELOS').getStore().reload({
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
                                            Ext.fly(clock.getEl().parent()).addClass('x-status-text-panel').createChild({cls:'spacer'});

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
                                        id:xim.estadistica.clientes+'_grid_clientes',
                                        columns:[
                                            new Ext.grid.RowNumberer(),
                                            {header:'Codigo',dataIndex:'cod_cli',width:50},
                                            {header:'Nombres',dataIndex:'nombres',width:130},
                                            {header:'Apellidos',dataIndex:'apellidos',width:130},
                                            {header:'Telefono',dataIndex:'telefonos',width:70},
                                            {header:'DNI',dataIndex:'dni',width:70},
                                            {header:'Domicilo',dataIndex:'domicilio',width:150},
                                            {header:'Nombre de Garante',dataIndex:'nomb',width:160},
                                            {header:'Estado',dataIndex:'flag',width:80},
                                            chk_model],
                                        bbar: new Ext.PagingToolbar({
                                            id:xim.estadistica.clientes.id+'_pager',
                                            store:store,
                                            displayInfo:true,
                                            displayMsg:'{0} - {1} de {2} Clientes.',
                                            emptyMsg:'Sin Clientes',
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
                                var data = 'op=form_nuevo_cliente';
                                ximx.show({title:'Nuevo Cliente',vnombre:'ESTADISTICA_CLIENTES_NUEVO',vfile:xim.estadistica.clientes.url,data:data,moduleId:'from_nuevo',vwidth:'680',vheigth:'420'});
                            }
                        }
                    },
                    {
                        text:'Editar',
                        iconCls:'editar',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
                                var grid = Ext.getCmp(xim.estadistica.clientes+'_grid_clientes').getSelectionModel().getSelections();
                                if(grid.length <= 0){
                                    Ext.Msg.show({
                                        title: 'MAC',
                                        msg: 'Selecciona un Registro por favor!',
                                        buttons: Ext.Msg.OK,
                                        icon: Ext.Msg.WARNING
                                    });
                                }else{
									var cod_cli = grid[0].get('cod_cli');
                                    var data = 'op=form_nuevo_cliente&cod_cli='+cod_cli;
                                ximx.show({title:'Editar Cliente',vnombre:'ESTADISTICA_CLIENTES_NUEVO',vfile:xim.estadistica.clientes.url,data:data,moduleId:'from_nuevo',vwidth:'680',vheigth:'420'});
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
                                xim.estadistica.clientes.XimRecorre(0);
                            }
                        }
                    },
                    {
                        text:'Desactivar',
                        iconCls:'desactivar',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
                                xim.estadistica.clientes.XimRecorre(1);
                            }
                        }
                    },
                    //////////////////////////////////////////////////
                    {
                        text:'Salir',
                        iconCls:'salir',
                        listeners:{
                            click:function(obj, e){
                                /*
                                tabs.remove(xim.estadistica.clientes.id,true);*/
                            }
                        }
                    }                ]
            });
            tab.add({
                title: 'Clientes',
                id:'ESTADISTICA_CLIENTES',
                iconCls:'user_suit',
                autoScroll:true,
                layout:'fit',
                items:[
                    ESTADISTICA_EFREN_CORRO_VALLES
					],
                closable:true,
                listeners:{
                    'render':function(obj){
                        ximx.ximxx.close();
                        ximx.closep();
                    }
                }
            }).show();
        },
        XimRecorre:function(flag){
            var ximz = Ext.getCmp(xim.estadistica.clientes+'_grid_clientes').getSelectionModel().getSelections();
            if(ximz.length <= 0){
                Ext.Msg.show({
                    title: 'SIMI',
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
                    myXIM[ix] = ximz[ix].get('cod_cli');
                }
                Ext.getCmp(xim.estadistica.clientes+'_grid_clientes').el.mask('Cargando...', 'x-mask-loading');
                var data = 'op=general_desactivaActiva&flag='+parseInt(flag)+'&cod_cli='+myXIM;
                Ext.Ajax.request({
                    url:xim.estadistica.clientes.url,
                    params:data,
                    success:function(response,options){
                        Ext.getCmp(xim.estadistica.clientes+'_grid_clientes').el.unmask();
                        var msg = Ext.decode(response.responseText);
                        if(parseInt(msg['est'])==1){
                            Ext.Msg.show({
                                title: 'MAC',
                                msg: 'El proceso termino correctamente!', 
                                buttons: Ext.Msg.OK, 
                                icon: Ext.Msg.INFO 
                            });
                            Ext.getCmp(xim.estadistica.clientes+'_grid_clientes').getStore().reload({
                                params:{
                                    op:'get_grid_clientes'
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
    Ext.onReady(xim.estadistica.clientes.init,xim.estadistica.clientes);
</script>
<style>
    .agregar{background: url(iconos/AddGreenButton.png) no-repeat !important;}
    .buscar{background: url(iconos/Binocular.png) no-repeat !important;}
</style>