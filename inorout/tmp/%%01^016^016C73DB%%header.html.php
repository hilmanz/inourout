<?php /* Smarty version 2.6.13, created on 2013-12-10 13:50:41
         compiled from application/web//header.html */ ?>
<div id="header">
	<div class="universal">
          <?php if ($this->_tpl_vars['user']): ?>
        <div id="logoBox">
       	 <a id="logo" href="<?php echo $this->_tpl_vars['basedomain']; ?>
home">&nbsp;</a>
        </div>
        <div id="main-menu-wrapper" class="clearfix active-<?php echo $this->_tpl_vars['pages']; ?>
">
            <ul id="main-menu" class="mainmenu">
                <li class="navabout">
                	<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
about">About In Or Out</a>
                    <ul style="top:78px;">
                    	<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
howto">How To Play</a></li>
                    </ul>
                </li>
                <li class="navuandc"><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
uandc">Update And Clues</a></li>
                <li class="navbadge">
                    <a href="#">The Badges</a>
                    <ul>
                    	<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
badges">Auction</a></li>
                    	<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
badges/trading">Trading</a></li>
                    	<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
badges/redeem">Collectibles</a></li>
                    </ul>
                </li>
                <li class="navgame">
                    <a href="#">The Game</a>
                    <ul>
                    	<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
games">Games</a></li>
                    	<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
sharebrag">Share and Brag</a></li>
                    </ul>
                </li>  
                <li class="naventercode"><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
entercode">Enter Codes</a></li>    
            </ul>
        </div><!-- END .main-menu-wrapper -->
        <div id="profileBox">
        	<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
profile" class="small-thumb"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/content/intanh_small.jpg" /></a>
            <a class="username" href="<?php echo $this->_tpl_vars['basedomain']; ?>
profile">Hi, Intan</a>
         	<a class="viewporifle" href="<?php echo $this->_tpl_vars['basedomain']; ?>
profile">View Profile</a>
            <a href="#" class="notif">you have 2 notifications</a>
         	<a class="logout" href="<?php echo $this->_tpl_vars['basedomain']; ?>
logout.php">Log Out</a>
        </div>
        <?php else: ?>
        
        <?php endif; ?><!-- END #header -->
    </div>
</div>