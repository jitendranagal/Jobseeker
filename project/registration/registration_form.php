<?php
if(isset($_POST['name']))
{
	
$a=$_POST['name'];
$b=strlen($a);
for($i=0;$i<$b;$i++)
{
if(ctype_digit($a[$i]))
{
	if(isset($_GET['log']))
	{
		header('location:index.php?mod=registration&do=registration_form.php&log=emp&err=01');
		exit;
	}
	else
	{
	header('localhost:index.php?mod=registration&do=registration_form.php&err=01');
	exit;
	}
}
}
	extract($_POST);
	if(!isset($_GET['log']))
	if ($name==NULL || $address==NULL || $contact==NULL || $email==NULL || $qualification==NULL || $password==NULL || $username==NULL)
	{
		$err=1;
	}
		$_POST['password']=md5($password);
		//PIC UPLOAD
		$a=$_FILES['pic']['name'];
		$move="upfiles/".time().$a;
		move_uploaded_file($_FILES['pic']['tmp_name'],$move);
		$_POST['pic']=$move;
		if(!isset($_GET['log']))
		{
		//CV UPLOAD
		$a=$_FILES['resume']['name'];
		$move="cv/".time().$a;
		move_uploaded_file($_FILES['resume']['tmp_name'],$move);
		$_POST['resume']=$move;
		}
		//sending
		unset($_POST['mod']);
		unset($_POST['do']);
		$_POST['dob']="$year-$month-$day";
		unset($_POST['year']);
		unset($_POST['day']);
		unset($_POST['month']);
		if(!isset($_POST['log']))
		{
		addedit('request',$_POST);
		$_SESSION['logindt']=$_POST;
		$_SESSION['logindt']['ut']="employee";
		header('location:index.php');
		}
		else
		{
		unset($_POST['log']);
		addedit('personal',$_POST);
		$_SESSION['logindt']=$_POST;
		$_SESSION['logindt']['ut']="employers";
		header('location:index.php?mod=c1&do=basic.php');
		}
	
	
}	
?>
<?php
$a=mysqli_connect('localhost','root','','jobseeker');
$sql="select name from degree";
$b=mysqli_query($a,$sql);
?>
<form enctype="multipart/form-data" method="post">
<table>
<tr><th colspan="2"><?php if(isset($_GET['log'])) { ?> Registration form for EMPLOYER</th> <?php } else { ?> Registration form for EMPLOYEE <?php }?> </tr>
<?php if(isset($err)){?> <tr><th colspan="2" style="font-size:20px; color:#a00"> Please fill all columns to create account! </th></tr> <?php }?>
<input type="hidden" name="mod" value="registration"><?php if(isset($_GET['log'])){?><input type="hidden" name="log" value="emp"><?php }?><input type="hidden"name="do" value ="registration_form.php">
<tr><td> <?php if(isset($_GET['log'])){?> Company Name</td> <?Php } else {?> Name <?php } ?> <td> <input type="text" name="name" required ">  <?php if(isset($_GET['err']) && $_GET['err']=='01'){?><br><err style="color:#00f; font-size:15px;">* NAME CONTAIN CHARACTERS ONLY</err><?php }?></td> </tr>
<tr><td>Address</td><td><textarea name="address" cols="16px" rows="5px" required></textarea></td></tr>
<tr><td>Contact</td><td><input type="text" name="contact" required></td></tr>
<tr><td>E-Mail</td><td><input type="email" name="email" required> </td></tr>
<?php if(!isset($_GET['log'])) {?><tr><td>Qualification</td><td><select name="qualification" required ><option>select qualification</option><?php while($c=mysqli_fetch_assoc($b)){?><option value="<?php echo $c['name'];?>"> <?php echo $c['name'];?></option><?php } ?></select></td></tr><?php } ?>
<tr><td> <?php if(isset($_GET['log'])){?> D.O.INC.</td> <?Php } else {?> D.O.B <?php } ?> <td><select name="year"><option>Year</option><?Php for ($i=date('Y'); $i>=date('Y')-40; $i--){echo "<option value='$i'>$i</option>";}?></select>
<select name="month"><option> month </option><?php for($i=1;$i<=12;$i++){echo "<option value='$i'>$i</option>";}?></select>
<select name="day"><option> day </option> <?php for($i=1;$i<=31;$i++){echo "<option value='$i'>$i</option>";}?></select></td></tr>
<tr><td>User Name</td><td> <input type="text" name="username" required> </td></tr>
<tr><td>Password</td><td> <input type="password" name="password" required> </td></tr>
<tr><td> <?php if(isset($_GET['log'])){?> Logo</td> <?Php } else { ?> Profile pic <?Php } ?> <td><input type="file" name="pic" accept="image/jpeg" required></td></tr>
<?php if(!isset($_GET['log'])){?><tr><td>Resume<td><input type="file" name="resume" accept="application/pdf" required></td></tr><?php } ?>
<tr><td colspan="2"><input type="hidden" name="mod" value="registration"><input type="hidden" name="do" value="registration_form.php"><input type="submit" value="submit"><input type="reset" value="reset"></td></tr>
</table>
</form>