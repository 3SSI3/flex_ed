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
        <input type="text" name="firstname" required>
        
        <label for="Lastname">Lastname</label>
        <input type="text" name="lastname" required>

        <label for="username">Username</label>
        <input type="text" name="username" required>

        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" required>

        <label for="confirm">Confirm Password</label>
        <input type="password" name="confirm" required>
        

        <input type="submit" class="submit" value="Submit">

        <small>Have an account? <a href="login.php">Login</a></small>
    </form>
</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        /*
        TODO: add functionality to register user
        */
    }
?>