var headerValues = ["__","Name","Department","Number","Section","Prof","Building","RoomNum","Days","StartTime","EndTime","Notes"];

function addClassTableToDiv(divName,tableID,passedHeaderValues){
	var tableToAdd = document.createElement("table");
	tableToAdd.id = tableID;
	tableToAdd.style.border = "1px solid black";
	tableToAdd.align = "center";
	var headerRow = tableToAdd.insertRow();
	if(passedHeaderValues != undefined) headerValues = passedHeaderValues;
	fillTableRow(headerRow,headerValues);
	$(divName).append(tableToAdd);
}

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

function fillTableRow(tableRow,values){
	for(var i = 0; i < values.length; ++i){
		var currentCell = tableRow.insertCell();
		currentCell.appendChild(document.createTextNode(values[i]));
		currentCell.style.border = "1px solid black";
	}
}
