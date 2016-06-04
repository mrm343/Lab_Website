<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- fonts selected  from Google Fonts -->
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/quill.snow.css">
    	<link rel="stylesheet" type="text/css" href="css/advanced.css">
		<link rel = "stylesheet" type = "text/css" href="css/stylesheet.css">
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<title>Cornell Robot and Social Dynamics Lab</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		
		
	</head>

	<body>
		<!-- Inspiration for single-page design from https://codeplanet.io/how-to-make-a-single-page-website/ -->
		<div id = "nav">
			<ul>
				<li><a href="#home">Home</a></li>
				<li><a href="#news_location">News</a></li>
				<li><a href = "#research_location">Research</a></li>	
				<li><a href="#team_location">Team</a></li>
				<li><a href="#contact_location">Contact</a></li>
				<?php include('php/nav_login_out.php'); ?>					
			</ul>
		</div>

		<div id = "login">
			<div id = "login_form">
				<?php include('php/loginForm.php'); ?>
			</div>
		</div>

		<div id = "home">
			<div class = "banner">
				<div class = "title">
					Cornell Robot and Social Dynamics Lab
				</div>
			</div>
			<div class = "subtitle">
				About Us
			</div>
			<div class = "content1">
				The Robot and Social Dynamics Lab was founded to better understand the relationship between robotics and human communication. 
				For our experiments, we test the interpersonal relationships of several diverse groups across varying communicative levels. 
				We facilitate these tests through interactions with robots, hopefully increasing the chances of reducing verbal disagreement, 
				improving conflict resolution skills, and furthering our evaluation on interactional dynamics. 
				Visit our <a href = "#research_location">research</a> page to learn a bit more about what we're currently working on and our 
				<a href = "#team_location">team</a> page to learn about our researchers and the projects they work on. <br><br>
				<!-- If you're an administrator of the site, login above to add, edit, and delete site content. Otherwise, learn more about the lab by using the navigation bar or
				 by scrolling through. -->
				 For general inquiries, please feel free to contact <a href = "#contact_location">the lab</a> or 
				 <a href = "#team_location">our researchers</a>.
			</div>
			<div id = "news_location"></div>
		</div>

		<div id = "news">
			<div class = "subtitle">News &amp; Announcements</div>
			<br><br>
			<?php include('php/news.php') ?>
			<div id = "research_location"></div>
		</div>

		<div id = "research">
			<div class = "subtitle">What We Do</div>
			<br><br>
			<?php include ('php/research.php') ?>
			<div id = "team_location"></div>
		</div>

		<div id = "team">
			<div class = "subtitle">Meet Our Team</div>
			<br><br>
			<?php include ('php/team.php') ?>
			<div id = "contact_location"></div>
		</div>

		<div id = "contact">
			<div class = "subtitle">Contact the Lab</div>
			<br><br>	
			<?php include('php/contact.php') ?>
		</div>
		
		<div id = "footer">
			Cornell University Robot and Social Dynamics Lab | Gates Hall 224 | 607-255-2845
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.js"></script>
	    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/2.4.1/lodash.js"></script>
	    <script type="text/javascript" src="javascript/quill.js"></script>
	    <script type="text/javascript" src="javascript/advanced.js"></script>
	    <script type="text/javascript" src = "javascript/helper_functions.js"></script>
	</body>
</html>