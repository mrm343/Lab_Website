<?php
	if (isset($_SESSION['logged_user'])) {
		$user = $_SESSION['logged_user'];
		echo "<li id='login_style'><a href='php/logout.php'>Logout</a></li>";

		//echo "<li id='login_user_style'><a>Welcome,$user</a></li>";
	}
	else{
		echo "<li id = 'login_style'><a href = '#login' onclick = \"showLogin('login_form')\">Login</a>";
	}
?>