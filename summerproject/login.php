<?php
	if(isset($_POST['submit']))
	{
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];
		require_once ("connection.php");
		$sql = "Select id,password as pwd FROM login where id = '$email'";
		$r = mysqli_query($con,$sql);
		$user = mysqli_fetch_assoc($r);
		//$user = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		if($user)
		{
			if($Password==$user['Password']){
				$_SESSION["key"] = $email;
				header("Location: index.php");
				die();
			}
			else{
				echo "<div class= 'alert alert-danger'>Password does not match</div>";
			}
		}else{
			echo "<div class= 'alert alert-danger'>Email does not match</div>";
		}
	}
				
	?>