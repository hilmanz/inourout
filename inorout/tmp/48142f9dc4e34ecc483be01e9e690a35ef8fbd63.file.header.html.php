<?php /* Smarty version Smarty-3.1.15, created on 2013-12-18 14:48:07
         compiled from "../templates/application/mobile//header.html" */ ?>
<?php /*%%SmartyHeaderCode:21403056152b153370f2366-12606193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48142f9dc4e34ecc483be01e9e690a35ef8fbd63' => 
    array (
      0 => '../templates/application/mobile//header.html',
      1 => 1387352506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21403056152b153370f2366-12606193',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'basedomain' => 0,
    'pages' => 0,
    'thisuser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b153371767f6_22955369',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b153371767f6_22955369')) {function content_52b153371767f6_22955369($_smarty_tpl) {?><div id="header">
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
howto">How To Landing</a></li>
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
                <li class="navuandc"><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
clues">Update And Clues</a></li>
                <li class="navbadge">
                    <a href="badges/auction">The Badges</a>
                    <ul>
                    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
badges/auction">Auction</a></li>
                    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
badges/trading">Trading</a></li>
                    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
badges/redeem">Collectibles</a></li>
                    </ul>
                </li>
                <li class="navgame">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
games">The Game</a>
                    <ul>
                    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
games">Games</a></li>
                    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
sharebrag">Share and Brag</a></li>
                    </ul>
                </li>  
                <li class="naventercode"><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
entercode">Enter Codes</a></li>    
            </ul>
        </div><!-- END .main-menu-wrapper -->
        <div id="profileBox">
        	<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
profile" class="small-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
public_assets/profile/big_<?php echo $_smarty_tpl->tpl_vars['thisuser']->value['image_profile'];?>
" /></a>
            <a class="username" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
profile">Hi, <?php echo $_smarty_tpl->tpl_vars['thisuser']->value['name'];?>
</a>
         	<a class="viewporifle" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
profile">View Profile</a>
            <a href="#" class="notif">you have 2 notifications</a>
         	<a class="logout" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
logout.php">Log Out</a>
        </div>
        <?php } else { ?>
        
        <?php }?><!-- END #header -->
    </div>
</div><?php }} ?>
