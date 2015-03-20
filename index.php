<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <!--  CSS/Fonts Imports  -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/build_schedule_area.css">

    <link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
    <!--  CSS/Fonts Imports  -->


    <!-- 1. Load webcomponents.min.js for polyfill support. -->
    <script src="bower_components/webcomponentsjs/webcomponents.js"></script>

    <!--  Polymer Imports  -->
    <link rel="import" href="bower_components/core-toolbar/core-toolbar.html">
    <link rel="import" href="bower_components/core-menu/core-menu.html">
    <link rel="import" href="bower_components/core-item/core-item.html">
    <link rel="import" href="bower_components/core-header-panel/core-header-panel.html">
    <link rel="import" href="bower_components/core-drawer-panel/core-drawer-panel.html">
    <link rel="import" href="bower_components/core-scaffold/core-scaffold.html">
    <link rel="import" href="bower_components/core-icons/core-icons.html">
    <link rel="import" href="bower_components/core-pages/core-pages.html">


    <link rel="import" href="bower_components/paper-icon-button/paper-icon-button.html">
    <link rel="import" href="bower_components/paper-button/paper-button.html">
    <link rel="import" href="bower_components/paper-fab/paper-fab.html">
    <link rel="import" href="bower_components/paper-menu-button/paper-menu-button.html">
    <link rel="import" href="bower_components/paper-item/paper-item.html">
    <link rel="import" href="bower_components/paper-dropdown/paper-dropdown.html">
    <link rel="import" href="bower_components/paper-tabs/paper-tab.html">
    <link rel="import" href="bower_components/paper-tabs/paper-tabs.html">

    <!--  JQuery Import  -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!--  JQuery Import  -->

    <!--  PHP Import  -->
    <script src="./php/"> </script>
    <!--  PHP Import  -->

</head>
<body>

<?php
    //include("./php/check_logged_in.php");
?>

<script src="js/initialize_master.js"></script>



<core-scaffold id="scaffold">
    <core-header-panel navigation flex >
        <core-toolbar id="navheader" style="background: #4285f4;">
            <div flex id="menuTitle"> Main Menu</div>
        </core-toolbar>
        <core-menu id="navmenu">
            <core-item  class="menuItem selected" id="menuItemHome" icon="home" label="Home"></core-item>
            <core-item  class="menuItem" id="menuItemBuildSchedule" icon="schedule" label="Build a Schedule"></core-item>
            <core-item  class="menuItem" id="menuItemSavedSchedules" icon="save" label="Saved Schedules"></core-item>
            <core-item  class="menuItem" id="menuItemAccountSettings" icon="settings" label="Account Settings"></core-item>
            <core-item  class="menuItem" id="menuItemAboutUs" icon="star" label="About Us"></core-item>
        </core-menu>
    </core-header-panel>

    <div flex id="title" tool> Schedule Guru</div>

    <paper-button tool>
        <core-icon icon="account-circle" style="width:50px; height:50px;"> </core-icon>
    </paper-button>

    <paper-tabs id="buildScheduleTabs" selected="0" main>
        <paper-tab>Upload Transcript</paper-tab>
        <paper-tab>Preferences</paper-tab>
        <paper-tab>Major</paper-tab>
        <paper-tab>Common Curriculum</paper-tab>
        <paper-tab>Miscellaneous</paper-tab>
        <paper-tab>Finalize</paper-tab>
    </paper-tabs>

    <div id="homeArea">
        <center>
            Welcome to ScheduleGuru!
        </center>
        <hr>
        <p>
            Here's a brief overview on how to use the ScheduleGuru App.
            If you have not already signed up for an account, please do so now.
            If you are already a registered user, please proceed to login.
            Once you have logged in, you will be greeted by a homepage, in which
            you can change your account settings and view your progress.
            Click on "start" in order to begin the process of preparing your schedule.
            Use the left "<" and right ">" buttons to navigate through the different stages.
            You may also click on any point of the progress bar to go back to a previous section.
            Have fun scheduling!

            P.S. Please email us with any feedback :)
        </p>
    </div>

    <div id="buildScheduleArea" unresolved fullbleed horizontal center center-justified layout>
        <core-pages class="fancy" selected="0">
            <div class="page" id="pageUploadTranscript">
                <paper-fab class="fabNavLeft" icon="chevron-left"></paper-fab>
                one
                <paper-fab class="fabNavRight" icon="chevron-right"> </paper-fab>
            </div>
            <div class="page" id="page2">
                <paper-fab class="fabNavLeft" icon="chevron-left"></paper-fab>
                two
                <paper-fab class="fabNavRight" icon="chevron-right"> </paper-fab>
            </div>
            <div class="page" id="page3">
                <paper-fab class="fabNavLeft" icon="chevron-left"></paper-fab>
                three
                <paper-fab class="fabNavRight" icon="chevron-right"> </paper-fab>
            </div>
            <div class="page" id="page4">
                <paper-fab class="fabNavLeft" icon="chevron-left"></paper-fab>
                four
                <paper-fab class="fabNavRight" icon="chevron-right"> </paper-fab>
            </div>
            <div class="page" id="page5">
                <paper-fab class="fabNavLeft" icon="chevron-left"></paper-fab>
                five
                <paper-fab class="fabNavRight" icon="chevron-right"> </paper-fab>
            </div>

        </core-pages>

        <script src="js/build_schedule_area.js"></script>
    </div>

    <div id="savedSchedulesArea">
        Saved Schedules Area
    </div>

    <div id="accountSettingsArea">
        Account Settings Area
    </div>

    <div id="aboutUsArea">
            <p style="background:blue; opacity:0.8;">
            <center style="font-size: 20px; font-family:cursive, verdana;">
                Our story begin many many days ago, when we were first assigned to this project. We took this journey in an attempt to improve our current model of TigerPaws -- which is a terrible, archiac way of scheduling classes.

                <br>
                <br> Meet the Team:
                <br>


                <table width="500px" height="100%" border="2" color=white>

                    <tr>
                        <td>
                            <img src="imgs/rb.jpeg" alt="Rob Bierman" />
                        </td>

                        <td>
                            Rob Bierman
                            <br>
                            <br>
                            Our fearless hobbit
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <img src="imgs/kj.jpeg" alt="Kendrick James" />
                        </td>

                        <td>
                            Kendrick James
                            <br>
                            <br>
                            No description needed.
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <img src="imgs/ll.jpeg" alt="Lu Liu" />
                        </td>

                        <td>
                            Lu Liu
                            <br>
                            <br>
                            Need to figure out how to crop pics
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <img src="imgs/co.jpeg" alt="Caleb Olson" />
                        </td>

                        <td>
                            Caleb Olson
                            <br>
                            <br>
                            Where's the Algorithm?!
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <img src="imgs/zs.jpeg" alt="Zach Solcher" />
                        </td>

                        <td>
                            Zach Solcher
                            <br>
                            <br>
                            Webmaster
                        </td>
                    </tr>
                </table>
            </center>
            </p>
    </div>

</core-scaffold>

</body>
</html>
