//wangEditor-viewym-plugin.js
window.wangEditor.viewym = {
	// editor create之后调用
	init: function(editorSelector){
		$(editorSelector + " .w-e-toolbar").append('<div class="w-e-menu"><a class="_wangEditor_btn_viewym" href="###" onclick="window.wangEditor.viewym.toggleViewym(\'' + editorSelector + '\')">源码</a></div>');
	},

	toggleViewym: function(editorSelector){
		if($(editorSelector + ' ._wangEditor_btn_viewym').text() == '源码'){
			$(editorSelector + ' ._wangEditor_btn_viewym').text('退出源码');
			var cc = $(editorSelector ).find('.w-e-text').html( );
			$(editorSelector).addClass('viewym-editor');
			$(editorSelector ).find('.w-e-text').text( cc );
		}else{
			var c_c = $(editorSelector ).find('.w-e-text').text();
			$(editorSelector ).find('.w-e-text').html( c_c ) ;
			$(editorSelector + ' ._wangEditor_btn_viewym').text('源码');
		}
	}
};





