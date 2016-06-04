<?php	
	require_once "config.php";
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if (mysqli_connect_error($mysqli)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if (empty($id)) {
		echo "<div class = 'edit_alerts'>Please select a profile to edit.</div>";
	}

	//no image uploaded
	$upload_check = false;
	$orig_name = $newImage['name'];
	if ($orig_name != ""){
		$temp_name = $newImage['tmp_name'];
		move_uploaded_file($temp_name, "images/".$orig_name);
		$newImagePath = "images/".$orig_name;
		$upload_check = true; //image has been uploaded
	}

	//all filled
	if (!empty($newName) && !empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && !empty($newPhone) && $upload_check === TRUE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//all but name
	else if (empty($newName) && !empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && !empty($newPhone) &&$upload_check === TRUE) {
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//all but profile
	else if (!empty($newName) && empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && !empty($newPhone) && !empty($newImage)) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//all but email
	else if (!empty($newName) && !empty($newProfile) && empty($newEmail) 
		&&!empty($newLocation) && !empty($newPhone) && $upload_check === TRUE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//all but location
	else if (!empty($newName) && !empty($newProfile) && !empty($newEmail) 
		&& empty($newLocation) && !empty($newPhone) && $upload_check === TRUE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//all but phone
	else if (!empty($newName) && !empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === TRUE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//all but image
	else if (!empty($newName) && !empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && !empty($newPhone) && $upload_check === FALSE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name profile email location
	else if (!empty($newName) && !empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name profile phone location
	else if (!empty($newName) && !empty($newProfile) && empty($newEmail) 
		&&!empty($newLocation) && !empty($newPhone) && $upload_check === FALSE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name profile image location
	else if (!empty($newName) && !empty($newProfile) && empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === TRUE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name email phone location
	else if (!empty($newName) && empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && !empty($newPhone) && $upload_check === FALSE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name email image location
	else if (!empty($newName) && empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === TRUE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name phone image location
	else if (!empty($newName) && empty($newProfile) && empty($newEmail) 
		&&!empty($newLocation) && !empty($newPhone) && $upload_check === TRUE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name profile email
	else if (!empty($newName) && !empty($newProfile) && !empty($newEmail) 
		&& empty($newLocation) &&  empty($newPhone) && $upload_check === FALSE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name profile phone
	else if (!empty($newName) && !empty($newProfile) && empty($newEmail) 
		&& empty($newLocation) && !empty($newPhone) && $upload_check === FALSE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name profile image
	else if (!empty($newName) && !empty($newProfile) && empty($newEmail) 
		&& empty($newLocation) && empty($newPhone) && $upload_check === TRUE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name profile location
	else if (!empty($newName) && !empty($newProfile) && empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name email image
	else if (!empty($newName) && empty($newProfile) && !empty($newEmail) 
		&& empty($newLocation) && empty($newPhone) && $upload_check === TRUE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name email location
	else if (!empty($newName) && empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name email phone
	else if (!empty($newName) && empty($newProfile) && !empty($newEmail) 
		&& empty($newLocation) && !empty($newPhone) && $upload_check === FALSE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name image location
	else if (!empty($newName) && empty($newProfile) && empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === TRUE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name image phone
	else if (!empty($newName) && empty($newProfile) && empty($newEmail) 
		&& empty($newLocation) && !empty($newPhone) && $upload_check === TRUE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//profile email location phone 
	else if (empty($newName) && !empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && !empty($newPhone) && $upload_check === FALSE) {
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//profile email location image
	else if (empty($newName) && !empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === TRUE) {
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//profile email phone image
	else if (empty($newName) && !empty($newProfile) && !empty($newEmail) 
		&& empty($newLocation) && !empty($newPhone) && $upload_check === TRUE) {
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//profile email location
	else if (empty($newName) && !empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//profile email phone
	else if (empty($newName) && !empty($newProfile) && !empty($newEmail) 
		&& empty($newLocation) && !empty($newPhone) && $upload_check === FALSE) {
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//profile location phone
	else if (!empty($newName) && !empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && !empty($newPhone) && $upload_check === TRUE) {
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//profile location image
	else if (empty($newName) && !empty($newProfile) && empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === TRUE) {
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//email location phone image
	else if (empty($newName) && empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && !empty($newPhone) && $upload_check === TRUE) {
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//email location phone
	else if (empty($newName) && empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && !empty($newPhone) && $upload_check === FALSE) {
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//email image phone
	else if (empty($newName) && empty($newProfile) && !empty($newEmail) 
		&& empty($newLocation) && !empty($newPhone) && $upload_check === TRUE) {
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//image location phone
	else if (empty($newName) && empty($newProfile) && empty($newEmail) 
		&&!empty($newLocation) && !empty($newPhone) && $upload_check === TRUE) {
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name and profile
	else if (!empty($newName) && !empty($newProfile) && empty($newEmail) 
		&& empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name and email
	else if (!empty($newName) && empty($newProfile) && !empty($newEmail) 
		&& empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name and location
	else if (!empty($newName) && empty($newProfile) && empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name and phone
	else if (!empty($newName) && empty($newProfile) && empty($newEmail) 
		&& empty($newLocation) && !empty($newPhone) && $upload_check === FALSE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//name and image
	else if (!empty($newName) && empty($newProfile) && empty($newEmail) 
		&& empty($newLocation) && empty($newPhone) && $upload_check === TRUE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//profile and email
	else if (empty($newName) && !empty($newProfile) && !empty($newEmail) 
		&& empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//profile and location
	else if (empty($newName) && !empty($newProfile) && empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//profile and phone
	else if (empty($newName) && !empty($newProfile) && empty($newEmail) 
		&& empty($newLocation) && !empty($newPhone) && $upload_check === FALSE) {
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//profile and image
	else if (empty($newName) && !empty($newProfile) && empty($newEmail) 
		&& empty($newLocation) && empty($newPhone) && $upload_check === TRUE) {
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//email and location
	else if (empty($newName) && empty($newProfile) && !empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//email and phone
	else if (empty($newName) && empty($newProfile) && !empty($newEmail) 
		&&empty($newLocation) && !empty($newPhone) && $upload_check === FALSE) {
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//email and image
	else if (empty($newName) && empty($newProfile) && !empty($newEmail) 
		&& empty($newLocation) && empty($newPhone) && $upload_check === TRUE) {
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//location and image
	else if (empty($newName) && empty($newProfile) && empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === TRUE) {
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//phone and image
	else if (empty($newName) && empty($newProfile) && empty($newEmail) 
		&& empty($newLocation) && !empty($newPhone) && $upload_check === TRUE) {
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//just name
	else if (!empty($newName) && empty($newProfile) && empty($newEmail) 
		&& empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		$name_query = "UPDATE team_profiles SET name = '".$newName."' 
		WHERE profile_id = ".$id;
		$mysqli->query($name_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//just profile
	else if (empty($newName) && !empty($newProfile) && empty($newEmail) 
		&& empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		$profile_query = "UPDATE team_profiles SET profile = '".$newProfile."'
		 WHERE profile_id = ".$id;
		$mysqli->query($profile_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//just email
	else if (empty($newName) && empty($newProfile) && !empty($newEmail) 
		&& empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		$email_query = "UPDATE team_profiles SET email = '".$newEmail."'
		 WHERE profile_id = ".$id;
		$mysqli->query($email_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//just location
	else if (empty($newName) && empty($newProfile) && empty($newEmail) 
		&&!empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		$location_query = "UPDATE team_profiles SET location = '".$newLocation."'
		 WHERE profile_id = ".$id;
		$mysqli->query($location_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//just phone
	else if (empty($newName) && empty($newProfile) && empty($newEmail) 
		&& empty($newLocation) && !empty($newPhone) && $upload_check === FALSE) {
		$phone_query = "UPDATE team_profiles SET phone = '".$newPhone."'
		 WHERE profile_id = ".$id;
		$mysqli->query($phone_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	//just image
	else if (empty($newName) && empty($newProfile) && empty($newEmail) 
		&& empty($newLocation) && empty($newPhone) && $upload_check === TRUE) {
		$image_query = "UPDATE team_profiles SET image_path = '".$newImagePath."'
		 WHERE profile_id = ".$id;
		$mysqli->query($image_query);
		echo "<div class = 'edit_alerts'>Profile updated.</div>";
	}

	else if (empty($newName) && empty($newProfile) && empty($newEmail) 
		&& empty($newLocation) && empty($newPhone) && $upload_check === FALSE) {
		echo "<div class = 'edit_alerts'>No fields filled.</div>";
	}

?>