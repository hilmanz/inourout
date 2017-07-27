<?php /* Smarty version Smarty-3.1.15, created on 2014-01-07 11:16:11
         compiled from "../templates/application/web//apps/profile.html" */ ?>
<?php /*%%SmartyHeaderCode:53006735152a93c74efab43-63728921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da2ba67a6f6f50ae16cef49bf37a8d62ac42d2bf' => 
    array (
      0 => '../templates/application/web//apps/profile.html',
      1 => 1389068171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53006735152a93c74efab43-63728921',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a93c750ca674_02298392',
  'variables' => 
  array (
    'basedomain' => 0,
    'thisuser' => 0,
    'unread' => 0,
    'change' => 0,
    'mybadgepoint' => 0,
    'mybadge' => 0,
    'i' => 0,
    'notification_list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a93c750ca674_02298392')) {function content_52a93c750ca674_02298392($_smarty_tpl) {?><div id="profilePage" class="container">
    <div class="entry-container">
        <div class="col">
            <div class="col2">
                <div id="profile-box">
                    <div class="profile-head">
                        <h3><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/t_myprofile.png" /></h3>
                        <div class="profilenav">
                            <a href="#popup-edit-photo" class="showPopup editphoto">Edit Photo</a>
                            <a href="#popup-edit-photo" class="editprofile">Edit Profile</a>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
logout.php" class="logoutprofile">Logout</a>
                        </div><!-- END .profilenav -->
                       
                    </div><!-- END .profile-head -->
                    <div class="row-black">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
profile" class="big-thumb"><img src="<?php echo $_smarty_tpl->tpl_vars['thisuser']->value['profile']['image_full_path'];?>
" /></a>
                        <div class="pl200">
                            <h3 class="accountname"><?php echo $_smarty_tpl->tpl_vars['thisuser']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['thisuser']->value['last_name'];?>
</h3>
                            <h4 class="age"><?php echo $_smarty_tpl->tpl_vars['thisuser']->value['age'];?>
 years old, from <?php echo $_smarty_tpl->tpl_vars['thisuser']->value['cityname'];?>
</h4>
                        </div><!-- END .pl200 -->
                    </div><!-- END .row-black -->
                    <div class="row-orange">
                        <div class="pl200">
                            <?php if ($_smarty_tpl->tpl_vars['unread']->value) {?>
                            <a class="notification showPopup" href="#popup-notification" onclick="load_notification_list();">You have <?php echo $_smarty_tpl->tpl_vars['unread']->value['total'];?>
 new notification<span class="arrow-white">&nbsp;</span></a>
                            <?php }?>
                        </div><!-- END .pl200 -->
                    </div><!-- END .row-orange -->
                    <div class="row-tr3">
                        <div class="ps50 aspirationBox">
                            <h4 class="m0 black">Why I love traveling:</h4>
                            <?php if ($_smarty_tpl->tpl_vars['change']->value=='aspiration') {?>
                                <form action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
profile/change" method="post">
                                    <textarea class="aspiration-message" name="aspiration"></textarea>
                                    <input type="hidden" name="change_aspiration" value="1">
                                    <input type="submit" name="submit" value="Save" class="orangebtn fr">
                                </form>
                            <?php } else { ?>
                                <h2 class="m0">"<?php echo $_smarty_tpl->tpl_vars['thisuser']->value['aspiration'];?>
"</h2><a class="editAspiration" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
profile/change">EDIT</a>
                            <?php }?>
                        </div><!-- END .ps50 -->
                    </div><!-- END .row-tr3 -->
                    <div class="row-tr4">
                        <div class="ps50">
                            <h4 class="m0 black">Active Trading:</h4>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td class="center"><h2 class="m0">BADGES I HAVE</h2></td>
                                <td class="center">&nbsp;</td>
                                <td class="center"><h2 class="m0">BADGES I WANT</h2></td>
                                <td class="center">&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="center">
                                    <div class="badges badges-s">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-1.png" />
                                    </div>
                                </td>
                                <td  class="center"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/icon/icon_trade.png" /></td>
                                <td class="center">
                                    <div class="badges badges-s">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-2.png" />
                                    </div>
                                </td>
                                <td class="center"><a href="#" class="cancelTrade">CANCEL</a></td>
                              </tr>
                              <tr>
                                <td class="center">
                                    <div class="badges badges-s">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-3.png" />
                                    </div>
                                </td>
                                <td  class="center"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/icon/icon_trade.png" /></td>
                                <td class="center">
                                    <div class="badges badges-s">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-4.png" />
                                    </div>
                                </td>
                                <td class="center"><a href="#" class="cancelTrade">CANCEL</a></td>
                              </tr>
                              <tr>
                                <td class="center">
                                    <div class="badges badges-s">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-5.png" />
                                    </div>
                                </td>
                                <td  class="center"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/icon/icon_trade.png" /></td>
                                <td class="center">
                                    <div class="badges badges-s">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/badges-6.png" />
                                    </div>
                                </td>
                                <td class="center"><a href="#" class="cancelTrade">CANCEL</a></td>
                              </tr>
                            </table>
                        </div><!-- END .ps50 -->
                    </div><!-- END .row-tr4 -->
                    <div class="row-orange">
                        <div class="pl200">
                            <a class="inviteFriends" href="#">invite friends<span class="arrow-white">&nbsp;</span></a>
                        </div><!-- END .pl200 -->
                    </div><!-- END .row-orange -->
                </div><!-- END #profile-box -->
            </div><!-- END .col2 -->
            <div class="col2">
                <div id="badges-box">
                    <div class="badges-head">
                        <h3 class="m0 fl"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/t_mybadges.png" /></h3>
                        <div class="badgesValue fr">
                            <p class="m0">total badge value</p>
                            <h3 class="red m0"><?php echo number_format($_smarty_tpl->tpl_vars['mybadgepoint']->value['total']);?>
<a class="help" href="#"></a></h3>
                        </div><!-- END .profilenav -->
                    </div><!-- END .badges-head -->
                    <div id="badges-list">
                        <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['myId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mybadge']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['myId']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                        <div class="badges badges-m <?php if ($_smarty_tpl->tpl_vars['i']->value['total']=='0') {?>grayscale<?php }?>">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/badges/<?php echo $_smarty_tpl->tpl_vars['i']->value['image'];?>
"  class="tip" title="<h5><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
</h5><p><?php echo $_smarty_tpl->tpl_vars['i']->value['desc'];?>
</p> <h3><?php echo $_smarty_tpl->tpl_vars['i']->value['point'];?>
 Points</h3>" />
                            <span class="badges-value"><?php echo $_smarty_tpl->tpl_vars['i']->value['total'];?>
</span>
                        </div>
                        <?php } ?>
                    </div><!-- END #badges-list -->
                    <div class="action-btn">
                        <a class="orangebtn fr" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
badges/redeem">Redeem &raquo;</a>
                        <a class="orangebtn fr" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
badges/trading">Trade &raquo;</a>
                        <a class="orangebtn fr" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
badges/auction">Auction &raquo;</a>
                    </div><!-- END .action-btn -->
                </div><!-- END #badges-box -->
                <div id="photo-box">
                    <div class="photo-head">
                        <h3 class="m0"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/content/newsfeed.png" /></h3>
                    </div><!-- END .photo-head -->
                    <div id="photo-list">
                        <div id="newsfeedlist">
                            <ul>
                                <li>
                                   <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur</p>
                                   <span class="date">11/02/2014</span>
                                </li>
                                <li>
                                   <p>Donec ullamcorper nulla non metus auctor fringilla.</p>
                                   <span class="date">11/02/2014</span>
                                </li>
                                <li>
                                   <p>Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                                   <span class="date">11/02/2014</span>
                                </li>
                            </ul>
                        </div>
                    </div><!-- END #photo-list -->
                </div><!-- END #photo-box -->
            </div><!-- END .col2 -->
        </div><!-- END .col -->
    </div><!-- END .entry-container -->
</div><!-- END .container -->
<?php echo $_smarty_tpl->tpl_vars['notification_list']->value;?>

<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-edit-photo.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("application/web/widgets/popup-wildcard.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
