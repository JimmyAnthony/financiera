
var ManyLanguages = {
	init: function(){
		Ext.get('language').on('change',function(){
			document.location = document.location.pathname+'?lang='+this.getValue();
		});
	}
};

Ext.onReady(ManyLanguages.init,ManyLanguages);