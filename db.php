<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "wazwez";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo "Connected successfully Bro...";
}


$dataTasks = "SELECT * FROM tasks";
$dataSubtasks = "SELECT * FROM subtasks";
$dataUsers = "SELECT * FROM users";
