<html>
<head>
<link rel="stylesheet" href="acss.css">
</head>
<body>
<?php session_start(); ?>
<div id="pro">
<header>
JOB SEEKER
</header>
<div>
<ul>
<li <?php if(isset($_GET['mod'])&& ($_GET['do']=='basic.php')){?>id="active"<?php }?>><?php if(isset($_SESSION['logindt']['ut'])){ $a=$_SESSION['logindt']['ut'];
switch($a)
{
	case 'reg':?>
	<a href="index.php?mod=c2&do=basic.php">Home</a>
	<?php
	
					break;
	case 'nr':?>
	<a href="index.php?mod=c1&do=basic.php">Home</a>
					<?php break;
}
?>
<?php }else{?><a href="index.php">Home</a><?php }?></li>
<?php if(isset($_SESSION['logindt'])){?><li <?php if(isset($_GET['mod'])&& ($_GET['mod']=='c1' && $_GET['do']=='search_com.php')){?> id="active"<?php }?>><a href="index.php?mod=c1&do=search_com.php">Companies</a></li><?php } else{?>
<li><a href="index.php?mod=c1&do=search_com.php" >Companies</a></li><?php }?> 
<?php if(isset($_SESSION['logindt'])){?><li <?php if(isset($_GET['mod'])&& ($_GET['mod']=='info' && $_GET['do']=='mngac.php')){?> id="active"<?php }?>><a href="index.php?mod=info&do=mngac.php" >Manage Account</a></li><?php }else{?>
<li><a href="index.php?mod=c2&do=seach_jobs.php" >Jobs</a></li><?php }?>
<?php if(isset($_SESSION['logindt'])){ ?><li <?php if(isset($_GET['mod'])&& ($_GET['mod']=='profile' && $_GET['do']=='profile.php')){?> id="active"<?php }?>><a href="index.php?mod=profile&do=profile.php">Profile</a></li><?php }
else { ?><li <?php if(isset($_GET['mod'])&& ($_GET['mod']=='info' && $_GET['do']=='contact_us.php')) { ?> id="active"<?php }?>><a href="index.php?mod=info&do=contact_us.php">Contact Us</a></li><?php }?>
<?php if(isset($_SESSION['logindt'])){ ?><li <?php if(isset($_GET['mod'])&& ($_GET['do']=='applied.php' || $_GET['do']=='apprc.php')){?> id="active"<?php }?>><a href="<?php if($_SESSION['logindt']['ut']=='reg'){echo "index.php?mod=c2&do=applied.php";} else{echo "index.php?mod=c1&do=apprc.php";}?>"><?php if($_SESSION['logindt']['ut']=='reg'){echo "Applied for";} else{echo "Application Recived";}?></a></li><?php }
else { ?><li <?php if(isset($_GET['mod'])&& ($_GET['mod']=='info' && $_GET['do']=='about_us.php'))  {?> id="active"<?php }?>><a href="index.php?mod=info&do=about_us.php">About Us</a></li><?php }?>
<?php if(isset($_SESSION['logindt'])){ ?><li><a href="index.php?mod=login&do=logout.php">Logout</a></li><?php }
else { ?><li><?php if(isset($_GET['log'])){?><a href="index.php?mod=registration&do=registration_form.php&log=emp">Create account</a><?php } else{?> <a href="index.php?mod=registration&do=registration_form.php">Registration Form</a><?php }}?></li>
</ul>
</div>
</body>
</html>