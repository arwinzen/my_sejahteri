<?php
$servername = "localhost";
$username = "rwin";
$password = "rw1ng00Z3n";
$dbname = "my_sejahteri";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully"."<br>";
//echo "<br>";

