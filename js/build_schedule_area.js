/**
 * Created by zsolcher on 3/18/15.
 */

var corePages = document.querySelector('core-pages.fancy');

$('.fabNavLeft').on({
        'click': function(){
            if(corePages.selected == 0) corePages.selected = corePages.items.length-1;
            else corePages.selected = (corePages.selected - 1) % corePages.items.length;

            corePages.async(function() {
                if (corePages.selectedIndex == 0) {
                    //corePages.selectedItem.classList.remove('begin');
                } else if (corePages.selectedIndex == corePages.items.length - 1) {
                    //corePages.items[0].classList.add('begin');
                }
            });
        }
    }
);

$('.fabNavRight').on({
        'click': function () {
            corePages.selected = (corePages.selected + 1) % corePages.items.length;
            corePages.
            corePages.async(function () {
                if (corePages.selectedIndex == 0) {
                    //corePages.selectedItem.classList.remove('begin');
                } else if (corePages.selectedIndex == corePages.items.length - 1) {
                    //corePages.items[0].classList.add('begin');
                }
            });
        }
    }
);