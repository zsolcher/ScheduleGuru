<!DOCTYPE html>
<html>

<body>
  

    <div id="savedSchedulesArea">

        <form id="savedSchedulesForm" action="" method="post">
			<paper-input-decorator class="textInput" id="inputFname" name="acct_fname" label="First Name" floatingLabel>
                <input is="core-input"id="txtFname" value="">
            </paper-input-decorator>

            <paper-input-decorator class="textInput" id="inputLname" name="acct_lname" label="Last Name"  floatingLabel>
                <input is="core-input" id="txtLname" value="">
            </paper-input-decorator>
			
			<paper-input-decorator class="textInput" id="inputMajor" name="acct_major" label="Major" floatingLabel>
                <input is="core-input"id="txtMajor" value="">
            </paper-input-decorator>

            <paper-input-decorator class="textGrade" id="inputGrade" name="acct_grade" label="Grade"  floatingLabel>
                <input is="core-input" id="txtGrade" value="">
            </paper-input-decorator>
			
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