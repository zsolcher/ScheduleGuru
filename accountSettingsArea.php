<!DOCTYPE html>
<html>
<script>
	document.getElementById("firstNameBox").innerHTML = currentUser['FirstName'];
	document.getElementById("lastNameBox").innerHTML = currentUser['LastName'];
	document.getElementById("majorBox").innerHTML = currentUser['Major'];
	var gradeLevel = "Not Known";
	if(currentUser['Year'] == "1") gradeLevel = "Freshman";
	else if(currentUser['Year'] == "2") gradeLevel = "Sophomore";
	else if(currentUser['Year'] == "3") gradeLevel = "Junior";
	else if(currentUser['Year'] == "4") gradeLevel = "Senior";
	else if(currentUser['Year'] == "5") gradeLevel = "Super Senior";
	
	document.getElementById("gradeBox").innerHTML = gradeLevel;
	document.getElementById("emailBox").innerHTML = currentUser['Email'];
</script>

<div id="currentSettingsArea">
		<h1 id="title">Current Settings</h1>
			<center>
			
			<h3 style="color:white"> First Name:</h3>
			<p id="firstNameBox"><p>

			<h3 style="color:white"> Last Name:</h3> 
			<p id="lastNameBox"><p>

			<h3 style="color:white"> Major:</h3> 
			<p id="majorBox"><p>

			<h3 style="color:white"> Email:</h3> 
			<p id="gradeBox"><p>

			<h3 style="color:white"> Major:</h3> 
			<p id="emailBox"><p>
</div>

<div id="updateSettingsArea">
		<h1 id="title">Update Settings</h1>
        <form id="accountSettingsForm" action="" method="post">
			<center>
			
			<h3 style="color:white"> First Name:
			<paper-input-decorator class="textInput" id="inputFname" name="acct_fname" label="First Name" floatingLabel>
                <input is="core-input"id="txtFname" value="">
            </paper-input-decorator>
			</h3>

			<h3 style="color:white"> Last Name: 
			<paper-input-decorator class="textInput" id="inputLname" name="acct_lname" label="Last Name"  floatingLabel>
                <input is="core-input" id="txtLname" value="">
            </paper-input-decorator>
			</h3>

			<br>
			<br>
			<!--
			<paper-input-decorator class="textInput" id="inputMajor" name="acct_major" label="Major" floatingLabel>
                <input is="core-input"id="txtMajor" value="">
            </paper-input-decorator>
			-->
			<paper-dropdown-menu label = "Major">
				<paper-dropdown class = "dropdown">
					<core-menu class="menu">
						<paper-item>Ancient Mediterranean Studies</paper-item>
						<paper-item>Biochemistry and Molecular Biology</paper-item>
						<paper-item>Chemistry</paper-item>
						<paper-item>Computer Science</paper-item>
						<paper-item>Engineering Science</paper-item>
						<paper-item>French</paper-item>
						<paper-item>International Studies</paper-item>
						<paper-item>Mathematics</paper-item>
						<paper-item>Philosophy</paper-item>
						<paper-item>Urban Studies</paper-item>
					</core-menu>
				</paper-dropdown>
			</paper-dropdown-menu>
			<!--
            <paper-input-decorator class="textGrade" id="inputGrade" name="acct_grade" label="Grade"  floatingLabel>
                <input is="core-input" id="txtGrade" value="">
            </paper-input-decorator>
			-->

			<paper-dropdown-menu label = "Grade">
				<paper-dropdown class = "dropdown">
					<core-menu class="menu">
						<paper-item>Freshman</paper-item>
						<paper-item>Sophomore</paper-item>
						<paper-item>Junior</paper-item>
						<paper-item>Senior</paper-item>
						<paper-item>Super Senior</paper-item>
					</core-menu>
				</paper-dropdown>
			</paper-dropdown-menu>
			<br>

			<h3 style="color:white"> Email:
            <paper-input-decorator class="textInput" id="inputEmail" name="login_email" label="email address" floatingLabel>
                <input is="core-input"id="txtEmail" value="">
            </paper-input-decorator>
			</h3>

			<h3 style="color:white"> Pswrd:
            <paper-input-decorator class="textInput" id="inputPassword" name="login_password" label="password"  floatingLabel>
                <input is="core-input" id="txtPassword" type="password" value="">
            </paper-input-decorator>
				</center>
			</h3>
            <paper-button raised class="acctButton" id="btnAcct" >Update</paper-button>
        </form>
</div>

</html>
