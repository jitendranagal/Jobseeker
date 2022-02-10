<?php
$con=mysqli_connect('localhost','root','','jobseeker');
function addedit($table,$detail,$id="")
{
$con=mysqli_connect('localhost','root','','jobseeker');
$sql="insert into $table set ";
$wh="";
if($id!=NULL)
{
$sql="update $table set ";
$wh=" where id=$id";
}                                                                                                                                                                 
foreach($detail as $key=>$value)
{
	if(is_array($value))
	{
		$value=implode(",",$value);
	}
	$sql=$sql."$key='$value',";
}
$sql=substr($sql,0,-1).$wh;
//echo $sql;
$a=mysqli_query($con,$sql);
}
?>