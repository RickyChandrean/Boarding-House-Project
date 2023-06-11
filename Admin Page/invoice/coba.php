<script>
function reload() {
  var value = document.getElementById('room_size').value;

  self.location = 'coba.php?size=' + value;
}
</script>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>title</title>
</head>

<body>
  <form action="" method="post">
    <?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
    <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
    Your Form's Other Field
    <input type="submit" name="submitbtn" value="submit" />

    <select name="room_size" id="room_size" class="form-control">
      <option value="">Select Room Size</option>
      <option value=" Small">Small</option>
      <option value="Medium">Medium</option>
      <option value="Large">Large</option>
    </select>
    </h5><br>

    <h5>Room type:
      <select name="room_label" id="room_label" class="form-select" aria-label="Default select example">
        <?php
            $size = $_GET['size'];
            $query="SELECT room_label FROM tenant  WHERE 'room_size'=? AND 'room_avilability'=Unoccupied ORDER BY tenant_name";
            if ($stmt = $conn->prepare($query)){
              // $stmt->bind_param();
            }
						$i = 0;
						while($row = mysqli_fetch_array($result1)){
							?>
        <option value="<?=$row["tenant_name"];?>">
          <?=$row["tenant_name"];?></option>
        <?php
							$i++;
						}
						?>
      </select>


  </form>



</body>

</html>

</html>