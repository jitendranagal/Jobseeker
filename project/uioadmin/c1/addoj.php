<?php
$id="";
if(isset($_GET['id']))
{
		$c=$_GET['id'];
		$a=mysqli_query($con,"select name,contect,address,state,city,dob,username,password,pic from personal where id=$c");
		$data=mysqli_fetch_assoc($a);
}
if(isset($_POST['name']))
{
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	addedit("jobs",$_POST,$id);
	$l=$_POST['pid'];
	header("Location:index.php?mod=c1&do=lioj.php&l=$l");
}
if(isset($_GET['d']))
{
	$l=$GET['l'];
	$id=$_GET['d'];
	$fold=$_GET['do'];
	delete($fold,$id);
	header("Location:index.php?mod=c1&do=basic.php");
}
//---------edit form------------//
?>
<form method="post">
<table border="1">
<tr><th colspan="2"><h2>Vacancy form</h2></th></tr>
<tr><th>Vacancy's Name</th><td><input type="text" name="name" required placeholder="Enter Designation Name Here" value="<?php if(isset($data['name'])&&$data['name']){echo $data['name'];}?>"/><input type="hidden" name="pid" value="<?php echo $_GET['l'];?>"/></td></tr>
<tr><th>Age</th><td>Min : <select name="mi_age"> <?php for($i=18;$i<=36;$i++) { ?> <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select>&nbsp;||&nbsp;Max : <select name="ma_age" required> <?php for($i=18;$i<=36;$i++) { ?> <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select></td></tr>
<tr><th>Number Of vacancies</th><td><input type="number" name="number" required placeholder="Enter Number Of Vacancies Here" value="<?php if(isset($data['contect'])&&$data['contect']){echo $data['contect'];}?>" min="1"/></td></tr>
<tr><th>Application Begin From</th><td><input type="date" name="form_date" placeholder="yyyy-mm-dd" required value="<?php if(isset($data['form_date'])&&$data['form_date']){echo $data['form_date'];}?>"></textarea></td></tr>
<tr><th>Last Date of Application</th><td><input type="date" name="last_date" placeholder="yyyy-mm-dd" required value="<?php if(isset($data['form_date'])&&$data['form_date']){echo $data['form_date'];}?>"></textarea></td></tr>
<tr><th>Examination Date</th><td><input type="date" name="exam_date" placeholder="yyyy-mm-dd" required value="<?php if(isset($data['form_date'])&&$data['form_date']){echo $data['form_date'];}?>"></textarea></td></tr>
<tr><th>Joining Date</th><td><input type="date" name="join_date" placeholder="yyyy-mm-dd" required value="<?php if(isset($data['form_date'])&&$data['form_date']){echo $data['form_date'];}?>"></textarea></td></tr>
<tr><th>Job Area</th><td><input type="text" name="job_area" required placeholder="Enter Circle Name Here" value="<?php if(isset($data['city'])&&$data['city']){echo $data['city'];}?>"></td></tr>
<tr><th>Education Qualification</th><td><select multiple name="qualification[]"><option>***Select degree***</option><?php $ret=mysqli_query($con,"Select name from degree");while($m=mysqli_fetch_assoc($ret)){?><option value="<?php echo $m['name'];?>"><?php echo $m['name'];?></option><?php } ?></select></td></tr>
<tr><th>Minimum Expirience</th><td><select name="expirience"> <?php for($i=0;$i<=10;$i++) { ?> <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select></td></tr>
<tr><th>Salary</th><td><input type="number" name="salary" placeholder="Enter Amount Of Salary Here (P.A.)" min="15000"/></td></tr>
<tr ><th colspan="2"><input type="reset" value="Clear"/><input type="submit" value="Notify"/></th></tr>
</table>
</form>