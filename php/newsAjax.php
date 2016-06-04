<?php
 	session_start();
 	if(isset($_SESSION['logged_user']) ){

 		// deal with request to create new post
 		if( isset($_POST['newPost']) &&isset($_POST['title']) && isset($_POST['content']) ){

 			$title = htmlentities($_POST["title"]);
			$body = htmlentities($_POST["content"]);
			$valid_check = true;

			if(!preg_match("/^[a-zA-Z .\-0-9!?:;]*$/",$title) || strlen($title) > 50) {
				//echo "invalidCharacter";
				echo "Post titles can only include characters, numbers, and certain symbols and be under fifty characters.";
				$valid_check = false;
			}

			if(strlen($body)>1000) {
				//echo "overWordLimit";
				echo "News entries must be 1000 characters or less.";
				$valid_check = false;
			}

			if(empty($title)){
				echo "Title cannot be empty.";
				$valid_check = false;
				die();
			}

			if($body == htmlentities("<div><br></div>")){
				echo "Post body cannot be empty.";
				$valid_check = false;
				die();
			}

			else if ($valid_check === TRUE) {
				require_once "config.php";
				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

				if (mysqli_connect_error($mysqli)) {
					//echo "Failed";
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				//$currentTime = now();

				$body = str_replace("'", "\'", $body);
				$news_query = "INSERT INTO `news` (`title`, `body`, `publish_date`) 
					VALUES ('".$title."', '".$body."', now())";

				if ($mysqli->query($news_query) === TRUE) {
					//echo "<div class = 'subtitle3'>News has been published.</div>";
					echo "Success";
				}
				else {
					echo "Error: ".$news_query."<br>". $mysqli->error;
				}
			}

 		}

 		//deal with request to update the post in database, return title and body to the page

 		if( isset($_POST['getPost']) &&isset($_POST['val']) ){

 			$val = htmlentities($_POST["val"]);

 			require_once "config.php";
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			if (mysqli_connect_error($mysqli)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$news_query = "SELECT * FROM news where news.id=$val";
			$news_result = $mysqli->query($news_query);

			$title ="";
			$content ="";
			if (!$news_result) {
				echo 'Query error';
				die();
			}
			$list = $news_result->fetch_assoc();

			echo json_encode(array(
				'title' => $list['title'],
				'content' => html_entity_decode($list['body'])
			));
 		}

 		//deal with request of updating already existing posts
 		if(isset($_POST['saveUpdatedPost']) && isset($_POST['id']) && isset($_POST['title'])
 			&& isset($_POST['body']) ){
 			$id = htmlentities($_POST["id"]);
 			$newTitle = htmlentities($_POST["title"]);
			$newBody = htmlentities($_POST["body"]);

			$valid_check = true;
			if(!preg_match("/^[a-zA-Z .\-0-9!?:;]*$/",$newTitle) || strlen($newTitle) > 50) {
				echo "<br>Post titles can only include characters, numbers, and certain symbols and be under fifty characters.";
				$valid_check = false;
			}

			if(strlen($newBody)>1000) {
				echo "<br>News entries must be 1000 characters or less.";
				$valid_check = false;
			}
			else if ($valid_check === TRUE) {
				require_once "config.php";
				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

				if (mysqli_connect_error($mysqli)) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				if (empty($id)) {
					//echo "<div class = 'edit_alerts'>Please select a post to edit.</div>";
					echo "Please select a post to edit.";
					die();
				}
				if(empty($newTitle)){
					echo "Title cannot be empty.";
					die();
				}
				if($newBody == htmlentities("<div><br></div>")){
					echo "Post body cannot be empty.";
					die();
				}

				$newBody = str_replace("'", "\'", $newBody);

				$sql = "Update news SET title='$newTitle',body='$newBody' where id=$id;";
				$result = $mysqli->query($sql);
				if($result) echo "success";
				else echo "Failed to save into database. Please retry.";
			}
 		}

 		//deal with deleting post request
 		if (isset($_POST['deleteNewsPost'])) {

			$id = htmlentities($_POST["id"]);
			
			if(empty($id)){
				echo "Please select the title you want to delete.";
				die();
			}
			require_once "config.php";
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			$delete_query = "DELETE FROM news WHERE id = ".$id;
			$result = $mysqli->query($delete_query);
			if($result) echo "success";
			else{
				echo "Deletion failed.";
			}
				
		}

 	}

?>