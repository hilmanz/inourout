<?php /* Smarty version Smarty-3.1.15, created on 2014-02-13 15:20:08
         compiled from "../templates/application/web//master.html" */ ?>
<?php /*%%SmartyHeaderCode:55639978052a6be2de4f746-47563656%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6155dbb22644dd0160637983f4c8cb1cf7b40fd' => 
    array (
      0 => '../templates/application/web//master.html',
      1 => 1391762198,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55639978052a6be2de4f746-47563656',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a6be2def4aa7_06441740',
  'variables' => 
  array (
    'meta' => 0,
    'pages' => 0,
    'acts' => 0,
    'header' => 0,
    'mainContent' => 0,
    'notification_list' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a6be2def4aa7_06441740')) {function content_52a6be2def4aa7_06441740($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html dir="ltr" lang="en-US" > 
<!--<![endif]--><head>

<?php echo $_smarty_tpl->tpl_vars['meta']->value;?>

</head>
<body class="the-<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
 the-<?php echo $_smarty_tpl->tpl_vars['acts']->value;?>
" id="marlboro-<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
<?php echo $_smarty_tpl->tpl_vars['acts']->value;?>
">
    <div id="mainBody">
        <div id="body"  <?php if ($_smarty_tpl->tpl_vars['pages']->value!='howto') {?>class="universal"<?php }?>>
                <?php if ($_smarty_tpl->tpl_vars['pages']->value!='howto') {?>  
                    <?php echo $_smarty_tpl->tpl_vars['header']->value;?>

                <?php }?>
				<?php echo $_smarty_tpl->tpl_vars['mainContent']->value;?>

                <?php echo $_smarty_tpl->tpl_vars['notification_list']->value;?>

                <?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-notification-detail.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div><!-- END .wrapper -->
        <?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

    </div><!-- END #mainBody -->
    <div id="bg-popup"></div>
	<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-global.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-unverified.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	 
</body>
</html><?php }} ?>
