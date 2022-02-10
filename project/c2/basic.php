<?php
if(isset($_SESSION['logindt']) && !isset($_GET['do']))
{
	$table="personal";
	$pic=$_SESSION['logindt']['pic'];
	if($_SESSION['logindt']['ut']=='employee')
		$table='request';
	$sql="select id from $table where pic='$pic'";
	$a=mysqli_query($con,$sql);
	$b=mysqli_fetch_assoc($a);
	$_SESSION['logindt']['id']=$b['id'];
}
if(isset($_GET['log']) && $_GET['log']=='emp')
{
?>
<div style="text-shadow:3px 3px 3px #000; font-size:72px; color:#7878dd; margin-top:10%" align="center">
We provide proffessionals to you for achieving your business goals...
</div>

<?php
}
else if(!isset($_GET['log']) && !isset($_SESSION['logindt']))
{
?>
<div style="text-shadow:3px 3px 3px #000; font-size:72px; color:#7878dd; margin-top:10%" align="center">
We provide platform to get your dream job & grow yourself as your dreams...
</div>
<?php
}
else
{
$quali=$_SESSION['logindt']['qualification'];
$sql="SELECT jobs.name as 'post', personal.name as 'employer', form_date, last_date, number, jobs.id FROM jobs LEFT JOIN personal ON jobs.pid=personal.id AND (jobs.qualification LIKE '%$quali%' OR jobs.qualification LIKE '%All%') ORDER BY `id` DESC";
if(isset($_POST['search']) && $_POST['search']!=NULL)
{
	$search=$_POST['search'];
	$sql="SELECT jobs.name as 'post', personal.name as 'employer', form_date, last_date, number, jobs.id FROM jobs LEFT JOIN personal ON jobs.pid=personal.id WHERE (jobs.name LIKE '%$search%' || personal.name LIKE '%$search%')  ORDER BY `id` DESC";
}
$a=mysqli_query($con,$sql);

$date=date_create("now");
$date=date_format($date,"Y-m-d");
?>
<table style="width:99%">
<form method="post"><tr><td colspan="5"><input type="text" placeholder=" Enter Name of vacancy, name of Employer to search <?php if(isset($_GET['do'])&&$_GET['do']=='lioemp.php'){echo 'Employers';}?>" name="search" <?php if(isset($_POST['search'])){?> value="<?php echo $_POST['search'];}?>"></td><td style="width:10%"><input type="hidden" name="mod" value="c2"><input type="hidden" name="do" value="basic.php"><input type="submit" value="Search" style="width:99.9%;"></td></tr></form>
<tr style="background-color:#abd"><th>&nbsp;Employer&nbsp;</th><th>&nbsp;Vacancy For&nbsp;</th><th>&nbsp;Application begin from&nbsp;</th><th>&nbsp;Last Date Of Application&nbsp;</th><th>&nbsp;Number Of Vacancies&nbsp;</th><th>&nbsp;</th>
</tr>
<?php
while($c=mysqli_fetch_assoc($a))
{
?>
	<tr style="background-color:#dde">
<?php
if($c['employer']!=NULL)
if(strtotime($date)<=strtotime($c['last_date']))
{
	echo "<td>".ucfirst($c['employer'])."</td>";
	echo "<td>".ucfirst($c['post'])."</td>";
	echo "<td>".$c['form_date']."</td>";
	echo "<td>".$c['last_date']."</td>";
	echo "<td>".$c['number']."</td>";?>
	<td><a href="index.php?mod=c2&do=disoj.php&ref=<?php echo $c['id']; ?>">View</a></td>
<?php echo "</tr>";
}
}
}
?>
</table>