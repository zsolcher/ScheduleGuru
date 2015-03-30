/**
 * Created by zsolcher on 3/18/15.
 */
var preferedEnd = "No Preference";
var preferedDays = {M:true,T:true,W:true,R:true,F:true};
var ccSectionNames = ["Traditions Indigenous","...Traditions through the Early Modern Period",
	"Arts","Literary Studies","Social Sciences","Social Issues and Values",
	"Quantitative Reasoning","Natural Science","Using Scientific Methods"];

var paperTabs = document.querySelector('#buildScheduleTabs');
var tabNum = 1;
changeTabColor(2);

$('.fabNavLeft').on({
        'click': function(e){
        		if(tabNum > 1){
        			tabNum--;
        			changeTabColor(tabNum+1);
        		}
				if(tabNum == 1){ //entering upload transcript tab
					canvas.style.display = "none";
				}
				if(tabNum == 2){ //entering preferences tab
					allTables = new Array();
					canvas.style.display = "none";
					checkMajorSelected();
				}
				if(tabNum == 3){ //entering major tab
					canvas.style.display = "initial";
					populateMajor();
				}
        		if(tabNum == 4){ //entering commoncurric tab
        			populateCC();	
        		}
				if(tabNum == 5){ //entering finalize tab
				
				}

            var corePages = document.querySelector('core-animated-pages.fancy');
            //var paperTabs = document.querySelector('#buildScheduleTabs');

            //change transition to slide-from-left
            corePages.transitions = "slide-from-left";

            if(corePages.selected > 0) {
                --corePages.selected;
                //paperTabs.selectPrevious();
            }

        }
    }
);

$('.fabNavRight').on({
        'click': function (e) {
        		if(tabNum < 5){
        			tabNum++;
        			changeTabColor(tabNum-1);
        		}
				if(tabNum == 1){ //entering upload transcript tab
					canvas.style.display = "none";
				}
				if(tabNum == 2){ //entering preferences tab
					allTables = new Array();
					canvas.style.display = "none";
					checkMajorSelected();
				}
				if(tabNum == 3){ //entering major tab
					canvas.style.display = "initial";
					populateMajor();
				}
        		if(tabNum == 4){ //entering commoncurric tab
        			populateCC();	
        		}
				if(tabNum == 5){ //entering finalize tab
					document.getElementById("finalize").appendChild(canvas);
				}
            var corePages = document.querySelector('core-animated-pages.fancy');
            //var paperTabs = document.querySelector('#buildScheduleTabs');
            var numPages = 6;

            //change transition to slide-from-right
            corePages.transitions = "slide-from-right";
            if (corePages.selected < numPages - 1) {
                ++corePages.selected;
                //paperTabs.selectNext();
            }
        }
    }
);

function changeTabColor(oriColoredTab) {
	var tabOff = document.getElementById("tab"+oriColoredTab);
	tabOff.style.color = "white";
	tabOff.style.fontWeight = "normal";
	var tabOn = document.getElementById("tab"+tabNum);
	tabOn.style.color = "green";
	tabOn.style.fontWeight = 'bold';
}

function checkMajorSelected(){
	if(currentUser['Major'] != undefined){
		var majorList = document.getElementById("selectMajor");
		var foundMajor = false;
		var i = 0;
		while(!foundMajor && i < majorList.options.length){
			if(majorList.options[i].text == currentUser['Major']) foundMajor = true;
			else ++i;
		}
		if(foundMajor) majorList.selectedIndex = i;
	}
}

function populateMajor(){
	fillDepartmentTable('#majorClassOptions',hashMajor(currentUser['Major']));
}

function populateCC(){
	var mwf = '';
	var tr = '';
	var arr = $('input[name=days]:checked');
	var temp;
	for(var a=0; a<arr.length; a++){
		temp = arr[a]['value'];
		if(temp === 'T' || temp === 'R')
			tr += temp;
		else
			mwf += temp;	
	}
	var sT = $('input[name=radioStart]:checked').val();
	var eT = $('input[name=radioEnd]:checked').val();
	var list = document.getElementById("cc");
	list.innerHTML = '';
	var str = "";
	for (var a =0; a<9; a++){
		str+="<li>"+ccSectionNames[a]+"<ul>";
		//getCC(mwf,tr,sT,eT,a);
		console.log(result.length);
		if(result === "0" || result.length == 0){
			str+="<li>No options</li>";		
		}
		else{
			for(var b =0; b<result.length; ++b){
					str+="<li><input type=\"checkbox\">"+result[b]['Name']+"</input></li>";
			}
		}
		str+="</ul></li>";
	}
	list.innerHTML = str;
}


function majorOnChangeResponse(){
	var majorList = document.getElementById("selectMajor");
	currentUser['Major'] = majorList.options[majorList.selectedIndex].text;
}
function preferedStartOnChange(radioButton){
	preferedStart = radioButton.value;
}
function preferedEndOnChange(radioButton){
	preferedEnd = radioButton.value;
}
function preferedDaysOnChange(checkBox){
	preferedDays[checkBox.value] = !preferedDays[checkBox.value];
}
function hashMajor(fullMajor){
	switch(fullMajor){
		case "History":
			return "HIST";
       	case "Anthropology":
			return "ANTH";
   		case "Art":
			return "ART";
		case "Biology":
			return "BIOL";
		case "Biochemistry":
			return "BIOL";
    	case "Biochemistry & Molecular Biology *":
			return "CHEM";
		case "Business Administration":
			return "BUSN";
    	case "Chemistry":
			return "CHEM";
    	case "Applied Chemistry":
			return "CHEM";
  		case "Chemistry with High School Teaching Certification":
			return "CHEM";
		case "Chinese Studies":
			return "CHIN";
        case "Ancient Mediterranean Studies":
			return "HIST";
        case "Classical Languages *":
			return "HIST";
        case "Computer Science":
			return "CSCI";
        case "Engineering Science *":
			return "ENGR";
        case "French":
			return "FREN";
        case "Mathematics":
			return "MATH";
        case "Music":
			return "MUSC";
	}
}

