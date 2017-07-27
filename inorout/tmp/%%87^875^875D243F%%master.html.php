<?php /* Smarty version 2.6.13, created on 2013-12-10 13:50:59
         compiled from application/web//master.html */ ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html dir="ltr" lang="en-US" > 
<!--<![endif]--><head>

<?php echo $this->_tpl_vars['meta']; ?>

</head>
<body class="the-<?php echo $this->_tpl_vars['pages']; ?>
 the-<?php echo $this->_tpl_vars['acts']; ?>
" id="marlboro-<?php echo $this->_tpl_vars['pages'];  echo $this->_tpl_vars['acts']; ?>
">
    <div id="mainBody">
        <div id="body"  <?php if ($this->_tpl_vars['pages'] != 'howto'): ?>class="universal"<?php endif; ?>>
                <?php if ($this->_tpl_vars['pages'] != 'howto'): ?>  
                    <?php echo $this->_tpl_vars['header']; ?>

                <?php endif; ?>
				<?php echo $this->_tpl_vars['mainContent']; ?>

        
        </div><!-- END .wrapper -->
        <?php echo $this->_tpl_vars['footer']; ?>

    </div><!-- END #mainBody -->
    <div id="bg-popup"></div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "application/web/widgets/popup-badges.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>