<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="loginPage.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="mycss1.css">
	<title>Signin/Register</title>

</head>

<body>

	<div class="color-overlay"></div>

	<nav class="navbar navbar-light bg-light " style="    opacity: 0.8;
        box-shadow: 0 0 5px 2px #282a2d;
        line-height: 1.4;">
		<div class="container-fluid ">
			<a class="navbar-brand brand " href="#" style="font-family: Montserrat;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 36px;
                    line-height: 44px;
                    color: #000000;">
				Underdogs Reviews
			</a>
			<ul class="nav justify-content-end">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="indexlogin.php">Menu</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="aboutUs.php">About us</a>
				</li>
			<!--	<li class="nav-item">
					<a class="nav-link " href="indexlogin.html">Sign in/Register</a>
				</li>-->
			</ul>

		</div>
	</nav>

	<!---  Signup--->
	<div class="color-overlay"></div>
	<h2>Welcome to Underdogs Reviews</h2>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="" method="post">
				<h1>Create Account</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>

				<span>or use your email for registration</span>
				<input type="text" name="username" placeholder="Name" />
				<input type="email" name="email" placeholder="Email" />
				<input type="password" name="password" placeholder="Password" />
				<button type="submit" name="submit">Sign Up</button>
			</form>
		</div>

		<?php
		include_once 'db.php';

		if (isset($_POST['submit'])) {


			$name = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$password_encrypted = password_hash($password, PASSWORD_BCRYPT);


			if ($email != "" && $name != "" && $password != "") {


				$query = "INSERT INTO `user_db`(`id`, `username`, `email`, `password`) VALUES
          (' ','$name','$email','$password_encrypted')";


				$data = mysqli_query($conn, $query);
				if ($data) {
					echo "
            <script>alert('User has been created successfully.');
            window.location = 'http://localhost/review/indexlogin.php';</script>";
				} else {

					echo "All fields required!!";
				}
			} else {
				echo "mysqli_error($conn))";
			}
		} else {
			// echo "not submit";
		}


		?>

		<!-------------Login -------------->

		<div class="form-container sign-in-container">
			<form action="" method="post">
				<h1>Sign in</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<span>or use your account</span>
				<input type="email" name="email" placeholder="Email" />
				<input type="password" name="password" placeholder="Password" />
				<a href="#">Forgot your password?</a>
				<button type="submit" name="submitlogin">Sign In</button>
			</form>
		</div>


		<?php
		session_start();
		include_once 'db.php';

		if (isset($_POST['submitlogin'])) {


			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$password = mysqli_real_escape_string($conn, $_POST["password"]);

			if ($password != "" && $email != "") {
				$query = "SELECT * FROM `user_db` WHERE email='$email'";

				$query_run = mysqli_query($conn, $query);

				$result = mysqli_query($conn, $query);
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_array($result)) {
						if (password_verify($password, $row["password"])) {
							//return true;  
							$_SESSION['user_id'] = $row["id"];
							$_SESSION['loggedIn'] = true;
							header("location:  menu.php");
						} else {
							//return false;  
							echo '<script>alert("Username or password incorrect.")</script>';
						}
					}
				} else {
					echo '<script>alert("Wrong User Details")</script>';
				}
			}
		}

		?>





























		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');

		signUpButton.addEventListener('click', () => {
			container.classList.add("right-panel-active");
		});

		signInButton.addEventListener('click', () => {
			container.classList.remove("right-panel-active");
		});
	</script>
</body>

</html>