<?php
	include("database.php");
	session_start();
	
	if(isset($_POST['submit']))
	{	
		$name = $_POST['name'];
		$name = stripslashes($name);
		$name = addslashes($name);

		$email = $_POST['email'];
		$email = stripslashes($email);
		$email = addslashes($email);

		$password = $_POST['password'];
		$password = stripslashes($password);
		$password = addslashes($password);

		$college = $_POST['college'];
		$college = stripslashes($college);
		$college = addslashes($college);
		$str="SELECT email from user WHERE email='$email'";
		$result=mysqli_query($con,$str);
		
		if((mysqli_num_rows($result))>0)	
		{
            echo "<center><h3><script>alert('Désolé.. Cet email est déjà enregistré!!');</script></h3></center>";
            header("refresh:0;url=login.php");
        }
		else
		{
            $str="insert into user set name='$name',email='$email',password='$password',college='$college'";
			if((mysqli_query($con,$str)))	
			echo "<center><h3><script>alert('Bravo.. vous êtes connecté!!');</script></h3></center>";
			header('location: welcome.php?q=1');
		}
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title> quizforDefarSci</title>
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="css/form.css">
        <style type="text/css">
            body{
                  width: 100%;
				  background-color: rgb(253, 106, 53);
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
          </style>
	</head>

	<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
						<center> <h5 style="font-family: Noto Sans; color:#607d8b">Inscription </h5><h4 style="font-family: Noto Sans; color:#607d8b; font-size:30px">quizforDefarSci</h4></center><br>
							<form method="post" action="register.php" enctype="multipart/form-data">
                                <div class="form-group">
									<label>Pseudo:</label>
									<input type="text" name="name" class="form-control" required />
								</div>
								<div class="form-group">
									<label> Email:</label>
									<input type="email" name="email" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Mot de passe:</label>
									<input type="password" name="password" class="form-control" required />
                                </div>
							
                                
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">S'inscrire</button>
								</div>
								<div class="form-group text-center">
									<a href="login.php">Se connecter </a> Ici..
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>