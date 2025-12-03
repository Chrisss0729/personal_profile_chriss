<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'personal_profile_chriss';

// Establish connection
$connect = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
