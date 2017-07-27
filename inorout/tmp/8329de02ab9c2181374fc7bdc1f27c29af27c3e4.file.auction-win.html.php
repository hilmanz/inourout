<?php /* Smarty version Smarty-3.1.15, created on 2013-12-23 09:53:54
         compiled from "../templates/application/web/widgets/auction-win.html" */ ?>
<?php /*%%SmartyHeaderCode:52404793352a9819d5a60e2-52147787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8329de02ab9c2181374fc7bdc1f27c29af27c3e4' => 
    array (
      0 => '../templates/application/web/widgets/auction-win.html',
      1 => 1387537372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52404793352a9819d5a60e2-52147787',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a9819d5b4260_83067625',
  'variables' => 
  array (
    'auctioniwon' => 0,
    'v' => 0,
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a9819d5b4260_83067625')) {function content_52a9819d5b4260_83067625($_smarty_tpl) {?>
<div class="tabEntry">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <?php if ($_smarty_tpl->tpl_vars['auctioniwon']->value) {?>
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['auctioniwon']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
      <tr class="<?php echo $_smarty_tpl->tpl_vars['v']->value['queue'];?>
">
        <td valign="top">
            <a href="#" class="thumbPrizes"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['auctions']['image_full_path'];?>
"" /></a>
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
            <div class="auctionWinner">
                <h3>Auction winner:</h3>
                <div class="userWinner">
        			<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
profile" class="small-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['profile']['image_full_path'];?>
" /></a>
                    <div class="fl">
                        <h2 class="account-name"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['v']->value['last_name'];?>
</h2>
                        <h2 class="totalPoint"><?php echo number_format($_smarty_tpl->tpl_vars['v']->value['points']);?>
<span>points</span></h2>
                    </div><!-- END .fl -->
                </div><!-- END .userWinner -->
            </div><!-- END .auctionWinner -->
        </td>
        <td valign="top">
            <div class="noteBox">
                <h3>NOTE:</h3>
                <p>Your bid has just got you one special item. These following badges have been taken in exchange from your collection.</p>
                <h4 class="information">Please enter your shipping address for merchandise delivery</h4>
            </div><!-- END .noteBox -->
        </td>
      </tr>
      <?php } ?>
  <?php }?>
    </table>
</div><!-- END .tabEntry --><?php }} ?>
