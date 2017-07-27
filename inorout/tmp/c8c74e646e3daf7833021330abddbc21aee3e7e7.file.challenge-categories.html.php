<?php /* Smarty version Smarty-3.1.15, created on 2014-01-06 13:52:49
         compiled from "../templates/application/web//apps/challenge-categories.html" */ ?>
<?php /*%%SmartyHeaderCode:93323595052b411da3a1a13-89076863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8c74e646e3daf7833021330abddbc21aee3e7e7' => 
    array (
      0 => '../templates/application/web//apps/challenge-categories.html',
      1 => 1388991166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93323595052b411da3a1a13-89076863',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b411da400cf9_04647001',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b411da400cf9_04647001')) {function content_52b411da400cf9_04647001($_smarty_tpl) {?><div id="challengePage" class="container">
	<div class="entry-container">
        <div class="post-container">
        	<div class="post-header">
				<img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/content/challenge-oftheweek.png" />
            </div><!-- END .post-header -->
            <div class="post-content">
                <div class="whitebox">
                    <h3>Tunjukkan foto seru kamu sesuai tema bulan ini </h3>
                    <h2>& MENANGKAN BADGE UNIK UNTUK KOLEKSIMU!</h2>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
challenge/rules" class="greybtn">baca aturan main</a>
                </div>
            	<div class="hot-content">
                	<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
challenge/finalist" class="bigthumb">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/content/tokyo-banner.jpg" />
                    </a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
challenge/winner" class="showwinner">SHOW WINNER</a>
                </div><!-- END .hot-content -->
                
            	<a href="#popup-upload-photo" class="uploadphoto showPopup">&nbsp;</a>
                <div id="galleryphoto">
                	<h3>YOUR UPLOADED PHOTOS</h3>
                    <div class="galleryphoto">
                        <div id="photo-list">
                             <div class="jcarousel-wrapper">
                                <div class="jcarousel">
                                    <ul>
                                        <li>
                                            <div class="photoThumb">
                                             <a class="img-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/content/photos/200x200.jpg"></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="photoThumb">
                                             <a class="img-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/content/photos/200x200.jpg"></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="photoThumb">
                                             <a class="img-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/content/photos/200x200.jpg"></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="photoThumb">
                                             <a class="img-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/content/photos/200x200.jpg"></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="photoThumb">
                                             <a class="img-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/content/photos/200x200.jpg"></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="photoThumb">
                                             <a class="img-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/content/photos/200x200.jpg"></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="photoThumb">
                                             <a class="img-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/content/photos/200x200.jpg"></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="photoThumb">
                                             <a class="img-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/content/photos/200x200.jpg"></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="photoThumb">
                                             <a class="img-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/content/photos/200x200.jpg"></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="photoThumb">
                                             <a class="img-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/content/photos/200x200.jpg"></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                                <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                            </div>
                        </div><!-- END #photo-list -->
                    </div>
                </div>
            </div><!-- END .post-content -->
        </div><!-- END .post-container -->
    </div>
</div><!-- END .container -->
<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-upload-photo.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
