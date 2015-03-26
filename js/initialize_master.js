/**
 * Created by zsolcher on 3/18/15.
 */



window.onload = function() {

    function hideAllAreas() {
        $("#homeArea").hide();
        $("#buildScheduleTabs").hide();
        $("#buildScheduleArea").hide();
        $("#accountSettingsArea").hide();
        $("#savedSchedulesArea").hide();
        $("#aboutUsArea").hide();
        $("#calendarArea").hide();
    }

    //Create calendar then hide all areas other than home
	createCalendar();
    hideAllAreas();
    $("#homeArea").show();

    $(".menuItem").on({
            'click': function(){
                $(".menuItem").removeClass("selected");
                $(this).addClass("selected");
            },
            'hover': function(){
                $(this).css("background-color","#89bdff")
            }
        }

    );

    $("#menuItemHome").on({
            'click': function(){
                hideAllAreas();
                $("#homeArea").show();
            }
        }
    );

    $("#menuItemBuildSchedule").on({
            'click': function(){
                hideAllAreas();
                $("#buildScheduleTabs").show();
                $("#buildScheduleArea").show();
                $("#pageUploadTranscript").fadeIn('3000');
            }
        }
    );

    $("#menuItemSavedSchedules").on({
            'click': function(){
                hideAllAreas();
                $("#savedSchedulesArea").show();
            }
        }
    );

    $("#menuItemAccountSettings").on({
            'click': function(){
                hideAllAreas();
                $("#accountSettingsArea").show();
            }
        }
    );

    $("#menuItemAboutUs").on({
            'click': function(){
                hideAllAreas();
                $("#aboutUsArea").show();
            }
        }
    );

	$("#menuItemCalendar").on({
			'click': function(){
				hideAllAreas();
				$("#calendarArea").show();
			}
		}
	);

	$("#accountCircle").on({
			'click': function(){
				hideAllAreas();
				$("#accountSettingsArea").show();
			}
		}
	);
	
	paperTabs.addEventListener('core-select', function(e) {
    var corePages = document.querySelector('core-animated-pages.fancy');

    if(e.detail.isSelected == true) {
        switch(e.detail.item.id) {
            case "tab1":
                corePages.selected = 0;
                break;
            case 'tab2':
                corePages.selected = 1;
                break;
            case 'tab3':
                corePages.selected = 2;
                break;
            case 'tab4':
                corePages.selected = 3;
                break;
            case 'tab5':
                corePages.selected = 4;
                break;
            case 'tab6':
                corePages.selected = 5;
                break;
            default:
                break;
        }

    }

});
	
};

