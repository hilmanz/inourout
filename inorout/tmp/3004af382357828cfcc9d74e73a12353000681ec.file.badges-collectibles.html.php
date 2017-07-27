<?php /* Smarty version Smarty-3.1.15, created on 2014-01-09 10:45:24
         compiled from "../templates/application/web//apps/badges-collectibles.html" */ ?>
<?php /*%%SmartyHeaderCode:50146374652ce1b545f60a7-21901101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3004af382357828cfcc9d74e73a12353000681ec' => 
    array (
      0 => '../templates/application/web//apps/badges-collectibles.html',
      1 => 1389163975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50146374652ce1b545f60a7-21901101',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'merchandise' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52ce1b546ec9f9_89699395',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ce1b546ec9f9_89699395')) {function content_52ce1b546ec9f9_89699395($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/inourout/inorout/engines/Smarty/plugins/modifier.date_format.php';
?><div id="badgesPage" class="container">
	<div class="entry-container center">
    	<div id="box-content">
        	<div id="head-content" class="bg-head-reedem">
                <h3>bid or fold. Decide now.<br />
get a chance to add more unique badges to your collections. <a href="#">[how it works]</a></h3>
            </div><!-- END #head-content -->
            <div id="entry-content">
                  <div id="badgesRedeem">
                    <div class="tabEntry">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['merchandise']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                          <tr class="<?php echo $_smarty_tpl->tpl_vars['val']->value['queue'];?>
">
                            <td valign="top">
                                <a href="#" class="thumbPrizes"><img src="<?php echo $_smarty_tpl->tpl_vars['val']->value['collectibles']['image_full_path_thumb'];?>
" /></a>
                            </td>
                            <td valign="top">
                                <div class="prizeDesc">
                                    <h3><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</h3>
                                    <p><?php echo $_smarty_tpl->tpl_vars['val']->value['detail'];?>
</p>
                                </div><!-- END .prizeDesc -->
                            </td>
                            <td valign="top">
                                <div class="BadgesRequired">
                                    <h3>Points required*:</h3>
                                    <div class="badgesForRedeem">
                                        <h2 class="points"><?php echo number_format($_smarty_tpl->tpl_vars['val']->value['point']);?>
 Points</h2>
                                    </div><!-- END .badgesForRedeem -->
                                    <p class="information">Redemption period: <br /> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['postdate'],"%e %B");?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['enddates'],"%e %B %Y");?>
</p>
                                </div><!-- END .BadgesRequired -->
                            </td>
                            <td valign="top">
                            	<div class="action-btn">
                                	<a class="orangebtn fr showPopup sendmerchandiseitem" href="#popup-redeem" merchid="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" merchimage="<?php echo $_smarty_tpl->tpl_vars['val']->value['collectibles']['image_full_path'];?>
"   merchname="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"  merchpoint="<?php echo $_smarty_tpl->tpl_vars['val']->value['point'];?>
"   >REDEEM &raquo;</a>
                                </div><!-- END .action-btn -->
                            </td>
                          </tr>
                           <?php } ?>
                        </table>
                        <h3 class="fr info">*Points are determined by the values of your overall badges.</h3> 
                    </div><!-- END .tabEntry -->
                </div><!-- END #badgesRedeem -->
            </div><!-- END #entry-content -->
        </div><!-- END #box-content -->
    </div><!-- END .entry-container -->
</div><!-- END .container -->

<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-redeem.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-redeem-form.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-redeem-success.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<script>

$(document).on('click','.sendmerchandiseitem',function(){
 
	var merchid=  $(this).attr('merchid');
	var merchimage= $(this).attr('merchimage');
	var merchname= $(this).attr('merchname');
	var merchpoint= $(this).attr('merchpoint');

	//add preload..
		console.log('wait...........');
	if(merchid==0){
		console.log(' not found');
	}else{
		console.log(' OKeh merhcn');
		$('.midtoform').val(merchid);
		$('.badgestoform').val(0);
		$('.amounttoform').val(0);
	 
	 
		$('.merchimagesbid').attr('src',merchimage);
		$('.merchdescbid').html(merchname);
		
		$('.merchcurrentbid').html(merchpoint);
		$('.myofferingpointsubbed').html(merchpoint);
		
		$('.myofferingpointsubbed').attr('currentbidder',merchpoint);
 
	}
	
});	
</script>
<?php }} ?>
