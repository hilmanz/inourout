
$(document).on('change','.cluesCity', function(){
	
	var eventid = $(this).attr('eventid');
	var cityid = $(this).val();
	$.post(basedomain+'clues/getClueAjax', {param:true, eventid:eventid,cityid:cityid}, function(data){
		
		var html = "";
		if (data.status==true){
			$.each(data.res, function(i,e){
				html += "<img src='"+basedomain+"public_assets/event/"+e.img+"' />";
			})
			
		}
		
		$('#maps_'+eventid).html(html);
		
	},"JSON")
})