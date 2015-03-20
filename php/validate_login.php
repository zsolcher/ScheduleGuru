<?php

include("db_connect.php");
session_start();

if ($_SERVER['SERVER_NAME'] != "dias11.cs.trinity.edu") {
    echo "<p>You must access this page from on campus through dias11.</p>";
    die ();
}

echo "email: " . $_POST['login_email'] . ", password: " . $_POST['login_password'];

if(isset($_POST['login_email']) && isset($_POST['login_password'])) {
    try {
        // Prepare SQL Query
        $qry = "SELECT * FROM Users WHERE Email = :email AND Password = :password";
        $stmt = $conn->prepare($qry);

        // bind parameters
        $user_email = trim($_POST['login_email']);
        $user_password = trim($_POST['login_password']);
        $stmt->bindParam(':email', $user_email);
        $stmt->bindParam(':password', $user_password);

        // Execute prepared statement
        $stmt->execute();

        // Check if exactly one matching result
        $noRows =$stmt->rowCount();

        $return = array();
        if($noRows == 1) {
            $topRow = $stmt->fetch();

            // Store session information
            session_start();
            $_SESSION['user_id']=$topRow[0];
            $_SESSION['user_major']=$topRow[3];
            $_SESSION['user_fname']=$topRow[5];
            $_SESSION['user_lname']=$topRow[6];
            $_SESSION['user_email']=$topRow[1];
            $_SESSION['user_year']=$topRow[4];

            $return["status"] = "success";
            echo json_encode($return);

        } else {
            $return["status"] = "failure";
            echo json_encode($return);
        }

        $conn = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}