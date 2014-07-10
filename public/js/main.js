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

function pushLocation(name, url){
	var aTag = $('<a></a>').text(name).attr('href', url);
	var span = $('<span></span>').append(aTag).appendText('/');
	$('#site_map').append(span)
}


function changeURL(url){
	window.history.pushState("大一生活知訊網", "NCUFresh", url);
}