<?php /* Smarty version Smarty-3.1.15, created on 2014-01-07 10:56:00
         compiled from "../templates/application/web//apps/badges-trading.html" */ ?>
<?php /*%%SmartyHeaderCode:69440161552a9833a9c9112-82374476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1608fbabf790de182499d702e474a720d41e554' => 
    array (
      0 => '../templates/application/web//apps/badges-trading.html',
      1 => 1388391869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69440161552a9833a9c9112-82374476',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a9833aa0d8e7_17860716',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a9833aa0d8e7_17860716')) {function content_52a9833aa0d8e7_17860716($_smarty_tpl) {?><div id="tradePage" class="container">
	<div class="entry-container">
    	<div id="box-content">
        	<div id="head-content" class="bg-head-trading">
                <h3>trade your badge with others <br />
and complete your entire collection <a href="#">[how it works]</a></h3>
            </div><!-- END #head-content -->
            <div id="entry-content">
                <div id="tabs">
                  <div id="tabNavigation">
                      <ul id="tabNav">
                        <li><a href="#AllTrades" onclick="load_all_trade({},0);">All Trades</a></li>
                        <li><a href="#CreateTrade">Create a Trade</a></li>
                        <li><a href="#MyTrade">My Trade</a></li>
                      </ul>
                  </div><!-- END #tabNavigation -->
                  <div id="AllTrades">
					<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/trade-all.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                  </div><!-- END #AllTrades -->
                  <div id="CreateTrade">
					<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/trade-create.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                  </div><!-- END #CreateTrade -->
                  <div id="MyTrade">
					<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/trade-user.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                  </div><!-- END #MyTrade -->
                </div><!-- END #tabs -->
            </div><!-- END #entry-content -->
        </div><!-- END #box-content -->
    </div><!-- END .entry-container -->
</div><!-- END .container -->
<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-findtrade.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-trade-confirm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-trade-success.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
