<?php /* Smarty version Smarty-3.1.15, created on 2014-02-13 15:20:07
         compiled from "../templates/application/web//meta.html" */ ?>
<?php /*%%SmartyHeaderCode:108615219252a6be2dcdafe8-55533917%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd7b0bea0d233a15e8683ffadf25157f42dc25b7' => 
    array (
      0 => '../templates/application/web//meta.html',
      1 => 1391762228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108615219252a6be2dcdafe8-55533917',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a6be2ddc2ad0_24920226',
  'variables' => 
  array (
    'basedomain' => 0,
    'pages' => 0,
    'locale' => 0,
    'lifetime' => 0,
    'isLogin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a6be2ddc2ad0_24920226')) {function content_52a6be2ddc2ad0_24920226($_smarty_tpl) {?><!--Meta Tags-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--Title-->
<title>Never Say Maybe</title>
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
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/css/imgareaselect-animated.css" type="text/css"  media="all" />
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
assets/js/jquery.easing.1.3.min.js"></script>
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
assets/js/jquery.counterchar.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/jquery.lwtCountdown-1.0.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/inourout.js"></script>
<script  type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/jquery.form.js"></script>
<script  type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/jquery.imgareaselect.min.js"></script>
<?php if ($_smarty_tpl->tpl_vars['pages']->value=='howto') {?>  
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/jquery.flexslider-min.js"></script>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/css/flexslider.css" type="text/css"  media="all" />

<script>
// Slider
$(window).load(function(){
  $('.slider').flexslider({
    animation: "slide",
	controlNav: false
  });

});
</script>

<?php }?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/carousel_gallery.js"></script>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/css/carousel.css" type="text/css"  media="all" />
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
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/underscore-min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/backbone-min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/php.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/modules/globals.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/modules/kipagination.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/modules/notifications.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/modules/events.js"></script><?php }} ?>
