<div id="right">
<?php
if(isset($_SESSION['logindtl'])&&$_SESSION['logindtl'])
{
?>
<ul>
	<a href="index.php?mod=c1&do=add.php"><li <?php if($_GET['mod']=='c1'&&$_GET['do']=='add.php'){ ?> class="active" <?php } ?>>Add New Employer</li></a>
    <a href="index.php?mod=c1&do=li.php&page=1"><li <?php if($_GET['mod']=='c1'&&$_GET['do']=='li.php'){ ?> class="active" <?php } ?>>List Of Employers</li></a>
    <a href="index.php?mod=c2&do=add.php"><li <?php if($_GET['mod']=='c2'&&$_GET['do']=='add.php'){ ?> class="active" <?php } ?>>Add New Employee</li></a>
	<a href="index.php?mod=c2&do=li.php&page=1"><li <?php if($_GET['mod']=='c2'&&$_GET['do']=='li.php'){ ?> class="active" <?php } ?>>List Of Employee</li></a>
	<a href="index.php?mod=c2&do=lior.php&vi=report&action=unseen&page=1"><li <?php if($_GET['mod']=='c2'&&$_GET['do']=='li.php'){ ?> class="active" <?php } ?>>Report</li></a>
    <a href="index.php?mod=c2&do=lior.php&vi=message&action=unseen&page=1"><li <?php if($_GET['mod']=='c2'&&$_GET['do']=='li.php'){ ?> class="active" <?php } ?>>Messages or feedback</li></a>
</ul>
<?php
}
?>
</div>
</div>