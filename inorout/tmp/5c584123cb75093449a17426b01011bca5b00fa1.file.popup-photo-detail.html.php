<?php /* Smarty version Smarty-3.1.15, created on 2014-01-06 14:02:07
         compiled from "../templates/application/web/widgets/popup-photo-detail.html" */ ?>
<?php /*%%SmartyHeaderCode:208678077652b7ba1d79f4a4-99433169%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c584123cb75093449a17426b01011bca5b00fa1' => 
    array (
      0 => '../templates/application/web/widgets/popup-photo-detail.html',
      1 => 1388991721,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208678077652b7ba1d79f4a4-99433169',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b7ba1d7a7225_57042640',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b7ba1d7a7225_57042640')) {function content_52b7ba1d7a7225_57042640($_smarty_tpl) {?><div class="popup" id="popup-photo-detail">
    <div class="popupContainer">
		<a class="closePopup" href="#">[CLOSE X]</a>
    	<div class="popup-entry">
            <div class="photoDetail">
                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/content/photos/original.jpg">
            </div><!-- end #editPhotoBox -->
            <div class="photoDesc">
        		<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
profile" class="small-thumb"><img src="https://pbs.twimg.com/profile_images/378800000588407093/3946bdda2cc6263a9b13979dc1b7f5d6_bigger.jpeg" /></a>
                <div class="photo-author">
                	<h4>PHOTO BY</h4>
					<h3>Dina Alviani</h3>
                </div>
				<a class="greenbtn fr" href="#">VOTE</a>
            </div>
        </div><!-- END .popup-entry -->
        <div class="direction-nav">
            <a href="#" class="prevPhoto">&nbsp;</a>
            <a href="#" class="nextPhoto">&nbsp;</a>
        </div>
    </div><!-- END .popupContainer -->
</div><!-- END .popup --><?php }} ?>
