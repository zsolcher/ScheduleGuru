<?php
    if ($_SERVER['SERVER_NAME'] != "dias11.cs.trinity.edu") {
        echo "<p>You must access this page from on campus through dias11.</p>";
        die ();
    }
?>

<?php
session_start();
if(session_destroy())
{
    header("Location: /php/login.php");
}
?>