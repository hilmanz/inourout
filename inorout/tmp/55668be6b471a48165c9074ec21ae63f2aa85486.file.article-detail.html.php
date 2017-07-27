<?php /* Smarty version Smarty-3.1.15, created on 2014-01-06 14:38:34
         compiled from "../templates/application/web/apps/article-detail.html" */ ?>
<?php /*%%SmartyHeaderCode:32078288152b2a7053971f4-18785891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55668be6b471a48165c9074ec21ae63f2aa85486' => 
    array (
      0 => '../templates/application/web/apps/article-detail.html',
      1 => 1388978684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32078288152b2a7053971f4-18785891',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b2a7053f7e46_68357974',
  'variables' => 
  array (
    'basedomain' => 0,
    'getEventByID' => 0,
    'val' => 0,
    'otherEvent' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b2a7053f7e46_68357974')) {function content_52b2a7053f7e46_68357974($_smarty_tpl) {?><div id="updatePage" class="container">
	<div class="entry-container">
    	<div id="navClues" class="center">
        	<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
articles" class="current">UPDATES</a>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
clues">CLUES</a>  
        </div>
        <div class="post-container">
            <div class="post-content">
            	<div id="the-content">
                	<h3 class="labelPost">upcoming events:</h3>
                	<h1 class="bigTItle"><?php echo $_smarty_tpl->tpl_vars['getEventByID']->value['title'];?>
</h1>
                    <div class="post-venue">
                        <div class="fl">
                            <span class="iconArrowGrey">&nbsp;</span>
                            <h4><span class="red">when:</span><br />
                                <span class="date-event"><?php echo $_smarty_tpl->tpl_vars['getEventByID']->value['changeDate'];?>
</span></h4>
                        </div><!-- END .fl -->
                        <div class="fl">
                            <span class="iconArrowGrey">&nbsp;</span>
                            <h4><span class="red">where:</span><br />
                                <span class="date-event"><?php echo $_smarty_tpl->tpl_vars['getEventByID']->value['city'];?>
</span></h4>
                        </div><!-- END .fl -->
                    </div><!-- END .post-venue -->
                	<a href="#" class="detailimg">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
public_assets/event/<?php echo $_smarty_tpl->tpl_vars['getEventByID']->value['img'];?>
" />
                    </a>
                    <div class="entry-detail">
                    	<p><?php echo $_smarty_tpl->tpl_vars['getEventByID']->value['content'];?>
</p>
                    </div><!-- END .entry-detail -->
                    <div id="galeryPhotos">
                    	<h3>event's photos:</h3>
						<?php if ($_smarty_tpl->tpl_vars['getEventByID']->value['gallery']) {?>
						<div class="galeryPhotos">
                        	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['getEventByID']->value['gallery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
							<a href="#"> <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
public_assets/event/<?php echo $_smarty_tpl->tpl_vars['val']->value['img'];?>
" /></a>
							<?php } ?>
					
                        </div>
						<?php }?>
					</div>
                </div><!-- END #the-content -->
                <div id="sidebar">
                	<h3 class="black">More Events</h3>
                    <div class="row-post">
                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['otherEvent']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
						<div class="post">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
articles/detail/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" class="thumb">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
public_assets/event/<?php echo $_smarty_tpl->tpl_vars['val']->value['img'];?>
" />
                            </a>
                            <div class="entry-post">
                                <span class="date"><?php echo $_smarty_tpl->tpl_vars['val']->value['changeDate'];?>
</span>
                                <p><?php echo $_smarty_tpl->tpl_vars['val']->value['brief'];?>
</p>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
articles/detail/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" class="more">more &raquo;</a>
                            </div><!-- END .entry-post -->
                        </div><!-- END .post -->
						<?php } ?>
						
                    </div><!-- END .row-post -->
                </div><!-- END #sidebar -->
            </div><!-- END .post-content -->
        </div><!-- END .post-container -->
    </div><!-- END .entry-container -->
</div><!-- END .container --><?php }} ?>
