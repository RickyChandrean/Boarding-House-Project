<?php
require '../Functions/functions.php';

session_start();
$username = $_SESSION['username'];
$result = mysqli_query($conn, "SELECT * FROM `users` WHERE username='$username'");
$tableusers=mysqli_fetch_array($result);
$userid = $tableusers['id'];

//query data room based on "room id"
$qdr = "SELECT * FROM `tenant` WHERE userid=$userid";
$result = mysqli_query($conn, $qdr);

// Associative array
$row = mysqli_fetch_assoc($result);


$qdr = query("SELECT * FROM `tenant` WHERE userid=$userid")[0];

//Make sure the Submit Button
if( isset($_POST["submit"]) ){
    echo " <script>
    alert('Data is updated');
    document.location.href = 'homeuser.php';
    </script>
    ";
}

if( ($_POST) > 0){

    
} else {
    echo " <script>
    alert('Your selected room already booked');
    document.location.href = 'tenantdatabase.php';
    </script>
    ";
}


if( isset($_POST["submit"]) ){
    //Take Data from each element
    $tenantid = mysqli_real_escape_string($conn,$_POST["tenant_id"]); 
    $tenantname= mysqli_real_escape_string($conn,$_POST["tenant_name"]);
    $tenantadd = mysqli_real_escape_string($conn,$_POST["tenant_address"]);
    $tenantko = mysqli_real_escape_string($conn,$_POST["tenant_ktp_no"]);
    $tenantph = mysqli_real_escape_string($conn,$_POST["tenant_phone"]);
    $tenanteml = mysqli_real_escape_string($conn,$_POST["tenant_email"]);
    $tenantba= mysqli_real_escape_string($conn,$_POST["tenant_bankaccount"]);
    $tenantbano= mysqli_real_escape_string($conn,$_POST["tenant_bankaccount_no"]);
     
    
    // query insert data
    $query = "UPDATE tenant SET
    tenant_name           = '$tenantname',
    tenant_address        = '$tenantadd',
    tenant_ktp_no         = '$tenantko',
    tenant_phone          = '$tenantph',
    tenant_email          = '$tenanteml',
    tenant_bankaccount    = '$tenantba',
    tenant_bankaccount_no = '$tenantbano'
    
  
  WHERE tenant_id       = $tenantid
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
  <link rel="stylesheet" href="css/tenantform.css">
  <title>Tenant Registration Form</title>
</head>

<body>
  <div class="bg-image"></div>
  <div class="bg-text">
    <h2 class="title">Tenant Profile Update </h2>
    <div class="content">
      <div class="ruang">
        <form action="" method="post" class="form">
          <!--Structure-->
          <!--Q1-->
          <div class="cellmargin">
            <label for="tenant_id" class="form-label">Tenant ID</label>
            <input type="text" name="tenant_id" class="form-control" id="tenant_id" aria-describedby="emailHelp"
              required value="<?php echo $qdr['tenant_id']?>" READONLY>
          </div>
          <!--Q2-->
          <div class="cellmargin">
            <label for="tenant_name" class="form-label">Full Name</label>
            <input type="text" name="tenant_name" class="form-control" id="tenant_name" aria-describedby="emailHelp"
              value="<?php echo $qdr['tenant_name']?>" required>
          </div>

          <div class="cellmargin">
            <label for="tenant_gender" class="form-label">Gender</label>
            <select name="tenant_gender" id="tenant_gender" class="form-select" aria-label="Default select example">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <!--Q3-->
          <div class="cellmargin">
            <label for="tenant_address" class="form-label">Address</label>
            <input type="text" name="tenant_address" class="form-control" id="tenant_address"
              aria-describedby="emailHelp" required value="<?php echo $qdr['tenant_address']?>">
          </div>

          <!--Q4-->
          <div class="cellmargin">
            <label for="tenant_ktp_no" class="form-label">KTP Number</label>
            <input type="text" name="tenant_ktp_no" required class="form-control" id="tenant_ktp_no"
              aria-describedby="emailHelp" value="<?php echo $qdr['tenant_ktp_no']?>">
          </div>
          <!--Q5-->
          <div class="cellmargin">
            <label for="tenant_phone" class="form-label">Phone Number</label>
            <input type="text" name="tenant_phone" required class="form-control" id="tenant_phone"
              aria-describedby="emailHelp" value="<?php echo $qdr['tenant_phone']?>">
          </div>
          <!--Q6-->
          <div class="cellmargin">
            <label for="tenant_email" class="form-label">E-mail</label>
            <input type="text" name="tenant_email" required class="form-control" id="tenant_email"
              aria-describedby="emailHelp" value="<?php echo $qdr['tenant_email']?>">
          </div>
          <!--Q10-->
          <div class="cellmargin">
            <label for="tenant_bankaccount" class="form-label">Bank Account</label>
            <input type="text" name="tenant_bankaccount" required class="form-control" id="tenant_bankaccount"
              aria-describedby="emailHelp" value="<?php echo $qdr['tenant_bankaccount']?>">
          </div>

          <!--Q11-->
          <div class="cellmargin">
            <label for="tenant_bankaccount_no" class="form-label">Bank Account Number</label>
            <input type="text" name="tenant_bankaccount_no" required class="form-control" id="tenant_bankaccount_no"
              aria-describedby="emailHelp" value="<?php echo $qdr['tenant_bankaccount_no']?>">

          </div><br>

          <div class="cellmargin">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
            <a href="homeuser.php" class="btn btn-primary">Back </a>
          </div><br>
        </form>
      </div>
    </div>
  </div>

</body>

</html>