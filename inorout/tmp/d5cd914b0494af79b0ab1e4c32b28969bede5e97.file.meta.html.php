<?php /* Smarty version Smarty-3.1.15, created on 2013-12-18 14:48:07
         compiled from "../templates/application/mobile//meta.html" */ ?>
<?php /*%%SmartyHeaderCode:210361641552b15337028000-82966603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5cd914b0494af79b0ab1e4c32b28969bede5e97' => 
    array (
      0 => '../templates/application/mobile//meta.html',
      1 => 1387352506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210361641552b15337028000-82966603',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'basedomain' => 0,
    'pages' => 0,
    'locale' => 0,
    'lifetime' => 0,
    'isLogin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b153370edcb7_87331483',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b153370edcb7_87331483')) {function content_52b153370edcb7_87331483($_smarty_tpl) {?><!--Meta Tags-->
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--Title-->
<title>MARLBORO</title>
<!--Stylesheets-->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/css/superfish.css" type="text/css"  media="all" />
<link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/css/jquery.jscrollpane.css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/css/inorout.css" type="text/css"  media="all" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/css/responsive.css" type="text/css"  media="all" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/css/inorout-ie.css" type="text/css"  media="all" />
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/css/ie.css" />
<![endif]-->
<!--Favicon-->
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/favicon.png" type="image/x-icon" />
<!--JavaScript-->
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/hoverIntent.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/customform.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/detectbrowser.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/jquery.lwtCountdown-1.0.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/inourout.js"></script>
<script  type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/jquery.form.js"></script>
<?php if ($_smarty_tpl->tpl_vars['pages']->value=='howto') {?>  
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/jquery.flexslider-min.js"></script>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/css/flexslider.css" type="text/css"  media="all" />
<?php } elseif ($_smarty_tpl->tpl_vars['pages']->value=='profile') {?>  
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/carousel_gallery.js"></script>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/css/carousel.css" type="text/css"  media="all" />
<?php }?>
<script>
	var basedomain = "<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
" ;
	var pages = "<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
" ;
	var locale = <?php echo json_encode($_smarty_tpl->tpl_vars['locale']->value);?>
 ;
	var lifetime = "<?php echo $_smarty_tpl->tpl_vars['lifetime']->value;?>
";
	var isLogin = "<?php echo $_smarty_tpl->tpl_vars['isLogin']->value;?>
";	

</script>
<?php }} ?>
