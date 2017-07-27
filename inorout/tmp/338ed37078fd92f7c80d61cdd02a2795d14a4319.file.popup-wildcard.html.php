<?php /* Smarty version Smarty-3.1.15, created on 2014-01-07 11:09:01
         compiled from "../templates/application/web/widgets/popup-wildcard.html" */ ?>
<?php /*%%SmartyHeaderCode:113998647152cb7cbadbe044-28445711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '338ed37078fd92f7c80d61cdd02a2795d14a4319' => 
    array (
      0 => '../templates/application/web/widgets/popup-wildcard.html',
      1 => 1389067739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113998647152cb7cbadbe044-28445711',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52cb7cbadc6744_01373239',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52cb7cbadc6744_01373239')) {function content_52cb7cbadc6744_01373239($_smarty_tpl) {?><div class="popup" id="popup-wildcard" style="display:block;">
    <div class="popupContainer">
		<a class="closePopup" href="#">[CLOSE X]</a>
    	<div class="popup-head">
        	<h2 class="bigTItle"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/content/wildcard.png" /></h2>
        </div><!-- END .popup-head -->
    	<div class="popup-entry">
            <div id="wildcardlist">
            	<span class="stamp">&nbsp;</span>
            	<span class="stamp">&nbsp;</span>
            	<span class="stamp">&nbsp;</span>
            	<span class="stamp">&nbsp;</span>
            	<span class="stamp">&nbsp;</span>
            	<span class="stamp lockstamp">&nbsp;</span>
            	<span class="stamp lockstamp">&nbsp;</span>
            	<span class="stamp lockstamp">&nbsp;</span>
            	<span class="stamp lockstamp">&nbsp;</span>
            </div>
        </div><!-- END .popup-entry -->
    </div><!-- END .popupContainer -->
</div><!-- END .popup -->
<div id="bg-popup" style="display:block;"></div><?php }} ?>
