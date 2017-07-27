<?php /* Smarty version Smarty-3.1.15, created on 2014-01-07 10:55:40
         compiled from "../templates/application/web//apps/badges-redeem.html" */ ?>
<?php /*%%SmartyHeaderCode:103991422552aa87b7c8f3b8-39689262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '927dc42729772114a85459bbfc1eb5e6d34979aa' => 
    array (
      0 => '../templates/application/web//apps/badges-redeem.html',
      1 => 1389066938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103991422552aa87b7c8f3b8-39689262',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52aa87b802b349_11325271',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa87b802b349_11325271')) {function content_52aa87b802b349_11325271($_smarty_tpl) {?><div id="badgesPage" class="container">
	<div class="entry-container">
    	<div id="box-content">
        	<div id="head-content" class="bg-head-reedem">
                <h3>collect or pass. Decide now.<br />
Gunakan badge untuk mendapatkan hadiah limited edition.<a href="#popup-mekanisme-redeem" class="showPopup">[how it works]</a></h3>
            </div><!-- END #head-content -->
            <div id="entry-content">
                  <div id="badgesRedeem">
                    <div class="tabEntry">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr class="odd">
                            <td valign="top">
                                <a href="#" class="thumbPrizes"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/content/prizes/prizes7.png" /></a>
                            </td>
                            <td valign="top">
                                <div class="prizeDesc">
                                    <h3>backpack</h3>
                                    <p>show off your cool carryall that suits your ever-changing style and lifestyle.</p>
                                </div><!-- END .prizeDesc -->
                            </td>
                            <td valign="top">
                                <div class="BadgesRequired">
                                    <h3>Points required*:</h3>
                                    <div class="badgesForRedeem">
                                        <h2 class="points">35.000 <span>Points</span></h2>
                                    </div><!-- END .badgesForRedeem -->
                                </div><!-- END .BadgesRequired -->
                            </td>
                            <td valign="top">
                            	<div class="action-btn">
                                	<h3>Redemption period: </h3>
                                    <p class="information">11 October - 18 october 2013</p>
                                	<a class="orangebtn showPopup" href="#popup-redeem">REDEEM &raquo;</a>
                                </div><!-- END .action-btn -->
                            </td>
                          </tr>
                          <tr class="even">
                            <td valign="top">
                                <a href="#" class="thumbPrizes"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/content/prizes/prizes8.png" /></a>
                            </td>
                            <td valign="top">
                                <div class="prizeDesc">
                                    <h3>LUGGAGE TAG</h3>
                                    <p>Identity is as important as it gets. Create a singular mark on your stuff and make it truly yours</p>
                                </div><!-- END .prizeDesc -->
                            </td>
                            <td valign="top">
                                <div class="BadgesRequired">
                                    <h3>Points required*:</h3>
                                    <div class="badgesForRedeem">
                                        <h2 class="points">35.000 <span>Points</span></h2>
                                    </div><!-- END .badgesForRedeem -->
                                </div><!-- END .BadgesRequired -->
                            </td>
                            <td valign="top">
                            	<div class="action-btn">
                                	<h3>Redemption period: </h3>
                                    <p class="information">4 October - 10 october 2013</p>
                                	<a class="orangebtn showPopup" href="#popup-redeem">REDEEM &raquo;</a>
                                </div><!-- END .action-btn -->
                            </td>
                          </tr>
                        </table>
                        <h3 class="fr info">**Poin ditentukan dari jumlah nilai keseluruhan badge.</h3> 
                    </div><!-- END .tabEntry -->
                </div><!-- END #badgesRedeem -->
            </div><!-- END #entry-content -->
        </div><!-- END #box-content -->
    </div><!-- END .entry-container -->
</div><!-- END .container -->

<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-redeem.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-redeem-form.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-redeem-success.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-mekanisme-redeem.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
