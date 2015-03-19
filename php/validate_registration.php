<?php
    if ($_SERVER['SERVER_NAME'] != "dias11.cs.trinity.edu") {
        echo "<p>You must access this page from on campus through dias11.</p>";
        die ();
    }
?>

<?php
session_start();
include("db_connect.php");

try {
    // Prepare SQL Query
    $qry = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($qry);

    // bind parameters
    $user_email = trim($_POST['new_user_email']);
    $stmt->bindParam(':email', $user_email);

    // Execute prepared statement
    $stmt->execute();

    // Check if exactly one matching result
    $noRows =$stmt->rowCount();

    if($noRows == 0) {
        if($_POST['new_user_pwd1'] == $_POST['new_user_pwd2']) {
            $qry = "INSERT INTO users (first_name, last_name, email, passwd) VALUES (:first_name, :last_name, :email, :passwd);";
            $stmt = $conn->prepare($qry);

            // bind parameters
            $stmt->bindParam(':first_name', $_POST['new_user_fname']);
            $stmt->bindParam(':last_name', $_POST['new_user_lname']);
            $stmt->bindParam(':email', $_POST['new_user_email']);
            $stmt->bindParam(':passwd', $_POST['new_user_pwd1']);

            // Execute prepared statement
            $stmt->execute();
            $conn = null;
            echo "Registration successful!";
            echo "<a href='./login.php'> Back to login </a> <br>";
        } else {
            echo "The passwords entered do not match. Please re-enter passwords and resubmit. <br>";
            echo "<a href='./login.php'> Back to login </a> <br>";
            echo "<a href=\"javascript:history.go(-1)\"> Go back to registration page</a> <br>";
        }
    }
    else {
        echo "The email entered is already associated to a user account. Please try using a different email. <br>";
        echo "<a href='./login.php'> Back to login </a> <br>";
        echo "<a href=\"javascript:history.go(-1)\"> Go back to registration page</a> <br>";
    }
    $conn = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
