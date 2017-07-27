<?php /* Smarty version Smarty-3.1.15, created on 2013-12-23 09:53:54
         compiled from "../templates/application/web//apps/badges-auction.html" */ ?>
<?php /*%%SmartyHeaderCode:6452874952a96e6da6a4c3-15743216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc7d2e189dc2f0372d254c8c61fe5fba6fd836c1' => 
    array (
      0 => '../templates/application/web//apps/badges-auction.html',
      1 => 1387537372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6452874952a96e6da6a4c3-15743216',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a96e6daad007_77856777',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a96e6daad007_77856777')) {function content_52a96e6daad007_77856777($_smarty_tpl) {?><div id="auctionPage" class="container">
	<div class="entry-container center">
    	<div id="box-content">
        	<div id="head-content" class="bg-head-auction">
                <h3>bid or fold. Decide now.<br />
get a chance to add more unique badges to your collections. <a href="#">[how it works]</a></h3>
            </div><!-- END #head-content -->
            <div id="entry-content">
                <div id="tabs">
                  <div id="tabNavigation">
                      <ul id="tabNav">
                        <li><a href="#PastAuction">Past Auction</a></li>
                        <li><a href="#TodayAuction">Today's Auction</a></li>
                        <li><a href="#AuctionWon">Auction I Won</a></li>
                      </ul>
                  </div><!-- END #tabNavigation -->
                  <div id="PastAuction">
					<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/auction-past.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                  </div><!-- END #PastAuction -->
                  <div id="TodayAuction">
					<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/auction-today.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                  </div><!-- END #TodayAuction -->
                  <div id="AuctionWon">
					<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/auction-win.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                  </div><!-- END #AuctionWon -->
                </div><!-- END #tabs -->
            </div><!-- END #entry-content -->
        </div><!-- END #box-content -->
    </div><!-- END .entry-container -->
</div><!-- END .container -->
<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-auction.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

 <?php }} ?>
