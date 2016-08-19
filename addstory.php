 <html>
	<head>
		<meta charset="utf-8"> 
		<title>
		</title>
 	</head>
	<body>
		<form action="addstory.php" method="POST" enctype="multipart/form-data">
			История:
			<textarea rows="5" cols="80" name="story"></textarea>
			<br>
			Фотография:
			<input type="file" name="image"> <input type="submit" value="Upload">
		</form>
	</body>
 </html>
 
 <?php
	include("connection.php");
	try {
		function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}
		$conn = new PDO("mysql: host=$servername;port=$port;dbname=$dbname", 
			$username, $password);
		//// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$STORY_VOTE_CNT = 0;
		$STORY_ID = 0;
		$STORY_TEXT = $_POST["story"];
		$file = $_FILES['image']['tmp_name'];
		if(!isset($file))
			echo "Please select image";
		else
		{
			$STORY_IMAGE = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$IMAGE_NAME  = addcslashes($_FILES['image']['name']);
			echo $IMAGE_NAME;
			$IMAGE_SIZE  = getimagesize($_FILES['image']['tmp_name']);
			if ($IMAGE_SIZE==FALSE)
				echo "That it is not an image";
			else
			{
				$sql_read   = "SELECT * FROM stories";
				$sql_ins_s  = "INSERT INTO stories (STORY_ID, STORY_TEXT, STORY_IMAGE, STORY_VOTE_CNT)
					VALUES ('$STORY_ID', '$STORY_TEXT', '$STORY_IMAGE', '$STORY_VOTE_CNT')";
				////use exec() because no results are returned
				$conn->exec($sql_ins_s);
				echo "New record created successfully";
			}
		}
		
		unset($username);
		unset($password);
		
		
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	$conn = null;
?>
 