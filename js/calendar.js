//Globals
var updateEvery = 100; //milliseconds
var widthFrac = 0.75;
var heightFrac = 0.5;
var minWidth = 200;
var minHeight = 400;
var minWidthToHeightRatio = 0.8;
var numDays = 5;
var classToDayWidthRatio = (10.0/10.0);
var dayHeightRatio = (4.0/5.0);
var daysArray = ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
var colorsArray = ["#4585f2","#c0c0c0","#008000","#0000ff","#ff0000","#051153","#8000ff","#ffa500","#ff6666","#b0e0e6"];
var earliestStart = 8;
var latestEnd = 18;
var fontSize = 2;
var fontBase = 100;
var backgroundColor = "#EEEEEE";

var courseArray = new Array();
var canvas = null;
var ctx;

window.setInterval(function(){ drawLoop(); }, updateEvery);

function updateMe(){
	document.getElementById("state").innerHTML = "woo";
}

function drawLoop() {
	if(canvas!=null){
			updateCanvas();
	}
}

function loadSchedule(scheduleNum){
	deleteCanvas();
	courseArray = new Array();
	document.getElementById("frmFileSchedule").src = "schedule"+scheduleNum+".txt";
}

function createCalendar(){
	canvas = document.createElement("canvas");
	ctx = canvas.getContext("2d");
	var currWidth = window.innerWidth*widthFrac;
	var currHeight = window.innerHeight*heightFrac;
	if(currWidth < minWidth) currWidth = minWidth;
	if(currHeight < minHeight) currHeight = minHeight;

	if(currWidth/currHeight < minWidthToHeightRatio){
		canvas.width = currWidth;
		canvas.height = currWidth/minWidthToHeightRatio;
	}
	else {
		canvas.width = currWidth;
		canvas.height = currHeight;
	}
	document.getElementById("calendarArea").appendChild(canvas);
}

function deleteCanvas(){
	canvas.parentNode.removeChild(canvas);
}

function updateCanvas(){
	var currWidth = document.getElementById("calendarArea").offsetWidth*widthFrac;
	var currHeight = document.getElementById("calendarArea").offsetHeight*heightFrac;

	if(currWidth < minWidth) currWidth = minWidth;
	if(currHeight < minHeight) currHeight = minHeight;
	
	if(currWidth/currHeight < minWidthToHeightRatio){
		canvas.width = currWidth;
		canvas.height = currWidth/minWidthToHeightRatio;
	}
	else {
		canvas.width = currWidth;
		canvas.height = currHeight;
	}
	ctx.clearRect(0,0,canvas.width,canvas.height);
	ctx.fillStyle = backgroundColor;
	ctx.fillRect(0,0,canvas.width,canvas.height);
	drawSchedule();
}

function readSchedule(){
	var oFrame = document.getElementById("frmFileSchedule");
	var strRawContents = oFrame.contentWindow.document.body.childNodes[0].innerHTML;

	while(strRawContents.indexOf("\r") >= 0){
		strRawContents = strRawContents.replace("\r","");
	}

	var splitCourseLines = strRawContents.split("\n");
	for(var i = 0; i < splitCourseLines.length-1; ++i){
		var splits = splitCourseLines[i].split(" ");
		var courseToPush = {name:splits[0],department:splits[1],num:splits[2],start:splits[3],end:splits[4],days:splits[5]};
		courseArray.push(courseToPush);
	}

}

function drawSchedule(){
	var dayWidth = canvas.width/(numDays+1);
	var dayGap = dayWidth/(numDays+1);
	var dayVertGap = canvas.height*(1-dayHeightRatio)/2;
	var classWidth = dayWidth*classToDayWidthRatio;
	var currX = dayGap;
	var currY = dayVertGap;
	var dayLen = canvas.height*dayHeightRatio;
	ctx.fillStyle = "#000000";
	ctx.font = "bold "+getFont();
	ctx.textAlign="center";
	ctx.textBaseline = "bottom";

	for(var i = 0; i < numDays; ++i){
		ctx.rect(currX,currY,dayWidth,canvas.height*dayHeightRatio);
		ctx.stroke();
		ctx.fillText(daysArray[i],currX+dayWidth/2,currY)
		currX += dayWidth+dayGap;
	}

	for(var i = 0; i < courseArray.length; ++i){
		var courseDep = courseArray[i].department;
		var courseNum = courseArray[i].num;
		var courseStart = courseArray[i].start;
		var courseEnd = courseArray[i].end;
		var courseDays = courseArray[i].days;
		var startHeight = dayVertGap+interpTime(courseStart)*dayLen;
		var endHeight = dayVertGap+interpTime(courseEnd)*dayLen;

		for(var j = 0; j < courseDays.length; ++j){
			var startWidth = 0;
			if(courseDays[j] == 'M') startWidth = dayGap;
			else if(courseDays[j] == 'T') startWidth = 2*(dayWidth+dayGap)-dayWidth;
			else if(courseDays[j] == 'W') startWidth = 3*(dayWidth+dayGap)-dayWidth;
			else if(courseDays[j] == 'H') startWidth = 4*(dayWidth+dayGap)-dayWidth;
			else if(courseDays[j] == 'F') startWidth = 5*(dayWidth+dayGap)-dayWidth;
			else if(courseDays[j] == 'S') startWidth = 6*(dayWidth+dayGap)-dayWidth;
			else if(courseDays[j] == 'U') startWidth = 7*(dayWidth+dayGap)-dayWidth;
			startWidth += (dayWidth-classWidth)/2;
			ctx.fillStyle = colorsArray[i];
			ctx.fillRect(startWidth,startHeight,classWidth,endHeight-startHeight);

			ctx.font = getFont();
			ctx.fillStyle = "#000000";
			ctx.textAlign = "center";
			ctx.textBaseline = "middle";
			ctx.fillText(courseDep+" "+courseNum,startWidth+classWidth/2,(startHeight+endHeight)/2)
		}
	}
}

function interpTime(time){
	var splitTime = time.split(":");
	var decimalHour = Number(splitTime[0]);
	if(decimalHour < earliestStart) decimalHour = decimalHour+12;
	var decimalTime = decimalHour+Number(splitTime[1])/60;
	var interpFrac = (decimalTime-earliestStart)/(latestEnd-earliestStart);
	return interpFrac;
}

function toggleDays(){
	if(numDays == 5) numDays = 7;
	else if(numDays == 7) numDays = 5;
}

function getFont() {
    var ratio = fontSize / fontBase;   // calc ratio
    var size = canvas.width * ratio;   // get font size based on current width
    return (size|0) + 'px Arial'; // set font
}

