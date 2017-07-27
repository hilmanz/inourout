
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
	  <?php 
        if($_GET['menu']=='break-doubt'){ ?>
      		<a class="navbar-brand" href="index.php"><img src="images/logo_breakdoubt.png"/></a>
        <?php }else if($_GET['menu']=='find-what-missing'){   ?>
     		<a class="navbar-brand" href="index.php"><img src="images/logo_find-what-missing.png"/></a>
        <?php }else if($_GET['menu']=='facemaker'){   ?>
      		<a class="navbar-brand" href="index.php"><img src="images/logo_facemaker.png"/></a>
        <?php }else{ ?>
      		<a class="navbar-brand" href="index.php"><img src="images/logo_breakdoubt.png"/></a>
        <?php }?>
    </div>
    <div class="page-title">
        <h1><span class="icon-house icons">&nbsp;</span> Dashboard</h1>
    </div>
    <a class="logoutBtn boxBtn" href="index.php?menu=login"><span class="icons icon-lock">&nbsp;</span></a>
    <a class="downloadBtn boxBtn" href="#"><span class="icons icon-download">&nbsp;</span></a>
    <a class="boxBtn boxBtn2" href="index.php?menu=facemaker">Facemaker</a>
    <a class="boxBtn boxBtn2" href="index.php?menu=break-doubt">Break Doubt</a>
    <a class="boxBtn boxBtn2 active" href="index.php?menu=find-what-missing">Find What Missing</a>
  </nav>