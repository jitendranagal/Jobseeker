<?php
if(isset($_GET['viewid']))
{
	$id=$_GET['viewid'];
	$sql="select id,sender,mail,subject,msg,type from msg where id=$id";
	$sql=mysqli_query($con,$sql);
	$a=mysqli_fetch_assoc($sql);
	$sql="update msg set status='seen' where id=$id";
	$sql=mysqli_query($con,$sql);
}
?>
<table style="border:none; font-size:18px">
<tr><form action="index.php?mod=c2&do=vior.php" method="post"><th>Name of Sender</th><td><?php echo $a['sender'];?></td></tr>
<tr><th>Email address</th><td><?php echo $a['mail'];?></td></tr>
<tr><th>Subject</th><td><?php echo $a['subject'];?></td></tr>
<tr><th><?php if($a['type']=='message'){echo "Message";}else{echo "Report";}?></th><td><?php echo $a['msg'];?></td></tr>
<tr><th>Subject</th><td><?php echo $a['subject'];?></td></tr>
<tr><th>Reply</th><td><textarea name="reply" cols="45px" rows="10px" style="width:50%; height:15%" maxlength="250"></textarea></td></tr>
<tr><th colspan="2"><input type="submit" value="Send"></form><input type="button" formaction=""></th></tr>


</table>