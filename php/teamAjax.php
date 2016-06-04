<?php
session_start();
// create new profile using ajax
	//citation: Thanks for the code provided in https://www.formget.com/ajax-image-upload-php/
	//for uploading form input files and contents with ajax
	if(isset($_POST["new_profile"]) ){

		//deal with image first
		if(empty($_FILES["image"])){
			echo "A image is necessary for creating new researcher profile!";
			die();
		}

		$imagePath = "";
		$validExtention = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["image"]["name"]);
		$file_extension = end($temporary);

		if (( ($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/jpeg")) && ($_FILES["image"]["size"] < 2000000) && in_array($file_extension, $validExtention) ){
			if ($_FILES["image"]["error"] > 0) {
				echo "Image error: " . $_FILES["image"]["error"] . "";
				die();
			}
			else {
				if (file_exists("../images/" . $_FILES["image"]["name"])) {
					// echo $_FILES["image"]["name"] . " already exists.";
					$imagePath = "images/".$_FILES['image']['name'];

				}
				else{
					$sourcePath = $_FILES['image']['tmp_name'];
					$targetPath = "../images/".$_FILES['image']['name'];
					$imagePath = "images/".$_FILES['image']['name'];
					move_uploaded_file($sourcePath, $targetPath);
				}
			}
		}

		else {
			echo "Invalid image input. Please try again.";
			die();
		}
		
		$name = htmlentities($_POST["name"]);
		$profile = htmlentities($_POST["new_profile"]);
		$email = htmlentities($_POST["email"]);
		$location = htmlentities($_POST["location"]);
		$phone = htmlentities($_POST["phone"]);

		$projectIdList = array();
		if (!empty($_POST["projects"])) {
			$projectIdList = $_POST["projects"];// $projects_array[0] will give you the direct number
		}

		//validation
		
		if(empty($name)){
			echo "Name cannot be empty";
			die();
		}
		if($profile == htmlentities("<div><br></div>")){
			echo "Profile cannot be empty";
			die();
		}
		if(empty($email)){
			echo "Email cannot be empty";
			die();
		}
		if(empty($location)){
			echo "Location cannot be empty";
			die();
		}
		if(empty($phone)){
			echo "Location cannot be empty";
			die();
		}
		if (empty($_POST["projects"])) {
			echo "Please select projects for this researcher.";
			die();
		}
		
		if(!preg_match("/^[a-zA-Z .\-0-9!?:;]*$/",$name) || !preg_match("/^[a-zA-Z .\-0-9!?:;]*$/",$location)
			|| strlen($name) > 50 || strlen($location) > 50) {
			echo "Member names and office locations can only include characters, numbers, and certain symbols and be under fifty characters each.";
			die();
		}

		if (strlen($profile) > 1000) {
			echo "Member profiles must be less than 1000 characters.";
			die();
		}

		if (!preg_match("/^[0-9-]*$/", $phone) || strlen($phone)>12) {
			echo "Phone numbers may only include digits and be twelve characters long.";
			die();
		}

		//save data into database
		require_once "config.php";
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		if (mysqli_connect_error($mysqli)) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$profile = str_replace("'", "\'", $profile);

		$field_values = [$name, $profile, $email, $phone, $location, $imagePath];
		$value_list = implode("','", $field_values);
		$insert_query = "INSERT INTO `team_profiles` (`name`, `profile`, `email`, `phone`, `location`, `image_path`) 
		VALUES ('$value_list');";

		if ($mysqli->query($insert_query) === TRUE) {
			//echo "<div class = 'subtitle3'>News has been published.</div>";
			echo "success";
		}
		else {
			echo "Error: ".$insert_query."<br>". $mysqli->error;
		}

		$max_id = "SELECT MAX(profile_id) FROM team_profiles";
		$max_result = $mysqli->query($max_id);

		$id = 0;

		$row = $max_result->fetch_row();
		$id = $row[0];
		
		foreach($projectIdList as $projectID) {
			$mysqli->query("INSERT INTO `team_projects` (`profileID`, `projectID`)
				VALUES ('".$id."', '".$projectID."')");
		}

	}

	// send information to be displayed
	if(isset($_POST['displayEditProfile']) && isset($_POST['profileId'])){

		$profileID = htmlentities($_POST["profileId"]);

		require_once "config.php";
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		if (mysqli_connect_error($mysqli)) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$profile_query = "SELECT * FROM team_profiles where profile_id=$profileID";
		$result = $mysqli->query($profile_query);
		if($result){
			$row = $result->fetch_row();
			$name = $row[1];
			$profile = html_entity_decode($row[2]);
			$email = $row[3];
			$phone = $row[4];
			$location = $row[5];

			$listOfProjects = array();
			$sqlForProjects = "Select * from team_projects where profileID=$profileID; ";
			require_once "config.php";
			$mysqli2 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$result2 = $mysqli2->query($sqlForProjects);
			if(!$result2){
				echo "Query failed";
				die();
			}
			else{
				while($row = $result2->fetch_row()){
					array_push($listOfProjects, $row[2]);
				}
				echo json_encode(array(
					'name' => $name,
					'profile' => $profile,
					'email' => $email,
					'phone' => $phone,
					'location' => $location,
					'listOfProjects' => $listOfProjects
				));
			}

		}

	}

	//deal with updating profile
	if(isset($_POST['edit_profile'])){


		$ChangeInImage = true;
		if( empty($_FILES['image_update']['name']) ) $ChangeInImage = false;
		$sourcePath;
		$targetPath;
		$imagePath;
		if($ChangeInImage == true){

			$validExtention = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["image"]["name"]);
			$file_extension = end($temporary);

			if (( ($_FILES["image_update"]["type"] == "image/png") || ($_FILES["image_update"]["type"] == "image/jpg") || ($_FILES["image_update"]["type"] == "image/jpeg")
					) && ($_FILES["image_update"]["size"] < 2000000) && in_array($file_extension, $validExtention) ){
			
				if ($_FILES["image_update"]["error"] > 0) {

					echo "Image error: " . $_FILES["image_update"]["error"] . "";
					die();
				}
				else {

					if (file_exists("../images/" . $_FILES["image_update"]["name"])) {
						// echo $_FILES["image"]["name"] . " already exists.";
						$imagePath = "images/".$_FILES['image_update']['name'];
					}
					else{
						$sourcePath = $_FILES['image_update']['tmp_name'];
						$targetPath = "../images/".$_FILES['image_update']['name'];
						$imagePath = "images/".$_FILES['image_update']['name'];
						move_uploaded_file($sourcePath, $targetPath);
					}
				}
			}
			else{
				echo "Failed.Supported file type: .jpeg, jpg, png; Size of image should below 2MB!";
			}

		}

		$profileID = htmlentities($_POST['updated_profile_id']);
		$name = htmlentities($_POST["name"]);
		$profile = htmlentities($_POST["edit_profile"]);
		$email = htmlentities($_POST["email"]);
		$location = htmlentities($_POST["location"]);
		$phone = htmlentities($_POST["phone"]);
		$projectIdList = array();
		

		//validation
		if(empty($profileID)){
			echo "Please select a profile you want to update";
			die();
		}
		if(empty($name)){
			echo "Name cannot be empty";
			die();
		}
		if($profile == htmlentities("<div><br></div>")){
			echo "Profile cannot be empty";
			die();
		}
		if(empty($email)){
			echo "Email cannot be empty";
			die();
		}
		if(empty($location)){
			echo "Location cannot be empty";
			die();
		}
		if(empty($phone)){
			echo "Location cannot be empty";
			die();
		}
		if (empty($_POST["projects"])) {
			echo "Please select participated projects for this researcher.";
			die();
		}
		if(!preg_match("/^[a-zA-Z .\-0-9!?:;]*$/",$name) || !preg_match("/^[a-zA-Z .\-0-9!?:;]*$/",$location)
			|| strlen($name) > 50 || strlen($location) > 50) {
			echo "Member names and office locations can only include characters, numbers, and certain symbols and be under fifty characters each.";
			die();
		}

		if (strlen($profile) > 1000) {
			echo "Member profiles must be less than 1000 characters.";
			die();
		}

		if (!preg_match("/^[0-9-]*$/", $phone) || strlen($phone)>12) {
			echo "Phone numbers may only include digits and be twelve characters long.";
			die();
		}
		$projectIdList = $_POST["projects"];
		//save to database
		require_once "config.php";
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		if (mysqli_connect_error($mysqli)) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$profile = str_replace("'", "\'", $profile);
		$update_query;
		if($ChangeInImage == false){
			$update_query = "Update team_profiles SET name='$name', profile='$profile', email='$email'
			, phone='$phone', location ='$location' where profile_id='$profileID';";
		}else{
			$update_query = "Update team_profiles SET name='$name', profile='$profile', email='$email'
			, phone='$phone', location ='$location', image_path='$imagePath' where profile_id='$profileID';";
		}
		$result = $mysqli->query($update_query);
		if($result){
			require_once "config.php";
			$mysqli2 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$delteRecords = "DELETE FROM team_projects WHERE profileID = ".$profileID;
			$result2= $mysqli2->query($delteRecords);
			if($result2){
				require_once "config.php";
				$mysqli3 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				foreach ($projectIdList as $projectID) {
					$temp = $mysqli3->query("INSERT INTO `team_projects` (`profileID`, `projectID`) 
					VALUES ('".$profileID."', '".$projectID."')");
					if(!$temp){
						echo "Inserting into team_projects talbe failed";
						die();
					}
				}
				echo "success";
			}
			else{
				echo "Failed while deleting records in team_projects table";
			}
		}else{
			echo "Update query failed";
			die();
		}

	}

	//delete the specified team post
	if(isset($_POST['deleteTeamPost']) &&isset($_POST['id']) ){
		$id = htmlentities($_POST["id"]);
			
		if(empty($id)){
			echo "Please select the profile you want to delete.";
			die();
		}
		require_once "config.php";
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		$delete_query = "DELETE FROM team_profiles WHERE profile_id = ".$id;
		$result = $mysqli->query($delete_query);
		$delete_query1 = "DELETE FROM team_projects WHERE profileID = ".$id;
		$result1 = $mysqli->query($delete_query1);
		if($result && $result1) echo "success";
		else {
			echo "Deletion failed.";
		}		
	}
?>