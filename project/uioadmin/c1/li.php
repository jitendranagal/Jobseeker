<table>
	<tr >
    	<th colspan="12" style="">List of Jobseekar</th>
    </tr>
    <tr><th colspan="12" align="right"><a href="index.php?mod=c1&do=add.php">Add account</a></th></tr>
    <tr>
    	<th>S.No.</th>
        <th>Profile</th>        
        <th>Name</th>        
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Mobile No.</th>
        <th>Date of Incor.</th>
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
$a="select * from personal limit $index,10";
$sql=mysqli_query($con,$a);
if(!$sql)
{
	echo "not fetched"; }
else
{
		while($data=mysqli_fetch_assoc($sql))
		{
		echo "<tr>";
			echo "<th>".++$index."</th>";
			echo "<th>"; ?>
<?php if($data['pic'])
			{
				?>
                <img src="<?php echo $data['pic'];?>" height="90" width="90px" style="border-radius:45px"/>
                <?php
			}else{ echo "N/a";}
		?>
<?php
			echo "</th>";
            echo "<th>".$data['name']."</th>";
			echo "<th>".$data['address']."</th>";
			echo "<th>".$data['city']."</th>";
			echo "<th>".$data['state']."</th>";
			echo "<th>".$data['contact']."</th>";
			echo "<th>".$data['dob']."</th>";
			echo "<th>".$data['username']."</th>";
?>
			<th><a href="index.php?mod=c1&do=add.php&id=<?php echo $data['id'];?>">Edit</a><br>
            <a href="index.php?mod=c1&do=add.php&d=<?php echo $data['id'];?>">Delete</a><br>
            <a href="index.php?mod=c1&do=lioj.php&l=<?php echo $data['id'];?>">&nbsp;List&nbsp;Of&nbsp;Jobs</a></th>
<?php
		echo "</tr>";
		}
}
if(mysqli_num_rows($sql)==10 && $page==1)
{
?>
<tr><th colspan="12"><a href="index.php?mod=c1&do=li.php&page=<?php echo ++$page;?>">Next</a></th></tr>
<?php
}
else if(mysqli_num_rows($sql)==10 && $page>=2)
{
?>
	<tr><th colspan="6"><a href="index.php?mod=c1&do=li.php&page=<?php echo ++$page;?>">Next</a></th><th colspan="6"><a href="index.php?mod=c1&do=li.php&page=<?php echo --$_GET['page'];?>">Previous</a></th></tr>
<?php
}
else if(mysqli_num_rows($sql)<10 && $page!=1)
{
?>
<tr><th colspan="12"><a href="index.php?mod=c1&do=li.php&page=<?php echo --$page;?>">Previous</a></th></tr>
<?php
}
?>
</table>