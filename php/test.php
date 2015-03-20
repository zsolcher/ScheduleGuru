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

?>
<script type="text/javascript">
var arr = {};
function sendQuery(data){
	
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
}
function testPrereqs(){
	sendQuery("request=prereqs&ClassID=2");
}
function testClassData(){
  	sendQuery("request=classData&ClassID=1");
}
function testSameAs(){
  	sendQuery("request=sameAs&ClassID=3");
}function testLogin(){
  	sendQuery("request=login&username=rbierman@trinity.edu&password=lololol");
}
function testClassesTaken(){
	sendQuery("request=classesTaken&UserID=740432");
}
function testUpdateAccountSettings(){
	sendQuery("request=updateAccount&UserID=740432&Major=Bio&Year=4&FirstName=Rob&LastName=Bierman");	
}
function testGetUserData(){
	sendQuery("request=userData&UserID=740432");	
}
function testInjection(){
	sendQuery("request=login&username=;drop table Users;&password=lololol");	
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
<table id="tbl"></table>
</body>
</html>