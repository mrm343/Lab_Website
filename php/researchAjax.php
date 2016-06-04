<?php
	session_start();
	// deal with request to create new research
	// if(isset($_POST['newResearchPost']) && isset($_POST['title']) && isset($_POST['content']) 
	// 	&& isset($_POST['profileIdList']) ){
if( isset($_POST['newResearchPost']) ) {
		$title = htmlentities($_POST["title"]);
		$body = htmlentities($_POST["content"]);

		$profileIdList = array();
		if (!empty($_POST["profileIdList"])) {
			$profileIdList = $_POST["profileIdList"];
		}

		//validation
		

		$valid_check = true;

		if(!preg_match("/^[a-zA-Z .\-0-9!?:;]*$/",$title) || strlen($title) > 50) {
			echo "Post titles can only include characters, numbers, and certain symbols and be under fifty characters.";
			$valid_check = false;
		}

		if(strlen($body)>3000) {
			echo "Research entries must be 3000 characters or less.";
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

		if (empty($_POST["profileIdList"])) {
			echo "Please select researchers for this project.";
			die();
		}

		if ($valid_check === TRUE) {
			require_once "config.php";
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			if (mysqli_connect_error($mysqli)) {
				//echo "Failed";
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$body = str_replace("'", "\'", $body);

			$research_query = "INSERT INTO `research` (`title`, `body`, `date_added`) 
				VALUES ('".$title."', '".$body."', CURRENT_DATE())";

			if ($mysqli->query($research_query) === TRUE) {
				//echo "<div class = 'subtitle3'>News has been published.</div>";
				echo "Success";
			}
			else {
				echo "Error: ".$research_query."<br>". $mysqli->error;
			}

			$max_id = "SELECT MAX(id) FROM research";
			$max_result = $mysqli->query($max_id);

			$id = 0;

			$row = $max_result->fetch_row();
			$id = $row[0];
			
			foreach($profileIdList as $profile) {
				$mysqli->query("INSERT INTO `team_projects` (`profileID`, `projectID`)
					VALUES ('".$profile."', '".$id."')");
			}
		}
	}

	// deal with request of update
	if(isset($_POST['editResearch']) && isset($_POST['researchId'])){
		
		$id = htmlentities($_POST["researchId"]);
		if(empty($id)){
			echo "Please select a post to be editted";
			die();
		}
		require_once "config.php";
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$sql = "Select * from research where id='$id';";
		$result = $mysqli->query($sql);
		if(!$result) {
			echo "Query failed";
			die();
		}
		else{
			$row = $result->fetch_row();
			$title =  $row[1];
			$content = $row[2];
			$listOfProfiles = array();
			$sqlForProfiles = "Select * from team_projects where projectID ='$id'; ";
			require_once "config.php";
			$mysqli2 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$result2 = $mysqli2->query($sqlForProfiles);
			if(!$result2){
				echo "Query failed";
				die();
			}
			else{
				while($row = $result2->fetch_row()){
					array_push($listOfProfiles, $row[1]);
				}
				echo json_encode(array(
					'title' => $title,
					'content' => html_entity_decode($content),
					'listOfProfiles' =>$listOfProfiles
				));
			}
			
		}
	}
	// save updated research post
	if(isset($_POST['saveUpdatedResearchPost']) ){
		$id = htmlentities($_POST["id"]);
		$newTitle = htmlentities($_POST["title"]);
		$newBody = htmlentities($_POST["body"]);

		$newProfileList = array();

		
		$valid_check = true;
		if(!preg_match("/^[a-zA-Z .\-0-9!?:;]*$/",$newTitle) || strlen($newTitle) > 50) {
			echo "<br>Post titles can only include characters, numbers, and certain symbols and be under fifty characters.";
			$valid_check = false;
		}

		if(strlen($newBody)>3000) {
			echo "<br>Research entries must be 3000 characters or less.";
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
			if (!empty($_POST['profileIdList'])) {
				foreach ($_POST["profileIdList"] as $profile) {
					array_push($newProfileList, htmlentities($profile));
				};
			}
			else  {
				echo "Please select researchers for this project.";
				die();
			}

			$newBody = str_replace("'", "\'", $newBody);

			$sql = "Update research SET title='$newTitle',body='$newBody' where id=$id;";
			$result = $mysqli->query($sql);
			if($result){
				// then change the team_profile table
				require_once "config.php";
				$mysqli2 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				$delteRecords = "DELETE FROM team_projects WHERE projectID = ".$id;
				$result2= $mysqli2->query($delteRecords);
				if($result2){
					require_once "config.php";
					$mysqli3 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
					foreach ($newProfileList as $profile) {
							$temp = $mysqli3->query("INSERT INTO `team_projects` (`profileID`, `projectID`) 
						VALUES ('".$profile."', '".$id."')");
						if(!$temp){
							echo "Query failed";
							die();
						}
					}
					echo "success";
					
				}
				else{
					echo "Updating posts failed.";
				}
			} 
			else echo "Failed to save into database. Please retry.";
		}
	}

	//delete the specified reserach post
	if(isset($_POST['deleteResearchPost']) &&isset($_POST['id']) ){
		$id = htmlentities($_POST["id"]);
			
		if(empty($id)){
			echo "Please select the title you want to delete.";
			die();
		}
		require_once "config.php";
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		$delete_query = "DELETE FROM research WHERE id = ".$id;
		$result = $mysqli->query($delete_query);
		$delete_query1 = "DELETE FROM team_projects WHERE projectID = ".$id;
		$result1 = $mysqli->query($delete_query1);
		if($result && $result1) echo "success";
		else {
			echo "Deletion failed.";
		}
				
	}
?>