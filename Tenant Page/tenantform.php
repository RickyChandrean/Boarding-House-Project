<?php

include '../Functions/functions.php';
session_start();
$username = $_SESSION['username'];
$result = mysqli_query($conn, "SELECT * FROM `users` WHERE username='$username'");
$tableusers=mysqli_fetch_array($result);
$userid = $tableusers['id'];
//Make sure the Submit Button
if (isset($_POST["submit"])) {
    //Take Data from each element
    $tenantid = mysqli_real_escape_string($conn, $_POST["tenant_id"]);
    $tenantname = mysqli_real_escape_string($conn, $_POST["tenant_name"]);
    $tenantgender=mysqli_real_escape_string($conn,$_POST['tenant_gender']);
    $tenantadd = mysqli_real_escape_string($conn, $_POST["tenant_address"]);
    $tenantktp = mysqli_real_escape_string($conn, $_POST["tenant_ktp_no"]);
    $tenantphone = mysqli_real_escape_string($conn, $_POST["tenant_phone"]);
    $tenantemail = mysqli_real_escape_string($conn, $_POST["tenant_email"]);
    $tenantbankacc = mysqli_real_escape_string($conn, $_POST["tenant_bankaccount"]);
    $tenantbankno = mysqli_real_escape_string($conn, $_POST["tenant_bankaccount_no"]);
    
   
    
    $phonelength=strlen( $tenantphone);
    $banknolength = strlen($tenantbankno);
    if($phonelength>=11 && $phonelength<=13){
        if($banknolength>=10 and $banknolength<=16){
           // query insert data
          $query = "INSERT INTO `tenant` VALUES ('$userid','$tenantid','$tenantname','$tenantgender','$tenantadd','$tenantktp','$tenantphone','$tenantemail','$tenantbankacc','$tenantbankno')";
          
          mysqli_query($conn, "UPDATE `users` SET `regist`='yes' WHERE username='$username'");
          $check=mysqli_query($conn, $query);
          if($check){
              echo '<script>alert("Success")</script>'; 
              header("Location: homeuser.php");
              die();
          } else{
        echo 'error';
          }
        } else{
          echo "<script>
                alert('Bank number error');        
            </script>";
        }
    } else {
       echo "<script>
                alert('Phone number error');        
            </script>";
    }

    
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
  <h2 class="title">Tenant Form Registration</h2>
  <div class="content">
   <div class="ruang">
    <form action="" method="post" class="form">
     <!--Structure-->
     <!--Q1-->
     <div class="cellmargin">
      <label for="tenant_id" class="form-label">Tenant ID</label>
      <input type="text" name="tenant_id" class="form-control" id="tenant_id" aria-describedby="emailHelp" required
       value="<?php echo rand(12345678,99999999)?>">
     </div>
     <!--Q2-->
     <div class="cellmargin">
      <label for="tenant_name" class="form-label">Full Name</label>
      <input type="text" name="tenant_name" class="form-control" id="tenant_name" aria-describedby="emailHelp" value=""
       required>
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
      <input type="text" name="tenant_address" class="form-control" id="tenant_address" aria-describedby="emailHelp"
       required>
     </div>

     <!--Q4-->
     <div class="cellmargin">
      <label for="tenant_ktp_no" class="form-label">KTP Number</label>
      <input type="text" name="tenant_ktp_no" required class="form-control" id="tenant_ktp_no"
       aria-describedby="emailHelp">
     </div>
     <!--Q5-->
     <div class="cellmargin">
      <label for="tenant_phone" class="form-label">Phone Number</label>
      <input type="text" name="tenant_phone" required class="form-control" id="tenant_phone"
       aria-describedby="emailHelp" placeholder="11 to 13 digit">
     </div>
     <!--Q6-->
     <div class="cellmargin">
      <label for="tenant_email" class="form-label">E-mail</label>
      <input type="text" name="tenant_email" required class="form-control" id="tenant_email"
       aria-describedby="emailHelp">
     </div>
     <!--Q10-->
     <div class="cellmargin">
      <label for="tenant_bankaccount" class="form-label">Bank Name</label>
      <input type="text" name="tenant_bankaccount" required class="form-control" id="tenant_bankaccount"
       aria-describedby="emailHelp">
     </div>

     <!--Q11-->
     <div class="cellmargin">
      <label for="tenant_bankaccount_no" class="form-label">Bank Account Number</label>
      <input type="text" name="tenant_bankaccount_no" required class="form-control" id="tenant_bankaccount_no"
       aria-describedby="emailHelp" placeholder="10 to 15 digit">

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