<?php
	//Citation: Thanks for https://quilljs.com/ to provide open source code and examples for 
	// the rich text editor
	require_once "config.php";
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if (mysqli_connect_error($mysqli)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$first_research_query = "SELECT * FROM research WHERE id = 1";
	$first_research_result = $mysqli->query($first_research_query);

	while ($row = $first_research_result->fetch_assoc()){
		echo "<br><div class = 'subtitle2'>".$row['title']."</div>";
		echo "<div class = 'content'>".html_entity_decode($row['body'])."</div>";

		$team_members_query = "SELECT * FROM team_profiles INNER JOIN team_projects 
		ON team_profiles.profile_id = team_projects.profileID WHERE projectID = " . $row['id'];
		$team_members_result = $mysqli->query($team_members_query);

		echo "<div class = 'subtitle6'>Contact the researchers for this project<br></div>";
		while ($row1 = $team_members_result->fetch_assoc()) {
			echo "<div class = 'research_team_content'><a class = 'research_team_links' href = 'mailto:".$row1['email']."?Subject=Robotics%20Lab%20Contact' target = '_top'>".$row1['name']."</a></div>";
		}
	}

	$remaining_research_query = "SELECT * FROM research WHERE id <> 1";
	$remaining_research_result = $mysqli->query($remaining_research_query);

	echo "<div id = 'click' onclick = \"showMore('moreResearch', 'click')\">Read more about our projects</div>";
	echo "<div id = 'moreResearch'>";
	while ($row = $remaining_research_result->fetch_assoc()){
		echo "<br><br><div class = 'subtitle2'>".$row['title']."</div>";
		echo "<div class = 'content'>".html_entity_decode($row['body'])."</div>";

		$team_members_query = "SELECT * FROM team_profiles INNER JOIN team_projects 
		ON team_profiles.profile_id = team_projects.profileID WHERE projectID = " . $row['id'];
		$team_members_result = $mysqli->query($team_members_query);

		echo "<div class = 'subtitle6'>Contact the researchers for this project<br></div>";
		while ($row1 = $team_members_result->fetch_assoc()) {
			echo "<div class = 'research_team_content'><a class = 'research_team_links' href = 'mailto:".$row1['email']."?Subject=Robotics%20Lab%20Contact' target = '_top'>".$row1['name']."</a></div>";
		}
	}
	echo "</div>";

	if (isset($_SESSION['logged_user'])) {
	$logged_user = $_SESSION['logged_user'];
	?>

	<div id = "admin_research" onclick = "showAdminTools('admin_research_div', 'admin_research')">Show Admin Tools</div>
	<div id = 'admin_research_div'>
		<div id = 'add_research' onclick = "showResearchForm('research_form', 'add_research')">Add New Post</div>
		<div id = 'research_form'>
			<div class="form_subtitle1">Add new post</div>
			<div class="form_subtitle2">Title:</div>
			<input type='text' id="new_research_title" name='title' size ='60' required/><br><br>
			<div class="form_subtitle2">Body:</div>
			<div class="advanced-wrapper3">
        
				<div class="toolbar-container3"><span class="ql-format-group">
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

				<div class="editor-container3">
				</div>

			</div>
			<div class="form_subtitle2">Add researchers to this project:</div>
			<?php
				require_once "config.php";
				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

				if (mysqli_connect_error($mysqli)) {
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				$profiles_query = "SELECT profile_id, name FROM team_profiles";
				$profiles_result = $mysqli->query($profiles_query);

				while ($row = $profiles_result->fetch_assoc()) {
					echo "<input type = 'checkbox' name = 'profiles[]' class = 'new_research_add_profile' value =".$row['profile_id'].">".$row['name']."<br><br>";
				}
			?>
			<div><button type="button" id="post_research_button">Post</button></div>
			<div id="confirmation_new_research"><p></p></div>
		</div>

		<div id = "edit_research" onclick = "showResearchEditForm('research_edit_form', 'edit_research')">Edit Post</div>
		<div id = "research_edit_form" >
			<div class ="form_subtitle1">Edit Research Post</div>
			<div class ="form_subtitle2">Select Post:</div>
			<?php
				require_once "config.php";
				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

				if (mysqli_connect_error($mysqli)) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				else {
					echo "<select name = 'id' id='toBeEditedResearches' required>
					<option></option>";
					$all_news = "SELECT * FROM research";
					$result = $mysqli->query($all_news);
					while ($row = $result->fetch_assoc()){
					 	echo "<option value = '".$row['id']."'> ".$row['title']."</option>";
					}
					echo "</select>";
				}
			?><br><br>
			<div class='form_subtitle2'>Title:</div>
			<input type='text' name='title' size ='60' id="editResearchTitle" required/><br><br>
			<div class="form_subtitle2">Body:</div>
			<div class="advanced-wrapper4">
        
				<div class="toolbar-container4"><span class="ql-format-group">
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

				<div class="editor-container4">
				</div>
			</div>
			<div class="form_subtitle2">Update researchers for this project:</div>
			<?php
				require_once "config.php";
				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

				if (mysqli_connect_error($mysqli)) {
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				$profiles_query = "SELECT profile_id, name FROM team_profiles";
				$profiles_result = $mysqli->query($profiles_query);

				while ($row = $profiles_result->fetch_assoc()) {
					echo "<input type = 'checkbox' name = 'profiles[]' class = 'edit_research_and_profile' value =".$row['profile_id'].">".$row['name']."<br><br>";
				}
			?>
			<div><button type="button" id="edit_research_button">Update</button></div>
			<div id="confirmationAfterEditResearch"><p></p></div>
		</div>

		<div id = "delete_research" onclick = "deletePost('delete_research_form', 'delete_research')">Delete Post</div>
		<div id = "delete_research_form">
		<?php 
			echo "<div class = 'form_subtitle3'>Select Post:<br><br>";			
			require_once "config.php";
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			if (mysqli_connect_error($mysqli)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			else {
				echo "<select id='toBeDeletedResearchPosts' name = 'id'  required>
					<option></option>";
				$all_news = "SELECT * FROM research";
				$result = $mysqli->query($all_news);
				while ($row = $result->fetch_assoc()){
				 	echo "<option value = '".$row['id']."'> ".$row['title']."</option>";
				}
				echo "</select><br><br>";
				echo "<div><button type='button' id='delete_research_button'>Delete</button></div>";
				echo "</div></div>";
				echo "<div id = 'delete_research_confirmation'><p></p></div>";
			}
			
		?>
		
	</div>

	<?php
	}
?> 