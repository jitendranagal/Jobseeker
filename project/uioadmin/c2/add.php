<?php
$id="";
if(isset($_GET['id']))
{
		$c=$_GET['id'];
		$a=mysqli_query($con,"select * from request where id=$c");
		$data=mysqli_fetch_assoc($a);
}
if(isset($_POST['name']))
{
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		unlink($data['pic']);
	}
	$file=$_FILES['pic']['name'];
	$move="../upfiles/".time()."_promployee_".$file;
	move_uploaded_file($_FILES['pic']['tmp_name'],$move);
	$_POST['pic']=$move;	
	$file=$_FILES['resume']['name'];
	$move="../cv/".time()."_promployee_".$file;
	move_uploaded_file($_FILES['resume']['tmp_name'],$move);
	$_POST['resume']=$move;
	addedit("request",$_POST,$id);
	header('Location:index.php?mod=c2&do=li.php&page=1');
}
if(isset($_GET['d']))
{
	$id=$_GET['d'];
	$fold=$_GET['mod'];
	delete($fold,$id);
	header('Location:index.php?mod=c2&do=li.php');
}
?>
<form method="post" enctype="multipart/form-data">
<table border="1">
<tr><th colspan="2"><h2>Registration form</h2></th></tr>
<tr><th>Name</th><td><input type="text" name="name" required placeholder="enter your name here" value="<?php if(isset($data['name'])&&$data['name']){echo $data['name'];}?>"/></td></tr>
<tr><th>Contact No.</th><td><input type="number" name="contact" required placeholder="enter your Contact No. here" value="<?php if(isset($data['contact'])&&$data['contact']){echo $data['contact'];}?>"/></td></tr>
<tr><th>Address</th><td><textarea name="address" placeholder="enter your address here" required><?php if(isset($data['address'])&&$data['address']){echo $data['address'];}?></textarea></td></tr>
<tr><th>City</th><td><input type="text" name="city" required placeholder="Enter city" value="<?php if(isset($data['city'])&&$data['city']){echo $data['city'];}?>"></td></tr>
<tr><th>State</th><td><input type="text" name="state" required placeholder="Enter state" value="<?php if(isset($data['state'])&&$data['state']){echo $data['state'];}?>"></td></tr>
<tr><th>Gender</th><td><input type="radio" name="gender" value="Male" checked/> Male &nbsp; || &nbsp; <input type="radio" name="gender" value="Female"> Female</td></tr>
<tr><th>Education Qualification</th><td><select multiple name="qualification[]"><option>***Select degree***</option><?php $ret=mysqli_query($con,"Select name from degree");while($m=mysqli_fetch_assoc($ret)){?><option value="<?php echo $m['name'];?>"><?php echo $m['name'];?></option><?php } ?></select></td></tr>
<tr><th>Date of Birth</th><td><input type="date" name="dob" placeholder="yyyy-mm-dd" required value="<?php if(isset($data['dob'])&&$data['dob']){echo $data['dob'];}?>"></td></tr>
<tr><th>Username</th><td><input type="text" placeholder="Enter Your Username" required name="username" value="<?php if(isset($data['username'])&&$data['username']){echo $data['username'];}?>"></td></tr>
<tr><th>Password</th><td><input type="password" placeholder="*********" required name="password" value="<?php if(isset($data['password'])&&$data['password']){echo $data['password'];}?>"></td></tr>
<tr><th><?php if(isset($data['pic'])&&$data['pic']){ ?><img src="<?php echo $data['pic'];?>"  height="55px" width="55px"><?php } else { echo "Select Image";}?></th><td><input type="file" name="pic" required accept="image/jpeg"></td></tr>
<tr><th>Select resume file</th><td><input type="file" name="resume" required accept="application/pdf"></td></tr>
<tr ><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="<?php if(isset($data['username'])&&$data['username']){echo "Update";}else{echo "Create Account";}?>"/> <input type="reset" value="Clear"/></td></tr>
</table>
</form>