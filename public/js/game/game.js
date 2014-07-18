function editStatus(power,gp) {
	$('#powerBox').css({
		background: 'url("../images/gameIndex/power/' + power + '.png")'
	});
	$('#userGP').text(gp);
}

function noPowerDisplay() {

}