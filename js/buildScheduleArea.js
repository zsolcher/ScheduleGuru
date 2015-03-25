/**
 * Created by zsolcher on 3/18/15.
 */

var paperTabs = document.querySelector('#buildScheduleTabs');


$('.fabNavLeft').on({
        'click': function(e){
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

$('#textAreaTranscript').on({
    'focus': function(e) {
        //$(this).text = '';
        $(this).css("background-color","lightblue");
    },
    'focusout': function(e) {
        if($(this).text == ""){
           // $(this).text = "Paste your transcript here...";
        }
        $(this).css("background-color","white");
    }
});