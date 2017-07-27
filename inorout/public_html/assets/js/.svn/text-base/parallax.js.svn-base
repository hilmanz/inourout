/**
 * Parallax Scrolling Tutorial
 * For NetTuts+
 *  
 * Author: Mohiuddin Parekh
 *	http://www.mohi.me
 * 	@mohiuddinparekh   
 */


$(document).ready(function(){
	$("#buttonDown").click(function(){
		$("html, body").animate({ scrollTop: 5650 }, 15000);
	});
	// Cache the Window object
	$window = $(window);
	$('section[data-type="background"]').each(function(){
	    var $bgobj = $(this); // assigning the object
		$(window).scroll(function() {
					
		// Scroll the background at var speed
		// the yPos is a negative value because we're scrolling it UP!								
		var yPos = -($window.scrollTop() / $bgobj.data('speed')); 
		
		// Put together our final background position
		var coords = '50% '+ yPos + 'px';
	
		// Move the background
		$bgobj.css({ backgroundPosition: coords });
		
		}); // window scroll Ends
	});	
	$(window).bind('scroll', function(e) {
		parallax();
	});

}); 

	function parallax() {
		var scrollPosition = jQuery(window).scrollTop();
		$('#buttonDown').css('top', (550 - (scrollPosition * .3))+'px' );
		$('#text1').css('bottom', (400 - (scrollPosition * .5))+'px' );
		$('#text2').css('top', (150 + (scrollPosition * .5))+'px' );
		$('#tokyo').css('top', (200 + (scrollPosition * .3))+'px' );
		$('#tallent2').css('top', (100 + (scrollPosition * .7))+'px' );
		$('#tallent3').css('top', (350 - (scrollPosition * .5))+'px' );
		$('#headphone').css('top', (550 + (scrollPosition * .5))+'px' );
		$('#cube1').css('top', (500 + (scrollPosition * .5))+'px' );
		$('#cube2').css('top', (450 - (scrollPosition * .5))+'px' );
		$('#cube3').css('top', (600 - (scrollPosition * .5))+'px' );
		$('#tallent4').css('top', (350 - (scrollPosition * .5))+'px' );
		$('#text3').css('top', (150 + (scrollPosition * .5))+'px' );
		$('#tallent5').css('top', (350 - (scrollPosition * .5))+'px' );
		$('#text4').css('top', (150 + (scrollPosition * .5))+'px' );
		$('#cube4').css('top', (500 + (scrollPosition * .5))+'px' );
		$('#cube5').css('top', (450 - (scrollPosition * .5))+'px' );
		$('#cube6').css('top', (600 - (scrollPosition * .5))+'px' );
		$('#cube7').css('top', (600 - (scrollPosition * .5))+'px' );
		$('#text5').css('top', (150 + (scrollPosition * .5))+'px' );
		$('#tallent6').css('top', (350 - (scrollPosition * .5))+'px' );
		$('#videoBox').css('top', (600 + (scrollPosition * .5))+'px' );
		//$('#text6').css('top', (350 - (scrollPosition * .5))+'px' );
		//$('#prize').css('top', (600 + (scrollPosition * .5))+'px' );
		//$('#cube8').css('top', (600 + (scrollPosition * .5))+'px' );
		//$('#cube9').css('top', (600 - (scrollPosition * .5))+'px' );
		//$('#cube10').css('top', (600 - (scrollPosition * .5))+'px' );
	}
/* 
 * Create HTML5 elements for IE's sake
 */

document.createElement("article");
document.createElement("section");