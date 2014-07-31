$(document).ready(function(){
	
	$.konami({
		code:                   [83,69,86,69,78],
		interval:		100,
	    complete:		function(){
			
			alert('HI');
		}
		});
	
});