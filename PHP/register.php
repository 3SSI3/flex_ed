<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/about.css'>
</head>
<body>
        <!--=========== NAVBAR START ===============================-->
        <!--css link-->
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <nav>
        <div class="container nav__container">
            <a href="../index.html"><h4>FlexEd</h4></a>
            <ul class="nav__menu">
                <!--li><a href="../index.html">Home</a></li>
                <li><a href="../about.html">About</a></li>
                <li><a href="../courses.html">Courses</a></li>
                <li><a href="../contact.html">Contact</a></li>
            </ul>
            <button id="menu-button"><i class="uil uil-bars"></i></button>
            <button id="close-menu-button"><i class="uil uil-multiply"></i></i></button-->
        </div>
    </nav>
<!--======================== END OF THE NAVBAR=========================-->

  
  <!--============================LOGIN FORM=========================================================-->
    <div class='center'>
        <h1>Register</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <div class="txt_field">
                <input type="text" name="firstname" placeholder="Enter Firstname" autocomplete="true" required>
                <span></span>
                <label for="Firstname">Firstname</label>
            </div>
            <div class="txt_field">
                <input type="text" name="lastname" placeholder="Enter Lastname" autocomplete="true" required>
                <span></span>
                <label for="Lastname">Lastname</label>
            </div>

            <div class="txt_field">
                <input type="text" name="username" placeholder="Enter Username" autocomplete="true" required>
                <span></span>
                <label for="Username">Username</label>
            </div>

            <div class="txt_field">
                <input type="email" name="email" placeholder="example@gmail.com" autocomplete="true" required>
                <span></span>
                <label for="email">Email</label>
            </div>
            
            <div class="txt_field">
                <input type="password" name="password" placeholder="8-characters or more" autocomplete="true" required>
                <span></span>
                <label for="Password">Password</label>
            </div>

            <div class="txt_field">
                <input type="password" name="password" placeholder="8-characters or more" autocomplete="true" required>
                <span></span>
                <label for="Password">Confirm Password</label>
            </div>

            <input type="submit" class="submit" value="Submit">
            <small>Have an account? <a href="login.php">Login</a></small>
        </form>
    </div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

// tracks password confirmation
$match = false;

// tracks password length is right
$lengthCheck = false;

// check if confirmation of password was correct
if ($password === $confirm) {
    $match = true;
}

if (strlen($password) >= 8) {
    $lengthCheck = true;
}

// save to csv if details are valid
if ($lengthCheck === $match) {
    $csvFile = fopen('user.csv', 'a');
    $data = [$firstname, $lastname, $username, $email, $password];

    // write form data to csv
    fputcsv($csvFile, $data);
    fclose($csvFile);
}
}
?>