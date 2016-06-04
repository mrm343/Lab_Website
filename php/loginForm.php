<?php
  	// $pass = password_hash('Jung',PASSWORD_DEFAULT);
  	// echo "$pass";


	//if user is logged in, welcome them: the user welcome was moved to the right of navigation.
	if (isset($_SESSION['logged_user'])) {
		$logged_user = $_SESSION['logged_user'];
		//echo "<li id='login_style'><a href='php/logout.php'>Log out</a></li>";
		echo "<div class = 'subtitle2'>Welcome, ".$logged_user."!</div><br>";
		echo "<div class = 'subtitle3'><a href = 'php/logout.php'>Log out</a>.</div>";
	}

	//if user is not logged in, show the login form
	else {

		//if the user failed varification, show this around the login form
		// if(!empty($_SESSION['loginVarificationResult'])){
		// 	if( $_SESSION['loginVarificationResult'] =="false"){
		// 		echo "<div class = 'subtitle3'>Login incorrect. Please try again.</div>";
		// 	}
		// }

		// if user hasn't logged in, the following form would always be there
		echo "<form method='post' enctype='multipart/form-data'>";
			echo "<h3 id='incorrectLogin'></h3>";
			echo "<div class = 'subtitle2'>Login</div>";
			echo "<div class = 'subtitle3' >Username:</div>";
			echo "<input type='text' id='username' value='' required/>";
			echo "<div class = 'subtitle3' >Password:</div>";
			echo "<input type= 'password' id='password' value='' required/>";
			echo "<br><br><button type ='button' name = 'login_button' id='login_button' >Login</button><br><br>";
		echo "</form>";
	}
?>
