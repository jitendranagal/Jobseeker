<?php
if(isset($_POST['search']) && $_POST['search']!=NULL)
{
$sea=$_POST['search'];
$sql="SELECT jobs.id, personal.pic, personal.name as 'emp', jobs.name as 'name', number, jobs.last_date, jobs.form_date,jobs.qualification FROM jobs LEFT join personal ON jobs.pid=personal.id WHERE personal.name LIKE '%$sea%' OR jobs.name LIKE '%$sea%'";
}else
$sql="SELECT jobs.id, personal.pic, personal.name as 'emp', jobs.name as 'name', number, jobs.last_date, jobs.form_date,jobs.qualification FROM jobs LEFT join personal ON jobs.pid=personal.id ";
?>
<table style="width:100%; max-height:100%;">
<?php if(isset($_SESSION['logindt']))
{?>
<tr colspan="9">
<form method="post">
<input type="text" name="search" placeholder="search jobs by employer name or post name" style="width:75%; margin-left:2.5%"><input type="submit" value="Search"style="width:20%">
</form></tr><?php }?>
<tr style="background-color:#eef">
<th>S.no.</th>
<th>Image</th>
<th>Employer</th>
<th>Vacancy For</th>
<th>No.of seats</th>
<th>Qualification</th>
<?php if(isset($_SESSION['logindt'])){?>
<th>Last date of application</th>
<th>Application begin from</th>
<th>Action</th><?php }?></tr>
<?php
	$z=mysqli_query($con,$sql);
	$i=0;
	while($c=mysqli_fetch_assoc($z))
	{
		$i++;
	?>
	<tr style="background-color:#fff; text-align:center">
	<td><?php echo $i;?></td>
	<td><img src="<?php echo $c['pic'];?>" style="width:95px; height:95px"></td>
	<td><?php echo $c['emp'];?></td>
	<td><?php echo $c['name'];?></td>
	<td><?php echo $c['number'];?></td>
	<td><?php echo $c['qualification'];?></td>
	<?php if(isset($_SESSION['logindt']))
	{?>
	<td><?php echo $c['last_date'];?></td>
	<td><?php echo $c['form_date'];?></td>
	<td><a href="index.php?mod=c2&do=disoj.php&ref=<?php echo $c['id']; ?>">View</a></td>
	<?php }?>
	</tr>
	<?php
	}
?>
</table>



