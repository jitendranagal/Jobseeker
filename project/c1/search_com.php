<?php
if(isset($_POST['search']) && $_POST['search']!=NULL)
{
$sea=$_POST['search'];
$sql="SELECT id,name,address,dob,address,contact,city,state,pic,email FROM personal WHERE name LIKE '%$sea%'";
}else
$sql="SELECT id,name,address,dob,address,contact,city,state,pic,email FROM personal";
?>
<table style="width:100%; max-height:100%;">
<?php if(isset($_SESSION['logindt']))
{?>
<tr colspan="9">
<form method="post">
<input type="text" name="search" placeholder="search employer by their name" style="width:75.67%; margin-left:2.5%"><input type="submit" value="Search"style="width:20%">
</form></tr><?php }?>
<tr style="background-color:#eef">
<th>S.no.</th>
<th>Image</th>
<th>Employer</th>
<th>Date of INC</th>
<th>Address</th>
<th>Mob no.</th>
<?php if(isset($_SESSION['logindt'])){?>
<th>E-mail</th>
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
	<td><?php echo $c['name'];?></td>
	<td><?php echo $c['dob'];?></td>
	<td><?php echo $c['address'].", ".$c['city'].", ".$c['state'];?></td>
	<td><?php echo $c['contact'];?></td>
	<?php if(isset($_SESSION['logindt']))
	{?>
	<td><?php echo $c['email'];?></td>
	<td><a href="index.php?mod=c2&do=disoj.php&eref=<?php echo $c['id']; ?>">View</a></td>
	<?php }?>
	</tr>
	<?php
	}
?>
</table>
