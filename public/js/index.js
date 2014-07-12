$(function(){

	var announcementAPIURL = getTransferData('announcement-api-url');
	var announcementURL = getTransferData('announcement-url');
	$('.announcement-row').click(function(){
		var announcementID = $(this).data('announcement-id');
		console.log(announcementID);
		ajaxGet(announcementAPIURL + '/' + announcementID, {id: announcementID},displayAnnouncement);
	});

	function displayAnnouncement(data){
		var date = new Date(data['created_at']);
		var foot = '發佈時間:' + date.toLocaleDateString() + ' ' + date.getHours() + ':' + date.getMinutes();
		$.jumpWindow(data['title'], data['content'], foot);
		$.pushLocation('公告', announcementURL + '/' + data['id']);
	}

});