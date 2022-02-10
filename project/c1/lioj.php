<?php
$index=1;
$pid=$_SESSION['logindt']['id'];
$a="select jobs.id,jobs.name,`pid`,`qualification`,`number`,`form_date`,`last_date`,`exam_date`,`salary`,`mi_age`,`ma_age`, personal.name AS 'employer' FROM `jobs` LEFT JOIN `personal` ON jobs.pid=$pid AND jobs.pid=personal.id";
//$a="select * from jobs where pid=$pid";
$sql=mysqli_query($con,$a);
?>
<table align="center" style="width:90%; font-size:16px; margin:2% 5% 0% 5%; border:double; background-color:#003399">
	<tr style="background-color:#eeeeee">
    	<th colspan="12">List of Jobs</th>
    </tr>
    <tr style="background-color:#ffffff"><th colspan="12" align="right"><a href="index.php?mod=c1&do=addoj.php">Add Vacancy</a></th></tr>
    <tr style="background-color:#eeeeee">
    	<th>S.No.</th>
        <th>Vacancy For</th>        
        <th>Number Of Vacancies</th>
        <th>Qualification</th>
        <th>Application Begin from</th>
        <th>Last Date</th>
        <th>Examination Date</th>
        <th>Salary up-to (p.a)</th>
        <th>Minimum Age</th>
        <th>Maximum Age</th>
        <th>Action</th>
    </tr>
<?php
if(!$sql)
{?>
<tr><th colspan="11" style="color:#f8e8e8">No Vacancies provided!</th></tr>
<?php }
else
{
		while($data=mysqli_fetch_assoc($sql))
		{
			if($data['employer'])
			{?>
			<tr style="background-color:#FFFFFF">
			<?php
			echo "<td>".$index++."</td>";
			echo "</td>";
			echo "<td>".$data['name']."</td>";
			echo "<td>".$data['number']."</td>";
			echo "<td>".str_replace(",","<br>",$data['qualification'])."</td>";
			echo "<td>".$data['form_date']."</td>";
			echo "<td>".$data['last_date']."</td>";
			echo "<td>".$data['exam_date']."</td>";
			echo "<td>".$data['salary']."</td>";
			echo "<td>".$data['mi_age']."</td>";
			echo "<td>".$data['ma_age']."</td>";
?>
			<th>
            <?php if($_GET['do']!='basic.php'){?>
            <a href="index.php?mod=c1&do=addoj.php&id=<?php echo $data['id'];?>">Edit</a><br>
            <a href="index.php?mod=c1&do=addoj.php&d=<?php echo $data['id'];?>">Delete</a><br><?php }?>
            <?php if($_GET['do']=='basic.php'){?><a href="index.php?mod=c1&do=addoj.php&id=<?php echo $data['id'];?>&act=view">View</a><?php }?></th>
<?php
			echo "</tr>";
		}
		}
}
?>
</table>