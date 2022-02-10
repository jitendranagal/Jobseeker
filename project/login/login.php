<?php
if(isset($_POST['username']))
{
	extract($_POST);
	if($username==NULL || $password==NULL)
	{
		$err=1;
	}
	else
	{
		$password=md5($password);
		if(isset($_POST['ut']))
		{
			$table="personal";
			$sql="select username,password,name,pic,id from $table where username ='$username' and password ='$password'";
		}
		else
		{
			$table="request";
			$sql="select username,password,name,pic,qualification,id from $table where username ='$username' and password ='$password'";
		}
//		echo $sql;
		$a=mysqli_query($con,$sql);
		if($a)
		{
			if(mysqli_num_rows($a)!=1)
			{
				$err=1;
			}
			else
			{
				$_SESSION['logindt']=mysqli_fetch_assoc($a);
				if(isset($_POST['ut']))
				{
					$_SESSION['logindt']['ut']="nr";
					header('location:index.php?mod=c1&do=basic.php');
				}
				else 
				{
					$_SESSION['logindt']['ut']="reg";
					header('location:index.php?mod=c2&do=basic.php');
				}
			}
		}
		else
		{ 
			$err=1;
		}
	}
}

?>
<form method="post">
<table style="width:100%; font-size:18px;">
<tr><th> <?php if(isset($_GET['log'])){?> Login Employer </th></tr> <?Php } else {?> login Employee <?php } ?>
<?php if(isset($err)) {?> <tr><th style="font-size:20px; color:#a00"> Kindly check your email & password! </th></tr> <?php } ?>
<tr><td align="left">Name<br><input type="text" name="username" required style="width:100%;"></td></tr>
<tr><td style="align:left;">Password<br><input type="password" name="password" required> <?php if (isset($_GET['log'])){?><input type="hidden" name="ut" value="emp"><?php }?></td></tr>
<tr><th><input type="submit" value="login"></th></tr>
</table>
<?php if (isset($_GET['log'])){?><a href="index.php">log in as Employee</a><?php }else{ ?><a href="index.php?log=emp">log in as Employer</a><?php }?> 
</form>