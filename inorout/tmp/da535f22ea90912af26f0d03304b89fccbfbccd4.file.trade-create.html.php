<?php /* Smarty version Smarty-3.1.15, created on 2014-01-07 10:56:00
         compiled from "../templates/application/web/widgets/trade-create.html" */ ?>
<?php /*%%SmartyHeaderCode:67765049852aab8184aacd1-11807417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da535f22ea90912af26f0d03304b89fccbfbccd4' => 
    array (
      0 => '../templates/application/web/widgets/trade-create.html',
      1 => 1388391869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67765049852aab8184aacd1-11807417',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52aab8184c9e28_28980634',
  'variables' => 
  array (
    'mybadges' => 0,
    'basedomain' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aab8184c9e28_28980634')) {function content_52aab8184c9e28_28980634($_smarty_tpl) {?>
<div class="tabEntry">
    <form id="tradeForm">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="even">
        <td>
        	<h3>select the badge(s) you want to find:</h3>
            <div class="badgesListTrade badgesFinding">
                <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['bid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mybadges']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['bid']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                    <a class="badges badges-m" data-badge="find" href="#">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/<?php echo $_smarty_tpl->tpl_vars['i']->value['image'];?>
" />
                        <input type="text" class="spinner" value="0"  readonly="readonly"/>
                    </a>
                <?php } ?>
            </div><!-- END .badgesListTrade -->
        </td>
      </tr>
      <tr class="odd">
        <td>
        	<h3>Select the badge(s) you want give:</h3>
            <h4>(maximum 4 items)</h4>
            <div class="badgesListTrade badgesOwn">
                <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['bid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mybadges']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['bid']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                    <a class="badges badges-m <?php if ($_smarty_tpl->tpl_vars['i']->value['total']=='0') {?>grayscale<?php }?>" href="#">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/<?php echo $_smarty_tpl->tpl_vars['i']->value['image'];?>
" />
                        <?php if ($_smarty_tpl->tpl_vars['i']->value['total']!='0') {?>
                        <input type="text" class="spinner" value="0"  readonly="readonly"/>
                        <?php }?>
                    </a>
                <?php } ?>
            </div><!-- END .badgesListTrade -->
        </td>
      </tr>
    </table>
    <div class="row-white">
    	
        <a href="#popup-trade-confirm" class="orangebtn showPopup fr">+ create new trade</a>
        <h3 class="info fr">you may only have maximum 3 active trades at a time</h3>
    </div><!-- END .row-white -->
    </form>
</div><!-- END .tabEntry -->

<script>

    $(document).ready(function(){

    });

</script><?php }} ?>
