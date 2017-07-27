<?php /* Smarty version Smarty-3.1.15, created on 2013-12-18 14:48:07
         compiled from "../templates/application/mobile//master.html" */ ?>
<?php /*%%SmartyHeaderCode:1356911352b1533719a921-42193287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dea90116ee2a54f83f7bfdf280b79406dcc41294' => 
    array (
      0 => '../templates/application/mobile//master.html',
      1 => 1387352506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1356911352b1533719a921-42193287',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta' => 0,
    'pages' => 0,
    'acts' => 0,
    'header' => 0,
    'mainContent' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b1533721fd82_15433336',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b1533721fd82_15433336')) {function content_52b1533721fd82_15433336($_smarty_tpl) {?><!DOCTYPE html>
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

        
        </div><!-- END .wrapper -->
        <?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

    </div><!-- END #mainBody -->
    <div id="bg-popup"></div>
	<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-global.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html><?php }} ?>
