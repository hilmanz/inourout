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

    $('a.sort_active').on('click',function(){
        sortBy = $(this).data('sort');
		$('.sort_active').addClass('arrow-right');
		$('.sort_active').removeClass('arrow-bottom');
		$(this).addClass('arrow-bottom');
        if(sort==0)sort=1;
        else sort=0;
		
		
        load_all_trade({},0);

    });
});

$( ".badgesFinding .badges" ).click(function(){
    badgesFinding = parseInt($(this).data('badgeid'));
    
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
    });
});

$('.ui-spinner-button').click(function() { 
    $(this).siblings('input').change(); 
});

$( ".badgesOwn .badges" ).click(function(){
    //badgesGiveCount = $('.badgesOwn a.current').length;
});
$( ".findTrade" ).click(function(){
    $('.badge_find').removeClass('current');
});

$( "a[href='#CreateTrade']" ).click(function(){
    $('.badge_find').removeClass('current');
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
            

            $('a.closePopup').on('click',function(){
                 window.location.href = basedomain+"badges/trading";
            });
            // setTimeout(function () {
            //    window.location.href = basedomain+"badges/trading";
            // }, 2000);
        }catch(e){}
    });
});

$(document).on('click','.cancelTrade',function(){
    var trade_id = $(this).data("tradeid");
    cancelTrade(trade_id);
});

// $(document).on('click','.cancelTrade',function(){
//     var trade_id = parseInt($(this).data("tradeid"));
//     var str = '';
//    // str+='<h2>Apakah kamu yakin ingin tukar badges ini?</h2>';
// 	str+='<h2>Apakah kamu yakin mau menukarkan badges ini?</h2>';
//     str+='<div style="width:140px;display:block;margin:20px auto 0;"><a href="#popup-global" class="showPopup orangebtn fl" onclick="cancelTrade(\''+trade_id+'\');">Yes</a>';
//     str+='<a href="#" class="orangebtn fr closethis" >No</a></div>';
//     $("#popup-trade-success .postMessages").html(str);

//     $('a.closethis').on('click',function(){
//         $('a.closePopup').trigger('click');
//     });
// });

function cancelTrade(trade_id){
    var data = {};
    data.url='../badges/cancelMyTrade';
    data.params={ajax:1,tradeID:trade_id};
    data.type="json";
    post_json(data).done(function(response){
        var str='';
        try{
            if(response.status==1){
                str+='<h3>'+response.msg+'</h3>';
				
                $('#popup-trade-success .postMessages').html(str);
            }else{
                str+='<h3>'+response.msg+'</h3>';
                $('#popup-trade-success .postMessages').html(str);
            }
            
            $('a.closePopup').on('click',function(){
                 window.location.href = basedomain+"badges/trading";
            });
            // setTimeout(function () {
            //    window.location.href = basedomain+"badges/trading";
            // }, 2000);
        }catch(e){}
    });
}

$('a#createTradeConfirm').click(function(){
    //console.log($('.badgesOwn a.current').length);
    if(badgesFinding>0&&badgesGiveTotal<=4&&badgesGiveTotal>0){
        $('html, body').animate({scrollTop: '0px'});
        $('#popup-create-trade-confirm, #bg-popup').fadeIn();

        var data = {};
        data.url=basedomain+'badges/makeTradeConfirmation';
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
    data.url=basedomain+'badges/tradeConfirmation';
    data.params={ajax:1,tradeID:trade_id};
    data.type="json";

    post_json(data).done(function(response){
        if(response.data != false){
            $('html, body').animate({scrollTop: '0px'});
            $('#popup-trade-confirm, #bg-popup').fadeIn();
            
            var offer='';
            var request='';
            var currOfferID = 0;
            var countOffer = 0;
            var rrr='';
            var img = '';
            var offer_data = response.data.offer_badges;
            var od_l = offer_data.length;
           
            $.each(offer_data,function(k,v){
                if(k==0){
                    countOffer++;
                    currOfferID = v.id;
                    img=v.image;
                    var c = k+1;
                    if(od_l==c){
                        rrr='';
                        rrr+='<a class="badges badges-m" href="#">';
                            rrr+='<img src="'+basedomain+'assets/images/badges/'+img+'" />';
                            rrr+='<span class="badges-value">'+countOffer+'</span>';
                        rrr+='</a>';
                        offer+=rrr;
                    }
                }else if(k>0&&currOfferID==v.id){
                    countOffer++;
                    img=v.image;
                    var c = k+1;
                    if(od_l==c){
                        rrr='';
                        rrr+='<a class="badges badges-m" href="#">';
                            rrr+='<img src="'+basedomain+'assets/images/badges/'+img+'" />';
                            rrr+='<span class="badges-value">'+countOffer+'</span>';
                        rrr+='</a>';
                        offer+=rrr;
                    }
                }else{
                    rrr='';
                    rrr+='<a class="badges badges-m" href="#">';
                        rrr+='<img src="'+basedomain+'assets/images/badges/'+img+'" />';
                        rrr+='<span class="badges-value">'+countOffer+'</span>';
                    rrr+='</a>';
                    offer+=rrr;
                    currOfferID = v.id;
                    img=v.image;
                    countOffer=1;
                    var c = k+1;
                    if(od_l==c){
                        rrr='';
                        rrr+='<a class="badges badges-m" href="#">';
                            rrr+='<img src="'+basedomain+'assets/images/badges/'+img+'" />';
                            rrr+='<span class="badges-value">'+countOffer+'</span>';
                        rrr+='</a>';
                        offer+=rrr;
                    }

                }
            });

            request+='<a class="badges badges-m" href="#">';
                request+='<img src="'+basedomain+'assets/images/badges/'+response.data.request_badges[0].image+'" />';
                request+='<span class="badges-value">1</span>';
            request+='</a>';

            $('.badgesListConfirm_offer').html(offer);
            $('.badgesListConfirm_request').html(request);
            tradeid = response.data.id;
        }else{
            $('html, body').animate({scrollTop: '0px'});
            $('#popup-trade-success, #bg-popup').fadeIn();

            $('.postMessages').html("<h2>Trade ini sudah hilang.<h2>");
            load_all_trade({},0);
        }
    });
});

$(document).on('click','#submitTradeBtn',function(){
       var str = '';
		var data = {};
		data.url=basedomain+'badges/loadcaptcha';
		data.type="json";
		
			str+='<h2>Apakah kamu yakin ingin tukar badges ini?</h2>';
            str+='<div class="captchaTrad">';
			str+='<img src="'+basedomain+'assets/images/loader.gif" class="loaderImg">';
			$("#popup-trade-success .postMessages").html(str);	
			
			post_json(data).done(function(response){
			
				if(response.status=='1')
				{
					
					$("#popup-trade-success .postMessages .captchaTrad img").attr('src',basedomain+"public_assets/badges/"+response.imgName+".jpg");	
				
					// str+='<img src="'+basedomain+'public_assets/badges/'+response.imgName+'.jpg">';
					// str+='<input type="text" name="captchaMath" class="captchaMath">';
					$("#popup-trade-success .postMessages .captchaTrad").append("<input type='text' name='captchaMath'class='captchaMath'>");	
				}
				

            $('a.closethis').on('click',function(){
                $('a.closePopup').trigger('click');
            });
			});
           
			
			//$("#popup-trade-success .postMessages").html(str);
            // var randInt = Math.floor((Math.random()*10)+1);
            // if(randInt%2==0){
                // str+='<a href="#popup-trade-success" class="showPopup orangebtn fl" onclick="submitTrade(\''+tradeid+'\');">Yes</a>';
                // str+='<a href="#" class="orangebtn fr closethis" >No</a></div>';
            // }else{
                // str+='<a href="#popup-trade-success" class="showPopup orangebtn fr" onclick="submitTrade(\''+tradeid+'\');">Yes</a>';
                // str+='<a href="#" class="orangebtn fl closethis" >No</a></div>'; 
            // }
           
            
    
});

$(document).on('keyup','.captchaMath',function(){
		
		var capctha = $(this).val();
		 var data = {};
		 var str="";
		 data.url=basedomain+'badges/checkcaptcha';
		data.params={ajax:1,capctha:capctha};
		data.type="json";
		
		 $("#popup-trade-success .postMessages .confrimcaptcha").remove();
		post_json(data).done(function(response){
		$("#popup-trade-success .postMessages .confrimcaptcha").remove();
		
		  
		 $('a.closethis').on('click',function(){
						$('a.closePopup').trigger('click');
					});
					
			if(response.status==1)
			{
				
				var randInt = Math.floor((Math.random()*10)+1);
				if(randInt%2==0){
					str+='<div style="width:140px;display:block;margin:20px auto 0;" class="confrimcaptcha"><a href="#popup-trade-success" class="showPopup orangebtn fl" onclick="submitTrade(\''+tradeid+'\');">Yes</a>';
					str+='<a href="javascript:void(0)" onClick="$(\'a.closePopup\').trigger(\'click\');" class="orangebtn fr closethis" >No</a></div>';
				}else{
					str+='<div style="width:140px;display:block;margin:20px auto 0;" class="confrimcaptcha"><a href="#popup-trade-success" class="showPopup orangebtn fr" onclick="submitTrade(\''+tradeid+'\');">Yes</a>';
					str+='<a href="javascript:void(0)" onClick="$(\'a.closePopup\').trigger(\'click\');" class="orangebtn fl closethis" >No</a></div>'; 
				}
				 $("#popup-trade-success .postMessages").append(str);
				
			}
		});
	});
	

function submitTrade(tradeid){
    $("#popup-trade-success .postMessages").html("");
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
}

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
				 
					str+='<tr class="odd">';
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
							 
								if(v.n_status == '1'){
                                    str+='<a class="cancelTrade showPopup" href="#popup-trade-success" data-tradeid = "'+v.id+'">[X] CANCEL</a>';
                                }
                            str+='</div>';
                        str+='</td>';
                        str+='<td><h4 class="tradeDate">'+v.formatted_date+'</h4></td>';
                        if(v.n_status == '1'){
                            str+='<td><h4 class="tradeProgres">Trade on progress</h4></td>';   
                        }else if (v.n_status == '0'){
                                str+='<td><h4 class="tradeProgres">trade canceled </h4></td>';
                        }else{
							if($.isPlainObject(v.trading_status)){
								str+='<td><h4 class="tradeProgres">trade completed by '+v.trading_status["name"]+' '+v.trading_status["last_name"]+' on '+v.trading_status["formatted_date"]+'</h4></td>';
							}else{
								str+='<td><h4 class="tradeProgres">trade canceled </h4></td>';
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
                $('#myTrade tbody').html('<tr><td colspan="5" class="boxmessage">'+response.msg+'</td></tr>');
                $('#myTradePaging').html('');
            }
        }catch(e){
            $('#myTrade tbody').html('<tr><td colspan="5" class="boxmessage">'+response.msg+'</td></tr>');
            $('#myTradePaging').html('');
        }
    });
}



function load_all_trade(method,start){

    var data = {};
    data.url=basedomain+'badges/trading';
    data.params={ajax:1,start:start,sort_by:sortBy,sort_AZ:sort,find:method.find,give:method.give};
    data.type="json";
   
    post_json(data).done(function(response){
        var str='';
		
            if(response.status==1){
			
					$.each(response.data,function(k,v){
						//console.log(v);
						str+='<tr class="odd">';
						str+='<td><h4 class="tradeDate">'+v.formatted_date+'</h4></td>';
						str+='<td><h4 class="tradeName">'+v.name+'</h4></td>';
							str+='<td class="center">';
								str+='<div class="badges badges-s">';
									str+='<img src="'+basedomain+'assets/images/badges/'+v.request_badges[0].image+'" class="tip"  title="<h5>'+v.request_badges[0].name+'</h5><p>'+v.request_badges[0].desc+'</p> <h3>'+v.request_badges[0].point+' Points</h3>" />';
								str+='</div>';
							str+='</td>';
							str+='<td>';
								str+='<div class="badgesToTrade">';
									$.each(v.offer_badges, function(kk,vv){
										
										if(vv){
										str+='<div class="badges badges-s">';
											str+='<img src="'+basedomain+'assets/images/badges/'+vv.image+'"  class="tip" title="<h5>'+vv.name+'</h5><p>'+vv.desc+'</p> <h3>'+vv.point+' Points</h3>"/>';
										str+='</div>';
										}
									});
								str+='</div>';
							str+='</td>';
							if((v.trading_status>0)&&(v.creator!=v.currentactiveuser)){
								str+='<td><a class="tradeBtn showPopup tradeBtnAction" data-trade="'+v.id+'" href="#">TRADE Now</a></td>';
							}else{
								str+='<td><a class="tradeBtn disableTrade" href="#">NOT Eligible</a></td>';
							}
							
							
						  str+='</tr>';
						  	 // totalpage++;
					});
				
				// totaldata =response.total-2;
               
                if(start==0){
                    start=1;
					$('#tradeAll tbody').html(str);
                    kiPagination(response.total, start, 'tradeAllPaging', data, 'load_all_trade', 10);
					
                }
				else
				{
					$('#tradeAll tbody').html(str);
				}
				 tooltips();
            }else{
               $('#tradeAll tbody').html('<tr><td colspan="5" class="nopad"><div class="messagebox">'+response.msg+'</div></td></tr>');
               $('#tradeAllPaging').html('');
            }
        
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
            document.location="#search/"+findBadgeID+"/"+giveBadgeID;
        }else{
            document.location="#search/"+findBadgeID;
        }
        $("#bg-popup").fadeOut();
        $(".popup").fadeOut();
    }
    
}

// $(document).bind('scroll','#AllTrades',  function(){ 

// 	if(($(this).scrollTop() + $(this).innerHeight()) >= $(this)[0].activeElement.scrollHeight){			
       
// 			$('#tradeAllPaging .next').trigger('click');			
//             console.log('foo');
//     }
// });
function tooltips()
{
	
	$( ".tip" ).tooltip({
      	track: true,
		 content: function () {
					
				  return $(this).prop('title');
			  }
    });

}