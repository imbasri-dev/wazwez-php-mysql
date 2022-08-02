<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "wazwez";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
global $conn;
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  // echo "Connected successfully Bro...";
}

$dataTasks = "SELECT * FROM tasks";
$dataSubtasks = "SELECT * FROM subtasks";
$dataSubtasksId = "SELECT tasks.task_id , subtasks.name
                    FROM tasks INNER JOIN subtasks ON tasks.task_id = subtasks.task_id
                    WHERE subtasks.task_id;";
$dataUsers = "SELECT * FROM users";
