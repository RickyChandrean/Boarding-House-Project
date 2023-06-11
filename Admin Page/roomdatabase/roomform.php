<?php
include '../../Functions/functions.php';
//Make sure the Submit Button
if (isset($_POST["submit"])) {
//Take Data from each element
    $roomid = mysqli_real_escape_string($conn, $_POST["room_id"]);
    $roomgen = mysqli_real_escape_string($conn, $_POST["room_gender"]);
    $roomsz = mysqli_real_escape_string($conn, $_POST["room_size"]);
    $roomlab = mysqli_real_escape_string($conn, $_POST["room_label"]);
    $roomloc = mysqli_real_escape_string($conn, $_POST["room_location"]);
    $roomwin = mysqli_real_escape_string($conn, $_POST["room_window"]);
    $roommc = mysqli_real_escape_string($conn, $_POST["room_monthly_cost"]);
    $roomava = mysqli_real_escape_string($conn, $_POST["room_availabality"]);
    $roomdesc = mysqli_real_escape_string($conn, $_POST["room_description"]);

// query insert data
    $query = "INSERT INTO `room` VALUES ('$roomid','$roomgen','$roomsz','$roomlab','$roomloc','$roomwin','$roommc','$roomava','$roomdesc')";

    mysqli_query($conn, $query);
    header("Location: roomdatabase.php?show=");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <link rel="stylesheet" href="css/roomform.css">
 <title>Add Room Databases</title>
</head>

<body>
 <div class="container">
  <h2 class="title">Add Room Database</h2>
  <div class="ruang">
   <form action="" method="post" class="form">
    <!--Structure-->
    <!--Q1-->
    <div class="cellmargin">
     <label for="room_id" class="form-label">Room ID</label>
     <input type="text" name="room_id" class="form-control" id="room_id" aria-describedby="emailHelp">
    </div>

    <!--Q2-->
    <div class="cellmargin">
     <label for="room_gender" class="form-label">Room Gender</label>
     <select name="room_gender" id="room_gender" class="form-select" aria-label="Default select example">
      <option value="Male">Man</option>
      <option value="Female">Women</option>
     </select>
    </div>

    <div class="cellmargin">
     <label for="room_size" class="form-label">Room Size</label>
     <select name="room_size" id="room_size" class="form-select" aria-label="Default select example">
      <option value="Small">Small</option>
      <option value="Medium">Medium</option>
      <option value="Large">Large</option>
     </select>
    </div>

    <!--Q3-->
    <div class="cellmargin">
     <label for="room_label" class="form-label">Room Label</label>
     <input type="text" name="room_label" class="form-control" id="room_label" aria-describedby="emailHelp">
    </div>

    <!--Q4-->
    <div class="cellmargin">
     <label for="room_location" class="form-label">Room Location</label>
     <input type="text" name="room_location" class="form-control" id="room_location" aria-describedby="emailHelp">
    </div>

    <!--Q5-->
    <div class="cellmargin">
     <label for="room_window" class="form-label">Room Window</label>
     <input type="text" name="room_window" class="form-control" id="room_window" aria-describedby="emailHelp">
    </div>

    <!--Q6-->
    <div class="cellmargin">
     <label for="room_monthly_cost" class="form-label">Room Monthly Cost</label>
     <input type="text" name="room_monthly_cost" class="form-control" id="room_monthly_cost"
      aria-describedby="emailHelp">
    </div>

    <!--Q7-->
    <div class="cellmargin">
     <label for="room_availabality" class="form-label">Room Availabality</label>
     <select name="room_availabality" id="room_availabality" class="form-select" aria-label="Default select example">
      <option value="Occupied">Occupied</option>
      <option value="Unoccupied">Unoccupied</option>
     </select>
    </div>

    <!--Q8-->
    <div class="cellmargin">
     <label for="room_description" class="form-label">Room Description</label>
     <input type="text" name="room_description" class="form-control" id="room_description" aria-describedby="emailHelp">
    </div>

    <div class="cellmargin">
     <button type="submit" name="submit" class="btn btn-success">Add Data</button>
     <a href="roomdatabase.php?show=" class="btn btn-primary">Back to Room Database</a>
    </div>
   </form>
  </div>
 </div>
</body>

</html>
