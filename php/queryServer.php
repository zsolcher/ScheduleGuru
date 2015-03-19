<?php
	$request = $_GET['request'];
	$prereqs = "prereqs";
	$classData = "classData";
	$sameAs = "sameAs";
	$login = "login";
	$classesTaken = "classesTaken";
	$updateAccountSettings = "updateAccount";
	$userData = "userData";
	

	$mysqli = mysqli_connect("localhost","colson1","0735524","ScheduleGuru");
	if($mysqli ->connect_error) {
		die("Connection failed: ".$mysqli->connect_error);	
	}
	if($request === $prereqs){
		$userID = $_GET['ClassID'];
		$query = "SELECT * FROM Prereqs WHERE ClassID='".$userID."';";
	}elseif($request ===$classData) {
		$classID = $_GET['ClassID'];
		$query = "SELECT * FROM AllClasses WHERE ClassID='".$classID."';";
	}elseif($request ===$sameAs) {
		$classID = $_GET['ClassID'];
		$query = "SELECT * FROM SameClasses WHERE ClassID='".$classID."';";
	}elseif($request ===$login) {
		$username = htmlentities($_GET["username"]);
		$password = htmlentities($_GET["password"]);
		$query = "SELECT * FROM Users WHERE Email='".$username."' AND PASSWORD='".$password."';";
	}elseif($request ===$classesTaken) {
		$userID = $_GET['UserID'];		
		$query = "SELECT * FROM ClassesTaken WHERE UserID='".$userID."';";
	}elseif($request ===$updateAccountSettings) {
		$userID = $_GET['UserID'];
		$firstName = $_GET['FirstName'];
		$lastName = $_GET['LastName'];
		$major = $_GET['Major'];
		$year = $_GET['Year'];
		$query = "UPDATE Users SET LastName = '".$lastName."',
			FirstName = '".$firstName."',
			Major = '".$major."',
			Year = '".$year."'
			WHERE UserID = '".$userID."';";
	}elseif($request ===$userData) {
		$userID = $_GET['UserID'];		
		$query = "SELECT * FROM Users WHERE UserID='".$userID."';";
	}
	$result = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
	
	$numOfRows = mysqli_num_rows($result);
	if($numOfRows === 0){
		echo "No results";
	}else {
		if($request === $prereqs) {
			$toReturn = array();
			while($row = mysqli_fetch_assoc($result)){
				array_push($toReturn,$row['Prereq']);
			}
			echo json_encode($toReturn);
		}elseif($request === $classData) {
			while($row = mysqli_fetch_assoc($result)){
				print_r($row);
			}
		}elseif($request ===$sameAs) {
			while($row = mysqli_fetch_assoc($result)){
				echo $row['SameAs']." ";
			}
		}elseif($request === $login) {
			while($row = mysqli_fetch_assoc($result)){
				echo json_encode($row);
			}
		}elseif($request === $classesTaken) {
			while($row = mysqli_fetch_assoc($result)){
				echo $row['ClassID']." ";
			}
		}elseif($request === $updateAccountSettings) {
			print(mysqli_affected_rows($mysqli));
		}elseif($request === $userData) {
			$row = mysqli_fetch_assoc($result);
			echo json_encode($row);
		}
		
	}
?>