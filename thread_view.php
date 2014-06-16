<?php
require('./conf_a.php');
if (isset($_GET['thread_id'])) {
$thread = $_GET['thread_id'];
// sloppy mysql connect - remove to constants include later
// connect to db and build list of threads
$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <title>talk.st-util.com - Comments</title>
<link rel="stylesheet" type="text/css" href="index.css" media="all">
</head>
<body>
    <h1>ST Talk - Employee Thread</h1>
	<br>
<p class="meta">
    <a href="http://talk.st-util.com">HOME</a>&nbsp;&nbsp;
  <br>
  added: 19 mins ago
</p>

<?php
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM subject WHERE sub_id = $thread";

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
 <h3>Comments</h3>

        <div class="commands">
                        <!-- adding Disqus -->
                           <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'talkutil'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>


</div>
</div>
<?php
        }
  // Free result set
  mysqli_free_result($result);
}

Mysqli_close($con);
//closing thread id has value condition
}
else {
echo "<br><br><br><h2><font color=red>You must specify a specific thread</font></h2>";
    }
?>
</body>
</html>

