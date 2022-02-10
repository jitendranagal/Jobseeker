<?php
?>
<div style="background-color:#eef; float:left; width:20%; height:100%">
<ul style="background-color:#eef; max-height:100%;">
<li style="line-height:325%; font-size:19px; background-color:#ccf; margin:2% 2% 2% 0%; <?php if(!isset($_GET['in']) && $_GET['do']=='mngac.php'){?>background-color:#aaf; color:#005;<?php }?>"><a href="index.php?mod=info&do=mngac.php" style="text-decoration:none">General Settings</a></li>
<li style="line-height:325%; font-size:19px; background-color:#ccf; margin:2% 2% 2% 0%; <?php if(isset($_GET['in']) && $_GET['in']=='about_us'){?>background-color:#aaf; color:#005;<?php }?>"><a href="index.php?mod=info&do=mngac.php&in=about_us" style="text-decoration:none">About us</a></li>
<li style="line-height:325%; font-size:19px; background-color:#ccf; margin:2% 2% 2% 0%;<?php if(isset($_GET['in']) && $_GET['in']=='contact_us'){?>background-color:#aaf; color:#005;<?php }?>"><a href="index.php?mod=info&do=mngac.php&in=contact_us" style="text-decoration:none">Contact us</a></li>
<li style="line-height:325%; font-size:19px; background-color:#ccf; margin:2% 2% 2% 0%"><a href="index.php?mod=info&do=mngac.php&in=report_issue" style="text-decoration:none">Report An Issue</a></li>
</ul>
</div>
<div style="max-height:100%; overflow:auto;">
<?php if(!isset($_GET['in'])){include_once('info/mng.php');}?>
<?php if(isset($_GET['in']) && $_GET['in']=='contact_us'){include_once('info/contact_us.php');}?>
<?php if(isset($_GET['in']) && $_GET['in']=='report_issue'){include_once('info/report_issue.php');}?>
<?php if(isset($_GET['in']) && $_GET['in']=='about_us'){include_once('info/about_us.php');}?></div>