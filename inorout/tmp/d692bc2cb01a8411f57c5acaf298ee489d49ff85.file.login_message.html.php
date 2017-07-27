<?php /* Smarty version Smarty-3.1.15, created on 2013-12-16 16:06:12
         compiled from "../templates/application/web//login_message.html" */ ?>
<?php /*%%SmartyHeaderCode:97450595652a93a8ed1e7f9-54726704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd692bc2cb01a8411f57c5acaf298ee489d49ff85' => 
    array (
      0 => '../templates/application/web//login_message.html',
      1 => 1387184710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97450595652a93a8ed1e7f9-54726704',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a93a8edfbde5_62599692',
  'variables' => 
  array (
    'registerconfirm' => 0,
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a93a8edfbde5_62599692')) {function content_52a93a8edfbde5_62599692($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['registerconfirm']->value) {?>
<script>
	var registerconfirm = "<?php echo $_smarty_tpl->tpl_vars['registerconfirm']->value;?>
";
	
	
	
	$(document).ready(function(){
	
			$("#footer").attr('style','display:none');
			$("#main-menu-wrapper").attr('style','display:none');
				$(".rowBtn").attr('style','display:none');
				$("#hw").attr('style','display:none');

				
				$(".trigun").trigger("click");
		
				$(".msgpopupglobal").html(registerconfirm);		
	});
	
	$(document).on('click','#fancybox-overlay, #fancybox-close',function(){
		window.location.href = basedomain+'login';
	});			
	
</script>
<?php } else { ?>

<script>
	
	
	
	
	$(document).ready(function(){
		
				$("#footer").attr('style','display:none');
				$(".rowBtn").attr('style','display:none');
				$("#hw").attr('style','display:none');
				$("#main-menu-wrapper").attr('style','display:none');
	});
	
	
	
</script>
<?php }?>
<div style="min-height:680px;">
<div  class="loaders" style="position:absolute; left:43%; top:30%;" >
<img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/loader.gif">
</div>
</div><?php }} ?>
