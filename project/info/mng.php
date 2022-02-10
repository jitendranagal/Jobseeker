<?php 
if($_SESSION['logindt']['ut']=='nr')
{
	$id=$_SESSION['logindt']['pic'];
	$sql="select username, password, backcon, email from personal where pic='$id'";
	$a=mysqli_query($con,$sql);
	$c=mysqli_fetch_assoc($a);
}
if($_SESSION['logindt']['ut']=='reg')
{
	$id=$_SESSION['logindt']['pic'];
	$sql="select username, password, backcon, email from request where pic='$id'";
	$a=mysqli_query($con,$sql);
	$c=mysqli_fetch_assoc($a);
}
?>
<table id="tab" <?php if(isset($_GET['edit']) && $_GET['edit']=='delacc'){?> style="height:90%"<?php }?>>
<?php if(!isset($_GET['edit'])){?>
<tr><td style="width:30%">Username</td><td>:</td><td style="width:30%"><?php echo $c['username'];?></td><th><a href="index.php?mod=info&do=mngac.php&edit=username" style=" text-decoration:none"><input type="button" value="&raquo;" style="border-radius:25px; width:17%; line-height:150%; font-weight:bold"></a></th></tr>
<tr><td style="width:30%">Password</td><td>:</td><td style="width:30%"><a href="index.php?mod=info&do=mngac.php&edit=password&proc=one" style="text-decoration:none">Change Password </a></td></tr>
<tr><td style="width:30%">Backup Contact</td><td>:</td><td style="width:30%"><?php echo $c['backcon'];?></td><th><a href="index.php?mod=info&do=mngac.php&edit=back_con" style=" text-decoration:none"><input type="button" value="&raquo;" style="border-radius:25px; width:17%; line-height:150%; font-weight:bold"></a></th></tr>
<tr><td style="width:30%">Email id</td><td>:</td><td style="width:30%"><?php echo $c['email'];?></td><th><a href="index.php?mod=info&do=mngac.php&edit=mail" style=" text-decoration:none"><input type="button" value="&raquo;" style="border-radius:25px; width:17%; line-height:150%; font-weight:bold"></a></th></tr>
<tr><td style="width:30%">Delete Account</td><td>:</td><th><a href="index.php?mod=info&do=mngac.php&edit=delacc&proc=one" style=" text-decoration:none"><input type="button" value="&raquo;" style="border-radius:25px; width:17%; line-height:150%; font-weight:bold"></a></th><td></td></tr>
<?php }else{
if($_GET['edit']=='username'){
if(isset($_POST['username'])){if($_POST['username']!=NULL){if($_SESSION['logindt']['ut']=="reg"){addedit('request',$_POST,$_SESSION['logindt']['id']);$_SESSION['logindt']['username']=$_POST['username'];}else{addedit('personal',$_POST,$_SESSION['logindt']['id']);$_SESSION['logindt']['username']=$_POST['username'];}header('location:index.php?mod=info&do=mngac.php');}}?>
<tr><td style="width:30%">Enter New Username</td><td>:</td><td style="width:30%"><form method="post" action="index.php?mod=info&do=mngac.php&edit=username"><input type="text" name="username" value="<?php echo $c['username'];?>"></td><th><input type="submit" value="save" style="border-radius:25px; width:27%; line-height:150%; font-weight:bold"></a></form><a href="index.php?mod=info&do=mngac.php" style="text-decoration:none"><input type="button" value="Cancel" style="border-radius:25px; width:30%; line-height:200%; font-weight:bold"></a></th></tr>
<?php }
if($_GET['edit']=='back_con'){
if(isset($_POST['backcon'])){if($_POST['backcon']!=NULL){if($_SESSION['logindt']['ut']=="reg"){addedit('request',$_POST,$_SESSION['logindt']['id']);}else{addedit('personal',$_POST,$_SESSION['logindt']['id']);}header('location:index.php?mod=info&do=mngac.php');}}?>
<tr><td style="width:30%">Enter New Backup Contact no.</td><td>:</td><td style="width:30%"><form method="post" action="index.php?mod=info&do=mngac.php&edit=back_con"><input type="text" name="backcon" value="<?php echo $c['backcon'];?>"></td><th><input type="submit" value="save" style="border-radius:25px; width:17%; line-height:150%; font-weight:bold"></a></form><a href="index.php?mod=info&do=mngac.php" style="text-decoration:none"><input type="button" value="Cancel" style="border-radius:25px; width:20%; line-height:200%; font-weight:bold"></a></th></tr>
<?php }
if($_GET['edit']=='mail'){
if(isset($_POST['email'])){if($_POST['email']!=NULL){if($_SESSION['logindt']['ut']=="reg"){addedit('request',$_POST,$_SESSION['logindt']['id']);}else{addedit('personal',$_POST,$_SESSION['logindt']['id']);}header('location:index.php?mod=info&do=mngac.php');}}?>
<tr><td style="width:30%">Enter New E-mail address</td><td>:</td><td style="width:30%"><form method="post" action="index.php?mod=info&do=mngac.php&edit=mail"><input type="text" name="email" value="<?php echo $c['email'];?>" style="width:120%"></td><th><input type="submit" value="save" style="border-radius:25px; width:17%; line-height:150%; font-weight:bold"></a></form><a href="index.php?mod=info&do=mngac.php" style="text-decoration:none"><input type="button" value="Cancel" style="border-radius:25px; width:20%; line-height:200%; font-weight:bold"></a></th></tr>
<?php }
if($_GET['edit']=='delacc'){
if(isset($_GET['proc']) && $_GET['proc']=='one'){?>
<tr><td style="width:30%">Enter E-mail address</td><td>:</td><td style="width:30%"><form method="post" action="index.php?mod=info&do=mngac.php&edit=delacc&proc=two"><input type="text" name="email" required style="width:120%"></td><td style="width:50%"></td></tr>
<tr><td style="width:30%">Enter Contact number</td><td>:</td><td style="width:30%"><input type="text" name="contact" required style="width:120%"></td><td style="width:50%"></td></tr>
<tr><td style="width:30%">Enter Password</td><td>:</td><td style="width:30%"><input type="password" name="password" required style="width:120%"></td><td style="width:50%"></td></tr>
<tr><td style="width:30%"><?php $a="abcdABCDefghEFGHijklIJKLmnopMNOPqrstQRSTuvwxYZyzUVWX1234567890"; $a=substr(str_shuffle($a),0,4);?><input type="hidden" name="qr" value="<?php echo $a;?>"><input type="button" value="<?php echo $a;?>" disabled style="width:80%; height:90%; font-size:36px; border:thin; color:#999; background-color:#888;"></td><td>:</td><td style="width:30%"><input type="text" name="qr1" required style="width:120%"></td><td style="width:50%"></td></tr>
<tr><th><input type="submit" value="Delete" style="border-radius:25px; width:50%; line-height:150%; font-weight:bold; height:25px"></form><a href="index.php?mod=info&do=mngac.php" style="text-decoration:none"><input type="button" value="Cancel" style="border-radius:25px; width:52%; line-height:150%; font-weight:bold; height:28px;"></a></th></tr>
<?php }
else if(isset($_GET['proc']) && $_GET['proc']=='two'){
	if($_POST['qr1']==$_POST['qr']){
		$_POST['password']=md5($_POST['password']);
		if($_POST['password']==$_SESSION['logindt']['password']){
			if($_POST['contact']==$_SESSION['logindt']['contact'] && $_POST['email']==$c['email']){
				print_r($_SESSION['logindt']);
				$id=$_SESSION['logindt']['id'];
				if($_SESSION['logindt']['ut']=='reg')
				{
					$sql="select resume from request where id=$id";
					$a=mysqli_query($con,$sql);
					$a=mysqli_fetch_assoc($a);
					unlink($a['resume']);
				}
				unlink($_SESSION['logindt']['pic']);
				$sql="delete from request where id=$id";
				$a=mysqli_query($con,$sql);
				session_destroy();
				header('location:index.php');
			}
			else
			{
				echo "contact not match ";
			}
		}
		else
		{
			echo "password not match";
		}
	}
	else
	{
		echo "qr not match";
	}
}
}
if($_GET['edit']=='password'){
	if($_GET['proc']=='one'){
?>
<form method="post" action="index.php?mod=info&do=mngac.php&edit=password&proc=two">
<?php if(isset($_GET['err']) && $_GET['err']==1){?><tr><th colspan="4" style=" color:#900; font-size:22px">Please Enter Correct password!</th></tr><?php }?>
<tr><td style="width:25%;">Enter Password to change password</td><td>:</td><td><input type="password" required name="password" style="line-height:100%; width:70%"/></td><td>&nbsp;</td></tr>
<tr><th colspan="4"><input type="submit" value="Proceed" style="height:28px; width:100px"></form><a href="index.php?mod=info&do=mngac.php" style="text-decoration:none"><input type="button" value="Cancel" style=" width:100px; line-height:150%; font-weight:bold; height:33px;"></a></th></tr>
<?php
	}
	else if($_GET['proc']=='two')
	{
		if(md5($_POST['password'])==$_SESSION['logindt']['password'])
		{
?>
<form method="post" action="index.php?mod=info&do=mngac.php&edit=password&proc=three">
<tr><td style="width:25%">Enter New Password</td><td>:</td><td><input type="password" required name="password" style="line-height:100%; width:50%"/></td><td>&nbsp;</td></tr>
<tr><td style="width:25%">Re-Enter New Password</td><td>:</td><td><input type="password" required name="password1" style="line-height:100%; width:50%"/></td><td>&nbsp;</td></tr>
<tr><td><?php $a="abcdABCDefghEFGHijklIJKLmnopMNOPqrstQRSTuvwxYZyzUVWX1234567890"; $a=substr(str_shuffle($a),0,4);?><input type="hidden" name="qr" value="<?php echo $a;?>"><input type="button" value="<?php echo $a;?>" disabled style="width:100%; line-height:150%; font-size:36px; border:thin; color:#999; background-color:#888;"></td><td>&nbsp;</td><td><input type="text" name="capcha" required style="width:50%; height:45px"><input type="hidden" name="step" value="4"></td></tr>
<tr><th colspan="4"><input type="submit" value="Change" style="height:28px; width:100px"></form><a href="index.php?mod=info&do=mngac.php" style="text-decoration:none"><input type="button" value="Cancel" style=" width:100px; line-height:150%; font-weight:bold; height:33px;"></a></th></tr>
<?php
		}
		else
		{
			header("location:index.php?mod=info&do=mngac.php&edit=password&proc=one&err=1");
		}
	}
	else if($_GET['proc']=='three')
	{
		if($_POST['qr']==$_POST['capcha']){
			if($_POST['password']!=NULL && $_POST['password1']!=NULL)
			{
				if(($_POST['password']==$_POST['password1']))
				{
					$contact=$_SESSION['logindt']['id'];
					$password=md5($_POST['password']);
					unset($_POST);
					$_POST['password']=$password;
					if($_SESSION['logindt']['ut']=="reg")
						$table='request';
					else if($_SESSION['logindt']['ut']=="employers")
						$table='personal';
					addedit($table,$_POST,$contact);
					$_SESSION['logindt']['password']=$password;
					unset($_POST);
					header("location:index.php?mod=info&do=mngac.php");
				}
				else
				{
					header("location:index.php?mod=info&do=mngac.php&edit=password&proc=two&err=1");
				}
			}
			else
			{
				header("location:index.php?mod=info&do=mngac.php&edit=password&proc=two&err=2");
			}
		}
		else
		{
			header("location:index.php?mod=info&do=mngac.php&edit=password&proc=two&err=3");
		}
	}
	}
}?>
</table>