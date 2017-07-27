<?php /* Smarty version Smarty-3.1.15, created on 2014-02-13 15:20:07
         compiled from "../templates/application/web//header.html" */ ?>
<?php /*%%SmartyHeaderCode:92451991152a6be2ddc6fc2-73793053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98971635ac1d3cfe91db7beec776b0afbe281c90' => 
    array (
      0 => '../templates/application/web//header.html',
      1 => 1391763382,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92451991152a6be2ddc6fc2-73793053',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a6be2de2ab83_63416382',
  'variables' => 
  array (
    'user' => 0,
    'basedomain' => 0,
    'pages' => 0,
    'unverified' => 0,
    'thisuser' => 0,
    'unread' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a6be2de2ab83_63416382')) {function content_52a6be2de2ab83_63416382($_smarty_tpl) {?><div id="header">
	<div class="universal">
          <?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
        <div id="logoBox">
       	 <a id="logo" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
home">&nbsp;</a>
        </div>
        <div id="main-menu-wrapper" class="clearfix active-<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
">
            <ul id="main-menu" class="mainmenu">
                <li class="navabout">
                	<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
about/whatis">About In Or Out</a>
                    <ul style="top:78px;">
                    	
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
about/whatis">What is it?</a></li>
                    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
about/howto">How To</a></li>
                    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
about/prizes">Prizes</a></li>
                    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
about/rules">Rules</a></li>
                    </ul>
                </li>
                <li class="navuandc"><a <?php if ($_smarty_tpl->tpl_vars['unverified']->value) {?> href="#popup-unverified" class="showPopup" <?php } else { ?>  href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
clues" <?php }?>>Update And Clues</a></li>
                <li class="navbadge">
                    <a <?php if ($_smarty_tpl->tpl_vars['unverified']->value) {?> href="#popup-unverified" class="showPopup" <?php } else { ?>  href="badges/auction" <?php }?>>The Badges</a>
                    <ul>
                    	<li><a <?php if ($_smarty_tpl->tpl_vars['unverified']->value) {?> href="#popup-unverified" class="showPopup" <?php } else { ?>  href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
badges/auction" <?php }?>>Auction</a></li>
                    	<li><a <?php if ($_smarty_tpl->tpl_vars['unverified']->value) {?> href="#popup-unverified" class="showPopup" <?php } else { ?>  href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
badges/trading" <?php }?>>Trading</a></li>
                    	<li><a <?php if ($_smarty_tpl->tpl_vars['unverified']->value) {?> href="#popup-unverified" class="showPopup" <?php } else { ?>  href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
badges/collectibles" <?php }?>>Collectibles</a></li>
                    </ul>
                </li>
                <li class="navgame">
                    <a  <?php if ($_smarty_tpl->tpl_vars['unverified']->value) {?> href="#popup-unverified" class="showPopup" <?php } else { ?> href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
games" <?php }?>>The Game</a>
                    <ul>
                    	<li><a <?php if ($_smarty_tpl->tpl_vars['unverified']->value) {?> href="#popup-unverified" class="showPopup" <?php } else { ?> href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
games" <?php }?>>Games</a></li>
                    	<li><a <?php if ($_smarty_tpl->tpl_vars['unverified']->value) {?> href="#popup-unverified" class="showPopup" <?php } else { ?> href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
challenge" <?php }?>>CHALLENGE OF THE WEEK</a></li>
                    </ul>
                </li>  
                <li class="naventercode"><a <?php if ($_smarty_tpl->tpl_vars['unverified']->value) {?> href="#popup-unverified" class="showPopup" <?php } else { ?>  href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
entercode" <?php }?>>Enter Codes</a></li>    
            </ul>
        </div><!-- END .main-menu-wrapper -->
        <div id="profileBox">
        	<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
profile" class="small-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['thisuser']->value['profile']['image_full_path'];?>
" /></a>
            <a class="username" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
profile">Hi, <?php echo $_smarty_tpl->tpl_vars['thisuser']->value['name'];?>
</a>
         	<a class="viewporifle" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
profile">View Profile</a>
            <?php if ($_smarty_tpl->tpl_vars['unread']->value) {?>
            <a href="#popup-notification" onclick="load_notification_list();" class="notif showPopup">you have <?php echo $_smarty_tpl->tpl_vars['unread']->value['total'];?>
 notifications</a>
            <?php }?>
         	<a class="logout" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
logout.php">Log Out</a>
        </div>
        <?php } else { ?>
        
        <?php }?><!-- END #header -->
    </div>
</div><?php }} ?>
