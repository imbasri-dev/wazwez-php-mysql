<?php
// koneksi database
include "database.php";

// menangkap data id yang di kirim dari url
$id = $_GET['id'];
$sqlDelete = "DELETE FROM tasks WHERE tasks.id = $id[$id]";
// menghapus data dari database
mysqli_query($conn, $sqlDelete);

// mengalihkan halaman kembali ke index.php
header("location:index.php");
