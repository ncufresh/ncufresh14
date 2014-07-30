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
	$.popLocation();

}

function changeURL(url){
	if(history.pushState){
		history.pushState({data: 'data'}, "NCUFresh", url);
	}
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
	if(history.pushState){
		location.reload();
	}
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
				setTimeout(function(){location.reload();}, 2500);
			}else{
				$.alertMessage('帳號或密碼錯誤', 'alert-error');
			}

		});
		e.preventDefault();
	});
});

$.pushLocation = function(name, url, options){
	var bURL = getTransferData('burl');

	var defaults = {
		name: '頁面',
		url: url,
		full: false
	};

	var options = $.extend({}, defaults, options);

	if(options.full == false){
		options.url = bURL + url;
	}

	var siteMap = $('#siteMapContainer');
	var aTag = $('<a></a>').text(name).attr('href', options.url);
	var li = $('<li class="site_map_item"></li>').append(aTag);
	siteMap.append(li);
	changeURL(options.url);
};

$.popLocation = function(){
	$('#siteMapContainer').children().last().remove();
	if(history.pushState){
		window.history.back();
	}
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
		foot: '',
		pop: true
	};

	options = $.extend({}, defaults, options);


	$('#jump-window-head').html(head);
	$('#jump-window-body').html(body);
	$('#jump-window-footer').html(foot);
	$('#jump-window').modal('show').data('pop-location', options.pop);

};
$(function(){
	$('#jump-window').on('hide.bs.modal', function (e) {
		if($(this).data('pop-location') == true){
			$.popLocation();
		}
	});

	var ua = window.navigator.userAgent;
	var msie = ua.indexOf("MSIE ");

	if (msie > 0){

		$('[placeholder]').focus(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
				input.removeClass('placeholder');
			}
		}).blur(function() {
			var input = $(this);
			if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.addClass('placeholder');
				input.val(input.attr('placeholder'));
			}
		}).blur().parents('form').submit(function() {
			$(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
					input.val('');
				}
			})
		});

	}
});

$.konami = function(options)
{
    var options = $.extend({
        code:                   [38, 38, 40, 40, 37, 39, 37, 39],
        interval:               10,
        complete:               function()
        {
           alert("you complete a konami code");
        }
    }, options);
    var index = 0;
    var interval = options.interval;
    var timer = setInterval(function()
    {
        if ( interval-- <= 0 ) index = 0;
    }, 50);
    $(document).keyup(function(event)
    {
        if (
            event.keyCode != 231
         && event.keyCode == options.code[index]
        )
        {
            interval = options.interval;
            if ( index++ == options.code.length - 1 ) options.complete();
            return true;
        }
        index = 0;
        return true;
    });
};