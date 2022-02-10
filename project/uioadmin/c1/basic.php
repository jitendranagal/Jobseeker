<ul style="list-style:none; float:left; background-color:#CC9933">
<li style="float:left; background-color:#CC9966">Total Employers :
<?php
$sql=mysqli_query($con,"select name from personal");
$a=mysqli_num_rows($sql);
echo $a;
?>
&nbsp;&nbsp;
</li>
<li style="float:left; background-color:#CC9933">Total Jobseekers :
<?php
$sql=mysqli_query($con,"select name from request");
$a=mysqli_num_rows($sql);
echo $a;
?>
&nbsp;&nbsp;
</li>
<li style="float:left; background-color:#CC9966">Total Jobs :
<?php
$sql=mysqli_query($con,"select name from jobs");
$a=mysqli_num_rows($sql);
echo $a;
?>
</li>
</ul>
</marquee>
<table cellspacing="55px" width="100%"	>
<tr height="100px"><th class="basictd"><a href="index.php?mod=c1&do=add.php">New Employer</a></th><th class="basictd"><a href="index.php?mod=c1&do=li.php">List of Employers</a></th></tr>
<tr height="100px"><th class="basictd"><a href="index.php?mod=c2&do=add.php">New Employee</a></th><th class="basictd"><a href="index.php?mod=c2&do=li.php">List of Employee</a></th></tr>
</table>