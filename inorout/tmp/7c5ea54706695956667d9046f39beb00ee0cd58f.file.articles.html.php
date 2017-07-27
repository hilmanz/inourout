<?php /* Smarty version Smarty-3.1.15, created on 2013-12-30 15:42:44
         compiled from "../templates/application/web//apps/articles.html" */ ?>
<?php /*%%SmartyHeaderCode:52458242752b26c115ef338-83592817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c5ea54706695956667d9046f39beb00ee0cd58f' => 
    array (
      0 => '../templates/application/web//apps/articles.html',
      1 => 1388391869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52458242752b26c115ef338-83592817',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b26c1163b170_68501981',
  'variables' => 
  array (
    'basedomain' => 0,
    'currentEvent' => 0,
    'pastEvent' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b26c1163b170_68501981')) {function content_52b26c1163b170_68501981($_smarty_tpl) {?><div id="updatePage" class="container">
	<div class="entry-container">
    	<div id="navClues" class="center">
        	<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
articles" class="current">UPDATES</a>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
clues">CLUES</a>  
        </div>
        <div class="post-container">
        	<div class="post-header">
				<img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/content/upcoming_events.png" />
            </div><!-- END .post-header -->
            <div class="post-content">
            	<div class="hot-content">
                	<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
articles/detail" class="bigthumb">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/content/article/thumb_910x260.jpg" />
                    </a>
                    <div class="hot-post">
						
                    	<div class="post-l">
                    	<h3 class="big-title"><?php echo $_smarty_tpl->tpl_vars['currentEvent']->value['title'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['currentEvent']->value['brief'];?>
</p>
						</div><!-- END .post-l -->
						
                        <div class="post-venue">
                        	<div class="fl">
                				<span class="iconArrowGrey">&nbsp;</span>
                            	<h4><span class="red">when:</span><br />
									<span class="date-event"><?php echo $_smarty_tpl->tpl_vars['currentEvent']->value['changeDate'];?>
</span></h4>
                            </div><!-- END .fl -->
                        	<div class="fl">
                				<span class="iconArrowGrey">&nbsp;</span>
                            	<h4><span class="red">where:</span><br />
									<span class="date-event"><?php echo $_smarty_tpl->tpl_vars['currentEvent']->value['city'];?>
</span></h4>
                            </div><!-- END .fl -->
                            <a class="orangebtn" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
articles/detail/<?php echo $_smarty_tpl->tpl_vars['currentEvent']->value['id'];?>
">VIEW EVENT &raquo;</a>
                        </div><!-- END .post-venue -->
						
                    </div><!-- END .hot-post -->
                </div><!-- END .hot-content -->
            </div><!-- END .post-content -->
        	<div class="post-header">
				<img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/content/past_events.png" />
            </div><!-- END .post-header -->
            <div class="post-content">
            	<div class="row-post">
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pastEvent']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
" width="280px" height="200px"/>
                        </a>
                        <div class="entry-post">
                            <span class="date"><?php echo $_smarty_tpl->tpl_vars['val']->value['changeDate'];?>
</span>
                            <p><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
</p>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
articles/detail/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" class="more">more &raquo;</a>
                        </div><!-- END .entry-post -->
                    </div><!-- END .post -->
					<?php } ?>
					
                </div><!-- END .row-post -->
            	
            </div><!-- END .post-content -->
        </div><!-- END .post-container -->
    </div><!-- END .entry-container -->
</div><!-- END .container --><?php }} ?>
