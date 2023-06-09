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
        <h1>Log In</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <div class="txt_field">
            <input type="email" name="email" placeholder="example@gmail.com" autocomplete="true" required>
            <span></span>
            <label for="email">Email</label>
        </div>
        <div class="txt_field">
            <input type="password" name="password" placeholder="your password" autocomplete="true" required>
            <span></span>
            <label for="password">Password</label>
        </div>
        <input type="submit" class="submit" value="Submit">
        
        <small>No Account? <a href="register.php">Register</a></small>
        </form>
    </div>
</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // form data
        $email = $_POST['email'];
        $password = $_POST['password'];

        //open csv file
        $authenticated = false;

        $csvFile = fopen('user.csv', 'r');
        
        while (($data = fgetcsv($csvFile)) !== False) {
            $storedEmail = $data[3];
            $storedPassword = $data[4];

            // validate password entered in form
            if ($email === $storedEmail && $password === $storedPassword) {
                $authenticated = true;
                break;
            }
        }

        // check if user was authenticated
        if ($authenticated) {
            echo "Logged in";
        } else {
            echo "Invalid Login";
        }
    }
