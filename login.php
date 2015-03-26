<?php
	include('./php/updateSite.php');
	session_start();
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- CSS Import-->
    <link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/login.css">
	<link rel="shortcut icon" href="favicon.ico">
    <!-- CSS Import-->

    <!-- Polymer Imports  -->
    <!-- 1. Load webcomponents.min.js for polyfill support. -->
    <script src="bower_components/webcomponentsjs/webcomponents.js"></script>

    <link rel="import" href="bower_components/paper-input/paper-input-decorator.html">
    <link rel="import" href="bower_components/paper-input/paper-autogrow-textarea.html">
    <link rel="import" href="bower_components/paper-input/paper-input.html">
    <link rel="import" href="bower_components/paper-icon-button/paper-icon-button.html">
    <link rel="import" href="bower_components/paper-button/paper-button.html">
    <link rel="import" href="bower_components/paper-fab/paper-fab.html">
    <link rel="import" href="bower_components/paper-toast/paper-toast.html">
    <!-- Polymer Imports  -->

    <!--  JavaScript/JQuery Import  -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!--  JavaScript/JQuery Import  -->


</head>
<body>

    <div id="loginArea">
        <img src="./imgs/guru-icon.png">
        <h1 id="title">Schedule Guru</h1>

		<div id="loginMessage"></div>

		<paper-input-decorator class="textInput" id="inputEmail" name="login_email" label="email address" floatingLabel>
		<input is="core-input"id="txtEmail" value="rbierman@trinity.edu">
		</paper-input-decorator>
		<paper-input-decorator class="textInput" id="inputPassword" name="login_password" label="password"  floatingLabel>
		<input is="core-input" id="txtPassword" type="password" value="lololol">
		</paper-input-decorator>

		<paper-button raised class="loginButton" id="btnLogin" onclick="promptLogin();">Login</paper-button>
		<paper-button raised class="loginButton" id="btnRegister" onclick="goToRegister();">Register</paper-button>

    </div>

    <paper-toast id="toastSubmit" text="Checking login."></paper-toast>
<?php
	function updatePHPSession($email){
		$_SESSION['userEmail'] = $email;
	}
?>

<script>
	function goToRegister(){
		window.location.href = "http://dias11.cs.trinity.edu/~rbierman/ScheduleGuru/register.php";
	}

	function promptLogin(){
		var email = document.querySelector('#txtEmail').value;
		var pw = document.querySelector('#txtPassword').value;

		login(email,pw);
		if(result['UserID'] == undefined) {
			alert("Wrong logins");
			$('#loginMessage').innerHTML = "Incorrect login credentials. Please try again.";
		}
		else {
			localStorage.setItem("userEmail",email);
			window.location.href = "http://dias11.cs.trinity.edu/~rbierman/ScheduleGuru/index.php";
		}
	}
</script>
</body>
</html>
