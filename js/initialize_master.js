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
    }

    //Hide all areas other than home
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


};

