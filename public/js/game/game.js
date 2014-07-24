function editStatus(power,gp) {
	$('#powerBox').css({
		background: 'url("../images/gameIndex/power/' + power + '.png")'
	});
	$('#userGP').text(gp);
}

function noPowerDisplay() {
	$('#gmaeNoPowerContainer').show();
	$('#gameNoPowerIKnow').click(function() {
		$('#gameNoPowerIKnow').off();
		$('#gameNoPowerGoPower').off();
		$('#gameNoPowerExit').off();
		$('#gmaeNoPowerContainer').fadeOut();
	});
	$('#gameNoPowerGoPower').click(function() {
		$('#gameNoPowerIKnow').off();
		$('#gameNoPowerGoPower').off();
		$('#gameNoPowerExit').off();
		$('#gmaeNoPowerContainer').fadeOut();
	});
	$('#gameNoPowerExit').click(function() {
		$('#gameNoPowerIKnow').off();
		$('#gameNoPowerGoPower').off();
		$('#gameNoPowerExit').off();
		$('#gmaeNoPowerContainer').fadeOut();
	});
}