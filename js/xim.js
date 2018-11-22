// JavaScript Document
Ext.ns('ximx');
ximx = {
	ids:'xim_',
	xim:0,
	init:function(){
		
	},
	show:function(param){
		this.param = param;
        this.param.vnombre=this.param.vnombre==undefined?'none':this.param.vnombre;
        this.param.vfile=this.param.vfile==undefined?'':this.param.vfile;
        this.param.vfile2=this.param.vfile2==undefined?'':this.param.vfile2;
        this.param.vwidth=this.param.vwidth==undefined?'':parseInt(this.param.vwidth);
        this.param.vheigth=this.param.vheigth==undefined?'':parseInt(this.param.vheigth);
        this.param.vjs=this.param.vjs==undefined?'':this.param.vjs;
        this.param.title=this.param.title==undefined?this.param.vnombre:this.param.title;
        this.param.vmin=this.param.vmin==undefined?false:this.param.vmin;
        this.param.vmax=this.param.vmax==undefined?true:this.param.vmax;
        this.param.vclos=this.param.vclos==undefined?true:this.param.vclos;
        this.param.vcolap=this.param.vcolap==undefined?false:this.param.vcolap;
        this.param.vdrag=this.param.vdrag==undefined?true:this.param.vdrag;
        this.param.vmod=this.param.vmod==undefined?true:this.param.vmod;
        this.param.vrez=this.param.vrez==undefined?false:this.param.vrez;
        var js = this.param.vjs;
        var vform = this.param.vfile;
        var vform2 = this.param.vfile2;
        var idvnt = this.param.vnombre;
		var data = this.param.data;
		this.ximxx = new Ext.Window({
			id:'Div_'+idvnt,
            title: this.param.title,//'Travel', 
            width: this.param.vwidth,
            height:this.param.vheigth,
            layout:'fit',
            autoDestroy:true,
            autoScroll:true,
            minimizable: this.param.vmin,
             maximizable: true,// this.param.vmax,
            closable:this.param.vclos,
            collapsible:this.param.vcolap,
			draggable:this.param.vdrag,
            autoLoad:{
				url:vform,
                method:'POST',
                params:data,
                scripts:true,
                scope:this,
                text:'Cargando...'
            },
            modal:this.param.vmod,
			listeners:{
				'render':function(obj){
					ximx.xim = 1;
				},
				onEsc:function(){
						if(ximx.xim ==1){ximxx.close(idvnt);ximx.destroy();ximx.xim =0;}
				}/*this.ximxx.destroy();*/
			},
			resizable:this.param.vrez
        });
        this.ximxx.show();
		//this.ximxx.hide();
        this.ximxx.center();
        this.ximxx.toFront();
		this.loaders();
	},
	close:function(id){
		Ext.getCmp('Div_'+id).close();
	},
	loaders:function(){
		Ext.MessageBox.show({
		   title: 'LIC. EFREN CORRO VALLE',
		   msg: 'Cargando Informacion...',
		   progressText: 'Inicializando...',
		   width:300,
		   id:ximx.ids+'loader-xim',
		   wait:true,
		   closable:true
		   //animEl: 'mb6'
	   });	
	},
	closep:function(){
		Ext.MessageBox.hide();
	}
}
/*var url="../bloque_consultas/empresa/capas/Control.php";*/
  		/*WinOpen(['edita_empresa',title,url,'','320','230',true]);*/
		/*var data = "op=lista_empre2&id="+id;
       	ximx.show({vnombre:'fromeditar',vfile:url,data:data,title:'EDITAR EMPRESA',vwidth:'400',vheigth:'300',moduleId:'fromeditar',options:{}});*/