<?php
require '../../Functions/functions.php';

// Take Data from url//
$roomid = $_GET["room_id"];

//query data room based on "room id"
$qdr = query("SELECT * FROM room WHERE room_id = $roomid")[0];

//Make sure the Submit Button
if( isset($_POST["submit"]) ){
    echo " <script>
    alert('Data is updated');
    document.location.href = 'roomdatabase.php?show=';
    </script>
    ";
}

if( isset($_POST["submit"]) ){
    //Take Data from each element
    $roomid = mysqli_real_escape_string($conn,$_POST["room_id"]);
    $roomgen= mysqli_real_escape_string($conn,$_POST["room_gender"]);
    $roomsz = mysqli_real_escape_string($conn, $_POST["room_size"]);
    $roomlab = mysqli_real_escape_string($conn,$_POST["room_label"]);
    $roomloc = mysqli_real_escape_string($conn,$_POST["room_location"]);
    $roomwin = mysqli_real_escape_string($conn,$_POST["room_window"]);
    $roommc = mysqli_real_escape_string($conn,$_POST["room_monthly_cost"]);
    $roomava = mysqli_real_escape_string($conn,$_POST["room_availabality"]);
    $roomdesc= mysqli_real_escape_string($conn,$_POST["room_description"]);
     
    
    // query insert data
    $query = "UPDATE room SET
    room_gender       = '$roomgen',
    room_label        = '$roomlab',
    room_location     = '$roomloc',
    room_window       = '$roomwin',
    room_monthly_cost = '$roommc',
    room_availabality = '$roomava',
    room_description  = '$roomdesc'
  
  WHERE room_id       = $roomid
";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
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
 <link href="../../bootstrap/bootstrap-4.3.1-dist/css/bootstrap.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <link rel="stylesheet" href="css/roomform.css">

 <title>Update Room Databases</title>
</head>

<body>
 <div class="container">
  <h2 class="title">Update Room Database</h2>
  <div class="ruang">

   <form action="" method="post">
    <!--Structure-->
    <!--Q1-->
    <div class="cellmargin">
     <label for="room_id" class="form-label">Room ID</label>
     <input type="text" name="room_id" class="form-control" id="room_id" required value="<?= $qdr["room_id"];?>"
      aria-describedby="emailHelp">
    </div>

    <!--Q2-->
    <div class="cellmargin">
     <label for="room_gender" class="form-label">Room Gender</label>
     <input type="text" name="room_gender" class="form-control" id="room_gender" required
      value="<?= $qdr["room_gender"];?>" aria-describedby="emailHelp">
    </div>

    <!--Q3-->
    <div class="cellmargin">
     <label for="room_size" class="form-label">Room Size</label>
     <select name="room_size" id="room_size" class="form-select" aria-label="Default select example">
      <option value="Small">Small</option>
      <option value="Medium">Medium</option>
      <option value="Large">Large</option>
     </select>
    </div>

    <div class="cellmargin">
     <label for="room_label" class="form-label">Room Label</label>
     <input type="text" name="room_label" class="form-control" id="room_label" required
      value="<?= $qdr["room_label"];?>" aria-describedby="emailHelp">
    </div>
    <!--Q4-->
    <div class="cellmargin">

     <label for="room_location" class="form-label">Room Location</label>
     <input type="text" name="room_location" class="form-control" id="room_location" required
      value="<?= $qdr["room_location"];?>" aria-describedby="emailHelp">
    </div>
    <!--Q5-->
    <div class="cellmargin">
     <label for="room_window" class="form-label">Room Window</label>
     <input type="text" name="room_window" class="form-control" id="room_window" required
      value="<?= $qdr["room_window"];?>" aria-describedby="emailHelp">
    </div>
    <!--Q6-->

    <div class="cellmargin">
     <label for="room_monthly_cost" class="form-label">Room Monthly Cost</label>
     <input type="text" name="room_monthly_cost" class="form-control" id="room_monthly_cost" required
      value="<?= $qdr["room_monthly_cost"];?>" aria-describedby="emailHelp">
    </div>

    <!--Q7-->
    <div class="cellmargin">
     <label for="room_availabality" class="form-label">Room Availabality</label>
     <select name="room_availabality" id="room_availabality" class="form-select" aria-label="Default select example">
      <option value="Occupied">Occupied</option>
      <option value="Unoccupied">Unoccupied</option>
      <option value="Booked">Booked</option>

     </select>
    </div>

    <!--Q8-->
    <div class="cellmargin">
     <label for="room_description" class="form-label">Room Description</label>
     <input type="text" name="room_description" class="form-control" id="room_description" required
      value="<?= $qdr["room_description"];?>" aria-describedby="emailHelp">
    </div>

    <div class="cellmargin">
     <button type="submit" name="submit" class="btn btn-success">Update Data</button>
     <a href="roomdatabase.php?show=" class="btn btn-primary">Back to Room Database</a></button>
    </div>
   </form>
  </div>
 </div>
</body>

</html>