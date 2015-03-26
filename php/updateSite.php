<script type="text/javascript" >
//0 IF NO NEW DATA WAS ENTERED OR IF WRONG DATA WAS ENTERED
//1 FOR SUCCESS
// ANY OTHER NUMBER SOMETHING WENT WRONG
var result = {};

function sendQuery(data){
	var xmlhttp;
	if (window.XMLHttpRequest){
  		xmlhttp=new XMLHttpRequest();
  	}else{
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	xmlhttp.onreadystatechange=function(){
  		if(xmlhttp.readyState==4 && xmlhttp.status==200){
  			result = JSON.parse(xmlhttp.responseText);
  		}
  	}
  	xmlhttp.open("GET","./php/queryServer.php?"+data,false);
  	xmlhttp.send();
}
function updateAccountSettings(userID,Major,Year,FirstName,LastName){
	if(userID === "" || Major === "" || Year === "" || FirstName === "" || LastName === ""){
	}else{
  		sendQuery("request=updateAccount&UserID="+userID+"&Major="+Major+"&Year="+Year+"&FirstName="+FirstName+"&LastName="+LastName);
	}
}
function getUserData(userEmail){
	sendQuery("request=userData&UserEmail="+userEmail);
}
function getPrereqs(classID){
  	sendQuery("request=prereqs&ClassID="+classID);
}
function getClassData(classID){
  	sendQuery("request=classData&ClassID="+classID);
}
function classSameAs(classID){
  	sendQuery("request=sameAs&ClassID="+classID);
}
function classesTaken(userID){
  	sendQuery("request=classesTaken&UserID="+userID);
}
function getAllDepartmentClasses(department){
	sendQuery("request=getAllDepartment&dpt="+department);
}
function login(username,password){
  	sendQuery("request=login&username="+username+"&password="+password);
}
function getSavedSchedules(userID){
	sendQuery("request=savedSchedules&UserID="+userID);	
}
function registerUser(username,password,firstname,lastname){
	sendQuery("request=registerUser&username="+username+"&password="+password+"&FirstName="+firstname+"&LastName="+lastname);	
}
</script>
