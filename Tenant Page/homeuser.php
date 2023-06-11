<?php
require "../functions/functions.php";
session_start();
$username = $_SESSION['username'];
$result = mysqli_query($conn, "SELECT * FROM `users` WHERE username='$username'");
$tableusers = mysqli_fetch_array($result);
$userid = $tableusers['id'];
$completeprofile = $tableusers['regist'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../style/HomeUser.css">
 <title>User Page Admin</title>
</head>

<body>

 <div class="container">
  <nav class="navbar">
   <div class="right">
    <div class="ruangan">
     <button><a <?php
if ($tableusers['regist'] == 'yes') {
    echo "href=updateprofile.php";

    //query data room based on "room id"
    $qdr = "SELECT * FROM `tenant` WHERE userid=$userid";
    $result = mysqli_query($conn, $qdr);

    // Associative array
    $row = mysqli_fetch_assoc($result);

    $fullname = $row['tenant_name'];
    $_SESSION['tenant_name'] = $fullname;
} else {
    echo "href=tenantform.php";
}?>>
       <?php
if ($tableusers['regist'] == 'yes') {
    echo "Profile";
    $profile = 1;
} else {
    echo "Complete Profile";
    $profile = 0;
}?></a></button>
    </div>
    <div class=" ruangan">
     <button><a href="room.php?show=">Room</a></button>
    </div>

    <div class="ruangan">
     <button><a <?php
if ($tableusers['regist'] == 'yes') {
    echo "href=bookform.php";
} else {
}
?>>Booking Room</a></button>

    </div>
    <div class=" ruangan">
     <button><a href="aboutus.php">About Us</a></button>
    </div>
    <div class="ruangan">
     <button><a href="contactus.php">Contact Us</a></button>
    </div>
    <div class="ruangan">
     <button><a href="paymentmet.php">Payment Method</a></button>

    </div>
    <div class="ruangan">
     <button><a href="logout.php">Logout</a></button>

    </div>

   </div>
  </nav>

  <div class="title">
   <div class="content">

    <h1>Kos Bujang.</h1> <br><br>

    <h2>Cheap prices for quality rooms</h2>
   </div>
  </div>
 </div>
</body>

</html>