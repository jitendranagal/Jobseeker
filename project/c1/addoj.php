<?php
$id="";
if(isset($_GET['id']))
{
		$c=$_GET['id'];
		$a=mysqli_query($con,"select id,pid,name,number,form_date,last_date,exam_date,join_date,salary,qualification,mi_age,ma_age,job_area from jobs where id=$c");
		$data=mysqli_fetch_assoc($a);
}
if(isset($_POST['name']))
{
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	addedit("jobs",$_POST,$id);
	header("Location:index.php?mod=c1&do=lioj.php");
}
if(isset($_GET['d']))
{
	$id=$_GET['d'];
	$sql="delete from jobs where id='$id'";
	echo $sql;
	$a=mysqli_query($con,$sql);
	header("Location:index.php?mod=c1&do=basic.php");
}
//---------edit form------------//
?>
<form method="post">
<table style="margin-top:2%; font-size:20px; margin-bottom:2%;">
<tr><th colspan="2" style="background-color:#258;"><h2 style="color:#fff">Vacancy form</h2></th></tr>
<tr><th>Vacancy's Name</th><td><select name="name" style="width:100%"><option>Select Vacancy</option><?php $rs=mysqli_query($con ,"select name from toj");while($a=mysqli_fetch_assoc($rs)){?><option value="<?php echo $a['name'];?>" <?php if(isset($data['name']) && $data['name']==$a['name']){?>selected<?php }?>><?php echo $a['name'];?></option><?php } ?></select> <?php if(isset($_GET['id'])){?><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/><?php }?><?php if(!isset($_GET['id'])){?><input type="hidden" name="pid" value="<?php echo $_SESSION['logindtl'][0]['id'];?>"/><?php }?></td></tr>
<tr><th>Age</th><td>Min : <select name="mi_age" style="width:25%"> <?php for($i=18;$i<=36;$i++) { ?> <option value="<?php echo $i; ?>" <?php if(isset($data['name'])&& $data['mi_age']==$i){?>selected<?php }?>><?php echo $i; ?></option><?php }?></select>&nbsp;||&nbsp;Max : <select name="ma_age" style="width:25%" required> <?php for($i=18;$i<=36;$i++) { ?> <option value="<?php echo $i; ?>" <?php if(isset($data['name'])&& $data['ma_age']==$i){?>selected<?php }?>><?php echo $i; ?></option><?php }?></select></td></tr>
<tr><th>Number Of vacancies</th><td><input type="number" name="number" required placeholder="Enter Number Of Vacancies Here" style="width:100%; line-height:180%; font-size:15px" value="<?php if(isset($data['number'])&&$data['number']){echo $data['number'];}?>" min="1"/></td></tr>
<tr><th>Application Begin From</th><td><input type="date" style="width:100%; line-height:180%; font-size:15px" name="form_date" placeholder="yyyy-mm-dd" required value="<?php if(isset($data['form_date'])&&$data['form_date']){echo $data['form_date'];}?>"></td></tr>
<tr><th>Last Date of Application</th><td><input type="date" style="width:100%; line-height:180%; font-size:15px" name="last_date" placeholder="yyyy-mm-dd" required value="<?php if(isset($data['last_date'])&&$data['last_date']){echo $data['last_date'];}?>"></td></tr>
<tr><th>Examination Date</th><td><input type="date" name="exam_date" placeholder="yyyy-mm-dd" style="width:100%; line-height:180%; font-size:15px" required value="<?php if(isset($data['exam_date'])&&$data['exam_date']){echo $data['exam_date'];}?>"></td></tr>
<tr><th>Joining Date</th><td><input type="date" name="join_date" placeholder="yyyy-mm-dd" style="width:100%; line-height:180%; font-size:15px" required value="<?php if(isset($data['join_date'])&&$data['join_date']){echo $data['join_date'];}?>"></td></tr>
<tr><th>Job Area</th><td><input type="text" name="job_area" required placeholder="Enter Circle Name Here" value="<?php if(isset($data['job_area'])&&$data['job_area']){echo $data['job_area'];}?>"></td></tr>
<tr><th>Education Qualification</th><td><select multiple name="qualification[]" style="width:100%"><option>***Select degree***</option><?php $ret=mysqli_query($con,"Select name from degree");while($m=mysqli_fetch_assoc($ret)){?><option value="<?php echo $m['name'];?>" <?php if(isset($data['qualification'])&& $data['qualification']==$m['name']){?>selected<?php }?>><?php echo $m['name'];?></option><?php } ?></select></td></tr>

<tr><th>Salary</th><td><input type="number" name="salary" placeholder="Enter Amount Of Salary Here (P.A.)" min="150000" <?php if(isset($data['salary'])){?>value="<?php echo $data['salary']?>"<?php }?>style="width:100%; line-height:180%; font-size:15px"/><input type="hidden" name="pid" value="<?php echo $_SESSION['logindt']['id'];?>"></td></tr>
<tr><th colspan="2"><input type="reset" value="Clear"/><input type="submit"  value="Notify"/></th></tr>
</table>
</form>