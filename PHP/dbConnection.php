<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "flexed";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    echo "Something went wrong try again";
}

?>