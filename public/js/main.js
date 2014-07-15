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
	$.post(url, data, success_callback);
}

function ajaxGet(url, data, success_callback){
	$.get(url, data, success_callback);
}


function pushLocation(name, url){
	$.pushLocation(name, url);
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

$(function(){

	var loginAjaxUrl = getTransferData('login-ajax-url');

	$('#login-form').submit(function(e){
		var postData = $(this).serializeArray();

		ajaxPost(loginAjaxUrl, postData, function(data){
			if(data == 'Error'){
				$.alertMessage('帳號或密碼錯誤', {type: 'alert-danger'});
			}else if(data['id'] != undefined){
				$.alertMessage(data['name'] + ' 歡迎回來!');
				setTimeout(function(){location.reload();}, 4000);
			}else{
				$.alertMessage('帳號或密碼錯誤', 'alert-error');
			}

		});
		e.preventDefault();
	});
});

$.pushLocation = function(name, url){
	var bURL = getTransferData('burl');

	var defaults = {
		name: '頁面',
		url: bURL
	};

	var options = $.extend({}, defaults, options);

	var siteMap = $('#site_map');
	var aTag = $('<a></a>').text(name).attr('href', bURL + url);
	var span = $('<span></span>').append(aTag).append('/');
	siteMap.append(span)
	changeURL(url);
};

$.alertMessage = function(text, options){

	var defaults = {
		delay: 5000,
		type: "alert-success"
	};

	var settings = $.extend({}, defaults, options);
	var alertTarget = $('#alert-messages');
	var div = $('<div class="alert" role="alert"></div>').addClass("alert " + settings.type).text(text).appendTo(alertTarget);

	div.animate({opacity: 1}).delay(settings.delay).animate({opacity: 0}, null, function(){$(this).remove()});
};

$.jumpWindow = function(head, body, foot, options){

	var defaults = {
		head: '',
		body: '',
		foot: ''
	};

	options = $.extend({}, defaults, options);


	$('#jump-window-head').html(head);
	$('#jump-window-body').html(body);
	$('#jump-window-footer').html(foot);
	$('#jump-window').modal('show');

};
$(function(){
//	$('body').jScrollPane();
});
