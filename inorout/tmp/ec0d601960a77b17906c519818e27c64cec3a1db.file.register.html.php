<?php /* Smarty version Smarty-3.1.15, created on 2013-12-20 10:27:58
         compiled from "../templates/application/web//register.html" */ ?>
<?php /*%%SmartyHeaderCode:7771744652b3b93eb54f11-34103986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec0d601960a77b17906c519818e27c64cec3a1db' => 
    array (
      0 => '../templates/application/web//register.html',
      1 => 1386658374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7771744652b3b93eb54f11-34103986',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'basedoamin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b3b93ebc1c60_00746177',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b3b93ebc1c60_00746177')) {function content_52b3b93ebc1c60_00746177($_smarty_tpl) {?>
	<div  style="padding-left:191px;">
	<form method="POST" id="formLogin" action="<?php echo $_smarty_tpl->tpl_vars['basedoamin']->value;?>
register">
		<div><h1>register</h1></div>
		<div><h3>Username <input type="text" name="username"  /></h3></div>
		<div><h3>Password <input type="password" name="password"   /></h3></div>
		<div><h3>Re-Password <input type="password" name="repassword"   /></h3></div>
		<div><h3>name <input type="text" name="name"   /></h3></div>
		<div><h3>email <input type="text" name="email"   /></h3></div>		
		<input type="hidden" name="register" value="1" /> 
		<div><input type="submit" value="Register" /></div> 
	</form>
	<div><a href="<?php echo $_smarty_tpl->tpl_vars['basedoamin']->value;?>
login" >Back to Login Page</a></div>
	<div style="clear:both" ></div>
	</div>


	
<?php }} ?>
