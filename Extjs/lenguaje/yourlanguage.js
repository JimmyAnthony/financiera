
var Language = {
	data: [
		['Crysfel Villa','Software developer',25,'Quizzpot','xim.xp3js'],
		['Hazel Quinteros','Software developer',25,'ThecnoSoft','xim.xp3js'],
		['John Doe','Quality assurance',27,'Microsoft','xim.xp3js'],
		['Peter Patrelly','Software Architect',35,'Google','xim.xp3js'],
		['Claire Bennet','Quality assurance',21,'Yahoo','xim.xp3js'],
		['Jack Slocum','Chief Software Architect',32,'Ext JS','xim.xp3js'],
		['Xim','Chief Software Architect',32,'Ext JS','xim.xp3js']
	],
	
	init: function(){
		Ext.form.Field.prototype.msgTarget = 'side';
		Ext.QuickTips.init();

		this.createGrid();
		//this.createForm();
	},
	
	createForm: function(){
		var win = new Ext.Window({
			title:'Form example',
			width:260,
			height: 200,
			bodyStyle: 'padding:10px;background-color:#fff;',
			items:[new Ext.form.FormPanel({
				border: false,
				labelAlign: 'top',
				defaults: {allowBlank:false,width:200},
				items:[
					new Ext.form.TextField({fieldLabel:'Name'}),
					new Ext.form.DateField({fieldLabel: 'Start Date'})
				]
			})],
			buttons:[{text:Ext.MessageBox.buttonText.ok},{text:Ext.MessageBox.buttonText.cancel}]
		});
		win.show();
	},
	createGrid: function(){
		var store = new Ext.data.SimpleStore({fields: ['name', 'title', 'age','company','Xim'],data:this.data});
		var win = new Ext.Window({
			title:'Grid example',
			width:450,
			height:300,
			layout:'fit',
			items:[
				new Ext.grid.GridPanel({
					store: store,
					border:false,
					tbar:[
						{text:'Add',handler:this.createForm,icon:'add_16.png',cls:'x-btn-text-icon'},
						{text:'Remove',handler:this.alert,icon:'cancel_16.png',cls:'x-btn-text-icon'}
					],
					columns:[
						{header:'Name',dataIndex:'name',sortable:true},
						{header:'Title',dataIndex:'title',sortable:true},
						{header:'Age',dataIndex:'age',sortable:true},
						{header:'Company',dataIndex:'company',sortable:true},
						{header:'o_o',dataIndex:'Xim',sortable:true}
					],
					bbar: new Ext.PagingToolbar({
			            pageSize: 4,
			            store: store,
			            displayInfo: true
			        })
				})
			]
		});
		win.show();
	},
	
	alert: function(){
		Ext.Msg.alert('Removed','This is just an example! Just a dummy!');
	}
};

Ext.onReady(Language.init,Language);