function editStatus(data) {
	$('#powerBox').css({
		background: 'url("../images/gameIndex/power/' + data["power"] + '.png")'
	});
	$('#userGP').text(data["gp"]);
}