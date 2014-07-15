$(function(){

	var announcementAPIURL = getTransferData('announcement-api-url');
	var announcementURL = getTransferData('announcement-url');
	$('.announcement-row').click(function(){
		var announcementID = $(this).data('announcement-id');
		ajaxGet(announcementAPIURL + '/' + announcementID, {id: announcementID}, displayAnnouncement);
	});

	function displayAnnouncement(data){
		var date = new Date(data['created_at']);
		var foot = '發佈時間:' + date.toLocaleDateString() + ' ' + date.getHours() + ':' + date.getMinutes();
		$.jumpWindow(data['title'], data['content'], foot);
		$.pushLocation('公告', announcementURL + '/' + data['id']);
	}

	var calenderAPIURL = getTransferData('calender-api-url');
	var calenderURL = getTransferData('calender-url');
	$('.calender-row').click(function(){
		var id = $(this).data('id');
		ajaxGet(calenderAPIURL + '/' + id, {id: id}, displayCalender);
	});

	function displayCalender(data){
		var start = new Date(data['start_at']);
		var end = new Date(data['end_at']);
		var time = '適用時間:' + start.toLocaleDateString() + ' ~ ' + end.toLocaleDateString();
		$.jumpWindow(data['title'], data['content'], time);
		$.pushLocation('行事曆', calenderURL + '/' + data['id']);
	}


});