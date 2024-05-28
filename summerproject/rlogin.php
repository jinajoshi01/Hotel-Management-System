<?php
	session_start();
	include("connection.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$Username = $_POST['Username'];
		$Password = $_POST['Password'];
		if( !empty($Username) && !empty($Password))
		{
			$query = "Select * from receptionist_login  where Username ='$Username' && Password='$Password'";
			$result = mysqli_query($con, $query);
			echo "<script type='text/javascript'>alert('Wrong username or password'); window.location='login.html';</script>";
		}
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					if($user_data['Password'] == $Password);
					{
						header("location: rdashboard.html");
						die;
					}
				}
			}
			echo "<script type='text/javascript'>alert('Wrong username or password'); window.location='login.html';</script>";
}
			
?>
