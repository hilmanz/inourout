<?php /* Smarty version Smarty-3.1.15, created on 2013-12-20 17:14:38
         compiled from "../templates/application/web/widgets/popup-upload-photo.html" */ ?>
<?php /*%%SmartyHeaderCode:197831387352b4186f43c044-35864698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9b060e4e79d2b9f8aa7fd8cedf6139f8b45d1be' => 
    array (
      0 => '../templates/application/web/widgets/popup-upload-photo.html',
      1 => 1387534477,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197831387352b4186f43c044-35864698',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b4186f44e404_73450434',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b4186f44e404_73450434')) {function content_52b4186f44e404_73450434($_smarty_tpl) {?><div class="popup" id="popup-upload-photo">
    <div class="popupContainer">
		<a class="closePopup" href="#">[CLOSE X]</a>
    	<div class="popup-head">
        	<h2 class="bigTItle">UPLOAD PHOTO</h2>
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
