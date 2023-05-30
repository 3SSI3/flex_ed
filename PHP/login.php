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
        <h2>Log in</h2>
        <label for="email">Email</label>
        <input type="email" name="email" autocomplete="true">
        
        <label for="password">Password</label>
        <input type="password" name="password" autocomplete="true">

        <input type="submit" class="submit" value="Submit">

        <small>No Account? <a href="register.php">Register</a></small>
    </form>
</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        /*
        TODO: add functionality to authenticate user
        */
    }
?>