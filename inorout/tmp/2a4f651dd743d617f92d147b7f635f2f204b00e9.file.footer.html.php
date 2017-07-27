<?php /* Smarty version Smarty-3.1.15, created on 2013-12-18 14:48:07
         compiled from "../templates/application/mobile//footer.html" */ ?>
<?php /*%%SmartyHeaderCode:197135079852b1533717ac53-60702077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a4f651dd743d617f92d147b7f635f2f204b00e9' => 
    array (
      0 => '../templates/application/mobile//footer.html',
      1 => 1387352505,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197135079852b1533717ac53-60702077',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mopurl' => 0,
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52b15337196c80_22684741',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b15337196c80_22684741')) {function content_52b15337196c80_22684741($_smarty_tpl) {?>

<div id="footer">
    <div class="hw">
    	<div class="boxfooter">
            <div class="universal">
                <p>Informasi dalam website ini di tujukan untuk perokok berusia 18 tahun atau lebih dan tinggal di wilayah Indonesia</p>
            </div><!-- END .universal -->
        </div>
    	<div class="boxfooter">
            <div class="universal">
                <a href="/index.php">Halaman Utama</a>|
                <a href="<?php echo $_smarty_tpl->tpl_vars['mopurl']->value;?>
Templates/Termsandconditions.aspx" target="_blank">Syarat dan Ketentuan</a>|
                <a href="<?php echo $_smarty_tpl->tpl_vars['mopurl']->value;?>
Templates/RemoveMe.aspx" target="_blank">Hapus Saya</a>|
                <a href="<?php echo $_smarty_tpl->tpl_vars['mopurl']->value;?>
Templates/FAQ.aspx" target="_blank">Daftar Pertanyaan</a>|
                <a href="<?php echo $_smarty_tpl->tpl_vars['mopurl']->value;?>
Templates/Contactus.aspx" target="_blank">Kontak Kami</a>|
                <a href="https://www.pmi.com/id/smokingandhealth" target="_blank">Perihal Merokok</a>
            </div><!-- END .universal -->
        </div><!-- END .boxfooter -->
    </div><!-- END .hw -->
</div><!-- END #footer -->
<div id="hw">
    <div class="universal">
  	 <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/images/hw.png" />
    </div><!-- END .universal -->
</div><!-- END #hw --><?php }} ?>
