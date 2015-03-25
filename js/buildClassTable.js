//allTables stores the id of a table and its values as an object
var allTables = new Array();
var headerValues = ["__","Name","Department","Number","Section","Prof","Building","RoomNum","Days","StartTime","EndTime","Note"];

function fillDepartmentTable(divName,dept){
	var tableID = 'DepartmentTable-'+dept;
	if(fetchTableObjectByID(tableID) == null){
		getAllDepartmentClasses(dept);
		if(result != "0"){
			addClassTableToDiv(divName,tableID);
			for(var i = 0; i < result.length; ++i){
				addClassToTableObject(tableID,result[i]);
			}
			displayTable(tableID);
		}
	}
}


function addClassTableToDiv(divName,tableID){
	var rowData = new Array();
	rowData.push(headerValues);
	var tableObjectToAdd = {id:tableID,div:divName,classes:rowData}
	allTables.push(tableObjectToAdd);
	instantiateTable(divName,tableID);
}

function instantiateTable(divName,tableID){
	var tableToAdd = document.createElement("table");
	tableToAdd.id = tableID;
	tableToAdd.style.border = "1px solid #7986cb";
	tableToAdd.style.width = "100%";
	tableToAdd.style.textAlign = "left";
	tableToAdd.align = "center";
	$(divName).append(tableToAdd);
}

function displayTable(tableID){
	deleteTableRows(tableID);
	var tableObject = fetchTableObjectByID(tableID);
	if(tableObject != undefined){
		var table = document.getElementById(tableObject['id']);
		var rowDataArray = tableObject['classes'];
		var header = table.createTHead();
		var headerRow = header.insertRow(0);
		headerRow.style.textAlign = "center";
		headerRow.style.backgroundColor = "#7986cb";
		headerRow.style.color = "#ffffff";
		fillTableRow(headerRow,rowDataArray[0]);

		for(var i = 1; i < rowDataArray.length; ++i){
			addClassRow(tableID,rowDataArray[i])
		}
	}
}

function deleteTableRows(tableID){
	var tableObject = fetchTableObjectByID(tableID);
	if(tableObject != undefined){
		var table = document.getElementById(tableObject['id']);
		table.parentNode.removeChild(table);
		instantiateTable(tableObject['div'],tableObject['id']);
	}
}

function addClassToTableObject(tableID,classToAdd){
	if(classToAdd['Name'] != undefined){
		var tableObject = fetchTableObjectByID(tableID);
		var index = allTables.indexOf(tableObject);
		var classArray = tableObject['classes'];
		classArray.push(classToAdd);
	}
}

function addClassRow(tableID,classToAdd){
	var tableObject = fetchTableObjectByID(tableID);
	var table = document.getElementById(tableObject['id']);

	if(table != undefined && classToAdd['Name'] != undefined){
		var numRows = table.rows.length;
		var newRow = table.insertRow();
		var checkBoxID = "tableID:"+tableID+":row:"+(numRows+1);
		
		//These two lines create the paper checkbox
		var checkBox = document.createElement('div');
		checkBox.innerHTML = "<paper-checkbox id="+checkBoxID+" checked=false onclick=\"testCheckBoxes(this);\"></paper-checkbox>";

/*
		//This goes back to the built in check boxes
		//Also need to change the testCheckBoxes function
		var checkBox = document.createElement('input');
		checkBox.type = "checkbox";
		checkBox.id = checkBoxID;
		checkBox.checked = false;
		checkBox.onclick = function(){testCheckBoxes(checkBox);};
*/

		checkBoxCell = newRow.insertCell();
		checkBoxCell.style.border = "1px solid #7986cb";
		checkBoxCell.appendChild(checkBox);

		var rowData = new Array();
		for(var i = 1; i < headerValues.length; ++i){
			if(classToAdd[headerValues[i]] != undefined){
				var valueToAdd = classToAdd[headerValues[i]];
				if(headerValues[i] == 'StartTime' || headerValues[i] == 'EndTime'){
					valueToAdd = amPmParser(valueToAdd);
				}
				rowData.push(valueToAdd);
			}
			else rowData.push(" ");
		}
		fillTableRow(newRow,rowData);
	}
}

function fillTableRow(tableRow,values){
	for(var i = 0; i < values.length; ++i){
		var currentCell = tableRow.insertCell();
		currentCell.appendChild(document.createTextNode(values[i]));
		currentCell.style.border = "1px solid #7986cb";
	}
}

function fetchTableObjectByID(tableID){
	var found = false;
	var i = 0;
	while(!found && i < allTables.length){
		if(allTables[i]['id'] == tableID) found = true;
		else ++i;
	}

	if(found) return allTables[i];
	else return null;
}

function testCheckBoxes(checkBox){
	//checkBox ID is in the form tableID:[tID]:row:[row_num]
	//so the last element of splitID will be the table row
	//Need to subtract 1 from rowNum because of the header
	var checkBoxID = checkBox.id;
	var splitID = checkBoxID.split(":");
	var tableID = splitID[1];
	var rowNum = splitID[splitID.length-1]-1;
	var tableObject = fetchTableObjectByID(tableID);
	if(tableObject != null){
		var classData = tableObject['classes'][rowNum];
		if(!checkBox.checked){
			addCalendarClass(classData);
		}
		else{
			removeCalendarClass(classData['ClassID']);
		}
	}
}

function amPmParser(time){
	var splitTime = time.split(":");
	if(splitTime.length != 3 || time == "00:00:00") return "TBA";
	var decimalHour = Number(splitTime[0]);

	var amPm = "am";
	if(decimalHour > 12){
		decimalHour -= 12;
		amPm = "pm";
	}
	return (decimalHour.toString()+":"+splitTime[1]+amPm);
}

/*
function addClassToTable(tableID,classToAdd){
	var table = document.getElementById(tableID);
	if(table != undefined && classToAdd['Name'] != undefined){
		var numRows = table.rows.length;
		var newRow = table.insertRow();
		var checkBox = document.createElement("input");
		checkBox.type = "checkbox";
		checkBox.checked = true;
		checkBox.id = "tableID:"+tableID+":row:"+(numRows+1);
		checkBoxCell = newRow.insertCell();
		checkBoxCell.style.border = "1px solid black";
		checkBoxCell.appendChild(checkBox);

		var rowData = new Array();
		for(var i = 1; i < headerValues.length; ++i){
			if(classToAdd[headerValues[i]] != undefined) rowData.push(classToAdd[headerValues[i]]);
			else rowData.push(" ");
		}
		fillTableRow(newRow,rowData);
	}
}
*/

