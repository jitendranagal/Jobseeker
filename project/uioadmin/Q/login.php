<?php
$error="";
if(isset($_POST['username']))
{
	
	extract(array_map('addslashes',$_POST));
	$password=md5($password);
	$rs=mysqli_query($con,"select id,name,password from beheerder where name='$username' and password='$password'");
	if(mysqli_num_rows($rs)==1)
	{
		$_SESSION['logindtl']=mysqli_fetch_assoc($rs);
		header('Location:index.php?mod=c1&do=basic.php');
		}else
		{
			$error="Please Cheak Username and Password!";
			}
	}
?>
<form method="post">
<table cellspacing="0">
	<tr>	
    	<th colspan="2" style="font-family:Times New Roman">Login<hr></th>
    </tr>
    <?php
	if($error)
	{
		?>
        <tr>	
    	<th colspan="2" style="color:#a00;"><?php echo $error;?></th>
    </tr>
        <?php
		}
		?>
    <tr>
    	<th>Username</th>
        <td><input type="text" required name="username" placeholder="Enter user name"/>
        </td>
    </tr>    
    <tr>
    	<th>Password</th>
        <td><input type="password" required name="password" placeholder="Enter user password"/>
        </td>
    </tr>    
    <tr>
    	<th colspan="2">
        	<hr><input type="submit" value="Login"/>
        </th>
    </tr>    
</table>
</form>