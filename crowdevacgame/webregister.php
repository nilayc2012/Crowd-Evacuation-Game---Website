<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!isset($_POST['uname']) || empty($_POST['uname'])){
		exit(0);
	}
	if (!isset($_POST['pwd']) || empty($_POST['pwd'])){
		exit(0);
	}
		if (!isset($_POST['fname']) || empty($_POST['fname'])){
		exit(0);
	}
	if (!isset($_POST['cpwd']) || empty($_POST['cpwd'])){
		exit(0);
	}
		if (!isset($_POST['fname']) || empty($_POST['fname'])){
		exit(0);
	}
	if (!isset($_POST['lname']) || empty($_POST['lname'])){
		exit(0);
	}
		if (!isset($_POST['age']) || empty($_POST['age'])){
		exit(0);
	}


	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	$cpwd=$_POST['cpwd'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$age = $_POST['age'];

	if($pwd === $cpwd)
	{
	

	$conn = new mysqli("localhost", "nilay", "RutgersRah", "crowdevacgames");
	
	if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
	}

	$sql="SELECT * FROM CrowdUser  WHERE username='". $uname . "'";
	$result = $conn->query($sql);

	if($result->num_rows >=1)
	{
		$_SESSION["response"] = "Username exists";
		header("Location: http://spanky.rutgers.edu/crowdevacgame/");
	}
	else{
			
	$sql = "INSERT INTO CrowdUser
	VALUES ('" . $uname . "', '" . $fname . "','" . $lname . "','" . $pwd . "','" . $age . "')";

	if ($conn->query($sql) === TRUE) {
		$_SESSION["response"] = "Registered";
header("Location: http://spanky.rutgers.edu/crowdevacgame/");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}
$conn->close();	
}
else
{
		$_SESSION["response"] = "Password Mismatch";
		header("Location: http://spanky.rutgers.edu/crowdevacgame/");
}
}

?>