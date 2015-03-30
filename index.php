<?php
	//include("./php/check_logged_in.php");
	include("./php/updateSite.php");
?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="2011-08-24" >

    <!--  CSS/Fonts Imports  -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/buildScheduleArea.css">
	<link rel="stylesheet" href="css/table.css">
	<link rel="shortcut icon" href="favicon.ico">

	<!--TODO-->
	<link rel="stylesheet" href="css/accountSettingsArea.css">   

	<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
    <!--  CSS/Fonts Imports  -->

    <!-- 1. Load webcomponents.min.js for polyfill support. -->
    <script src="bower_components/webcomponentsjs/webcomponents.js"></script>

    <!--  Polymer Imports  -->
    <link rel="import" href="bower_components/core-toolbar/core-toolbar.html">
    <link rel="import" href="bower_components/core-menu/core-menu.html">
	<link rel="import" href="bower_components/core-selector/core-selector.html">
    <link rel="import" href="bower_components/core-item/core-item.html">
    <link rel="import" href="bower_components/core-header-panel/core-header-panel.html">
    <link rel="import" href="bower_components/core-drawer-panel/core-drawer-panel.html">
    <link rel="import" href="bower_components/core-scaffold/core-scaffold.html">
    <link rel="import" href="bower_components/core-icons/core-icons.html">
    <link rel="import" href="bower_components/core-pages/core-pages.html">
    <link rel="import" href="bower_components/core-animated-pages/core-animated-pages.html">
    <link rel="import" href="bower_components/core-animated-pages/transitions/slide-from-right.html">
    <link rel="import" href="bower_components/core-animated-pages/transitions/slide-from-left.html">
    <link rel="import" href="bower_components/core-list/core-list.html">


    <link rel="import" href="bower_components/paper-icon-button/paper-icon-button.html">
    <link rel="import" href="bower_components/paper-button/paper-button.html">
    <link rel="import" href="bower_components/paper-fab/paper-fab.html">
    <link rel="import" href="bower_components/paper-menu-button/paper-menu-button.html">
	<link rel="import" href="bower_components/paper-dropdown-menu/paper-dropdown-menu.html">
    <link rel="import" href="bower_components/paper-dropdown/paper-dropdown.html">
    <link rel="import" href="bower_components/paper-item/paper-item.html">
    <link rel="import" href="bower_components/paper-tabs/paper-tab.html">
    <link rel="import" href="bower_components/paper-tabs/paper-tabs.html">
	<link rel="import" href="bower_components/paper-checkbox/paper-checkbox.html">
    <link rel="import" href="bower_components/paper-slider/paper-slider.html">
    <link rel="import" href="bower_components/paper-radio-group/paper-radio-group.html">
    <link rel="import" href="bower_components/paper-radio-button/paper-radio-button.html">

    <!--  JQuery Import  -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!--  JQuery Import  -->

    <!--  PHP Import  -->
    <!--  PHP Import  -->

</head>

<body>
<script>
	var userEmail = localStorage.getItem("userEmail");
	//if(userEmail == null) window.location.href = "login.php";
	getUserData(userEmail);
	var currentUser = Object();
	var fields = Array('UserID','Email','Major','FirstName','LastName','Year');
	for(var i = 0; i < fields.length; ++i) currentUser[fields[i]] = result[fields[i]];
	result = {};
</script>

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
            <core-item  class="menuItem" id="menuItemCalendar" icon="book" label="Calendar"></core-item>
        </core-menu>
    </core-header-panel>

    <div flex id="title" tool> Schedule Guru</div>

    <paper-button tool id="accountCircle">
        <core-icon icon="account-circle" style="width:50px; height:50px;"> </core-icon>
    </paper-button>
	 <div id="progressBar">
    <ul id="buildScheduleTabs">
        <li id="tab1">Upload Transcript</li>
        <li id="tab2">Preferences</li>
        <li id="tab3">Major</li>
        <li id="tab4">Common Curriculum</li>
        <li id="tab5">Finalize</li>
    </ul>
    </div>

    <div id="homeArea">
    <script type="text/javascript">
    	$( "#homeArea" ).load( "homeArea.php" );
    </script>
    </div>

    <div id="buildScheduleArea"  horizontal center center-justified layout>
        <script type="text/javascript">
            $( "#buildScheduleArea" ).load( "buildScheduleArea.php" );
        </script>

        <script src="js/buildScheduleArea.js"></script>
    </div>

    <div id="savedSchedulesArea">
        <script type="text/javascript">
    		$( "#savedSchedulesArea" ).load( "savedSchedulesArea.php" );
    	</script>
    </div>

    <div id="accountSettingsArea">
		<script type="text/javascript">
    		$( "#accountSettingsArea" ).load( "accountSettingsArea.php" );
    	</script>
    </div>

    <div id="aboutUsArea">
        <script type="text/javascript">
    		$( "#aboutUsArea" ).load( "aboutUsArea.php" );
    	</script>
    </div>

</core-scaffold>
<script src="js/initialize_master.js"></script>
<script src="js/calendar.js"></script>
<script src="js/buildClassTable.js"></script>

</body>
</html>
