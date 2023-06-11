<?php
session_start();

require '../Functions/functions.php';
$show = mysqli_query($conn, "SELECT * FROM invoice");
$username = $_SESSION['username'];
$result = mysqli_query($conn, "SELECT * FROM `users` WHERE username='$username'");
$tableusers = mysqli_fetch_array($result);
$userid = $tableusers['id'];
$tenantname = mysqli_query($conn, "SELECT * FROM `tenant` WHERE userid='$userid'");
$tabletenant = mysqli_fetch_array($tenantname);
$tenant_name = $tabletenant['tenant_name'];
$booking = mysqli_query($conn, "SELECT * FROM `booking` WHERE tenant_name='$tenant_name'");
$tablebooking = mysqli_fetch_array($booking);
$invoice = mysqli_query($conn, "SELECT * FROM `invoice` WHERE tenant_name='$tenant_name'");
$tableinvoice = mysqli_fetch_array($invoice);
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="css/payment.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

 <title>Payment</title>
</head>

<body>
 <img src="../image/gambar3.jpg" alt="" class="background">

 <div class="bg-text">
  <nav class="navbar">
   <div class="right">
    <a href="homeuser.php" class="btn btn-primary">Back </a>
   </div>
  </nav>
  <div class="container">
   <div class="title">
    <div class="content">
     <h1>How to do the Payment Kos Bujang </h1><br><br>
     <table border="1" cellpadding="1" cellspacing="0" class="table table-striped table-dark">
      <thead>
       <tr>
        <th>Booking ID</th>
        <th>Book Date</th>
        <th>Month(s)</th>
        <th>Price</th>
        <th>Total</th>
       </tr>
      </thead>
      <tbody>
       <tr>
        <td>
         <?php $bookid = $tableinvoice
    ['bookingid'];
echo $bookid?>

        <td>
         <?php
$sdate = $tablebooking['book_start_date'];
$edate = $tablebooking['book_end_date'];
$startDate = strtotime($sdate);
$endDate = strtotime($edate);
echo date('d/m/Y', $startDate) . ' - ' . date('d/m/Y', $endDate)
?>
        </td>
        <td>
         <?php $tablemonth = $tableinvoice
    ['month'];
echo $tablemonth?>
        </td>
        <td>
         <?php $tableprice = $tableinvoice['price'];
echo number_format($tableprice)?>
        </td>
        <td>
         <?php $total = $tablemonth * $tableprice;
echo 'Rp ' . number_format($total)?>
        </td>
       </tr>
      </tbody>
     </table>
     <h4> 1. After placing an order, please make a payment by transferring to one of the accounts below:<br>
      Bank BCA: 5125206350 a.n. Ricky Chandrean<br>
      Gopay/OVO/Shopeepay/Dana: 081521515366 a.n. Ricky Chandrean</h4> <br>
     <h4>2. Photo / scan (scan) / screenshot of your transfer proof. We recommend that you also keep your proof of
      transfer, as evidence in case of a dispute</h4><br>
     <h4>3. Upload a photo, scan or screenshot of your proof of transfer to the Whatsapp number: 081521515366</h4><br>

    </div>
    </form>
   </div>
  </div>
 </div>
 </div>
</body>

</html>