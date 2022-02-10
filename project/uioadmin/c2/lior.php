<?php
if(isset($_GET['mrid']))
{
	$id=$_GET['mrid'];
	$a="update msg set status='seen' where id=$id";
	$sql=mysqli_query($con,$a);
	if($_GET['vi']=='report')
	header("location:index.php?mod=c2&do=lior.php&vi=report&action=unseen");
	else
	header("location:index.php?mod=c2&do=lior.php&vi=message&action=unseen");
}
if(isset($_GET['umrid']))
{
	$id=$_GET['umrid'];
	$a="update msg set status='unseen' where id=$id";
	$sql=mysqli_query($con,$a);
	if($_GET['vi']=='report')
	header("location:index.php?mod=c2&do=lior.php&vi=report&action=unseen");
	else
	header("location:index.php?mod=c2&do=lior.php&vi=message&action=unseen");
}
?>
<table width="800px" style="padding:0">
    <tr><?php if($_GET['vi']=='report'){?><th colspan="6" style="width:50%"  bgcolor="#8f8978"><a href="index.php?mod=c2&do=lior.php&vi=report" style="color:#fff; text-decoration:none; font-size:30px;">Reports</a></th><?php }else{ ?><th colspan="6" bgcolor="#8f8978"><a href="index.php?mod=c2&do=lior.php&vi=message" style="color:#fff; text-decoration:none; font-size:30px;">Messages</a></th><?php }?></tr>
    <tr style="background-color:#9f9f9f" <?php if($_GET['action']=='seen'){?> style="background-color:#8f8978;" <?php }else{?><?php }?>><th colspan="3" <?php if($_GET['action']=='seen'){?> style="background-color:#8f8978;" <?php }else{?> style="background-color:#9f9f9f" <?php }?> style=" max-width:50%;"><a href="<?php if($_GET['vi']=='message' && isset($_GET['vi'])){echo "index.php?mod=c2&do=lior.php&vi=message&action=seen";} else if($_GET['vi']=='report' && isset($_GET['vi'])){echo "index.php?mod=c2&do=lior.php&vi=report&action=seen";}?>" style="color:#FFFFFF; font-size:20px;">Read</th></a><th colspan="3" <?php if($_GET['action']=='unseen'){?> style="background-color:#8f8978;" <?php }else{?> style="background-color:#9f9f9f" <?php }?> style=" width:50%;"><a href="<?php if($_GET['vi']=='message' && isset($_GET['vi'])){echo "index.php?mod=c2&do=lior.php&vi=message&action=unseen";} else if($_GET['vi']=='report' && isset($_GET['vi'])){echo "index.php?mod=c2&do=lior.php&vi=report&action=unseen";}?>" style="color:#FFFFFF; font-size:20px;">Unread</th></a></tr>
    <tr>
    	<th>S.No.</th>
        <th>Name</th>        
        <th>E-mail</th>        
        <th>subject</th>
        <th>message</th>
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
	$a="select id,sender,msg,subject,mail,status from msg limit $index,10";
	if(isset($_GET['vi']) && $_GET['vi']=='message')
		$a="select id,sender,msg,subject,mail,status from msg where type='message' limit $index,10";
	else if(isset($_GET['vi']) && $_GET['vi']=='report')
		$a="select id,sender,msg,subject,mail,status from msg where type='report' limit $index,10";
	$sql=mysqli_query($con,$a);
		$act='seen';
		if(isset($_GET['action']))
		{
			$act=$_GET['action'];
		}
		while($data=mysqli_fetch_assoc($sql))
		{
			if($data['status']==$act){
			?><tr style="background-color:#CCCCCC"> <?php
			echo "<td>".++$index."</td>";
            echo "<td>".ucfirst($data['sender'])."</td>";
			echo "<td>".$data['mail']."</td>";
			echo "<td>".ucfirst($data['subject'])."</td>";
			echo "<td>".ucfirst($data['msg'])."</td>";
?>
			<th><a href="index.php?mod=c2&do=vior.php&viewid=<?php echo $data['id'];?>">View</a><br><?php if($act=='unseen'){?><a href="index.php?mod=c2&do=lior.php&mrid=<?php echo $data['id']; if($_GET['vi']=='message'){echo "&vi=message";}else{echo "&vi=report";}?>">Mark As Read</a><?php } else if($act=='seen'){?><a href="index.php?mod=c2&do=lior.php&umrid=<?php echo $data['id']; if($_GET['vi']=='message'){echo "&vi=message";}else{echo "&vi=report";}?>">Mark As Unread</a><?php }?></th>
<?php
			echo "</tr>";
		}}
if(mysqli_num_rows($sql)==10 && $page==1)
{
?>
<tr><th colspan="12"><a href="index.php?mod=c2&do=lior.php&page=<?php echo ++$page;?>">Next</a></th></tr>
<?php
}
else if(mysqli_num_rows($sql)==10 && $page>=2)
{
?>
	<tr><th colspan="6"><a href="index.php?mod=c2&do=lior.php&page=<?php echo ++$page;?>">Next</a></th><th colspan="6"><a href="index.php?mod=c2&do=lior.php&page=<?php echo --$_GET['page'];?>">Previous</a></th></tr>
<?php
}
else if(mysqli_num_rows($sql)<10 && $page!=1)
{
?>
<tr><th colspan="12"><a href="index.php?mod=c2&do=lior.php&page=<?php echo --$page;?>">Previous</a></th></tr>
<?php
}
?>
</table>