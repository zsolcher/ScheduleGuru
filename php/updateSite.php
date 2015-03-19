<script type="text/javascript" >
//0 IF NO NEW DATA WAS ENTERED OR IF WRONG DATA WAS ENTERED
//1 FOR SUCCESS
// ANY OTHER NUMBER SOMETHING WENT WRONG
function updateAccountSettings(userID,Major,Year,FirstName,LastName){
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
  				return xmlhttp.responseText;
  				
  			}
  		}
  		xmlhttp.open("GET","queryServer.php?request=updateAccount&userID="+userID+"&Major="+Major+"&Year="+Year+"&FirstName="+FirstName+"&LastName="+LastName,true);
  		xmlhttp.send();	
	}
	
}
//TODO FORMAT RETURN DATA INTO AN OBJECT
//OBJECT RETURNED CONTAINS USER DATA: FIRSTNAME, LASTNAME, MAJOR, YEAR, EMAIL, PASSWORD
function getUserData(userID){
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
 	}else{
 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 	}
  	xmlhttp.onreadystatechange=function(){
  		if(xmlhttp.readyState==4 && xmlhttp.status==200){
  			return xmlhttp.responseText;
  			
  		}
  	}
  	xmlhttp.open("GET","queryServer.php?request=userData&userID="+userID,true);
  	xmlhttp.send();
		
}
</script>