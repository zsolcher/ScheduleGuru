//allTables stores the id of a table and its values as an object
var allTables = new Array();
var headerValues = ["__","Name","Department","Number","Section","Prof","Building","RoomNum","Days","StartTime","EndTime","Notes"];

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
	tableToAdd.style.border = "1px solid black";
	tableToAdd.align = "center";
	$(divName).append(tableToAdd);
}

function displayTable(tableID){
	deleteTableRows(tableID);
	var tableObject = fetchTableObjectByID(tableID);
	if(tableObject != undefined){
		var table = document.getElementById(tableObject['id']);
		var rowDataArray = tableObject['classes'];
		var headerRow = table.insertRow();
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
function fillTableRow(tableRow,values){
	for(var i = 0; i < values.length; ++i){
		var currentCell = tableRow.insertCell();
		currentCell.appendChild(document.createTextNode(values[i]));
		currentCell.style.border = "1px solid black";
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
}

