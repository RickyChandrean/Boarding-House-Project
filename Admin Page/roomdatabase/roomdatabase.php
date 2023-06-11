<?php
require '../../Functions/functions.php';

//query data from the "room" table
$show = mysqli_query($conn, "SELECT * FROM `room` ORDER BY room_availabality,room_label ASC ");
?>


<!DOCTYPE html>
<html lang="en">

<head>

 <title>Room Database</title>
 <link href="../../bootstrap/bootstrap-4.3.1-dist/css/bootstrap.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <link rel="stylesheet" href="css/roomdatabase.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">


</head>

<body>
 <h2 class="title">Room Database</h2>

 <div class="ruangan">
  <button type="button" class="btn btn-info"><a class="top" href="../homeadmin.php">Back</a></button>
  <button type="button" class="btn btn-secondary"><a class="top" href="roomform.php">Add Room Data</a></button>

  <br><br>
  <form action="" method="GET">
   <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Search Room Label/Availability" name="search" value="<?php if (isset($_GET['search'])) {
    echo $_GET['search'];}?>">
    <button type="submit" class="btn btn-primary">Search</button>
   </div>
  </form>

  <table border="1" cellpadding="1" cellspacing="0" class="table table-striped table-dark">
   <!--Structure-->
   <thead>
    <tr>
     <th data-field="No" data-sortable="true">No.</th>
     <th>Room ID</th>
     <th>Room Gender</th>
     <th>Room Size</th>
     <th>Room Label</th>
     <th>Room Location</th>
     <th>Room Window</th>
     <th>Room Monthly Cost</th>
     <th>Room Availability</th>
     <th>Room Description</th>
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
      <?=$row["room_id"];?>
     </td>
     <td>
      <?=$row["room_gender"];?>
     </td>
     <td>
      <?=$row["room_size"];?>
     </td>
     <td>
      <?=$row["room_label"];?>
     </td>
     <td>
      <?=$row["room_location"];?>
     </td>
     <td>
      <?=$row["room_window"];?>
     </td>
     <td>
      <?=$row["room_monthly_cost"];?>
     </td>
     <td>
      <?=$row["room_availabality"];?>
     </td>
     <td>
      <?=$row["room_description"];?>
     </td>
     <td>
      <div class="insidetable">
       <button type="button" class="btn btn-success"><a class="update"
         href="updateroom.php?room_id=<?=$row["room_id"];?>">
         Update
        </a></button>
       <button type="button" class="btn btn-warning"><a class="delete"
         href="deleteroom.php?room_id=<?=$row["room_id"];?>">
         Delete
        </a></button>
      </div>
     </td>
    </tr>
    <?php $i++;?>
    <?php endforeach;
}
?>

    <?php
if (isset($_GET['search'])) {
    $filtervalues = $_GET['search'];
    $result = mysqli_query($conn, "SELECT * FROM `room` WHERE CONCAT(room_label,room_availabality) LIKE '%$filtervalues%'  ORDER BY room_availabality,room_label ASC ");
    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
            ?>
    <tr>
     <td>
      <?=$i;?>
     </td>
     <td>
      <?=$row["room_id"];?>
     </td>
     <td>
      <?=$row["room_gender"];?>
     </td>
     <td>
      <?=$row["room_size"];?>
     </td>
     <td>
      <?=$row["room_label"];?>
     </td>
     <td>
      <?=$row["room_location"];?>
     </td>
     <td>
      <?=$row["room_window"];?>
     </td>
     <td>
      <?=$row["room_monthly_cost"];?>
     </td>
     <td>
      <?=$row["room_availabality"];?>
     </td>
     <td>
      <?=$row["room_description"];?>
     </td>
     <td>
      <div class="insidetable">
       <button type="button" class="btn btn-success"><a class="update"
         href="updateroom.php?room_id=<?=$row["room_id"];?>">
         Update
        </a></button>
       <button type="button" class="btn btn-warning"><a class="delete"
         href="deleteroom.php?room_id=<?=$row["room_id"];?>">
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
     <td colspan="11">No Room found</td>
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