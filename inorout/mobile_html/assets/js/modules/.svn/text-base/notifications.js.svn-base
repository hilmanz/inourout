
function load_notification_list(){
    var data = {};
    data.url='notifications/load';
    data.params={ajax:1};
    data.type="json";
    
    post_json(data).done(function(response){
        var str='';
        try{
            $.each(response.data,function(k,v){
                if(v.n_status == 0){
                    str+='<div class="row unread">';
                }else{
                    str+='<div class="row read">';
                }
                
                    str+='<a class="showPopup popup_notif_detail" href="#popup-notification-detail" data-req="'+v.id+'">'+v.title+'</a>';
                    str+='<span class="notifdate">'+v.formatted_date+'</span>';
                str+='</div>';
            });
            $('#notifList').html(str);
        }catch(e){}
    });
}

$(document).on('click','a.popup_notif_detail',function(){
    var request = $(this).data('req');
    var data = {};
    data.url='notifications/details';
    data.params={ajax:1,req:request};
    data.type="json";
    
    post_json(data).done(function(response){
        var str='';
        try{
            $('#notifBox .messageDetail h3').html(response.data.title);
            $('#notifBox .messageDetail span.notifdate').html(response.data.formatted_date);
            $('#notifBox .messageDesc h4').html(response.data.content);
            if(response.data.link){
                $('#notifBox .messageDesc a.orangebtn').show();
                $('#notifBox .messageDesc a.orangebtn').attr('href',response.data.link);
            }else{
                $('#notifBox .messageDesc a.orangebtn').hide();
            }
        }catch(e){}
    });
});
   