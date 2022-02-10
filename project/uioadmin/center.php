<div id="center">
<?php

$mod="Q";
$do="login.php";
if(isset($_SESSION['logindtl']) )
{
	if(isset($_GET['mod']))
	{
		if($_GET['do']!='login')
		{
		$mod=$_GET['mod'];
		$do=$_GET['do'];
		}
		else{
		$mod='Q';
		$do='login.php';
			
			}
	}
}
include_once("$mod/$do");
?>
</div>