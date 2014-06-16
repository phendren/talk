<?php
	if (!empty($_POST)) {
require('./conf_a.php');
$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else {
$st_user = $_POST['user'];
$st_title = $_POST['title'];
$st_post = $_POST['post'];
//echo "$st_post, $st_title, $st_user";
// first query to create subject


mysqli_query($con,"INSERT INTO subject (sub_user,sub_topic,sub_body)
VALUES ('$st_user','$st_title','$st_post')");
//$query = "INSERT INTO subject (sub_user, sub_topic, sub_body) VALUES ($st_user, $st_title, $st_post)";
//echo "The result was:$fin";

// second query to add post
  header("Location: http://talk.st-util.com/");
  mysqli_close($con);
}
				}
	else {
	echo "Behavior not permitted"; 
	}
?>
