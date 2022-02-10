<table border="1px" width="800px" align="center">
	<tr >
    	<th colspan="12">List of Jobseekers</th>
    </tr>
    <tr><th colspan="12" align="right"><a href="index.php?mod=c2&do=add.php">Add account</a></th></tr>
    <tr>
    	<th>S.No.</th>
        <th>Profile</th>        
        <th>Name</th>                
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Contact</th>
        <th>Date of Birth</th>
        <th>Qualification</th>
        <th>Username</th>
        <th>Action</th>
    </tr>
	<?php
	$index=0;$page=1;
	if(isset($_GET['page']))
	{
		$page=$_GET['page'];
		if($page!=1 && $page>1)
			$index=($page-1)*10;
	}
$a="select * from request limit $index,10";
$sql=mysqli_query($con,$a);
if(!$sql)
{
	echo "not fetched"; }
else
{
		while($data=mysqli_fetch_assoc($sql))
		{
			echo "<tr>";
			echo "<td>".++$index."</td>";
			echo "<td>";?>
		<?php if($data['pic'])
			{
				?>
                <img src="<?php echo $data['pic'];?>" height="55px" width="55px" style="border-radius:45px"/>
                <?php
			}else{ echo "N/a";}
		?>
		<?php
			echo "</td>";
            echo "<td>".ucfirst($data['name'])."</td>";
			echo "<td>".ucfirst($data['address'])."</td>";
			echo "<td>".ucfirst($data['city'])."</td>";
			echo "<td>".ucfirst($data['state'])."</td>";
			echo "<td>".$data['contact']."</td>";
			echo "<td>".$data['dob']."</td>";
			echo "<td>".ucfirst($data['qualification'])."</td>";
			echo "<td>".$data['username']."</td>";
?>
			<th><a href="<?php echo $data['resume'];?>">View C.V.</a><br><hr><a href="index.php?mod=c2&do=add.php&id=<?php echo $data['id'];?>">Edit</a><br><hr><a href="index.php?mod=c2&do=add.php&d=<?php echo $data['id'];?>">Delete</a></th>
<?php
			echo "</tr>";
			}
		}
if(mysqli_num_rows($sql)==10 && $page==1)
{
?>
<tr><th colspan="12"><a href="index.php?mod=c2&do=li.php&page=<?php echo ++$page;?>">Next</a></th></tr>
<?php
}
else if(mysqli_num_rows($sql)==10 && $page>=2)
{
?>
	<tr><th colspan="6"><a href="index.php?mod=c2&do=li.php&page=<?php echo ++$page;?>">Next</a></th><th colspan="6"><a href="index.php?mod=c2&do=li.php&page=<?php echo --$_GET['page'];?>">Previous</a></th></tr>
<?php
}
else if(mysqli_num_rows($sql)<10 && $page!=1)
{
?>
<tr><th colspan="12"><a href="index.php?mod=c2&do=li.php&page=<?php echo --$page;?>">Previous</a></th></tr>
<?php
}
?>
</table>