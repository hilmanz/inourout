<?php /* Smarty version Smarty-3.1.15, created on 2014-02-13 15:20:06
         compiled from "../templates/application/web//login.html" */ ?>
<?php /*%%SmartyHeaderCode:185381134252a6be2dc7a661-58993866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5be88d561a42177426013f1aab5a32224fc8b9a4' => 
    array (
      0 => '../templates/application/web//login.html',
      1 => 1390805474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185381134252a6be2dc7a661-58993866',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a6be2dcd22b6_01700151',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a6be2dcd22b6_01700151')) {function content_52a6be2dcd22b6_01700151($_smarty_tpl) {?>
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
						<input type="password" class="password full-width required checkthis" name="password" id="thePassword"/>
					</div>
				</div>
				
				<div class="moreInfo">
                    <div class="row">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
forgotpassword" class="forgotPassword">Forgot Your Password?</a>
                    </div>
                    <div class="row rowCheck">
                        <div class="clear required">
                            <input type="checkbox" class="styled" name="colors[]"  />
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

<script>
	$(function () {
			$("#theUsername").watermark( "Username", { useNative: false,className: 'watermarkName' } );
			$("#thePassword").watermark( "Password", { useNative: false,className: 'watermarkName' } );
		});
</script>
<?php }} ?>
