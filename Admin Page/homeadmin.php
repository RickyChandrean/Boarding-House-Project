<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/HomeAdmin.css">
  <title>Home Page Admin</title>
</head>

<body>

  <div class="container">
    <nav class="navbar">
      <div class="right">
        <div class="ruangan">
          <button><a href="roomdatabase/roomdatabase.php?show=">Room</a></button><br>
        </div>
        <div class="ruangan">
          <button><a href="tenantdata/tenantdatabase.php?show=">Tenant</a></button>
        </div>
        <div class="ruangan">
          <button><a href="invoice/invoicedatabase.php?show=">Invoice
            </a></button>

        </div>
        <div class="ruangan">
          <button><a href="bookdatabase/bookdatabase.php?show=">Booking</a></button>
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