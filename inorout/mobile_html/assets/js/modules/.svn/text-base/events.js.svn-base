
	function log(data)
	{
		return console.log(data);
	}

	$(document).on('change','.cluesCity', function(){
		
		var eventid = $(this).attr('eventid');
		var cityid = $(this).val();
		$.post(basedomain+'clues/getClueAjax', {param:true, eventid:eventid,cityid:cityid}, function(data){
			
			var html = "";
			if (data.status==true){
				$.each(data.res, function(i,e){
					html += "<img src='"+basedomainpath+"public_assets/event/"+e.img+"' />";
				})
				
			}
			
			$('#maps').html(html);
			
		},"JSON")
	})


	$(document).on('click','.getclues', function(){
		
		
		var eventid = $(this).attr('eventid');
		// log(eventid);
		// return false;
		var cityid = $('.cluesCity').val();
		$.post(basedomain+'clues/getClueAjax', {param:true, eventid:eventid,cityid:cityid}, function(data){
			
			var html = "";
			if (data.status==true){
			
				$.each(data.res, function(i,e){
				
					html += "<li>";
					html += "<img src='"+basedomainpath+"public_assets/event/"+e.img+"' />";
					html += "</li>";
				})
				
			}
			
			$('#maps').html(html);
			triggerCarousel();
		},"JSON")
		
		$('.cluesCity').attr('eventid',eventid);
		
	})

	function mobileLastEventPaging(data)
	{
		var html = "";
		
		html += "<div class='post'>";
        html += "                <a href='"+basedomain+"articles/detail/"+data.id+"' class='thumbpPost'>";
        html += "                    <img src='"+basedomainpath+"public_assets/news/"+data.img+"' />";
        html += "                </a>";
        html += "                <div class='entry-post'>";
        html += "                    <span class='date'>"+data.changeDate+"</span>";
        html += "                    <p>"+data.title+"</p>";
        html += "                    <a href='"+basedomain+"articles/detail/"+data.id+"' class='more'>more &raquo;</a>";
        html += "                </div>";
        html += "            </div>";
		
		return html;
	}
	
	
	function mobileMoreEventPaging(data)
	{
		var html = "";
		
		html += " <div class='post'>";
        html += "    <div class='entry-post'>";
        html += "    	<span class='date'>"+data.changeDate+"</span>";
        html += "       <p>"+data.title+"</p>";
        html += "       <a href='"+basedomain+"articles/detail/"+data.id+"' class='more'>more &raquo;</a>";
        html += "    </div>";
        html += " </div>";
		
		return html;
	}
	
	function mobileNotifPaging(data)
	{
		var html = "";
		var unread = "read";
		if(data.unread==1) unread = "unread"; 
		
		html += " <div class='row "+unread+"'>";
        html += "    <a href='"+basedomain+"notifications/detail/"+data.id+"'>"+data.subject+"</a>";
        html += "    <span class='notifdate'>"+data.formatted_date+"</span>";
        html += " </div>";
		
		return html;
	}
	
	function mobileNewsFeedPaging(data)
	{
		var html = "";
		
		html += "<li>";
        html += "   <p>"+data.title+"</p>";
        html += "	<p>"+data.brief+"<a href='"+basedomain+"articles/detail/"+data.id+"' class='more'>more &raquo;</a></p>";
		html += "   <span class='date'>"+data.changeDate+"</span>";
        html += "</li>";
		
		return html;
	}
	
