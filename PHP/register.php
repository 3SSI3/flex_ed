<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Register</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/log.css'>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <h2>Register</h2>
        <label for="Firstname">Firstname</label>
        <input type="text" name="firstname" placeholder="Enter Firstname" required>
        
        <label for="Lastname">Lastname</label>
        <input type="text" name="lastname" placeholder="Enter Lastname" required>

        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter Username"required>

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="example@gmail.com" required>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="8 characters or more" required>

        <label for="confirm">Confirm Password</label>
        <input type="password" name="confirm" placeholder="re-enter password" required>
        

        <input type="submit" class="submit" value="Submit">

        <small>Have an account? <a href="login.php">Login</a></small>
    </form>
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
        
        // save to csv if details are valid
        if (strlen($password) >= 8 && $password === $confirm) {
            $csvFile = fopen('user.csv', 'a');
            $data = [$firstname, $lastname, $username, $email, $password];

            // write form data to csv
            fputcsv($csvFile, $data);
            fclose($csvFile);
        }
    }
?>