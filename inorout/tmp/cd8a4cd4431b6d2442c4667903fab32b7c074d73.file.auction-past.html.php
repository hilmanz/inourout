<?php /* Smarty version Smarty-3.1.15, created on 2013-12-23 09:53:54
         compiled from "../templates/application/web/widgets/auction-past.html" */ ?>
<?php /*%%SmartyHeaderCode:170430614552a9819d57f517-67050779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd8a4cd4431b6d2442c4667903fab32b7c074d73' => 
    array (
      0 => '../templates/application/web/widgets/auction-past.html',
      1 => 1387537372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170430614552a9819d57f517-67050779',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a9819d58d394_64511471',
  'variables' => 
  array (
    'pastauction' => 0,
    'v' => 0,
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a9819d58d394_64511471')) {function content_52a9819d58d394_64511471($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/inourout/inorout/engines/Smarty/plugins/modifier.date_format.php';
?>
<div class="tabEntry">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<?php if ($_smarty_tpl->tpl_vars['pastauction']->value) {?>
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pastauction']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
            	<p class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['start_date'],"%e %B %Y");?>
</p>
                <h3><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</p>
            </div> 
        </td>
        <td valign="top">
            <div class="auctionWinner">
                <h3>Auction winner:</h3>
                <div class="userWinner">
        			<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
profile/<?php echo $_smarty_tpl->tpl_vars['v']->value['userid'];?>
" class="small-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['profile']['image_full_path'];?>
" /></a>
                    <div class="fl">
                        <h2 class="account-name"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['v']->value['last_name'];?>
</h2>
                    </div> 
                </div> 
            </div> 
        </td>
      </tr>
       <?php } ?>
	 <?php }?>
    </table>
</div> <?php }} ?>
