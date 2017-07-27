<?php /* Smarty version Smarty-3.1.15, created on 2014-01-09 10:44:54
         compiled from "../templates/application/web/widgets/auction-today.html" */ ?>
<?php /*%%SmartyHeaderCode:14611083652a9819d591609-64490625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd588f8e084105ab8a8ed43f76df349ed8c721048' => 
    array (
      0 => '../templates/application/web/widgets/auction-today.html',
      1 => 1389163976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14611083652a9819d591609-64490625',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a9819d5a1589_54471355',
  'variables' => 
  array (
    'todayauction' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a9819d5a1589_54471355')) {function content_52a9819d5a1589_54471355($_smarty_tpl) {?>
<div class="tabEntry">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <?php if ($_smarty_tpl->tpl_vars['todayauction']->value) {?>
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['todayauction']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
		<tr class="<?php echo $_smarty_tpl->tpl_vars['v']->value['queue'];?>
">
			<td valign="top">
				<a href="#" class="thumbPrizes"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['auctions']['image_full_path'];?>
" /></a>
			</td>
			<td valign="top">
				<div class="prizeDesc">
					<h3><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</h3>
					<p><?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</p>
				</div><!-- END .prizeDesc -->
			</td>
			<td valign="top">
				<div class="timeLeft">
					<span class="iconArrowGrey">&nbsp;</span>
					<h3>Time left for auction:</h3>
					<div id="countdown_auction_<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="countdown">
						<div class="dash days_dash">
							<span class="dash_title">DY</span>
							<div class="digit">0</div>
							<div class="digit">0</div>
						</div>
						<div class="dash hours_dash">
							<span class="dash_title">HR</span>
							<div class="digit">0</div>
							<div class="digit">0</div>
						</div>
						<div class="dash minutes_dash">
							<span class="dash_title">M</span>
							<div class="digit">0</div>
							<div class="digit">0</div>
						</div>
						<div class="dash seconds_dash">
							<span class="dash_title">S</span>
							<div class="digit">0</div>
							<div class="digit">0</div>
						</div>
					</div><!-- END .countdown -->
					<span class="iconArrowGrey">&nbsp;</span>
					<h3>bid starts from: </h3>
					<h2 class="points"><?php echo number_format($_smarty_tpl->tpl_vars['v']->value['minimalBid']);?>
<span>points</span></h2>
				</div><!-- END .prizeDesc -->
			</td>
			<td valign="top">
				<div class="currentBid">
					<span class="iconArrowGrey">&nbsp;</span>
					<h3>current highest bid:</h3>
					<h2 class="points"><?php echo number_format($_smarty_tpl->tpl_vars['v']->value['currentBid']);?>
<span>points</span></h2>
					<a href="#popup-auction" class="btnIncrease showPopup sendauctionitem" aid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" img="<?php echo $_smarty_tpl->tpl_vars['v']->value['auctions']['image_full_path'];?>
" desc="<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
" currentbid="<?php if ($_smarty_tpl->tpl_vars['v']->value['currentBid']==0) {?><?php echo $_smarty_tpl->tpl_vars['v']->value['minimalBid'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['v']->value['currentBid'];?>
<?php }?>" >Increase Bid</a>
				</div><!-- END .currentBid -->
			</td>
		  </tr>
          <?php } ?>
	  <?php }?>
    </table>
</div><!-- END .tabEntry -->

<script type="text/javascript">
function getstartauction(){
	
			<?php if ($_smarty_tpl->tpl_vars['todayauction']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['todayauction']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				var days = <?php echo $_smarty_tpl->tpl_vars['v']->value['auctiondate']['days'];?>
;
				var month = <?php echo $_smarty_tpl->tpl_vars['v']->value['auctiondate']['month'];?>
;
				var year = <?php echo $_smarty_tpl->tpl_vars['v']->value['auctiondate']['year'];?>
;
				var hour = <?php echo $_smarty_tpl->tpl_vars['v']->value['auctiondate']['hour'];?>
;
				var minute = <?php echo $_smarty_tpl->tpl_vars['v']->value['auctiondate']['minute'];?>
;
				var sec = <?php echo $_smarty_tpl->tpl_vars['v']->value['auctiondate']['sec'];?>
;
				var theindex = <?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
;
		
			$('#countdown_auction_'+theindex).countDown({
				targetDate: {
					'day': 		days,
					'month': 	month,
					'year': 	year,
					'hour': 	hour,
					'min': 		minute,
					'sec': 		sec
				},omitWeeks:true
			});
			
			
				<?php } ?>
			<?php }?>			  
		
}
	$(document).ready(function() { 
		getstartauction();
	});

$(document).on('click','.sendauctionitem',function(){
 
	var aid=  $(this).attr('aid');
	var img= $(this).attr('img');
	var desc= $(this).attr('desc');
	var currentbid= $(this).attr('currentbid');

	//add preload..
		console.log('wait...........');
	if(aid==0){
		console.log(' not found');
	}else{
		console.log(' OKeh ');
		$('.aidtoform').val(aid);
		$('.badgestoform').val(0);
		$('.amounttoform').val(0);
		$('.oppponenttoform').val(0);
	 
		$('.auctionimagesbid').attr('src',img);
		$('.auctiondescbid').html(desc);
		
		$('.auctioncurrentbid').html(currentbid);
		$('.myofferingpointsubbed').html(currentbid);
		
		$('.myofferingpointsubbed').attr('currentbidder',currentbid);
 
	}
	
});	
</script>
<?php }} ?>
