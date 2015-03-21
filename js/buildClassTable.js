function addClassTableTo(divName,tableID,passedHeaderValues){
	var tableToAdd = document.createElement("table");
	tableToAdd.id = tableID;
	tableToAdd.style.border = "1px solid black";
	var headerRow = tableToAdd.insertRow();
	var headerValues = ["__","Class Name","Department","Number","Section"];
	if(passedHeaderValues != undefined) headerValues = passedHeaderValues;

	for(var i = 0; i < headerValues.length; ++i){
		var currentCell = headerRow.insertCell();
		currentCell.appendChild(document.createTextNode(headerValues[i]));
		currentCell.style.border = "1px solid black";
	}
	$(divName).append(tableToAdd);
}

function addClassToTable(tableID,classToAdd){
	var table = document.getElementById(tableID);
	if(table != undefined){
		var numRows = table.rows.length;
		var checkBox = document.createElement("input");
		checkBox.type = "checkbox";
		checkBox.id = "tableID:"+tableID+":row:"+(numRows+1);
		alert(checkBox.id);
	}
}
