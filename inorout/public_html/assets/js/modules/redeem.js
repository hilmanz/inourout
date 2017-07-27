$(document).on('click','.redeemMsg',function(event){
	event.preventDefault();
	var redeemMsg = $('#redeemMsg');
	redeemMsg.text('Poin kamu belum cukup').css('display','block');
	setTimeout(function() {
		 $('#redeemMsg').hide().text('');
	}, 2000 );
	
});