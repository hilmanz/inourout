<?php /* Smarty version Smarty-3.1.15, created on 2013-12-20 12:02:04
         compiled from "../templates/application/web//apps/aspiration.html" */ ?>
<?php /*%%SmartyHeaderCode:196754444452b2c5e2414100-06132891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4cb8f1675165f4d59663102b15b79d22225b5edf' => 
    array (
      0 => '../templates/application/web//apps/aspiration.html',
      1 => 1387515712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196754444452b2c5e2414100-06132891',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b2c5e24b52c5_73429434',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b2c5e24b52c5_73429434')) {function content_52b2c5e24b52c5_73429434($_smarty_tpl) {?><div class="popup" id="popup-aspiration" style="display:block;">
    <div class="popupContainer">
		<a class="closePopup" href="#">[CLOSE X]</a>
    	<div class="popup-head">
        	<h2 class="red dig">Welcome,<br />
            <span>before we get started,  lorem ipsum dolor sit amet. </span></h2>
        </div>
    	<div class="popup-entry">
            <form action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
aspiration" method="post">
                <textarea name="aspiration" class="aspiration-message" placeholder="Type your aspiration here"></textarea>
                <input type="hidden" name="asp_post" value="1" />
                <input type="submit" name="submit" value="SUBMIT &raquo;" class="orangebtn fr" />
				<span class="countdown-char"></span>
            </form>
        </div>
    </div><!-- END .popupContainer -->
</div><!-- END .popup -->
<div id="bg-popup" style="display:block;"></div><?php }} ?>
