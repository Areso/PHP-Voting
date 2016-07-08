 <?php
  include("connection.php");
  
  try {
    $conn = new PDO("mysql: host=$servername;port=$port;dbname=$dbname", 
      $username, $password);
      //// set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql_read   = "SELECT * FROM STORIES";
	$sql_ins_s  = "INSERT INTO STORIES (STORY_ID, trying_from, server_respond)
    VALUES ('$site', '$trying_from', '$response_code')";
	$sql_upd_v  = "UPDATE STORIES (site, trying_from, server_respond)
    VALUES ('$site', '$trying_from', '$response_code')";
      ////use exec() because no results are returned
    $conn->exec($sql);
    
    unset($username);
    unset($password);
    
    echo "New record created successfully";
    }
  catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
  $conn = null;
  
  
?> 
