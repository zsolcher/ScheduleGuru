<!DOCTYPE html>
<html>
 <title>Account Settings</title>

    <!-- CSS Import-->
    <link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/accountSettingsArea.css">
    <!-- CSS Import-->

    <!-- Polymer Imports  -->
    <!-- 1. Load webcomponents.min.js for polyfill support. -->
    <script src="bower_components/webcomponentsjs/webcomponents.js"></script>
	<link rel="import" href="bower_components/core-menu/core-menu.html">

    <link rel="import" href="bower_components/paper-input/paper-input-decorator.html">
    <link rel="import" href="bower_components/paper-input/paper-autogrow-textarea.html">
    <link rel="import" href="bower_components/paper-input/paper-input.html">
    <link rel="import" href="bower_components/paper-icon-button/paper-icon-button.html">
    <link rel="import" href="bower_components/paper-button/paper-button.html">
    <link rel="import" href="bower_components/paper-fab/paper-fab.html">
    <link rel="import" href="bower_components/paper-toast/paper-toast.html">
	<link rel="import" href="bower_components/paper-dropdown-menu/paper-dropdown-menu.html">
	<link rel="import" href="bower_components/paper-dropdown/paper-dropdown.html">
	<link rel="import" href="bower_components/paper-item/paper-item.html">
    <!-- Polymer Imports  -->
	
    <!--  JavaScript/JQuery Import  -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!--  JavaScript/JQuery Import  -->


</head>
<body>

    <div id="accountSettingsArea">

        <form id="accountSettingsForm" action="" method="post">
			<paper-input-decorator class="textInput" id="inputFname" name="acct_fname" label="First Name" floatingLabel>
                <input is="core-input"id="txtFname" value="">
            </paper-input-decorator>

            <paper-input-decorator class="textInput" id="inputLname" name="acct_lname" label="Last Name"  floatingLabel>
                <input is="core-input" id="txtLname" value="">
            </paper-input-decorator>
			
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
						

			
            <paper-input-decorator class="textInput" id="inputEmail" name="login_email" label="email address" floatingLabel>
                <input is="core-input"id="txtEmail" value="">
            </paper-input-decorator>

            <paper-input-decorator class="textInput" id="inputPassword" name="login_password" label="password"  floatingLabel>
                <input is="core-input" id="txtPassword" type="password" value="">
            </paper-input-decorator>
			<center>
            <paper-button raised class="acctButton" id="btnAcct" >Change Settings</paper-button>
			</center> 
        </form>

    </div>

    
</body>
</html>