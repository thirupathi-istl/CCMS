$(document).ready(function(){
	var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
	var select = document.getElementsByClassName('multi_selection_device_id');
	if (!isMobile) {
		$('.multi_selection_device_id').on('mousedown', function(e) {
			e.preventDefault();
			var scroll = select.scrollTop;
			e.target.selected = !e.target.selected;

			setTimeout(function() {
				select.scrollTop = scroll;
			}, 0);

			$(select).focus();
		}).on('mousemove', function(e) {
			e.preventDefault();
		});
	}
	else
	{
		document.getElementById('multi_selection_device_id').setAttribute("style","height:40px");
	}
	
	//reset_group_list();
	cancel_all_sections();
	$('#select_all').click(function() {

		if($(this).is(':checked'))
		{

			$('#multi_selection_device_id option').prop("selected", true)
		}
		else
		{
			$('#multi_selection_device_id option').prop("selected", false)
		}
		var count = $("#multi_selection_device_id :selected").length;        
		$('#selected_count').text(count);
	});   
	$('#cancel_all').click(function() {
		cancel_all_sections();
	});

	$('#multi_selection_device_id').click(function()
	{
		var count = $("#multi_selection_device_id :selected").length;        
		$('#selected_count').text(count);

	});
	function cancel_all_sections()
	{
		$("#select_all").prop("checked", false);
		$('#multi_selection_device_id option').prop("selected", false);
		var count = $("#multi_selection_device_id :selected").length;        
		$('#selected_count').text(count);
	}

	/*function reset_group_list()
	{
		var $options = $("#device_id > option").clone();
		$("#select_all").prop("checked", false);
		$('#multi_selection_device_id').empty();
		$('#multi_selection_device_id').append($options);

		// /cancel_all_sections();

	}*/
});