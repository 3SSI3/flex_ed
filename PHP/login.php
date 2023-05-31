<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/log.css'>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <h2>Log In</h2>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="example@gmail.com" autocomplete="true">
        
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="your password" autocomplete="true">

        <input type="submit" class="submit" value="Submit">

        <small>No Account? <a href="register.php">Register</a></small>
    </form>
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
?>