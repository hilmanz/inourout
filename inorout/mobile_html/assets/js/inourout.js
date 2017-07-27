$(document).ready(function() { 

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

	$("a.showPopup").click(function(){

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

	

	$( ".badgesFinding .badges" ).click(function() {

		/*
		$( this ).find(".ui-spinner").toggle();
		$( this ).toggleClass( "current" );
   	    return false;
		*/
		
		var dbadge = $(this).data('badge');
		if(dbadge == 'find'){
			$(".badgesFinding .badges").removeClass('current');
			$( this ).addClass( "current" );
		}else{
			$( this ).find(".ui-spinner").toggle();
	  		$( this ).toggleClass( "current" );
		}  	
   	    return false;
		
		
		
	});

	

	$( ".spinner" ).spinner({ min: 0, max:4 });

	

	/* re work spinner */

	$( ".spinnerbid" ).spinner({ 

		min: 0,

		max:$(this).attr('max'),

		spin: function( event, ui ) {

			// console.log($(this).attr('max'));
			
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
		 	$('.myofferingpoint').attr('point',usercurrentbid);
		 	
			
			
			$('.badgestoform').val(badgeslistofusers.join());

			$('.amounttoform').val(amountbadgeslistofusers.join());			

			/* bid lef to out bid */

		 	var recurrentbid = $('.myofferingpointsubbed').attr('currentbidder');					

			var subrecurrentbid = recurrentbid-(usercurrentbid);

			

			if(subrecurrentbid<=0) 	subrecurrentbid = 0;

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

	/*
	$( ".badgesListTrade .badges" ).click(function() {

	  // $( this ).toggleClass( "current" );
		// log(this);
   	    // return false;
		var dbadge = $(this).data('badge');
		if(dbadge == 'find'){
			$(".badgesFinding .badges").removeClass('current');
			$( this ).addClass( "current" );
		}else{
			// $( this ).find(".ui-spinner").toggle();
	  		$( this ).toggleClass( "current" );
		}  	
   	    return false;

	});
*/
	

	$( ".advanceSearchBtn" ).click(function() {

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

});
 