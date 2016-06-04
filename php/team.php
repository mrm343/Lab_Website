<?php
	//Citation: Thanks for https://quilljs.com/ to provide open source code and examples for 
	// the rich text editor
	require_once "config.php";
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if (mysqli_connect_error($mysqli)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$main_profiles_query = "SELECT * FROM team_profiles WHERE profile_id = 1 OR profile_id = 2";
	$main_profiles_result = $mysqli->query($main_profiles_query);

	while ($row = $main_profiles_result->fetch_assoc()){
		echo "<div class='oneline'>";
		echo "<img class='photo' src = ".$row['image_path']." alt = 'profile'/><br><br>";
		echo "<div class='subtitle4'>".$row['name']."</div>";
		echo "<div class='subtitle3'><a href = 'mailto:".$row['email']."?Subject=Robotics%20Lab%20Contact' target = '_top'>Send email</a></div>";
		echo "<div class='subtitle3'>".$row['location']." ";
		echo "| ".$row['phone']."</div>";
		echo "<div class='content'>".$row['profile']."</div>";

		$research_query = "SELECT * FROM research INNER JOIN team_projects 
		ON research.id = team_projects.projectID WHERE profileID = " . $row['profile_id'];
		$research_result = $mysqli->query($research_query);

		echo "<div class = 'subtitle6'>More about ".$row['name']."'s projects<br></div>";
		while ($row1 = $research_result->fetch_assoc()) {
			echo "<div class = 'research_team_content'><a class = 'research_team_links' href = '#research_location'>".$row1['title']."</a></div>";
		}
		echo "</div>";
	}

	$remaining_profiles_query = "SELECT * FROM team_profiles WHERE profile_id > 2";
	$remaining_profiles_result = $mysqli->query($remaining_profiles_query);


	echo "<div id = 'profileClick' onclick = \"showProfiles('remainingProfiles', 'profileClick')\">Read more about our team members</div>";
	echo "<div id = 'remainingProfiles'>";
	while ($row = $remaining_profiles_result->fetch_assoc()){
		echo "<div class='oneline'>";
		echo "<img class='photo' src = ".$row['image_path']." alt = 'profile'/><br><br>";
		echo "<div class='subtitle4'>".$row['name']."</div>";
		echo "<div class='subtitle3'><a href = 'mailto:".$row['email']."?Subject=Robotics%20Lab%20Contact' target = '_top'>Send email</a></div>";
		echo "<div class='subtitle3'>".$row['location']." ";
		echo "| ".$row['phone']."</div>";
		echo "<div class='content'>".html_entity_decode($row['profile'])."</div>";

		$research_query = "SELECT * FROM research INNER JOIN team_projects 
		ON research.id = team_projects.projectID WHERE profileID = " . $row['profile_id'];
		$research_result = $mysqli->query($research_query);

		echo "<div class = 'subtitle6'>More about ".$row['name']."'s projects<br></div>";
		while ($row1 = $research_result->fetch_assoc()) {
			echo "<div class = 'research_team_content'><a class = 'research_team_links' href = '#research_location'>".$row1['title']."</a></div>";
		}
		echo "</div>";
	}
	echo "</div>";

	if (isset($_SESSION['logged_user'])) {
		$logged_user = $_SESSION['logged_user'];
	?>

	<div id = 'admin_team' onclick = "showAdminTools('admin_team_div', 'admin_team')">Show Admin Tools</div>
	<div id = 'admin_team_div'>
	<div id = 'add_member' onclick = "showTeamForm('team_form', 'add_member')">Add New Profile</div>
	<div id = 'team_form'>
		<form method='post' enctype='multipart/form-data' id="formForUploading">
			<div class='form_subtitle1'>Add new profile</div>
			<div class='form_subtitle2'>Select Image:</div>
			<input type='file' id = 'new_image' name='image' required/><br><br>
			<div class='form_subtitle2'>Name:</div>
			<input type='text' id = 'new_team_name' name='name' required/><br><br>
			<div class='form_subtitle2'>Email:</div>
			<input type = 'email' id = 'new_team_email' name = 'email' required/><br><br>
			<div class='form_subtitle2'>Profile:</div>
			<div class="advanced-wrapper5">

			<div class="toolbar-container5"><span class="ql-format-group">
			    <select title="Font" class="ql-font">
			      <option value="sans-serif" selected>Sans Serif</option>
			      <option value="Georgia, serif">Serif</option>
			      <option value="Monaco, 'Courier New', monospace">Monospace</option>
			    </select>
			    <select title="Size" class="ql-size">
			      <option value="10px">Small</option>
			      <option value="13px" selected>Normal</option>
			      <option value="18px">Large</option>
			      <option value="32px">Huge</option>
			    </select></span><span class="ql-format-group"><span title="Bold" class="ql-format-button ql-bold"></span><span class="ql-format-separator"></span><span title="Italic" class="ql-format-button ql-italic"></span><span class="ql-format-separator"></span><span title="Underline" class="ql-format-button ql-underline"></span></span><span class="ql-format-group">
			    <select title="Text Color" class="ql-color">
			      <option value="rgb(0, 0, 0)" selected></option>
			      <option value="rgb(230, 0, 0)"></option>
			      <option value="rgb(255, 153, 0)"></option>
			      <option value="rgb(255, 255, 0)"></option>
			      <option value="rgb(0, 138, 0)"></option>
			      <option value="rgb(0, 102, 204)"></option>
			      <option value="rgb(153, 51, 255)"></option>
			      <option value="rgb(255, 255, 255)"></option>
			      <option value="rgb(250, 204, 204)"></option>
			      <option value="rgb(255, 235, 204)"></option>
			      <option value="rgb(255, 255, 204)"></option>
			      <option value="rgb(204, 232, 204)"></option>
			      <option value="rgb(204, 224, 245)"></option>
			      <option value="rgb(235, 214, 255)"></option>
			      <option value="rgb(187, 187, 187)"></option>
			      <option value="rgb(240, 102, 102)"></option>
			      <option value="rgb(255, 194, 102)"></option>
			      <option value="rgb(255, 255, 102)"></option>
			      <option value="rgb(102, 185, 102)"></option>
			      <option value="rgb(102, 163, 224)"></option>
			      <option value="rgb(194, 133, 255)"></option>
			      <option value="rgb(136, 136, 136)"></option>
			      <option value="rgb(161, 0, 0)"></option>
			      <option value="rgb(178, 107, 0)"></option>
			      <option value="rgb(178, 178, 0)"></option>
			      <option value="rgb(0, 97, 0)"></option>
			      <option value="rgb(0, 71, 178)"></option>
			      <option value="rgb(107, 36, 178)"></option>
			      <option value="rgb(68, 68, 68)"></option>
			      <option value="rgb(92, 0, 0)"></option>
			      <option value="rgb(102, 61, 0)"></option>
			      <option value="rgb(102, 102, 0)"></option>
			      <option value="rgb(0, 55, 0)"></option>
			      <option value="rgb(0, 41, 102)"></option>
			      <option value="rgb(61, 20, 102)"></option>
			    </select><span class="ql-format-separator"></span>
			    <select title="Background Color" class="ql-background">
			      <option value="rgb(0, 0, 0)"></option>
			      <option value="rgb(230, 0, 0)"></option>
			      <option value="rgb(255, 153, 0)"></option>
			      <option value="rgb(255, 255, 0)"></option>
			      <option value="rgb(0, 138, 0)"></option>
			      <option value="rgb(0, 102, 204)"></option>
			      <option value="rgb(153, 51, 255)"></option>
			      <option value="rgb(255, 255, 255)" selected></option>
			      <option value="rgb(250, 204, 204)"></option>
			      <option value="rgb(255, 235, 204)"></option>
			      <option value="rgb(255, 255, 204)"></option>
			      <option value="rgb(204, 232, 204)"></option>
			      <option value="rgb(204, 224, 245)"></option>
			      <option value="rgb(235, 214, 255)"></option>
			      <option value="rgb(187, 187, 187)"></option>
			      <option value="rgb(240, 102, 102)"></option>
			      <option value="rgb(255, 194, 102)"></option>
			      <option value="rgb(255, 255, 102)"></option>
			      <option value="rgb(102, 185, 102)"></option>
			      <option value="rgb(102, 163, 224)"></option>
			      <option value="rgb(194, 133, 255)"></option>
			      <option value="rgb(136, 136, 136)"></option>
			      <option value="rgb(161, 0, 0)"></option>
			      <option value="rgb(178, 107, 0)"></option>
			      <option value="rgb(178, 178, 0)"></option>
			      <option value="rgb(0, 97, 0)"></option>
			      <option value="rgb(0, 71, 178)"></option>
			      <option value="rgb(107, 36, 178)"></option>
			      <option value="rgb(68, 68, 68)"></option>
			      <option value="rgb(92, 0, 0)"></option>
			      <option value="rgb(102, 61, 0)"></option>
			      <option value="rgb(102, 102, 0)"></option>
			      <option value="rgb(0, 55, 0)"></option>
			      <option value="rgb(0, 41, 102)"></option>
			      <option value="rgb(61, 20, 102)"></option>
			    </select><span class="ql-format-separator"></span>
			    <select title="Text Alignment" class="ql-align">
			      <option value="left" selected></option>
			      <option value="center"></option>
			      <option value="right"></option>
			      <option value="justify"></option>
			    </select></span><span class="ql-format-group"><span title="Link" class="ql-format-button ql-link"></span><span class="ql-format-separator"></span><span title="Image" class="ql-format-button ql-image"></span><span class="ql-format-separator"></span><span title="List" class="ql-format-button ql-list"></span></span>
			</div>

			<div class="editor-container5">
			</div></div>
	
			<div class='form_subtitle2'>Office location:</div>
			<input type = 'text' id = 'new_team_office' name = 'location'/><br><br>
			<div class='form_subtitle2'>Phone number (###-###-####):</div>
			<input type = 'text' id = 'new_team_phone' name = 'phone'/><br><br>
			<div class="form_subtitle2">Research involvement:</div>
			<?php
				require_once "config.php";
				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

				if (mysqli_connect_error($mysqli)) {
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				$projects_query = "SELECT id, title FROM research";
				$projects_result = $mysqli->query($projects_query);

				while ($row = $projects_result->fetch_assoc()) {
					echo "<input type = 'checkbox' name = 'projects[]' class = 'new_profile_add_research' value =".$row['id'].">".$row['title']."<br><br>";
				}
			?>
		<textarea id="backupContent" name = "new_profile">fdfafa</textarea>
		<input type="submit" id="submitButton"> 	
		</form>
		<div id="confirmation_new_profile"><p></p></div>
			
	</div>


	<div id = 'edit_team' onclick = "showTeamEditForm('team_edit_form', 'edit_team')">Edit Profile</div>
	<div id = 'team_edit_form'>
	<form method='post' enctype='multipart/form-data' id="update_profile_form">
		<div class ='form_subtitle1'>Edit team profile</div>
		<div class = 'form_subtitle2'>Fill out any of the below fields to edit.</div>
		<div class = 'form_subtitle2'>Select profile:</div>
		<?php
			require_once "config.php";
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			if (mysqli_connect_error($mysqli)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			else {
				echo "<select name = 'id' id='profile_selection' required>
				<option></option>";
				$all_news = "SELECT * FROM team_profiles";
				$result = $mysqli->query($all_news);
				while ($row = $result->fetch_assoc()){
				 	echo "<option value = '".$row['profile_id']."'> ".$row['name']."</option>";
				}
				echo "</select><br>";
			}
		?>
		<br><div class='form_subtitle2'>Select Image:</div>
		<input type='file' name='image_update' /><br><br>
		<div class = 'form_subtitle2'>Name:</div>
		<input type='text' name='name' id="updated_profile_name"/><br><br>
		<div class='form_subtitle2'>Profile:</div>
		<div class="advanced-wrapper6">

		<div class="toolbar-container6"><span class="ql-format-group">
		    <select title="Font" class="ql-font">
		      <option value="sans-serif" selected>Sans Serif</option>
		      <option value="Georgia, serif">Serif</option>
		      <option value="Monaco, 'Courier New', monospace">Monospace</option>
		    </select>
		    <select title="Size" class="ql-size">
		      <option value="10px">Small</option>
		      <option value="13px" selected>Normal</option>
		      <option value="18px">Large</option>
		      <option value="32px">Huge</option>
		    </select></span><span class="ql-format-group"><span title="Bold" class="ql-format-button ql-bold"></span><span class="ql-format-separator"></span><span title="Italic" class="ql-format-button ql-italic"></span><span class="ql-format-separator"></span><span title="Underline" class="ql-format-button ql-underline"></span></span><span class="ql-format-group">
		    <select title="Text Color" class="ql-color">
		      <option value="rgb(0, 0, 0)" selected></option>
		      <option value="rgb(230, 0, 0)"></option>
		      <option value="rgb(255, 153, 0)"></option>
		      <option value="rgb(255, 255, 0)"></option>
		      <option value="rgb(0, 138, 0)"></option>
		      <option value="rgb(0, 102, 204)"></option>
		      <option value="rgb(153, 51, 255)"></option>
		      <option value="rgb(255, 255, 255)"></option>
		      <option value="rgb(250, 204, 204)"></option>
		      <option value="rgb(255, 235, 204)"></option>
		      <option value="rgb(255, 255, 204)"></option>
		      <option value="rgb(204, 232, 204)"></option>
		      <option value="rgb(204, 224, 245)"></option>
		      <option value="rgb(235, 214, 255)"></option>
		      <option value="rgb(187, 187, 187)"></option>
		      <option value="rgb(240, 102, 102)"></option>
		      <option value="rgb(255, 194, 102)"></option>
		      <option value="rgb(255, 255, 102)"></option>
		      <option value="rgb(102, 185, 102)"></option>
		      <option value="rgb(102, 163, 224)"></option>
		      <option value="rgb(194, 133, 255)"></option>
		      <option value="rgb(136, 136, 136)"></option>
		      <option value="rgb(161, 0, 0)"></option>
		      <option value="rgb(178, 107, 0)"></option>
		      <option value="rgb(178, 178, 0)"></option>
		      <option value="rgb(0, 97, 0)"></option>
		      <option value="rgb(0, 71, 178)"></option>
		      <option value="rgb(107, 36, 178)"></option>
		      <option value="rgb(68, 68, 68)"></option>
		      <option value="rgb(92, 0, 0)"></option>
		      <option value="rgb(102, 61, 0)"></option>
		      <option value="rgb(102, 102, 0)"></option>
		      <option value="rgb(0, 55, 0)"></option>
		      <option value="rgb(0, 41, 102)"></option>
		      <option value="rgb(61, 20, 102)"></option>
		    </select><span class="ql-format-separator"></span>
		    <select title="Background Color" class="ql-background">
		      <option value="rgb(0, 0, 0)"></option>
		      <option value="rgb(230, 0, 0)"></option>
		      <option value="rgb(255, 153, 0)"></option>
		      <option value="rgb(255, 255, 0)"></option>
		      <option value="rgb(0, 138, 0)"></option>
		      <option value="rgb(0, 102, 204)"></option>
		      <option value="rgb(153, 51, 255)"></option>
		      <option value="rgb(255, 255, 255)" selected></option>
		      <option value="rgb(250, 204, 204)"></option>
		      <option value="rgb(255, 235, 204)"></option>
		      <option value="rgb(255, 255, 204)"></option>
		      <option value="rgb(204, 232, 204)"></option>
		      <option value="rgb(204, 224, 245)"></option>
		      <option value="rgb(235, 214, 255)"></option>
		      <option value="rgb(187, 187, 187)"></option>
		      <option value="rgb(240, 102, 102)"></option>
		      <option value="rgb(255, 194, 102)"></option>
		      <option value="rgb(255, 255, 102)"></option>
		      <option value="rgb(102, 185, 102)"></option>
		      <option value="rgb(102, 163, 224)"></option>
		      <option value="rgb(194, 133, 255)"></option>
		      <option value="rgb(136, 136, 136)"></option>
		      <option value="rgb(161, 0, 0)"></option>
		      <option value="rgb(178, 107, 0)"></option>
		      <option value="rgb(178, 178, 0)"></option>
		      <option value="rgb(0, 97, 0)"></option>
		      <option value="rgb(0, 71, 178)"></option>
		      <option value="rgb(107, 36, 178)"></option>
		      <option value="rgb(68, 68, 68)"></option>
		      <option value="rgb(92, 0, 0)"></option>
		      <option value="rgb(102, 61, 0)"></option>
		      <option value="rgb(102, 102, 0)"></option>
		      <option value="rgb(0, 55, 0)"></option>
		      <option value="rgb(0, 41, 102)"></option>
		      <option value="rgb(61, 20, 102)"></option>
		    </select><span class="ql-format-separator"></span>
		    <select title="Text Alignment" class="ql-align">
		      <option value="left" selected></option>
		      <option value="center"></option>
		      <option value="right"></option>
		      <option value="justify"></option>
		    </select></span><span class="ql-format-group"><span title="Link" class="ql-format-button ql-link"></span><span class="ql-format-separator"></span><span title="Image" class="ql-format-button ql-image"></span><span class="ql-format-separator"></span><span title="List" class="ql-format-button ql-list"></span></span>
		</div>

		<div class="editor-container6">
		</div></div>

		<div class='form_subtitle2'>Email:</div>
		<input type = 'email' name = 'email' id="profile_email" /><br><br>
		<div class='form_subtitle2'>Office location:</div>
		<input type = 'text' name = 'location' id="profile_location" /><br><br>
		<div class='form_subtitle2'>Phone number (###-###-####):</div>
		<input type = 'text' name = 'phone' id="profile_phone"/><br><br>
		<div class="form_subtitle2">Update research involvement:</div>
		<?php
			require_once "config.php";
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			if (mysqli_connect_error($mysqli)) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$projects_query = "SELECT id, title FROM research";
			$projects_result = $mysqli->query($projects_query);

			while ($row = $projects_result->fetch_assoc()) {
				echo "<input type = 'checkbox' name = 'projects[]' class = 'edit_profile_update_research' value =".$row['id'].">".$row['title']."<br><br>";
			}
		?>
		<textarea id="backupContent_editProfile" name = "edit_profile"></textarea>
		<input type="text" name="updated_profile_id" id="updated_profile_id_input" value="" />
		<input type='submit'  value='Edit Profile'/>
	</form>
	<div id="confirmation_edit_profile"><p></p></div>
</div>

	<?php
					
		// if (isset($_POST['edit_profile']))  {
		// 	$newName = htmlentities($_POST["name"]);
		// 	$newProfile = htmlentities($_POST["profile"]);
		// 	$newEmail = htmlentities($_POST["email"]);
		// 	$newLocation = htmlentities($_POST["location"]);
		// 	$newPhone = htmlentities($_POST["phone"]);
		// 	$newImage = $_FILES['image'];
		// 	$id = htmlentities($_POST["id"]);
		// 	$valid_check = true;

		// 	if(!preg_match("/^[a-zA-Z .\-0-9!?:;]*$/",$newName) || !preg_match("/^[a-zA-Z .\-0-9!?:;]*$/",$newLocation)
		// 		|| strlen($newName) > 50 || strlen($newLocation) > 50) {
		// 		echo "<br>Member names and office locations can only include characters, numbers, and certain symbols and be under fifty characters each.";
		// 		$valid_input = false;
		// 	}

		// 	if (strlen($newProfile) > 1000) {
		// 		echo "<br>Member profiles must be less than 1000 characters.";
		// 		$valid_input = false;
		// 	}

		// 	if (!preg_match("/^[0-9-]*$/", $newPhone) || strlen($newPhone)>12) {
		// 		echo "<br>Phone numbers may only include digits and be twelve charactes long.";
		// 		$valid_input = false;
		// 	}

		// 	else if ($valid_check === TRUE) {
		// 		include('edit_team.php');
		// 	}
		// }
		?>

		<div id = "delete_team" onclick = "deleteProfile('delete_team_form', 'delete_team')">Delete Profile</div>
		<div id = "delete_team_form">
		<?php 
			echo "<div class = 'form_subtitle3'>Select Profile:<br><br>";			
			require_once "config.php";
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			if (mysqli_connect_error($mysqli)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			else {
				echo "<select id='toBeDeletedTeamPosts' name = 'id'  required>
					<option></option>";
				$all_news = "SELECT * FROM team_profiles";
				$result = $mysqli->query($all_news);
				while ($row = $result->fetch_assoc()){
				 	echo "<option value = '".$row['profile_id']."'> ".$row['name']."</option>";
				}
				echo "</select><br><br>";
				echo "<div><button type='button' id='delete_team_button'>Delete</button></div>";
				echo "</div></div>";
				echo "<div id = 'delete_team_confirmation'><p></p></div>";
			}	
?>
		
	</div>

	<?php
	}
?> 