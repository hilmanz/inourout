<?php /* Smarty version 2.6.13, created on 2013-12-10 13:50:59
         compiled from application/web//login_message.html */ ?>
<?php if ($this->_tpl_vars['registerconfirm']): ?>
<script>
	var registerconfirm = "<?php echo $this->_tpl_vars['registerconfirm']; ?>
";
	<?php echo '
	
	
	$(document).ready(function(){
	
			$("#footer").attr(\'style\',\'display:none\');
			$("#main-menu-wrapper").attr(\'style\',\'display:none\');
				$(".rowBtn").attr(\'style\',\'display:none\');
				$("#hw").attr(\'style\',\'display:none\');

				
				$(".trigun").trigger("click");
		
				$(".msgpopupglobal").html(registerconfirm);		
	});
	
	$(document).on(\'click\',\'#fancybox-overlay, #fancybox-close\',function(){
		window.location.href = basedomain+\'login\';
	});			
	'; ?>

</script>
<?php else: ?>

<script>
	
	<?php echo '
	
	
	$(document).ready(function(){
		
				$("#footer").attr(\'style\',\'display:none\');
				$(".rowBtn").attr(\'style\',\'display:none\');
				$("#hw").attr(\'style\',\'display:none\');
				$("#main-menu-wrapper").attr(\'style\',\'display:none\');
	});
	
	
	'; ?>

</script>
<?php endif; ?>
<div  class="loaders" style="position:absolute; left:43%; top:30%;" >
<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/loader.gif">
</div>