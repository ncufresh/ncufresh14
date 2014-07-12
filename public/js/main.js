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
	var bURL = getTransferData('burl');
	var siteMap = $('#site_map');
	var aTag = $('<a></a>').text(name).attr('href', bURL + url);
	var span = $('<span></span>').append(aTag).append('/');
	siteMap.append(span)
	changeURL(url);
}

function popLocation(){
	$('#site_map').children().last().remove();
	window.history.back();
}

function changeURL(url){
	history.pushState({data: 'data'}, "NCUFresh", url);
}

function test(){
		ajaxGet('/api/v1/link', '', function(data){
		data = {testData: $('#calender').text()};
		$('#calender').text(data);
		pushLocation('換地方嚕', '/link', data, "iNeedGoBack");
	})
}

//Refresh page if user back.XD
$(window).on('popstate', function(event) {
	var state = event.originalEvent.state;
	if ( !state ) { return; }
	location.reload();
});

