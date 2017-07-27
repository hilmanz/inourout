<?php /* Smarty version Smarty-3.1.15, created on 2014-01-03 14:32:48
         compiled from "../templates/application/web//apps/clues.html" */ ?>
<?php /*%%SmartyHeaderCode:161428473552a98333e4f389-43322892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '679ec5c7c35765bd415f815ec0280d3a6ac7172a' => 
    array (
      0 => '../templates/application/web//apps/clues.html',
      1 => 1388733319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161428473552a98333e4f389-43322892',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a98333eb22a2_48449881',
  'variables' => 
  array (
    'basedomain' => 0,
    'clue' => 0,
    'keys' => 0,
    'values' => 0,
    'val' => 0,
    'key' => 0,
    'value' => 0,
    'city' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a98333eb22a2_48449881')) {function content_52a98333eb22a2_48449881($_smarty_tpl) {?><div id="updatePage" class="container">
	<div class="entry-container center">
    	<div id="navClues">
        	<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
articles">UPDATES</a>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
clues" class="current">CLUES</a>  
        </div>
        <div class="rowText">
            <div id="tabs">
              <div id="cluesNavigation">
                  <ul id="tabNav">
                    <?php  $_smarty_tpl->tpl_vars['values'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['values']->_loop = false;
 $_smarty_tpl->tpl_vars['keys'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['clue']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['values']->key => $_smarty_tpl->tpl_vars['values']->value) {
$_smarty_tpl->tpl_vars['values']->_loop = true;
 $_smarty_tpl->tpl_vars['keys']->value = $_smarty_tpl->tpl_vars['values']->key;
?>
					<li><a href="<?php if ($_smarty_tpl->tpl_vars['keys']->value==0) {?>#clues1<?php } else { ?>#clues2<?php }?>">
                            <div class="badges badgesYellowCab">
									<img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
public_assets/event/<?php echo $_smarty_tpl->tpl_vars['values']->value['img'];?>
" />
							</div>
							<h4><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
</h4>
                        </a>
                    </li>
					<?php } ?>
					
                  </ul>
              </div><!-- END #cluesNavigation -->
              <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['clue']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
			  <div id="<?php if ($_smarty_tpl->tpl_vars['key']->value==0) {?>clues1<?php } else { ?>clues2<?php }?>">
              		<div class="clues-head">
                        <h3><?php echo $_smarty_tpl->tpl_vars['value']->value['content'];?>
</h3>
                        <form class="formSelect">
                        	<select class="styled cluesCity" eventid="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
                            	<?php if ($_smarty_tpl->tpl_vars['city']->value) {?>
									<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['city'];?>
</option>
									<?php } ?>
								<?php } else { ?>
									<option>City Not Available</option>
                            	<?php }?>
                            </select>
                        </form>
                    </div><!-- END .clues-head -->
                    <div class="clues-entry" id="maps_<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
                         <div class="jcarousel-wrapper">
                            <div class="jcarousel">
                                <ul>
                                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['value']->value['maps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
									<li>
                       					 <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
public_assets/event/<?php echo $_smarty_tpl->tpl_vars['val']->value['img'];?>
" />
                                    </li>
                                    <?php } ?>
									
                                </ul>
                            </div>
                            <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                            <a href="#" class="jcarousel-control-next">&rsaquo;</a>
                        </div>
                    </div><!-- END .clues-entry -->
              </div><!-- END #clues1 -->
			  <?php } ?>
              
            </div><!-- END #tabs -->
        </div><!-- END .rowText -->
    </div><!-- END .entry-container -->
</div><!-- END .container --><?php }} ?>
