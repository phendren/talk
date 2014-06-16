<?php
require('./conf_a.php');
// connect to db and build list of threads
$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <title>talk.st-util.com - List Threads</title>
<link rel="stylesheet" type="text/css" href="index.css" media="all">
<script type="text/javascript" src="jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){

	$(".btn-slide").click(function(){
		$("#panel").slideToggle("slow");
		$(this).toggleClass("active"); return false;
	});
	
	 
});
</script>
<script type="text/javascript">
	function validAt() 	{
	 var xx = document.forms["commentAt"]["user"].value;
	 var xy = document.forms["commentAt"]["title"].value;
	 var xz = document.forms["commentAt"]["post"].value;
		if ( xx == null || xx == "") {
			alert("User is a required field - try again");
			return false;
		}
		if ( xy == null || xy == "") {
                        alert("Your comment requires a title - try again");
                        return false;
                }
		if ( xz == null || xz == "") {
                        alert("Comment is a required field - try again");
                        return false;
                }

	}
</script>


</head>
<body>
<div id="panel">
	<!-- slide panel -->
	<center><br><br>
<form name="commentAt" method="post" action="add.php" style="dark-matter" onsubmit="return validAt()">
<label>
	<span>User :</span>
	<input type="text" name="user"/><br>
</label>
<label>
	<span>Title :</span>
	<input type="text" name="title"/><br>
</label>
<label>
	<span>&nbsp;</span>
	<textarea id="post" name="post" placeholder="Your Comment" rows="4" cols="50"></textarea><br>
</label>
<label>
	<span>&nbsp;</span>
	<input type="submit" value="Create New Thread">
</label>
	</form>
	</center>
</div>

<p class="slide"><a href="#" class="btn-slide">New Thread</a></p>
<br>

    <h1>ST Talk - Employee Forum</h1>
<p class="meta">
    <a href="index.php">HOME</a>&nbsp;&nbsp;
  <br>
  Last activity: 19 mins ago
</p>

<?php
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM subject ORDER BY sub_time DESC";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
?>
  <div class="script" id="something">
    <div class="header">
      <h2>
        <a href="thread_view.php?thread_id=<?php echo $row[0]; ?>" class="name">
<?php
echo $row[3]." ";
?>
       </a>
      </h2>


        <span class="author"><?php
		echo "<strong>Posted by: </strong>$row[2]";
				?>
</span>

    </div>

    <div class="about">


        <p class="description"><?php
                echo "<strong>$row[3]</strong>";
		echo "<br>$row[4]";
                                ?><br></p>



        <h3>Posted:</h3>
	<?php echo "$row[1]"; ?>
</div>
</div>
<?php
	}
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?>
</body>
</html> 
