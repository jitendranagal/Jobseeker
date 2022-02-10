<html>
<head>
<title>Jobseeker</title>
<link rel="stylesheet" href="site.css">
</head>
<body bgcolor="#efefef">
<div id="wrapper">
<header>
&nbsp;JOB SEEKER
	<nav>
    	<ul>
            <?php
				if(isset($_SESSION['logindtl'])){?>
					<li><a href="index.php?mod=c1&do=basic.php">Home</a></li>
                    <li><a href="index.php?mod=Q&do=logout.php">Logout</a></li>
        	<?php } ?>
    	</ul>
    </nav>
</header>

