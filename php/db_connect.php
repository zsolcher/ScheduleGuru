<?php
    if ($_SERVER['SERVER_NAME'] != "dias11.cs.trinity.edu") {
        echo "<p>You must access this page from on campus through dias11.</p>";
        die ();
    }
?>

<?php
//  Define connection variables/constants
$dbhost = '127.0.0.1';
$dbname = 'ScheduleGuru';
$dbuser = 'zsolcher';
$dbpass = '0752847';

try {
    // Use a PHP data object (PDO), for security, to connect to DB
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
