/**
 * Created by zsolcher on 3/18/15.
 */

var paperTabs = document.querySelector('#buildScheduleTabs');
var tabNum = 1;
changeTabColor(2);

$('.fabNavLeft').on({
        'click': function(e){
        		if(tabNum > 1){
        			tabNum--;
        			changeTabColor(tabNum+1);
        		}
            var corePages = document.querySelector('core-animated-pages.fancy');
            var paperTabs = document.querySelector('#buildScheduleTabs');

            //change transition to slide-from-left
            corePages.transitions = "slide-from-left";

            if(corePages.selected > 0) {
                --corePages.selected;
                paperTabs.selectPrevious();
            }

        }
    }
);

$('.fabNavRight').on({
        'click': function (e) {
        		if(tabNum < 6){
        			tabNum++;
        			changeTabColor(tabNum-1);
        		}
            var corePages = document.querySelector('core-animated-pages.fancy');
            var paperTabs = document.querySelector('#buildScheduleTabs');
            var numPages = 6;

            //change transition to slide-from-right
            corePages.transitions = "slide-from-right";
            if (corePages.selected < numPages - 1) {
                ++corePages.selected;
                paperTabs.selectNext();
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