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
    $qry = "SELECT * FROM Users WHERE Email = :email AND Password = :password";
    $stmt = $conn->prepare($qry);

    // bind parameters
    $user_email = trim($_POST['email']);
    $user_password = trim($_POST['password']);
    $stmt->bindParam(':email', $user_email);
    $stmt->bindParam(':password', $user_password);

    // Execute prepared statement
    $stmt->execute();

    // Check if exactly one matching result
    $noRows =$stmt->rowCount();

    if($noRows == 1) {
        $topRow = $stmt->fetch();

        // Store session information
        session_start();
        $_SESSION['id_user']=$topRow[0];
        $_SESSION['user_fname']=$topRow[1];
        $_SESSION['user_lname']=$topRow[2];
        $_SESSION['user_email']=$topRow[3];

        //redirect to home page
        header("location: ../index.php");
    }
    else {
        echo "Was not able to login successfully";
        header("location: ../login.php");
    }

    $conn = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
