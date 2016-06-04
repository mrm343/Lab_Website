//inspiratition from http://www.webdeveloper.com/forum/showthread.php?218226-hide-show-or-expand-collapse-DIV-need-a-simple-code

//for all pages - confirm deleting post
function confirmDelete(){
	return confirm('Are you sure you want to delete this post?');
}

//show/hide admin tools

function showAdminTools(div_id, text_id) {
	var div_id = document.getElementById(div_id);
	var text_id = document.getElementById(text_id)
	if(div_id.style.display != "block") {
		div_id.style.display = "block";
		text_id.innerHTML = "Hide Admin Tools";
	}
	else {
		div_id.style.display = "none";
		text_id.innerHTML = "Show Admin Tools";
	}
}

//functions for news page

function showNewsForm(div_id, text_id) {
	var div_id = document.getElementById(div_id);
	var text_id = document.getElementById(text_id);
	if (div_id.style.display != "block") {
		div_id.style.display = "block";
		text_id.innerHTML = "Hide Form";
	}
	else {
		div_id.style.display = "none";
		text_id.innerHTML = "Add New Post";
	}
}

function showNewsEditForm(div_id, text_id) {
	var div_id = document.getElementById(div_id);
	var text_id = document.getElementById(text_id)
	if(div_id.style.display != "block") {
		div_id.style.display = "block";
		text_id.innerHTML = "Hide Form";
	}
	else {
		div_id.style.display = "none";
		text_id.innerHTML = "Edit Post";
	}
}

function deleteNews(div_id, text_id) {
	var div_id = document.getElementById(div_id);
	var text_id = document.getElementById(text_id)
	if(div_id.style.display != "block") {
		div_id.style.display = "block";
		text_id.innerHTML = "Hide Form";
	}
	else {
		div_id.style.display = "none";
		text_id.innerHTML = "Delete Post";
	}
}

//functions for research page

function showResearchEditForm(div_id, text_id) {
	var div_id = document.getElementById(div_id);
	var text_id = document.getElementById(text_id)
	if(div_id.style.display != "block") {
		div_id.style.display = "block";
		text_id.innerHTML = "Hide Form";
	}
	else {
		div_id.style.display = "none";
		text_id.innerHTML = "Edit Post";
	}
}

function showMore(div_id, text_id) {
	var div_id = document.getElementById(div_id);
	var text_id = document.getElementById(text_id)
	if(div_id.style.display != "block") {
		div_id.style.display = "block";
		text_id.innerHTML = "Collapse Content";
	}
	else {
		div_id.style.display = "none";
		text_id.innerHTML = "Read more about our projects";
	}
}

function showResearchForm(div_id, text_id) {
	var div_id = document.getElementById(div_id);
	var text_id = document.getElementById(text_id);
	if (div_id.style.display != "block") {
		div_id.style.display = "block";
		text_id.innerHTML = "Hide Form";
	}
	else {
		div_id.style.display = "none";
		text_id.innerHTML = "Add New Post";
	}
}

//delete news and research posts

function deletePost(div_id, text_id) {
	var div_id = document.getElementById(div_id);
	var text_id = document.getElementById(text_id)
	if(div_id.style.display != "block") {
		div_id.style.display = "block";
		text_id.innerHTML = "Hide Form";
	}
	else {
		div_id.style.display = "none";
		text_id.innerHTML = "Delete Post";
	}
}

//functions for team page

function showProfiles(div_id, text_id) {
	var div_id = document.getElementById(div_id);
	var text_id = document.getElementById(text_id)
	if(div_id.style.display != "block") {
		div_id.style.display = "block";
		text_id.innerHTML = "Collapse Content";
	}
	else {
		div_id.style.display = "none";
		text_id.innerHTML = "Read more about our team members";
	}
}

function showTeamEditForm(div_id, text_id) {
	var div_id = document.getElementById(div_id);
	var text_id = document.getElementById(text_id)
	if(div_id.style.display != "block") {
		div_id.style.display = "block";
		text_id.innerHTML = "Hide Form";
	}
	else {
		div_id.style.display = "none";
		text_id.innerHTML = "Edit Profile";
	}
}

function showTeamForm(div_id, text_id) {
	var div_id = document.getElementById(div_id);
	var text_id = document.getElementById(text_id);
	if (div_id.style.display != "block") {
		div_id.style.display = "block";
		text_id.innerHTML = "Hide Form";
	}
	else {
		div_id.style.display = "none";
		text_id.innerHTML = "Add Profile";
	}
}

function deleteProfile(div_id, text_id) {
	var div_id = document.getElementById(div_id);
	var text_id = document.getElementById(text_id)
	if(div_id.style.display != "block") {
		div_id.style.display = "block";
		text_id.innerHTML = "Hide Form";
	}
	else {
		div_id.style.display = "none";
		text_id.innerHTML = "Delete Profile";
	}
}

//login functions

function showLogin(div_id) {
	var div_id = document.getElementById(div_id);
	if(div_id.style.display != "block") {
		div_id.style.display = "block";
	}
	else {
		div_id.style.display = "none";
	}
}

$( document ).ready(function() {
 	$(".logoutNavItem").css("display","none");
    // Your code here.


    $("#login_button").click(function (){
    	//console.log("aaaaaaaaaaaaaaa");
    	var usernameInput = document.getElementById("username");
		var passwordInput = document.getElementById("password");
		console.log(usernameInput.value);
		console.log(passwordInput.value);

		//ajax
		var request;
		var userInfo={username:usernameInput.value, password:passwordInput.value};
		request = $.ajax({
			url:"php/login.php",
			type:'post',
			data:userInfo,
			dataType:'text',
			error:function(error){
				console.log(error);
			}
		});

		request.success(function (data){
			if(data==="Success"){
				console.log("reload the page!");
				// window.location.reload(true); 
				window.location.href = 'index.php';
			}else{
				$("#incorrectLogin").text("Login incorrect. Please try again.")
				$("#username").val("");
				$("#password").val("");
				console.log(data);
			}
		})
    })

    // newly added, handle generating new posts and sending ajax request to newsAjax.php
    $("#post_news_button").click(function (){
    	console.log("lalala");
    	var request;
    	var title = $("#news_title").val();
    	var body = advancedEditor.getHTML();

		var postInfo={newPost:"YES", title:title, content:body};
		request = $.ajax({
			url: "php/newsAjax.php",
			type: 'post',
			data: postInfo,
			dataType:'text',
			error:function(error){
				console.log(error);
			}
		});

		request.success(function (data) {

			if(data === "Success"){
				$("#confirmation p").html("New post created successfully.");
				var delay = 1000;
				setTimeout(function (){
					window.location.href = 'index.php';
				},delay);
				

			}else{
				$("#confirmation p").html(data);
			}

		})
    })

    // handle posts to be editted, we should display them once user choose one option
    $("#toBeEditedPosts").change( function (){
    	console.log("xxxxx");
    	var target = $("#toBeEditedPosts option:selected");
    	var value= target.val();
    	var request;
    	var postInfo = {getPost:"YES", val:value};
    	request = $.ajax({
			url: "php/newsAjax.php",
			type: 'post',
			data: postInfo,
			dataType:'json',
			error:function(error){
				console.log(error);
			}
		});
		
		request.success(function (data){
			$("#editPostTitle").val(data.title);
			$("#ql-editor-2").html(data.content);
		})
    })

    // save the post after editting to the database
 	$("#edit_news_button").click( function (){
 		var request;
 		var target = $("#toBeEditedPosts option:selected");
    	var id = target.val();
    	var title = $("#editPostTitle").val();
    	var body = advancedEditor2.getHTML();
    	var postInfo = {saveUpdatedPost: "YES", id: id, title: title, body: body};
    	request = $.ajax({
    		url: "php/newsAjax.php",
			type: 'post',
			data: postInfo,
			dataType:'text',
			error:function(error){
				console.log(error);
			}
    	});

    	request.success(function (data){
    		if(data === "success"){
    			$("#confirmationAfterEditNews p").html("News post updated successfully!");
				var delay = 1000;
				setTimeout( function (){
					window.location.href = 'index.php';
				},delay);
    		}
    		else{
    			$("#confirmationAfterEditNews p").html(data);
    		}
    	})
 	})

 	//send deleting post request to newsAjax.php
 	$("#delete_news_button").click(function (){
 		var request;
 		var target = $("#toBeDeletedPosts option:selected");
    	var id = target.val();
    	var postInfo = {deleteNewsPost:"YES", id:id};
    	request = $.ajax({
    		url: "php/newsAjax.php",
			type: 'post',
			data: postInfo,
			dataType:'text',
			error:function(error){
				console.log(error);
			}
    	});

    	request.success(function (data){
    		console.log(data);
    		if(data === "success"){
    			$("#delete_news_confirmation p").html("Post deleted successfully.");
    			var delay = 1000;
				setTimeout( function (){
					window.location.href = 'index.php';
				},delay);
    		}else{
    			$("#delete_news_confirmation p").text(data);
    		}
    	})
 	})
 	//*********************research************************
 	//create new research
 	$("#post_research_button").click( function (){



 		var request;
 		var title = $("#new_research_title").val();
    	var body = advancedEditor3.getHTML();

    	var researchers = [];
    	researchers = $(".new_research_add_profile:checked").toArray();
    	var profile_id_list=[];
    	researchers.forEach(function (d){
    		profile_id_list.push(d.value);
    	})

    	var postInfo={newResearchPost:"YES", title:title, content:body, profileIdList: profile_id_list};
		request = $.ajax({
			url: "php/researchAjax.php",
			type: 'post',
			data: postInfo,
			dataType:'text',
			error:function(error){
				console.log(error);
			}
		});

		request.success(function (data) {
			console.log(data);
			if(data === "Success"){
				$("#confirmation_new_research p").html("New post created successfully.");
				var delay = 1000;
				setTimeout(function (){
					window.location.href = 'index.php';
				},delay);
				

			}else{
				$("#confirmation_new_research p").text(data);
			}

		})
 	})

 	//get existing research title and body
 	$("#toBeEditedResearches").change(function (){
 		var target = $("#toBeEditedResearches option:selected");
    	var value= target.val();

    	var request;
    	console.log(value);
    	var postInfo = {editResearch:"YES", researchId: value};
    	request = $.ajax({
    		url: "php/researchAjax.php",
			type: 'post',
			data: postInfo,
			dataType:'json',
			error:function(error){
				console.log(error);
			}
    	});

    	request.success(function (data) {
    		//var listOfProfiles = data.listOfProfiles;
   			$("#editResearchTitle").val(data.title);
			$("#ql-editor-4").html(data.content);
			var listOfProfiles = data.listOfProfiles;
			console.log(listOfProfiles);
			var listOfCheckBox = $(".edit_research_and_profile").toArray();
			console.log(listOfCheckBox);
			listOfCheckBox.forEach(function (d){
				console.log(d.value);
				if( listOfProfiles.includes(""+d.value) ){
					d.click();
				}
			})
    	})
 	})

 	// save updated reserach information
 	$("#edit_research_button").click(function (){
 		var target = $("#toBeEditedResearches option:selected");
    	var id = target.val();
    	var title = $("#editResearchTitle").val();
    	var body = advancedEditor4.getHTML();

		var researchers = [];
    	researchers = $(".edit_research_and_profile:checked").toArray();
    	var profile_id_list=[];
    	researchers.forEach(function (d){
    		profile_id_list.push(d.value);
    	})

    	var postInfo = {saveUpdatedResearchPost: "YES", id: id, title: title, body: body, profileIdList:profile_id_list };

    	request = $.ajax({
    		url: "php/researchAjax.php",
			type: 'post',
			data: postInfo,
			dataType:'text',
			error:function(error){
				console.log(error);
			}
    	});

    	request.success(function (data){
    		if(data === "success"){
    			$("#confirmationAfterEditResearch p").html("Research post updated successfully!");
				var delay = 1000;
				setTimeout(function (){
					window.location.href = 'index.php';
				},delay);

    		}else{
    			$("#confirmationAfterEditResearch p").text(data);
    		}
    	})
 	})
	
	//delete the research posts
	$("#delete_research_button").click(function (){

		var request;
 		var target = $("#toBeDeletedResearchPosts option:selected");
    	var id = target.val();
    	var postInfo = {deleteResearchPost:"YES", id:id};

    	request = $.ajax({
    		url: "php/researchAjax.php",
			type: 'post',
			data: postInfo,
			dataType:'text',
			error:function(error){
				console.log(error);
			}
    	});

    	request.success(function (data){
    		console.log(data);
    		if(data === "success"){
    			$("#delete_research_confirmation p").html("Post deleted successfully.");
    			var delay = 1000;
				setTimeout( function (){
					window.location.href = 'index.php';
				},delay);
    		}else{
    			$("#delete_research_confirmation p").text(data);
    		}
    	})

	})

//*********************team*************************
	//create new profile
	
	//citation: Thanks for the code provided in https://www.formget.com/ajax-image-upload-php/
	//for uploading form input files and contents with ajax
	$("#formForUploading").on( 'submit',function (e){
		console.log("in the form submit");
		var profile = advancedEditor5.getHTML();
		console.log(profile);
		$("#backupContent").html(profile);

		e.preventDefault();

		var request;

		request = $.ajax({
			url: "php/teamAjax.php",
			type: 'post',
			data: new FormData(this),
			contentType: false,
			cache: false, 
			processData:false,
			error:function(error){
				console.log(error);
			}
		});

		request.success(function (data) {
			if(data === "success"){
				$("#confirmation_new_profile p").html("New profile created successfully.");
				var delay = 1000;
				setTimeout(function (){
					window.location.href = 'index.php';
				},delay);
			}else{
				$("#confirmation_new_profile p").text(data);
			}

		})

	});

	//get existing profile information
 	$("#profile_selection").change(function (){
 		var selectedProfile = $("#profile_selection option:selected");
    	var profile_id= selectedProfile.val();

    	var request;
    	var postInfo = {displayEditProfile:"YES", profileId: profile_id};
    	request = $.ajax({
    		url: "php/teamAjax.php",
			type: 'post',
			data: postInfo,
			dataType:'json',
			error:function(error){
				console.log(error);
			}
    	});

    	request.success(function (data) {
    		//var listOfProfiles = data.listOfProfiles;
   			

			var name = data.name;
			var profile = data.profile;
			var email = data.email;
			var location = data.location;
			var phone = data.phone;
			var projects = data.listOfProjects;

			$("#updated_profile_name").val(name);
			$("#ql-editor-6").html(profile);
			$("#profile_email").val(email);
			$("#profile_location").val(location);
			$("#profile_phone").val(phone);
			var listOfCheckBox = $(".edit_profile_update_research").toArray();

			listOfCheckBox.forEach(function (d){
				console.log(d.value);
				if( projects.includes(""+d.value) ){
					d.click();
				}
			})
    	})
 	})

	//update editted profile
	$("#update_profile_form").on('submit', function (e){

		var profile = advancedEditor6.getHTML();
		$("#backupContent_editProfile").html(profile);
		var target = $("#profile_selection option:selected");
    	var id = target.val();
    	$("#updated_profile_id_input").val(id);
		e.preventDefault();

		var request;

		request = $.ajax({
			url: "php/teamAjax.php",
			type: 'post',
			data: new FormData(this),
			contentType: false,
			cache: false, 
			processData:false,
			error:function(error){
				console.log(error);
			}
		});

		request.success(function (data) {
			console.log("I got something back: "+data);
			if(data === "success"){
				$("#confirmation_edit_profile p").html("Profile updated successfully.");
				var delay = 1000;
				setTimeout(function (){
					window.location.href = 'index.php';
				},delay);
			}else{
				$("#confirmation_edit_profile p").text(data);
			}

		})

	});

	
	//delete the team posts
	$("#delete_team_button").click(function (){

		var request;
 		var target = $("#toBeDeletedTeamPosts option:selected");
    	var id = target.val();
    	var postInfo = {deleteTeamPost:"YES", id:id};

    	request = $.ajax({
    		url: "php/teamAjax.php",
			type: 'post',
			data: postInfo,
			dataType:'text',
			error:function(error){
				console.log(error);
			}
    	});

    	request.success(function (data){
    		console.log(data);
    		if(data === "success"){
    			$("#delete_team_confirmation p").html("Profile deleted successfully.");
    			var delay = 1000;
				setTimeout( function (){
					window.location.href = 'index.php';
				},delay);
    		}else{
    			$("#delete_team_confirmation p").text(data);
    		}
    	})
	});


});


