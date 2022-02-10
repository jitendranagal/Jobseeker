<?php
if(isset($_FILES['pic']))
{
	if($_FILES['pic']['name']!=NULL)
	{
		unlink($_SESSION['logindt']['pic']);
		$file=$_FILES['pic']['name'];
		$move="upfiles/".time().$file;
		$c=move_uploaded_file($_FILES['pic']['tmp_name'],$move);
		unset($_POST);
		$_POST['pic']=$move;	
		$_SESSION['logindt']['pic']=$_POST['pic'];
		if($_SESSION['logindt']['ut']=="reg")
			{
				addedit('request',$_POST,$_SESSION['logindt']['id']);
			}
			else
			{
				addedit('personal',$_POST,$_SESSION['logindt']['id']);
			}
			$_SESSION['logindt']['pic']=$_POST['pic'];
			header('location:index.php?mod=profile&do=profile.php');
	}
}
if(isset($_FILES['cv']))
{
	if($_FILES['cv']['name']!=NULL)
	{
		unlink(substr($_SESSION['logindt']['cv'],3));
		$file=$_FILES['cv']['name'];
		$move="cv/".time().$file;
		move_uploaded_file($_FILES['cv']['tmp_name'],$move);
		unset($_POST);
		$_POST['cv']=$move;	
		if($_SESSION['logindt']['ut']=="reg")
		{
			addedit('request',$_POST,$_SESSION['logindt']['id']);
		}
		header('location:index.php?mod=profile&do=profile.php');
	}
}
if(isset($_SESSION['logindt']['id']) && $_POST)
{
	if(isset($_POST['name']))
	{
		if($_POST['name']!=NULL)
		{
			if($_SESSION['logindt']['ut']=="reg")
			{
				addedit('request',$_POST,$_SESSION['logindt']['id']);
			}
			else
			{
				addedit('personal',$_POST,$_SESSION['logindt']['id']);
			}
			$_SESSION['logindt']['name']=$_POST['name'];
			header('location:index.php?mod=profile&do=profile.php');
		}
		else
		{
			header('location:index.php?mod=profile&do=profile.php&err=1');
		}
	}
	else if(isset($_POST['address']))
	{
		if($_POST['address']!=NULL)
		{		
			if($_SESSION['logindt']['ut']=="nr")
			{
				addedit('personal',$_POST,$_SESSION['logindt']['id']);
			}
			else
			{
				addedit('request',$_POST,$_SESSION['logindt']['id']);
			}
			header('location:index.php?mod=profile&do=profile.php');
		}
		else
		{
				header('location:index.php?mod=profile&do=profile.php&err=1');
		}
	}
	
	else if(isset($_POST['date']))
	{
		if($_POST['date']!=NULL && $_POST['month']!=NULL && $_POST['year']!=NULL)
		{
			$_POST['dob']=$_POST['year']."-".$_POST['month']."-".$_POST['date'];
			unset($_POST['year']);unset($_POST['month']);unset($_POST['date']);
			if($_SESSION['logindt']['ut']=="nr")
			{
				addedit('personal',$_POST,$_SESSION['logindt']['id']);
			}
			else
			{
				addedit('request',$_POST,$_SESSION['logindt']['id']);
			}
			header('location:index.php?mod=profile&do=profile.php');
		}
		else
		{
				header('location:index.php?mod=profile&do=profile.php&err=1');
		}
	}
	if(isset($_POST['contact']))
	{
		if($_POST['contact']!=NULL)
		{
			$id=$_SESSION['logindt']['id'];
			if($_SESSION['logindt']['ut']=="nr")
			{
				addedit('personal',$_POST,$id);
			}
			else
			{
				addedit('request',$_POST,$id);
			}
			$_SESSION['logindt']['contact']=$_POST['contact'];
			header('location:index.php?mod=profile&do=profile.php');
		}
		else
		{
				header('location:index.php?mod=profile&do=profile.php&err=1');
		}
	}
	
	else if(isset($_POST['qualification']))
	{
		if($_POST['qualification']!=NULL)
		{
			addedit('request',$_POST,$_SESSION['logindt']['id']);
			$_SESSION['logindt']['qualification']=$_POST['qualification'];
			header('location:index.php?mod=profile&do=profile.php');
		}
		else
		{
			header('location:index.php?mod=profile&do=profile.php&err=1');
		}
	}
	else if(isset($_POST['experience']))
	{
		if($_POST['experience']!=NULL)
		{
			addedit('request',$_POST,$_SESSION['logindt']['id']);
			header('location:index.php?mod=profile&do=profile.php');
		}
		else
		{
				header('location:index.php?mod=profile&do=profile.php&err=1');
		}
	}
}
if($_SESSION['logindt']['ut']=="reg")
{
	$id=$_SESSION['logindt']['id'];
	$sql="select * from request where id=$id";
	$a=mysqli_query($con,$sql);
	$c=mysqli_fetch_assoc($a);
}
if($_SESSION['logindt']['ut']=="nr")
{
	$id=$_SESSION['logindt']['id'];
	$sql="select * from personal where id=$id";
	$a=mysqli_query($con,$sql);
	$c=mysqli_fetch_assoc($a);
}
?>
<table style="text-align:left; width:98%; line-height:180%; background-color:#fff; font-size:20px">
<tr><td rowspan="4" style="width:30%; text-align:center;"><img src="<?php echo $c['pic'];?>" style="width:300px; height:300px;"></td><td style="width:10%">Name </td><td>:</td><td align="left"><?php if(isset($_GET['edit']) && $_GET['edit']=='name'){?><form method="post"><input type="text" name="name" value="<?php echo ucfirst($c['name'])?>"><?php } else echo ucfirst($c['name']);?></td><td><a href="index.php?mod=profile&do=profile.php" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold"><?php if(isset($_GET['edit']) && $_GET['edit']=='name'){?><input type="submit" value="Save" style="font-size:14px; text-decoration:none; color:#036; font-weight:bold; border:none; width:auto; background-color:#FFFFFF; cursor:pointer"/> </form>|| <a href="index.php?mod=profile&do=profile.php" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold">Cancel</a><?php }else{?><a href="index.php?mod=profile&do=profile.php&edit=name" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold">Edit</a><?php }?></td></tr>
<tr><td style="width:10%">Address </td><td>:</td><td><?php if(isset($_GET['edit']) && $_GET['edit']=='address'){?><form method="post"><input type="text" name="address" value="<?php echo ucfirst($c['address'])?>"><?php } else echo ucfirst($c['address'])?></td><td><a href="index.php?mod=profile&do=profile.php" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold"><?php if(isset($_GET['edit']) && $_GET['edit']=='address'){?><input type="submit" value="Save" style="font-size:14px; text-decoration:none; color:#036; font-weight:bold; border:none; width:auto; background-color:#FFFFFF; cursor:pointer"/> </form>|| <a href="index.php?mod=profile&do=profile.php" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold">Cancel</a><?php }else{?><a href="index.php?mod=profile&do=profile.php&edit=address" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold">Edit</a><?php }?></td></tr>
<tr><td style="width:10%">Date Of <?php if($_SESSION['logindt']['ut']=="reg"){ echo "birth";} else{echo "incorporation";}?> </td><td>:</td><td><?php if(isset($_GET['edit']) && $_GET['edit']=='dob'){?><form method="post"><select name="date" required><option>Date</option><?php for($i=1;$i<=31;$i++){echo"<option value=$i>$i</option>";}?></select><select name="month" required><option>Month</option><?php for($i=1;$i<=12;$i++){ echo "<option value=$i>$i</option>"; } ?></select><select name="year" required><option>Year</option><?php for($i=date('Y');$i>date('Y')-40;$i--){ echo "<option value=$i>$i</option>"; } ?></select><?php } else echo $c['dob']." (Y-M-D)"?></td><td><a href="index.php?mod=profile&do=profile.php" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold"><?php if(isset($_GET['edit']) && $_GET['edit']=='dob'){?><input type="submit" value="Save" style="font-size:14px; text-decoration:none; color:#036; font-weight:bold; border:none; width:auto; background-color:#FFFFFF; cursor:pointer"/> </form>|| <a href="index.php?mod=profile&do=profile.php" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold">Cancel</a><?php }else{?><a href="index.php?mod=profile&do=profile.php&edit=dob" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold">Edit</a><?php }?></td></tr>
<tr><td style="width:10%">Contact no. </td><td>:</td><td><?php if(isset($_GET['edit']) && $_GET['edit']=='contact'){?><form method="post"><input type="text" name="contact" value="<?php echo ucfirst($c['contact'])?>"><?php } else echo ucfirst($c['contact'])?></td><td><a href="index.php?mod=profile&do=profile.php" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold"><?php if(isset($_GET['edit']) && $_GET['edit']=='contact'){?><input type="submit" value="Save" style="font-size:14px; text-decoration:none; color:#036; font-weight:bold; border:none; width:auto; background-color:#FFFFFF; cursor:pointer"/> </form>|| <a href="index.php?mod=profile&do=profile.php" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold">Cancel</a><?php }else{?><a href="index.php?mod=profile&do=profile.php&edit=contact" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold">Edit</a><?php }?></td></tr>
<?php if($_SESSION['logindt']['ut']=="reg"){?>
<tr><td align="right" rowspan="5"><form method="post" enctype="multipart/form-data" action="index.php?mod=profile&do=profile.php"><input type="file" name="pic" accept="image/jpeg"><input type="submit" value="Change" style="width:25%; margin-right:15%"></form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Qualification </td><td>:</td><td><?php if(isset($_GET['edit']) && $_GET['edit']=='qualification'){?><form method="post"><select name="qualification" style="width:55%"><option>Select Degree</option><?php $rs=mysqli_query($con ,"select name from degree");while($a=mysqli_fetch_assoc($rs)){?><option value="<?php echo $a['name'];?>"><?php echo $a['name'];?></option><?php } ?></select><?php } else echo ucfirst($c['qualification'])?></td><td><a href="index.php?mod=profile&do=profile.php" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold"><?php if(isset($_GET['edit']) && $_GET['edit']=='qualification'){?><input type="submit" value="Save" style="font-size:14px; text-decoration:none; color:#036; font-weight:bold; border:none; width:auto; background-color:#FFFFFF; cursor:pointer"/> </form>|| <a href="index.php?mod=profile&do=profile.php" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold">Cancel</a><?php }else{?><a href="index.php?mod=profile&do=profile.php&edit=qualification" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold">Edit</a><?php }?></td></tr>
<tr><td>Update C.V.</td><td>:</td><td><form method="post" enctype="multipart/form-data" action="index.php?mod=profile&do=profile.php"><input type="file" name="cv" accept="application/pdf"></td><td><input type="submit" value="Upload CV" style="font-size:12px; text-decoration:none; color:#036; font-weight:bold; border:none; width:auto; background-color:#FFFFFF; cursor:pointer"></form></td><?php } else{?>
<td align="right"><form method="post" enctype="multipart/form-data" action="index.php?mod=profile&do=profile.php"><input type="file" name="pic" accept="image/jpeg"><input type="submit" value="Change" style="width:25%; margin-right:15%"></form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><?php } ?>
</tr>
</table>