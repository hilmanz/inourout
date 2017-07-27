<?php /* Smarty version Smarty-3.1.15, created on 2014-02-13 15:20:08
         compiled from "../templates/application/web//footer.html" */ ?>
<?php /*%%SmartyHeaderCode:28129680852a6be2de2ef03-91843690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0164a1b02479f869f3a6b7cf30529ea73a30ff16' => 
    array (
      0 => '../templates/application/web//footer.html',
      1 => 1392265087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28129680852a6be2de2ef03-91843690',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52a6be2de4bdb6_77481264',
  'variables' => 
  array (
    'pages' => 0,
    'mopurl' => 0,
    'basedomain' => 0,
    'acts' => 0,
    'showhiddencode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a6be2de4bdb6_77481264')) {function content_52a6be2de4bdb6_77481264($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pages']->value=='profile') {?>  
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
assets/images/hw3.jpg" />
    </div><!-- END .universal -->
</div><!-- END #hw -->
<?php } elseif ($_smarty_tpl->tpl_vars['pages']->value=='login') {?>
<div id="footer2" style="bottom:0;">
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

<?php } else { ?>
<div id="footer" style="bottom:0;">
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
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['pages']->value=='badges'&&$_smarty_tpl->tpl_vars['acts']->value=='trading') {?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
assets/js/modules/trading.js"></script>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['showhiddencode']->value) {?>
<a class="hiddenBadges hiddenCubical hiddenPackage" href="javascript:void(0)" token="<?php echo $_smarty_tpl->tpl_vars['showhiddencode']->value;?>
" ></a>
<a  class="showPopup myhiddencode" href="#popup-global" style="display:none"  ></a>
 	
	
	<script>
		
	 
		$(document).on('click', '.hiddenPackage', function(){
			
			var getToken = $(this).attr('token');
				$(this).fadeOut();
			$(".myhiddencode").trigger("click");			
			$(".popup-entry").html(locale.pleasewait);
			
			$.post(basedomain+"games/hiddencode",{hiddenCode:true, param:getToken}, function(data){
				
				var html = "";
				if (data.status == true){
					if(data.rec.result==true) {
					html += "<div class='popupContent centerText'>";
					html += "<h2>Congratulations!</h2>";
					html += "<h3>"+locale.hiddenpacktextheader+"</h3>";
					html += "<img src='"+basedomain+"assets/images/badges/"+data.rec.images+"' />"; 
					html += "</div>";
					}else{
						html += "<div class='popupContent centerText'>";
						html += "<h2></h2>";
						html += "<h3>"+data.rec.message+"</h3>"; 		 
						html += "</div>";
						 
					}
				}else{
					html += "<div class='popupContent centerText'>";
					html += "<h2></h2>";
					html += "<h3>"+data.rec.message+"</h3>"; 		 
					html += "</div>";
				} 
				
				$(".myhiddencode").trigger("click");			
				$(".popup-entry").html(html);
				
				
				$(document).on('click','#fancybox-close, #fancybox-overlay', function(){
					location.reload(); 
				}); 
				
			},"JSON");
			
		
			
		});
	 	
	</script>
	
<?php }?>

  <?php }} ?>
