$(document).ready(function() { 
	$('#redeemBtn').addClass('disabled redeemMsg grayscale').removeClass('showPopup');
	$('#redeemBtn').attr('href','#');
	$("body").addClass(BrowserDetect.browser); 
	// Drop Down Menu
	$('ul#main-menu').superfish({ 
        delay:       600,
        animation:   {opacity:'show',height:'show'},
        speed:       'fast',
        autoArrows:  true,
        dropShadows: false
    });
	// Accordion
	$( ".accordion" ).accordion( { autoHeight: false } );
	$( ".datepicker" ).datepicker({
		changeMonth: true,
        changeYear: true,
		 yearRange: "1933:2023"
	});
	
	// Slides Loader
	$(".slider").removeClass("slide-loader");
	$(".slider-single").removeClass("slide-loader-single");
	
	// popup
	$(document).on('click','a.showPopup',function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		$(".popup").fadeOut();
		var targetID = jQuery(this).attr('href');
		$("#bg-popup").fadeIn();
		$(targetID).fadeIn();
		$(targetID).addClass('visible');
 	    return false;
	});
	$("a.closePopup,#bg-popup").click(function(){
		$("#bg-popup").fadeOut();
		$(".popup").fadeOut();
   	    return false;
	});
	
	$( ".badgesOwn .badges" ).find(".ui-spinner").show();
	$( ".badgesOwn .badges" ).removeClass( "current" ).addClass( "current" );
	
	$( ".badgesListTrade .badges" ).click(function() {
		var dbadge = $(this).data('badge');
		if(dbadge == 'find'){
			$(".badgesFinding .badges").removeClass('current');
			$( this ).addClass( "current" );
		}
		/*else{
			$( this ).find(".ui-spinner").toggle();
	  		$( this ).toggleClass( "current" );
		}  */	
   	    return false;
	});
	
	$( ".spinner" ).spinner({ min: 0, max:4 });
	

	/* re work spinner */
	$( ".spinnerbid" ).spinner({ 
		min: 0,
		max:$(this).attr('max'),
		spin: function( event, ui ) {
				
			var badgesvalue = $(this).attr('badgesvalues');
		  	var usercurrentbid  = 0;
		 	var badgeslistofusers  = new Array;
		 	var amountbadgeslistofusers  = new Array;
		 	var namebadgeslistofusers  = new Array;
		 	var listofferingbadges  = new Object;

		 	var maxbadges = $(this).attr('max');
			var badgesid = $(this).attr('badgesid');
			var totalCounter = 0;
			
			totalCounter = maxbadges-ui.value;
			
			$('.counterBadges_'+badgesid).html('['+totalCounter+']');			
			
			$(this).attr('currentpoint',badgesvalue*ui.value); 			
			$(this).attr('amountpoint',ui.value); 			
			
			/* current my bid */
			$('.badgesvaluetemps').each(function(i,e){				
				usercurrentbid+=parseInt($(this).attr('currentpoint'),10);
				badgeslistofusers.push($(this).attr('badgesid'));
				amountbadgeslistofusers.push($(this).attr('amountpoint'));
				namebadgeslistofusers.push($(this).attr('badgesnames'));
			});
			//console.log(badgeslistofusers.join());
			//console.log(amountbadgeslistofusers.join());
		 	$('.myofferingpoint').html(usercurrentbid);
			$('.badgestoform').val(badgeslistofusers.join());
			$('.amounttoform').val(amountbadgeslistofusers.join());			
			/* bid lef to out bid */
		 	var recurrentbid = $('.myofferingpointsubbed').attr('currentbidder');					
			var subrecurrentbid = recurrentbid-(usercurrentbid);
			if(subrecurrentbid<=0) 	subrecurrentbid = 0;
			console.log(subrecurrentbid);
			if(subrecurrentbid!=0){
				$('#redeemBtn').addClass('disabled redeemMsg grayscale').removeClass('showPopup');
				$('#redeemBtn').attr('href','#');
			}else{
				$('#redeemBtn').removeClass('disabled redeemMsg grayscale').addClass('showPopup');
				$('#redeemBtn').attr('href','#popup-redeem-form');
			}

			$('.myofferingpointsubbed').html(subrecurrentbid);
			 
			for(var keys in badgeslistofusers){
				if(amountbadgeslistofusers[keys]!=0) {
					listofferingbadges[badgeslistofusers[keys]] = {'amount':amountbadgeslistofusers[keys],'name':namebadgeslistofusers[keys]};
				}				
			}
			var listofofferingbadgeshtml = "";
			if(listofferingbadges){
				$.each(listofferingbadges,function(i,e){
					listofofferingbadgeshtml+="  <td>";
                    listofofferingbadgeshtml+="      <div class='badges badges-s'>";
                    listofofferingbadgeshtml+="          <img src='"+basedomain+"assets/images/badges/badges-"+i+".png' />";
                    listofofferingbadgeshtml+="      </div>";
                    listofofferingbadgeshtml+="      <h4 class='badges-name'>"+e.name+"</h4>";
					listofofferingbadgeshtml+="   </td>";
				});
				
			}
			$(".badgeoffered").html(listofofferingbadgeshtml);
		}
	
	});
	

	$( ".ui-spinner-button" ).click(function() {
	  $( ".badges" ).show;
   	    return false;
	});
	
	$( ".badgesListTradeSearch .badges" ).click(function() {
	  $( this ).toggleClass( "current" );
   	    return false;
	});
	
	$( ".advanceSearchBtn" ).click(function() {
		if($(this).hasClass('advanceSearchBtnactive')==false){
			$(".badgesListTradeSearch .badge_give").removeClass('current');
		}
	  $( this ).toggleClass( "advanceSearchBtnactive" );
	  $( "#advanceSearch").toggle(500);
   	    return false;
	});
	 
	 $( ".tip" ).tooltip({
      	track: true,
		 content: function () {
				  return $(this).prop('title');
			  }
    });
	
	// Tabs
	$(function() {
		$( "#tabs" ).tabs();
		$( "#tabs2" ).tabs();
	});
	
	$(document).on('click','a.open-tab',function(){
		$(".ui-tabs-panel").fadeOut();
		$("#tabNav li").removeClass("ui-tabs-active");
		$("#tabNav li:nth-child(2)").addClass("ui-tabs-active");
		var targetID = jQuery(this).attr('href');
		$(targetID).fadeIn();
 	    return false;
	});
	//fakeupload
	$('.uploadfile').change(function(){
		$('.uploadpath').val($(this).val());
	});
	
    // 140 is the max message length
	$(".aspiration-message").charCount({
		allowed: 140,		
		warning: 20,
		counterText: 'Characters left: '	
	});
	
	//HOVER EFFECT 
	
	//Custom settings
	var style_in = 'easeOutBounce';
	var style_out = 'jswing';
	var speed_in = 1000;
	var speed_out = 300;	

	//Calculation for corners
	var neg = Math.round($('.qitem').width() / 2) * (-1);	
	var pos = neg * (-1);	
	var out = pos * 2;
	
	$('.qitem').each(function () {
	
		url = $(this).find('a').attr('href');
		img = $(this).find('img').attr('src');
		alt = $(this).find('img').attr('img');
		
		$('img', this).remove();
		$(this).append('<div class="topLeft"></div><div class="topRight"></div><div class="bottomLeft"></div><div class="bottomRight"></div>');
		$(this).children('div').css('background-image','url('+ img + ')');

		$(this).find('div.topLeft').css({top:0, left:0, width:pos , height:pos});	
		$(this).find('div.topRight').css({top:0, left:pos, width:pos , height:pos});	
		$(this).find('div.bottomLeft').css({bottom:0, left:0, width:pos , height:pos});	
		$(this).find('div.bottomRight').css({bottom:0, left:pos, width:pos , height:pos});	

	}).hover(function () {
	
		$(this).find('div.topLeft').stop(false, true).animate({top:neg, left:neg}, {duration:speed_out, easing:style_out});	
		$(this).find('div.topRight').stop(false, true).animate({top:neg, left:out}, {duration:speed_out, easing:style_out});	
		$(this).find('div.bottomLeft').stop(false, true).animate({bottom:neg, left:neg}, {duration:speed_out, easing:style_out});	
		$(this).find('div.bottomRight').stop(false, true).animate({bottom:neg, left:out}, {duration:speed_out, easing:style_out});	
				
	},
	
	function () {

		$(this).find('div.topLeft').stop(false, true).animate({top:0, left:0}, {duration:speed_in, easing:style_in});	
		$(this).find('div.topRight').stop(false, true).animate({top:0, left:pos}, {duration:speed_in, easing:style_in});	
		$(this).find('div.bottomLeft').stop(false, true).animate({bottom:0, left:0}, {duration:speed_in, easing:style_in});	
		$(this).find('div.bottomRight').stop(false, true).animate({bottom:0, left:pos}, {duration:speed_in, easing:style_in});	
	
	}).click (function () {
		$("html, body").animate({ scrollTop: 0 }, 600);
		$(".popup").fadeOut();
		var targetID = $(this).find('a').attr('href');
		$("#bg-popup").fadeIn();
		$(targetID).fadeIn();
		$(targetID).addClass('visible');
 	    return false;
	});
});
	




function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
   // Don't validate the input if below arrow, delete and backspace keys were pressed 
	 if(key == 37 || key == 38 || key == 39 || key == 40 || key == 8 || key == 46) { // Left / Up / Right / Down Arrow, Backspace, Delete keys
		 return;
	 }
  key = String.fromCharCode( key ); 

	
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

$(function()
{
	$('.scroll-pane').jScrollPane(
		{
			showArrows: true,
			arrowScrollOnHover: true
		}
	);
});