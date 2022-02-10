<table style="width:98%">
<tr><th>Employer</th><th>Vacancy for</th><th>Number Of Vacancies</th><th>Salary</th><th>Last date</th><th>&nbsp;</th></tr>
<?php
if($_SESSION['logindt']['ut']=='reg' && isset($_SESSION['logindt']))
{
	$id=$_SESSION['logindt']['id'];
	$sql="select jid, name from applications where rid=$id";
	$a=mysqli_query($con,$sql);
	$d=0;
	while($c=mysqli_fetch_assoc($a))
	{
		$data[$d]=$c;
		$d++;
		$line=mysqli_num_rows($a);
	}
	$i=0;
	if(isset($line))
	while($i<$line)
	{
		$value=$data[$i]['jid'];
		$sql="select id, number, name, last_date, salary from jobs where id=$value";
		$a=mysqli_query($con,$sql);
		$a=mysqli_fetch_assoc($a);
		?>
        <tr style="background-color:#FFFFFF"><td><?php echo($data[$i]['name']);?></td><td><?php echo($a['name']);?></td><td><?php echo($a['number']);?></td><td><?php echo($a['salary']);?></td><td><?php echo($a['last_date']);?></td><td><a href="index.php?mod=c2&do=disoj.php&ref=<?php echo $a['id']; ?>&page=aplfr">View</a></td></tr>
		<?php
		$i++;
	}
}
?>
</table>