var notifLimitGlobal=10;
var nextNotif = 0;
function load_notification_list(notifLimit,t){
    try{
    var data = {};
    data.url= basedomain+'notifications/load';
    data.params={ajax:1,limit:notifLimit};
    data.type="json";
    
     if(typeof notifLimit === 'undefined'){
        notifLimit=10;
     };

    post_json(data).done(function(response){
        var str='';
        var inx = 0;
		
        try{
			if(response.unread.total>0)
				{
                    notif_count= response.unread.total;
                    if(response.unread.total>1){
                        $('.notif_count').html("you have "+response.unread.total+" new notifications");
                    }else{   
                        $('.notif_count').html("you have "+response.unread.total+" new notification");
                    }
					$('.notifunread').html('NOTIFICATION ('+response.unread.total+')');
				}
            $.each(response.data,function(k,v){
                if(v.read_status == 0){
                    str+='<div class="row unread">';
                }else{
                    str+='<div class="row read">';
                }
                
                    str+='<a class="showPopup popup_notif_detail" href="#popup-notification-detail" data-req="'+v.id+'">'+v.subject+'</a>';
                    str+='<span class="notifdate">'+v.formatted_date+'</span>';
                str+='</div>';
                inx++;
            });
           
            if(notifLimit==inx){
                nextNotif=1;
            }else{
                nextNotif=0;
            }
			$('#notifList').attr('style','height:500px;overflow:auto;');
            $('#notifList').html(str);

            if(t==1){
                $('#notifList .row:eq(0) a').trigger('click');
            }
        }catch(e){
			// locale.notification.empty " you don't have notifications "
			
			str="<div class='row read nomessage'  >";
			str+='<a class="" href="javascript:void(0)" style="cursor:default" >'+locale.notification.empty+'</a>';           
            str+='</div>';
			
			$('#notifList').attr('style','height:auto');
			$('#notifList').html(str);
		}
    });
}catch(e){}
}


function read_notif(div,response){
    if(div.hasClass('unread')){
        div.removeClass('unread').addClass('read');
        notif_count=parseInt(notif_count)-1;
        if(notif_count>1){
            $('.notif_count').html("you have "+notif_count+" new notifications");
        }else{   
            $('.notif_count').html("you have "+notif_count+" new notification");
        }

        $('.notifunread').html('NOTIFICATION ('+notif_count+')');
    }
    $('#notifBox .messageDetail h3').html(response.data.subject);
    $('#notifBox .messageDetail span.notifdate').html(response.data.formatted_date);
    $('#notifuser').html(response.data.username);
    $('#notifBox .messageDesc h4.desc').html(response.data.detail);
    if(response.data.href){     
        if(response.data.type == "16" || response.data.type == "7"){        
            $('#notifBox .messageDesc a.orangebtn').attr('href',basedomain+''+response.data.static_message);
        }else{
            $('#notifBox .messageDesc a.orangebtn').attr('href',basedomain+''+response.data.href);
        }
        $('#notifBox .messageDesc a.orangebtn').html(response.data.link_text);
        $('#notifBox .messageDesc a.orangebtn').show();
    }else{
        $('#notifBox .messageDesc a.orangebtn').hide();
    }
}

$(document).on('click','a.popup_notif_detail',function(){
    var request = $(this).data('req');
    var div = $(this).closest('.row');
    var data = {};
    data.url=basedomain+'notifications/details';
    data.params={ajax:1,req:request};
    data.type="json";
    
    post_json(data).done(function(response){
        var str='';
       try{
            //console.log(div.hasClass('unread'));
            read_notif(div,response);
       }catch(e){}
    });
});

$(function($){
    $('#notifList').bind('scroll', function()
        {
            if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight){
                console.log(nextNotif);
                if(nextNotif==1){
                    notifLimitGlobal=notifLimitGlobal+5;
                    load_notification_list(notifLimitGlobal);
                }
            }
        })
    }
);

function getUnreadNotif(){
     var data = {};
    data.url=basedomain+'profile/getUnreadNotif';
    data.params={ajax:1};
    data.type="json";
    
    post_json(data).done(function(response){
        var notif_count=parseInt(response.total);
        if(notif_count>1){
       
            $('.notif_count').html("you have "+notif_count+" new notifications");
        }else{   
			if(notif_count==1){
					$('.notif_count').html("you have "+notif_count+" new notification");
			}else{
						 $('.notif_count').html("no new notifications");
			}		
            
           
        }
    });
};
