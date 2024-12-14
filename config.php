<?php

//database configs
$server = "localhost";
$username = "root";
$password = "";
$database = "lmdistributors";

//create connection
$conn = new mysqli($server, $username, $password, $database);

//check connection
if($conn -> connect_error) {
    die("Connection failed:".$conn -> connect_error);
}

//echo "Successfully connected";

?>