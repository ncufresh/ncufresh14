$(function(){


	var list = $('#links_list').sortable({
		placeholder: "ui-state-highlight",
		update:
			function(event, ui){
				var item = ui.item;
				console.log(item.data('id'));
				var order = $(ui.item).parent().children().index(ui.item) + 1;
				console.log(order);
				saving();
				updateOrder(item.data('id'), order);
			}
	});

	$('.link-del').click(deleteLink);


	$('#link_form').submit(function(e){
		saving();
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
			{
				url : formURL,
				type: "POST",
				data : postData,
				success:function(data, textStatus, jqXHR)
				{
					//data: return data from server
					//console.log(data);
					//data = $.parseJSON(data);
					var tr = $('<tr></tr>').appendTo('#links_list').sortable({
						connectWith: 'links_list'
					}).disableSelection();
					$('<td></td>').appendTo(tr).append(data['id']);
					$('<td></td>').appendTo(tr).append(data['display_name']);
					$('<td></td>').appendTo(tr).append(data['url']);
					tr.data('id', data['id']);
					console.log(data['id']);
					doneSaving();
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					//if fails
				}
			});
		return false;
	});

	function saving(){
		console.log('start saving!');
	}
	function doneSaving(){
		console.log('done saving!');
	}

	function updateOrder(id, order){
		$.ajax({
			url: '/api/v1/link/' + id,
			type: 'PUT',
			data: 'order=' + order,
			success:function(data, textStatus, jqXHR){
				//data: return data from server
				doneSaving();
			},
			error: function(jqXHR, textStatus, errorThrown){
				//if fails
			}
		});
	}

	function deleteLink(){
		saving();
		var item = $(this).parent().parent();
		console.log(item);
		console.log('Deleteing ' + item.data('id'));
		$.ajax({
			url: '/api/v1/link/' + item.data('id'),
			type: 'DELETE',
			success:function(data, textStatus, jqXHR){
				//data: return data from server
				item.remove();
				doneSaving();
			},
			error: function(jqXHR, textStatus, errorThrown){
				//if fails
			}
		});
	}
});