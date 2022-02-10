<?php
if(isset($_POST['sender']))
{
	foreach($_POST as $val)
	{
			if($val==NULL)
			{
				header("location:index.php?mod=info&do=contact_us.php&err=blank");
			}
	}
	unset($_POST['mod']);
	unset($_POST['do']);
	addedit('msg',$_POST);
	header('location:index.php?mod=info&do=contact_us.php&process=success');
}
?>
<span style="width:75%; height:90%; margin-top:1%; float:left; max-height:83.70%; overflow:auto; padding-right:1%; padding-left:1%; box-shadow:1px 0px 0px;">
<?php if(isset($_GET['process'])){ ?>
<dt style="color:#003366; text-align:center; margin-top:20%; font-size:52px">Thank you for sending us your valuable suggetion</dt>
<?php } else{?>
<dt><b>&nbsp;CONTACT US</b></dt>
<dd>&nbsp;We are happy to answer any questions you have or provide you with a estimate. Just send us a message in the form below</dd><br><br>
<form method="post">
<ul style="list-style:none">
<?php if(isset($_GET['err'])){?><li style="color:#933; text-align:center; font-weight:bolder; font-family:Trebuchet MS;">KINDLY FILL ALL COLOMNS!!!</li><?php }?>
<li>&nbsp;Your Name (Required)<br><input type="hidden" value="info" name="mod"><input type="hidden" value="contact_us.php" name="do"><input type="text" name="sender" style="color:#256; height:25px; width:275px; margin-left:10%;" required maxlength="50"></li><br>
<li>&nbsp;Your Email (Required)<br> <input type="email" name="mail" style="color:#256; height:25px; width:275px; margin-left:10%;" required></li><br>
<li>&nbsp;Subject <br> <input type="text" name="subject" style="color:#256; height:25px; width:275px; margin-left:10%;"/></li><br>
<li>&nbsp;Your Message<br> <textarea name="msg" style="color:#256; height:80px; width:275px; margin-left:10%;" required maxlength="250"/></textarea><input type="hidden" name="type" value="message"></li><br>
<li><input type="submit" value="Send" style="height:30px; width:100px; margin-left:15%"></li>
</ul>
</form>
<?php } ?>
</span>
<div style="margin-top:1%; max-height:83.70%;">
<span style="margin-left:14px;">
<ul style="list-style:none;">
<!-- <li><b>&nbsp;Contact : </b> <br>&nbsp;<input type="tel" readonly value="8302025201" style="border:none; height:20px; font-size:15px"/></li> -->
<li><b>&nbsp;On The Web : </b><br> <a href="#" style="text-decoration:none">&nbsp;Facebook</a> <br> <a href="#" style="text-decoration:none">&nbsp;Twitter</a> <br> <a href="#" style="text-decoration:none">&nbsp;Instagram</a></li>
</ul>
</span>
</div>
 