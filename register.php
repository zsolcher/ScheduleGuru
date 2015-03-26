<!DOCTYPE html>
<html>

<head lang="en">
	<meta charset="UTF-8">
	<title>Registration</title>

	<!-- CSS Import-->
	<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/login.css">
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
	<script src="js/login.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!--  JavaScript/JQuery Import  -->

</head>

<body>

	<h3>Create An Account</h3>

	<form action="./validate_registration.php" method="post">
		
		
		<paper-input-decorator class="textInput" id="inputFirst" name="new_user_fname" label="First Name" floatingLabel>
			<input is="core-input" id="new_user_fname" value="">
		</paper-input-decorator>
		
		<br>
		
		<paper-input-decorator class="textInput" id="inputLast" name="new_user_lname" label="Last Name" floatingLabel>
			<input is="core-input" id="new_user_lname" value="">
		</paper-input-decorator>
		
		<br>
		
		
		<paper-input-decorator class="textInput" id="inputEmail" name="new_user_email" label="email address" floatingLabel>
			<input is="core-input" id="new_user_email" value="">
		</paper-input-decorator>
		
		<br>
		
		<paper-input-decorator class="textInput" id="inputPassword" name="new_user_pwd1" label="password"  floatingLabel>
                <input is="core-input" id="new_user_pwd1" type="password" value="">
            </paper-input-decorator>

		<br>
		
		<paper-input-decorator class="textInput" id="inputPassword" name="new_user_pwd2" label="Re-Enter Password"  floatingLabel>
                <input is="core-input" id="new_user_pwd2" type="password" value="">
            </paper-input-decorator>

		<br>
		<input type="submit" value="Register now!">
	</form>

	<header>
		Already a user? <a href="../index.php">Back to login...</a>
	</header>

</body>

</html>