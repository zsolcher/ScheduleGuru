/**
 * Created by zsolcher on 3/18/15.
 */

var corePages = document.querySelector('core-animated-pages.fancy');
var numPages = 5;

$('.fabNavLeft').on({
        'click': function(e){
            //change transition to slide-from-left
            corePages.transitions = "slide-from-left";

            if(corePages.selected > 0) corePages.selected -=1;
        }
    }
);

$('.fabNavRight').on({
        'click': function (e) {
            //change transition to slide-from-right
            corePages.transitions = "slide-from-right";
            if(corePages.selected < numPages-1) corePages.selected +=1;
        }
    }
);