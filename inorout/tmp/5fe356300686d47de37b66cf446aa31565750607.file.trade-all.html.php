<?php /* Smarty version Smarty-3.1.15, created on 2014-01-07 10:56:00
         compiled from "../templates/application/web/widgets/trade-all.html" */ ?>
<?php /*%%SmartyHeaderCode:192651634552aab818313fb5-87002028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fe356300686d47de37b66cf446aa31565750607' => 
    array (
      0 => '../templates/application/web/widgets/trade-all.html',
      1 => 1389066143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192651634552aab818313fb5-87002028',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52aab818377c10_03425021',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aab818377c10_03425021')) {function content_52aab818377c10_03425021($_smarty_tpl) {?>
<div class="tabEntry">
	<div class="head-tab">
    	
    	<div class="fl">
            <a class="findTrade showPopup" href="#popup-findtrade">FIND A TRADE</a>
            <a class="refreshTrade" href="#" onclick="load_all_trade({},0);">REFRESH</a>
        </div>
    </div>
    <table id="tradeAll" width="100%" border="0" cellspacing="0" cellpadding="0">
      <thead>
      <tr class="head even">
        <td class="center"><h3>badges wanted</h3></td>
        <td align="left"><h3>badge to trade</h3></td>
        <td><h3><a href="#" class="arrow-right">trading status</a></h3></td>
        <td align="left"><h3><a href="#" class="arrow-right">trader's name</a></h3></td>
        <td align="left"><h3><a href="#" class="arrow-bottom">publish date</a></h3></td>
      </tr>
      </thead>
      <tbody>
      </tbody>

      
    
    </table>
    <div id="tradeAllPaging" class="pagingbox">
    	
    </div><!-- END .pagingbox -->
</div><!-- END .tabEntry -->


<script>

    // global
    var tradeid=0;
    $(document).ready(function(){
        var start=0;
        load_all_trade({},0);
        load_my_trade({},0);
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
                                    str+='<div class="badges badges-s">';
                                        str+='<img src="'+basedomain+'assets/images/badges/'+vv.image+'" />';
                                    str+='</div>';
                                });
                            if(v.n_status == '1'){
                                str+='<a class="cancelTrade showPopup" href="#popup-global">[X] CANCEL</a>';
                            }
                        str+='</div>';
                    str+='</td>';
                    str+='<td><h4 class="tradeDate">'+v.formatted_date+'</h4></td>';
                    if(v.n_status == '1'){
                        str+='<td><h4 class="tradeProgres">Trade on progress</h4></td>';   
                    }else{
                        str+='<td><h4 class="tradeProgres">trade completed by <a href="#">'+v.trading_status["name"]+' '+v.trading_status["last_name"]+'</a> on '+v.trading_status["formatted_date"]+'</h4></td>';
                    }
                    
                str+='</tr>';
            });
            $('#myTrade tbody').html(str);
            if(start==0){
                start=1;
                kiPagination(response.total, start, 'myTradePaging', data, 'load_my_trade', 3);
            }
        });
    }
    function load_all_trade(method,start){
        var data = {};
        data.url='../badges/trading';
        data.params={ajax:1,start:start};
        data.type="json";
        
        post_json(data).done(function(response){
            var str='';
            try{
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
                                    str+='<div class="badges badges-s">';
                                        str+='<img src="'+basedomain+'assets/images/badges/'+vv.image+'" />';
                                    str+='</div>';
                                });
                            str+='</div>';
                        str+='</td>';
                        if(v.trading_status==1){
                            str+='<td><a class="tradeBtn showPopup tradeBtnAction" data-trade="'+v.id+'" href="#popup-trade-confirm">TRADE</a></td>';
                        }else{
                            str+='<td><a class="tradeBtn disableTrade" href="#">TRADE</a></td>';
                        }
                        str+='<td><h4 class="tradeName">'+v.name+'</h4></td>';
                        str+='<td><h4 class="tradeDate">'+v.formatted_date+'</h4></td>';
                      str+='</tr>';
                });
                $('#tradeAll tbody').html(str);
                if(start==0){
                    start=1;
                    kiPagination(response.total, start, 'tradeAllPaging', data, 'load_all_trade', 3);
                }

            }catch(e){}
        });
    }

</script><?php }} ?>
