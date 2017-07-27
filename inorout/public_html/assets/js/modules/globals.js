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
					//$('div#loadmoreajaxloader').show();
					
					var html = "";
					
					if (debug==true){log('scroll top ='+$(window).scrollTop());log('compare='+$(document).height() - $(window).height());log('phase 3 ok');}
					
					$.post(basedomain+phpfile, {start:startPage,limit:limit}, function(data){
						
						if (debug==true){log('data='+data);log('phase 4 ok');}
						
						if(data.status ==true){
							
							$.each(data.res, function(i,e){
								html += htmlFunction(e);
							})
							
							//$('div#loadmoreajaxloader').hide();
							$("#"+pid).append(html);
							
							$("#"+pid).attr("startpage", startPage);
							
							
						}else{
							$('div#loadmoreajaxloader').html('<center>No more posts to show.</center>');
						
						}
						
					},"JSON")
				}
			}
			
		})
		
	}


function setInfo(i, e) {
	$('#x').val(e.x1);
	$('#y').val(e.y1);
	$('#x2').val(e.x2);
	$('#y2').val(e.y2);
	$('#w').val(e.width);
	$('#h').val(e.height);
}

$(document).ready(function() {
	var p = $("#uploadPreview");
	var d = $("#defaultIMG");

	// prepare instant preview
	$("#uploadImage").change(function(){
		// fadeOut or hide preview
		p.fadeOut();
		d.fadeOut();

		console.log($('div.imgareaselect-selection').parent());

		$('div.imgareaselect-selection').parent().css({'background-color': '#000','opacity':0.5,'filter': 'alpha(opacity=50)'});

		// prepare HTML5 FileReader
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

		oFReader.onload = function (oFREvent) {
	   		p.attr('src', oFREvent.target.result).fadeIn();
		};
	});

	// implement imgAreaSelect plug in (http://odyniec.net/projects/imgareaselect/)
	// $('img#uploadPreview').imgAreaSelect({
	// 	// set crop ratio (optional)
	// 	handles: false,
	// 	aspectRatio: '1:1',
	// 	onSelectEnd: setInfo
	// });

	//Challenge
	var p2 = $("#uploadChallengePreview");
	var d2 = $("#defaultIMGChallenge");

	$("#uploadChallenge").change(function(){
		// fadeOut or hide preview
		p2.fadeOut();
		d2.fadeOut();

		// prepare HTML5 FileReader
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("uploadChallenge").files[0]);

		oFReader.onload = function (oFREvent) {
	   		p2.attr('src', oFREvent.target.result).fadeIn();
		};
	});
});
	