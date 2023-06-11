<?php
require '../../Functions/functions.php';

$show = mysqli_query($conn, "SELECT * FROM `invoice` INNER JOIN booking ON invoice.bookingid=booking.book_id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>All Tenant Invoice</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <link rel="stylesheet" href="css/bookdatabase.css">
</head>

<body>
 <img src="../../image/gambar.jpg" alt="" class="background">
 <h2 class="title">All Tenant Invoice</h2>

 <div class="ruangan">
  <button type="button" class="btn btn-info"><a class="top" href="../homeadmin.php">Back</a></button>
  <button type="button" class="btn btn-secondary"><a class="top" href="invoice-form.php">Add Invoice Data</a></button>

  <br><br>
  <form action="" method="GET">
   <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Search Invoice ID/ Booking ID/ Tenant Name" name="search"
     value="<?php if (isset($_GET['search'])) {
    echo $_GET['search'];}?>">
    <button type="submit" class="btn btn-primary">Search</button>
   </div>
  </form>

  <table border="1" cellpadding="1" cellspacing="0" class="table table-striped table-dark">
   <!--Structure-->
   <thead>
    <tr>
     <th data-field="No" data-sortable="true">No.</th>
     <th>Invoice ID</th>
     <th>Booking ID</th>
     <th>Tenant Name</th>
     <th>company</th>
     <th>Tenant Address</th>
     <th>Zip-Code</th>
     <th>Tenant Phone</th>
     <th>Date</th>
     <th>Room Size</th>
     <th>Room Label</th>
     <th>Month</th>
     <th>Price</th>
     <th>Payment Status</th>
     <th>Actions</th>
    </tr>
   </thead>
   <tbody>
    <?php $i = 1;
if (isset($_GET['show'])) {
    foreach ($show as $row): ?>
    <tr>
     <td>
      <?=$i;?>
     </td>
     <td>
      <?=$row["invoiceid"];?>
     </td>
     <td>
      <?=$row["bookingid"];?>
     </td>
     <td>
      <?=$row["tenant_name"];?>
     </td>
     <td>
      <?=$row["company"];?>
     </td>
     <td>
      <?=$row["tenant_address"];?>
     </td>
     <td>
      <?=$row["Zip_code"];?>
     </td>
     <td>
      <?=$row["tenant_phone"];?>
     </td>
     <td>
      <?=$row["date"];?>
     </td>
     <td>
      <?=$row["room_size"];?>
     </td>
     <td>
      <?=$row["room_label"];?>
     </td>
     <td>
      <?=$row["month"];?>
     </td>
     <td>
      <?=$row["price"];?>
     </td>
     <td>
      <?=$row["paymentStat"];?>
     </td>
     <td>
      <div class="insidetable">
       <button type="button" class="btn btn-success"><a class="Generate invoice"
         href="invoice-all.php?invoiceid=<?=$row["invoiceid"];?>">
         Generate Invoice
        </a></button>
        <br><br>
       <button type="button" class="btn btn-danger" name='payStat'><a class="update"
          href="payment.php?bookingid=<?=$row["bookingid"];?>" onclick="return checkDelete()">
          Paid
         </a></button>
       <br>
       <br>
       <button type="button" class="btn btn-warning"><a class="delete"
         href="deleteinvoice.php?invoiceid=<?=$row["invoiceid"];?>">
         Delete Invoice
        </a></button>
      </div>
     </td>
    </tr>
    <?php $i++;?>
    <?php endforeach;
}

if (isset($_GET['search'])) {
    $filtervalues = $_GET['search'];
    $result = mysqli_query($conn, "SELECT * FROM `invoice` WHERE CONCAT(invoiceid,bookingid,tenant_name) LIKE '%$filtervalues%'  ORDER BY invoiceid ASC ");
    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
            ?>
    <tr>
     <td>
      <?=$i;?>
     </td>
     <td>
      <?=$row["invoiceid"];?>
     </td>
     <td>
      <?=$row["bookingid"];?>
     </td>
     <td>
      <?=$row["tenant_name"];?>
     </td>
     <td>
      <?=$row["company"];?>
     </td>
     <td>
      <?=$row["tenant_address"];?>
     </td>
     <td>
      <?=$row["Zip_code"];?>
     </td>
     <td>
      <?=$row["tenant_phone"];?>
     </td>
     <td>
      <?=$row["date"];?>
     </td>
     <td>
      <?=$row["room_size"];?>
     </td>
     <td>
      <?=$row["room_label"];?>
     </td>
     <td>
      <?=$row["month"];?>
     </td>
     <td>
      <?=$row["price"];?>
     </td>
     <td>
      <?=$row["paymentStat"];?>
     </td>
     <td>
      <div class="insidetable">
       <button type="button" class="btn btn-success"><a class="Generate invoice"
         href="invoice-all.php?invoiceid=<?=$row["invoiceid"];?>">
         Generate Invoice
        </a></button>
       <br> <br>
       <button type="button" class="btn btn-danger" name='payStat'><a class="update"
          href="payment.php?bookingid=<?=$row["bookingid"];?>" onclick="return checkDelete()">
          Paid
         </a></button>
       <br> <br>
       <button type="button" class="btn btn-warning"><a class="delete"
         href="deleteinvoice.php?invoiceid=<?=$row["invoiceid"];?>">
         Delete Invoice
        </a></button>
      </div>
     </td>
    </tr>
    <?php $i++;
        }
    } else {
        ?>
    <tr>
     <td colspan="12">No Invoice found</td>
    </tr>
    <?php
}
}
?>
   </tbody>

  </table>
 </div>

</body>

</html>