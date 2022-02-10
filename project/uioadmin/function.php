<?php
$con=mysqli_connect(HOST,USER,PASS,DB);
function addedit($table,$detail,$id="")
{
	$con=mysqli_connect(HOST,USER,PASS,DB);
	$sql="insert into $table set ";
	$wh="";
	if($id)
	{
		$sql="update $table set ";
		$wh=" where id=$id";
	}
	foreach($detail as $colname=>$colvalue)
	{
		if(is_array($colvalue))
		{
			$colvalue=implode(",",$colvalue);
		}
		$sql.="$colname='$colvalue',";
	}
$sql=substr($sql,0,-1).$wh;
mysqli_query($con,$sql);
}
function delete($fold,$id)
{
	$con=mysqli_connect(HOST,USER,PASS,DB);
	if($fold=='add.php')
	{
		$sql="delete from personal where id=$id";
	}
	if($fold=='addoj.php')
	{
		$sql="delete from jobs where id=$id";
	}
	if($fold=='c2')
	{
		$sql="delete from request where id=$id";
	}
	mysqli_query($con,$sql);
}
?>
