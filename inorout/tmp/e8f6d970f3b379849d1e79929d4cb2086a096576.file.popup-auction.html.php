<?php /* Smarty version Smarty-3.1.15, created on 2014-01-09 10:44:54
         compiled from "../templates/application/web/widgets/popup-auction.html" */ ?>
<?php /*%%SmartyHeaderCode:184183197352aed22dbc5972-81221403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8f6d970f3b379849d1e79929d4cb2086a096576' => 
    array (
      0 => '../templates/application/web/widgets/popup-auction.html',
      1 => 1389163976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184183197352aed22dbc5972-81221403',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52aed22dc0b941_36796828',
  'variables' => 
  array (
    'basedomain' => 0,
    'currentbadges' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aed22dc0b941_36796828')) {function content_52aed22dc0b941_36796828($_smarty_tpl) {?><div class="popup" id="popup-auction">
    <div class="popupContainer">
		<a class="closePopup" href="#">[CLOSE X]</a>
    	<div class="popup-head">
        	<h2><img  src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/content/placing_bid.png" /></h2>
        </div>
    	<div class="popup-entry">
                <form id="tradeFormBid" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
badges/bidding"  >
                    <div class="badgesListAll">
                    	<h3>Poin untuk bid ditentukan oleh jumlah poin dari <br />keseluruhan badge kamu & harus lebih besar dari poin bid awal.</h3>
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['currentbadges']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                        <div class="boxBadges">
                            <a class="badges badges-m  <?php if ($_smarty_tpl->tpl_vars['val']->value['total']!=0) {?><?php } else { ?>grayscale<?php }?>" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
.png" />
                            </a>
                            <h4 class="badgesCount"><span class="counterBadges <?php if ($_smarty_tpl->tpl_vars['val']->value['total']!=0) {?>black<?php } else { ?>red<?php }?>">[<?php echo $_smarty_tpl->tpl_vars['val']->value['total'];?>
]</span> BADGES LEFT</h4>
                            <input type="text" class="badgesvaluetemps spinnerbid" value="0"  badgesnames="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" badgesid="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" amountpoint="0" currentpoint="0" max="<?php echo $_smarty_tpl->tpl_vars['val']->value['total'];?>
" badgesvalues="<?php echo $_smarty_tpl->tpl_vars['val']->value['point'];?>
" readonly="readonly" name="badges_<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" />
                        </div><!-- END .boxBadges -->
                         <?php } ?>
                    </div><!-- END .badgesListAll -->
                    <div id="biddingInfo">
                    	<div id="prizeBox">
           					 <a href="#" class="thumbPrizes"><img  class="auctionimagesbid" src="" /></a>
                             <h3><span class="auctiondescbid" > </span></h3>
                        </div>
                        <div id="currentBid" class="bidsideBox">
                        	<h3>bid saat ini:</h3>
                            <h2 class="bidValue auctioncurrentbid" > 0 </h2>
                        </div><!-- END #currentBid -->
                        <div id="yourBid" class="bidsideBox">
                        	<h3>bid kamu:</h3>
                            <h2 class="bidValue myofferingpoint"   >0</h2>
                            <p>Tambahkan <span>( <span class="myofferingpointsubbed" currentbidder="0" >0</span> )</span> poin lagi menggunakan nilai badge kamu.</p>
                        </div><!-- END #yourBid -->
						<input type="hidden" name="auctionid" class="aidtoform" value="0" /> 
						<input type="hidden" name="badgelist"  class="badgestoform" value="0" /> 
						<input type="hidden" name="amountlist"  class="amounttoform" value="0" /> 
						<input type="hidden" name="opponentid" class="oppponenttoform"  value="0" /> 
                        <input type="submit" value="tambah BID &raquo;" class="orangebtn fr" id="placeBidBtn" />
						<span class="msgbidding" ></span>
              
			    
                    </div><!-- END #biddingInfo -->
                </form>
        </div>
    </div><!-- END .popupContainer -->
</div><!-- END .popup -->

<script>
	var updateoptions = {
	dataType:  'json', 	
	beforeSubmit: function(data) { 
			 $(".msgbidding").html('');
			 console.log('wait...........');
			 
	},
	success : function(data) {		
			
			if(data.result==true){				
					console.log(' okeh lah ');
					$("#placeBidBtn").attr('disabled','disabled');
					$("#placeBidBtn").val('3 turn left');
					 
			}else{
				
			}
			$(".msgbidding").html(data.message);
	}
	};					

	$("#tradeFormBid").ajaxForm(updateoptions);
</script>
<?php }} ?>
