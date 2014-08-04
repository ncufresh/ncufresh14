$(function(){

	window.app = {};

	dataSection = $('#data-section');

	var userId = getTransferData('user-id');
	var userName = getTransferData('user-name');

	var lastSend = 0;

	if(userId == undefined){
		userId = 0;
		userName = '遊客';
	}
	if("WebSocket" in window){

	var path = $('#chat-room').data('chatroom-url');
	app.BrainSocket = new BrainSocket(
		new WebSocket('ws://'+path+':27704'),
		new BrainSocketPubSub()
	);

	//get data
	app.BrainSocket.Event.listen('generic.event',function(msg){
		displayMessage(msg.client.data.user_name, msg.client.data.message, '');
	});

	app.BrainSocket.Event.listen('generic.success',function(data){
		displayMessage('系統', '連線成功', 'success');
	});

	app.BrainSocket.Event.listen('app.error',function(data){
		displayMessage('系統', '連線失敗', 'error');
	});

	$('#chat-message').keypress(function(event) {

		if(event.keyCode == 13){
			if($.now() - lastSend >= 10000){
				lastSend = $.now();
				app.BrainSocket.message('generic.event',
				{
						'message': $(this).val(),
						'user_id': userId,
						'user_name': userName
				}
				);
				$(this).val('');
			}else{
				$.alertMessage('10秒只能發言一次噢=D', {type: 'alert-warning'});
			}

		}

		return event.keyCode != 13;
	});
	var isChatroomOpen = false;
	$('#chat-room-button').click(function() {
		if ( !isChatroomOpen ) {
			$('#chat-room').animate({
				right: '0px'
			});
		}
		else {
			$('#chat-room').animate({
				right: '-230px'
			});
		}
		isChatroomOpen = !isChatroomOpen;
	});
	function displayMessage(name, message, type){
		//0 default 1 success 2 error
		var spanName = $('<span class="chat-name"></span>').text(name + '：');
		var spanMessage = $('<span class="chat-message"></span>').text(message);
		var divRow = $('<div class="chat-row"></div>').append(spanName).append(spanMessage);
		$('#chat-log').append(divRow);
		$('#chat-log').scrollTop($('#chat-log').height()*2)

	}
	}else{
		$('#chat-room-button').click(function() {
			$.alertMessage('想聊天請使用更佳的瀏覽器', {type: 'alert-warning'});
		});
	}
});