function escapeHtml(text) {
	return text
		.replace(/&/g, "&amp;")
		.replace(/</g, "&lt;")
		.replace(/>/g, "&gt;")
		.replace(/"/g, "&quot;")
		.replace(/'/g, "&#039;");
}

function getTransferData(index){
	return $('#data_section').data(index);
}

function ajaxPost(url, data, success_callback){
	if($.isPlainObject(data) != true || typeof data == undefined){
		throw "Data is not allow!";
	}else{
		$.post(url, data, success_callback);
	}
}

function ajaxGet(url, data, success_callback){
	$.get(url, data, success_callback);
}