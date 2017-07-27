<?php /* Smarty version Smarty-3.1.15, created on 2014-01-27 16:56:34
         compiled from "../templates/application/web/widgets/popup-double-or-nothing-list.html" */ ?>
<?php /*%%SmartyHeaderCode:184185277352e62abebc8037-73251167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6390d23d3a8eebb2afc765e67d8de9fcfc463a05' => 
    array (
      0 => '../templates/application/web/widgets/popup-double-or-nothing-list.html',
      1 => 1390816593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184185277352e62abebc8037-73251167',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52e62abebde129_92646060',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e62abebde129_92646060')) {function content_52e62abebde129_92646060($_smarty_tpl) {?><div class="popup popup-double-or-nothing" id="popup-double-or-nothing" style="display:block;">
    <div class="popupContainer center">
		<a class="closePopup" href="#">[CLOSE X]</a>
    	<div class="popup-head">
        	<h2 class="bigTItle"><img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/content/doubleOrNothing.png" /></h2>
            <h3>Ikuti tantangan ini untuk mendapatkan DOBEL BADGE!</h3>
        </div><!-- END .popup-head -->
    	<div class="popup-entry">
        	<div class="challengeList">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="50"><a href="#" class="small-thumb"><img src="https://pbs.twimg.com/profile_images/416619779927969792/wp4jlKWN_normal.png" /></a></td>
                    <td><h4>Dr. Jono</h4></td>
                    <td><a href="#" class="challengeBtn">Challenge!</a></td>
                  </tr>
                  <tr>
                    <td><a href="#" class="small-thumb"><img src="https://pbs.twimg.com/profile_images/2920327365/4043c25ef5926d5a3611d7e7f678170e_normal.jpeg" /></a></td>
                    <td><h4>Monkey D Luffy</h4></td>
                    <td><a href="#" class="challengeBtn">Challenge!</a></td>
                  </tr>
                  <tr>
                    <td><a href="#" class="small-thumb"><img src="https://pbs.twimg.com/profile_images/378800000741209708/aea9695533a3b57eb19118f0f262fa0f_normal.jpeg" /></a></td>
                    <td><h4>Resty Alvianti</h4></td>
                    <td><a href="#" class="challengeBtn">Challenge!</a></td>
                  </tr>
                </table>
        		
            </div>
        </div><!-- END .popup-entry -->
    </div><!-- END .popupContainer -->
</div><!-- END .popup -->
<div id="bg-popup" style="display:block;"></div><?php }} ?>
