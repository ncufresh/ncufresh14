
$(document).ready(function(){

	var burl = getTransferData('burl');
	var photosDisplay = $('#display-photo').children();
	var photoMoveBox = $('#prelook-inbox');
	var left = 0;
	$('#button1').click(function() {
		$('#page1').animate({
			left: '-930px'
		});
		$('#page2').animate({
			width: '1036px',
			left: '-26px'
		});
		$(this).animate({
			left: '-1025px'
		});
		$('#button2').animate({
			left: '0px'
		});
		$('#button2-image').animate({
			left: '0px'
		});
	});
	$('#button2').click(function() {
		$('#page1').animate({
			left: '0px'
		});
		$('#page2').animate({
			width: '0px',
			left: '1103px'
		});
		$('#button1').animate({
			left: '909px'
		});
		$('#button2').animate({
			left: '1004px'
		});
		$('#button2-image').animate({
			left: '1004px'
		});
	});
	$('#page1-content').jScrollPane();
	var contents = $('.contents');
	$('.items').each(function(index) {
		$(this).click(function() {
			contents.eq(index).show();
		});
	});

	$('.content-close').click(function() {
		$(this).parent().hide();
	});
	$('.prelook-photos').each(function(index) {
		$(this).click(function() {
			photosDisplay.attr('src', $(this).attr('src'));
		});
	});
	$('#left-button').click(function() {
		if ( left > -4325 ) {
			left = left - 160;
			photoMoveBox.animate({
				left: left + 'px'
			});
		}
	});
	$('#right-button').click(function() {
		if ( left < 0 ) {
			left = left + 160;
			photoMoveBox.animate({
				left: left + 'px'
			});
		}
	});
	$('#button2').mouseenter(function() {
		$('#button2-image').css({
			background: 'url("images/aboutus/photo-p.png") no-repeat'
		});
	});
	$('#button2').mouseleave(function() {
		$('#button2-image').css({
			background: 'url("images/aboutus/photo.png") no-repeat'
		});
	});
});
