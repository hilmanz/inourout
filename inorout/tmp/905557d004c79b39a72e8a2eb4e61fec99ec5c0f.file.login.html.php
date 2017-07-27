<?php /* Smarty version Smarty-3.1.15, created on 2013-12-18 14:48:06
         compiled from "../templates/application/mobile//login.html" */ ?>
<?php /*%%SmartyHeaderCode:208016878852b15336ec12f7-29940988%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '905557d004c79b39a72e8a2eb4e61fec99ec5c0f' => 
    array (
      0 => '../templates/application/mobile//login.html',
      1 => 1387352506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208016878852b15336ec12f7-29940988',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b15336f37254_66836892',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b15336f37254_66836892')) {function content_52b15336f37254_66836892($_smarty_tpl) {?>
	<div id="loginPage">
		<div id="loginBox">
			<h1>SIGN UP NOW!</h1>
			<h3>Get a chance to win a trip to three great cities<br />or win over HUNDREDS of EXCLUSIVE prizes</h3>
			<form class="loginBox theForms" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
login/local"  method="POST" onSubmit="return validate()">
				<div class="row">
					
					<div class="the-field">
						<input type="text" class=" full-width required checkthis" name="username" id="theUsername"/>
					</div>
				</div>
				<div class="row">
					<div class="the-field">
						<input  type="password" class="password full-width required checkthis" name="password" id="thePassword"/>
					</div>
				</div>
				
				<div class="moreInfo">
                    <div class="row">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
forgotpassword" class="forgotPassword">Forgot Your Password?</a>
                    </div>
                    <div class="row rowCheck">
                        <div class="clear required">
                            <input type="checkbox" class="styled" name="colors[]" />
                            <label>I am an adult smoker 18 years or older</label>
                        </div>
                        <div class="clear">
                            <input type="checkbox" name="colors[]" class="styled" />
                            <label>I have read and understood the Terms and Conditions</label>
                        </div>
                    </div>
                    <div class="row rowSubmit">
                        <input type="hidden" value="1" name="login"/>
						<input type="submit" value="ENTER" class="orangebtn" name="submit" id="btnLoginMop"/>
                        <a id="btnRegisterMop" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
register">REGISTER</a>
                    </div>
                </div>
				
			</form>
		</div><!-- END #loginBox -->
	</div><!-- END #loginPage -->
<?php }} ?>
