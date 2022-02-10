<?php
if(isset($_SESSION['logindt']) && isset($_POST['rid']))
{
	unset($_POST['mod']);
	unset($_POST['do']);
	addedit('applications',$_POST);
	header('location:index.php?mod=c2&do=basic.php');
}
if(isset($_POST['cid']))
{
	unset($_POST['mod']);
	unset($_POST['do']);
	$z=$_POST['cid'];
	$sql="delete from applications where id=$z";
	mysqli_query($con,$sql);
	header('location:index.php?mod=c2&do=basic.php');
}
?>
<?php
if(isset($_GET['ref']))
{
	$id=$_GET['ref'];
	$sql="SELECT jobs.name as 'post', personal.name as 'name', form_date, last_date, number, jobs.id as 'jid', personal.pic, exam_date, join_date, salary, qualification, mi_age, ma_age, job_area FROM jobs LEFT JOIN personal ON jobs.pid=personal.id where jobs.id=$id";
	$a=mysqli_query($con,$sql);
	$c=mysqli_fetch_assoc($a);
	$z=$_SESSION['logindt']['id'];
	$sq1="select id, jid, rid, name from applications where rid=$z";
	$sq1=mysqli_query($con,$sq1);
	$i=-1;
	while($z=mysqli_fetch_assoc($sq1)){$i++;$x[$i]=$z;};
}
else
{
	$id=$_GET['eref'];
	$sql="select name, address,city,state,contact,dob,pic,id from personal where id=$id";
	$a=mysqli_query($con,$sql);
	$c=mysqli_fetch_assoc($a);
}
?>
<table style="text-align:left; width:98%; line-height:163%; background-color:#fff">
<tr><td colspan="2"><a href="<?php if(isset($_GET['ref'])){ echo "index.php?mod=c2&do=basic.php";} else if(isset($_GET['eref'])){ echo "index.php?mod=c1&do=search_com.php";}?>">Back</a><hr><br></td></tr>
<tr><td rowspan="11" style="width:30%; height:350px; text-align:center"><img src="<?php echo $c['pic'];?>" style="width:80%; height:80%;"></td><td>Name :-  <?php echo ucfirst($c['name'])?></td></tr>
<?php
if(isset($_GET['ref']))
{
?>
<tr><td>Vacancy for :- <?php echo ucfirst($c['post'])?></td></tr>
<tr><td>Number Of Vacancies :-  <?php echo $c['number']?></td></tr>

<tr><td>Salary :- <?php echo $c['salary']?></td></tr>
<tr><td>min & max age :- <?php echo $c['mi_age']." - ".$c['ma_age']?></td></tr>
<tr><td>Application Begin From :- <?php echo $c['form_date']?></td></tr>
<tr><td>Last Date For Application :- <?php echo $c['last_date']?></td></tr>
<tr><td>Examination Date :- <?php echo $c['exam_date']?></td></tr>
<tr><td>Joining date :- <?php echo $c['join_date']?></td></tr>
<tr><td>Area :-  <?php echo ucfirst($c['job_area'])?></td></tr>
<tr><td>Qualification :-  <?php echo ucfirst($c['qualification'])?><br><br></td></tr>
<?php $rows=1; if(isset($x))foreach($x as $val){if($val['jid']==$_GET['ref']){$rows=0; $in=$val;}}if($rows!=0){?><form method="post">
<input type="hidden" name="mod" value="c2">
<input type="hidden" name="do" value="disoj.php">
<input type="hidden" name="jid" value="<?php echo $c['jid'] ?>">
<input type="hidden" name="rid" value="<?php echo $_SESSION['logindt']['id']?>">
<input type="hidden" name="name" value="<?php echo $c['name']?>">
<tr><td></td><th><input type="submit" value="Apply" style="width:30%; line-height:250%; font-size:14px; background-color:#0F4; border-radius:10px; font-weight:bolder; font-family:'Lucida Sans','DejaVu Sans'"></form>
<input type="button" value="Report" style="width:30%; line-height:250%; font-size:14px; background-color:#f04; border-radius:10px"><?php }else{ ?><tr><td></td><th><form method="post" action="index.php?mod=c2&do=disoj.php"><input type="hidden" name="cid" value="<?php echo $in['id'] ?>"><input type="submit" value="Cancel" style="width:30%; line-height:250%; font-size:14px; background-color:#F04; border-radius:10px; font-weight:bolder; font-family:'Lucida Sans','DejaVu Sans'"></form><?php }?></th></tr>
<?php
}
else
{
?>
<tr><td>Address :- <?php echo ucfirst($c['address']).", ".ucfirst($c['city'])." ,".ucfirst($c['state'])?></td></tr>
<tr><td>Contact No. :-  <?php echo $c['contact']?></td></tr>
<tr><td>Date Of Incorporation :- <?php echo $c['dob']?></td></tr>
<?php 
}
?>
</table>
<hr style="width:97%; margin:0 auto">