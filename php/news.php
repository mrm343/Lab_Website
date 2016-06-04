<?php
	//Citation: Thanks for https://quilljs.com/ to provide open source code and examples for 
	// the rich text editor
	require_once "config.php";
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if (mysqli_connect_error($mysqli)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$news_query = "SELECT * FROM news ORDER BY news.id DESC";
	$news_result = $mysqli->query($news_query);

	while ($row = $news_result->fetch_assoc()){
		$date = date_create($row['publish_date']);
		echo "<div class = 'subtitle2'>".$row['title']."</div>";
		echo "<div class = 'subtitle3'>".date_format($date, 'm/d/Y g:i A')."</div>";
		echo "<br><div class = 'content'>";
		echo html_entity_decode($row['body']);
		echo "</div>";
		
	}

if (isset($_SESSION['logged_user'])) {
	$logged_user = $_SESSION['logged_user'];
	?>

	

	<div id = "admin_news" onclick = "showAdminTools('admin_news_div', 'admin_news')">Show Admin Tools</div>
	<div id = 'admin_news_div'>
		<div id = 'add_news' onclick = "showNewsForm('news_form', 'add_news')">Add New Post</div>
		<div id = 'news_form'>
			<div class="form_subtitle1">Publish news</div>
			<div class="form_subtitle2">Title:</div>
			<input type='text' id="news_title" name='title' size ='60' required/><br><br>
			<div class="form_subtitle2">Body:</div>
			<div class="advanced-wrapper">
        
				<div class="toolbar-container"><span class="ql-format-group">
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

				<div class="editor-container">
				</div>

			</div>
			<div><button type="button" id="post_news_button">Post</button></div>
			<div id="confirmation"><p></p></div>
		</div>

		<div id = "edit_news" onclick = "showNewsEditForm('news_edit_form', 'edit_news')">Edit Post</div>
		<div id = "news_edit_form" >
			<div class ="form_subtitle1">Edit News Post</div>
			<div class ="form_subtitle2">Select Post:</div>
			<?php
				require_once "config.php";
				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

				if (mysqli_connect_error($mysqli)) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				else {
					echo "<select name = 'id' id='toBeEditedPosts' required>
					<option></option>";
					$all_news = "SELECT * FROM news";
					$result = $mysqli->query($all_news);
					while ($row = $result->fetch_assoc()){
					 	echo "<option value = '".$row['id']."'> ".$row['title']."</option>";
					}
					echo "</select>";
				}
			?><br><br>
			<div class='form_subtitle2'>Title:</div>
			<input type='text' name='title' size ='60' id="editPostTitle" required/><br><br>
			<div class="form_subtitle2">Body:</div>
			<div class="advanced-wrapper2">
        
				<div class="toolbar-container2"><span class="ql-format-group">
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

				<div class="editor-container2">
				</div>
			</div>
			<div><button type="button" id="edit_news_button">Update</button></div>
			<div id="confirmationAfterEditNews"><p></p></div>
		</div>

		<div id = "delete_news" onclick = "deletePost('delete_news_form', 'delete_news')">Delete Post</div>
		<div id = "delete_news_form">
		<?php 
			echo "<div class = 'form_subtitle3'>Select Post:<br><br>";			
			require_once "config.php";
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			if (mysqli_connect_error($mysqli)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			else {
				echo "<select id='toBeDeletedPosts' name = 'id'  required>
					<option></option>";
				$all_news = "SELECT * FROM news";
				$result = $mysqli->query($all_news);
				while ($row = $result->fetch_assoc()){
				 	echo "<option value = '".$row['id']."'> ".$row['title']."</option>";
				}
				echo "</select><br><br>";
				echo "<div><button type='button' id='delete_news_button'>Delete</button></div>";
				echo "</div></div>";
				echo "<div id = 'delete_news_confirmation'><p></p></div>";
			}
			
		?>
		
	</div>

	<?php
	}
?>