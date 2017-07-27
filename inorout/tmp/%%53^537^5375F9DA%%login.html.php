<?php /* Smarty version 2.6.13, created on 2013-12-10 13:41:10
         compiled from application/web//login.html */ ?>
<?php echo $this->_tpl_vars['login_form']; ?>

</div>
<?php echo $this->_tpl_vars['register_survey']; ?>


 <?php if ($this->_tpl_vars['wronglogin']): ?>
	<?php echo '
		<script>
			$(document).ready(function(){
				$(".trigun").trigger("click");
				$(".msgpopupglobal").html(locale.meailpassnotrecon);
				});
		</script>
	'; ?>

 <?php endif; ?>
 
 <?php if ($this->_tpl_vars['musttick']): ?>
	<?php echo '
		<script>
			$(document).ready(function(){
				$(".trigun").trigger("click");
				$(".msgpopupglobal").html(locale.musttick);
				});
		</script>
	'; ?>

 <?php endif; ?>