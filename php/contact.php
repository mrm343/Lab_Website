<?php
  echo "<form method = 'post' action = '#contact' enctype = 'multipart/form-data'>";
  echo "<div class = 'subtitle2'>Contact us</div>";
  echo "<div class = 'subtitle3'>Name:<br>";
  echo "<input type='text' name='name' size ='60' required/></div>";
  echo "<div class = 'subtitle3'>Email:<br>";
  echo "<input type='email' name='email' size ='60' required/></div>";
  echo "<div class = 'subtitle3'>Message:<br>";
  echo "<textarea name = 'message' cols='100' rows='15' required></textarea><br><br>";
  echo "<input type='submit' name = 'contact' value='Contact'/></div>";
  echo "</form>";
  //echo "</div>";

  if (isset($_POST['contact']))  {
    $name = htmlentities($_POST["name"]);
    $email = htmlentities($_POST["email"]);
    $message = htmlentities($_POST["message"]);

    $validFields = true;

    if(!preg_match("/^[a-zA-Z .\-]*$/",$name) || strlen($name) > 50) {
      echo "<br>Please only enter numerical characters for name field under fifty characters.";
      $validFields = false;
    }

    if(strlen($message) > 1000) {
      echo "<br>Please limit message body to 1000 characters.";
      $validFields = false;
    }

    else if ($validFields === TRUE) {
      require_once "config.php";
      $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      if (mysqli_connect_error($mysqli)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      $insert_query = "INSERT INTO `messages` (`name`, `email`, `message`) 
      VALUES ('" . $name . "', '" . $email . "', '" . $message . "')";

        if ($mysqli->query($insert_query) === TRUE) {
        echo "<div class = 'subtitle3'>Your message has been received.</div>";
      }
      else {
        echo "Error: ".$insert_query."<br>". $mysqli->error;
      }
    }
  }
?>