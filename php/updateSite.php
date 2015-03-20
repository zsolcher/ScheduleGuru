<script type="text/javascript" >
//0 IF NO NEW DATA WAS ENTERED OR IF WRONG DATA WAS ENTERED
//1 FOR SUCCESS
// ANY OTHER NUMBER SOMETHING WENT WRONG
function updateAccountSettings(userID,Major,Year,FirstName,LastName){
	var res = {};	
	if(userID === "" || Major === "" || Year === "" || FirstName === "" || LastName === ""){
			
	}else{
		var xmlhttp;
		if (window.XMLHttpRequest){
  			xmlhttp=new XMLHttpRequest();
  		}else{
  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
  		xmlhttp.onreadystatechange=function(){
  			if(xmlhttp.readyState==4 && xmlhttp.status==200){
  				res = JSON.parse(xmlhttp.responseText);
  				
  			}
  		}
  		xmlhttp.open("GET","queryServer.php?request=updateAccount&userID="+userID+"&Major="+Major+"&Year="+Year+"&FirstName="+FirstName+"&LastName="+LastName,true);
  		xmlhttp.send();
  		return res;	
	}
	
}
//TODO FORMAT RETURN DATA INTO AN OBJECT
//OBJECT RETURNED CONTAINS USER DATA: FIRSTNAME, LASTNAME, MAJOR, YEAR, EMAIL, PASSWORD
function sendQuery(data){
	var xmlhttp;
	var res = {};
	if (window.XMLHttpRequest){
  		xmlhttp=new XMLHttpRequest();
  	}else{
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	xmlhttp.onreadystatechange=function(){
  		if(xmlhttp.readyState==4 && xmlhttp.status==200){
  			res = JSON.parse(xmlhttp.responseText);
  			
  		}
  	}
  	xmlhttp.open("GET","queryServer.php?"+data,true);
  	xmlhttp.send();
  	return res;
}
function getUserData(userID){
	var xmlhttp;
	var res = {};
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
 	}else{
 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 	}
  	xmlhttp.onreadystatechange=function(){
  		if(xmlhttp.readyState==4 && xmlhttp.status==200){
  			res = JSON.parse(xmlhttp.responseText);
  		}
  	}
  	xmlhttp.open("GET","queryServer.php?request=userData&UserID="+userID,true);
  	xmlhttp.send();
	return res;
}
function getPrereqs(classID){
	var xmlhttp;
	var res = {};
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
 	}else{
 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 	}
  	xmlhttp.onreadystatechange=function(){
  		if(xmlhttp.readyState==4 && xmlhttp.status==200){
  			res = JSON.parse(xmlhttp.responseText);
  		}
  	}
  	xmlhttp.open("GET","queryServer.php?request=prereqs&ClassID="+classID,true);
  	xmlhttp.send();
  	return res;
}
function getClassData(classID){
	var xmlhttp;
	var res = {};
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
 	}else{
 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 	}
  	xmlhttp.onreadystatechange=function(){
  		if(xmlhttp.readyState==4 && xmlhttp.status==200){
  			res = JSON.parse(xmlhttp.responseText);
  		}
  	}
  	xmlhttp.open("GET","queryServer.php?request=classData&ClassID="+classID,true);
  	xmlhttp.send();
  	return res;
}
function classSameAs(classID){
	var xmlhttp;
	var res = {};
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
 	}else{
 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 	}
  	xmlhttp.onreadystatechange=function(){
  		if(xmlhttp.readyState==4 && xmlhttp.status==200){
  			res = JSON.parse(xmlhttp.responseText);
  		}
  	}
  	xmlhttp.open("GET","queryServer.php?request=sameAs&ClassID="+classID,true);
  	xmlhttp.send();
  	return res;	
}
function classesTaken(userID){
	var xmlhttp;
	var res = {};
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
 	}else{
 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 	}
  	xmlhttp.onreadystatechange=function(){
  		if(xmlhttp.readyState==4 && xmlhttp.status==200){
  			res = JSON.parse(xmlhttp.responseText);
  		}
  	}
  	xmlhttp.open("GET","queryServer.php?request=classesTaken&UserID="+userID,true);
  	xmlhttp.send();
  	return res;
}

function login(username,password){
	var xmlhttp;
	var res = {};
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
 	}else{
 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 	}
  	xmlhttp.onreadystatechange=function(){
  		if(xmlhttp.readyState==4 && xmlhttp.status==200){
  			res = JSON.parse(xmlhttp.responseText);
  		}
  	}
  	xmlhttp.open("GET","queryServer.php?request=login&username="+username+"&password="+password,false);
  	xmlhttp.send();
  	return res;
}
</script>