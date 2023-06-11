<?php
require '../../Functions/functions.php';

//query data from the "room" table
$show = mysqli_query($conn, "SELECT * FROM booking ORDER BY book_tr_date ASC");

?>


<!DOCTYPE html>
<html lang="en">

<head>

 <title>Booking Database</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <link rel="stylesheet" href="css/bookdatabase.css">
 <script language="JavaScript" type="text/javascript">
 function checkDelete() {
  {

   if (confirm("Set payment status to paid?"))
    location.href = payment.php;
  }
 }
 </script>
</head>

<body>

 <img src="../../image/gambar.jpg" alt="" class="background">
 <h2 class="title">Booking Database</h2>
 <div class="ruangan">
  <div class="button">
   <button type="button" class="btn btn-secondary"><a href="../homeadmin.php">Back</a></button>
  </div>

  <form action="" method="GET">
   <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Search Book ID/ Tenant Name" name="search" value="<?php if (isset($_GET['search'])) {
    echo $_GET['search'];}?>">
    <button type="submit" class="btn btn-primary">Search</button>
   </div>

   <table border="1" cellpadding="1" cellspacing="0" class="table table-striped table-dark">
    <!--Structure-->
    <thead>
     <tr>
      <th>No.</th>
      <th>Book ID</th>
      <th>Room Label</th>
      <th>Tenant Name</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Booking's Date </th>
      <th>Action</th>
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
       <?=$row["book_id"];?>
      </td>
      <td>
       <?=$row["room_label"];?>
      </td>
      <td>
       <?=$row["tenant_name"];?>
      </td>
      <td>
       <?php
$date1 = $row["book_start_date"];
    $date = strtotime($date1);
    echo date('d-m-Y', $date)
    ?>
      </td>
      <td>
       <?php
$date1 = $row["book_end_date"];
    $date = strtotime($date1);
    echo date('d-m-Y', $date)
    ?>
      </td>
      <td>
       <?php
$date1 = $row["book_tr_date"];
    $date = strtotime($date1);
    echo date('d-m-Y', $date)
    ?>
      </td>
      <td>
       <div class="insidetable">
        <button type="button" class="btn btn-warning"><a class="delete"
          href="deletebook.php?book_id=<?php echo $row["book_id"]; ?>&amp;room_label=<?php echo $row['room_label']; ?>">
          Delete
         </a></button>
       </div>
      </td>

     </tr>
     <?php $i++;
    endforeach;
}
if (isset($_GET['search'])) {
    $filtervalues = $_GET['search'];
    $result = mysqli_query($conn, "SELECT * FROM `booking` WHERE CONCAT(book_id,room_label,tenant_name) LIKE '%$filtervalues%'  ORDER BY book_id ASC ");
    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
            ?>
     <tr>
      <td>
       <?=$i;?>
      </td>
      <td>
       <?=$row["book_id"];?>
      </td>
      <td>
       <?=$row["room_label"];?>
      </td>
      <td>
       <?=$row["tenant_name"];?>
      </td>
      <td>
       <?php
$date1 = $row["book_start_date"];
            $date = strtotime($date1);
            echo date('d-m-Y', $date)
            ?>
      </td>
      <td>
       <?php
$date1 = $row["book_end_date"];
            $date = strtotime($date1);
            echo date('d-m-Y', $date)
            ?>
      </td>
      <td>
       <?php
$date1 = $row["book_tr_date"];
            $date = strtotime($date1);
            echo date('d-m-Y', $date)
            ?>
      </td>
      <td>
       <div class="insidetable">
        <button type="button" class="btn btn-success"><a class="update"
          href="invoice-aksi.php?book_id=<?=$row["book_id"];?>&amp;tenant_name=<?php echo $row['tenant_name']; ?>&amp;number=<?=$i;?>">
          Generate Invoice
         </a></button>
        <button type="button" class="btn btn-success" name='payStat'><a class="update"
          href="payment.php?book_id=<?=$row["book_id"];?>">
          Paid
         </a></button>
        <button type="button" class="btn btn-warning"><a class="delete"
          href="deletebook.php?book_id=<?php echo $row["book_id"]; ?>&amp;room_label=<?php echo $row['room_label']; ?>">
          Delete
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