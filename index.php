 <?php
  include("connection.php");
  
  try {
    $conn = new PDO("mysql: host=$servername;port=$port;dbname=$dbname", 
      $username, $password);
      //// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql_read   = "SELECT * FROM stories";
	$sql_upd_v  = "UPDATE  stories (STORY_ID, STORY_TEXT, STORY_IMAGE, STORY_VOTE_CNT)
		VALUES ('$STORY_ID', '$STORY_TEXT', '$STORY_IMAGE', '$STORY_VOTE_CNT')";
      ////use exec() because no results are returned
    $conn->exec($sql_read);
    
    unset($username);
    unset($password);
	echo $sql_read;
    
    echo "bases read";
    }
  catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
  $conn = null;
  
  
?> 
