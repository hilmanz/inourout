<?php /* Smarty version Smarty-3.1.15, created on 2013-12-16 12:04:46
         compiled from "../templates/application/web/widgets/popup-findtrade.html" */ ?>
<?php /*%%SmartyHeaderCode:117178911752ae85a6446443-87644016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be1bf5f4dbebf84e32a20ce0875b606a16aa212f' => 
    array (
      0 => '../templates/application/web/widgets/popup-findtrade.html',
      1 => 1387170104,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117178911752ae85a6446443-87644016',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52ae85a64ca3a0_59138814',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ae85a64ca3a0_59138814')) {function content_52ae85a64ca3a0_59138814($_smarty_tpl) {?><div class="popup" id="popup-findtrade">
    <div class="popupContainer">
		<a class="closePopup" href="#">[CLOSE X]</a>
    	<div class="popup-head">
        	<h2><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/content/findtrade.png" /></h2>
        </div>
    	<div class="popup-entry">
                <form id="tradeFormSearch">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr class="even">
                    <td>
                        <h3>enter the badge(s) you want to find:</h3>
                        <div class="badgesListTradeSearch">
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-1.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-2.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-3.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-4.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-5.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-6.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-7.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-8.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-9.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-10.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-11.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-12.png" />
                            </a>
                        </div><!-- END .badgesListTradeSearch -->
                    </td>
                  </tr>
                  <tr class="odd" id="advanceSearch">
                    <td>
                        <h3>Select the badge(s) you want give:</h3>
                        <div class="badgesListTradeSearch">
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-1.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-2.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-3.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-4.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-5.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-6.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-7.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-8.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-9.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-10.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-11.png" />
                            </a>
                            <a class="badges badges-m" href="#">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-12.png" />
                            </a>
                        </div><!-- END .badgesListTradeSearch -->
                    </td>
                  </tr>
                </table>
                <div class="row-white">
                    <input type="submit" value="+ FIND" class="orangebtn fr" />
                    <h3 class="fl"><a href="#" class="advanceSearchBtn">Advance Search</a></h3>
                </div><!-- END .row-white -->
                </form>
        </div>
    </div><!-- END .popupContainer -->
</div><!-- END .popup --><?php }} ?>
