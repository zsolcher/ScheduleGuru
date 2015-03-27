<html>
<head>
</head>
<body>
<?php		
		if ($_SERVER['SERVER_NAME'] != "dias11.cs.trinity.edu") {
   		echo "<p>You must access this page from <b>on campus</b> through <a href=\"http://dias11.cs.trinity.edu/~colson1/WebApps/ScheduleGuru/test.php\">dias11.</a></p></body></html>";
   		die();
  		}
  		if($_GET["attempt"]==true){
  			echo "<p>Username and password combination was not found. Please try again.</p>";
  			}
		include("updateSite.php");
?>

<script type="text/javascript">
var arr = {};
/*function sendQuery(data){
	var xmlhttp;
	if (window.XMLHttpRequest){
  		xmlhttp=new XMLHttpRequest();
  	}else{
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	xmlhttp.onreadystatechange=function(){
  		if(xmlhttp.readyState==4 && xmlhttp.status==200){
  			var tbl = document.getElementById("tbl");
  			tbl.innerHTML = xmlhttp.responseText;
  			arr = JSON.parse(xmlhttp.responseText);
  			
  		}
  	}
  	xmlhttp.open("GET","queryServer.php?"+data,true);
  	xmlhttp.send();
}*/
function testPrereqs(){
	sendQuery("request=prereqs&ClassID=2");
	displayOutput();
	document.getElementById("2").innerHTML = "";
}
function testClassData(){
  	sendQuery("request=classData&ClassID=41141");
  	displayOutput();
  	document.getElementById("2").innerHTML = "";
}
function testSameAs(){
  	sendQuery("request=sameAs&ClassID=42258");
  	displayOutput();
  	document.getElementById("2").innerHTML = "";
}
function testLogin(){
	sendQuery("request=login&username=rbierman@trinity.edu&password=lololol");
	displayOutput();
  	document.getElementById("2").innerHTML = "";
}
function testClassesTaken(){
	sendQuery("request=classesTaken&UserID=740432");
	document.getElementById("2").innerHTML = "";
}
function testUpdateAccountSettings(){
	sendQuery("request=updateAccount&UserID=740432&Major=Bio&Year=4&FirstName=Rob&LastName=Bierman");
	displayOutput();
	document.getElementById("2").innerHTML = "Should normally read 0 if no changes to Rob's test data has been changed.";
}
function testGetUserData(){
	sendQuery("request=userData&UserID=740432");
	displayOutput();
	document.getElementById("2").innerHTML = "";
}
function testInjection(){
	sendQuery("request=login&username=;drop table Users;&password=lololol");
	displayOutput();
	document.getElementById("2").innerHTML = 'Should read "0" if successful on injection';	
}
function testgetAllCSCIClasses(){
	sendQuery("request=getAllDepartment&dpt=CSCI");
	displayOutput();
	document.getElementById("2").innerHTML = "";
}
function displayOutput(){
	console.log(JSON.stringify(result));
	var tbl = document.getElementById("tbl");
  	tbl.innerHTML = JSON.stringify(result);
}
</script>
	<input type="button" value="Test Prereqs" onclick="testPrereqs()"><br>
	<input type="button" value="Test ClassData" onclick="testClassData()"><br>
	<input type="button" value="Test SameAs" onclick="testSameAs()"><br>
	<input type="button" value="Test Login" onclick="testLogin()"><br>
	<input type="button" value="Test ClassesTaken" onclick="testClassesTaken()"><br>
	<input type="button" value="Test UpdateAccountSettings" onclick="testUpdateAccountSettings()"><br>
	<input type="button" value="Test GetUserData" onclick="testGetUserData()"><br>
	<input type="button" value="Test Injection" onclick="testInjection()"><br>
	<input type="button" value="Test Get All CSCI" onclick="testgetAllCSCIClasses()"><br>
<table id="tbl"></table>
<p id ="2"></p>
</body>
</html>