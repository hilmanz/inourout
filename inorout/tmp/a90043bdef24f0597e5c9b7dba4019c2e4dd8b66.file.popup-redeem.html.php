<?php /* Smarty version Smarty-3.1.15, created on 2014-01-09 10:45:24
         compiled from "../templates/application/web/widgets/popup-redeem.html" */ ?>
<?php /*%%SmartyHeaderCode:110950036852aa9ba2596474-26958097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a90043bdef24f0597e5c9b7dba4019c2e4dd8b66' => 
    array (
      0 => '../templates/application/web/widgets/popup-redeem.html',
      1 => 1389163976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110950036852aa9ba2596474-26958097',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52aa9ba25add85_46645851',
  'variables' => 
  array (
    'basedomain' => 0,
    'currentbadges' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa9ba25add85_46645851')) {function content_52aa9ba25add85_46645851($_smarty_tpl) {?><div class="popup" id="popup-redeem">
    <div class="popupContainer">
		<a class="closePopup" href="#">[CLOSE X]</a>
    	<div class="popup-head">
        	<h2><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/content/prize-redemption.png" /></h2>
        </div>
    	<div class="popup-entry">
                <form id="tradeFormBid">
                    <div class="badgesListAll">
                        <h3>You are about to redeem: <span class="prizeName merchdescbid" ></span></h3>
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['currentbadges']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
							<div class="boxBadges">
								<a class="badges badges-m <?php if ($_smarty_tpl->tpl_vars['val']->value['total']!=0) {?><?php } else { ?>grayscale<?php }?>" href="#">
									<img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
.png" />
								</a>
								<h4 class="badgesCount"><span class="counterBadges <?php if ($_smarty_tpl->tpl_vars['val']->value['total']!=0) {?>black<?php } else { ?>red<?php }?>">[<?php echo $_smarty_tpl->tpl_vars['val']->value['total'];?>
]</span> BADGES LEFT</h4>
								<input type="text" class="badgesvaluetemps spinnerbid" value="0" badgesid="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" badgesnames="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" amountpoint="0" currentpoint="0" max="<?php echo $_smarty_tpl->tpl_vars['val']->value['total'];?>
" badgesvalues="<?php echo $_smarty_tpl->tpl_vars['val']->value['point'];?>
" readonly="readonly" name="badges_<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" />
							</div><!-- END .boxBadges -->
						<?php } ?>
                    </div><!-- END .badgesListAll -->
                    <div id="biddingInfo">
                    	<div id="prizeBox">
           					 <a href="#" class="thumbPrizes"><img class="merchimagesbid" src="" /></a>
                             <h3  class="merchdescbid" > </h3>
                        </div>
                        <div id="currentBid" class="bidsideBox">
                        	<h3>Points required:</h3>
                            <h2 class="bidValue merchcurrentbid">0</h2>
                        </div><!-- END #currentBid -->
                        <div id="yourBid" class="bidsideBox">
                        	<h3>Your Points:</h3>
                            <h2 class="bidValue myofferingpoint">0</h2>
                            <p>You need <span>(<span class="myofferingpointsubbed" currentbidder="0" >0</span>)</span> more points out of your badge value.</p>
                        </div><!-- END #yourBid -->
						
                        <a href="#popup-redeem-form" class="orangebtn showPopup" id="redeemBtn">REDEEM &raquo;</a>
                    </div><!-- END #biddingInfo -->
                </form>
        </div>
    </div><!-- END .popupContainer -->
</div><!-- END .popup --><?php }} ?>
