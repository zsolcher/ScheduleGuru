<?php
	$request = $_GET['request'];
	$prereqs = "prereqs";
	$classData = "classData";
	$sameAs = "sameAs";
	$login = "login";
	$classesTaken = "classesTaken";
	$updateAccountSettings = "updateAccount";
	$userData = "userData";
	$getAllDepartment = "getAllDepartment";
	$savedSchedules = "savedSchedules";
	$registerUser = "registerUser";
	$getCC = "getCC";
	

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
		$userEmail = $_GET['UserEmail'];		
		$query = "SELECT * FROM Users WHERE Email='".$userEmail."';";
	}elseif($request ===$getAllDepartment) {
		$dpt = $_GET['dpt'];		
		$query = "SELECT * FROM AllClasses WHERE Department='".$dpt."';";
	}elseif($request ===$savedSchedules) {
		$userID = $_GET['UserID'];	
		$query = "SELECT * FROM SavedSchedules WHERE UserID='".$userID."';";
	}elseif($request ===$registerUser) {
		$firstName = $_GET['FirstName'];
		$lastName = $_GET['LastName'];
		$username = $_GET['username'];
		$password = $_GET['password'];
		$query = "INSERT INTO Users(FirstName,LastName,Email,Password) VALUES ('".$firstName."','".$lastName."','".$username."','".$password."');";
	}elseif($request ===$getCC) {
		$mwf = $_GET['mwf'];
		$tr = $_GET['tr'];
		$startTime = $_GET['startTime'];
		$endTime = $_GET['endTime'];	
		$query = "SELECT * FROM AllClasses WHERE (Days='".$mwf."' OR Days ='".$tr."') AND StartTime >= '".$startTime."' AND EndTime <= '".$endTime."';";
	}
	$result = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
	
	$numOfRows = mysqli_num_rows($result);
	if($numOfRows === 0){
		echo json_encode("0");
	}else {
		$toReturn = array();
		if($request === $prereqs) {
			while($row = mysqli_fetch_assoc($result)){
				array_push($toReturn,$row['Prereq']);
			}
			echo json_encode($toReturn);
		}elseif($request === $classData) {
			while($row = mysqli_fetch_assoc($result)){
				echo json_encode($row);
			}
		}elseif($request ===$sameAs) {
			while($row = mysqli_fetch_assoc($result)){
				array_push($toReturn,$row['SameAs']);				
			}
			echo json_encode($toReturn);
		}elseif($request === $login) {
			while($row = mysqli_fetch_assoc($result)){
				echo json_encode($row);
			}
		}elseif($request === $classesTaken) {
			while($row = mysqli_fetch_assoc($result)){
				array_push($toReturn,$row['ClassID']);
			}
			echo json_encode($toReturn);
		}elseif($request === $updateAccountSettings) {
			echo json_encode(mysqli_affected_rows($mysqli));
		}elseif($request === $userData) {
			$row = mysqli_fetch_assoc($result);
			echo json_encode($row);
		}elseif($request === $getAllDepartment) {
			while($row = mysqli_fetch_assoc($result)){
				array_push($toReturn,$row);
			}
			echo json_encode($toReturn);
		}elseif($request === $savedSchedules) {
			while($row = mysqli_fetch_assoc($result)){
				array_push($toReturn,$row);
			}
			echo json_encode($toReturn);
		}elseif($request === $registerUser) {
			echo "1";
		}elseif($request === $getCC) {
			while($row = mysqli_fetch_assoc($result)){
				array_push($toReturn,$row);
			}
			echo json_encode($toReturn);
		}
	}
?>
