<?php
session_start();
require('dbConnection.php');

// declaring variables
$username = "";
$email = "";
$password_1 = "";
$password_2 = "";
$role = "student";
$isValid = true;

// User Registration
if (isset($_POST['reg_user'])) {
    // Data sanitization to prevent sql injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['confirm']);

    // Ensure form fields are not empty
    if (empty($username) || empty($password_1) || empty($email)) {
        $isValid = false;
    }

    // check that password is same as confirmation
    if ($password_1 !== $password_2) {
        $isValid = false;
    }

    // store data in database if form entry is valid
    if ($isValid) {
        // encrypt password for added security
        $password = md5($password_1);

        // prepare sql statement
        $stmt = mysqli_prepare($conn, "INSERT INTO user(username, email, password, role) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'ssss', $username, $email, $password, $role);
        
        if (mysqli_stmt_execute($stmt)) {
            // create a session for user
            $_SESSION['username'] = $username;

            // redirect to home page
            header("location: ../home.html");
        }
    }
}

// User login
if (isset($_POST['log_user'])) {
    // Data sanitization to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($email) ||  empty($password)) {
        $isValid = false;
    }

    // Check for errors
    if ($isValid) {
        $password = md5($password);

        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) == 1) {
            // Store email in session
            $_SESSION['email'] = $email;

            header("location: ../home.html");
        }
    } 
}
?>