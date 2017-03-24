<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!isset($_POST['uname']) || empty($_POST['uname'])){
		exit(0);
	}
	if (!isset($_POST['pwd']) || empty($_POST['pwd'])){
		exit(0);
	}


	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];

	
	$conn = new mysqli("localhost", "nilay", "RutgersRah", "crowdevacgames");
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

	$sql="SELECT * FROM CrowdUser  WHERE username='". $uname . "'";
	$result = $conn->query($sql);

	if($result->num_rows >=1)
	{
		$row = $result->fetch_assoc();

		if($row["password"] === $pwd)
		{
			$_SESSION["uname"] = $uname;
			$_SESSION["fname"] = $row["fname"] . " " . $row["lname"];
			header("Location: http://spanky.rutgers.edu/crowdevacgame/"); 
		}
		else{
			$_SESSION["response"] = "Wrong Password";
			header("Location: http://spanky.rutgers.edu/crowdevacgame/"); 
		}
		
	}
	else
	{
			$_SESSION["response"] = "Wrong Username";
			header("Location: http://spanky.rutgers.edu/crowdevacgame/"); 
	}

$conn->close();	

}

?>