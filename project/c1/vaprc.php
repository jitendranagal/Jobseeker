<?php
if(isset($_GET['addemp']))
{
	$_POST['addemp']=$_GET['addemp'];
	$_POST['jid']=$_GET['jid'];
	$_POST['empid']=$_GET['empid'];
	addedit('accept',$_POST);
	$jid=$_GET['jid'];
	header("location:index.php?mod=c1&do=vaprc.php&id=$jid");
}
if(isset($_GET['rem']))
{
	$id=$_GET['rem'];
	$jid=$_GET['jid'];
	$sql="delete from applications where rid=$id and jid=$jid";
}
?>
<table style="width:98%; text-align:center; background-color:#ddf">
<tr style="background-color:#ddf"><th>&nbsp;</th><th>Name</th><th>DOB</th><th>Address</th><th>Qualification</th><th>&nbsp;</th></tr>
<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="select rid from applications where jid=$id";
	$a=mysqli_query($con,$sql);
	while($c=mysqli_fetch_assoc($a))
	{
		$id=$c['rid'];
		$sql="select id,name, dob, resume, pic, address,qualification from request where id=$id";
		$a=mysqli_query($con,$sql);
		while($b=mysqli_fetch_assoc($a))
		{
			?>
			<tr style="background-color:#fff"><td><img src="<?php echo $b['pic'];?>" style="height:65px; width:65px;"></td><td><?php echo $b['name'];?></td><td><?php echo $b['dob'];?></td><td><?php echo $b['address'];?></td><td><?php echo $b['qualification'];?></td><td><a href="<?php echo $b['resume'];?>">Resume</a></td></tr>
            <?php
		}
	}
}
?>
</table>