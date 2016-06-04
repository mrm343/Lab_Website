<?php
	session_start();
	if (!isset($_SESSION['logged_user']) ) {
		//if username and password entered
		if(isset($_POST['username']) && isset($_POST['password'])){
			$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			require_once "config.php";
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			if (mysqli_connect_error($mysqli)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$login_query = "SELECT * FROM users WHERE users.username = '$username'";
			$login_result = $mysqli->query($login_query);
			if($login_result && $login_result->num_rows==1) {
				$row = $login_result->fetch_row();
				$hashed_password = $row[2];

				//if login is correct
				if(password_verify($password, $hashed_password)) {
					$_SESSION['logged_user'] = $username;
					//echo "<div class = 'subtitle2'>Welcome, ".$username."!</div><br>";
					//echo "<div class = 'subtitle3'><a href = 'logout.php'>Log out</a>.</div>";
					//$user = $_SESSION['logged_user'];
					echo "Success";
					//echo "<li id='login_style'><a href='php/logout.php'>Log out</a></li>";
					//echo "<li id='login_user_style'><a>Welcome, $username.</a></li>";
				}

				//if login is incorrect, try again
				else {
					$_SESSION['loginVarificationResult'] = "false";
					echo "Failed";
					//echo "<li id = 'login_style'><a href = '#login' onclick = \"showLogin('login_form')\">Administrator Login</a>";
					//echo "<div class = 'subtitle3'>Login incorrect. Please try again.</div>";
				}
			}

			//if username is wrong, no query result
			else{
				$_SESSION['loginVarificationResult'] = "false";
				echo "Failed";
				//echo "<li id = 'login_style'><a href = '#login' onclick = \"showLogin('login_form')\">Administrator Login</a>";
			}
		}

		//if no password and username entered, already handled in js
		else if (!isset($_POST['username']) && !isset($_POST['password'])) {
			echo "<li id = 'login_style'><a href = '#login' onclick = \"showLogin('login_form')\">Login</a>";
		}
		
	}


?>