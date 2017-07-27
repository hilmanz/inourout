<!DOCTYPE html>
<html lang="en">
  <?php include("meta.php"); ?>
  <?php 
	if($_GET['menu']=='break-doubt'){ ?>
  		<body id="page-breakdoubt">
	<?php }else if($_GET['menu']=='find-what-missing'){   ?>
  		<body id="page-find-what-missing">
	<?php }else if($_GET['menu']=='facemaker'){   ?>
  		<body id="page-facemaker">
	<?php }else{ ?>
 	 	<body id="page-breakdoubt">
	<?php }?>
    <div id="wrapper">
		<?php 
        if($_GET['menu']!=='login'){
		 include("header.php");
		}
		?>
          <div id="page-wrapper">
                <?php 
                if($_GET['menu']=='break-doubt'){
                    include("break-doubt.php");
                }else if($_GET['menu']=='find-what-missing'){ 
                    include("find-what-missing.php");
                }else if($_GET['menu']=='facemaker'){ 
                    include("facemaker.php");
                }else if($_GET['menu']=='login'){ 
                    include("login.php");
                }else{ 
                    include("break-doubt.php");
                }?>
          </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
  </body>
</html>
