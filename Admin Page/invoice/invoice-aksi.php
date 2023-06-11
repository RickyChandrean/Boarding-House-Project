<?php
// koneksi database

require '../../Functions/functions.php';
$date = date("d/m/y");

//query data from the "room" table
$result1 = mysqli_query($conn, "SELECT * FROM booking");
$a = $_POST['invoiceid'];
$b = $_POST['tenant_name'];
$c = $_POST['company'];
$d = $_POST['tenant_address'];
$e = $_POST['Zip_code'];
$f = $_POST['tenant_phone'];
$g = date("Y/m/d");
$h = $_POST['room_size'];
$k = $_POST['room_label'];
$i = $_POST['month'];
$j = $_POST['price'];

// menginput data ke database
mysqli_query($conn, "INSERT INTO invoice VALUES('$a','-','$b','$c','$d','$e','$f','$g','$h','$k','$i','$j')");
// mengalihkan halaman kembali ke index.php
header("location:invoice-result.php");
