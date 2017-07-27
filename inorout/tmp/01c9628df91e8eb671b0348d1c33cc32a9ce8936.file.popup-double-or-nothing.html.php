<?php /* Smarty version Smarty-3.1.15, created on 2014-01-27 16:43:12
         compiled from "../templates/application/web/widgets/popup-double-or-nothing.html" */ ?>
<?php /*%%SmartyHeaderCode:167837920352e6041b432e10-04502316%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01c9628df91e8eb671b0348d1c33cc32a9ce8936' => 
    array (
      0 => '../templates/application/web/widgets/popup-double-or-nothing.html',
      1 => 1390815790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167837920352e6041b432e10-04502316',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52e6041b48ea80_90915142',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e6041b48ea80_90915142')) {function content_52e6041b48ea80_90915142($_smarty_tpl) {?><div class="popup" id="popup-double-or-nothing" style="display:block;">
    <div class="popupContainer center">
		<a class="closePopup" href="#">[CLOSE X]</a>
    	<div class="popup-head">
        	<h2 class="bigTItle"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/content/doubleOrNothing.png" /></h2>
            <h3>Ikuti tantangan ini untuk mendapatkan DOBEL BADGE!</h3>
        </div><!-- END .popup-head -->
    	<div class="popup-entry">
            <h1>ARE YOU</h1>
            <a href="#" class="in-btn">&nbsp;</a>
            <span class="or-txt">&nbsp;</span>
            <a href="#" class="out-btn">&nbsp;</a>
        </div><!-- END .popup-entry -->
    </div><!-- END .popupContainer -->
</div><!-- END .popup -->
<div id="bg-popup" style="display:block;"></div><?php }} ?>
