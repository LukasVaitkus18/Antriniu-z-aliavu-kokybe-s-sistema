<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo '<span style="color:red;">Wrong username or password!</span>' ;
			
		}else
		{
			echo '<span style="color:red;">Wrong username or password!</span>';
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="loginStyle.css" />

    <title>Log in to Somlita</title>
  </head>
  <body>
    <h2>Login Form</h2>

    <div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>
			<div class="imgcontainer">
        <img src="img/DJI_0019-Edit-635x375.jpeg" alt="pic" class="pic" />
      </div>
	  <label for="uname"><b>E-mail</b></label>
        <br />
			<input id="text" type="text" name="user_name" placeholder="Enter e-mail" required><br><br>
			<label for="psw"><b>Password</b></label>
        <br />
			<input id="text" type="password" name="password" placeholder="Enter password" required><br><br>

			<input style="background-color:#04aa6d; color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  text-align: center; 
  " id="button" type="submit" value="Login"><br><br>

			<p>If you do not have an account please <a href="signup.php">click to signup</a></p><br><br>
		</form>
	</div>
  </body>
</html>
