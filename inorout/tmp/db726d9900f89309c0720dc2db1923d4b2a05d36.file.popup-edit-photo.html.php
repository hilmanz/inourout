<?php /* Smarty version Smarty-3.1.15, created on 2013-12-20 14:37:08
         compiled from "../templates/application/web/widgets/popup-edit-photo.html" */ ?>
<?php /*%%SmartyHeaderCode:164097008552b3c6aaf13581-30907350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db726d9900f89309c0720dc2db1923d4b2a05d36' => 
    array (
      0 => '../templates/application/web/widgets/popup-edit-photo.html',
      1 => 1387525026,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164097008552b3c6aaf13581-30907350',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b3c6aaf1b152_35240894',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b3c6aaf1b152_35240894')) {function content_52b3c6aaf1b152_35240894($_smarty_tpl) {?><div class="popup" id="popup-edit-photo">
    <div class="popupContainer">
		<a class="closePopup" href="#">[CLOSE X]</a>
    	<div class="popup-head">
        	<h2 class="bigTItle">Edit Photo</h2>
        </div><!-- END .popup-head -->
    	<div class="popup-entry">
            <div id="editPhotoBox">
                <form class="uploadForm" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
profile/editPhoto" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="editPhoto" value="1">
                        <div class="fakeUpload">
                            <input type="text" class="uploadpath" />
                            <label class="orangebtn fakebtn">
                                upload
                                <span>
                                    <input type="file" class="uploadfile"  name="profile_photo" />
                                </span>
                            </label>
                        </div><!-- END .fakeUpload -->
                        <div class="previewBox">
                        	<img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/blank_image.png" />
                            <div class="loader"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/loader.gif" /></div>
                        </div><!-- END .previewBox -->
                    <input type="submit" name="submit" value="SAVE" class="orangebtn savebtn">
                </form>
            </div><!-- end #editPhotoBox -->
        </div><!-- END .popup-entry -->
    </div><!-- END .popupContainer -->
</div><!-- END .popup --><?php }} ?>
