<?php /* Smarty version Smarty-3.1.15, created on 2014-01-07 10:56:00
         compiled from "../templates/application/web/widgets/popup-trade-confirm.html" */ ?>
<?php /*%%SmartyHeaderCode:103272516952aff3b1df7410-65542327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bddec201e5e6eb7b05be428eb440890157faa836' => 
    array (
      0 => '../templates/application/web/widgets/popup-trade-confirm.html',
      1 => 1389066143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103272516952aff3b1df7410-65542327',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52aff3b1e29125_57522560',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aff3b1e29125_57522560')) {function content_52aff3b1e29125_57522560($_smarty_tpl) {?><div class="popup" id="popup-trade-confirm">
    <div class="popupContainer center">
		<a class="closePopup" href="#">[CLOSE X]</a>
    	<div class="popup-head">
        	<h2><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/content/placing_trade.png" /></h2>
        </div>
    	<div class="popup-entry">
                <form id="tradeFormConfirm">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr class="even">
                    <td>
                        <div class="badgesListConfirm badgesListConfirm_offer">
                            
                        </div><!-- END .badgesListConfirm -->
                    </td>
                  </tr>
                  <tr class="odd">
                    <td>
                        <h3>Trading With</h3>
                        <div class="badgesListConfirm badgesListConfirm_request">
                            
                        </div><!-- END .badgesListConfirm -->
                    </td>
                  </tr>
                </table>
                <div class="row">
      				  <a id="submitTradeBtn" href="#popup-trade-success" class="orangebtn showPopup bigBtn">SUBMIT TRADE</a>
                </div><!-- END .row -->
                </form>
        </div>
    </div><!-- END .popupContainer -->
</div><!-- END .popup --><?php }} ?>
