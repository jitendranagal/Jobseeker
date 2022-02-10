<?php
$index=1;
$pid=$_GET['l'];
$a="select jobs.id,jobs.name,`pid`,`qualification`,`number`,`form_date`,`last_date`,`exam_date`,`salary`,`mi_age`,`ma_age`, personal.name AS 'employer' FROM `jobs` LEFT JOIN `personal` ON jobs.pid=$pid AND jobs.pid=personal.id";
//$a="select * from jobs where pid=$pid";
$sql=mysqli_query($con,$a);
?>
<table border="1px" width="800px" align="center">
	<tr >
    	<th colspan="12">List of Jobs</th>
    </tr>
    <tr><th colspan="12" align="right"><a href="index.php?mod=c1&do=addoj.php&l=<?php echo($pid);?>">Add Vacancy</a></th></tr>
    <tr>
    	<th>S.No.</th>
        <th>Employer</th>
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
{
	echo "not fetched"; }
else
{
		while($data=mysqli_fetch_assoc($sql))
		{
			if($data['employer'])
			{
			echo "<tr>";
			echo "<td>".$index++."</td>";
			echo "</td>";
            echo "<td>".$data['employer']."</td>";
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
			<th><a href="index.php?mod=c1&do=addoj.php&id=<?php echo $data['id'];?>">Edit</a><br>
            <a href="index.php?mod=c1&do=addoj.php&l=<?php echo $data['pid'];?>&d=<?php echo $data['id'];?>">Delete</a><br>
            <a href="#">view</a></th>
<?php
			echo "</tr>";
		}
		}
}
?>
</table>