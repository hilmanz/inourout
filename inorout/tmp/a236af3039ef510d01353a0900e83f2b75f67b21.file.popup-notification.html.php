<?php /* Smarty version Smarty-3.1.15, created on 2014-01-03 14:24:16
         compiled from "../templates/application/web/widgets/popup-notification.html" */ ?>
<?php /*%%SmartyHeaderCode:30741054652b3bba29e8584-24536918%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a236af3039ef510d01353a0900e83f2b75f67b21' => 
    array (
      0 => '../templates/application/web/widgets/popup-notification.html',
      1 => 1388029117,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30741054652b3bba29e8584-24536918',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b3bba29f4062_49530292',
  'variables' => 
  array (
    'notification_detail' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b3bba29f4062_49530292')) {function content_52b3bba29f4062_49530292($_smarty_tpl) {?><div class="popup" id="popup-notification">
    <div class="popupContainer">
		<a class="closePopup" href="#">[CLOSE X]</a>
    	<div class="popup-head">
        	<h2 class="bigTItle">NOTIFICATION</h2>
        </div><!-- END .popup-head -->
    	<div class="popup-entry">
            <div id="notifList">
                
                
            </div><!-- end #notifList -->
        </div><!-- END .popup-entry -->
    </div><!-- END .popupContainer -->
</div><!-- END .popup -->

<?php echo $_smarty_tpl->tpl_vars['notification_detail']->value;?>
<?php }} ?>
