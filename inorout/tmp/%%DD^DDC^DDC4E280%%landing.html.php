<?php /* Smarty version 2.6.13, created on 2013-12-10 13:51:02
         compiled from application/web//landing.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'json_encode', 'application/web//landing.html', 35, false),)), $this); ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html dir="ltr" lang="en-US" > 
<!--<![endif]--><head>
<!--Meta Tags-->
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--Title-->
<title>MARLBORO.PH</title>
<!--Stylesheets-->
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/superfish.css" type="text/css"  media="all" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/carousel.css" type="text/css"  media="all" />
<link type="text/css" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/jquery.jscrollpane.css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/inorout.css" type="text/css"  media="all" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/inorout-ie.css" type="text/css"  media="all" />
<!--Favicon-->
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/favicon.png" type="image/x-icon" />
<!--JavaScript-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/hoverIntent.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/customform.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/detectbrowser.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/inourout.js"></script>
<script>
	var basedomain = "<?php echo $this->_tpl_vars['basedomain']; ?>
" ;
	var pages = "<?php echo $this->_tpl_vars['pages']; ?>
" ;
	var locale = <?php echo json_encode($this->_tpl_vars['locale']); ?>
 ;
	var lifetime = "<?php echo $this->_tpl_vars['lifetime']; ?>
";
	var isLogin = "<?php echo $this->_tpl_vars['isLogin']; ?>
";	

</script>
</head>
<body class="the-<?php echo $this->_tpl_vars['pages']; ?>
 the-<?php echo $this->_tpl_vars['acts']; ?>
" id="marlboro-<?php echo $this->_tpl_vars['pages'];  echo $this->_tpl_vars['acts']; ?>
">
    <div id="mainBody">
        <div id="body" class="universal">
        	<div id="header">
                <div class="universal">
                    <div id="logoBox">
                     <a id="logo" href="<?php echo $this->_tpl_vars['basedomain']; ?>
home">&nbsp;</a>
                    </div>
                </div>
            </div>
             <div id="landingPage" class="container">
                <div class="entry-container" style="padding:40px;">
                    <h1>WELCOME USER!</h1>
                    <h3><a class="orangebtn" href="<?php echo $this->_tpl_vars['basemopurl']; ?>
">LOGIN</a></h3>
                </div>
            </div><!-- END .container -->
        </div><!-- END .wrapper -->
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
                        <a href="<?php echo $this->_tpl_vars['mopurl']; ?>
Templates/Termsandconditions.aspx" target="_blank">Syarat dan Ketentuan</a>|
                        <a href="<?php echo $this->_tpl_vars['mopurl']; ?>
Templates/RemoveMe.aspx" target="_blank">Hapus Saya</a>|
                        <a href="<?php echo $this->_tpl_vars['mopurl']; ?>
Templates/FAQ.aspx" target="_blank">Daftar Pertanyaan</a>|
                        <a href="<?php echo $this->_tpl_vars['mopurl']; ?>
Templates/Contactus.aspx" target="_blank">Kontak Kami</a>|
                        <a href="https://www.pmi.com/id/smokingandhealth" target="_blank">Perihal Merokok</a>
                    </div><!-- END .universal -->
                </div><!-- END .boxfooter -->
            </div><!-- END .hw -->
        </div><!-- END #footer -->
        <div id="hw">
            <div class="universal">
             <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/hw.png" />
            </div><!-- END .universal -->
        </div><!-- END #hw -->
    </div><!-- END #mainBody -->
    <div id="bg-popup"></div>
</body>
</html>