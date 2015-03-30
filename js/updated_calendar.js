//Globals
var calendars = new Array();
var updateEvery = 100; //milliseconds
var widthFrac = 0.75;
var heightFrac = 0.5;
var minWidth = 200;
var minHeight = 400;
var maxWidth = 600;
var maxHeight = 600;
var minWidthToHeightRatio = 0.8;
var numDays = 5;
var classToDayWidthRatio = (10.0/10.0);
var dayHeightRatio = (4.0/5.0);
var daysArray = ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
var colorsArray = ["#4285f4","#bbdefb","#7986cb","#89bdff","#00bbd3","#accbff","#5899db","#3d61ff","#00e0ff","#f06292","#4585f2","#c0c0c0","#008000","#0000ff","#ff0000","#051153","#8000ff","#ffa500","#ff6666","#b0e0e6"];
var earliestStart = 8;
var latestEnd = 18;
var fontSize = 2;
var fontBase = 100;
var backgroundColor = "#EEEEEE";

window.setInterval(function(){ drawLoop(); }, updateEvery);

function drawLoop() {
	if(canvas!=null){
		updateCanvas();
	}
}

function addCalendarClass(toAdd,calendarName){
	var calendarObject = getCalendarFromName(calendarName);
	var courses = calendarObject['Courses'];
	if(toAdd['ClassID'] == undefined){
		alert("classID is undefined in addCalendarClass");
		return false;
	}
	if(calendarCourseArrayContains(toAdd['ClassID'],courses)){
		alert("already added that course");
		return false;
	}
	var overlapCourse = checkOverlap(toAdd,courses);
	if(overlapCourse != -1){
		alert("Selected course overlaps with:\n\n"+overlapName+"\n\nPlease uncheck that course first");
		return false;
	}

	var toPush = new Object;
	toPush['start'] = toAdd['StartTime'];
	toPush['end'] = toAdd['EndTime'];
	toPush['name'] = toAdd['Name'];
	toPush['department'] = toAdd['Department'];
	toPush['num'] = toAdd['Number'];
	toPush['days'] = toAdd['Days'];
	toPush['classID'] = toAdd['ClassID'];
	calendarCourseArray.push(toPush);
	return true;
}

function createCalendarUnderDiv(divName,calendarName){
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

	var calendarObject = {Div:divName,Name:calendarName,Courses:new Array(),Canvas:canvas};
	calendars.push(calendarObject);
	document.getElementById(divName).appendChild(canvas);
}

function deleteCalendar(calendarName){
	var calendarObject = getCalendarFromName(calendarName);
	var canvas = calendarObject['Canvas'];
	canvas.parentNode.removeChild(canvas);
}

function updateCanvas(){
	var currWidth = document.getElementById("calendarArea").offsetWidth*widthFrac;
	var currHeight = document.getElementById("calendarArea").offsetHeight*heightFrac;

	if(currWidth < minWidth) currWidth = minWidth;
	else if(currWidth > maxWidth) currWidth = maxWidth;

	if(currHeight < minHeight) currHeight = minHeight;
	else if(currHeight > maxHeight) currHeight = maxHeight;

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

function drawSchedule(){
	var dayWidth = canvas.width/(numDays+2);
	var dayGap = dayWidth/(numDays+1);
	var timeGap = canvas.width-dayWidth*numDays-dayGap*(numDays+1);
	var dayVertGap = canvas.height*(1-dayHeightRatio)/2;
	var classWidth = dayWidth*classToDayWidthRatio;
	var currX = timeGap;
	var currY = dayVertGap;
	var dayLen = canvas.height*dayHeightRatio;
	var hourSpacing = dayLen/(latestEnd-earliestStart);
	ctx.fillStyle = "#000000";
	ctx.font = "bold "+getFont();
	ctx.textAlign="right";
	ctx.textBaseline = "middle";

	//Drawing time of day
	for(var i = earliestStart; i <= latestEnd; ++i){
		var time = i;
		var amPm = "pm  ";
		if(time > 12) time -= 12;
		else if(time < 12) amPm = "am  ";

		ctx.fillText(time.toString()+":00 "+amPm,currX,(i-earliestStart)*hourSpacing+currY);
	}

	ctx.fillStyle = "#000000";
	ctx.font = "bold "+getFont();
	ctx.textAlign="center";
	ctx.textBaseline = "bottom";

	//Drawing day boxes
	for(var i = 0; i < numDays; ++i){
		ctx.rect(currX,currY,dayWidth,canvas.height*dayHeightRatio);
		ctx.stroke();
		ctx.fillText(daysArray[i],currX+dayWidth/2,currY)
		currX += dayWidth+dayGap;
	}

	//Drawing courses
	for(var i = 0; i < calendarCourseArray.length; ++i){
		var courseDep = calendarCourseArray[i].department;
		var courseNum = calendarCourseArray[i].num;
		var courseStart = calendarCourseArray[i].start;
		var courseEnd = calendarCourseArray[i].end;
		var courseDays = calendarCourseArray[i].days;
		var startHeight = dayVertGap+interpTime(courseStart)*dayLen;
		var endHeight = dayVertGap+interpTime(courseEnd)*dayLen;

		if(courseDays == "TBA"){
			return null;
		}

		for(var j = 0; j < courseDays.length; ++j){
			var startWidth = timeGap;
			if(courseDays[j] == 'M') startWidth;
			else if(courseDays[j] == 'T') startWidth += 1*(dayWidth+dayGap);
			else if(courseDays[j] == 'W') startWidth += 2*(dayWidth+dayGap);
			else if(courseDays[j] == 'R') startWidth += 3*(dayWidth+dayGap);
			else if(courseDays[j] == 'F') startWidth += 4*(dayWidth+dayGap);
			else if(courseDays[j] == 'S') startWidth += 5*(dayWidth+dayGap);
			else if(courseDays[j] == 'U') startWidth += 6*(dayWidth+dayGap);
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

function calendarCourseArrayContains(classID,courses){
	var foundDuplicate = false;
	var i = 0;
	while(!foundDuplicate && i < courses.length){
		var course = courses[i];
		if(course['classID'] == classID) foundDuplicate = true;
		++i;
	}
	return foundDuplicate;
}

function removeCalendarClass(classID,calendarName){
	var calendarObject = getCalendarFromName(calendarName);
	var courses = calendarObject['Courses'];
	var found = false;
	var i = 0;
	while(!found && i < courses.length){
		var course = courses[i];
		if(course['classID'] == classID) found = true;
		else ++i;
	}
	if(i < courses.length) courses.splice(i,1);
}

function checkOverlap(course,courses){
	var foundOverlap = false;
	var i = 0;
	var newStart = interpTime(course['StartTime']);
	var newEnd = interpTime(course['EndTime']);
	var newDays = course['Days'];
	while(!foundOverlap && i < courses.length){
		var currentCourse = courses[i];
		var start = interpTime(currentCourse['start']);
		alert(start);
		var end = interpTime(currentCourse['end']);
		var days = currentCourse['days'];
		if(checkDayOverlap(newDays,days)){
			if((start >= newStart && start <= newEnd) || (end >= newStart && end <= newEnd)) foundOverlap = true;
			else ++i;
		}
		else ++i;
	}

	if(foundOverlap) return i;
	else return -1;
}

function checkDayOverlap(days1,days2){
	var foundOverlap = false;
	var i = 0;
	while(!foundOverlap && i < days1.length){
		if(days2.indexOf(days1[i]) != -1) foundOverlap = true;
		else ++i;
	}
	return foundOverlap;
}

function getCalendarFromName(calendarName){
	var found = false;
	var i = 0;
	while(!found && i < calendars.length){
		if(calendars['Name'] == calendarName) fund = true;
		else ++i;
	}
	
	if(found) return calendars[i];
	else return -1;
}
