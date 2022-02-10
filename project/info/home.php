<?php
if(isset($_GET['log']))
{
?>
<div style="text-shadow:3px 3px 3px #000; font-size:72px; color:#7878dd; margin-top:14%" align="center">
We provide proffesonals to you for achieving your business goals...
</div>
<?php 
}
else if(!isset($_GET['log'])&& !isset($_SESSION['logindt']))
{
?>
<div style="text-shadow:3px 3px 3px #000; font-size:72px; color:#7878dd; margin-top:10%" align="center">
We provide platform to get your dream job & grow yourself as your dreams...
</div>
<?php
}
else if(isset($_SESSION['logindt']))
{
	if($_SESSION['logindt']['ut']=='employee')
	{
		$sql="SELECT jobs.id, employers.name, employers.image, jobs.name as 'vacancy', jobs.no_of_seats, jobs.closing_date, jobs.appl_date,jobs.qualification FROM jobs LEFT join employers ON jobs.eid=employers.id ";
		$a=mysqli_query($con,$sql);
?>
<table style="width:100%; max-height:100%;">
<tr style="background-color:#eef">
<th>S.no.</th>
<th>Image</th>
<th>Employer</th>
<th>Vacancy For</th>
<th>No.of seats</th>
<th>Last date of application</th>
<th>Application begin from</th>
<th>Qualification</th>
<th>Action</th></tr>
<?php
	$i=0;
	while($c=mysqli_fetch_assoc($a))
	{
		$i++;
	?>
	<tr style="background-color:#fff; text-align:center">
	<td><?php echo $i;?></td>
	<td><img src="<?php echo $c['image'];?>" style="width:95px; height:95px"></td>
	<td><?php echo $c['name'];?></td>
	<td><?php echo $c['vacancy'];?></td>
	<td><?php echo $c['no_of_seats'];?></td>
	<td><?php echo $c['closing_date'];?></td>
	<td><?php echo $c['appl_date'];?></td>
	<td><?php echo $c['qualification'];?></td>
	<td><a href="index.php?mod=employee&do=disoj.php&ref=<?php echo $c['id']; ?>">View</a></td>
	</tr>
	<?php
	}
	}
	else
	{
		$sql="SELECT id,name,pic as image FROM personal";
		$a=mysqli_query($con,$sql);
?>
<table style="width:100%; max-height:100%;">
<tr style="background-color:#eef">
<th>S.no.</th>
<th>Image</th>
<th>Action</th></tr>
<?php
	$i=0;
	while($c=mysqli_fetch_assoc($a))
	{
		$i++;
	?>
	<tr style="background-color:#fff; text-align:center">
	<td><?php echo $i;?></td>
	<td><img src="<?php echo $c['image'];?>" style="width:95px; height:95px"></td>
	<td><?php echo $c['name'];?></td>
	<td><a href="index.php?mod=c2&do=disoj.php&eref=<?php echo $c['id']; ?>">View</a></td>
	</tr>
	<?php
	}
	}
}
?>
</table>
