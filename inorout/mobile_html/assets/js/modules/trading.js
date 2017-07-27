var badgesFinding = 0;
var badgesGiveCount= new Array();
var badgesGiveTotal = 0; 
var tradeid=0;
var start=0;
var sortBy="";
var sort=0;

$(document).ready(function(){
    load_all_trade({},0);
    load_my_trade({},0);

    Backbone.emulateHTTP = true;
    Backbone.emulateJSON = true;
    
    //Backbone Router
    var Router = Backbone.Router.extend({
        routes: {
            "search/:find" : "search",
            "search/:find/:give" : "advanceSearch",
            "all_trade" : "allTrade",
            "create_a_trade" : "createTrade",
            "my_trade" : "myTrade",
        },
        search: function(find){
            var search = {};
                search.find = find; 
            load_all_trade(search,0);
        },
        advanceSearch: function(find,give){
            var search = {};
                search.find = find; 
                search.give = give; 
            load_all_trade(search,0);
        },
        allTrade: function(){

        },
        createTrade: function(){

        },
        myTrade: function(){

        }
    });
    
    var app_router = new Router;
    Backbone.history.start();

    $( ".badgesOwn .badges" ).find(".ui-spinner").show();
	$( ".badgesOwn .badges" ).removeClass( "current" ).addClass( "current" );
	
	$('a.sort_active').on('click',function(){
        sortBy = $(this).data('sort');
        if(sort==0)sort=1;
        else sort=0;
        load_all_trade({},0);

    });
});

$( ".badgesFinding .badges" ).click(function(){
    badgesFinding = parseInt($(this).data('badgeid'));
    $('.badgesFindingValue').val(badgesFinding);
	
});

$.each(badge_collections,function(k,v){
    $( ".spinner_"+k ).spinner({min:0,max:v.total });
    $(".spinner_"+k).spinner().change(function(){
        badgesGiveCount[k] = $(this).spinner('value');
        badgesGiveTotal=0;
        $.each(badgesGiveCount, function(k,v){
            if(typeof v!=='undefined'){
                badgesGiveTotal+=v;
				
            }
			
			
        });
		$('.badgesGiveValue').val(badgesGiveCount);
		$('.totalBadges').val(badgesGiveTotal);
    });
});

$('.ui-spinner-button').click(function() { 
    $(this).siblings('input').change(); 
});

$( ".badgesOwn .badges" ).click(function(){
    //badgesGiveCount = $('.badgesOwn a.current').length;
});

$( ".findTrade" ).click(function(){
    $('.badge_find,.badge_give').removeClass('current');
});

$( "a[href='#CreateTrade']" ).click(function(){
    //$('.badges').removeClass('current');
    //$('#tradePage .badgesListTrade .ui-spinner').hide();

    $('input.ui-spinner-input').attr('aria-valuenow',0);
    $('input.ui-spinner-input').val(0);
    badgesFinding=0;
    badgesGiveCount=new Array();

});

$(document).on('click','#createSubmitTradeBtn',function(){
    var data = {};
    data.url='../badges/makeTradeProceed';
    data.params={ajax:1,find:badgesFinding,give:badgesGiveCount.join(',')};
    data.type="json";
    post_json(data).done(function(response){
        var str='';
        try{
            if(response.status==1){
                str+='<h1>'+response.msg.title+'</h1>';
                str+='<h2>'+response.msg.desc+'</h2>';
                $('.postMessages').html(str);
                
            }else{
                $('.postMessages').html("<h2>"+response.msg+"<h2>");

            }
            
            setTimeout(function () {
               window.location.href = basedomain+"badges/trading";
            }, 2000);
        }catch(e){}
    });
});

$(document).on('click','.cancelTrade',function(){
    var trade_id = $(this).data("tradeid");
    var data = {};
    data.url='../badges/cancelMyTrade';
    data.params={ajax:1,tradeID:trade_id};
    data.type="json";
    post_json(data).done(function(response){
        var str='';
        try{
            if(response.status==1){
                str+='<h1>'+response.msg.title+'</h1>';
                str+='<h3>'+response.msg.desc+'</h3>';
                // $('#popup-global .popup-entry').html(str);
            }else{
                str+='<h1>'+response.msg.title+'</h1>';
                str+='<h3>'+response.msg.desc+'</h3>';
                // $('#popup-global .popup-entry').html(str);
            }
            // $('.boxTrading').html(str);
            // setTimeout(function () {
               location.reload()
            // }, 2000);
        }catch(e){}
    });
});

$('a#createTradeConfirm').click(function(){
    //console.log($('.badgesOwn a.current').length);
    if(badgesFinding>0&&badgesGiveTotal<=4){
        $('html, body').animate({scrollTop: '0px'});
        $('#popup-create-trade-confirm, #bg-popup').fadeIn();

        var data = {};
        data.url='../badges/makeTradeConfirmation';
        data.params={ajax:1,find:badgesFinding,give:badgesGiveCount.join(',')};
        data.type="json";

        post_json(data).done(function(response){
            var offer='';
            var request='';
            $.each(response.data.give,function(k,v){
                request+='<a class="badges badges-m" href="#">';
                    request+='<img src="'+basedomain+'assets/images/badges/'+v.image+'" />';
                    request+='<span class="badges-value">'+v.total+'</span>';
                request+='</a>';
            })

            offer+='<a class="badges badges-m" href="#">';
                offer+='<img src="'+basedomain+'assets/images/badges/'+response.data.find[0].image+'" />';
                offer+='<span class="badges-value">1</span>';
            offer+='</a>';

            $('.createBadgesListConfirm_offer').html(offer);
            $('.createBadgesListConfirm_request').html(request);
        });
    }
});


$(document).on('click','.tradeBtnAction',function(){
    var trade_id = $(this).data('trade');
    var data = {};
    data.url='../badges/tradeConfirmation';
    data.params={ajax:1,tradeID:trade_id};
    data.type="json";

    post_json(data).done(function(response){
        var offer='';
        var request='';
        $.each(response.data.offer_badges,function(k,v){
            offer+='<a class="badges badges-m" href="#">';
                offer+='<img src="'+basedomain+'assets/images/badges/'+v.image+'" />';
                offer+='<span class="badges-value">1</span>';
            offer+='</a>';
        })

        request+='<a class="badges badges-m" href="#">';
            request+='<img src="'+basedomain+'assets/images/badges/'+response.data.request_badges[0].image+'" />';
            request+='<span class="badges-value">1</span>';
        request+='</a>';

        $('.badgesListConfirm_offer').html(offer);
        $('.badgesListConfirm_request').html(request);
        tradeid = response.data.id;
    });
});

$(document).on('click','#submitTradeBtn',function(){
    var data = {};
    data.url='../badges/tradeProceed';
    data.params={ajax:1,tradeID:tradeid};
    data.type="json";
    post_json(data).done(function(response){
        var str='';
        try{
            if(response.status==1){
                str+='<h1>'+response.msg.title+'</h1>';
                str+='<h2>'+response.msg.desc+'</h2>';
                $('.postMessages').html(str);
                load_all_trade({},0);
            }else{
                $('.postMessages').html("<h2>"+response.msg+"<h2>");
            }
            
        }catch(e){}
    });
});


function load_my_trade(method,start){
    var data = {};
    data.url='../badges/mytrade';
    data.params={ajax:1,start:start};
    data.type="json";
    
    post_json(data).done(function(response){
       
		try{
            if(response.status==1){
                
				var str='';
                $.each(response.data,function(k,v){
					if(k%2) var queue = "even";
					else var queue = "odd";
                   str+='<tr class="'+queue+'">';
                        str+='<td>';
                            str+='<div class="badges badges-s">';
                                str+='<img src="'+basedomain+'assets/images/badges/'+v.request_badges[0].image+'" />';
                            str+='</div>';
                        str+='</td>';
                        str+='<td>';
                            str+='<div class="badgesToTrade">';
                                $.each(v.offer_badges, function(kk,vv){
                                        if($.isPlainObject(vv)){
											str+='<div class="badges badges-s">';
										
											  str+='<img src="'+basedomain+'assets/images/badges/'+vv.image+'" />';                                           
											str+='</div>';
										 }else{
											str+='<div class="badges badges-s">';
											 str+='<img src="" />'; 
										 	str+='</div>';
										 }
                                    });
                              
                            str+='</div>';
                        str+='</td>';
                       
                        if(v.n_status == '1'){
                            str+='<td><div class="relative"><h4 class="tradeProgres">Trade on progress</h4>';
							  // str+=' <span class="tradeDate">'+v.formatted_date+'</span> ';
                                    str+='<a class="cancelTrade" href="javascript:void(0)" data-tradeid = "'+v.id+'">[X]</a>';
                             
							str+='</div></td>';   
                        }else if (v.n_status == '0'){
                               
							str+='<td><div class="relative"><h4 class="tradeProgres">Trade Canceled</h4>';
							str+='</div></td>';  
                        }else{
							
							if($.isPlainObject(v.trading_status)){
								str+='<td><h4 class="tradeProgres">trade completed by '+v.trading_status["name"]+' '+v.trading_status["last_name"]+' on '+v.trading_status["formatted_date"]+'</h4>';
								  // str+=' <span class="tradeDate">'+v.formatted_date+'</span> ';
								str+='</td>';
								
							}else{
								str+='<td><h4 class="tradeProgres">trade canceled </h4>';
								str+=' <span class="tradeDate">'+v.formatted_date+'</span> ';
								str+='</td>';
							}
                        }
                        
                    str+='</tr>';
                });
                $('#myTrade tbody').html(str);
                if(start==0){
                    start=1;
                    kiPagination(response.total, start, 'myTradePaging', data, 'load_my_trade', 3);
                }
            }else{
                $('#myTrade tbody').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
                $('#myTradePaging').html('');
            }
        }catch(e){
            $('#myTrade tbody').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
            $('#myTradePaging').html('');
        }
    });
}

function load_all_trade(method,start){

    var data = {};
    data.url='../badges/trading';
	data.params={ajax:1,start:start,sort_by:sortBy,sort_AZ:sort,find:method.find,give:method.give};
    data.type="json";
    
    post_json(data).done(function(response){
        var str='';
        //try{
            if(response.status==1){
                
					$.each(response.data,function(k,v){
					
						str+='<tr class="odd">';
							str+='<td class="center">';
								str+='<div class="badges badges-s">';
									str+='<img src="'+basedomain+'assets/images/badges/'+v.request_badges[0].image+'" />';
								str+='</div>';
							str+='</td>';
							str+='<td>';
								str+='<div class="badgesToTrade">';
									$.each(v.offer_badges, function(kk,vv){
										
										if(vv){
										str+='<div class="badges badges-s">';
											str+='<img src="'+basedomain+'assets/images/badges/'+vv.image+'" />';
										str+='</div>';
										}
									});
								str+='</div>';
							str+='</td>';
							if((v.trading_status>0)&&(v.creator!=v.currentactiveuser)){
								// str+='<td><a class="tradeBtn showPopup tradeBtnAction" data-trade="'+v.id+'" href="#popup-trade-confirm">TRADE</a></td>';
								// str+="<form method='post' action='"+basedomain+"badges/tradeConfirmation'>";
								str+='<td><form method="post" action="'+basedomain+'badges/tradeConfirmation"><input type="hidden" name="tradeID" value="'+v.id+'"><input type="hidden" name="ajax" value="1"><input type="submit" name="submit" value="TRADE NOW" class="tradeBtn tradeBtnAction"></a></form></td>';
								// str+="";
							}else{
								str+='<td><a class="tradeBtn disableTrade" href="#">Not Eligible</a></td>';
							}
							str+='<td><h4 class="tradeName">'+v.name+'</h4><h4 class="tradeDate">'+v.formatted_date+'</h4></td>';
							//str+='<td></td>';
						  str+='</tr>';
					});
					$('#tradeAll tbody').html(str);
					if(start==0){
						start=1;
						kiPagination(response.total, start, 'tradeAllPaging', data, 'load_all_trade', 3);
					}
				}else{
				   $('#tradeAll tbody').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
				   $('#tradeAllPaging').html('');
				}
			//}catch(e){
				// $('#tradeAll tbody').html('<tr><td colspan="5">'+response.msg+'</td></tr>');
				// $('#tradeAllPaging').html('');
        //}
    });
}


//search trade
var findBadgeID;
var giveBadgeID;

function findTrade(){
    findBadgeID='';
    giveBadgeID='';
    var idx_fti=0;
    var idx_gti=0;
    
	$.each($('.badgesListTradeSearch .badge_find'),function(k,v){       
        if($(this).hasClass('current')){
            var ftid=parseInt($(this).data('badgeid'));
            if(ftid>0){
                if(idx_fti!=0){
                    findBadgeID+=',';
                }
                findBadgeID += ftid;
            }
            idx_fti++;
        }
    });
	
	// $('.badgesFindValue').val(findBadgeID);
	
    $.each($('.badgesListTradeSearch .badge_give'),function(k,v){       
        if($(this).hasClass('current')){
            var gtid=parseInt($(this).data('badgeid'));
            if(gtid>0){
                if(idx_gti!=0){
                    giveBadgeID+=',';
                }
                giveBadgeID += gtid;
            }
            idx_gti++;
        }
    });
    if(findBadgeID!=""||typeof findBadgeID!== undefined){
        console.log(giveBadgeID);
        if(giveBadgeID!=""){
            document.location=basedomain+"badges/trading#search/"+findBadgeID+"/"+giveBadgeID;
        }else{
            document.location=basedomain+"badges/trading#search/"+findBadgeID;
        }
        $("#bg-popup").fadeOut();
        $(".popup").fadeOut();
    }
    
}