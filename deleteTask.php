<?php
// koneksi database
include "db.php"

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
mysqli_query($conn, "DELETE FROM tasks WHERE task_id ='$id'");

// mengalihkan halaman kembali ke index.php
header("location:index.php");
