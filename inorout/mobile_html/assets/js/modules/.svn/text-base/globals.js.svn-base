/*AJAX global call function*/
// data consist of:
// 	data.url
// 	data.param
function post_json(data){
	var response = jQuery.ajax({
                    type: "POST",
                    url: data.url,
                    data: data.params,
                    dataType: data.type
	            });
	return response;
}


var global_loader = basedomain+'assets/images/loader.gif';


	/* Scroll paging with window size */
	function pagescroll(pid,phpfile,limit,htmltag,debug)
	{
		
		htmlFunction = window[htmltag];
		
		if (debug==true){log('pid='+pid);log('function='+phpfile);log('phase 1 ok');}
		$(window).scroll(function(){
	
			var startPage = parseInt($("#"+pid).attr("startpage"),10)+limit;
			var totalPage = parseInt($("#"+pid).attr("total"));
			
			if (debug==true){log('startPage='+startPage);log('totalPage='+totalPage);log('phase 2 ok');}
			if(startPage < totalPage){	
				//if($('#wrapper').scrollTop() == $(document).height() - $('#wrapper').height()){
				if($(window).scrollTop() == $(document).height() - $(window).height()){
					// $('div#loadmoreajaxloader').show();
					
					var html = "";
					
					var loader = '<img src="'+global_loader+'"/>';
					
					// $('div#loadmoreajaxloader').html(loader);
					if (debug==true){log('scroll top ='+$(window).scrollTop());log('compare='+$(document).height() - $(window).height());log('phase 3 ok');}
					
					$.post(basedomain+phpfile, {start:startPage,limit:limit,ajaxPaging:1}, function(data){
						
						if (debug==true){log('data='+data);log('phase 4 ok');}
						
						if(data.status ==true){
							
							$.each(data.res, function(i,e){
								html += htmlFunction(e);
							})
							
							// $('div#loadmoreajaxloader > img').remove();
							$("#"+pid).append(html);
							
							$("#"+pid).attr("startpage", startPage);
							
							
						}else{
							
							var last = parseInt($("#"+pid).attr('lastrow'));
							if (last<1){
								$("#"+pid).attr('lastrow',1);
								$("#"+pid).append('<div class="post"><center>No more posts to show.</center></div>');
								// $('div#loadmoreajaxloader').remove();
							}
							
						}
						
					},"JSON")
				}
			}
			
		})
		
	}
	
	
	/* click paging */
	function pagesClick(pid,phpfile,limit,htmltag,debug,insertin)
	{
		
		
		
		if (debug==true){log('pid='+pid);log('function='+phpfile);log('phase 1 ok');}
		// $(window).scroll(function(){
	
			var startPage = parseInt($("#"+pid).attr("startpage"),10)+limit;
			var totalPage = parseInt($("#"+pid).attr("total"));
			
			if (debug==true){log('startPage='+startPage);log('totalPage='+totalPage);log('phase 2 ok');}
			if(startPage < totalPage){	
				//if($('#wrapper').scrollTop() == $(document).height() - $('#wrapper').height()){
				// if($(window).scrollTop() == $(document).height() - $(window).height()){
					//$('div#loadmoreajaxloader').show();
					
					var html = "";
					
					// if (debug==true){log('scroll top ='+$(window).scrollTop());log('compare='+$(document).height() - $(window).height());log('phase 3 ok');}
					
					var loader = '<img src="'+global_loader+'"/>';
					$('#'+pid).append(loader);
					
					$.post(basedomain+phpfile, {start:startPage,limit:limit,ajaxPaging:1}, function(data){
						
						if (debug==true){log('data='+data);log('phase 4 ok');}
						htmlFunction = window[htmltag];
						if(data.status ==true){
							
							$.each(data.res, function(i,e){
								html += htmlFunction(e);
							})
							$('#'+pid+' > img').remove();
							if(insertin)$(html).insertBefore("#"+pid+" .loadMore");
							else $("#"+pid).append(html);
							
							$("#"+pid).attr("startpage", startPage);
							
							
						}else{
							
							var last = parseInt($("#"+pid).attr('lastrow'));
							if (last<1){
								$("#"+pid).attr('lastrow',1);
								$("#"+pid).append('<div class="post"><center>No more posts to show.</center></div>');
							}
							
						}
						
					},"JSON")
				// }
			}else{
				$("."+insertin).html('<center>No more data to show.</center>');
			}
			
		// })
		
	}
	
	function jqscroll(pid,phpfile,limit,htmltag)
	{
		
		// log(htmltag);
		
		var startPage = parseInt($("#"+pid).attr("startpage"),10)+limit;
		var totalPage = parseInt($("#"+pid).attr("total"));
			
		var html = "";
		var settingsDiv = {
			handleScroll:function (page,container,doneCallback) {
				
				$.post(basedomain+phpfile, {start:startPage,limit:limit,ajaxPaging:1}, function(data){
						// log(pid);
						// log(htmltag);
						htmlFunction = window[htmltag];
						// log(htmlFunction);
						if(data.status ==true){
							// log(htmlFunction);
							$.each(data.res, function(i,e){
							// log(htmlFunction);
								html += htmlFunction(e);
							})
							
							// $('div#loadmoreajaxloader').hide();
							
							setTimeout(function () {
								$('#'+pid).append(html);
								doneCallback();
								// console.log("DIV scrolled to page",page);
							},2000);
							
							
							
							
						}else{
							setTimeout(function () {
								var message = "No data to show";
								$('#'+pid).append(message);
								doneCallback();
								// console.log("DIV scrolled to page",page);
							},15000);
						}
						
						$("#"+pid).attr("startpage", startPage);
						
					},"JSON")
				
			},
	        // pagesToScroll : 5,
			triggerFromBottom:'0',
			loader:'<div class="loaderNews-feed">loading...</div>',
			debug  : false,
			targetElement : $('#'+pid),
			monitorTargetChange:false


		};
		
		 $('#'+pid).paged_scroll(settingsDiv);
	}
	
	function in_array(data,array)
	{
		var index;
		var exist = false;
		for (index = 0; index < array.length; ++index) {
			if (array[index]==data) exist = true;
			
		}
		
		return exist;
	}
	
	function preview(input,idimage) {
		if (input.files && input.files[0]) {
            var reader = new FileReader();
			reader.onload = function (e) {
                $('#'+idimage).attr('src', e.target.result);
                $('#'+idimage).attr('width', '300px');
                $('#'+idimage).attr('height', '300px');
            }
			 reader.readAsDataURL(input.files[0]);
        }
    }
	
	
	function number_format(num) {

		var formatNumber = num.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		// console.log(formatNumber);
		return formatNumber;
	}